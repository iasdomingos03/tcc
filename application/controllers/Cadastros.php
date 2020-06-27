<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Cadastros extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		echo "Esse é o controller do cadastros(modelo,categoria,marca)";
	}

	public function exibeFormulario(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->load->model('Formulario_model');
		$forms= $this->Formulario_model->exibirDados();

		$data=array(
			"forms"=>$forms
		);

		 // $logado = $_SESSION['adm_email'];
		$this->load->view("Cadastro",$data);
	}



	public function cadastraCategoria(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cat_categoria','Categoria', 'required',
			array('required' => "<div class='alert alert-danger'>Preenchimento da Categoria obrigatória.</div>"));

		if($this->form_validation->run() == FALSE){
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
	//$this->imagemJogo();//mudei essa linha
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirCategoria($data);
			$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>");
			$this->load->view('Cadastro',$success);
		}
	}

	public function cadastraClassificacao(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cla_classificacao','Classificacao','required',
			array('required' => "<div class='alert alert-danger'>Preenchimento da Classificacao obrigatória.</div>"));
		if($this->form_validation->run() == FALSE){
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
//$this->imagemJogo();//mudei essa linha
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirClassificacao($data);
			$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>");
			$this->load->view('Cadastro',$success);

		}
	}

	public function cadastraModelo(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('mod_modelo','Modelo','required',
			array('required' => "<div class='alert alert-danger'>Preenchimento do Modelo obrigatório.</div>"));

		if($this->form_validation->run() == FALSE){
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirModelo($data);
			$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>");
			$this->load->view('Cadastro',$success);

		}
	}

	public function cadastraMarca(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('mar_marca','Marca','required',
			array('required' => "<div class='alert alert-danger'>Preenchimento da Marca obrigatória.</div>"));
		$this->form_validation->set_rules('mar_fabricante','Fabricante','required',
			array('required' => "<div class='alert alert-danger'>Preenchimento do Fabricante obrigatório.</div>"));

		if($this->form_validation->run() == FALSE){
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirMarca($data);
			$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>");
			$this->load->view('Cadastro',$success);

		}
	}



	public function cadastraTipoManutencao(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tman_nome','Tipo da Manutencao','required',
			array('required' => "<div class='alert alert-danger'>Preenchimento da Manutencao obrigatório.</div>"));
		$this->form_validation->set_rules('tman_descricao','Descricao','required',
			array('required' => "<div class='alert alert-danger'>Preenchimento da Descricao obrigatório.</div>"));

		if($this->form_validation->run() == FALSE){
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirTipoManutencao($data);
			$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>");
			$this->load->view('Cadastro',$success);

		}
	}


}//Fim controler
