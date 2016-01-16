<?php
class Alumno_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	public function ObtenerFacultades()
	{
		$query = $this->db->get('facultad');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function RegistrarAlumno($datosAlumno)
	{
		$this->db->insert('alumno', $datosAlumno);
	}

	public function ObtenerAlumnos()
	{
		$query = $this->db->get('alumno');

		if ($query->num_rows() > 0) return $query;
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