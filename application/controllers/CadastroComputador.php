<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class CadastroComputador extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		echo "Esse é o controller do Computador";
	}


	public function exibeFormulario(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		//$this->imagemJogo();//mudei essa linha

		$this->load->model('Formulario_model');
		$forms= $this->Formulario_model->exibirDados();
		
		$com=array(
			'com_nome' => $this->input->post('com_nome'),
			'com_descricao' => $this->input->post('com_descricao'),
			'com_marca' => $this->input->post('com_marca'),
			'com_modelo' => $this->input->post('com_modelo'),
			'com_arquitetura' => $this->input->post('com_arquitetura'),
			'com_preco' => $this->input->post('com_preco')
				//"forms"=>$forms
		);
		$this->load->view("Cadastro");


	}

	public function cadastraComputador(){
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
		if ( ! $this->upload->do_upload('com_foto')){//nome do formulario
			// $error = array('error' => $this->upload->display_errors());
			// print_r($error);
			$teste='';
		}else{
			$imagem=$this->upload->data();
			$teste=$imagem['file_name'];
		}

		$com=array(
			'com_nome' => $this->input->post('com_nome'),
			'com_descricao' => $this->input->post('com_descricao'),
			'com_marca' => $this->input->post('com_marca'),
			'com_modelo' => $this->input->post('com_modelo'),
			'com_foto'=>$teste,
			'com_arquitetura' => $this->input->post('com_arquitetura'),
			'com_preco' => $this->input->post('com_preco')
				//"forms"=>$forms
		);

		$this->form_validation->set_rules('com_nome','Nome', 'required');
		$this->form_validation->set_rules('com_descricao','Descricao');
		$this->form_validation->set_rules('com_marca','Marca');
		$this->form_validation->set_rules('com_modelo','Modelo');
		$this->form_validation->set_rules('com_arquitetura','Arquitetura', 'required');
		$this->form_validation->set_rules('com_preco','Preco', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			//$com=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirComputador($com);
			$this->load->view('Cadastro');		}
		}

	}

	?>