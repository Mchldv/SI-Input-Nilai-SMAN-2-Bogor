<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Transaksi_model extends CI_Model {
    
    	public function __construct()
    	{
        	parent::__construct();
		$this->load->helper('string');
		$this->load->database();
		$this->db->reconnect();
    	}
        public function detail_produk($id_produk){
                $hasil=$this->db->query("call detail_produk('$id_produk')");
                return $hasil;
        }
        public function tambah(){
                $nama = $this->input->post('nama_transaksi');
                $ukuran = $this->input->post('ukuran');
                $alamat = $this->input->post('alamat_transaksi');
                $kontak = $this->input->post('kontak_transaksi');
                $harga = $this->input->post('harga_total');
                $produk = $this->input->post('id_produk');
                $email = $this->input->post('email_transaksi');
                $provinsi = $this->input->post('provinsi_transaksi');
                $kota = $this->input->post('kota_transaksi');
                $hasil=$this->db->query("call tambah_transaksi_trial('$nama', '$alamat', '$kontak','$ukuran','$harga','$produk','$email','$provinsi','$kota')");
                //$hasil=$this->db->query("call vendor_transaksi_trial('$produk')");
                $this->inputto_email($email,$nama,$produk,$ukuran,$alamat,$kontak,$harga);
                foreach ($hasil->result() as $col)
		{
			$namatoko = $col->nama_toko;
			$emailtoko = $col->email_toko;
		}
               	$this->inputto_finance($namatoko,$emailtoko,$ukuran,$alamat,$kontak,$produk,$nama,$provinsi,$kota);
                

        }

	public function inputto_email($email,$auth,$produk,$ukuran,$alamat,$kontak,$harga)
	{
		$link=base_url();
		// Set SMTP Configuration
		$emailConfig = array(
	   	'protocol'  => 'smtp',
	    	'smtp_host' => 'ssl://srv15.niagahoster.com',
	    	'smtp_port' => 465,
	    	'smtp_user' => 'userverification@seveid.com',
	    	'smtp_pass' => 'masdidit123',
	    	'mailtype'  => 'html', 
	    	'charset'   => 'iso-8859-1'
		);
		
		//Set your email information
		$from = array('email' => 'userverification@seveid.com', 'name' => 'SEVE');
		//$to = array('fikry.labsky08@gmail.com');
		$to = $email;
		//$finance='atmosumarto@gmail.com';
		$finance = 'khatami_jambi@yahoo.com';
		$subject = 'Invoice Pembayaran Produk SEVE';
		$message = "<html><body>
		<center><img src='$link/assets/img/logo_seve/logo-01.png' style='width:20%'></center>
		<h2 style='text-align:center; font-style:italic;'>INVOICE PEMBAYARAN PRODUK</h2>
		<br />  
		<p>Dear $auth,</p>
		<p>Terima kasih telah berbelanja di seve.</p><br />
		<p>Berikut rincian pemesanan anda:</p>
			<img src='$link/assets/gambar_kaos/small/1/$produk.jpg'>
			<p>Ukuran: $ukuran</p>
			<p>Nomor HP: $kontak</p>
			<p>Alamat dan Kode Pos: $alamat</p>
			<p>Harga Total: IDR $harga</p><br />
	        <p>Silahkan melakkukan pembayaran 1 x 24 jam</p>
	        <p>Melalui rekening dibawah ini:</p>
	        <p>BCA 38905538877 a/n Muhammad Khatami</p><br />
	        <p>BNI 0364216085 a/n Muhammad Faiq Purnomo</p><br />
	        <p>MANDIRI 9000013081006 a/n Fikry Khairytamim</p><br />
	        <p>Kirim bukti pembayaran dengan cara me-reply ke email ini <a href='mailto:$finance'>klik</a>, Terima kasih.</p><br />
	        <p>Salam,</p>
	        <p>Tim seve</p>
	        <p>Untuk kembali website,</p>
		<a href='$link/home'><img src='$link/assets/img/logo_seve/logo-01.png' style='width:20%'></a></body></html>";
		
		// Load CodeIgniter Email library
		$this->load->library('email', $emailConfig);
		 
		// Sometimes you have to set the new line character for better result
		
		$this->email->set_newline("\r\n");
		// Set email preferences
		$this->email->from($from['email'], $from['name']);
		$this->email->to($to); 
		$this->email->subject($subject);
		$this->email->message($message);
		
		//$this->email->attach('http://seveid.com/assets/mou/MoU_seve.pdf','inline');
		// Ready to send email and check whether the email was successfully sent
		 
			if (!$this->email->send()) {
				// Raise error message
				//show_error($this->email->print_debugger());
			}
			else {
				// Show success notification or other things here
				echo '';
			}
	}
	
        public function inputto_finance($namatoko,$emailtoko,$ukuran,$alamat,$kontak,$produk,$nama,$provinsi,$kota)
	{
		$link=base_url();
		// Set SMTP Configuration
		$emailConfig = array(
	   	'protocol'  => 'smtp',
	    	'smtp_host' => 'ssl://srv15.niagahoster.com',
	    	'smtp_port' => 465,
	    	'smtp_user' => 'userverification@seveid.com',
	    	'smtp_pass' => 'masdidit123',
	    	'mailtype'  => 'html', 
	    	'charset'   => 'iso-8859-1'
		);
		
		//Set your email information
		$from = array('email' => 'userverification@seveid.com', 'name' => 'SEVE');
		$finance = array('atmosumarto@gmail.com');
		$to = $finance;
		$subject = '[SEVE] Invoice Pengiriman Produk';
		$message = "<html><body>
		<center><img src='$link/assets/img/logo_seve/logo-01.png' style='width:20%; background-color:#003a75'></center>
		<h2 style='text-align:center; font-style:italic;'>INVOICE PEMBAYARAN PRODUK</h2>
		<br />  
		<p>Dear <b>$emailtoko</b>,</p><br />
		<p>Berikut rincian pemesanan oleh $nama:</p>
			<img src='$link/assets/gambar_kaos/small/1/$produk.jpg'>
			<p>Ukuran: $ukuran</p>
			<p>Nomor HP: $kontak</p>
			<p>Alamat dan Kode Pos: $alamat, $kota, $provinsi</p><br />
			
			<p><b>Kepada $namatoko, dimohon untuk menunggu kabar pembayaran dari tim seve, kemudian dapat melakkukan pengiriman sesuai data yang tertera diatas.</b></p>
	        <p>Salam,</p>
	        <p>Tim seve</p></body></html>";
		
		// Load CodeIgniter Email library
		$this->load->library('email', $emailConfig);
		 
		// Sometimes you have to set the new line character for better result
		
		$this->email->set_newline("\r\n");
		// Set email preferences
		$this->email->from($from['email'], $from['name']);
		$this->email->to($to); 
		$this->email->subject($subject);
		$this->email->message($message);
		
		//$this->email->attach('http://seveid.com/assets/mou/MoU_seve.pdf','inline');
		// Ready to send email and check whether the email was successfully sent
		 
			if (!$this->email->send()) {
				// Raise error message
				//show_error($this->email->print_debugger());
			}
			else {
				// Show success notification or other things here
				echo '';
			}
	}




/*	
	public function inputto_vendor($auth,$email,$ukuran,$alamat,$kontak,$produk,$nama)
	{
		$link=base_url();
		// Set SMTP Configuration
		$emailConfig = array(
	   	'protocol'  => 'smtp',
	    	'smtp_host' => 'ssl://srv15.niagahoster.com',
	    	'smtp_port' => 465,
	    	'smtp_user' => 'userverification@seveid.com',
	    	'smtp_pass' => 'masdidit123',
	    	'mailtype'  => 'html', 
	    	'charset'   => 'iso-8859-1'
		);
		
		//Set your email information
		$from = array('email' => 'userverification@seveid.com', 'name' => 'SEVE');
		//$to ='kwu.htmc@gmail.com';
		$to = $email;
		//$finance='atmosumarto@gmail.com';
		$subject = '[SEVE] Invoice Pengiriman Produk';
		$message = "<html><body>
		<center><img src='$link/assets/img/logo_seve/logo.png' style='width:20%; background-color:#003a75'></center>
		<h2 style='text-align:center; font-style:italic;'>INVOICE PEMBAYARAN PRODUK</h2>
		<br />  
		<p>Dear <b>$auth</b>,</p><br />
		<p>Berikut rincian pemesanan oleh $nama:</p>
			<img src='$link/assets/gambar_kaos/small/1/$produk.jpg'>
			<p>Ukuran: $ukuran</p>
			<p>Nomor HP: $kontak</p>
			<p>Alamat dan Kode Pos: $alamat,$kota,$provinsi</p><br />
			
			<p><b>Kepada $auth dimohon untuk menunggu kabar pembayaran dari tim seve, kemudian dapat melakkukan pengiriman sesuai data yang tertera diatas.</b></p>
	        <p>Salam,</p>
	        <p>Tim seve</p></body></html>";
		
		// Load CodeIgniter Email library
		$this->load->library('email', $emailConfig);
		 
		// Sometimes you have to set the new line character for better result
		
		$this->email->set_newline("\r\n");
		// Set email preferences
		$this->email->from($from['email'], $from['name']);
		$this->email->to($to); 
		$this->email->subject($subject);
		$this->email->message($message);
		
		//$this->email->attach('http://seveid.com/assets/mou/MoU_seve.pdf','inline');
		// Ready to send email and check whether the email was successfully sent
		 
			if (!$this->email->send()) {
				// Raise error message
				show_error($this->email->print_debugger());
			}
			else {
				// Show success notification or other things here
				echo '';
			}
	}*/

public function get_ukuran($id){
		$this->db->reconnect();
		$query = $this->db->query("call show_tipe_per_produk('$id')");
		return $query;
	}

	public function jumlah_produk($id){
		$this->db->reconnect();
		$query = $this->db->query("select * from jml_produk where id_produk='$id'");
		return $query;
	}

	public function cek_ketersediaan_produk($id, $ukuran){
		$this->db->reconnect();
		$set = "select cabang.id_cabang, cabang.kota as 'kota', cabang.id_kota from jml_produk, cabang where jml_produk.id_cabang = cabang.id_cabang and ".$ukuran." <> 0 and jml_produk.id_produk = '$id';";
		$query = $this->db->query($set);
		return $query;
	}

	public function get_produk($id){
		$this->db->reconnect();
		$query = $this->db->query("select * from produk where id_produk = '$id'");
		return $query;
	}
}