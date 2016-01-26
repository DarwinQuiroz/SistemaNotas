<?php
class Alumno_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function ContarAlumnos()
	{
		$number = $this->db->query('SELECT count(*) as numeroAlumnos from alumno')->row();
		return intval($number);
	}

	// public GetPagination($number_per_page)
	// {
	// 	$this->db->get('alumno', $number_per_page, $this->uri->segment(3));
	// }

	public function RegistrarAlumno($datosAlumno)
	{
		$this->db->insert('alumno', $datosAlumno);
	}

	public function ObtenerFacultades()
	{
		$query = $this->db->get('facultad');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function ObtenerAlumnos()
	{
		$this->db->from('alumno')->order_by("idalumno", "desc");
		$consulta = $this->db->query('SELECT facultad.idfacultad, facultad.descripcion, alumno.* FROM alumno INNER JOIN facultad on alumno.idfacultad = facultad.idfacultad');
		if ($consulta->num_rows() > 0) return $consulta;
		else return false;
	}

	public function ObtenerAlumno($id)
	{
		$this->db->where('idalumno', $id);
		$query = $this->db->get('alumno');

		if ($query->num_rows() > 0) return $query;
		else return false;

	}

	public function ActualizarAlumno($id, $datosAlumno)
	{
		$this->db->where('idalumno', $id);
		$this->db->update('alumno', $datosAlumno);
	}

	public function EliminarAlumno($id)
	{
		$this->db->where('idalumno', $id);
		$this->db->delete('alumno');
	}
}
?>