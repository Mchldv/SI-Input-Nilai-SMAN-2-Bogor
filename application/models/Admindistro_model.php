<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admindistro_model extends CI_Model {
    
    	public function __construct(){
        	parent::__construct();
		$this->load->helper('string');
		$this->load->database();
		$this->db->reconnect();
    	}
	

        function login($email,$password){
        $query = $this->db->query("call login_toko('$email', '$password')");    
        if($query->num_rows()>0)
        {
		   	foreach($query->result() as $rows)
        		{
               $newdata = array(
				'id_toko' => $rows->id_toko,
				'nama_user' => $rows->nama_toko,
				'email_user' => $rows->email_toko,
				'type_user' => 'admin_distro',
				'logged_in'  => TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
               return true;            
		}
		return false;
    	}
    		
	public function tambah_produk(){
		$this->db->reconnect();
                $id_toko = $this->session->userdata('id_toko');
                $brand = $this->input->post('brand');
                $id_brand = $this->input->post('id_brand');
                $discount = $this->input->post('discount');
		$nama_produk=$this->input->post('nama_produk');
		$deskripsi_produk=$this->input->post('deskripsi_produk');
		$harga=$this->input->post('harga');
		$gender=$this->input->post('gender');
		$produk_kategori = $this->input->post('type1');
		$penyimpanan = $this->input->post('penyimpanan');
                $berat= $this->input->post('berat');
		$tipe = $this->show_tipe_subcategory($produk_kategori);
		foreach($tipe->result() as $row){
			$tipe=$row->tipe;
		}
		$status_tampil='(NULL)';
		if($tipe==0){
			$ukuran=$this->input->post('ukuran');
		}else if($tipe==1){
			$c1=$this->input->post('c1');
			$c2=$this->input->post('c2');
	                $c3=$this->input->post('c3');
	                $c4=$this->input->post('c4');
	                $c5=$this->input->post('c5');
	                $c6=$this->input->post('c6');
	                
	                $l1=$this->input->post('l1');
			$l2=$this->input->post('l2');
	                $l3=$this->input->post('l3');
	                $l4=$this->input->post('l4');
	                $l5=$this->input->post('l5');
	                $l6=$this->input->post('l6');
	                
	                $s1=$this->input->post('s1');
			$s2=$this->input->post('s2');
	                $s3=$this->input->post('s3');
	                $s4=$this->input->post('s4');
	                $s5=$this->input->post('s5');
	                $s6=$this->input->post('s6');
	                
                }else if($tipe==2){
                	$u36=$this->input->post('u36');
                	$u37=$this->input->post('u37');
                	$u38=$this->input->post('u38');
                	$u39=$this->input->post('u39');
                	$u40=$this->input->post('u40');
                	$u41=$this->input->post('u41');
                	$u42=$this->input->post('u42');
                	$u43=$this->input->post('u43');
                	$u44=$this->input->post('u44');
                	$u45=$this->input->post('u45');
                	$u46=$this->input->post('u46');
                	$u47=$this->input->post('u47');
                }else if($tipe==3){
                	$i27=$this->input->post('i27');
                	$i28=$this->input->post('i28');
                	$i29=$this->input->post('i29');
                	$i30=$this->input->post('i30');
                	$i31=$this->input->post('i31');
                	$i32=$this->input->post('i32');
                	$i33=$this->input->post('i33');
                	$i34=$this->input->post('i34');
                	$i35=$this->input->post('i35');
                	$i36=$this->input->post('i36');
                	$i37=$this->input->post('i37');
                	$i38=$this->input->post('i38');
                	
                	$w27=$this->input->post('w27');
                	$w28=$this->input->post('w28');
                	$w29=$this->input->post('w29');
                	$w30=$this->input->post('w30');
                	$w31=$this->input->post('w31');
                	$w32=$this->input->post('w32');
                	$w33=$this->input->post('w33');
                	$w34=$this->input->post('w34');
                	$w35=$this->input->post('w35');
                	$w36=$this->input->post('w36');
                	$w37=$this->input->post('w37');
                	$w38=$this->input->post('w38');
                	
                	$h27=$this->input->post('h27');
                	$h28=$this->input->post('h28');
                	$h29=$this->input->post('h29');
                	$h30=$this->input->post('h30');
                	$h31=$this->input->post('h31');
                	$h32=$this->input->post('h32');
                	$h33=$this->input->post('h33');
                	$h34=$this->input->post('h34');
                	$h35=$this->input->post('h35');
                	$h36=$this->input->post('h36');
                	$h37=$this->input->post('h37');
                	$h38=$this->input->post('h38');
                	
                	$t27=$this->input->post('t27');
                	$t28=$this->input->post('t28');
                	$t29=$this->input->post('t29');
                	$t30=$this->input->post('t30');
                	$t31=$this->input->post('t31');
                	$t32=$this->input->post('t32');
                	$t33=$this->input->post('t33');
                	$t34=$this->input->post('t34');
                	$t35=$this->input->post('t35');
                	$t36=$this->input->post('t36');
                	$t37=$this->input->post('t37');
                	$t38=$this->input->post('t38');
                }
                $id_produk='';
                if($tipe==0){	
                $this->db->reconnect();
                	$id_produk = $this->db->query("call tambah_produk_tipe0('$nama_produk', '$deskripsi_produk', '$harga', '$id_toko', '$penyimpanan', '$berat', '$produk_kategori', '$gender', '$status_tampil','$tipe','$brand','$id_brand','$discount','$ukuran')");                
                }else if($tipe==1){
                	$this->db->reconnect();
                	$id_produk = $this->db->query("call tambah_produk_tipe1('$nama_produk', '$deskripsi_produk', '$harga', '$id_toko', '$penyimpanan', '$berat', '$produk_kategori', '$gender', '$status_tampil','$tipe','$brand','$id_brand','$discount','$c1', '$c2', '$c3', '$c4', '$c5', '$c6','$l1', '$l2', '$l3', '$l4', '$l5', '$l6','$s1', '$s2', '$s3', '$s4', '$s5', '$s6')");
                }else if($tipe==2){
                	$this->db->reconnect();
                	$id_produk = $this->db->query("call tambah_produk_tipe2('$nama_produk', '$deskripsi_produk', '$harga', '$id_toko', '$penyimpanan', '$berat', '$produk_kategori', '$gender', '$status_tampil','$tipe','$brand','$id_brand','$discount','$u36', '$u37', '$u38', '$u39', '$u40', '$u41','$u42', '$u43','$u44','$u45','$u46','$u47')");
                }else if($tipe==3){
                	$this->db->reconnect();
                	$id_produk = $this->db->query("call tambah_produk_tipe3('$nama_produk', '$deskripsi_produk', '$harga', '$id_toko', '$penyimpanan', '$berat', '$produk_kategori', '$gender', '$status_tampil','$tipe','$brand','$id_brand','$discount','$i27', '$i28', '$i29', '$i30', '$i31', '$i32', '$i33', '$i34','$i35', '$i36','$i37','$i38',
                	'$w27', '$w28', '$w29', '$w30', '$w31', '$w32', '$w33', '$w34','$w35', '$w36','$w37','$w38',
                	'$h27', '$h28', '$h29', '$h30', '$h31', '$h32', '$h33', '$h34','$h35', '$h36','$h37','$h38',
                	'$t27', '$t28', '$t29', '$t30', '$t31', '$t32', '$t33', '$t34','$t35', '$t36','$t37','$t38'
                	)");
                }
                $this->db->reconnect();
                foreach($id_produk->result() as $r){ $id_produk=$r->id_produk;}
                //$pesan = "Produk sudah ditambahkan ke distro Anda, harap menambah keterangan <a href='http://seveid.com/AdminDistro/edit_produk/".$id_produk."'>di sini</a>";
                $pesan="Produk sudah ditambahkan ke distro Anda, harap menambah keterangan pada daftar produk";
                $this->db->query("insert into pesan_distro(id_distro, pesan, tanggal) values('$id_toko','$pesan',now())");
	}
	
	public function simpan_produk($id_produk){
               	$this->db->reconnect();
                $id_toko = $this->session->userdata('id_toko');
                $brand = $this->input->post('brand');
                $id_brand = $this->input->post('id_brand');
                $discount = $this->input->post('discount');
		$nama_produk=$this->input->post('nama_produk');
		$deskripsi_produk=$this->input->post('deskripsi_produk');
		$harga=$this->input->post('harga');
		$gender=$this->input->post('gender');
		$penyimpanan = $this->input->post('penyimpanan');
                $berat= $this->input->post('berat');
		$tipe = $this->show_tipe_from_pk_kategory($id_produk);
		foreach($tipe->result() as $row){
			$tipe=$row->tipe;
		}
		$status_tampil='(NULL)';
		if($tipe==0){
			$ukuran=$this->input->post('ukuran');
		}else if($tipe==1){
			$c1=$this->input->post('c1');
			$c2=$this->input->post('c2');
	                $c3=$this->input->post('c3');
	                $c4=$this->input->post('c4');
	                $c5=$this->input->post('c5');
	                $c6=$this->input->post('c6');
	                
	                $l1=$this->input->post('l1');
			$l2=$this->input->post('l2');
	                $l3=$this->input->post('l3');
	                $l4=$this->input->post('l4');
	                $l5=$this->input->post('l5');
	                $l6=$this->input->post('l6');
	                
	                $s1=$this->input->post('s1');
			$s2=$this->input->post('s2');
	                $s3=$this->input->post('s3');
	                $s4=$this->input->post('s4');
	                $s5=$this->input->post('s5');
	                $s6=$this->input->post('s6');
                }else if($tipe==2){
                	$u36=$this->input->post('u36');
                	$u37=$this->input->post('u37');
                	$u38=$this->input->post('u38');
                	$u39=$this->input->post('u39');
                	$u40=$this->input->post('u40');
                	$u41=$this->input->post('u41');
                	$u42=$this->input->post('u42');
                	$u43=$this->input->post('u43');
                	$u44=$this->input->post('u44');
                	$u45=$this->input->post('u45');
                	$u46=$this->input->post('u46');
                	$u47=$this->input->post('u47');
                }else if($tipe==3){
                	$i27=$this->input->post('i27');
                	$i28=$this->input->post('i28');
                	$i29=$this->input->post('i29');
                	$i30=$this->input->post('i30');
                	$i31=$this->input->post('i31');
                	$i32=$this->input->post('i32');
                	$i33=$this->input->post('i33');
                	$i34=$this->input->post('i34');
                	$i35=$this->input->post('i35');
                	$i36=$this->input->post('i36');
                	$i37=$this->input->post('i37');
                	$i38=$this->input->post('i38');
                	
                	$w27=$this->input->post('w27');
                	$w28=$this->input->post('w28');
                	$w29=$this->input->post('w29');
                	$w30=$this->input->post('w30');
                	$w31=$this->input->post('w31');
                	$w32=$this->input->post('w32');
                	$w33=$this->input->post('w33');
                	$w34=$this->input->post('w34');
                	$w35=$this->input->post('w35');
                	$w36=$this->input->post('w36');
                	$w37=$this->input->post('w37');
                	$w38=$this->input->post('w38');
                	
                	$h27=$this->input->post('h27');
                	$h28=$this->input->post('h28');
                	$h29=$this->input->post('h29');
                	$h30=$this->input->post('h30');
                	$h31=$this->input->post('h31');
                	$h32=$this->input->post('h32');
                	$h33=$this->input->post('h33');
                	$h34=$this->input->post('h34');
                	$h35=$this->input->post('h35');
                	$h36=$this->input->post('h36');
                	$h37=$this->input->post('h37');
                	$h38=$this->input->post('h38');
                	
                	$t27=$this->input->post('t27');
                	$t28=$this->input->post('t28');
                	$t29=$this->input->post('t29');
                	$t30=$this->input->post('t30');
                	$t31=$this->input->post('t31');
                	$t32=$this->input->post('t32');
                	$t33=$this->input->post('t33');
                	$t34=$this->input->post('t34');
                	$t35=$this->input->post('t35');
                	$t36=$this->input->post('t36');
                	$t37=$this->input->post('t37');
                	$t38=$this->input->post('t38');
                }
                if($tipe==0){	
                $this->db->reconnect();
                	$this->db->query("call simpan_produk_tipe0('$id_produk','$nama_produk', '$deskripsi_produk', '$harga', '$penyimpanan', '$berat', '$gender','$brand','$id_brand','$discount','$ukuran')");                
                }else if($tipe==1){
                	$this->db->reconnect();
                	$this->db->query("call simpan_produk_tipe1('$id_produk','$nama_produk', '$deskripsi_produk', '$harga', '$penyimpanan', '$berat',  '$gender', '$brand','$id_brand','$discount','$c1', '$c2', '$c3', '$c4', '$c5', '$c6','$l1', '$l2', '$l3', '$l4', '$l5', '$l6','$s1', '$s2', '$s3', '$s4', '$s5', '$s6')");
                }else if($tipe==2){
                	$this->db->reconnect();
                	$this->db->query("call simpan_produk_tipe2('$id_produk','$nama_produk', '$deskripsi_produk', '$harga', '$penyimpanan', '$berat', '$gender', '$status_tampil','$brand','$id_brand','$discount','$u36', '$u37', '$u38', '$u39', '$u40', '$u41','$u42', '$u43','$u44','$u45','$u46','$u47')");
                }else if($tipe==3){
                	$this->db->reconnect();
                	$this->db->query("call simpan_produk_tipe3('$id_produk','$nama_produk', '$deskripsi_produk', '$harga','$penyimpanan', '$berat', '$gender', '$brand','$id_brand','$discount','$i27', '$i28', '$i29', '$i30', '$i31', '$i32', '$i33', '$i34','$i35', '$i36','$i37','$i38',
                	'$w27', '$w28', '$w29', '$w30', '$w31', '$w32', '$w33', '$w34','$w35', '$w36','$w37','$w38',
                	'$h27', '$h28', '$h29', '$h30', '$h31', '$h32', '$h33', '$h34','$h35', '$h36','$h37','$h38',
                	'$t27', '$t28', '$t29', '$t30', '$t31', '$t32', '$t33', '$t34','$t35', '$t36','$t37','$t38'
                	)");
                }

	}

        public function get_id_produk_terakhir($id_toko){
                $hasil=$this->db->query("call get_id_terakhir_produk('$id_toko')");
                return $hasil;
        }

        
        public function get_produk_saya($id_toko){
                $hasil=$this->db->query("call daftar_produk_saya('$id_toko')");
                return $hasil;
        }

        public function get_info_toko($id_toko){
                $hasil=$this->db->query("call lihat_info_toko('$id_toko')");
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
        
        public function edit_pembayaran($id_toko, $no_rek, $opsi, $bank){
	        $hasil=$this->db->query("call edit_norek('$id_toko', '$no_rek', '$opsi','$bank')");
        }
        
        public function hapus_produk($id_produk){
	      	$this->db->query("call hapus_daftarproduk('$id_produk')");
        }
        
        public function hapus_cabang($id_cabang){
	      	$this->db->query("call hapus_cabang('$id_cabang')");
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
        
	public function simpan_pengaturan_toko($nama_toko, $nama_owner, $nohp_toko,
$nomor_teleponowner, $website, $alamat_toko, $email_toko){
$this->db->reconnect();
	        $hasil=$this->db->query("call simpan_pengaturan_toko('$nama_toko', '$nama_owner', '$nohp_toko',
'$nomor_teleponowner', '$website', '$alamat_toko', '$email_toko')");

        }
        
        public function show_tipe_from_pk_kategory($id){
        	$this->db->reconnect();
	        $hasil=$this->db->query("select tipe from subcategory where pk_subcategory = (select produk_kategori from produk where id_produk = '$id');");
	        return $hasil;
        }
        
        public function show_ukuran_nol($id_produk){
        	$this->db->reconnect();
	        $hasil=$this->db->query("call show_ukuran_nol('$id_produk')");
	        return $hasil;
        }
        
        public function show_ukuran_satu($id_produk){
        	$this->db->reconnect();
	        $hasil=$this->db->query("call show_ukuran_satu('$id_produk')");
	        return $hasil;
        }
        
       	public function show_ukuran_dua($id_produk){
        	$this->db->reconnect();
	        $hasil=$this->db->query("call show_ukuran_dua('$id_produk')");
	        return $hasil;
        }
        
        public function show_ukuran_tiga($id_produk){
        	$this->db->reconnect();
	        $hasil=$this->db->query("call show_ukuran_tiga('$id_produk')");
	        return $hasil;
        }
        
       public function daftar_pesan(){
        	$this->db->reconnect();
                $id_toko = $this->session->userdata('id_toko');
	        $hasil=$this->db->query("select * from pesan_distro where id_distro='$id_toko'");
	        return $hasil;
        }

}
?>