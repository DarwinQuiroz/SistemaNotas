<?php
class Nivel_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function ObtenerPeriodo()
	{
		$query = $this->db->get('periodo');
		if ($query->num_rows() > 0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}

	public function ObtenerLectivo()
	{
		$query = $this->db->get('añolectivo');
		if ($query->num_rows() > 0)
		{
			return $query;
		}
		else
		{
			return false;
		}
	}
}
?>