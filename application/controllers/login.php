<?php
	/**
	* 
	*/
	class Login extends CI_Controller
	{
		public function index()
		{
			// Recibe los valores de los campos enviados por el método post()		
			$email		= $this->input->post('email');
			$password	= $this->input->post('password');

			// Llama a la function getUser() del modelo usuarios
			$fila = $this->usuarios->getUser($email);

			if($fila!=null){ // Comprueba que la fila no este vacia
				if($fila->password == $password){
					$data = array(
						'email' 	=> $email,
						'id' 		=> $fila->id,
						'nombre'	=> $fila->nombre,
						'rol'		=> $fila->rol,
						'login'		=> true
					);
					$this->session->set_userdata($data);

					if($this->session->userdata('rol')==0){
						header("Location: " . base_url()."profile");
					}elseif($this->session->userdata('rol')==1){
						header("Location: " . base_url()."profile/alumno");
					}else{
						header("Location: " . base_url()."profile/encargado");
					}

				}else{
					header("Location: " . base_url());
				}
			}else{
				header("Location: " . base_url());
			}
		}

		public function loginAlumno()
		{
			// Recibe los valores de los campos enviados por el método post()		
			$matricula		= $this->input->post('matricula');
			$password		= $this->input->post('password');

			// Llama a la function getUser() del modelo usuarios
			$fila = $this->usuarios->getUserByMatricula($matricula);

			if($fila!=null){ // Comprueba que la fila no este vacia
				if($fila->password == $password){
					$data = array(
						'email' 	=> $fila->email,
						'id' 		=> $fila->id,
						'nombre'	=> $fila->nombre,
						'rol'		=> $fila->rol,
						'login'		=> true
					);
					$this->session->set_userdata($data);

					if($this->session->userdata('rol')==0){
						header("Location: " . base_url()."profile");
					}elseif($this->session->userdata('rol')==1){
						header("Location: " . base_url()."profile/alumno");
					}else{
						header("Location: " . base_url()."profile/encargado");
					}

				}else{
					header("Location: " . base_url()."?error=1");
				}
			}else{
				header("Location: " . base_url()."?error=1");
			}
		}

		public function loginEncargado()
		{
			// Recibe los valores de los campos enviados por el método post()		
			$email		= $this->input->post('email');
			$password	= $this->input->post('password');

			// Llama a la function getUser() del modelo usuarios
			$fila = $this->usuarios->getUser($email);

			if($fila!=null){ // Comprueba que la fila no este vacia
				if($fila->password == $password){
					$data = array(
						'email' 	=> $fila->email,
						'id' 		=> $fila->id,
						'nombre'	=> $fila->nombre,
						'rol'		=> $fila->rol,
						'login'		=> true
					);
					$this->session->set_userdata($data);

					if($this->session->userdata('rol')==0){
						header("Location: " . base_url()."profile");
					}elseif($this->session->userdata('rol')==1){
						header("Location: " . base_url()."profile/alumno");
					}else{
						header("Location: " . base_url()."profile/encargado");
					}

				}else{
					header("Location: " . base_url()."?error=1");
				}
			}else{
				header("Location: " . base_url()."?error=1");
			}
		}

		public function logout()
		{
			$this->session->sess_destroy();
			header("Location: " . base_url());

		}
	}
	