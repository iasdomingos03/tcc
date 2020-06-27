<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class CadastroJogo extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		echo "Esse é o controller do formulario";
	}


	public function exibeFormulario(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		//$this->imagemJogo();//mudei essa linha

		$this->load->model('Formulario_model');
		$forms= $this->Formulario_model->exibirDados();                                                                                 
		$this->load->view("Cadastro");


	}

	public function cadastraJogos(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');

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
//Verifica se o produto ta ativo ou não
		if(isset($_POST["pro_status"])) {
			$ckb_jogos=1;

		} else { 
			$ckb_jogos=0;
		}

		$data=array(
		'pro_titulo' => $this->input->post('pro_titulo'),
		'pro_categoria' => $this->input->post('pro_categoria'),
		'pro_fornecedor' => $this->input->post('pro_fornecedor'),
		'pro_classificacao' => $this->input->post('pro_classificacao'),
		'pro_anoLancamento' => $this->input->post('pro_anoLancamento'),
		'pro_descricao' => $this->input->post('pro_descricao'),
		'pro_sinopse' => $this->input->post('pro_sinopse'),
		'pro_foto'=>$teste,
		'pro_preco' => $this->input->post('pro_preco'),
		'pro_status'=>$ckb_jogos

		// "forms"=>$forms
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

		if($this->form_validation->run() == FALSE){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		//$this->imagemJogo();//mudei essa linha
		$this->load->model('Formulario_model');
		$forms= $this->Formulario_model->exibirDados();
		$this->load->view("Cadastro");


		//$this->load->view("Cadastro",$erros);
	}else{
	//$data=$this->input->post();
	$this->load->model('Formulario_model');
	$this->Formulario_model->inserirJogos($data);
	$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>");
	$this->load->view('Cadastro',$success);
}
}

}

?>