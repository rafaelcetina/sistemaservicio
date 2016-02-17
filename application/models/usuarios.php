<?php
	/**
	* 
	*/
	class Usuarios extends CI_Model
	{
		public function getUsuarios()
		{
			return $this->db->get('usuarios');
		}

		public function getUser($email='')
		{
			$result = $this->db->query("SELECT * FROM usuarios WHERE email = '".$email."' ");
			if($result->num_rows() > 0){
				return $result->row();
			}else{
				return null;
			}
		}

		public function getUserByMatricula($matricula='')
		{
			$result = $this->db->query("SELECT * FROM usuarios WHERE matricula = '".$matricula."' ");
			if($result->num_rows() > 0){
				return $result->row();
			}else{
				return null;
			}
		}

		public function getUserById($id='')
		{
			$result = $this->db->query(" SELECT * FROM usuarios WHERE id = '".$id."' ");
			return $result->row();
		}
	}