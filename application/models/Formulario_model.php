<?php
class Formulario_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function inserirJogos($data){
		$this->db->insert("tbl_produtosJogos",$data);//nome da tabela
		// $this->load->view("Cadastro");
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

	/*---------INICIO CATEGORIA---------------------------------------------*/	
	public function inserirCategoria($data){
		$this->db->insert("tbl_categoriaJogos",$data);//nome da tabela
	}
	public function exibirCategoria(){
		$this->db
		->from("tbl_categoriaJogos");//Nome da tabela
		return $this->db->get();
		//return $this->db->get()->result_array();
	}
	public function selectCategoria(){
		//O primeiro não funciona ???? pq?
		$categoriaOptions="<option value=''>Selecione a categoria</option>";
		$cat_codigo=$this->exibirCategoria();
		foreach ($cat_codigo->result_array() as $cat) {
			?>
			$categoriaOptions.=<option value="<?php echo $cat['cat_codigo']?>"><?php echo $cat['cat_categoria'] ?></option>
			<?php
		}
		?>
		<?php
	}
	/*-----------FIM CATEGORIA-----------------*/	


	/*---------INICIO CATEGORIA---------------------------------------------*/	

	public function inserirClassificacao($data){
$this->db->insert("tbl_classificacao",$data);//nome da tabela
}
public function exibirClassificacao(){
	$this->db
->from("tbl_classificacao");//Nome da tabela
//return $this->db->get()->result_array();
return $this->db->get();
}
public function selectClassificacao(){
	$classificacaoOptions="<option value=''>Selecione a classificacao</option>";
	$cla_codigo=$this->exibirClassificacao();
	foreach ($cla_codigo->result_array() as $cla) {
		?>
		$classificacaoOptions.=<option value="<?php echo $cla['cla_codigo']?>"><?php echo $cla['cla_classificacao'] ?></option>
		<?php
	}
	?>
	<?php
}
/*-----------FIM CLASSIFICACAO-----------------*/	

/*---------INICIO FORNECEDOR---------------------------------------------*/	

public function inserirFornecedor($data){
	$this->db->insert("tbl_fornecedor",$data);
}
public function exibirFornecedor(){
	$this->db
->from("tbl_fornecedor");//Nome da tabela
//return $this->db->get()->result_array();
return $this->db->get();
}
public function selectFornecedor(){
	$fornecedorOptions="<option value=''>Selecione o fornecedor</option>";
	$for_cnpj=$this->exibirFornecedor();
	foreach ($for_cnpj->result_array() as $for) {
		?>
		$fornecedorOptions.=<option value="<?php echo $for['for_cnpj']?>"><?php echo $for['for_nomeFantasia'] ?></option>
		<?php
	}
	?>
	<?php
}
/*-----------FIM FORNECEDOR-----------------*/	

/*---------INICIO MODELO---------------------------------------------*/	

public function inserirModelo($data){
$this->db->insert("tbl_modelo",$data);//nome da tabela
}
public function exibirModelo(){
	$this->db
->from("tbl_modelo");//Nome da tabela
//return $this->db->get()->result_array();
return $this->db->get();
}
public function selectModelo(){
	$modeloOptions="<option value=''>Selecione o Modelo</option>";
	$mod_codigo=$this->exibirModelo();
	foreach ($mod_codigo->result_array() as $mod) {
		?>
		$modeloOptions.=<option value="<?php echo $mod['mod_codigo']?>"><?php echo $mod['mod_modelo'] ?></option>
		<?php
	}
	?>
	<?php
}
/*-----------FIM FORNECEDOR-----------------*/	


/*---------INICIO MARCA---------------------------------------------*/	

public function inserirMarca($data){
$this->db->insert("tbl_marca1",$data);//nome da tabela
}
public function exibirMarca(){
	$this->db
->from("tbl_marca1");//Nome da tabela
//return $this->db->get()->result_array();
return $this->db->get();
}
public function selectMarca(){
	$marcaOptions="<option value=''>Selecione a Marca</option>";
	$mar_codigo=$this->exibirMarca();
	foreach ($mar_codigo->result_array() as $mar) {
		?>
		$marcaOptions.=<option value="<?php echo $mar['mar_codigo']?>"><?php echo $mar['mar_marca'] ?></option>
		<?php
	}
	?>
	<?php

}
/*-----------FIM MARCA-----------------*/	

public function inserirPecas($pecas){
$this->db->insert("tbl_pecasComputador",$pecas);//nome da tabela
}
public function exibirPecas(){
	$this->db
->from("tbl_pecasComputador");//Nome da tabela
return $this->db->get()->result_array();
}

/*-----------INICIO CATEGORIA PECAS-----------------*/	
public function inserirCategoriaPecas($pecas){
$this->db->insert("tbl_categoriaPecas",$pecas);//nome da tabela
}
public function exibirCategoriaPecas(){
	$this->db
->from("tbl_categoriaPecas");//Nome da tabela
//return $this->db->get()->result_array();
return $this->db->get();
}
public function selectCategoriaPecas(){
	$catPecasOptions="<option value=''>Selecione a Marca</option>";
	$catp_codigo=$this->exibirCategoriaPecas();
	foreach ($catp_codigo->result_array() as $catp) {
		?>
		$catPecasOptions.=<option value="<?php echo $catp['catp_codigo']?>"><?php echo $catp['catp_nome'] ?></option>
		<?php
	}
	?>
	<?php
}
/*-----------FIM CATEGORIA PECAS-----------------*/	
public function inserirComputador($com){
$this->db->insert("tbl_produtoComputador",$com);//nome da tabela
}
public function exibirComputador(){
	$this->db
->from("tbl_produtoComputador");//Nome da tabela
return $this->db->get()->result_array();
}

public function inserirTipoManutencao($data){
$this->db->insert("tbl_tipoManutencao",$data);//nome da tabela
}
public function exibirTipoManutencao(){
	$this->db
->from("tbl_tipoManutencao");//Nome da tabela
return $this->db->get()->result_array();
}

}

?>