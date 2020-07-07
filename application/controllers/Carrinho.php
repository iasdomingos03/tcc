<?php
defined('BASEPATH') or exit('No direct sript acess allowed');

class Carrinho extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('session');

		if(!isset($_SESSION['carrinho'])) {
			$_SESSION['carrinho'] = array();
		}


	}

	
	public function inserirCarrinho($id){
		if(isset($_SESSION['carrinho'][$id])){
			$_SESSION['carrinho'][$id]=1;
		}else{
			$_SESSION['carrinho'][$id]+=1;
		}
	}


	public function deletarCarrinho(){
		if(isset($_SESSION['carrinho'][$id])){ 
			unset($_SESSION['carrinho'][$id]);
		}
	}

	public function atualizarCarrinho($quantidade){
		if(isset($_SESSION['carrinho'][$id])){ 
			if($quantidade > 0) {
				$_SESSION['carrinho'][$id] = $quantidade;
			//$this->session->set_userdata("quantidade",$quantidade);			
			} else {
				deletarCarrinho($id);
			}
		}
	}

	public function valorTotalCarrinho($quantidade,$preco){
		$total=$quantidade*$preco;
		// $session->carrinho->id->set_userdata($total);
	}

	function getContentCarrinho() {

		$results = array();

		if($_SESSION['carrinho']) {

			$carrrinho=$_SESSION['carrinho'];

			$produtos =  getprodutosByIds(implode(',', array_keys($carrinho)));

			foreach($produtos as $produto) {

				$results[] = array(
					'id' => $produto['pro_codigo'],
					'nome' => $produto['pro_titulo'],
					'preco' => $produto['pro_preco'],
					'quantidade' => $carrinho[$produto['pro_codigo']],
					'subtotal' => $carrinho[$produto['pro_codigo']] * $produto['pro_preco'],
				);
			}
		}

		return $results;
	}

	function getTotalCarrinho() {

		$total = 0;

		foreach(getContentCarrinho() as $produto) {
			$total += $produto['subtotal'];
		} 
		return $total;
	}
}