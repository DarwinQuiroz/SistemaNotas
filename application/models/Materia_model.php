<?php
class Materia_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	public function buscar($materia)
	{
		$this->db->like('descripcion', $materia);
		$consulta = $this->db->get('materia');

		if($consulta->num_rows() > 0) return $consulta;
		else return false;
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
		$consulta = $this->db->query('SELECT nivel.idnivel, nivel.descripcion as nivel , materia.idmateria, materia.descripcion, materia.credito FROM nivel INNER JOIN materia ON nivel.idnivel = materia.idnivel');

		if ($consulta->num_rows() > 0) return $consulta;
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