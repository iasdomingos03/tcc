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
		$this->form_validation->set_rules('for_cnpj','CNPJ','required|exact_length[14]',
			array('required' => "<div class='alert alert-danger'>Preenchimento do CNPJ obrigatorio.</div>",
				'exact_length'=>"<div class='alert alert-danger'>O CNPJ deve ser escrito com <b>14</b> números</div>"));
		$this->form_validation->set_rules('for_razaoSocial','Razão Social','required|min_length[2]',
			array('required' => "<div class='alert alert-danger'>Preenchimento do Razão Social obrigatoria.</div>",'min_length' => "O tamanho mínimo da Razão Social é <b>3</b> caracteres</div>"));
		$this->form_validation->set_rules('for_nomeFantasia','Nome Fantasia','required|min_length[2]', array('required' => "<div class='alert alert-danger'>Preenchimento do Nome Fantasia obrigatoria.</div>",'min_length' => "O tamanho mínimo da Nome Fantasia é <b>3</b> caracteres</div>"));
		$this->form_validation->set_rules('for_cep','CEP');
		$this->form_validation->set_rules('for_endereco','Rua','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Rua obrigatorio.</div>"));
		$this->form_validation->set_rules('for_numero','Numero');
		$this->form_validation->set_rules('for_bairro','Bairro','required',array('required' => "<div class='alert alert-danger'>Preenchimento do Bairro obrigatorio.</div>"));
		$this->form_validation->set_rules('for_cidade','Cidade','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Cidade obrigatorio.</div>"));
		$this->form_validation->set_rules('for_estado','Estado','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Cidade obrigatorio.</div>"));
		$this->form_validation->set_rules('for_telefone','Telefone');
		$this->form_validation->set_rules('for_celular','Celular','min_length[10]|max_length[11]',
			array('max_length' => "<div class='alert alert-danger'>O celular não pode exceder <b>11</b> caracteres.</div>",'min_length' => "O tamanho mínimo do celular é <b>12</b> caracteres/div>"));
		$this->form_validation->set_rules('for_email','Email');


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
	$this->Formulario_model->inserirFornecedor($data);
	$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>");
	$this->load->view('Cadastro',$success);		
}

}

