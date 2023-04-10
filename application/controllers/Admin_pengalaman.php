<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin_pengalaman extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pengalaman', 'pengalaman');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->auth->restrict();
    }

    public function index()
    {
        // load view admin/overview.php
        $data['title'] = "Pengalaman";
        $data['view_file'] = "admin/moduls/view_pengalaman";
        $data['result'] = $this->pengalaman->pengalaman()->result();
        return $this->load->view("admin/admin_view", $data);
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


    public function add_produk()
    {
        $judul_pengalaman = $this->input->post('judul_pengalaman');
        $deskripsi_pengalaman = $this->input->post('deskripsi_pengalaman');
        $tanggal_pengalaman = $this->input->post('tanggal_pengalaman');
        $kota_pengalaman = $this->input->post('kota_pengalaman');

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
                'foto_pengalaman' => 'foto_pengalaman'
            )
        );

        $dataInsert['judul_pengalaman'] = $judul_pengalaman;
        $dataInsert['deskripsi_pengalaman'] = $deskripsi_pengalaman;
        $dataInsert['tanggal_pengalaman'] = $tanggal_pengalaman;
        $dataInsert['kota_pengalaman'] = $kota_pengalaman;

        foreach ($dataUpload as $key => $value) {
            $dataInsert[$key] = $value;
        }

        if ($this->pengalaman->insert($dataInsert)) {
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

        $getData = $this->pengalaman->pengalaman($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        $upload = new FileUploadLibrary();
        $row = $getData->row();

        $remove = $this->remover(
            $upload,
            array(
                $row->foto_pengalaman
            ),
            'assets/img'
        );

        if ($this->pengalaman->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_produk()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->pengalaman->pengalaman($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/pengalaman/edit', $data, true)
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
        $id = getPost('id_pengalaman');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->pengalaman->pengalaman($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $judul_pengalaman = getPost('judul_pengalaman');
        $deskripsi_pengalaman = getPost('deskripsi_pengalaman');
        $tanggal_pengalaman = getPost('tanggal_pengalaman');
        $kota_pengalaman = getPost('kota_pengalaman');

        $updateData['judul_pengalaman'] = $judul_pengalaman;
        $updateData['deskripsi_pengalaman'] = $deskripsi_pengalaman;
        $updateData['tanggal_pengalaman'] = $tanggal_pengalaman;
        $updateData['kota_pengalaman'] = $kota_pengalaman;

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
                'foto_pengalaman' => 'foto_pengalaman'
            )
        );

        foreach ($dataUpload as $key => $value) {
            $updateData[$key] = $value;
        }

        if ($this->pengalaman->update($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}
