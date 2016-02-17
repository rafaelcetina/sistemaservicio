<?php
	/**
	* 
	*/
	class Alumnos extends CI_Model
	{
		public function getAlumnos()
		{
			return $this->db->get('alumnos');
		}
		
		public function getAlumnoByMatricula($matricula='')
		{
			$result = $this->db->query(" SELECT * FROM alumnos WHERE matricula = '".$matricula."' ");
			return $result->row();
		}


		public function getUsuarioByMatricula($matricula='')
		{
			$result = $this->db->query(" SELECT * FROM usuarios WHERE matricula = '".$matricula."' ");
			if($result!=null){
			return $result->row();
			}
			return false;
		}

		public function getAlumnosByEmpresa($empresa='')
		{
			$result = $this->db->query(" SELECT * FROM alumnos WHERE id_empresa = '".$empresa."' ");
			return $result->result_array();
		}

		public function getEmpresas()
		{

			$result = $this->db->query(" SELECT * FROM empresas");
			if ($result->num_rows()) {
				return $result->result_array();
			}else{
				return false;
			}
		}

		public function getCarreras()
		{
			$result = $this->db->query(" SELECT * FROM carreras");
			if ($result->num_rows()) {
				return $result->result_array();
			}else{
				return false;
			}
		}


		public function getEmpresaById($id='')
		{
			$result = $this->db->query(" SELECT * FROM empresas WHERE id = '".$id."' ");
			if($result!=null){
				return $result->row();
			}else{
				return false;
			}
		}

		public function getEmpresaByEncargado($email='')
		{
			$result = $this->db->query(" SELECT * FROM encargados WHERE email = '".$email."' ");
			if($result!=null){
				return $result->row();
			}else{
			return false;
			}
		}

		public function num_alumnos(){
		//$this->db->get("alumnos")->db->num_rows();//lento
		$number = $this->db->query("SELECT count(matricula) as number FROM alumnos")->row()->number;
			return intval($number);
		}
		public function get_paginacion($num_per_page, $carrera)
		{
			//$res = $this->db->query();
			return $this->db->query("SELECT * FROM alumnos WHERE carrera = '".$carrera."' and status = '1'",$num_per_page,$this->uri->segment(3));
		}

		public function insertAlumno($alumno)
		{
			if($alumno != null){
				$matricula		= $alumno['matricula'];
				$nombre 		= $alumno['nombre'];
				$carrera		= $alumno['carrera'];
				$semestre		= $alumno['semestre'];
				$email			= $alumno['email'];
				$password		= $alumno['password'];
				$rol 			= $alumno['rol'];
				$id_empresa		= $alumno['id_empresa'];
				/*
				$tipo 			= $this->db->query("SELECT * FROM usuarios WHERE id = '".$id_usuario."' ");
				$tipo_usuario 	= $tipo->row()->rol;
				*/
				if($rol == 1){
					
					$sqlCarrera = $this->db->query("SELECT siglas FROM carreras WHERE nombre = '".$carrera."'");
					$carrera = $sqlCarrera->row()->siglas;

					$sql = "INSERT INTO alumnos VALUES($matricula, '$nombre', '$carrera', $semestre, '$id_empresa') ";
				
					$sql2 = "INSERT INTO usuarios VALUES(NULL, $matricula, '$nombre', '$password', '$email', '$rol', 1, curdate())";
				}else{
					$sql = "INSERT INTO encargados VALUES(null, '$nombre', '$email', '$id_empresa') ";
				
					$sql2 = "INSERT INTO usuarios VALUES(NULL, null, '$nombre', '$password', '$email', '$rol', 1, curdate())";
				}
				if ($this->db->query($sql) and $this->db->query($sql2)) {
					return true;
				}

			}
		return false;
		}

		public function eliminar($matricula='')
		{
			$sql = "UPDATE alumnos SET status = 0 WHERE matricula = '$matricula'";
			//$sql = "DELETE FROM alumnos WHERE matricula = '$matricula'";
				if($this->db->query($sql)){
					return true;
				}else{
					return false;
				}
		}
	}