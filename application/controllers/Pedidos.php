<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Pedidos extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		echo "Esse é o controller do Pedidos";
	}
	public function exibePedidos(){	
		$this->load->model('Teste_model');
		$forms= $this->Teste_model->exibirJogos();

		$data=array(
			"forms"=>$forms
		);
		$this->load->view("ExibePedidos",$data);
	}
}