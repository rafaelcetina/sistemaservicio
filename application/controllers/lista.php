<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lista extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function verAlumno( $matricula = '')
	{	
		$this->load->model('alumnos');
		$fila = $this->alumnos->getAlumnoByMatricula($matricula);
		$filaEmpresa = $this->alumnos->getEmpresaById($fila->id_empresa);

		if(isset($fila->matricula)){

		$data = array('tittle' => $fila->nombre);
		$this->load->view('guest/head',$data);
		$data = array('app' => 'Sistema Servicio Social');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => $fila->matricula);
		$this->load->view('admin/header',$data);
		$data = array('matricula' => $fila->matricula, 'nombre' => $fila->nombre, 'carrera'=> $fila->carrera, 'empresa' => $filaEmpresa->nombre);


		$id_usuario_1 = $this->alumnos->getUsuarioByMatricula($matricula);

		if($id_usuario_1!=null){

		$id_usuario = $id_usuario_1->id;

		$this->load->model('reportes');
		$data['reportes1'] = $this->reportes->getReportes1($matricula);
		$data['reportes2'] = $this->reportes->getReportes2($matricula);
		$data['reportes3'] = $this->reportes->getReportes3($matricula);
		$data['reportes4'] = $this->reportes->getReportes4($matricula);
		$data['reportes5'] = $this->reportes->getReportes5($matricula);
		$data['reportesEncargado'] = $this->reportes->getReportesEncargadoByAlumno($matricula);


		}

		$this->load->view('admin/lista', $data);

		$this->load->view('guest/footer');

		}else{
			header("Location: ". base_url());
		}
	}
	public function eliminarAlumno()
	{	
		$matricula = $this->input->post();
		$this->load->model('alumnos');
		$this->alumnos->eliminar($matricula['matricula']);
		header("Location: " . base_url()."profile");
	}
}