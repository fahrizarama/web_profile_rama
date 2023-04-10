<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Berita extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_app');
	}

	public function index()
	{
		$data['record'] = $this->Model_app->view('berita');
		$this->load->view('view_berita', $data);
	}

	function tambah_rating()
	{
		if ($this->input->post('rating') != '') {
			$data = array('rating' => $this->input->post('rating'));
			$where = array('id_berita' => $this->input->post('id'));
			$this->model_app->update('berita', $data, $where);
		}
	}


	// -----------------------------------------------------------percobaan 2

	public function user()
	{
		$blogid = 1; //this is static id of blog but you are not enter static id you enter your dynami c id of blog or post
		$data['get_avg_rating'] = $this->Model_app->count_total_rating($blogid);
		$data['rating_data'] = $this->Model_app->get_rating_data($blogid);
		$this->load->view('user', $data);
	}
}
