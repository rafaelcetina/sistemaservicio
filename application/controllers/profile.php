<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')){
			header("Location: ". base_url());
		}
	}

	public function index()
	{
		if(!$this->session->userdata('rol')==0){
			if($this->session->userdata('rol')==1){
				header("Location: ". base_url()."profile/alumno");
			}else{
				header("Location: ". base_url()."profile/encargado");
			}
		}
		$data = array('tittle' => 'Sistema Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social', 'sistema'=>'Servicio Social | ITCH');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Sistema Servicio Social', 'descripcion' => 'mensaje');
		$this->load->view('admin/header',$data);

		$this->load->model('alumnos');

		$data['alumnos'] = $this->alumnos->getAlumnos();

		$this->load->view('user/content',$data);
		$this->load->view('guest/footer');

	}
	public function nuevo()
	{
		$data = array('tittle' => 'Sistema Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Nuevo Reporte', 'descripcion' => 'mensaje');
		$this->load->view('guest/header',$data);
		
		$this->load->helper('bootstrap');

		$this->load->view('user/newReporte');
		$this->load->view('guest/footer');
	}
	public function insertar()
	{	
		$reporte = $this->input->post();
		$this->load->model('reportes');
		// falta file_name
		$this->load->model('file');
		$file_name = $this->file->UploadImage('./public/reportes/','No fue posible cargar imagen');
		$reporte['file_name'] = $file_name; // Asignar una nueva key llamada file_name con el contenido del fichero
		$bool = $this->reportes->insert($reporte);
		if ($bool) {
			header("Location: " . base_url() . "profile/alumno");
		}else{
			header("Location: " . base_url() . "reportes/nuevo");
		}
	}

	public function alumnos($carrera)
	{
		//$this->session->sess_destroy();
		$data = array('tittle' => 'Profile', 'mensaje'=>'Bienvenido al Sistema de Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Lista de Alumnos', 'cc'=>$carrera);
		$this->load->view('admin/header',$data);
		
		$this->load->model('alumnos');
		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url() .'profile/alumnos/'.$carrera.'';
		$config['total_rows'] = $this->alumnos->num_alumnos();
		$config['per_page'] = 4;
		$config['uri_segment'] = 3;
		$config['num_links'] = 4;

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = false;
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = false;
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_link'] = '&raquo;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '&laquo;';
		$config['prev_tag_open'] = '<li class="prev">';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);
		
		//echo $this->pagination->create_links();

		$result = $this->alumnos->get_paginacion($config['per_page'], $carrera);
		$data['consulta'] = $result ;
		$data['pagination'] = $this->pagination->create_links();
		
		$this->load->view('admin/content',$data);
		$this->load->view('guest/footer');
	}

	public function borrar()
	{	
		$this->load->model('alumnos');
		
		$alumno 	= 	$this->input->post();
		$matricula	= 	$alumno['matricula'];
		$id 		=	$alumno['id'];

		$sql		= 	"DELETE FROM alumnos where matricula = '$matricula'";

		if($this->db->query($sql)){
			echo $matricula;
		}else{
			false;
		}
	}

	public function borrarPlantilla()
	{	
		$this->load->model('reportes');
		
		$plantilla 	= 	$this->input->post();
		$file		= 	$plantilla['file'];
		$num 		=	$plantilla['num'];

		$sql2 		 = 	"SELECT id FROM plantillas where num_plantilla = '$num' and archivo = '$file'";
		$sql		= 	"DELETE FROM plantillas where num_plantilla = '$num' and archivo = '$file'";

		$number = $this->db->query($sql2)->row()->id;
			
		if($this->db->query($sql)){
			echo $number;
		}else{
			false;
		}
	}


	public function alumno()
	{
		if(!$this->session->userdata('rol')==1){
			header("Location: ". base_url());
		}
		$data = array('tittle' => 'Sistema Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Sistema Servicio Social', 'descripcion' => 'mensaje');
		$this->load->view('alumnos/header',$data);

		$this->load->model('reportes');

		$id_usuario = $this->session->userdata('id');

		$alumno = $this->reportes->getMatricula();
		foreach ($alumno as $fila){
			$matricula = $fila['matricula'];
		}

		$data['reportes'] = $this->reportes->getReportesByMatricula($matricula);


		$data = array('matricula' => $matricula);

		$data['reportes1'] = $this->reportes->getReportes1($matricula);
		$data['reportes2'] = $this->reportes->getReportes2($matricula);
		$data['reportes3'] = $this->reportes->getReportes3($matricula);
		$data['reportes4'] = $this->reportes->getReportes4($matricula);
		$data['reportes5'] = $this->reportes->getReportes5($matricula);

		$this->load->view('alumnos/content',$data);
		$this->load->view('guest/footer');
	}

	public function encargado($value='')
	{
		if(!$this->session->userdata('rol')==2){
			header("Location: ". base_url());
		}
		$data = array('tittle' => 'Sistema Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Sistema Servicio Social', 'descripcion' => 'mensaje');
		$this->load->view('encargado/header',$data);

		$this->load->model('reportes');
		

		//$data['reportes'] = $this->reportes->getReportesByUsuario();
		$this->load->model('alumnos');
		
		$emailEncargado = $this->session->userdata('email');

		$encargado = $this->alumnos->getEmpresaByEncargado($emailEncargado);
		
		$empresa = $encargado->id_empresa;
		
		$data['alumnos'] = $this->alumnos->getAlumnosByEmpresa($empresa);

		$this->load->view('encargado/content',$data);
		$this->load->view('guest/footer');
	}

	public function alumnosenempresa($empresa)
	{
		$this->load->model('alumnos');
		$encargado = $this->alumnos->getEmpresaById($empresa);
		
		$emailEncargado = $this->session->userdata('email');
		$encargadoEmail = $this->alumnos->getEmpresaByEncargado($emailEncargado);

		if(!isset($encargado) or $encargado->id == null or $encargadoEmail->id_empresa != $empresa){
			header("Location: ". base_url());
		}
		//$data['alumnos'] = $this->alumnos->getAlumnosByEmpresa($empresa);		
		if(!$this->session->userdata('rol')==2 ){
			header("Location: ". base_url());
		}
		$data = array('tittle' => 'Sistema Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Sistema Servicio Social', 'descripcion' => 'mensaje');
		$this->load->view('guest/header',$data);

		$this->load->model('alumnos');

		$data['alumnos'] = $this->alumnos->getAlumnosByEmpresa($empresa);

		$this->load->view('encargado/alumnosenempresa',$data);
		$this->load->view('guest/footer');
	}

	public function subirPlantilla($numReporte)
	{
		$data = array('tittle' => 'Sistema Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Plantillas de Reportes', 'numReporte' => $numReporte);
		$this->load->view('admin/header',$data);
		
		$this->load->helper('bootstrap');
		$this->load->model('reportes');
		$data['reportes'] = $this->reportes->getPlantilla($numReporte);

		$this->load->view('admin/newPlantilla',$data);
		$this->load->view('guest/footer');
	}

	public function subirReporteEncargado($matricula)
	{
		$data = array('tittle' => 'Sistema Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Reporte de Encargado', 'matricula' => $matricula);
		$this->load->view('guest/header',$data);
		
		$this->load->helper('bootstrap');
		$this->load->model('reportes');

		$reportesEncargado = $this->reportes->getReportesEncargadoByAlumno($matricula);
		if(isset($reportesEncargado) and $reportesEncargado!=NULL){
		foreach ($reportesEncargado as $fila){
			if($fila['archivo']!=NULL) {
			$data['reporteSubido'] = 1;
			}else{
			$data['reportes'] = $this->reportes->getPlantilla(6);
			}
			}
		}else{
			$data['noProgramado'] = 1;
		}
		$this->load->view('encargado/newReporte',$data);
		$this->load->view('guest/footer');
	}


	public function subirReporteAlumno($matricula)
	{
		$data = array('tittle' => 'Sistema Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Reporte de Alumno', 'matricula' => $matricula, 'num_reporte' => $_GET['num_reporte']);
		$this->load->view('guest/header',$data);

		$this->load->helper('bootstrap');
		$this->load->model('reportes');
		switch ($_GET['num_reporte']) {
			case 1:
				$reportesAlumno = $this->reportes->getReportes1($matricula);
				break;
			case 2:
				$reportesAlumno = $this->reportes->getReportes2($matricula);
				break;
			case 3:
				$reportesAlumno = $this->reportes->getReportes3($matricula);
				break;
			case 4:
				$reportesAlumno = $this->reportes->getReportes4($matricula);
				break;
			case 5:
				$reportesAlumno = $this->reportes->getReportes5($matricula);
				break;
		}
		if(isset($reportesAlumno) and $reportesAlumno!=NULL){
		foreach ($reportesAlumno as $fila){
			if($fila['archivo']!=NULL) {
			$data['reporteSubido'] = 1;
			}elseif($fila['fecha_limite'] < date('Y-m-d')){
				$data['fecha'] = 1;
			}else{
			$data['reportes'] = $this->reportes->getPlantilla($_GET['num_reporte']);
			}
			}
		}else{
			$data['noProgramado'] = 1;
		}
		$this->load->view('alumnos/newReporte',$data);
		$this->load->view('guest/footer');
	}

	public function subirPlantillaAction()
	{	
		$plantilla = $this->input->post();
		$this->load->model('reportes');

		$this->load->model('file');
		$file_name = $this->file->UploadImage('./public/plantillas/reporte'.$plantilla['num_plantilla'].'/','No fue posible cargar la plantilla');
		$plantilla['file_name'] = $file_name; // Asignar una nueva key llamada file_name con el contenido del fichero
		$bool = $this->reportes->insertPlantilla($plantilla);
		if ($bool) {
			header("Location: " . base_url() . "profile?success=1");
		}else{
			header("Location: " . base_url() . "profile?error=1");
		}
	}


	public function subirReporteEncargadoAction()
	{	
		$reporte = $this->input->post();
		$this->load->model('reportes');
		
		$emailEncargado = $this->session->userdata('email');

		$this->load->model('alumnos');

		$encargado = $this->alumnos->getEmpresaByEncargado($emailEncargado);

		$reporte['id_empresa'] = $encargado->id_empresa;

		$this->load->model('file');
		$file_name = $this->file->UploadImage('./public/reportes/alumnos/','No fue posible cargar la reporte');
		$reporte['file_name'] = $file_name; // Asignar una nueva key llamada file_name con el contenido del fichero
		$bool = $this->reportes->insertReporteEncargado($reporte);
		if ($bool) {
			header("Location: " . base_url() . "profile/encargado?success=1");
		}else{
			header("Location: " . base_url() . "profile/encargado?error=1");
		}
	}

	public function subirReporteAlumnosAction()
	{	
		$reporte = $this->input->post();
		$this->load->model('reportes');
		
		$this->load->model('alumnos');

		$this->load->model('file');
		$file_name = $this->file->UploadImage('./public/reportes/','No fue posible cargar la reporte');
		$reporte['file_name'] = $file_name; // Asignar una nueva key llamada file_name con el contenido del fichero
		$bool = $this->reportes->insertReporteAlumno($reporte);

		if ($bool) {
			header("Location: " . base_url() . "profile/alumno?success=1");
		}else{
			header("Location: " . base_url() . "profile/alumno?error=1");
		}
	}

	public function programar_reporte_encargado($matricula='')
	{
		$data = array('tittle' => 'Sistema Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Programar Reporte de Encargado', 'matricula' => $matricula);
		$this->load->view('guest/header',$data);
		
		$this->load->helper('bootstrap');
		$this->load->model('reportes');


		$this->load->view('admin/programar_reporte_encargado',$data);
		$this->load->view('guest/footer');
	}

	public function programar_reporte_encargado_action()
	{	
		$reporte = $this->input->post();
		$this->load->model('reportes');
		
		$emailEncargado = $this->session->userdata('email');

		$this->load->model('alumnos');

		$encargado = $this->alumnos->getEmpresaByEncargado($emailEncargado);

		$reporte['id_empresa'] = $encargado->id_empresa;

		$bool = $this->reportes->programarReporteEncargado($reporte);
		if ($bool) {
			header("Location: " . base_url() . "profile/?success=1");
		}else{
			header("Location: " . base_url() . "profile/?error=1");
		}
	}

	public function programar_reporte_alumno($matricula='')
	{
		$data = array('tittle' => 'Sistema Servicio Social');
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Programar Reporte de Alumno', 'matricula' => $matricula, 'num_reporte'=>$_GET['num_reporte']);
		$this->load->view('guest/header',$data);
		
		$this->load->helper('bootstrap');
		$this->load->model('reportes');

		$this->load->view('admin/programar_reporte_alumno',$data);
		$this->load->view('guest/footer');
	}

	public function programar_reporte_alumno_action()
	{	
		$reporte = $this->input->post();
		$this->load->model('reportes');
		
		$this->load->model('alumnos');

		$bool = $this->reportes->programarReporteAlumno($reporte);
		if ($bool) {
			header("Location: " . base_url() . "profile/?success=1");
		}else{
			header("Location: " . base_url() . "profile/?error=1");
		}
	}


}


/* End of file profile.php */
/* Location: ./application/controllers/profile.php */