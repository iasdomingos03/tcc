<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->database();
		// $this->load->helper(array('form', 'url'));
		$this->load->library("session");
		$this->load->helper('url');
	}
	public function index(){
		echo "Chegou";
	}

	public function formLogin(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("adm_email","email","required");
		$this->form_validation->set_rules("adm_senha","senha","required");


		if($this->form_validation->run()==false){
			echo "form_validation false";
		}else{
			$data=$this->input->post();
		//var_dump($data);
			$senhaMD5=MD5($data['adm_senha']);
		//echo MD5($data['usu_senha']);
			$this->load->model('Login_model');
			$result=$this->Login_model->verificarLogin($data['adm_email'],$senhaMD5);
			if($result){
				
				$adm_codigo=$result->adm_codigo;
				$adm_email=$result->adm_email;
				$adm_senha=$result->adm_senha;
				
				$this->session->set_userdata("adm_codigo",$adm_codigo);
				$this->session->set_userdata("adm_email",$adm_email);
				$this->session->set_userdata("adm_senha",$adm_senha);
				
				header("Location:".base_url()."Cadastros/exibeFormulario");
			}else{
				echo "erro";
			}
		}
	}

	public function logoffAdm(){
		$this->session->unset_userdata("adm_codigo");
		$this->session->unset_userdata("adm_email");
		$this->session->unset_userdata("adm_senha");

		$this->session->sess_destroy();
		header("Location: ".base_url()."Restrict");
	}
}
?>