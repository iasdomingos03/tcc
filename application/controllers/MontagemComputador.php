<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class MontagemComputador extends CI_Controller{

	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form', 'url'));
		// $this->load->library("session");
		$this->load->helper('url');
	}

	public function index(){
		$this->load->model('Teste_model');
		$this->load->model('Formulario_model');	
		$this->load->library('session');
		$this->load->view("HomeMontagemComputador");//MEXER
	}
	public function verificaMontagem(){
		$this->load->model('Teste_model');
		$this->load->model('Formulario_model');
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->load->library('session');
		 // $cli_email=$this->session->userdata("cli_email");
		 // $dadoCliente=$this->Teste_model->selecionaCliente($cli_email);
		 // print_r($this->db->last_query()); 
		//echo "ola";
		$monArray[] = array();
		if(isset($_POST["pecMontagem"])) { //verifica s nao ta vazio	

$dataPedMon=array(//Cadastra o pedido
	'cli_cpf'=>$this->session->userdata("cli_cpf"),
	'ser_codigoMontagem'=>2
);
$this->Teste_model->mandaMontagem($dataPedMon);

$pmon_codigo=$this->db->insert_id();
$tamanho=count($_POST["pecMontagem"]);
			// echo "tamanho:".$tamanho;
for($i=0;$i<$tamanho;$i++){
	$monArray=array(
		'pmon_codigo'=>$pmon_codigo,
		'catp_codigo'=>substr($_POST["pecMontagem"][$i],0,1),
		'pec_codigo'=>substr($_POST["pecMontagem"][$i],2,3)
	);
	$this->Teste_model->mandaMontagemItens($monArray);
}
$success = array('vman' => "<div class='alert alert-success'>Seu pedido foi enviado!Por favor, aguarde nosso retorno!</div>");
$this->load->view("HomeMontagemComputador",$success);

}else{
	$error = array('vman' => "<div class='alert alert-danger'>Por favor, selecione alguma peça para continuar!</div>");
	$this->load->view("HomeMontagemComputador",$error);
}
}
}
