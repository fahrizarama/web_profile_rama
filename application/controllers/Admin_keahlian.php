<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_keahlian extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_keahlian', 'keahlian');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->auth->restrict();
    }

    public function index()
    {
        // load view admin/overview.php
        $data['title'] = "Keahlian";
        $data['view_file'] = "admin/moduls/view_keahlian";
        $data['result'] = $this->keahlian->keahlian()->result();
        return $this->load->view("admin/admin_view", $data);
    }

    public function add_produk()
    {
        $nama_keahlian = $this->input->post('nama_keahlian');
        $deskripsi_keahlian = $this->input->post('deskripsi_keahlian');
        $presentase = $this->input->post('presentase');
        $dataInsert['nama_keahlian'] = $nama_keahlian;
        $dataInsert['deskripsi_keahlian'] = $deskripsi_keahlian;
        $dataInsert['presentase'] = $presentase;

        if ($this->keahlian->insert($dataInsert)) {
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

        $getData = $this->keahlian->keahlian($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }


        if ($this->keahlian->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_produk()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->keahlian->keahlian($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/keahlian/edit', $data, true)
        ));
    }

    public function edit_produk()
    {
        $id = getPost('id_keahlian');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->keahlian->keahlian($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $nama_keahlian = getPost('nama_keahlian');
        $deskripsi_keahlian = getPost('deskripsi_keahlian');
        $presentase = getPost('presentase');

        $updateData['nama_keahlian'] = $nama_keahlian;
        $updateData['deskripsi_keahlian'] = $deskripsi_keahlian;
        $updateData['presentase'] = $presentase;


        if ($this->keahlian->update($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}
