<?php

class Empresas_model extends CI_Model {

	public function getEmpresas()
		{
			return $this->db->get('empresas');
		}

	public function insertEmpresa($empresa=null)
	{
		if($empresa != null){
			$nombre 	= 	$empresa['nombre'];

			$sql = "INSERT INTO empresas VALUES(null, '$nombre', curdate());";
			if ($this->db->query($sql)) {
				return true;
			}
		}
		return false;
	}

	public function insertEditEmpresa($empresa=null)
	{
		if($empresa != null){
			$nombre 	= 	$empresa['nombre'];
			$id 		= 	$empresa['id'];

			$sql = "UPDATE empresas SET nombre = '$nombre' WHERE id = $id";
			if ($this->db->query($sql)) {
				return true;
			}
		}
		return false;
	}

	public function getEncargado($id=NULL)
	{
		if($id != null){
			
			$sql2 = "SELECT * FROM encargados WHERE id_empresa = $id";
			if ($this->db->query($sql2)) {
				return true;
			}else{
				return false;
			}
		}
		return false;
	}

	public function getEmpresa($id=NULL)
	{
		if($id != null){
			
			$sql3 = "SELECT * FROM empresas WHERE id = $id";
			if ($this->db->query($sql3)) {

				return $this->db->query($sql3);
			}else{
				return false;
			}
		}
		return false;
	}	

}

/* End of file empresas.php */
/* Location: ./application/models/empresas.php */
