<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class CadastroPecas extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index(){
		echo "Esse é o controller do formulario";
	}


	public function exibeFormulario(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		//$this->imagemJogo();//mudei essa linha

		$this->load->model('Formulario_model');
		$forms= $this->Formulario_model->exibirDados();
		
		$pecas=array(
			'pec_nome' => $this->input->post('pec_nome'),
			'pec_marca' => $this->input->post('pec_marca'),
			'pec_modelo' => $this->input->post('pec_modelo'),
			'pec_descricao' => $this->input->post('pec_descricao'),
			'pec_fornecedor' => $this->input->post('pec_fornecedor'),
			'pec_preco' => $this->input->post('pec_preco'),
			'pec_categoria' => $this->input->post('pec_categoria')
				//"forms"=>$forms
		);
		$this->load->view("Cadastro");


	}

	public function cadastraPecas(){
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
		if ( ! $this->upload->do_upload('pec_foto')){//nome do formulario
			$teste='';
		}else{
			$imagem=$this->upload->data();
			$teste=$imagem['file_name'];
		}

		$pecas=array(
			'pec_nome' => $this->input->post('pec_nome'),
			'pec_marca' => $this->input->post('pec_marca'),
			'pec_modelo' => $this->input->post('pec_modelo'),
			'pec_descricao' => $this->input->post('pec_descricao'),
			'pec_foto'=>$teste,
			'pec_fornecedor' => $this->input->post('pec_fornecedor'),
			'pec_preco' => $this->input->post('pec_preco'),
			'pec_categoria' => $this->input->post('pec_categoria')
				//"forms"=>$forms
		);

		$this->form_validation->set_rules('pec_nome','Titulo', 'required');
		$this->form_validation->set_rules('pec_marca','Marca');
		$this->form_validation->set_rules('pec_modelo','Modelo');
		$this->form_validation->set_rules('pec_descricao','descricao');
		$this->form_validation->set_rules('pec_fornecedor','Fornecedor');
		$this->form_validation->set_rules('pec_preco','preco', 'required');
		$this->form_validation->set_rules('pec_categoria','Categoria Peca');
		

		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			//$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirPecas($pecas);
			echo "Cadastro Efetuado";
		}
	}

	public function cadastraCategoriaPecas(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('catp_nome','Categoria Pecas','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirCategoriaPecas($data);
			echo "Cadastro Efetuado";
		}
	}

}

?>