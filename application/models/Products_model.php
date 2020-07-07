<?php
class Products_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    public function selectProducts(){
 
        $this->db->from("tbl_produtosJogos");
        return $this->db->get()->result_array();
    }
 
    public function selectProductsByIds($ids){
        $this->db
        ->from("tbl_produtosJogos")
        ->where_in("pro_codigo", $ids);
        return $this->db->get()->result_array();
    }
}