<?php
defined('BASEPATH') or die('No direct script access allowed!');

class M_pengalaman extends CI_Model
{
    private $table = 'pengalaman_mengajar';

    public function pengalaman($id = '')
    {
        $this->db->select('*')
            ->from($this->table);

        if ($id) {
            $this->db->where('id_pengalaman', $id);
        }

        return $this->db->get();
    }

    public function insert($data = array())
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_pengalaman', $id);
        return $this->db->delete($this->table);
    }

    public function update($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_pengalaman', $id);
        return $this->db->update($this->table);
    }
}
