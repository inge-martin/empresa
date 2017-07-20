<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados_model extends CI_Model {

	public function guardarEmpleado($empleado){
		$this->db->insert("empleados", $empleado);
		if($this->db->affected_rows() > 0){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	public function guardarSesion($sesion){
		$this->db->insert("sesiones", $sesion);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function mostrar($buscar){
		$this->db->like("nombre_empleado", $buscar);
		$consulta = $this->db->get("empleados");
		return $consulta->result();
	}

	public function actualizar($empleadoEdit, $id){
		$this->db->where("id_empleado", $id);
		$this->db->update("empleados", $empleadoEdit);

		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function eliminar($id){
		$this->db->where("id_empleado", $id);
		$this->db->delete("empleados");

		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function capturarImagen($id_empleado){
		$this->db->select('fotografia_empleado');
		$this->db->where('id_empleado', $id_empleado);
		$this->db->from('empleados');
		$resultado = $this->db->get();
		return $resultado->row();
	}
}