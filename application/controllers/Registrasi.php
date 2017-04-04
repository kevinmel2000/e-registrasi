<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Registrasi_model');
		$this->load->library('pagination');
	}

	public function index()
	{

		if (isset($_POST['search'])) {

			$tahun_ajaran = $this->input->post('tahun_ajaran') ? $this->input->post('tahun_ajaran') : '';
			$status_trx = $this->input->post('status_trx') ? $this->input->post('status_trx') : '';
			$fakultas = $this->input->post('fakultas') ? $this->input->post('fakultas') : '';

			$data['tahun_ajaran'] = $tahun_ajaran;
			$data['fakultas'] = $fakultas;
			$data['status_trx'] = $status_trx;

			// set session user data untuk pencarian, untuk paging pencarian
		  $this->session->set_userdata('sess_status_trx', $data['status_trx']);
			$this->session->set_userdata('sess_tahun_ajaran', $data['tahun_ajaran']);
			$this->session->set_userdata('sess_fakultas', $data['fakultas']);
		} else {

			$data['status_trx'] = $this->session->userdata('sess_status_trx');
		  $data['tahun_ajaran'] = $this->session->userdata('sess_tahun_ajaran');
		  $data['fakultas'] = $this->session->userdata('sess_fakultas');

			echo $data['status_trx'];
			echo $data['tahun_ajaran'];
			echo $data['fakultas'];
		}

		if (isset($_POST['reset'])) {
			// unset session
			$this->session->unset_userdata('sess_status_trx');
		 	$this->session->unset_userdata('sess_tahun_ajaran');
		 	$this->session->unset_userdata('sess_fakultas');

			// destroy session
			session_destroy();

			redirect('registrasi');
		}

		// Pagination limit
		$config['base_url'] = base_url().'registrasi/index';
		$config['total_rows'] = $this->Registrasi_model->total_record($data['status_trx'], $data['tahun_ajaran'], $data['fakultas']);
		$config['full_tag_open'] = "<p><div class=\"pagination\" style='letter-spacing:2px;'>";
		$config['full_tag_close'] = "</div>";
		$config['cur_tag_open'] = "<span class=\"current\">";
		$config['cur_tag_open'] = "</span>";
		$config['num_tag_open'] = "<span class=\"disabled\">";
		$config['num_tag_close'] = "</span>";
		$config['per_page'] = 25;
		$config['uri_segment'] = 3;
		$this->pagination->initialize($config);

		$start = $this->uri->segment(3, 0);
		$rows = $this->Registrasi_model->get_all($config['per_page'], $start, $data['status_trx'], $data['tahun_ajaran'], $data['fakultas'])->result();

		$data = array('list_bayar' => $rows,
									'pagination' => $this->pagination->create_links(),
									'start' => $start,
									'total_rows' => $config['total_rows'],
									'filter_status_trx' => $this->Registrasi_model->filter_status_trx(),
									'filter_tahun_ajaran' => $this->Registrasi_model->filter_tahun_ajaran(),
									'filter_fakultas' => $this->Registrasi_model->filter_fakultas(),
		);
		$this->load->view('registrasi/list', $data);

	}
}
