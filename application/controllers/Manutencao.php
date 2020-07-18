<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Manutencao extends CI_Controller{

	
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
		$this->load->view("HomeManutencao");
	}

	public function verificaManutencao(){
		$this->load->model('Teste_model');
		$this->load->model('Formulario_model');
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->load->library('session');
		// $cli_email=$this->session->userdata("cli_email");
		// $dadoCliente=$this->Teste_model->selecionaCliente($cli_email);
		// print_r($this->db->last_query()); 

		$manArray = array();	//Array para pegar os checkbox
		if(isset($_POST["tman"])) { //verifica s nao ta vazio	
			
			$manArray=$_POST["tman"]; //pega valor //usar ao inves de array_push

			$dataPed=array(//Cadastra o pedido
				'cli_cpf'=>$this->session->userdata("cli_cpf"),
				'ser_codigoManutencao'=>1
			);
			$this->Teste_model->mandaManutencao($dataPed);
//pega o id do pedido
			$pman_codigo=$this->db->insert_id();//ultimo id inserido
			//insere os itens do pedido
			$tamanho=count($manArray);
			for($i=0;$i<$tamanho;$i++){
				// echo $_POST["tman"][$i];
				$dataIped=array(
					'pman_codigo'=>$pman_codigo,
					'tman_codigo' =>($_POST["tman"][$i]),
					'pman_descricao'=>$this->input->post('pman_descricao')	
				);
				$this->Teste_model->mandaManutencaoItens($dataIped);
			}
			$success = array('vman' => "<div class='alert alert-success'>Seu pedido foi enviado!Por favor, aguarde nosso retorno!</div>");
			$this->load->view("HomeManutencao",$success);
		}else{
			$error = array('vman' => "<div class='alert alert-danger'>Por favor, selecione alguma manutenção para continuar!</div>");
			$this->load->view("HomeManutencao",$error);
		}
	}
}