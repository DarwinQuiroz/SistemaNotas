<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumno extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Alumno_model');
		$this->load->library('form_validation');
		if(!$this->session->userdata('login'))
		{
			redirect(base_url());
		}
	}

	private function Validar()
	{
		$this->form_validation->set_rules('facultad', 'Facultad', 'required');
		$this->form_validation->set_rules('cedula', 'Cedula', 'required|trim|min_length[11]|max_length[11]|is_unique[alumno.cedula]');
		$this->form_validation->set_rules('nombres', 'Nombres', 'required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|trim|min_length[10]|max_length[11]');
		$this->form_validation->set_rules('direccion', 'Direccion', 'required|trim|min_length[6]|max_length[45]');
		$this->form_validation->set_rules('correo', 'Correo', 'required|trim|valid_email|max_length[50]|valid_email');
	}

	public function index()
	{
		$data['segmento'] = $this->uri->segment(3);
		$data['titulo'] = "Lista de Alumnos";
		$this->load->view('templates/header', $data);

		if(!$data['segmento']) $data['alumnos'] = $this->Alumno_model->ObtenerAlumnos();
		else $data['alumnos'] = $this->Alumno_model->ObtenerAlumno($data['segmento']);

		$this->load->view('templates/nav');
		$this->load->view('admin/alumnos/index', $data);
		$this->load->view('templates/footer');
	}

	public function crear()
	{
		$this->Validar();
		$data['facultades'] = $this->Alumno_model->ObtenerFacultades();
		if ($this->form_validation->run() != FALSE)
		{
			$datosAlumno = [
				'idfacultad' => $_POST['facultad'],
				'cedula' => $this->input->post('cedula'),
				'nombres' => $this->input->post('nombres'),
				'apellidos' => $this->input->post('apellidos'),
				'telefono' => $this->input->post('telefono'),
				'direccion' => $this->input->post('direccion'),
				'correo' => $this->input->post('correo')
			];
			$this->Alumno_model->RegistrarAlumno($datosAlumno);
			redirect(base_url()."alumno");
		}
		else
		{
			$data['titulo'] = "Registrar Alumno";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav');
			$this->load->view('admin/alumnos/crear', $data);
			$this->load->view('templates/footer');
		}
	}

	public function eliminar()
	{
		$id = $this->uri->segment(3);
		$this->Alumno_model->EliminarAlumno($id);
		redirect(base_url()."alumno");
	}
}
?>