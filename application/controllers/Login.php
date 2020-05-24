<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index(){
		echo "Chegou";
	}

	public function formLogin(){
		$data=$this->input->post();
		//var_dump($data);
		
		$senhaMD5=MD5($data['adm_senha']);
		echo MD5($data['adm_senha']);
		$this->load->model('Login_model');
		$this->Login_model->verificarLogin($data['adm_email'],$senhaMD5);
		$this->load->view('Cadastro');
	}
}
?>