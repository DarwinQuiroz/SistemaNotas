<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Nivel_model');
		$this->load->model('Nota_model');
	}

	public function index()
	{
		$data['lectivos'] = $this->Nivel_model->ObtenerLectivo();
		$data['periodos'] = $this->Nivel_model->ObtenerPeriodo();
		$data['titulo'] = "Consulta de Notas";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('notas/index', $data);
		$this->load->view('templates/footer');
	}

	public function elegir()
	{
		$data['periodos'] = $this->Nivel_model->ObtenerPeriodo();
		$data['materias'] = $this->Nota_model->ObtenerMaterias();
		$data['niveles'] = $this->Nota_model->ObtenerNiveles();
		$data['titulo'] = "Elegir Materias";
		//$data['idnivel'] = $_POST['nivel'];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('notas/elegir', $data);
		$this->load->view('templates/footer');
	}

	public function Consulta()
	{
		$data['titulo'] = "Concentrado de Notas";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('notas/consulta', $data);
		$this->load->view('templates/footer');
	}
}