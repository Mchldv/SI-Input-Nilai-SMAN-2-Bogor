<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admincabang_model extends CI_Model {
    
    	public function __construct()
    	{
        	parent::__construct();
		$this->load->database();
		$this->db->reconnect();
    	}
    	
        function login($email,$password) {
	        $query = $this->db->query("call login_cabang('$email', '$password')");    
	        if($query->num_rows()>0)
	        {
		   	foreach($query->result() as $rows)
        		{
               $newdata = array(
               			'id_cabang' => $rows->id_cabang,
				'id_toko' => $rows->cabang,
				'nama_user' => $rows->nama_penanggung_jawab,
				'email_user' => $rows->email,
				'type_user' => 'admin_cabang',
				'logged_in'  => TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
               return true;            
		}
		return false;
    	}
    		
	
        public function get_id_produk_terakhir($id_toko){
                $hasil=$this->db->query("call get_id_terakhir_produk('$id_toko')");
                return $hasil;

        }

        
        public function get_produk_saya($id_toko,$email){
                $hasil=$this->db->query("call daftar_produk_saya_cabang('$id_toko', '$email')");
                return $hasil;

        }

        public function get_info_cabang($id_toko){
                $hasil=$this->db->query("call lihat_info_cabang('$id_toko')");
                return $hasil;

        }
        
        public function get_cabang_saya($id_toko){
                $hasil=$this->db->query("call lihat_cabang('$id_toko')");
                return $hasil;

        }
        
        public function edit_produk($id_produk,$id_toko){
        	$this->db->reconnect();
	        $hasil=$this->db->query("call edit_produk('$id_produk','$id_toko')");
	        return $hasil;

        }
        
        public function edit_pembayaran($id_toko, $no_rek, $bank){
	        $hasil=$this->db->query("call edit_norek_cabang('$id_toko', '$no_rek','$bank')");
        }
        
        
        public function show_kategori(){
        	$this->db->reconnect();
	        $hasil=$this->db->query("call show_kategori()");
	        return $hasil;
        }
        
        public function show_subcategory($id){
        	$this->db->reconnect();
	        $hasil=$this->db->query("call show_subcategory('$id')");
	        return $hasil;
        }
        
        public function show_tipe_subcategory($id){
        	$this->db->reconnect();
	        $hasil=$this->db->query("call show_tipe_category('$id')");
	        return $hasil;
        }
        
        public function show_tipe_from_pk_kategory($id){
        	$this->db->reconnect();
	        $hasil=$this->db->query("select tipe from subcategory where pk_subcategory = (select produk_kategori from produk where id_produk = '$id');");
	        return $hasil;
        }
        
        public function select_jml_produk($id_produk, $id_cabang){
        	$this->db->reconnect();
	        $hasil=$this->db->query("select * from jml_produk where id_produk = '$id_produk' and id_cabang = '$id_cabang';");
	        return $hasil;
        }
        
        public function simpan_jumlah_produk($id_produk, $id_cabang){
        	$u1=$this->input->post('u1');
        	$u2=$this->input->post('u2');
        	$u3=$this->input->post('u3');
        	$u4=$this->input->post('u4');
        	$u5=$this->input->post('u5');
        	$u6=$this->input->post('u6');
        	$u7=$this->input->post('u7');
        	$u8=$this->input->post('u8');
        	$u9=$this->input->post('u9');
        	$u10=$this->input->post('u10');
        	$u11=$this->input->post('u11');
        	$u12=$this->input->post('u12');
        	$this->db->reconnect();
	        $hasil=$this->db->query("call simpan_jumlah_produk('$id_produk','$id_cabang','$u1','$u2','$u3','$u4','$u5','$u6','$u7','$u8','$u9','$u10','$u11','$u12');");
	        return $hasil;
        }
        
}
?>