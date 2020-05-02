<?php

class Anggota_m extends CI_Model{
    public function tampil_data()
    {
        return $this->db->get('tbl_anggota');
    }

    public function input_data($data)
    {
    	$this->db->insert('tbl_anggota', $data);
    }

    public function hapus_data($where, $table)
    {
    	$this->db->where($where);
    	$this->db->delete($table);
    }

    public function edit_data($where,$table)
    {
    	return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table)
    {
    	$this->db->where($where);
    	$this->db->update($table,$data);
    }

    public function detail_data($id_anggota = NULL)
    {
    	$query = $this->db->get_where('tbl_anggota', array('id_anggota' => $id_anggota))->row();
    	return $query;
    }

    public function get_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('tbl_anggota');
        $this->db->like('no_induk', $keyword);
        $this->db->or_like('nama', $keyword);
        $this->db->or_like('kelas', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('no_telp', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('tgl_lahir', $keyword);
        return $this->db->get()->result();
    }
}