<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_kontak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->auth->restrict();
        $this->load->model('M_kontak');
    }

    public function index()
    {
        // load view admin/overview.php
        $data['title'] = "Kontak";
        $data['view_file'] = "admin/moduls/view_kontak";
        $data['result'] = $this->M_kontak->kontak_get_all()->result();
        $data['biodata'] = $this->M_kontak->biodata()->row();
        $this->load->view("admin/admin_view", $data);
    }


    public function add_kontak()
    {
        $deskripsi_kontak = $this->input->post('deskripsi_kontak');
        $script_embed_code = $this->input->post('script_embed_code');

        $dataInsert['deskripsi_kontak'] = $deskripsi_kontak;
        $dataInsert['script_embed_code'] = $script_embed_code;

        if ($this->M_kontak->insert($dataInsert)) {
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

        $getData = $this->M_kontak->kontak_get_all($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }


        if ($this->M_kontak->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_produk()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->M_kontak->kontak_get_all($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/kontak/edit', $data, true)
        ));
    }

    public function edit_produk()
    {
        $id = getPost('id_kontak');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->M_kontak->kontak_get_all($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $deskripsi_kontak = getPost('deskripsi_kontak');
        $script_embed_code = getPost('script_embed_code');


        $updateData['deskripsi_kontak'] = $deskripsi_kontak;
        $updateData['script_embed_code'] = $script_embed_code;

        if ($this->M_kontak->update($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}
