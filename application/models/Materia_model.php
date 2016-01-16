<?php
class Materia_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	public function ObtenerNiveles()
	{
		$query = $this->db->get('nivel');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function RegistrarMateria($datosMateria)
	{
		$this->db->insert('materia', $datosMateria);
	}

	public function ObtenerMaterias()
	{
		$query = $this->db->get('materia');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function ObtenerMateria($id)
	{
		$this->db->where('idmateria', $id);
		$query = $this->db->get('materia');

		if ($query->num_rows() > 0) return $query;
		else return false;

	}

	public function ActualizarMateria($id, $datosMateria)
	{
		$this->db->where('idmateria', $id);
		$this->db->update('materia', $datosMateria);
	}

	public function EliminarMateria($id)
	{
		$this->db->where('idmateria', $id);
		$this->db->delete('materia');
	}
}
?>