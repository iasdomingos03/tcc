<?php
class Login_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));


	}

	// public function inserirLogin($data){
	// 	$this->db->insert("usuarios",$data);
	// }

	public function verificarLogin($email,$senha){
		$this->db
		->from("tbl_Adm")
		->where("adm_email",$email)
		->where("adm_senha",$senha);
		//$result->armazena os registros
		$result=$this->db->get();
		
		if($result->num_rows()>0){
			redirect('index.php/Cadastros/exibeFormulario');
			return true;
		}else{
			redirect('index.php/Restrict');		}
		}
	}