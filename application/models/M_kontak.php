<?php

class M_kontak extends CI_Model
{
    private $table = 'alamat';

    public function kontak_get_all($id = '')
    {
        $this->db->select('*')
            ->from($this->table);

        if ($id) {
            $this->db->where('id_kontak', $id);
        }

        return $this->db->get();
    }

    public function biodata()
    {
        return $this->db->get('biodata');
    }


    public function insert($data = array())
    {
        return $this->db->insert($this->table, $data);
    }


    public function delete($id)
    {
        $this->db->where('id_kontak', $id);
        return $this->db->delete($this->table);
    }


    public function update($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_kontak', $id);
        return $this->db->update($this->table);
    }
}
