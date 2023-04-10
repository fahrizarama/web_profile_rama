<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('M_beranda');
		$this->auth->restrict();
	}

	public function index()
	{
		// load view admin/overview.php
		$data['title'] = "Home";
		$data['view_file'] = "admin/moduls/view_home";
		$data['result'] = $this->M_beranda->beranda_get_all()->result();
		$this->load->view('admin/admin_view', $data);
	}

	private function uploader($upload, $index = array())
	{
		$data = array();

		foreach ($index as $key => $value) {
			if (isset($_FILES[$value]['size']) > 0) {
				if ($upload->upload($value)) {
					$file_name = $upload->get_file_name();

					$data[$key] = $file_name;
				} else {
					return false;
				}
			} else {
				$data[$key] = null;
			}
		}

		return $data;
	}

	public function remover($upload, $index = array(), $location)
	{
		foreach ($index as $key => $value) {
			if (!$upload->remove($value, $location)) {
				return false;
			}
		}

		return true;
	}

	public function add_beranda()
	{
		$judul_menu = $this->input->post('judul_menu');
		$judul_beranda = $this->input->post('judul_beranda');
		$deskripsi_beranda = $this->input->post('deskripsi_beranda');

		$upload = new FileUploadLibrary();
		$upload->setConfig(array(
			'upload_path' => realpath('assets/img'),
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => 2048, //2 MB
			'encrypt_name' => true
		));
		$upload->initialize();

		$dataUpload = $this->uploader(
			$upload,
			array(
				'foto_beranda' => 'foto_beranda'
			)
		);

		$dataInsert['judul_menu'] = $judul_menu;
		$dataInsert['judul_beranda'] = $judul_beranda;
		$dataInsert['deskripsi_beranda'] = $deskripsi_beranda;

		foreach ($dataUpload as $key => $value) {
			$dataInsert[$key] = $value;
		}

		if ($this->M_beranda->insert($dataInsert)) {
			echo json_encode(array(
				'RESULT' => 'OK',
				'MESSAGE' => 'Data berhasil ditambahkan'
			));
			exit;
		} else {
			echo json_encode(array(
				'RESULT' => 'FAILED',
				'MESSAGE' => 'Gagal menambahkan data'
			));
			exit;
		}
	}

	public function hapus_produk()
	{
		$id = getPost('id', null);

		if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

		$getData = $this->M_beranda->beranda_get_all($id);

		if ($getData->num_rows() == 0) {
			return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
		}

		$upload = new FileUploadLibrary();
		$row = $getData->row();

		$remove = $this->remover(
			$upload,
			array(
				$row->foto_beranda
			),
			'assets/img'
		);

		if (!$remove) {
			return JSONResponseDefault('FAILED', 'Gagal menghapus beberapa gambar');
		}

		if ($this->M_beranda->delete($id)) {
			return JSONResponseDefault('OK', 'Data berhasil dihapus');
		} else {
			return JSONResponseDefault('FAILED', 'Gagal menghapus data');
		}
	}

	public function modal_edit_produk()
	{
		$id = getPost('id');

		if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

		$getData = $this->M_beranda->beranda_get_all($id);

		if ($getData->num_rows() == 0) {
			return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
		}

		$data['data'] = $getData->row();

		return JSONResponse(array(
			'RESULT' => 'OK',
			'HTML' => $this->load->view('admin/moduls/beranda/edit', $data, true)
		));
	}

	private function edit_img_remover($upload, $row, $index = array())
	{
		$data = array();
		$deletedData = array();

		foreach ($index as $key => $value) {
			if ($_FILES[$value]['size'] > 0) {
				$data[$key] = $value;
				$deletedData[] = $row->$key;
			}
		}

		$this->remover($upload, $deletedData, 'assets/img');

		return $this->uploader($upload, $data);
	}

	public function edit_produk()
	{
		$id = getPost('id_beranda');

		if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

		$getData = $this->M_beranda->beranda_get_all($id);

		if ($getData->num_rows() == 0) {
			return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
		}

		$judul_menu = getPost('judul_menu');
		$judul_beranda = getPost('judul_beranda');
		$deskripsi_beranda = getPost('deskripsi_beranda');

		$updateData['judul_menu'] = $judul_menu;
		$updateData['judul_beranda'] = $judul_beranda;
		$updateData['deskripsi_beranda'] = $deskripsi_beranda;

		$upload = new FileUploadLibrary();
		$upload->setConfig(array(
			'upload_path' => realpath('assets/img'),
			'allowed_types' => 'jpg|png|jpeg',
			'max_size' => 2048, //2 MB
			'encrypt_name' => true
		));
		$upload->initialize();

		$dataUpload = $this->edit_img_remover(
			$upload,
			$getData->row(),
			array(
				'foto_beranda' => 'foto_beranda'
			)
		);

		foreach ($dataUpload as $key => $value) {
			$updateData[$key] = $value;
		}

		if ($this->M_beranda->update($id, $updateData)) {
			return JSONResponseDefault('OK', 'Data berhasil diubah');
		} else {
			return JSONResponseDefault('FAILED', 'Gagal mengubah data');
		}
	}
}
