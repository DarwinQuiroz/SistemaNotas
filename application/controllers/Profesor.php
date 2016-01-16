<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Profesor_model');
		$this->load->library('form_validation');
	}

	private function Validar()
	{
		$this->form_validation->set_rules('facultad', 'Facultad', 'required');
		$this->form_validation->set_rules('cedula', 'Cedula', 'required|trim|min_length[11]');
		$this->form_validation->set_rules('nombres', 'Nombres', 'required|min_length[11]');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'required|min_length[11]');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|trim|min_length[10]');
		$this->form_validation->set_rules('direccion', 'Direccion', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('correo', 'Correo', 'required|trim|valid_email');
	}

	public function index()
	{
		$data['segmento'] = $this->uri->segment(3);
		$data['titulo'] = "Lista de Profesores";
		$data['facultades'] = $this->Profesor_model->ObtenerFacultades();
		$this->load->view('templates/header', $data);

		if(!$data['segmento']) $data['profesores'] = $this->Profesor_model->ObtenerProfesores();
		else $data['profesores'] = $this->Profesor_model->ObtenerProfesor($data['segmento']);

		$this->load->view('templates/nav');
		$this->load->view('admin/profesores/index', $data);
		$this->load->view('templates/footer');
	}

	public function crear()
	{
		$this->Validar();
		$data['facultades'] = $this->Profesor_model->ObtenerFacultades();
		if ($this->form_validation->run() != FALSE)
		{
			$idFacultad = $_POST['facultad'];
			$datosProfesor = [
				'idfacultad' => $idFacultad,
				'cedula' => $this->input->post('cedula'),
				'nombres' => $this->input->post('nombres'),
				'apellidos' => $this->input->post('apellidos'),
				'telefono' => $this->input->post('telefono'),
				'direccion' => $this->input->post('direccion'),
				'correo' => $this->input->post('correo')
			];
			$this->Profesor_model->RegistrarProfesor($datosProfesor);
			redirect(base_url()."profesor");
		}
		else
		{
			$data['titulo'] = "Registrar Profesor";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav');
			$this->load->view('admin/profesores/crear', $data);
			$this->load->view('templates/footer');
		}
	}

	public function eliminar()
	{
		$id = $this->uri->segment(3);
		$this->Profesor_model->EliminarProfesor($id);
		redirect(base_url()."profesor");
	}
}
?>