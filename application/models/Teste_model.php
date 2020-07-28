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
		->where('com_status',1);//Nome da tabela
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
		->where('pec_status',1);//Nome da tabela
		return $this->db->get();
	}
	/*-----------------------Manutencao  ----------------------------------*/
	public function selecionaCliente($cli_cpf){
		$this->db->select("cli_nome,cli_email")
		->from("tblCliente")
		->where("cli_cpf=$cli_cpf");
		return $this->db->get();
	}

	public function selecionaCliente01(){
		$CI = & get_instance();
		$CI->load->library('session');
		$cpf=$CI->session->userdata('cli_cpf');
		$this->db->select("cli_nome,cli_email")
		->from("tblCliente")
		->where("cli_cpf=$cpf");
		return $this->db->get();
	}
	public function mandaManutencao($dataPed){
		$this->db->insert("tbl_pedidoManutencao",$dataPed);
	}
	public function mandaManutencaoItens($dataIped){
		$this->db->insert("tbl_itensPedidoManutencao",$dataIped);
	}

	public function exibeMandaManutencao(){
		$this->db->from("tbl_pedidoManutencao");
		return $this->db->get();		

	}
	public function exibeMandaItensManutencao($pman_codigo){
		$this->db->select("tbl_itensPedidoManutencao.pman_codigo,tbl_itensPedidoManutencao.ipm_codigo,tbl_tipoManutencao.tman_nome,tbl_tipoManutencao.tman_codigo, tbl_itensPedidoManutencao.pman_descricao")
		->join("tbl_itensPedidoManutencao",
			"tbl_tipoManutencao.tman_codigo=tbl_itensPedidoManutencao.tman_codigo")
		->where("pman_codigo=$pman_codigo");
		$query = $this->db->get('tbl_tipoManutencao');
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
		
	}


	/***************com sessão************************************/
	public function exibeMandaManutencao01($cpf){
		$CI = & get_instance();
		$CI->load->library('session');
		$CI->db->from("tbl_pedidoManutencao")
		->where("cli_cpf=$cpf");
		return $CI->db->get();		

	}
	public function exibeMandaItensManutencao01($pman_codigo){
		$CI = & get_instance();
		$CI->load->library('session');
		$CI->db->select("tbl_itensPedidoManutencao.pman_codigo,tbl_itensPedidoManutencao.ipm_codigo,tbl_tipoManutencao.tman_nome,tbl_tipoManutencao.tman_codigo, tbl_itensPedidoManutencao.pman_descricao")
		->join("tbl_itensPedidoManutencao",
			"tbl_tipoManutencao.tman_codigo=tbl_itensPedidoManutencao.tman_codigo")
		->where("pman_codigo=$pman_codigo");
		$query = $CI->db->get('tbl_tipoManutencao');
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
	}

	public function exibeMandaMontagem01($cpf){
		$CI = & get_instance();
		$CI->load->library('session');
		$CI->db->from("tbl_pedidoMontagem")
		->where("cli_cpf=$cpf");
		return $CI->db->get();		

	}

	public function exibeMandaItensMontagem01($pmon_codigo){
		$CI = & get_instance();
		$CI->load->library('session');
		$CI->db->select("tbl_itensMontagem.mon_codigo,tbl_itensMontagem.pmon_codigo, tbl_pecasComputador.pec_nome, tbl_pecasComputador.pec_codigo,tbl_categoriaPecas.catp_codigo,tbl_categoriaPecas.catp_nome")
		->join("tbl_pecasComputador","tbl_pecasComputador.pec_codigo=tbl_itensMontagem.pec_codigo")
		->join("tbl_categoriaPecas","tbl_pecasComputador.pec_categoria=tbl_categoriaPecas.catp_codigo")
		->where("pmon_codigo=$pmon_codigo");
		$query = $CI->db->get('tbl_itensMontagem');
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
		
	}
	/*----------------------- Montagem ----------------------------------*/

	public function mandaMontagem($dataPedMon){
		$this->db->insert("tbl_pedidoMontagem",$dataPedMon);
	}
	public function mandaMontagemItens($monArray){
		$this->db->insert("tbl_itensMontagem",$monArray);
	}
	public function exibirPecaspCategoria($catp_codigo){
		$this->db->from("tbl_pecasComputador")
		->where("pec_categoria=$catp_codigo");//Nome da tabela
		return $this->db->get();
	}
	public function exibeMandaMontagem(){
		$this->db->from("tbl_pedidoMontagem");
		return $this->db->get();		

	}
	public function mostrarPecaspCategoriaCliente($monArray){
		$tamanho=count($monArray);
		foreach ($monArray as $row) {
			for($a=0;$a<$tamanho;$a++){
				$data[$a] = $row;

				// print_r($data);
				$this->db->select(" tbl_pecasComputador.pec_nome, tbl_categoriaPecas.catp_nome")
				->join("tbl_categoriaPecas","tbl_pecasComputador.pec_categoria=tbl_categoriaPecas.catp_codigo")
				->where("catp_codigo",$data[0]['catp_codigo'])
				->where("pec_codigo",$data[0]['pec_codigo']);
				$query=$this->db->get("tbl_pecasComputador");
			}
		}
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}else{
			echo "Não há registros!";
		}
		return $data;
	}
	
	public function exibeMandaItensMontagem($pmon_codigo){
		$this->db->select("tbl_itensMontagem.mon_codigo,tbl_itensMontagem.pmon_codigo, tbl_pecasComputador.pec_nome, tbl_pecasComputador.pec_codigo,tbl_categoriaPecas.catp_codigo,tbl_categoriaPecas.catp_nome")
		->join("tbl_pecasComputador","tbl_pecasComputador.pec_codigo=tbl_itensMontagem.pec_codigo")
		->join("tbl_categoriaPecas","tbl_pecasComputador.pec_categoria=tbl_categoriaPecas.catp_codigo")
		->where("pmon_codigo=$pmon_codigo");
		$query = $this->db->get('tbl_itensMontagem');
		$data = array();
		if($query !== FALSE && $query->num_rows() > 0){
			foreach ($query->result_array() as $row) {
				$data[] = $row;
			}
		}
		return $data;
		
	}
	/*-----------------------PESQUISAS ----------------------------------*/
	public function pesquisaJogos($txtBuscaJogo){
		$this->db->from("tbl_produtosJogos");
		$this->db->like('pro_titulo',$txtBuscaJogo)
		->where('pro_status',1);
		return $this->db->get();
	}

	public function pesquisaComputador($txtBuscaComputador){
		$this->db->from("tbl_produtoComputador");
		$this->db->like('com_nome',$txtBuscaComputador)
		->where('com_status',1);
		return $this->db->get();
	}

	public function pesquisaPeca($txtBuscaPeca){
		$this->db->from("tbl_pecasComputador");
		$this->db->like('pec_nome',$txtBuscaPeca)
		->where('pec_status',1);
		return $this->db->get();
	}

	public function pesquisaCategoria(){
		$this->load->model('Formulario_model');
		$catCodigo=$this->Formulario_model->selectCategoria();
		$this->db->from("tbl_produtosJogos")
		->where('pro_status',1)
		->where('pro_categoria',$catCodigo);
		return $this->db->get();
		print_r($this->db->last_query()); 

	}


	/*-----------------------EXIBICAO PARA O USUARIO ----------------------------------*/

	public function exibirJogos1(){

		$this->db->from("tbl_produtosJogos")
		->where('pro_status',1);//Nome da tabela
		return $this->db->get();
	}
	public function exibirComputador1(){
		$this->db
		->from("tbl_produtoComputador")
		->where('com_status',1);//Nome da tabela
		return $this->db->get();
	}


	public function exibirManutencao1(){
		$this->db
		->from("tbl_tipoManutencao")
		->where('tman_status',1);//Nome da tabela
		return $this->db->get();
	}

	public function exibirPecasComputador1(){
		$this->db
		->from("tbl_pecasComputador")
		->where('pec_status',1);//Nome da tabela
		return $this->db->get();
	}

}	

