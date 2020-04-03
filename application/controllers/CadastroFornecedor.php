<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class CadastroFornecedor extends CI_Controller{

	public function index(){
		echo "Esse é o controller do Fornecedor";
	}


	public function exibeFormulario(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');

		$this->load->model('Formulario_model');
		$forms= $this->Formulario_model->exibirFornecedor();

		$data=array(
			"forms"=>$forms
		);
		
		$this->load->view("Cadastro",$data);
	}
	public function cadastraFornecedor(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('for_cnpj','CNPJ','required');
		$this->form_validation->set_rules('for_razaoSocial','Razão Social','required');
		$this->form_validation->set_rules('for_nomeFantasia','Nome Fantasia','required');
		$this->form_validation->set_rules('for_cep','CEP');
		$this->form_validation->set_rules('for_endereco','Rua','required');
		$this->form_validation->set_rules('for_numero','Numero');
		$this->form_validation->set_rules('for_bairro','Bairro','required');
		$this->form_validation->set_rules('for_cidade','Cidade','required');
		$this->form_validation->set_rules('for_estado','Estado','required');
		$this->form_validation->set_rules('for_telefone','Telefone');
		$this->form_validation->set_rules('for_celular','Celular');
		$this->form_validation->set_rules('for_email','Email');



		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirFornecedor($data);
			echo "Cadastro Efetuado";
		}
	}


}