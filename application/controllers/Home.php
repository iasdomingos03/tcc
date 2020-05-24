<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Home extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		$this->load->view("Home");
	}
}