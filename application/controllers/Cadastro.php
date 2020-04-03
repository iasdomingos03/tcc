<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Cadastro extends CI_Controller{

	public function index(){
		echo "Esse é o controller do formulario";
	}


	public function exibeFormulario(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');

		$this->load->model('Formulario_model');
		$forms= $this->Formulario_model->exibirDados();

		$data=array(
			"forms"=>$forms
		);
		

		$this->load->view("Cadastro",$data);
		

	}
	public function cadastraJogos(){
		$this->load->helper(['form','url']);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('pro_titulo','Titulo', 'required');
		$this->form_validation->set_rules('cat_codigo','Categoria');
		$this->form_validation->set_rules('for_cnpj','Fornecedor');
		$this->form_validation->set_rules('cla_codigo','Classificacao');
		$this->form_validation->set_rules('pro_anoLancamento','Ano Lançamento', 'required');
		$this->form_validation->set_rules('pro_descricao','descricao', 'required');
		$this->form_validation->set_rules('pro_sinopse','Sinopse', 'required');
		$this->form_validation->set_rules('pro_imagem','Imagem');
		$this->form_validation->set_rules('pro_preco','Preco', 'required');

		if($this->form_validation->run() == FALSE){
			$this->load->view("Cadastro");
		}else{
			$data=$this->input->post();
			$this->load->model('Formulario_model');
			$this->Formulario_model->inserirJogos($data);
			echo "Cadastro Efetuado";
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