<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Teste extends CI_Controller{

	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$this->load->view('Cadastro', array('error' => ' ' ));
	}

	public function imagemJogo()
	{
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 2000;
		$config['max_width']            = 4000;
		$config['max_height']           = 4000;

		$this->load->library('upload', $config);

		$imagem=array();

		if ( ! $this->upload->do_upload('foto')){//nome do formulario
			$error = array('error' => $this->upload->display_errors());
                       // $this->load->view('Cadastro', $error);
			print_r($error);
		}else{
			$imagem=$this->upload->data();
			$teste=$imagem['file_name'];
			$this->load->helper(['form','url']);
			$this->load->library('form_validation');
			$dados=array(
			 	'imagem_nome' =>$teste
			);
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirImagem($dados);
			echo "Cadastro Efetuado";
			 //}
		}
	}
}
?>