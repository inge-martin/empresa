<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function validar($usuario, $contrasena){
		$this->db->where("usuario", $usuario);
		$this->db->where("contrasena", $contrasena);
		$query = $this->db->get("sesiones");

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

}