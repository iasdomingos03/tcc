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
//CADASTRA FORNECEDOR OK
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('for_cnpj','CNPJ','required|exact_length[18]',
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
		$this->form_validation->set_rules('for_celular','Celular','min_length[14]|max_length[15]',
			array('max_length' => "<div class='alert alert-danger'>O celular não pode exceder <b>12</b> numeros.</div>",'min_length' => "O tamanho mínimo do celular é <b>11</b> numeros/div>"));
		$this->form_validation->set_rules('for_email','Email');


		if($this->form_validation->run() == FALSE){
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
		//$this->imagemJogo();//mudei essa linha
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Cadastro");		
		}else{
			$data2=preg_replace('/[\(\)\.\-\/]/','',$data=array(
				'for_cnpj' => $this->input->post('for_cnpj'),
				'for_cep' => $this->input->post('for_cep'),
				'for_endereco' => $this->input->post('for_endereco'),
				'for_numero' => $this->input->post('for_numero'),
				'for_bairro' => $this->input->post('for_bairro'),
				'for_cidade' => $this->input->post('for_cidade'),
				'for_estado' => $this->input->post('for_estado'),
				'for_telefone' => $this->input->post('for_telefone'),
				'for_celular' => $this->input->post('for_celular'),
			));
			$data1=array('for_email'=>$this->input->post('for_email'),
				'for_razaoSocial' => $this->input->post('for_razaoSocial'),
				'for_nomeFantasia' => $this->input->post('for_nomeFantasia'));
			$data=$data2+$data1;

			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirFornecedor($data);
			$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>");
			$this->load->view('Cadastro',$success);		
		}

	}
}

