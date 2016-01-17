<?php
class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_model');
	}

	public function index()
	{
		$nombreUsuario = $this->input->post('usuario');
		$clave = md5($this->input->post('clave'));
		$resultado = $this->Usuario_model->IniciarSesion($nombreUsuario);
		if (($resultado != null) && ($resultado->clave == $clave))
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
			echo "<script> alert('Usuario o contraseña incorrectos') </script>";
			redirect(base_url());
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
?>