<?php
class Nota_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function ConcentradoNotas()
	{

	}

	public function ObtenerMaterias()
	{
		$query = $this->db->get('materia');
		if ($query->num_rows() > 0)	return $query;
		else return false;
	}

	public function ObtenerNiveles()
	{
		$query = $this->db->get('nivel');
		if ($query->num_rows() > 0)	return $query;
		else return false;
	}

}
?>