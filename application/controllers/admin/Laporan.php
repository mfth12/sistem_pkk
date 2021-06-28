<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->terotentikasi();
		$this->load->model('proker_model');
		$this->load->model('laporan_model');
		$this->load->model('periode_model');
		$this->load->model('kas_model');
		$this->load->model('pokja_model');
		$this->load->model('surat_model');
		$this->load->model('konfigurasi_model');
		if (!($this->session->userdata('akses_level') == "superadmin" || $this->session->userdata('akses_level') == "kades"))
            show_404();
	}

	public function index()
	{
		$site 			= $this->konfigurasi_model->listing();
		$periode 		= $this->periode_model->detail($this->session->userdata('active_periode'));
		$laporan 		= $this->laporan_model->detail($this->session->userdata('active_periode'));
		$me = $this->laporan_model->look($this->session->userdata('active_periode'));

		if (count($me) == 0) { //ini kalau ngga nemu laporan periode
			$th = 10; //active_periode code 10 = default
			$laporan 	= $this->laporan_model->detail($th);
			$data = array(
				'btn'		=> TRUE,
				'site'		=> $site,
				'tahun_aktif' => $periode,
				'laporan'	=> $laporan,
				'title'		=> 'Laporan',
				'namasite'	=> $site['namaweb'],
				'isi'		=> 'back/laporan/index'
			);
			$this->session->set_flashdata('kuning', 'Laporan belum tersedia');
			$this->load->view('back/wrapper', $data);
		} else {
			$data = array( //jika laporan periode sudah ada
				'btn'		=> FALSE,
				'site'		=> $site,
				'tahun_aktif' => $periode,
				'laporan'	=> $laporan,
				'title'		=> 'Laporan',
				'namasite'	=> $site['namaweb'],
				'isi'		=> 'back/laporan/index'
			);
			$this->load->view('back/wrapper', $data);
		}
	}
	
	public function proses()
	{
		$v 	= $this->form_validation;
		$v->set_rules(
			'umum',
			'Umum',
			'required',
			array('required'	=> 'Kalimat laporan pelaksanaan secara umum harus diisi.')
		);
		if ($v->run()) {
			if ($this->input->post('baru') == 'baru') {
				//lakukan menambah data
				$i = $this->input;
				$data = array(
					'periode_ke'		=> $this->session->userdata('active_periode'),
					'pelaksanaan_umum'	=> $i->post('umum'),
					'hambatan'			=> $i->post('hambatan'),
					'pemecahan_masalah'	=> $i->post('pemecahan_masalah'),
					'kesimpulan'		=> $i->post('kesimpulan'),
					'saran'				=> $i->post('usulan'),
					'penutup'			=> $i->post('penutup'),
					'nama_ttd'			=> $i->post('nama_ttd'),
					'tanggal_ttd'		=> $i->post('tanggal_ttd')
				);
				$this->laporan_model->tambah($data);
				$this->session->set_flashdata('sukses', 'Selamat, Laporan baru periode ini berhasil dibuat.');
				redirect(base_url('admin/laporan'));
			} else {
				//lakukan update data
				$i = $this->input;
				$data = array(
					// 'periode_ke'		=> $this->session->userdata('active_periode'),
					'id_laporan'		=> $i->post('id_laporan'),
					'pelaksanaan_umum'	=> $i->post('umum'),
					'hambatan'			=> $i->post('hambatan'),
					'pemecahan_masalah'	=> $i->post('pemecahan_masalah'),
					'kesimpulan'		=> $i->post('kesimpulan'),
					'saran'				=> $i->post('usulan'),
					'penutup'			=> $i->post('penutup'),
					'nama_ttd'			=> $i->post('nama_ttd'),
					'tanggal_ttd'		=> $i->post('tanggal_ttd')
				);
				$this->laporan_model->edit($data);
				$this->session->set_flashdata('sukses', 'Laporan berhasil diperbarui.');
				redirect(base_url('admin/laporan'));
			}
		}
		if (!$v->run()) {
			$this->session->set_flashdata('dihapus', 'Gagal melakukan proses laporan.');
			redirect(site_url('admin/laporan'));
		}
	}
	
	public function view()
	{
		$site 	= $this->konfigurasi_model->listing();
		$pokja 	= $this->pokja_model->listing();
		$periode= $this->periode_model->detail($this->session->userdata('active_periode'));
		$laporan = $this->laporan_model->detail($this->session->userdata('active_periode'));
		$proker = $this->proker_model->listingUtama();
		$proker_pokja = $this->proker_model->listingUtamaJudul();
		$proker_detail = $this->proker_model->listingLaporan();
		$proker_detail_judul = $this->proker_model->listingLaporanJudul();
		$data = array(
			'title'			=> 'Laporan PKK Tahun' . ' ' . $periode->nama_periode,
			'site'			=> $site,
			'periode'		=> $periode,
			'laporan'		=> $laporan,
			'proker'		=> $proker, //sekretariat
			'proker2'		=> $proker, //sekretariat detail
			'proker_utama'	=> $proker_pokja, //judul proker pokja
			'proker_utama2'	=> $proker_detail, // isi judul proker per-pokja
			'proker_utama2_judul'	=> $proker_detail_judul, // isi judul proker per-pokja
			'proker_detail2'	=> $proker_detail,
			'proker_detail'	=> $proker_detail,
			// 'pokja'			=> $pokja,
			'masuk'			=> $this->kas_model->laporan_masuk(),
			'keluar'		=> $this->kas_model->laporan_keluar(),
			'keluar_detail'		=> $this->kas_model->laporan_keluar_in(),
			'total_masuk'		=> $this->kas_model->total_masuk(),
			'total_keluar'		=> $this->kas_model->total_keluar(),
			'surat_in'		=> $this->surat_model->masuk(),
			'surat_out'		=> $this->surat_model->keluar()
		);
		$this->load->view('back/laporan/file_laporan', $data);
	}

	public function cetak()
	{
		$this->load->library('dompdf_gen');
		$site 	= $this->konfigurasi_model->listing();
		$pokja 	= $this->pokja_model->listing();
		$periode= $this->periode_model->detail($this->session->userdata('active_periode'));
		$laporan = $this->laporan_model->detail($this->session->userdata('active_periode'));
		$proker = $this->proker_model->listingUtama();
		$proker_pokja = $this->proker_model->listingUtamaJudul();
		$proker_detail = $this->proker_model->listingLaporan();
		$proker_detail_judul = $this->proker_model->listingLaporanJudul();
		$data = array(
			'title'			=> 'Laporan PKK Tahun' . ' ' . $periode->nama_periode,
			'site'			=> $site,
			'periode'		=> $periode,
			'laporan'		=> $laporan,
			'proker'		=> $proker, //sekretariat
			'proker2'		=> $proker, //sekretariat detail
			'proker_utama'	=> $proker_pokja, //judul proker pokja
			'proker_utama2'	=> $proker_detail, // isi judul proker per-pokja
			'proker_utama2_judul'	=> $proker_detail_judul, // isi judul proker per-pokja
			'proker_detail2'	=> $proker_detail,
			'proker_detail'	=> $proker_detail,
			// 'pokja'			=> $pokja,
			'masuk'			=> $this->kas_model->laporan_masuk(),
			'keluar'		=> $this->kas_model->laporan_keluar(),
			'keluar_detail'		=> $this->kas_model->laporan_keluar_in(),
			'total_masuk'		=> $this->kas_model->total_masuk(),
			'total_keluar'		=> $this->kas_model->total_keluar(),
			'surat_in'		=> $this->surat_model->masuk(),
			'surat_out'		=> $this->surat_model->keluar()
		);
		$this->load->view('back/laporan/file_laporan', $data);
		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
        // $this->dompdf->set_option('isRemoteEnabled', true);
		
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan_tahunan.pdf", array('Attachment'=>0));
	}
}
