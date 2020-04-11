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
	// public function ano(){
	// 	//get_where equivale ao where
	// 	$this->db->get_where("tbl_produtosJogos", array('jog_anoLancamento'=>'2007'));
	// $result=$this->db->get();
	// 	return $result->num_rows();
	// }

	
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

	public function inserirModelo($data){
		$this->db->insert("tbl_modelo",$data);//nome da tabela
	}

	public function exibirModelo(){
		$this->db
		->from("tbl_modelo");//Nome da tabela
		return $this->db->get()->result_array();
	}

	public function inserirMarca($data){
		$this->db->insert("tbl_marca1",$data);//nome da tabela
	}

	public function exibirMarca(){
		$this->db
		->from("tbl_marca1");//Nome da tabela
		return $this->db->get()->result_array();
	}
	public function inserirPecas($pecas){
		$this->db->insert("tbl_pecasComputador",$pecas);//nome da tabela
	}

	public function exibirPecas(){
		$this->db
		->from("tbl_pecasComputador");//Nome da tabela
		return $this->db->get()->result_array();
	}
	public function inserirCategoriaPecas($pecas){
		$this->db->insert("tbl_categoriaPecas",$pecas);//nome da tabela
	}

	public function exibirCategoriaPecas(){
		$this->db
		->from("tbl_categoriaPecas");//Nome da tabela
		return $this->db->get()->result_array();
	}

	public function inserirComputador($com){
		$this->db->insert("tbl_produtoComputador",$com);//nome da tabela
	}

	public function exibirComputador(){
		$this->db
		->from("tbl_produtoComputador");//Nome da tabela
		return $this->db->get()->result_array();
	}
}

?>