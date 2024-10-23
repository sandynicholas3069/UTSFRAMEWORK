<?php
class Penjualan_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    // // Mendapatkan seluruh data penjualan dari dalam database
    public function get_all_penjualan() {
        return $this->db->get('penjualan')->result();
    }

    // Menginputkan data penjualan baru ke dalam database
    public function insert_penjualan($data) {
        return $this->db->insert('penjualan', $data);
    }

    // // Mendapatkan data penjualan secara spesifik berdasarkan ID penjualan
    public function get_penjualan($id) {
        return $this->db->get_where('penjualan', array('id_penjualan' => $id))->row();
    }

    // Memperbarui data penjualan berdasarkan ID penjualan
    public function update_penjualan($id, $data) {
        $this->db->where('id_penjualan', $id);
        return $this->db->update('penjualan', $data);
    }

    // Menghapus data penjualan berdasarkan ID penjualan
    public function delete_penjualan($id) {
        $this->db->where('id_penjualan', $id);
        return $this->db->delete('penjualan');
    }

    // Melakukan pembaruan data stock setelah melakukan transaksi penjualan
    public function update_stock($id_barang, $quantity) {
        $this->Barang_model->update_stock($id_barang, $quantity);
    }

    // Mengembalikan jumlah data stock setelah pembatalan atau pembaruan data transaksi penjualan
    public function restore_stock($id_barang, $quantity) {
        $this->Barang_model->restore_stock($id_barang, $quantity);
    }
}
