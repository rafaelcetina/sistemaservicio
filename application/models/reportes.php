<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Model {

	public function insert($reporte=null)
	{
		if($reporte != null){
			$id_usuario		= $this->session->userdata('id');
			$descripcion 	= $reporte['descripcion'];
			$archivo		= $reporte['file_name'];
			$tipo 			= $this->db->query("SELECT * FROM usuarios WHERE id = '".$id_usuario."' ");
			$tipo_usuario 	= $tipo->row()->rol;

			$sql = "INSERT INTO reportes VALUES(null,'$id_usuario', '$archivo', '$descripcion', '$tipo_usuario', curdate());";
			if ($this->db->query($sql)) {
				return true;
			}
		}
		return false;
	}

	public function insertPlantilla($plantilla=null)
	{
		if($plantilla != null){
			$num_plantilla 	= 	$plantilla['num_plantilla'];

			$archivo		= 	$plantilla['file_name'];

			$sql = "INSERT INTO plantillas VALUES(null, '$num_plantilla', '$archivo', curdate());";
			if ($this->db->query($sql)) {
				return true;
			}
		}
		return false;
	}


	public function insertReporteEncargado($reporte=null)
	{
		if($reporte != null){
			$matricula 	= 	$reporte['matricula'];

			$archivo	= 	$reporte['file_name'];

			$empresa	= $reporte['id_empresa'];

			$sql = "UPDATE reportesencargado SET archivo = '$archivo', fecha = curdate() WHERE matricula = '$matricula';";
			if ($this->db->query($sql)) {
				return true;
			}
		}
		return false;
	}

	public function insertReporteAlumno($reporte=null)
	{
		if($reporte != null){
			$matricula 	= 	$reporte['matricula'];

			$archivo	= 	$reporte['file_name'];

			$num_reporte	= $reporte['num_reporte'];

			$sql = "UPDATE reportes SET archivo = '$archivo', fecha = curdate() WHERE matricula = '$matricula' and num_reporte = '$num_reporte';";
			if ($this->db->query($sql)) {
				return true;
			}
		}
		return false;
	}

	public function programarReporteEncargado($reporte=null)
	{
		if($reporte != null){
			$matricula 	= 	$reporte['matricula'];

			$empresa	= $reporte['id_empresa'];
			
			$fecha_limite	= $reporte['fecha_limite'];

			$sql = "INSERT INTO reportesencargado VALUES(null, null, '$empresa', '$matricula', null, '$fecha_limite');";
			if ($this->db->query($sql)) {
				return true;
			}
		}
		return false;
	}

	public function programarReporteAlumno($reporte=null)
	{
		if($reporte != null){
			$matricula 	= $reporte['matricula'];

			$num_reporte	= $reporte['num_reporte'];
			
			$fecha_limite	= $reporte['fecha_limite'];

			$this->db->query($sql0 = "DELETE FROM reportes WHERE matricula = '$matricula' and num_reporte = '$num_reporte'");

			$sql = "INSERT INTO reportes VALUES(null, '$matricula', '$num_reporte', null, null, '$fecha_limite');";
			if ($this->db->query($sql)) {
				return $fecha_limite;
			}
		}
		return false;
	}

	public function getMatricula()
	{
		$id_usuario = $this->session->userdata('id');
		$result = $this->db->query("SELECT * FROM usuarios where id = '".$id_usuario."'");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}

	public function getReportesByUsuario()
	{	
		
		$result = $this->db->query(" SELECT * FROM reportes WHERE matricula = '".$alumno->matricula."' ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}

	public function getReportesByAlumno($id_usuario)
	{	
		//$id_usuario = $this->session->userdata('id');
		$result = $this->db->query(" SELECT * FROM reportes WHERE id_usuario = '".$id_usuario."' ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}

	public function getReportesByMatricula($matricula)
	{	
		//$id_usuario = $this->session->userdata('id');
		$result = $this->db->query(" SELECT * FROM reportes WHERE matricula = '".$matricula."' ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}

	public function getReportes1($matricula)
	{	
		//$matricula = $this->session->userdata('id');
		$result = $this->db->query(" SELECT * FROM reportes WHERE matricula = '".$matricula."'  and num_reporte = 1 ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}

	public function getReportes2($matricula)
	{	
		//$matricula = $this->session->userdata('id');
		$result = $this->db->query(" SELECT * FROM reportes WHERE matricula = '".$matricula."'  and num_reporte = 2 ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}
	public function getReportes3($matricula)
	{	
		//$matricula = $this->session->userdata('id');
		$result = $this->db->query(" SELECT * FROM reportes WHERE matricula = '".$matricula."'  and num_reporte = 3 ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}
	public function getReportes4($matricula)
	{	
		//$matricula = $this->session->userdata('id');
		$result = $this->db->query(" SELECT * FROM reportes WHERE matricula = '".$matricula."'  and num_reporte = 4 ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}
	public function getReportes5($matricula)
	{	
		//$matricula = $this->session->userdata('id');
		$result = $this->db->query(" SELECT * FROM reportes WHERE matricula = '".$matricula."'  and num_reporte = 5 ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}


	public function getReportesEncargadoByAlumno($matricula)
	{	
		//$matricula = $this->session->userdata('id');
		$result = $this->db->query(" SELECT * FROM reportesencargado WHERE matricula = '".$matricula."' ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}

	public function getReportesEncargadoByEncargado($id_empresa)
	{	
		//$id_empresa = $this->session->userdata('id');
		$result = $this->db->query(" SELECT * FROM reportesencargado WHERE id_empresa = '".$id_empresa."' ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}

	public function getPlantilla($numReporte)
	{	
		//$id_usuario = $this->session->userdata('id');
		$result = $this->db->query(" SELECT * FROM plantillas WHERE num_plantilla = '".$numReporte."' ");
		if ($result->num_rows()) {
			return $result->result_array();
			}else{
				return false;
			}
	}
	

}

/* End of file reportes_model.php */
/* Location: ./application/models/reportes.php */