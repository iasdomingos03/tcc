<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Exibir extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		echo "Esse é o controller do Exibir/Alterar";
	}
	public function exibeLista(){	
		$this->load->model('Teste_model');
		$forms= $this->Teste_model->exibirJogos();

		$data=array(
			"forms"=>$forms
		);
		$this->load->view("Listar",$data);
	}

	public function alteraJogo(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->load->model('Teste_model');
		$this->load->model('Formulario_model');
		
		$codigo=$this->input->post('pro_codigo');

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 2000;
		$config['max_width']            = 4000;
		$config['max_height']           = 4000;

		$this->load->library('upload', $config);

		$imagem=array();
//deixa a imagem não obrigatoria
		if ( ! $this->upload->do_upload('pro_foto')){//nome do formulario
			$teste='';
		}else{
			$imagem=$this->upload->data();
			$teste=$imagem['file_name'];
		}
	//*********STATUS JOGOS	
		if(isset($_POST["pro_status"])) {
			$ckb_pro=1;

		} else { 
			$ckb_pro=0;
		}
		$jogos = array(  
			'pro_titulo' => $this->input->post('pro_titulo'),
			'pro_categoria' => $this->input->post('pro_categoria'),
			'pro_fornecedor' => $this->input->post('pro_fornecedor'),
			'pro_classificacao'=>$this->input->post('pro_classificacao'),
			'pro_anoLancamento'=>$this->input->post('pro_anoLancamento'),
			'pro_descricao'=>$this->input->post('pro_descricao'),
			'pro_foto'=>$teste,
			'pro_sinopse'=>$this->input->post('pro_sinopse'),
			'pro_preco' => $this->input->post('pro_preco'),
			'pro_status' =>$ckb_pro
		);
		$this->form_validation->set_rules('pro_titulo','Titulo', 'required|min_length[3]',
			array('required' => "<div class='alert alert-danger'>Preenchimento do Título obrigatório.</div>",
				'min_length' => "<div class='alert alert-danger'>O tamanho mínimo do Título é <b>3</b> caracteres.</div>"));
		$this->form_validation->set_rules('pro_categoria','Categoria', 'required',
			array('required' => "<div class='alert alert-danger'>Preenchimento da Categoria obrigatório.</div>"));
		$this->form_validation->set_rules('pro_fornecedor','Fornecedor','required',array('required' => "<div class='alert alert-danger'>Preenchimento do Fornecedor obrigatório.</div>"));
		$this->form_validation->set_rules('pro_classificacao','Classificacao','required',
			array('required' => "<div class='alert alert-danger'>Preenchimento da Classificacao obrigatório.</div>"));
		$this->form_validation->set_rules('pro_anoLancamento','Ano Lançamento', 'required|exact_length[4]|numeric',
			array('required' => "<div class='alert alert-danger'>Preenchimento do Ano de Lançamento obrigatório.</div>",
				'exact_length'=>"<div class='alert alert-danger'>O Ano de Lançamento deve ser escrito com 4 números</div>",
				'numeric'=>"<div class='alert alert-danger'>O Ano de Lançamento é um campo numérico</div>"));
		$this->form_validation->set_rules('pro_descricao','descricao');
		$this->form_validation->set_rules('pro_sinopse','Sinopse');
		//$this->form_validation->set_rules('pro_foto','Imagem','required');
		$this->form_validation->set_rules('pro_preco','Preco', 'required|numeric',
			array('numeric'=>"<div class='alert alert-danger'>O Preco é um campo numérico</div>",'required' => "<div class='alert alert-danger'>Preenchimento do Preco obrigatório.</div>"));

		if ($this->form_validation->run() != FALSE){
			$update=$this->Teste_model->updateJogos($codigo,$jogos);
			$success = array('mensagens' => "<div class='alert alert-success'>Dados alterados com sucesso!</div>");
			$this->load->view("Listar",$success);
		} else {
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Listar");	
		}

	}

	public function exibeListaComputador(){	
		$this->load->model('Teste_model');
		$forms= $this->Teste_model->exibirComputador();

		$data=array(
			"forms"=>$forms
		);
		$this->load->view("Listar",$data);
	}

	public function alteraComputador(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->load->model('Formulario_model');
		$this->load->model('Teste_model');

		$codigo=$this->input->post('com_codigo');

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 2000;
		$config['max_width']            = 4000;
		$config['max_height']           = 4000;

		$this->load->library('upload', $config);

		$imagem=array();
//deixa a imagem não obrigatoria
		if ( ! $this->upload->do_upload('com_foto')){//nome do formulario
			$teste='';
		}else{
			$imagem=$this->upload->data();
			$teste=$imagem['file_name'];
		}
//*************STATUS COMPUTADOR*********************
		if(isset($_POST["com_status"])) {
			$ckb_com=1;

		} else { 
			$ckb_com=0;
		}

		$computador = array(  
			'com_nome' => $this->input->post('com_nome'),
			'com_descricao' => $this->input->post('com_descricao'),
			'com_marca' => $this->input->post('com_marca'),
			'com_modelo' => $this->input->post('com_modelo'),
			'com_foto'=>$teste,
			'com_arquitetura' => $this->input->post('com_arquitetura'),
			'com_preco' => $this->input->post('com_preco'),
			'com_status'=>$ckb_com
		);

		if ($this->form_validation->run() != FALSE && $this->Teste_model->updateComputador($codigo,$computador)) {
			$success = array('mensagens' => "<div class='alert alert-success'>Dados alterados com sucesso!</div>");
			$this->load->view("Listar",$success);
		} else {
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Listar");	
		}
	}


	public function alteraTipoManutencao(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->load->model('Formulario_model');
		$this->load->model('Teste_model');

		$codigo=$this->input->post('tman_codigo');
		$tipomanutencao = array(  
			'tman_nome' => $this->input->post('tman_nome'),
			'tman_descricao' => $this->input->post('tman_descricao'),
		);

		if ($this->Teste_model->updateManutencao($codigo,$tipomanutencao)) {
			$this->load->view("Listar",$success);
		} else {
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
		//$this->imagemJogo();//mudei essa linha
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Listar");	
		}
	}


	public function exibeListaPecas(){	
		$this->load->model('Teste_model');
		$forms= $this->Teste_model->exibirPecas();

		$data=array(
			"forms"=>$forms
		);
		$this->load->view("Listar",$data);
	}

	public function alteraPeca(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->load->model('Teste_model');
		$this->load->model('Formulario_model');

		$codigo=$this->input->post('pec_codigo');
		//*************STATUS Peca*********************
		if(isset($_POST["pec_status"])) {
			$ckb_pec=1;
		} else { 
			$ckb_pec=0;
		}

		$pecas = array(  
			'pec_nome' => $this->input->post('pec_nome'),
			'pec_marca' => $this->input->post('pec_marca'),
			'pec_modelo' => $this->input->post('pec_modelo'),
			'pec_descricao' => $this->input->post('pec_descricao'),
			'pec_fornecedor' => $this->input->post('pec_fornecedor'),
			'pec_preco' => $this->input->post('pec_preco'),
			'pec_categoria' => $this->input->post('pec_categoria'),
			'pec_status'=>$ckb_pec

		);

		if ($this->Teste_model->updatePecas($codigo,$pecas)) {
			$success = array('mensagens' => "<div class='alert alert-success'>Dados alterados com sucesso!</div>");
			$this->load->view("Listar",$success);
		} else {
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Listar");	
		}
	}
}//fim