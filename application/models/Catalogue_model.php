<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Catalogue_model extends CI_Model {
    
    	public function __construct()
    	{
        	parent::__construct();
		$this->load->helper('string');
		$this->load->database();
    	}
	
        
        public function detail_produk($id_produk){
	        $hasil=$this->db->query("call detail_produk('$id_produk')");
	        return $hasil;

        }

}
?>