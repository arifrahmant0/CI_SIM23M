<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{
    public function get_all_kategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function insert_kategori($data)
    {
        return $this->db->insert('kategori', $data);
    }

    public function delete_kategori($id)
    {
        return $this->db->delete('kategori', ['id' => $id]); // Ganti $idkategori menjadi $id
    }

    public function get_kategori_by_id($id)
    {
        return $this->db->get_where('kategori', ['id' => $id])->row_array(); // Ganti $idkategori menjadi $id
    }

    public function update_kategori($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('kategori', $data);
    }
}
