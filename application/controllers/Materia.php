<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materia extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Materia_model');
		$this->load->library('form_validation');
		// $this->load->library('pagination');
		if(!$this->session->userdata('login'))
		{
			redirect(base_url());
		}
	}

	private function Validar()
	{
		$this->form_validation->set_rules('nivel', 'Nivel', 'required');
		$this->form_validation->set_rules('materia', 'Materia', 'required|trim|min_length[5]|is_unique[materia.descripcion]');
		$this->form_validation->set_rules('creditos', 'Creditos', 'required');
	}

	public function index()
	{
		// $config['base_url'] = base_url().'materia';
		// $config['total_row'] = 50; //cantidad de materias guardadas
		// $config['per_page'] = 5;
		// $this->pagination->initialize($config);
		$data['segmento'] = $this->uri->segment(3);
		$data['titulo'] = "Lista de Materias";
		// $data['niveles'] = $this->Materia_model->ObtenerNiveles();
		$this->load->view('templates/header', $data);

		if(!$data['segmento']) $data['materias'] = $this->Materia_model->ObtenerMaterias();
		else $data['materias'] = $this->Materia_model->ObtenerMateria($data['segmento']);

		$this->load->view('templates/nav');
		$this->load->view('admin/materias/index', $data);
		$this->load->view('templates/footer');
	}

	public function crear()
	{
		$this->Validar();
		$data['niveles'] = $this->Materia_model->ObtenerNiveles();
		if ($this->form_validation->run() != FALSE)
		{
			$idNivel = $_POST['nivel'];
			$datosMateria = [
				'idnivel' => $idNivel,
				'descripcion' => $this->input->post('materia'),
				'credito' => $this->input->post('creditos'),
				'estado' => "Reprobada"
			];
			$this->Materia_model->RegistrarMateria($datosMateria);
			redirect(base_url()."materia");
		}
		else
		{
			$data['titulo'] = "Registrar Materia";
			$this->load->view('templates/header', $data);
			$this->load->view('templates/nav');
			$this->load->view('admin/materias/crear', $data);
			$this->load->view('templates/footer');
		}
	}

	public function editar()
	{
		$data['niveles'] = $this->Materia_model->ObtenerNiveles();
		$data['id'] = $this->uri->segment(3);
		$data['materia'] = $this->Materia_model->ObtenerMateria($data['id']);
		$data['titulo'] = "Actualizar Materia";
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav');
		$this->load->view('admin/materias/editar', $data);
		$this->load->view('templates/footer');
	}

	public function actualizar()
	{
		$datosMateria = [
				'descripcion' => $this->input->post('materia'),
				'credito' => $this->input->post('creditos'),
			];
		$this->Materia_model->ActualizarMateria($this->input->post('id'), $datosMateria);
		redirect(base_url()."materia");
	}

	public function eliminar()
	{
		$id = $this->uri->segment(3);
		$this->Materia_model->EliminarMateria($id);
		redirect(base_url()."materia");
	}
}
?>