<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapot extends CI_Controller {

	public function __construct ()
	{
		parent::__construct();
		$this->load->model ('rapot_model');
		$this->load->model ('mapel_model');
	}

	public function index()
	{
		$this->load->view('header/header');
        $this->load->view('navbar/navbar');
        $this->load->view('rapot/index');
        $this->load->view('footer/footer');
	}

	public function import()
	{
		// Read CSV File put array of data in $data
		if(!empty($data)) {
			//Keterangan rapot
			$ket_sem_1 = null;
			$ket_sem_2 = null;

			//Variable mapel dalam array nilai_mapel akan diisi oleh array nilai siswa-siswa
			//pada mata pelajaran tersebut. 
			$nilai_umum_sem_1 = [$agm = null, $pkn = null,  $ind  = null, $mtk  = null, $sej  = null,
								$ing  = null, $sbk = null, $pjs  = null, $pdk = null, $snd = null, $lm = null];
			$nilai_umum_sem_2 = $nilai_umum_sem_1;

			$nilai_minat_sem_1 = [$minat_1 = null, $minat_2 = null, $minat_3 = null, $minat_4 = null];
			$nilai_minat_sem_2 = $nilai_minat_sem_1;

			//Cek jurusan perkelas berdasarkan siswa pertama
			if(preg_match('/MIPA/', $data[0]['kelas'])) {
				$jurusan = "MIPA";
			} elseif (preg_match('/IPS/', $data[0]['kelas'])){
				$jurusan = "IPS";
			}

			$mapel_umum = $this->mapel_model->get_by_kelompok('umum');
			$mapel_mipa = $this->mapel_model->get_by_kelompok('mipa');
			$mapel_ips = $this->mapel_model->get_by_kelompok('ips');
			$mapel_minat = ($jurusan === 'MIPA' ? $mapel_mipa : $mapel_ips);

			//Isi nilai untuk setiap mata pelajaran
			foreach ($mapel_umum as $i => $mapel) {
				$nilai_umum_sem_1[$i] = isiNilaiMapel($data, $nilai_umum_sem_1[$i], 'ganjil', 
										$mapel->kode, $mapel->ki3_ganjil, $mapel->ki4_ganjil);

				$nilai_umum_sem_2[$i] = isiNilaiMapel($data, $nilai_umum_sem_2[$i], 'genap', 
										$mapel->kode, $mapel->ki3_genap, $mapel->ki4_genap);
			}

			foreach ($mapel_minat as $i => $mapel) {
				$nilai_minat_sem_1[$i] = isiNilaiMapel($data, $nilai_minat_sem_1[$i], 'ganjil', 
										$mapel->kode, $mapel->ki3_ganjil, $mapel->ki4_ganjil);

				$nilai_minat_sem_2[$i] = isiNilaiMapel($data, $nilai_minat_sem_2[$i], 'genap', 
										$mapel->kode, $mapel->ki3_genap, $mapel->ki4_genap);
			}

			//Isi data siswa serta keterangan rapot
			foreach ($data as $k => $v) {
				$siswa[] = [
							'nis' => $v['nis'],
							'nama' => $v['nama_siswa'],
							// 'foto' => public_path('images\\' . $v['nis'] . '.jpg'),
							'jurusan' => $jurusan
							];

				$rapot[] = [
							'nis' => $v['nis'],
							'kode' => $v['kode_raport']
							];

				$lintas_minat[] = [
							'kode_rapot' => $v['kode_raport'],
							'nama_lm' => $v['mapel_lintasminat_1']
							];

				$ket_sem_1[] = isiKeteranganRapot($v, 'ganjil');
				$ket_sem_2[] = isiKeteranganRapot($v, 'genap');
			}

			if(!empty($siswa)){
				$this->siswa_model->insert($siswa);
				$this->rapot_siswa_model->insert($rapot);
				$this->rapot_model->insert($ket_sem_1);
				$this->rapot_model->insert($ket_sem_2);
				$this->lintas_minat_model->insert($lintas_minat);
				for($i = 0; $i < count($nilai_umum_sem_1); $i++) {
					$this->nilai_model->insert($nilai_umum_sem_1[$i]);
					$this->nilai_model->insert($nilai_umum_sem_2[$i]);
				}

				for($j = 0; $i < count($nilai_minat_sem_1); $j++) {
					$this->nilai_model->insert($nilai_minat_sem_1[$i]);
					$this->nilai_model->insert($nilai_minat_sem_2[$i]);
				}
			}

			index();
		}
	}

	/**
	 * Membuat array untuk mengisi nilai rapot berdasarkan mata pelajaran ke database.
	 *
	 * @param array([]) $data Data hasil convert dari file csv ke array
	 * @param array([]) $target Array untuk menampung nilai siswa-siswa berdasarkan mata pelajaran
	 * @param string $semester Semester berupa ganjil atau genap
	 * @param string $id_mapel Id mata pelajaran yang akan didapatkan nilainya
	 * @param string $id_mapel_ki3 Id mata pelajaran berdasarkan kriteria penilaian teori,
	 *			id ini menyesuaikan dengan header csv untuk meretrieve nilai dari suatu mata pelajaran
	 * @param string $id_mapel_ki4 Id mata pelajaran berdasarkan kriteria penilaian praktik,
	 *			id ini menyesuaikan dengan header csv untuk meretrieve nilai dari suatu mata pelajaran
	 *
	 * @return array([]) $result;
	 */
	private function isiNilaiMapel($data, $target, $semester, $id_mapel, $id_mapel_ki3, $id_mapel_ki4) 
    {
    	$sem_index = ($semester === 'ganjil' ? 'sem_ganjil' : 'sem_genap');

		for ($i = 0; $i < count($data); $i++) {
		    $target[$i]['nis'] = $data[$i]['nis'];
		    $target[$i]['kode_rapot'] = $data[$i]['kode_raport'];
		    $target[$i]['thn_ajaran'] = $data[$i]['tahun'];
		    $target[$i]['semester'] = $data[$i][$sem_index];

		    $target[$i]['id_mapel'] = $id_mapel;

		    $target[$i]['nilai_ki3'] = $data[$i][$id_mapel_ki3];
		    $target[$i]['nilai_ki4'] = $data[$i][$id_mapel_ki4];
		}
		return $target;
	}

	/**
	 * Membuat array untuk mengisi keterangan rapot ke database.
	 *
	 * @param array() $data Data hasil convert dari file csv ke array
	 * @param string $semester Semester berupa ganjil atau genap
	 *
	 * @return string[] $result;
	 */
	private function isiKeteranganRapot($data, $semester) 
    {
    	$sem_index = ($semester === 'ganjil' ? 'sem_ganjil' : 'sem_genap');
    	$sem = ($semester === 'ganjil' ? 'sem1' : 'sem2');

    	$result = [
    				 'nis' => $data['nis'],
				     'kode_rapot' => $data['kode_raport'],
				     'thn_ajaran' => $data['tahun'],
				     'semester' => $data[$sem_index],
				     'spiritual' => $data['sikap_spiritual_' . $sem],
				     'sosial' => $data['sikap_sosial_' . $sem],
				     'sakit' => $data['sakit_' . $sem],
				     'izin' => $data['izin_' . $sem],
				     'alpha' => $data['alpha_' . $sem],
				     'terlambat' => $data['lambat_' . $sem]
    				 ];
		
		return $result;
	}

    public function verifikasi_tambah()
	{
		$input = $this->input->post('nama');
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Kurikulum','required|max_length[20]|xss_clean');
        

		if ($this->form_validation->run() == TRUE)
		{
			$this->kurikulum_model->insert($input);
			$data['error']="sukses";
			$this->cetak($data);
		}
		else
		{
            $data['error']="gagal";
            $this->tambah($data);
        }
        //var_dump($data['error']);
        //exit();
    }

    public function verifikasi_edit()
	{
		$data['nama'] = $this->input->post('nama');
		$data['id'] = $this->input->post('id');
		$id['id']=$data['id'];
		$this->load->helper('security');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Kurikulum','required|max_length[20]|xss_clean');
        
		if ($this->form_validation->run() == TRUE)
		{
			$this->kurikulum_model->update($data,$id);
			$data['error']="sukses";
		}
		else
            $data['error']="gagal";
        //var_dump($data['error']);
        //exit();
        $this->cetak($data);
	}

}
