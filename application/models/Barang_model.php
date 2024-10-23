<?php
class Barang_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_all_barang() {
        $this->db->select('barang.*, kategori_barang.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'barang.id_kategori = kategori_barang.id_kategori');
        return $this->db->get()->result();
    }

    public function insert_barang($data) {
        return $this->db->insert('barang', $data);
    }

    public function get_barang($id) {
        return $this->db->get_where('barang', ['id_barang' => $id])->row();
    }

    public function update_barang($id, $data) {
        $this->db->where('id_barang', $id);
        return $this->db->update('barang', $data);
    }

    public function delete_barang($id) {
        $this->db->where('id_barang', $id);
        return $this->db->delete('barang');
    }

    public function search_barang($keyword) {
        $this->db->like('sku', $keyword);
        $this->db->or_like('nama_barang', $keyword);
        $this->db->or_like('id_kategori', $keyword);
        return $this->db->get('barang')->result();
    }

    public function filter_by_price_range($min_price, $max_price) {
        $this->db->where('harga >=', $min_price);
        $this->db->where('harga <=', $max_price);
        return $this->db->get('barang')->result();
    }

    public function update_stock($id_barang, $quantity) {
        $this->db->set('jumlah_stok', 'jumlah_stok - ' . $quantity, FALSE);
        $this->db->where('id_barang', $id_barang);
        return $this->db->update('barang');
    }

    public function restore_stock($id_barang, $quantity) {
        $this->db->set('jumlah_stok', 'jumlah_stok + ' . $quantity, FALSE);
        $this->db->where('id_barang', $id_barang);
        return $this->db->update('barang');
    }
}
