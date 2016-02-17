<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {

	public function index()
	{
			
	}
	public function admin()
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
		$data = array('app' => 'Sistema Servicio Social - Empresas', 'sistema'=>'Servicio Social | ITCH');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Sistema Servicio Social - Empresas', 'descripcion' => 'mensaje');
		$this->load->view('admin/header_empresas',$data);

		$this->load->model('empresas_model');

		$data['empresas'] = $this->empresas_model->getEmpresas();

		$this->load->view('admin/empresas',$data);
		$this->load->view('guest/footer');
	}

	public function add()
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
		$data = array('app' => 'Sistema Servicio Social - Empresas', 'sistema'=>'Servicio Social | ITCH');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Sistema Servicio Social - Añadir empresa', 'descripcion' => 'mensaje' , 'cc'=>'add');
		$this->load->view('admin/header_empresas',$data);

		$this->load->model('empresas_model');

		$data['empresas'] = $this->empresas_model->getEmpresas();

		$this->load->view('admin/addEmpresa',$data);
		$this->load->view('guest/footer');
	}

	public function edit($id)
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
		$data = array('app' => 'Sistema Servicio Social - Empresas', 'sistema'=>'Servicio Social | ITCH');
		$this->load->view('guest/nav',$data);
		$data = array('titulo' => 'Sistema Servicio Social - Añadir empresa', 'descripcion' => 'mensaje' , 'cc'=>'add');
		$this->load->view('admin/header_empresas',$data);

		$this->load->model('empresas_model');

		$data['empresa'] = $this->empresas_model->getEmpresa($id);

		$this->load->view('admin/editEmpresa',$data);
		$this->load->view('guest/footer');
	}

	public function addEmpresa_action()
	{
		$empresa = $this->input->post();
		$this->load->model('empresas_model');

		$bool = $this->empresas_model->insertEmpresa($empresa);
		if ($bool) {
			header("Location: " . base_url() . "empresas/admin?success=1");
		}else{
			header("Location: " . base_url() . "empresas/admin?error=1");
		}
	}

	public function editEmpresa_action()
	{
		$empresa = $this->input->post();
		$this->load->model('empresas_model');

		$bool = $this->empresas_model->insertEditEmpresa($empresa);
		if ($bool) {
			header("Location: " . base_url() . "empresas/admin?success=1");
		}else{
			header("Location: " . base_url() . "empresas/admin?error=1");
		}
	}

	

}

/* End of file empresas.php */
/* Location: ./application/controllers/empresas.php */
 ?>