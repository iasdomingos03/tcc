<?php
class Formulario_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function inserirJogos($data){
		$this->db->insert("tbl_produtosJogos",$data);//nome da tabela
	}

	public function exibirDados(){
		$this->db
		->from("tbl_produtosJogos");//Nome da tabela

		return $this->db->get()->result_array();
	}

	public function registros(){
		$this->db
		->from("tbl_produtosJogos");//nome da tabela

		$result=$this->db->get();
		return $result->num_rows();
	}
	public function ano(){
		//get_where equivale ao where
		$this->db->get_where("tbl_produtosJogos", array('jog_anoLancamento'=>'2007'));


		$result=$this->db->get();
		return $result->num_rows();
	}

	
	public function inserirCategoria($data){
		$this->db->insert("tbl_categoriaJogos",$data);//nome da tabela
	}
	
	public function inserirClassificacao($data){
		$this->db->insert("tbl_classificacao",$data);//nome da tabela
	}

	public function exibirClassificacao(){
		$this->db
		->from("tbl_classificacao");//Nome da tabela

		return $this->db->get()->result_array();
	}

	public function exibirCategoria(){
		$this->db
		->from("tbl_categoriaJogos");//Nome da tabela

		return $this->db->get()->result_array();
	}

	public function inserirFornecedor($data){
		$this->db->insert("tbl_fornecedor",$data);
	}

	public function exibirFornecedor(){
		$this->db
		->from("tbl_fornecedor");//Nome da tabela

		return $this->db->get()->result_array();
	}
}

?>