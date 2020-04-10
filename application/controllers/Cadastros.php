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
		
		$this->load->view("Cadastro",$data);
	}

	public function cadastraCategoria(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cat_categoria','Categoria', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirCategoria($data);
			echo "Cadastro Efetuado";
		}
	}

	public function cadastraClassificacao(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cla_classificacao','Classificacao','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirClassificacao($data);
			echo "Cadastro Efetuado";
		}
	}

	public function cadastraModelo(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('mod_modelo','Modelo','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirModelo($data);
			echo "Cadastro Efetuado";
		}
	}

	public function cadastraMarca(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('mar_marca','Marca','required');
		$this->form_validation->set_rules('mar_fabricante','Fabricante','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirMarca($data);
			echo "Cadastro Efetuado";
		}
	}
}