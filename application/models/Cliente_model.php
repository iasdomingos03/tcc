<?php
class Cliente_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));


	}

	public function inserirCliente($data){
		$this->db->insert("tblCliente",$data);
		print_r($this->db->last_query());
	}

	public function exibirDados(){
		$this->db
		->from("tblCliente");//Nome da tabela
		return $this->db->get()->result_array();
	}


	public function verificarLoginCliente($email,$senhaCMD5){
		$this->db
		->from("tblCliente")
		->where("cli_email",$email)
		->where("cli_senha",$senhaCMD5);
		//$result->armazena os registros
		$resultc=$this->db->get();
		//print_r($this->db->last_query());
		
		if($resultc->num_rows()>0){
			return $resultc->row();
		}else{
			return NULL;
		}
	}
}