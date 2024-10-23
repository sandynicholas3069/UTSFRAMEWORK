<?php
class Penjualan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->model('Barang_model');
    }

    // Menampilkan semua data penjualan
    public function index() {
        $data['penjualan'] = $this->Penjualan_model->get_all_penjualan();
        $this->load->view('penjualan_view', $data);
    }

    // Menampilkan form untuk input penjualan baru
    public function create() {
        $data['barang'] = $this->Barang_model->get_all_barang();
        $this->load->view('penjualan_form', $data);
    }

    // Menyimpan data penjualan baru dan mengurangi stok barang
    public function store() {
        $id_barang = $this->input->post('id_barang');
        $quantity = (int) $this->input->post('quantity');

        // Validasi stok barang sebelum transaksi
        if (!$this->Barang_model->is_stock_available($id_barang, $quantity)) {
            // Jika stok tidak cukup, kembalikan ke form dengan pesan
            $this->session->set_flashdata('error', 'Stok barang tidak mencukupi.');
            redirect('penjualan/create');
        }

        // Data penjualan
        $data = [
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'id_barang' => $id_barang,
            'quantity' => $quantity,
            'tanggal_waktu' => date('Y-m-d H:i:s'),
            'total_harga' => $this->input->post('total_harga')
        ];

        $this->Penjualan_model->insert_penjualan($data);

        // Kurangi stok barang
        $this->Barang_model->update_stock($id_barang, -$quantity);

        redirect('penjualan');
    }

    // Menampilkan form edit penjualan
    public function edit($id) {
        $data['penjualan'] = $this->Penjualan_model->get_penjualan($id);
        $data['barang'] = $this->Barang_model->get_all_barang();
        $this->load->view('penjualan_edit_form', $data);
    }

    // Memperbarui data penjualan dan mengatur stok barang
    public function update($id) {
        $penjualan = $this->Penjualan_model->get_penjualan($id);
        $id_barang = $this->input->post('id_barang');
        $new_quantity = (int) $this->input->post('quantity');

        // Hitung perbedaan quantity untuk update stok
        $quantity_diff = $new_quantity - $penjualan->quantity;

        // Validasi stok untuk perubahan
        if (!$this->Barang_model->is_stock_available($id_barang, $quantity_diff)) {
            $this->session->set_flashdata('error', 'Stok barang tidak mencukupi untuk perubahan ini.');
            redirect('penjualan/edit/' . $id);
        }

        // Data penjualan yang diperbarui
        $data = [
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'id_barang' => $id_barang,
            'quantity' => $new_quantity,
            'total_harga' => $this->input->post('total_harga')
        ];

        $this->Penjualan_model->update_penjualan($id, $data);

        // Perbarui stok barang
        $this->Barang_model->update_stock($id_barang, -$quantity_diff);

        redirect('penjualan');
    }

    // Menghapus penjualan dan mengembalikan stok
    public function delete($id) {
        $penjualan = $this->Penjualan_model->get_penjualan($id);

        // Kembalikan stok barang sesuai quantity yang terjual
        $this->Barang_model->update_stock($penjualan->id_barang, $penjualan->quantity);

        // Hapus data penjualan
        $this->Penjualan_model->delete_penjualan($id);

        redirect('penjualan');
    }
}
