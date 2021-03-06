<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profesor extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Profesor_model');
		$this->load->library('form_validation');
		if(!$this->session->userdata('login'))
		{
			redirect(base_url());
		}
	}

	private function Validar()
	{
		$this->form_validation->set_rules('facultad', 'Facultad', 'required');
		$this->form_validation->set_rules('cedula', 'Cedula', 'required|trim|min_length[11]|max_length[11]|is_unique[profesor.cedula]');
		$this->form_validation->set_rules('nombres', 'Nombres', 'required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('apellidos', 'Apellidos', 'required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|trim|min_length[10]|max_length[11]');
		$this->form_validation->set_rules('direccion', 'Direccion', 'required|trim|min_length[6]|max_length[45]');
		$this->form_validation->set_rules('correo', 'Correo', 'required|trim|valid_email|max_length[50]|valid_email');
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

	public function editar()
	{
		$data['id'] = $this->uri->segment(3);
		$data['profesor'] = $this->Profesor_model->ObtenerProfesor($data['id']);
		$data['titulo'] = "Actualizar Profesor";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('admin/profesores/editar', $data);
		$this->load->view('templates/footer');
	}

	public function actualizar()
	{
		$datosProfesor = [
				'cedula' => $this->input->post('cedula'),
				'nombres' => $this->input->post('nombres'),
				'apellidos' => $this->input->post('apellidos'),
				'telefono' => $this->input->post('telefono'),
				'direccion' => $this->input->post('direccion'),
				'correo' => $this->input->post('correo')
			];
		$this->Profesor_model->ActualizarProfesor($this->input->post('id'), $datosProfesor);
		redirect(base_url()."profesor");
	}

	public function eliminar()
	{
		$id = $this->uri->segment(3);
		$this->Profesor_model->EliminarProfesor($id);
		redirect(base_url()."profesor");
	}
}
?>