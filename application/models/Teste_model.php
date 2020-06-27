<?php
class Teste_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

//--------------EXIBIR-----------------------------------
	public function exibirJogos(){
		
		$this->db->from("tbl_produtosJogos");//Nome da tabela
		return $this->db->get();
	}
	public function exibirComputador(){
		$this->db
		->from("tbl_produtoComputador");//Nome da tabela
		return $this->db->get();
	}


	public function exibirManutencao(){
		$this->db
		->from("tbl_tipoManutencao");//Nome da tabela
		return $this->db->get();
	}

	public function exibirPecasComputador(){
		$this->db
		->from("tbl_pecasComputador");//Nome da tabela
		return $this->db->get();
	}

	//-------------------UPDATES-----------------------

	public function updateJogos($codigo,$jogos){
//$result_cursos = "UPDATE cursos SET nome='$nome', detalhes =  '$detalhes' WHERE id = '$id'";
$this->db->where('pro_codigo', $codigo); //where
$this->db->update('tbl_produtosJogos',$jogos);//update
 //print_r($this->db->last_query());    
}

public function updateComputador($codigo,$computador){
//$result_cursos = "UPDATE cursos SET nome='$nome', detalhes =  '$detalhes' WHERE id = '$id'";
$this->db->where('com_codigo', $codigo); //where
 $this->db->update('tbl_produtoComputador',$computador);//update
 // print_r($this->db->last_query());    
}
public function updateManutencao($codigo,$tipomanutencao){
//$result_cursos = "UPDATE cursos SET nome='$nome', detalhes =  '$detalhes' WHERE id = '$id'";
$this->db->where('tman_codigo', $codigo); //where
 $this->db->update('tbl_tipoManutencao',$tipomanutencao);//update
 // print_r($this->db->last_query());    
}

public function updatePecas($codigo,$pecas){
//$result_cursos = "UPDATE cursos SET nome='$nome', detalhes =  '$detalhes' WHERE id = '$id'";
$this->db->where('pec_codigo', $codigo); //where
 $this->db->update('tbl_pecasComputador',$pecas);//update
}


//-------------------------SELECTS-----------------------------------------------------
public function selectCategoria(){
	$this->load->model('Formulario_model');
	$categoriaOptions="<option value='0'>Selecione a categoria</option>";
	$cat_codigo=$this->Formulario_model->exibirCategoria();
	foreach ($cat_codigo->result_array() as $cat) {
		?>
		$categoriaOptions.=<option value="<?php echo $cat['cat_codigo']?>"><?php echo $cat['cat_categoria'] ?></option>
		<?php
	}
	?>
	<?php
}

public function selectClassificacao(){
	$this->load->model('Formulario_model');
	$classificacaoOptions="<option value=''>Selecione a classificacao</option>";
	$cla_codigo=$this->Formulario_model->exibirClassificacao();
	foreach ($cla_codigo->result_array() as $cla) {
		?>
		$classificacaoOptions.=<option value="<?php echo $cla['cla_codigo']?>"><?php echo $cla['cla_classificacao'] ?></option>
		<?php
	}
	?>
	<?php
}

public function selectFornecedor(){
	$this->load->model('Formulario_model');
	$fornecedorOptions="<option value=''>Selecione o fornecedor</option>";
	$for_cnpj=$this->Formulario_model->exibirFornecedor();
	foreach ($for_cnpj->result_array() as $for) {
		?>
		$fornecedorOptions.=<option value="<?php echo $for['for_cnpj']?>"><?php echo $for['for_nomeFantasia'] ?></option>
		<?php
	}
	?>
	<?php
}

public function selectModelo(){
	$this->load->model('Formulario_model');
	$modeloOptions="<option value=''>Selecione o Modelo</option>";
	$mod_codigo=$this->Formulario_model->exibirModelo();
	foreach ($mod_codigo->result_array() as $mod) {
		?>
		$modeloOptions.=<option value="<?php echo $mod['mod_codigo']?>"><?php echo $mod['mod_modelo'] ?></option>
		<?php
	}
	?>
	<?php
}

public function selectMarca(){
	$this->load->model('Formulario_model');
	$marcaOptions="<option value=''>Selecione a Marca</option>";
	$mar_codigo=$this->Formulario_model->exibirMarca();
	foreach ($mar_codigo->result_array() as $mar) {
		?>
		$marcaOptions.=<option value="<?php echo $mar['mar_codigo']?>"><?php echo $mar['mar_marca'] ?></option>
		<?php
	}
	?>
	<?php
}

public function selectCategoriaPecas(){
	$this->load->model('Formulario_model');
	$catPecasOptions="<option value=''>Selecione a Marca</option>";
	$catp_codigo=$this->Formulario_model->exibirCategoriaPecas();
	foreach ($catp_codigo->result_array() as $catp) {
		?>
		$catPecasOptions.=<option value="<?php echo $catp['catp_codigo']?>"><?php echo $catp['catp_nome'] ?></option>
		<?php
	}
	?>
	<?php
}

// --------------------------INNERS----------------------------------------------
public function innerJoinCategoria($pro_codigo)
{
	/*QUERY OK */
	$query=$this->db->select("tbl_categoriaJogos.cat_categoria")
	->join("tbl_categoriaJogos","tbl_categoriaJogos.cat_codigo=tbl_produtosJogos.pro_categoria")
	->where("pro_codigo=$pro_codigo")
	->get("tbl_produtosJogos")->result();
	return $query;

	print_r($this->db->last_query()); 
}

public function innerJoinFornecedor($pro_codigo){
	$query=$this->db->select("tbl_fornecedor.for_nomeFantasia")
	->join("tbl_fornecedor","tbl_fornecedor.for_cnpj=tbl_produtosJogos.pro_fornecedor")
	->where("pro_codigo=$pro_codigo")
	->get("tbl_produtosJogos")->result();
	return $query;

	print_r($this->db->last_query()); 
}

public function innerJoinClassificacao($pro_codigo){
	$query=$this->db->select("tbl_classificacao.cla_classificacao")
	->join("tbl_classificacao","tbl_classificacao.cla_codigo=tbl_produtosJogos.pro_classificacao")
	->where("pro_codigo=$pro_codigo")
	->get("tbl_produtosJogos")->result();
	return $query;

	print_r($this->db->last_query()); 
}

public function innerJoinMarca($com_codigo){
	$query=$this->db->select("tbl_marca1.mar_marca")
	->join("tbl_marca1","tbl_marca1.mar_codigo=tbl_produtoComputador.com_marca")
	->where("com_codigo=$com_codigo")
	->get("tbl_produtoComputador")->result();
	return $query;

	print_r($this->db->last_query()); 
}	

public function innerJoinModelo($com_codigo){
	$query=$this->db->select("tbl_modelo.mod_modelo")
	->join("tbl_modelo","tbl_modelo.mod_codigo=tbl_produtoComputador.com_modelo")
	->where("com_codigo=$com_codigo")
	->get("tbl_produtoComputador")->result();
	return $query;

	print_r($this->db->last_query()); 
}

public function innerJoinCategoriaPecas($pec_codigo)
{
	/*QUERY OK */
	$query=$this->db->select("tbl_categoriaPecas.catp_nome")
	->join("tbl_categoriaPecas","tbl_categoriaPecas.catp_codigo=tbl_pecasComputador.pec_categoria")
	->where("pec_codigo=$pec_codigo")
	->get("tbl_pecasComputador")->result();
	return $query;

	print_r($this->db->last_query()); 
}

public function innerJoinFornecedorPecas($pec_codigo){
	$query=$this->db->select("tbl_fornecedor.for_nomeFantasia")
	->join("tbl_fornecedor","tbl_fornecedor.for_cnpj=tbl_pecasComputador.pec_fornecedor")
	->where("pec_codigo=$pec_codigo")
	->get("tbl_pecasComputador")->result();
	return $query;

	print_r($this->db->last_query()); 
}

public function innerJoinModeloPecas($pec_codigo){
	$query=$this->db->select("tbl_modelo.mod_modelo")
	->join("tbl_modelo","tbl_modelo.mod_codigo=tbl_pecasComputador.pec_modelo")
	->where("pec_codigo=$pec_codigo")
	->get("tbl_pecasComputador")->result();
	return $query;

	print_r($this->db->last_query()); 
}

public function innerJoinMarcaPecas($pec_codigo){
	$query=$this->db->select("tbl_marca1.mar_marca")
	->join("tbl_marca1","tbl_marca1.mar_codigo=tbl_pecasComputador.pec_marca")
	->where("pec_codigo=$pec_codigo")
	->get("tbl_pecasComputador")->result();
	return $query;

	print_r($this->db->last_query()); 
}	
/*-----------------------RANDOM DAS TABELAS ----------------------------------*/
public function randonComputador(){
	$this->db
	->order_by('rand()')
		->from("tbl_produtoComputador")
		->where('com_status',1);;//Nome da tabela
		return $this->db->get();
	}

	public function randonJogos(){
		$this->db
		->order_by('rand()')
		->from("tbl_produtosJogos")
		->where('pro_status',1);//Nome da tabela
		return $this->db->get();
	}

	public function randonPecas(){
		$this->db
		->order_by('rand()')
		->from("tbl_pecasComputador")
		->where('pec_status',1);;//Nome da tabela
		return $this->db->get();
	}

// 	/*--------------------------STATUS DOS PRODUTOS-------------------------------*/
// 	public function updateStatusJogos($statusJogos,$codigo){
// //$result_cursos = "UPDATE cursos SET nome='$nome', detalhes =  '$detalhes' WHERE id = '$id'";
//  //print_r($this->db->last_query());    
// 	$this->db->set('pro_status',$statusJogos);
// 	$this->db->where('pro_codigo',$codigo);
// 	$this->db->update('tbl_produtosJogos');//update
// }

// public function updateStatusComputador($codigo,$computador){
// //$result_cursos = "UPDATE cursos SET nome='$nome', detalhes =  '$detalhes' WHERE id = '$id'";
// $this->db->where('com_codigo', $codigo); //where
//  $this->db->update('tbl_produtoComputador',$computador);//update
//  // print_r($this->db->last_query());    
// }
// public function updateStatusManutencao($codigo,$tipomanutencao){
// //$result_cursos = "UPDATE cursos SET nome='$nome', detalhes =  '$detalhes' WHERE id = '$id'";
// $this->db->where('tman_codigo', $codigo); //where
//  $this->db->update('tbl_tipoManutencao',$tipomanutencao);//update
//  // print_r($this->db->last_query());    
// }

// public function updateStatusPecas($codigo,$pecas){
// //$result_cursos = "UPDATE cursos SET nome='$nome', detalhes =  '$detalhes' WHERE id = '$id'";
// $this->db->where('pec_codigo', $codigo); //where
//  $this->db->update('tbl_pecasComputador',$pecas);//update
// }



}	

