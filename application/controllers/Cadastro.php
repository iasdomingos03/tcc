<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Cadastro extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	// public function index()
	// {
	// 	$this->load->view('Cadastro', array('error' => ' ' ));
	// }
	public function index(){
		echo "Esse é o controller do formulario";
	}


	public function exibeFormulario(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		//$this->imagemJogo();//mudei essa linha

		$this->load->model('Formulario_model');
		$forms= $this->Formulario_model->exibirDados();
		
		$data=array(
			'pro_titulo' => $this->input->post('pro_titulo'),
			'pro_categoria' => $this->input->post('pro_categoria'),
			'pro_fornecedor' => $this->input->post('pro_fornecedor'),
			'pro_classificacao' => $this->input->post('pro_classificacao'),
			'pro_anoLancamento' => $this->input->post('pro_anoLancamento'),
			'pro_descricao' => $this->input->post('pro_descricao'),
			'pro_sinopse' => $this->input->post('pro_sinopse'),
			'pro_preco' => $this->input->post('pro_preco')

				// "forms"=>$forms
		);
		$this->load->view("Cadastro");


	}

	public function cadastraJogos(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		//$this->imagemJogo();//mudei essa linha

		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 2000;
		$config['max_width']            = 4000;
		$config['max_height']           = 4000;

		$this->load->library('upload', $config);

		$imagem=array();

		if ( ! $this->upload->do_upload('pro_foto')){//nome do formulario
			$error = array('error' => $this->upload->display_errors());
                       // $this->load->view('Cadastro', $error);
			print_r($error);
		}else{
			$imagem=$this->upload->data();
			$teste=$imagem['file_name'];

			$data=array(
				'pro_titulo' => $this->input->post('pro_titulo'),
				'pro_categoria' => $this->input->post('pro_categoria'),
				'pro_fornecedor' => $this->input->post('pro_fornecedor'),
				'pro_classificacao' => $this->input->post('pro_classificacao'),
				'pro_anoLancamento' => $this->input->post('pro_anoLancamento'),
				'pro_descricao' => $this->input->post('pro_descricao'),
				'pro_sinopse' => $this->input->post('pro_sinopse'),
				'pro_foto'=>$teste,
				'pro_preco' => $this->input->post('pro_preco')

				// "forms"=>$forms
			);

			$this->form_validation->set_rules('pro_titulo','Titulo', 'required');
			$this->form_validation->set_rules('pro_categoria','Categoria');
			$this->form_validation->set_rules('pro_fornecedor','Fornecedor');
			$this->form_validation->set_rules('pro_classificacao','Classificacao');
			$this->form_validation->set_rules('pro_anoLancamento','Ano Lançamento', 'required');
			$this->form_validation->set_rules('pro_descricao','descricao', 'required');
			$this->form_validation->set_rules('pro_sinopse','Sinopse', 'required');
		//$this->form_validation->set_rules('pro_foto','Imagem','required');
			$this->form_validation->set_rules('pro_preco','Preco', 'required');

			if($this->form_validation->run() == FALSE){
				$this->load->view("Cadastro");
			}else{
			//$data=$this->input->post();
				$this->load->model('Formulario_model');
				$this->Formulario_model->inserirJogos($data);
				echo "Cadastro Efetuado";
			}
		}
	}

	public function cadastraCategoria(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cat_categoria','Categoria', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirCategoria($data);
			echo "Cadastro Efetuado";
		}
	}

	public function cadastraClassificacao(){

		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('cla_classificacao','Classificacao','required');

		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirClassificacao($data);
			echo "Cadastro Efetuado";
		}
	}

	public function imagemJogo(){
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|png|jpeg';
		$config['max_size']             = 2000;
		$config['max_width']            = 4000;
		$config['max_height']           = 4000;

		$this->load->library('upload', $config);

		$imagem=array();

		if ( ! $this->upload->do_upload('pro_foto')){//nome do formulario
			$error = array('error' => $this->upload->display_errors());
                       // $this->load->view('Cadastro', $error);
			print_r($error);
		}else{
			$imagem=$this->upload->data();
			$teste=$imagem['file_name'];
			// $this->load->helper(['form','url']);
			// $this->load->library('form_validation');
			// $dados=array(
			//  	'imagem_nome' =>$teste
			// );
			// $this->load->model('Formulario_model');
			// $this->Formulario_model->inserirImagem($dados);
			// echo "Cadastro Efetuado";
			 //}
		}
	}
	



	// public function exibirClassificacao(){
	// 	$this->load->helper(['form','url']);
	// 	$this->load->library('form_validation');

	// 	$this->load->model('Formulario_model');
	// 	$cla= $this->Formulario_model->exibirClassificacao();

	// 	$classificacao=array(
	// 		"cla"=>$cla
	// 	);


	// 	$this->load->view("Cadastro",$classificacao);

	// }

	// public function exibirCategoria(){
	// 	$this->load->helper(['form','url']);
	// 	$this->load->library('form_validation');

	// 	$this->load->model('Formulario_model');

	// 	$categoria=array(
	// 		"cla"=>$cla
	// 	);

	// 	$categoria=$this->Formulario_model->exibirCategoria();			
	// 	foreach ($categoria as $cat) {
	// 		
	// 		<option value=<?php $cat['cat_codigo'] ><?php //echo $cat['cat_categoria'] </option>
	// 		<?php
	// 		$this->load->view("Cadastro",$categoria);

	// 	}
	// }


}

?>