<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_sertifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->auth->restrict();
        $this->load->model('M_sertifikasi');
    }

    public function index()
    {
        // load view admin/overview.php
        $data['title'] = "Sertifikat";
        $data['view_file'] = "admin/moduls/view_sertifikasi";
        $data['result'] = $this->M_sertifikasi->sertifikasi_get_all()->result();
        $this->load->view("admin/admin_view", $data);
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

    public function add_sertifikasi()
    {
        $nama_sertifikasi = $this->input->post('nama_sertifikasi');
        $tahun_sertifikasi = $this->input->post('tahun_sertifikasi');

        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/file'),
            'allowed_types' => 'pdf|xls',
            'max_size' => 15000000, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();
        $dataUpload = $this->uploader(
            $upload,
            array(
                'file_sertifikat' => 'file_sertifikat'
            )
        );

        $dataInsert['nama_sertifikasi'] = $nama_sertifikasi;
        $dataInsert['tahun_sertifikasi'] = $tahun_sertifikasi;

        foreach ($dataUpload as $key => $value) {
            $dataInsert[$key] = $value;
        }

        if ($this->M_sertifikasi->insert($dataInsert)) {
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

        $getData = $this->M_sertifikasi->sertifikasi_get_all($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        $upload = new FileUploadLibrary();
        $row = $getData->row();

        $remove = $this->remover(
            $upload,
            array(
                $row->file_sertifikat
            ),
            'assets/file'
        );

        if (!$remove) {
            return JSONResponseDefault('FAILED', 'Gagal menghapus beberapa gambar');
        }

        if ($this->M_sertifikasi->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_produk()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->M_sertifikasi->sertifikasi_get_all($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/sertifikasi/edit', $data, true)
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

        $this->remover($upload, $deletedData, 'assets/file');

        return $this->uploader($upload, $data);
    }

    public function edit_produk()
    {
        $id = getPost('id_sertifikasi');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->M_sertifikasi->sertifikasi_get_all($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $nama_sertifikasi = getPost('nama_sertifikasi');
        $tahun_sertifikasi = getPost('tahun_sertifikasi');

        $updateData['nama_sertifikasi'] = $nama_sertifikasi;
        $updateData['tahun_sertifikasi'] = $tahun_sertifikasi;

        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/file'),
            'allowed_types' => 'pdf|xls',
            'max_size' => 15000000, //2 MB
            'encrypt_name' => true
        ));

        $upload->initialize();

        $dataUpload = $this->edit_img_remover(
            $upload,
            $getData->row(),
            array(
                'file_sertifikat' => 'file_sertifikat'
            )
        );

        foreach ($dataUpload as $key => $value) {
            $updateData[$key] = $value;
        }

        if ($this->M_sertifikasi->update($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}
