<?php
class Barang_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // Mendapatkan seluruh data barang dari dalam database
    public function get_all_barang() {
        return $this->db->get('barang')->result();
    }

    public function get_kategori_by_id($id_kategori) {
        $this->load->model('Kategori_model'); // Pastikan model Kategori_model diload
        $kategori = $this->Kategori_model->get_kategori($id_kategori);
        return $kategori ? $kategori->nama_kategori : null; // Kembalikan nama kategori atau null jika tidak ada
    }

    // Menginputkan data barang baru ke dalam database
    public function insert_barang($data) {
        return $this->db->insert('barang', $data);
    }

    // Mendapatkan data barang secara spesifik berdasarkan ID barang
    public function get_barang($id) {
        return $this->db->get_where('barang', array('id_barang' => $id))->row();
    }

    // Memperbarui data barang berdasarkan ID barang
    public function update_barang($id, $data) {
        $this->db->where('id_barang', $id);
        return $this->db->update('barang', $data);
    }

    // Menghapus data barang berdasarkan ID barang
    public function delete_barang($id) {
        $this->db->where('id_barang', $id);
        return $this->db->delete('barang');
    }

    // Melakukan pencarian data barang berdasarkan SKU, nama, atau kategori
    public function search_barang($keyword) {
        $this->db->like('sku', $keyword);
        $this->db->or_like('nama_barang', $keyword);
        $this->db->or_like('id_kategori', $keyword);
        return $this->db->get('barang')->result();
    }

    // Filter data barang berdasarkan rentang harga
    public function filter_by_price_range($min_price, $max_price) {
        $this->db->where('harga >=', $min_price);
        $this->db->where('harga <=', $max_price);
        return $this->db->get('barang')->result();
    }

    // Melakukan pembaruan data stock setelah melakukan transaksi penjualan atau penambahan stok
    public function update_stock($id_barang, $quantity) {
        $this->db->set('jumlah_stok', 'jumlah_stok - ' . $quantity, FALSE);
        $this->db->where('id_barang', $id_barang);
        return $this->db->update('barang');
    }

    // Mengembalikan jumlah data stock setelah pembatalan transaksi penjualan
    public function restore_stock($id_barang, $quantity) {
        $this->db->set('jumlah_stok', 'jumlah_stok + ' . $quantity, FALSE);
        $this->db->where('id_barang', $id_barang);
        return $this->db->update('barang');
    }
}
