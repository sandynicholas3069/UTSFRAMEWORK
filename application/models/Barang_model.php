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
        $this->db->select('barang.*, kategori_barang.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'barang.id_kategori = kategori_barang.id_kategori');
        $this->db->where('barang.id_barang', $id);
        return $this->db->get()->row(); // Ambil satu baris data
    }

    public function update_barang($id) {
        $data = [
            'sku' => $this->input->post('sku'),
            'nama_barang' => $this->input->post('nama_barang'),
            'id_kategori' => $this->input->post('id_kategori'), // Pastikan ini valid
            'harga' => $this->input->post('harga'),
            'jumlah_stok' => $this->input->post('jumlah_stok')
        ];

        // Pastikan id_kategori valid sebelum update
        if ($this->Kategori_model->get_kategori($data['id_kategori'])) {
            $this->Barang_model->update_barang($id, $data);
            redirect('barang');
        } else {
            // Tangani error: id_kategori tidak valid
            // Misalnya: set flashdata dan redirect
            $this->session->set_flashdata('error', 'ID Kategori tidak valid.');
            redirect('barang/edit/' . $id);
        }
    }

    public function delete_barang($id) {
        $this->db->where('id_barang', $id);
        return $this->db->delete('barang');
    }

    public function search_barang($keyword) {
        $this->db->select('barang.*, kategori_barang.nama_kategori');
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'barang.id_kategori = kategori_barang.id_kategori');
        $this->db->group_start(); // Start grouping the conditions
        $this->db->like('sku', $keyword);
        $this->db->or_like('nama_barang', $keyword);
        $this->db->or_like('kategori_barang.nama_kategori', $keyword); // Include category name
        $this->db->group_end(); // End grouping the conditions
        return $this->db->get()->result();
    }

    public function filter_by_price_range($min_price, $max_price) {
        $this->db->select('barang.*, kategori_barang.nama_kategori'); // Pilih kolom barang dan kategori
        $this->db->from('barang');
        $this->db->join('kategori_barang', 'barang.id_kategori = kategori_barang.id_kategori'); // JOIN kategori
        $this->db->where('harga >=', $min_price); // Filter harga minimal
        $this->db->where('harga <=', $max_price); // Filter harga maksimal
        return $this->db->get()->result(); // Ambil hasilnya
    }

    public function is_stock_available($sku) {
        $this->db->where('sku', $sku);
        $this->db->where('jumlah_stok >', 0);
        $query = $this->db->get('barang');
        return $query->num_rows() > 0;
    }

    public function update_stock($id_barang, $quantity) {
        $this->db->set('jumlah_stok', 'jumlah_stok + ' . (int)$quantity, FALSE); // Update jumlah_stok
        $this->db->where('id_barang', $id_barang);
        return $this->db->update('barang');
    }

    public function restore_stock($id_barang, $quantity) {
        $this->db->set('jumlah_stok', 'jumlah_stok + ' . $quantity, FALSE);
        $this->db->where('id_barang', $id_barang);
        return $this->db->update('barang');
    }
}
