<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Nivel extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Nivel_model');
	}

	public function index()
	{
		$lectivos = $this->Nivel_model->ObtenerLectivo();
		$periodos = $this->Nivel_model->ObtenerPeriodo();
		$data['titulo'] = "";
		// $data['usuarios'] = $this->Usuario_model->ObtenerUsuarios();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('admin/usuarios/index', $data);
		$this->load->view('templates/footer');
	}
}
?>