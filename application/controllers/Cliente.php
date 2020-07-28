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

		$this->load->helper('security');
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cli_nome','Nome Completo','required|min_length[3]|regex_match[/^([a-z ])+$/i])',
			array('required' => "<div class='alert alert-danger'>Nome obrigatorio</div>",
				'min_length' => "<div class='alert alert-danger'>O tamanho mínimo do Nome é <b>3</b> caracteres</div>",
				'regex_match' => "<div class='alert alert-danger'>O Nome só deve conter letras</div>"));
		$this->form_validation->set_rules('cli_cpf','CPF','required|exact_length[14]|regex_match[/(\d-.)/]',
			array('required' => "<div class='alert alert-danger'>Preenchimento do CPF obrigatorio.</div>",
				'exact_length'=>"<div class='alert alert-danger'>O CPF deve ser escrito com <b>11</b> números</div>",
				'regex_match'=>"<div class='alert alert-danger'>O CPF é um campo numérico</div>"));
		$this->form_validation->set_rules('cli_cep','CEP','regex_match[/(\d-)/]',
			array('regex_match'=>"<div class='alert alert-danger'>O CEP é um campo numérico</div>"));
		$this->form_validation->set_rules('cli_endereco','Rua','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Rua obrigatorio.</div>"));
		$this->form_validation->set_rules('cli_numero','Numero');
		$this->form_validation->set_rules('cli_bairro','Bairro','required',array('required' => "<div class='alert alert-danger'>Preenchimento do Bairro obrigatorio.</div>"));
		$this->form_validation->set_rules('cli_cidade','Cidade','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Cidade obrigatorio.</div>"));
		$this->form_validation->set_rules('cli_estado','Estado','required|exact_length[2]',
			array('required' => "<div class='alert alert-danger'>Preenchimento do Estado obrigatorio.</div>",
				'exact_length'=>"<div class='alert alert-danger'>O Estado deve ser escrito com <b>2</b> letras</div>"));
		$this->form_validation->set_rules('cli_telefone','Telefone');
		$this->form_validation->set_rules('cli_celular','Celular','min_length[14]|max_length[15]',
			array('max_length' => "<div class='alert alert-danger'>O celular não pode exceder <b>12</b> caracteres.</div>",
				'min_length' => "<div class='alert alert-danger'>O tamanho mínimo do celular é <b>12</b> caracteres</div>"));
		$this->form_validation->set_rules('cli_email','Email','required',array('required' => "<div class='alert alert-danger'>Preenchimento do Email obrigatorio.</div>"));


		if($this->form_validation->run() == FALSE){
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
			$this->load->model('Cliente_model');
			$forms= $this->Cliente_model->exibirDados();
			$this->load->view("CadastroCliente");		
		}else{
			$data1=preg_replace('/[\(\)\.\-\<\>\"\/\\\\]/','',$data1=array(
				'cli_nome' => $this->input->post('cli_nome'),
				'cli_estado' => $this->input->post('cli_estado')
			));
			$data2=preg_replace('/[\(\)\.\-\<\>\"\/\\\\]/','',$data2=array(
				'cli_cpf' => $this->input->post('cli_cpf'),	
				'cli_cep' => $this->input->post('cli_cep'),
				'cli_telefone' => $this->input->post('cli_telefone'),
				'cli_celular' => $this->input->post('cli_celular')
			));
			$data3=preg_replace('/[\(\)\.\-\<\>\"\/\\\\]/','',$data3=array(
				'cli_endereco' => $this->input->post('cli_endereco'),
				'cli_numero' => $this->input->post('cli_numero'),
				'cli_bairro' => $this->input->post('cli_bairro'),
				'cli_cidade' => $this->input->post('cli_cidade'),
				'cli_senha'=>$this->input->post('cli_cpf')
			));
			$data4=preg_replace('/[\(\)\<\>\"\/\\\\]/','',$data4=array('cli_email'=>$this->input->post('cli_email')));
			$data3['cli_senha']=sha1($data3['cli_senha']);
			$data=$data1+$data2+$data3+$data4;

			$this->load->model('Cliente_model');
			$verificac=$this->Cliente_model->verificarCliente($data2['cli_cpf'],$data4['cli_email']);
			if($verificac){
				$error = array('mensagens' => "<div class='alert alert-danger'>Esse Usuário já está cadastrado!</div>");
				$this->load->view('CadastroCliente',$error);		
			}else{
				$this->Cliente_model->inserirCliente($data);
				$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso! A sua primeira senha de acesso corresponde ao seu <strong>CPF</strong>.</div>");
				$this->load->view('CadastroCliente',$success);	
			}	
		}
	}
		//			$this->load->library('email');
// 			$config['protocol']    = 'smtp';
// 			$config['smtp_host']    = 'smtp.googlemail.com';
// 			$config['smtp_port']    = '587';
// 			$config['smtp_timeout'] = '7';
// 			$config['smtp_user']    = 'emailtext12345@gmail.com';
// 			$config['smtp_pass']    = 'testeTCC1406';
// 			$config['charset']    = 'utf-8';
// 			$config['newline']    = "\r";
// $config['mailtype'] = 'text'; // or html
// $config['validation'] = FALSE; // bool whether to validate email or not      

//  $this->email->initialize($config);

// $this->email->from('emailtext12345@gmail.com', 'emailtext');
// $this->email->to(''); 
// $this->email->subject('Email Test');
// $this->email->message('Testing the email class.');  

// $this->email->send();

// echo $this->email->print_debugger();

	


	public function formLoginC(){
		
		$this->load->library("form_validation");
		$this->form_validation->set_rules("cli_email","email","required",array('required' => "<div class='alert alert-danger'>Preencha todos os campos.</div>"));
		$this->form_validation->set_rules("cli_senha","senha","required",array('required' => "<div class='alert alert-danger'>Preencha todos os campos.</div>"));

		if($this->form_validation->run()==false){
			$this->load->helper(['form','url']);
			$this->load->model('Cliente_model');
			$forms= $this->Cliente_model->exibirDados();
			$this->load->view("LoginCliente");		
		}else{
			$data=$this->input->post();
			$senhaCMD5=sha1($data['cli_senha']);
			$this->load->model('Cliente_model');
			$resultc=$this->Cliente_model->verificarLoginCliente($data['cli_email'],$senhaCMD5);
			if($resultc){
				$cli_email=$resultc->cli_email;
				$cli_nome=$resultc->cli_nome;
				$cli_senha=$resultc->cli_senha;
				$cli_cpf=$resultc->cli_cpf;
				$this->session->set_userdata("cli_email",$cli_email);
				$this->session->set_userdata("cli_nome",$cli_nome);
				$this->session->set_userdata("cli_senha",$cli_senha);
				$this->session->set_userdata("cli_cpf",$cli_cpf);
				header("Location:".base_url().'index.php/Cliente/logado');
			}else{
				$error=array('mensagens' => "<div class='alert alert-danger'>Login ou senha incorretos!</div>");
				$this->load->view("LoginCliente",$error);
			}
		}
	}

	public function logar(){
		$this->load->view("LoginCliente");
	}

	public function logado(){
		$this->load->view("HomeLogado");//Antes era HomeLogado
	}

	public function logoff(){
		$this->session->unset_userdata("cli_email");
		$this->session->unset_userdata("cli_nome");
		$this->session->unset_userdata("cli_senha");
		$this->session->unset_userdata("cli_cpf");


		$this->session->sess_destroy();
		header("Location: ".base_url());
	}

	public function exibirDados(){
		$this->load->view("DadosCliente");
	}

	public function alteraCliente(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->load->model('Cliente_model');
		$CI = & get_instance();
		$CI->load->library('session');

		$this->form_validation->set_rules('cli_cep','CEP','regex_match[/(\d-)/]',
			array('regex_match'=>"<div class='alert alert-danger'>O CEP é um campo numérico</div>"));
		$this->form_validation->set_rules('cli_endereco','Rua','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Rua obrigatorio.</div>"));
		$this->form_validation->set_rules('cli_numero','Numero');
		$this->form_validation->set_rules('cli_bairro','Bairro','required',array('required' => "<div class='alert alert-danger'>Preenchimento do Bairro obrigatorio.</div>"));
		$this->form_validation->set_rules('cli_cidade','Cidade','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Cidade obrigatorio.</div>"));
		$this->form_validation->set_rules('cli_estado','Estado','required|exact_length[2]',
			array('required' => "<div class='alert alert-danger'>Preenchimento do Estado obrigatorio.</div>",
				'exact_length'=>"<div class='alert alert-danger'>O Estado deve ser escrito com <b>2</b> letras</div>"));
		$this->form_validation->set_rules('cli_telefone','Telefone');
		$this->form_validation->set_rules('cli_celular','Celular','min_length[14]|max_length[15]',
			array('max_length' => "<div class='alert alert-danger'>O celular não pode exceder <b>12</b> caracteres.</div>",
				'min_length' => "<div class='alert alert-danger'>O tamanho mínimo do celular é <b>12</b> caracteres</div>"));
		$this->form_validation->set_rules('cli_email','Email','required',array('required' => "<div class='alert alert-danger'>Preenchimento do Email obrigatorio.</div>"));

		if ($this->form_validation->run() == TRUE){

			$cliente1=preg_replace('/[\(\)\.\-\<\>\"\/\\\\]/','',$cliente1=array(
				'cli_estado' => $this->input->post('cli_estado')
			));
			$cliente2=preg_replace('/[\(\)\.\-\<\>\"\/\\\\]/','',$cliente2=array(
				'cli_cep' => $this->input->post('cli_cep'),
				'cli_telefone' => $this->input->post('cli_telefone'),
				'cli_celular' => $this->input->post('cli_celular')
			));
			$cliente3=preg_replace('/[\(\)\.\-\<\>\"\/\\\\]/','',$cliente3=array(
				'cli_endereco' => $this->input->post('cli_endereco'),
				'cli_numero' => $this->input->post('cli_numero'),
				'cli_bairro' => $this->input->post('cli_bairro'),
				'cli_cidade' => $this->input->post('cli_cidade'),
				'cli_senha'=>$this->input->post('cli_cpf')
			));
			$cliente4=preg_replace('/[\(\)\<\>\"\/\\\\]/','',$cliente4=array('cli_email'=>$this->input->post('cli_email')));
			$cliente3['cli_senha']=sha1($cliente3['cli_senha']);
			$cliente=$cliente1+$cliente2+$cliente3+$cliente4;

			$this->session->set_userdata('cli_email', "{$cliente['cli_email']}");

			$result=$CI->Cliente_model->updateCliente($CI->session->userdata("cli_cpf")
				,$cliente);
			$success = array('mensagens' => "<div class='alert alert-success'>Dados alterados com sucesso!</div>");
			$this->load->view("DadosCliente",$success);

		}else if($this->form_validation->run()== false){
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
			$this->load->view("DadosCliente");

		}
	}
		// if($this->form_validation->run() == FALSE && !$this->Cliente_model->updateCliente($codigo,$cliente)){
		// 	$this->load->helper(['form','url']);
		// 	$this->load->library('form_validation');
		// //$this->imagemJogo();//mudei essa linha
		// 	$this->load->model('Cliente_model');
		// 	$forms= $this->Cliente_model->exibirDados();
		// 	$this->load->view("DadosCliente");		
		// }else{
		// 	$this->load->model('Cliente_model');
		// 	$this->Cliente_model->updateCliente($codigo,$cliente);
		// 	$success = array('mensagens' => "<div class='alert alert-success'>Alteração realizado com sucesso!</div>");
		// 	$this->load->view('DadosCliente',$success);		
		// }


	public function alteraSenhaCliente(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->load->model('Cliente_model');
		$CI = & get_instance();
		$CI->load->library('session');

		$this->form_validation->set_rules('cli_senhaAntiga','Senha Atual');
		$this->form_validation->set_rules('cli_senha','Nova Senha','required|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&_])[A-Za-z\d@$!%*#?&_]{8,}$/]',
			array('required' => "<div class='alert alert-danger'>Preenchimento da Nova senha obrigatorio.</div>",
				'regex_match' =>"<div class='alert alert-danger'>A nova senha deve ter: <ul><li>no mínimo 8 caracteres</li><li>letras maiusculas</li><li>minusculas</li><li>numeros</li><li>e simbolos.</li></ul>Por favor, tente novamente!</div>" ));

		if($this->form_validation->run()==true){
			$data=$this->input->post();
			$senhaCMD5=sha1($data['cli_senha']);
			$senhaAntiga=sha1($data['cli_senhaAntiga']);

			if($CI->session->userdata("cli_senha") == $senhaAntiga){
				$this->session->set_userdata('cli_senha', "$senhaCMD5");
				$resultS=$CI->Cliente_model->updateSenha($CI->session->userdata("cli_cpf"),$CI->session->userdata("$senhaCMD5"));
				$success = array('mensagens' => "<div class='alert alert-success'>Senha alterada com sucesso!</div>");
				$this->load->view("DadosCliente",$success);	

			}else{
				$this->load->helper(['form','url']);
				$this->load->library('form_validation');
				$this->load->model('Cliente_model');
				$forms= $this->Cliente_model->exibirDados();

				$error=array('mensagens' => "<div class='alert alert-danger'>A senha Atual digitada não corresponde a sua senha atual.\nPor favor tente novamente!</div>");
				$this->load->view("DadosCliente",$error);	
			}
		}else{
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
			$this->load->model('Cliente_model');
			$forms= $this->Cliente_model->exibirDados();
			$this->load->view("DadosCliente");
		}
	}

	public function carrinho(){
		$this->load->model('Produto_model');
		$this->load->view("Carrinho");
	}
}//chave final

