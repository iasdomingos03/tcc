<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Home extends CI_Controller{

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		// $this->load->library("session");
		$this->load->helper('url');
	}

	public function index(){
		$this->load->model('Teste_model');
		$this->load->view("Home");
	}
}