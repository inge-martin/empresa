<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Empleados/Empleados_model");
	}
	
	public function index(){
		if(empty($this->session->userdata("usuario"))){
			redirect(base_url());
		}else{
			$this->load->view('Empleados/index');
		}
	}

	public function guardar(){
		if ($this->input->is_ajax_request()){
			//Recuperar datos para la tabla empleado
			$nombre 	= $this->input->post('nombre');
			$paterno 	= $this->input->post('paterno');
			$materno 	= $this->input->post('materno');
			$nacimiento = $this->input->post('nacimiento');
			$telefono 	= $this->input->post('telefono');
			$celular 	= $this->input->post('celular');
			$email 		= $this->input->post('email');
			$sexo 		= $this->input->post('sexo');
			//Recuperar datos para la tabla de sesion
			$usuario 	= $this->input->post('usuario');
			$contrasena = sha1($this->input->post('contrasena'));
			$estado 	= 1;

			//Establecer reglas para validar campos
			$config = array(
				array(
					'field' => 'nombre',
					'label' => 'Nombre',
					'rules' => 'trim|required|min_length[3]|max_length[15]|alpha'
					),
				array(
					'field' => 'paterno',
					'label' => 'Paterno',
					'rules' => 'trim|required|min_length[3]|max_length[15]|alpha'
					),
				array(
					'field' => 'materno',
					'label' => 'Materno',
					'rules' => 'trim|required|min_length[3]|max_length[15]|alpha'
					),
				array(
					'field' => 'nacimiento',
					'label' => 'Fecha Nacimiento',
					'rules' => 'required'
					),
				array(
					'field' => 'sexo',
					'label' => 'Sexo',
					'rules' => 'required'
					),
				array(
					'field' => 'email',
					'label' => 'E-mail',
					'rules' => 'trim|required|valid_emails'
					),
				array(
					'field' => 'telefono',
					'label' => 'Teléfono Local',
					'rules' => 'trim|required|min_length[8]|max_length[10]|numeric'
					),
				array(
					'field' => 'celular',
					'label' => 'Teléfono Celular',
					'rules' => 'trim|required|min_length[10]|max_length[13]|numeric'
					),
				array(
					'field' => 'usuario',
					'label' => 'Usuario',
					'rules' => 'trim|required|min_length[5]|max_length[15]|is_unique[sesiones.usuario]'
					),			
				array(
					'field' => 'contrasena',
					'label' => 'Contraseña',
					'rules' => 'required|matches[confirmar]'
					),
				array(
					'field' => 'confirmar',
					'label' => 'Confirmar Contraseña',
					'rules' => 'required'
					)
				);
			$this->form_validation->set_rules($config);

			if ($this->form_validation->run() === TRUE) {

				$config['max_size'] 	 = "0";
				$config['upload_path'] 	 = "./assets/images/uploads";
				$config['allowed_types'] = "png|jpg|gif";
				$config['encrypt_name']	 = TRUE;
				$config['overwrite']	 = FALSE;

				$this->load->library("upload", $config);

				if ($this->upload->do_upload('fotografia')) {

					$data = array("upload_data" => $this->upload->data());

					//Envias los datos en un array al modelo para insertar
					$empleado = array(
						'nombre_empleado' 		=> $nombre,
						'paterno_empleado' 		=> $paterno,
						'materno_empleado' 		=> $materno,
						'nacimiento_empleado' 	=> $nacimiento,
						'telefono_empleado' 	=> $telefono,
						'celular_empleado' 		=> $celular,
						'email_empleado' 		=> $email,
						'sexo_empleado' 		=> $sexo,
						'fotografia_empleado' 	=> $data['upload_data']['file_name']
						);

					$id_empleado = $this->Empleados_model->guardarEmpleado($empleado);

					if ($id_empleado === false) {
						///mandas mensaje
						echo "No se pudo guardar tu registro de empleado";
					}else{
						//Si es diferente de false, es porque guardo los datos entonces
						//Guardas y Envias los datos en un array al modelo para insertar
						$sesion = array(
							'usuario'		=> $usuario,
							'contrasena'	=> $contrasena,
							'estado'		=> $estado,
							'id_empleado' 	=> $id_empleado
							);

						if($this->Empleados_model->guardarSesion($sesion) === true){
							//mandas mensaje
							echo "exito";
						}else{
							//mandas mensaje
							echo "error";
						}//guardarSesion()
					}//$id_empleado === false

				}else{
					//muestras error al cargar el archivo
					echo $this->upload->display_errors();
				}//do_upload()

			}else {
				//imprimes el error si no cumple las validaciones
				echo validation_errors('<li>','</li>');
			}//form_validation()

		}else{
			show_404();
		}//is_ajax()
	}

	public function mostrar(){
		if ($this->input->is_ajax_request()) {
			$buscar = $this->input->post('buscar');
			$datos = $this->Empleados_model->mostrar($buscar);
			echo json_encode($datos);
		}else{
			show_404();
		}
	}

	public function actualizar(){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('idEdit');
			$nombre = $this->input->post('nombreEdit');
			$paterno = $this->input->post('paternoEdit');
			$materno = $this->input->post('maternoEdit');
			$nacimiento = $this->input->post('nacimientoEdit');
			$telefono = $this->input->post('telefonoEdit');
			$celular = $this->input->post('celularEdit');
			$email = $this->input->post('emailEdit');

			$config['max_size'] 	 = "0";
			$config['upload_path'] 	 = "./assets/images/uploads";
			$config['allowed_types'] = "png|jpg|gif";
			$config['encrypt_name']	 = TRUE;
			$config['overwrite']	 = FALSE;

			$this->load->library("upload", $config);

			if ($this->upload->do_upload('foto_nueva')) {

				//para eliminar la foto anterior, obtienes el nombre y despues eliminas
				$registro = $this->Empleados_model->capturarImagen($id);
				unlink("./assets/images/uploads/".$registro->fotografia_empleado);

				$data = array("upload_data" => $this->upload->data());

				$empleadoEdit = array(
					'nombre_empleado' => $nombre,
					'paterno_empleado' => $paterno,
					'materno_empleado' => $materno,
					'nacimiento_empleado' => $nacimiento,
					'telefono_empleado' => $telefono,
					'celular_empleado' => $celular,
					'email_empleado' => $email,
					'fotografia_empleado' 	=> $data['upload_data']['file_name']
					);

				if($this->Empleados_model->actualizar($empleadoEdit, $id) === true){
					echo "Registro actualizado";
				}else{
					echo "No se actualizó tu registro";
				}
			}else{
				//muestras error al cargar el archivo
				echo $this->upload->display_errors();
			}//do_upload()

			
		}else{
			show_404();
		}
	}

	public function eliminar(){
		if ($this->input->is_ajax_request()) {
			//cuando es por ajax tienes que poner el nombre del post del campo del js
			$id = $this->input->post('idEliminar');
			//para eliminar la foto anterior, obtienes el nombre y despues eliminas
			$registro = $this->Empleados_model->capturarImagen($id);
			
			unlink("./assets/images/uploads/".$registro->fotografia_empleado);
			if($this->Empleados_model->eliminar($id) === true){
				echo "Registro eliminado";
			}else{
				echo "No se elimino tu registro";
			}
		}else{
			show_404();
		}
	}


	public function cerrar(){
		$this->session->unset_userdata();
		$this->session->sess_destroy();
	}

}