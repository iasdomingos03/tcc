<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        // $this->load->library("session");
    }   
    public function index(){ 

    }    
    public function getProducts(){
        $this->load->model("Products_model");
        $products = $this->Products_model->selectProducts();
        $data = array('products' => $products);
        $this->load->view("Home", $data);
    }    
    public function getProductsByIds($ids) {
        $this->load->model("Products_model");
        $productsByIds = $this->Products_model->selectProductsByIds();
        $data = array(
            'productsByIds' => $productsByIds
        );
        // view carrinho
       // $this->load->view("home", $data);
    }   
}