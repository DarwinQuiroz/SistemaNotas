<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
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

	public function login()
	{
		$nombreUsuario = $this->input->post('usuario');
		$password = $this->input->post('clave');
		$resultado = $this->Usuario_model->IniciarSesion($nombreUsuario);
		if ($resultado != false)
		{
			if ($resultado->clave == $password)
			{
				$datosSesion = array(
					'usuario' => $nombreUsuario,
					'id' => $resultado->idusuario,
					'login' => true
					);
				$this->session->set_userdata($datosSesion);
				redirect(base_url());
			}
			else
			{
				header("Location: " . base_url());
			}
		}
		else
		{
			header("Location: " . base_url());
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		header("Location: " . base_url());
	}

	public function crear()
	{
		$data['titulo'] = "Nuevo";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('admin/usuarios/crear', $data);
		$this->load->view('templates/footer') ;
	}

	public function guardar()
	{
		$nombre = $this->input->post('usuario');
		$clave = $this->input->post('clave');
		$datosUsuario = [
			'nombreusuario' => $nombre,
			'clave' => $clave
		];
		$this->Usuario_model->RegistrarUsuario($datosUsuario);
		redirect(base_url()."usuario");
	}

	public function editar()
	{
		$data['id'] = $this->uri->segment(3);
		$data['usuarios'] = $this->Usuario_model->ObtenerUsuario($data['id']);
		$data['titulo'] = "Actualizar Usuario";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('admin/usuarios/actualizar', $data);
		$this->load->view('templates/footer');
	}

	public function actualizar()
	{
		$id = $this->uri->segment(3);
		$nombre = $this->input->post('usuario');
		$clave = $this->input->post('clave');
		$datosUsuario = [
			'nombreusuario' => $nombre,
			'clave' => $clave
		];
		$this->Usuario_model->ActualizarUsuario($id,$datosUsuario);
		redirect(base_url()."usuario");
		$datosUsuario = array(
			'mombreusuario' => $this->input->post('usuario'),
			'clave' => $this->input->post('clave')
			);
		$data['usuario'] = $this->Usuario_model->Actualizar($this->uri->segment(3), $data);
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