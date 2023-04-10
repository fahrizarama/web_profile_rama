<?php
defined('BASEPATH') or die('No direct script access allowed!');

class Model_app extends CI_model
{
    public $table = 'berita';

    public function view($table)
    {
        return $this->db->get($table);
    }

    public function insert($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function edit($table, $data)
    {
        return $this->db->get_where($table, $data);
    }

    public function update($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function delete($table, $where)
    {
        return $this->db->delete($table, $where);
    }

    // ---------------------------------------------------percobaan 2
    public function count_total_rating($where)
    {
        $this->db->select('AVG(rating) as average');
        $this->db->where('id_berita', $where);
        $this->db->from('berita');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_rating_data($blogid)
    {
        $this->db->select('*');
        $this->db->where('id_berita', $blogid);
        // $this->db->join('rating r', 'r.user_id = u.user_id');
        $this->db->from('berita');
        $query = $this->db->get();
        return $query->result();
    }
}
