<?php
class Login_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');


	}

	// public function inserirLogin($data){
	// 	$this->db->insert("usuarios",$data);
	// }

	public function verificarLogin($email,$senhaMD5){
		
		$this->db
		->from("tbl_Adm")
		->where("adm_email",$email)
		->where("adm_senha",$senhaMD5);
		//$result->armazena os registros
		$result=$this->db->get();
		
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return NULL;
			echo "verificarLogin erro";
		}
	}
}