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
		//print_r($this->db->last_query());
	}

	public function exibirDados(){
		$this->db
		->from("tblCliente");//Nome da tabela
		return $this->db->get()->result_array();
	}

	public function exibirDado($semail,$ssenha){
		$this->db
		->from("tblCliente")
		->where("cli_email",$semail)
		->where("cli_senha",$ssenha);//Nome da tabela
		$exibec=$this->db->get();
		//print_r($this->db->last_query());

		if($exibec->num_rows()>0){
			return $exibec;
		}else{
			return NULL;
		}
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

	public function verificarCliente($cpf,$email){
		$this->db
		->from("tblCliente")
		->where("cli_email",$email)
		->or_where("cli_cpf",$cpf);
		//$result->armazena os registros
		$verificac=$this->db->get();
		if($verificac->num_rows()>0){
			return $verificac->row();
		}else{
			return NULL;
		}
		print_r($this->db->last_query());
	}

	public function updateCliente($cpf,$cliente){
		$CI = & get_instance();
		$CI->load->library('session');
		$cpf=$CI->session->userdata('cli_cpf');
//$result_cursos = "UPDATE cursos SET nome='$nome', detalhes =  '$detalhes' WHERE id = '$id'";
	//$this->db->where('cli_cpf', $cpf); //where
		$this->db->where('cli_cpf',$cpf);
	$this->db->update('tblCliente',$cliente);//update
}

public function updateSenha($cpf,$senhaCMD5){
	$CI = & get_instance();
	$CI->load->library('session');
	$cpf=$CI->session->userdata('cli_cpf');
	$senhaCMD5=$CI->session->userdata('cli_senha');
//$result_cursos = "UPDATE cursos SET nome='$nome', detalhes =  '$detalhes' WHERE id = '$id'";
	//$this->db->where('cli_cpf', $cpf); //where
	$this->db->set('cli_senha',$senhaCMD5);
	$this->db->where('cli_cpf',$cpf);
	$this->db->update('tblCliente');//update
}

}