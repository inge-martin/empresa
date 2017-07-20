<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Login_model");
	}
	
	public function index(){
		if(!empty($this->session->userdata("usuario"))){
			redirect(base_url()."empleados");
		}else{
			$this->load->view('login');
		}
	}

	public function validar(){
		if ($this->input->is_ajax_request()) {
			$usuario 	= $this->input->post("usuario");
			$contrasena = sha1($this->input->post("contrasena"));

			$res = $this->Login_model->validar($usuario, $contrasena);

			if ($res === false) {
				echo "error";
			}else{
				$sesion = array(
					'sesion_activa' => TRUE,
					'usuario' => $res->usuario,
					'estado' => $res->estado,
					'id_empleado' => $res->id_empleado
					);
				$this->session->set_userdata($sesion);
			}
		}else{
			show_404();
		}
		
	}

}