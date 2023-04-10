<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frontend_c extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Frontend_m');
	}

	public function index()
	{
		$data['beranda'] = $this->Frontend_m->beranda()->row();
		$data['biodata'] = $this->Frontend_m->biodata()->row();
		$data['keahlian'] = $this->Frontend_m->keahlian()->result_array();
		$data['pengalaman'] = $this->Frontend_m->pengalaman()->result_array();
		$data['pekerjaan'] = $this->Frontend_m->pekerjaan()->result_array();
		$data['artikel'] = $this->Frontend_m->artikel()->result_array();
		// print_r($this->db->last_query());
		$this->load->view('frontend', $data);
	}

	public function detail_artikel($id)
{
		$data['beranda'] = $this->Frontend_m->beranda()->row();
		$data['artikel'] = $this->Frontend_m->artikel()->result_array();
		$data['detail_artikel'] = $this->db->get_where('artikel', ['id_artikel' => $id])->row_array();
		$data['detail_artikel']= $this->Frontend_m->detail($id);

		$this->db->set('total_dilihat', 'total_dilihat+1', false);
		$this->db->where('id_artikel', $id);
		$this->db->update('artikel');

		$this->load->view('detail_artikel', $data);
	}
}
