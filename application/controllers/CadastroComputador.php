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
//Ativo/desativo
		if(isset($_POST["com_status"])) {
			$ckb_com=1;

		} else { 
			$ckb_com=0;
		}

		$com=array(
			'com_nome' => $this->input->post('com_nome'),
			'com_descricao' => $this->input->post('com_descricao'),
			'com_marca' => $this->input->post('com_marca'),
			'com_modelo' => $this->input->post('com_modelo'),
			'com_foto'=>$teste,
			'com_arquitetura' => $this->input->post('com_arquitetura'),
			'com_preco' => $this->input->post('com_preco'),
			'com_status'=>$ckb_com
				//"forms"=>$forms
		);

		$this->form_validation->set_rules('com_nome','Nome','required|min_length[2]',
			array('required' => "<div class='alert alert-danger'>Preenchimento do Nome do computador obrigatorio.</div>",
				'min_length' => "<div class='alert alert-danger'>O tamanho mínimo do Nome é <b>3</b> caracteres</div>"));
		$this->form_validation->set_rules('com_descricao','Descricao','required',array('required' => "<div class='alert alert-danger'>Preenchimento da Descricao obrigatório.</div>"));
		$this->form_validation->set_rules('com_marca','Marca','required', array('required' => "<div class='alert alert-danger'>Preenchimento da Marca obrigatória.</div>"));
		$this->form_validation->set_rules('com_modelo','Modelo','required', array('required' => "<div class='alert alert-danger'>Preenchimento do Modelo obrigatória.</div>"));
		$this->form_validation->set_rules('com_arquitetura','Arquitetura', 'required|min_length[2]',
			array('required' => "<div class='alert alert-danger'>Preenchimento da Arquitetura do computador obrigatória.</div>",
				'min_length' => "<div class='alert alert-danger'>O tamanho mínimo da Arquitetura é <b>2</b> caracteres</div>"));
		$this->form_validation->set_rules('com_preco','Preco', 'required',array('required' => "<div class='alert alert-danger'>Preenchimento do Preço da peça obrigatório.</div>"));

		if($this->form_validation->run() == FALSE){
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
		//$this->imagemJogo();//mudei essa linha
			$this->load->model('Formulario_model');
			$forms= $this->Formulario_model->exibirDados();
			$this->load->view("Cadastro");

		}else{
			//$com=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirComputador($com);
			$success = array('mensagens' => "<div class='alert alert-success'>Cadastro realizado com sucesso!</div>");
			$this->load->view('Cadastro',$success);
		}
	}
}

?>