<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
		$this->load->library('form_validation');
		if(!$this->session->userdata('login'))
		{
			redirect(base_url());
		}
	}

	public function index()
	{
		$data['segmento'] = $this->uri->segment(3);
		$data['titulo'] = "Usuarios";
		$this->load->view('templates/header', $data);

		if(!$data['segmento']) $data['usuarios'] = $this->Usuario_model->ObtenerUsuarios();
		else $data['usuarios'] = $this->Usuario_model->ObtenerUsuario($data['segmento']);

		$this->load->view('templates/nav');
		$this->load->view('admin/usuarios/index', $data);
		$this->load->view('templates/footer');
	}


	private function Validar()
	{
		$this->form_validation->set_rules('nombre', 'Nombres', 'required|trim|is_unique[usuarios.nombres]');
		$this->form_validation->set_rules('correo', 'Correo', 'required|trim|valid_email|is_unique[usuarios.correo]');
		$this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|is_unique[usuarios.usuario]');
		$this->form_validation->set_rules('clave', 'Contraseña', 'required|trim|min_length[8]');
		$this->form_validation->set_rules('claveConfirm', 'Confirme Contraseña', 'required|trim|min_length[8]|matches[clave]');
	}

	public function crear()
	{
		$this->Validar();
		if ($this->form_validation->run() != FALSE)
		{
			$datosUsuario = [
				'nombres' => $this->input->post('nombre'),
				'correo' => $this->input->post('correo'),
				'usuario' => $this->input->post('usuario'),
				'clave' => md5($this->input->post('clave'))
			];
			$this->Usuario_model->RegistrarUsuario($datosUsuario);
			redirect(base_url()."usuario");
		}
		else
		{
			$data['titulo'] = "Registrar Usuario";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav');
			$this->load->view('admin/usuarios/crear', $data);
			$this->load->view('templates/footer') ;
		}
	}

	public function editar()
	{
		$data['id'] = $this->uri->segment(3);
		$data['usuarios'] = $this->Usuario_model->ObtenerUsuario($data['id']);
		$data['titulo'] = "Actualizar Usuario";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('admin/usuarios/editar', $data);
		$this->load->view('templates/footer');
	}

	public function actualizar()
	{
		$datosUsuario = [
				'nombres' => $this->input->post('nombre'),
				'correo' => $this->input->post('correo'),
				'usuario' => $this->input->post('usuario')
			];
		$this->Usuario_model->ActualizarUsuario($this->input->post('id'), $datosUsuario);
		redirect(base_url()."usuario");
	}

	public function eliminar()
	{
		$id = $this->uri->segment(3);
		$this->Usuario_model->EliminarUsuario($id);
		redirect(base_url()."usuario");
	}
}
?>