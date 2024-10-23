<?php
class Kategori_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Mendapatkan seluruh data kategori dari dalam database
    public function get_all_kategori() {
        return $this->db->get('kategori_barang')->result();
    }

    // Menginputkan data kategori baru ke dalam database
    public function insert_kategori($data) {
        return $this->db->insert('kategori_barang', $data);
    }

    // Mendapatkan data kategori secara spesifik berdasarkan ID kategori
    public function get_kategori($id) {
        return $this->db->get_where('kategori_barang', array('id_kategori' => $id))->row();
    }

    // Memperbarui data kategori berdasarkan ID kategori
    public function update_kategori($id, $data) {
        $this->db->where('id_kategori', $id);
        return $this->db->update('kategori_barang', $data);
    }

    // Menghapus data kategori berdasarkan ID kategori
    public function delete_kategori($id) {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori_barang');
    }
}
