<?php
class Penjualan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Mendapatkan seluruh data penjualan dengan join ke tabel barang untuk informasi barang
    public function get_all_penjualan() {
        $this->db->select('penjualan.*, barang.nama_barang');
        $this->db->from('penjualan');
        $this->db->join('barang', 'penjualan.id_barang = barang.id_barang');
        return $this->db->get()->result();
    }

    // Menginputkan data penjualan baru ke dalam database
    public function insert_penjualan($data) {
        return $this->db->insert('penjualan', $data);
    }

    // Mendapatkan data penjualan secara spesifik berdasarkan ID
    public function get_penjualan($id) {
        $this->db->select('penjualan.*, barang.nama_barang');
        $this->db->from('penjualan');
        $this->db->join('barang', 'penjualan.id_barang = barang.id_barang');
        $this->db->where('penjualan.id_penjualan', $id);
        return $this->db->get()->row();
    }

    // Memperbarui data penjualan berdasarkan ID
    public function update_penjualan($id, $data) {
        $this->db->where('id_penjualan', $id);
        return $this->db->update('penjualan', $data);
    }

    // Menghapus data penjualan berdasarkan ID
    public function delete_penjualan($id) {
        $this->db->where('id_penjualan', $id);
        return $this->db->delete('penjualan');
    }
}
