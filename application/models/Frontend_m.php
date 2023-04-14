<?php

class Frontend_m extends CI_Model
{
	public function beranda()
	{
		return $this->db->get('beranda');
	}

	public function biodata()
	{
		return $this->db->get('biodata');
	}

	public function keahlian()
	{
		return $this->db->get('keahlian');
	}
	public function pengalaman()
	{
		return $this->db->get('pengalaman_mengajar');
	}
	public function pekerjaan()
	{
		return $this->db->get('pekerjaan');
	}

	public function kontak()
	{
		return $this->db->get('alamat');
	}

	public function artikel()
	{
		return $this->db->query('SELECT * FROM `artikel` ,kategori_artikel WHERE artikel.id_kategori = kategori_artikel.id_kategori');
		// $this->db->SELECT('*');
		// $this->db->from('artikel');
		// $this->db->join('kategori_artikel','artikel.id_kategori=kategori_artikel.id_kategori');
		// return $this->db->get()->result();
		// SELECT * FROM `artikel` ,kategori_artikel WHERE artikel.id_kategori = kategori_artikel.id_kategori
	}

	public function detail_artikel()
	{

		return $this->db->query('SELECT * FROM artikel ,kategori_artikel WHERE artikel.id_kategori = kategori_artikel.id_kategori');
	}

	public function detail($id)
	{
		$this->db->select('*');
		$this->db->from('artikel');
		$this->db->join('kategori_artikel', 'kategori_artikel.id_kategori = kategori_artikel.id_kategori', 'left outer');
		$this->db->where('id_artikel', $id);
		return $this->db->get()->row_array();
	}
}
