<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Nivel_model');
		$this->load->model('Nota_model');
		$this->load->model('Alumno_model');
		$this->load->library('form_validation');
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

	public function GuardarEleccion()
	{
	//	$id['ids'] = $_POST['materia'];
	//	echo $id['ids'];
		$materias=$_POST['materias'];
		
		for ($i=0; $i < count($materias); $i++) 
		{ 
			echo $materias[$i]."<br>";
		}
	}

	public function Consulta()
	{
		$this->form_validation->set_rules('cedula', 'Cedula', 'required');
		$data['cedula'] = $this->input->post('cedula');
		if ($this->form_validation->run() != FALSE)
		{
			$data['titulo'] = "Concentrado de Notas";
			$data['notas'] = $this->Nota_model->ConsultaNota($data['cedula']);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav');
			$this->load->view('notas/consulta', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			redirect(base_url().'notas');
		}
	}

	public function ingresar()
	{

		if(!$this->session->userdata('login'))
		{
			redirect(base_url());
		}
		else
		{
			// if ($this->form_validation->run() != FALSE)
			// {
				$data['materias'] = $this->Nota_model->ObtenerMaterias();
				$data['alumnos'] = $this->Alumno_model->ObtenerAlumnos();
				$data['titulo'] = "Ingresar Notas";
				$this->load->view('templates/header', $data);
				$this->load->view('templates/nav');
				$this->load->view('admin/notas/ingresar', $data);
				$this->load->view('templates/footer');
				//redirect(base_url().'notas/ingresar');
			// }
		}
	}

	public function registrarNota()
	{
		// $this->form_validation->set_rules('alumno', 'Alumno', 'required');
		// $this->form_validation->set_rules('materia', 'Materia', 'required');
		// $this->form_validation->set_rules('nota', 'Nota', 'required');
		$this->Nota_model->registrarNota($_POST['parcial'], $_POST['materia'], $this->input->post('nota'));
		// redirect(base_url().'nota');
		print $_POST['parcial'];
		print $_POST['materia'];
		print $this->input->post('nota');
		redirect(base_url().'notas/ingresar');
	}
}
