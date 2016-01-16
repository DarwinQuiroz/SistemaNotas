<?php
class Usuario_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function IniciarSesion($usuario)
	{
		$consulta = $this->db->query("SELECT * FROM usuarios WHERE usuario = '".$usuario."' LIMIT 1");

		if($consulta ->num_rows() > 0) return $consulta->row();
		else return false;
	}

	public function RegistrarUsuario($datosUsuario)
	{
		$this->db->insert('usuarios', $datosUsuario);
	}

	public function ObtenerUsuarios()
	{
		$query = $this->db->get('usuarios');

		if ($query->num_rows() > 0) return $query;
		else return false;
	}

	public function ObtenerUsuario($id)
	{
		$this->db->where('idusuario', $id);
		$query = $this->db->get('usuarios');

		if ($query->num_rows() > 0) return $query;
		else return false;

	}

	public function ActualizarUsuario($id, $datosUsuario)
	{
		$this->db->where('idusuario', $id);
		$this->db->update('usuarios', $datosUsuario);
	}

	public function EliminarUsuario($id)
	{
		$this->db->where('idusuario', $id);
		$this->db->delete('usuarios');
	}
}
?>