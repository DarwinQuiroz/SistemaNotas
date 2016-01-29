<?php
class Profesor_model extends CI_Model
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

	public function RegistrarProfesor($datosProfesor)
	{
		$this->db->insert('profesor', $datosProfesor);
	}

	public function ObtenerProfesores()
	{
		$query = $this->db->get('profesor');
		$consulta = $this->db->query('SELECT facultad.idfacultad, facultad.descripcion, profesor.* FROM profesor INNER JOIN facultad on profesor.idfacultad = facultad.idfacultad');

		if ($consulta->num_rows() > 0) return $consulta;
		else return false;
	}

	public function ObtenerProfesor($id)
	{
		$this->db->where('idprofesor', $id);
		$query = $this->db->get('profesor');

		if ($query->num_rows() > 0) return $query;
		else return false;

	}

	public function ActualizarProfesor($id, $datosProfesor)
	{
		$this->db->where('idprofesor', $id);
		$this->db->update('profesor', $datosProfesor);
	}

	public function EliminarProfesor($id)
	{
		$this->db->where('idprofesor', $id);
		$this->db->delete('profesor');
	}
}
?>