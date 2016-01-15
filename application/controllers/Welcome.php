<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		// $this->session->sess_destroy();
		$info['titulo'] = "Inicio";
		$this->load->view('templates/header', $info);
		$this->load->view('templates/nav');
		$this->load->view('welcome_message');
		$this->load->view('templates/footer');
	}
}
