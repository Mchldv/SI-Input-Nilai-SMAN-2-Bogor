<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    	public function __construct()
    	{
        	parent::__construct();
		$this->load->helper('string');
		$this->load->database();
    	}
	
	function login($email,$password)
    	{
        $query = $this->db->query("call login('$email', '$password')");    
        if($query->num_rows()>0)
        {
		   	foreach($query->result() as $rows)
        		{
               $newdata = array(
				'id_user' => $rows->id_user,
				'nama_user' => $rows->nama_user,
				'email_user' => $rows->email_user,
				'logged_in'  => TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
               return true;            
		}
		return false;
    	}
	
	public function add_user()
	{
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$nomor_telepon=$this->input->post('nomor_telepon');
		$hasil=$this->db->query("call buat_auth('$nama', '$email', '$nomor_telepon', '$password')");
		foreach ($hasil->result() as $row)
		{
			$auth = $row->auth;
		}
		$this->email($email, $auth);
	}
	public function add_member()
	{
		$nama=$this->input->post('nama');
		$email=$this->input->post('email');
		$alamat=$this->input->post('alamat');
		$nomor_telepon=$this->input->post('no_hp');
		$password=$this->input->post('password');
		$hasil=$this->db->query("call buat_auth_member('$nama', '$email', '$alamat', '$nomor_telepon', '$password')");
		foreach ($hasil->result() as $row)
		{
			$auth = $row->memberauth;
		}
		$this->email_member($email, $auth);
	}

        public function add_toko()
	{
		$nama_toko=$this->input->post('namatoko');
		$email_toko=$this->input->post('emailtoko');
                $nama_owner=$this->input->post('namaowner');
                $nomor_teleponowner=$this->input->post('nomor_teleponowner');
                $website=$this->input->post('website');
                $nomor_telepontoko=$this->input->post('nomor_telepontoko');
                $alamat=$this->input->post('alamat');
		$password=$this->input->post('password');
		$hasil=$this->db->query("call buat_auth_toko('$nama_toko', '$email_toko', '$nama_owner', '$nomor_teleponowner', 
                          '$website', '$nomor_telepontoko', '$alamat', '$password')");
                
		foreach ($hasil->result() as $row)
		{
			$auth = $row->tokoauth;
		}
		$this->email($email_toko, $auth);
	}
	
	 public function add_toko_cabang()
	{
		$id_toko = $this->session->userdata('id_toko');
		$email=$this->input->post('email');
		$password=$this->input->post('password');
                $nama_penanggung_jawab=$this->input->post('nama_penanggung_jawab');
                $nomor_telepon_penanggung_jawab=$this->input->post('nomor_telepon_penanggung_jawab');
                $nomor_telepon_cabang=$this->input->post('nomor_telepon_cabang');
                $alamat_cabang=$this->input->post('alamat_cabang');
                $norek=$this->input->post('no_rekening');
                $bank=$this->input->post('bank');
                $id_kota=$this->input->post('kotakota');
                $kota=$this->input->post('kota');
                $kode_pos=$this->input->post('kode_pos');
               	$this->db->query("call buat_cabang('$id_toko', '$email', '$password', '$nama_penanggung_jawab', 
                          '$nomor_telepon_penanggung_jawab', '$nomor_telepon_cabang', '$alamat_cabang','$norek','$bank','$kota','$kode_pos','$id_kota')");
	}
	
	public function check_email_exist($email)
    	{
	   $query=$this->db->query("SELECT `email_user` FROM `user` WHERE `email_user` = '$email'");
        if($query->num_rows()>0){
            	return true;
        }else{
			return false;
        }
    	}

        public function check_email_exist_toko($email)
    	{
	   $query=$this->db->query("SELECT `email_toko` FROM `toko` WHERE `email_toko` = '$email'");
        if($query->num_rows()>0){
            	return true;
        }else{
	   return false;
        }
    	}
	
	public function check_email_exist_toko_cabang($email)
    	{
	   $query=$this->db->query("SELECT `email_toko` FROM `toko`,`cabang` WHERE `email_toko` = '$email' or `email`='$email'");
        if($query->num_rows()>0){
            	return true;
        }else{
	   return false;
        }
    	}
	
	public function email_member($email,$auth)
	{
	$link=base_url();
	// Set SMTP Configuration
	$emailConfig = array(
   	'protocol'  => 'smtp',
    	'smtp_host' => 'ssl://srv15.niagahoster.com',
    	'smtp_port' => 465,
    	'smtp_user' => 'verifikasi@seveid.com',
    	'smtp_pass' => 'seveid01',
    	'mailtype'  => 'html', 
    	'charset'   => 'iso-8859-1'
	);
	
	//Set your email information
	$from = array('email' => 'verifikasi@seveid.com', 'name' => 'Admin SEVE');
	//$to = array('fikry.labsky08@gmail.com');
	$to = $email;
	$subject = 'Verifikasi Akun SEVE';
	$message = "<html><body>
	<h2 style='text-align:center; font-style:italic;'>Verifikasi Email Toko</h2>
	<br>  
	<p>Hai, <a>$email</a>,</p>
	<p>Terima telah mendaftar di SEVE , untuk selanjutnya anda dapat melakkukan klik yang ada dibawah.</p>
        <p>Akun anda akan segara terverifikasi, silahkan klik</p>
        <a style='font-style:italic; font-weight:800;color:#4baf4f' href='http://seveid.com/verifikasi/authentication_member/$auth' target='_blank'>Verifikasi Email</a>
        <!-- a style='font-style:italic; font-weight:800;color:#4baf4f' href='http://seveid.com/UserAgreement/verif/$auth' target='_blank'>User Agreement</a -->
        <p>Untuk kembali ke website,</p>
	<p><a href='http://seveid.com'>seve</a></p></body></html>";
	
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
			//echo '';
		}
	}
	
        public function email($email,$auth)
	{
	$link=base_url();
	// Set SMTP Configuration
	$emailConfig = array(
   	'protocol'  => 'smtp',
    	'smtp_host' => 'ssl://srv15.niagahoster.com',
    	'smtp_port' => 465,
    	'smtp_user' => 'verifikasi@seveid.com',
    	'smtp_pass' => 'seveid01',
    	'mailtype'  => 'html', 
    	'charset'   => 'iso-8859-1'
	);
	
	//Set your email information
	$from = array('email' => 'verifikasi@seveid.com', 'name' => 'Admin SEVE');
	//$to = array('fikry.labsky08@gmail.com');
	$to = $email;
	$subject = 'Verifikasi Pembuatan Akun Baru SEVE';
	$message = "<html><body>
	<h2 style='text-align:center; font-style:italic;'>Verifikasi Email Toko</h2>
	<br>  
	<p>Hai, <a href='mailto:$email'>$email</a>,</p>
	<p>Terima telah mendaftarkan Toko anda, untuk informasi lebih lanjut anda dapat membaca MoU yang ada dibawah.</p>
        <p>Akun anda akan segara terverifikasi, silahkan klik</p>
        <!-- <a style='font-style:italic; font-weight:800;color:#4baf4f' href='http://seveid.com/verifikasi/authentication_toko/$auth' target='_blank'>Verifikasi Email</a> -->
        <a style='font-style:italic; font-weight:800;color:#4baf4f' href='http://seveid.com/UserAgreement/verif/$auth' target='_blank'>User Agreement</a>
        <p>Untuk kembali ke website,</p>
	<p><a href='http://seveid.com'>seve</a></p></body></html>";
	
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
			//echo '';
		}
	}
}
?>