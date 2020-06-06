<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Cliente extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		// $this->load->helper(array('form', 'url'));
		$this->load->library("session");
		$this->load->helper('url');
	}

	public function index(){
		echo "Esse é o controller do Cliente";
	}

	public function exibeFormulario(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');

		$this->load->model('Cliente_model');
		$forms= $this->Cliente_model->exibirCliente();

		
		$data=array(
			'cli_nome' => $this->input->post('cli_nome'),
			'cli_cpf' => $this->input->post('cli_cpf'),
			'cli_endereco' => $this->input->post('cli_endereco'),
			'cli_numero' => $this->input->post('cli_numero'),
			'cli_bairro' => $this->input->post('cli_bairro'),
			'cli_cidade' => $this->input->post('cli_cidade'),
			'cli_estado' => $this->input->post('cli_estado'),
			'cli_cep' => $this->input->post('cli_cep'),
			'cli_email' => $this->input->post('cli_email'),
			'cli_telefone' => $this->input->post('cli_telefone'),
			'cli_celular' => $this->input->post('cli_celular'),
			'cli_senha'=>MD5($this->input->post('cli_cpf'))
				//"forms"=>$forms
		);
		
		$this->load->view("CadastroCliente",$data);
	}
	public function cadastraCliente(){


		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cli_nome','Nome Completo','required|min_length[3]',
			array('required' => "<div class='alert alert-danger'>Nome obrigatorio</div>",
				'min_length' => "<div class='alert alert-danger'>O tamanho mínimo do Nome é <b>3</b> caracteres</div>"));
		$this->form_validation->set_rules('cli_cpf','CPF','required|exact_length[11]',
			array('required' => "<div class='alert alert-danger'>Preenchimento do CPF obrigatorio.</div>",
				'exact_length'=>"<div class='alert alert-danger'>O CNPJ deve ser escrito com <b>11</b> números</div>"));
		$this->form_validation->set_rules('cli_cep','CEP');
		$this->form_validation->set_rules('cli_endereco','Rua','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Rua obrigatorio.</div>"));
		$this->form_validation->set_rules('cli_numero','Numero');
		$this->form_validation->set_rules('cli_bairro','Bairro','required',array('required' => "<div class='alert alert-danger'>Preenchimento do Bairro obrigatorio.</div>"));
		$this->form_validation->set_rules('cli_cidade','Cidade','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Cidade obrigatorio.</div>"));
		$this->form_validation->set_rules('cli_estado','Estado','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Cidade obrigatorio.</div>"));
		$this->form_validation->set_rules('cli_telefone','Telefone');
		$this->form_validation->set_rules('cli_celular','Celular','min_length[10]|max_length[11]',
			array('max_length' => "<div class='alert alert-danger'>O celular não pode exceder <b>11</b> caracteres.</div>",
				'min_length' => "<div class='alert alert-danger'>O tamanho mínimo do celular é <b>12</b> caracteres</div>"));
		$this->form_validation->set_rules('cli_email','Email','required',array('required' => "<div class='alert alert-danger'>Preenchimento do Email obrigatorio.</div>"));


		if($this->form_validation->run() == FALSE){
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
		//$this->imagemJogo();//mudei essa linha
			$this->load->model('Cliente_model');
			$forms= $this->Cliente_model->exibirDados();
			$this->load->view("CadastroCliente");		
		}else{
			//$data=$this->input->post();
			// $data['cli_senha']=MD5($data['cli_cpf']);
			//$cli_senha=MD5($this->input->post('cli_cpf'));
			// echo $data['cli_senha'];
			$data=array(
				'cli_nome' => $this->input->post('cli_nome'),
				'cli_cpf' => $this->input->post('cli_cpf'),
				'cli_endereco' => $this->input->post('cli_endereco'),
				'cli_numero' => $this->input->post('cli_numero'),
				'cli_bairro' => $this->input->post('cli_bairro'),
				'cli_cidade' => $this->input->post('cli_cidade'),
				'cli_estado' => $this->input->post('cli_estado'),
				'cli_cep' => $this->input->post('cli_cep'),
				'cli_email' => $this->input->post('cli_email'),
				'cli_telefone' => $this->input->post('cli_telefone'),
				'cli_celular' => $this->input->post('cli_celular'),
				'cli_senha'=>MD5($this->input->post('cli_cpf'))
				//"forms"=>$forms
			);

			$this->load->model('Cliente_model');
			$this->Cliente_model->inserirCliente($data);
			$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>");
			$this->load->view('CadastroCliente',$success);		
		}

	}

	

	public function formLoginC(){
		$this->load->library("form_validation");
		$this->form_validation->set_rules("cli_email","email","required");
		$this->form_validation->set_rules("cli_senha","senha","required");


		if($this->form_validation->run()==false){
			echo "form_validation false";
		}else{
			$data=$this->input->post();
		//var_dump($data);
			$senhaCMD5=MD5($data['cli_senha']);
		//echo MD5($data['usu_senha']);
			$this->load->model('Cliente_model');
			$resultc=$this->Cliente_model->verificarLoginCliente($data['cli_email'],$senhaCMD5);
			if($resultc){
				
				$cli_email=$resultc->cli_email;
				$cli_nome=$resultc->cli_nome;
				$cli_senha=$resultc->cli_senha;
				
				$this->session->set_userdata("cli_email",$cli_email);
				$this->session->set_userdata("cli_nome",$cli_nome);
				$this->session->set_userdata("cli_senha",$cli_senha);


				//Aqui ta funcionando...foi testado com o restrict
				header("Location:".base_url().'Cliente/logado');
			}else{
				echo "erro";
			}
		}
	}

	public function logar(){
		$this->load->view("LoginCliente");
	}

	public function logado(){
		$this->load->view("HomeLogado");
	}

	public function logoff(){
		$this->session->unset_userdata("cli_email");
		$this->session->unset_userdata("cli_nome");
		$this->session->unset_userdata("cli_senha");

		$this->session->sess_destroy();
		header("Location: ".base_url());
	}
}

