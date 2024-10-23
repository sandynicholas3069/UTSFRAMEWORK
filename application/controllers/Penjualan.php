<?php
class Penjualan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Penjualan_model');
        $this->load->model('Barang_model'); // Untuk update stok
    }

    public function index() {
        $data['penjualan'] = $this->Penjualan_model->get_all_penjualan();
        $this->load->view('penjualan_view', $data);
    }

    public function create() {
        $this->load->view('penjualan_form');
    }

    public function store() {
        $id_barang = $this->input->post('id_barang');
        $quantity = $this->input->post('quantity');

        // Insert penjualan
        $data = [
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'id_barang' => $id_barang,
            'tanggal_waktu' => date('Y-m-d H:i:s'),
            'total_harga' => $this->input->post('total_harga')
        ];
        $this->Penjualan_model->insert_penjualan($data);

        // Update stok barang
        $this->Barang_model->update_stock($id_barang, $quantity);

        redirect('penjualan');
    }

    public function edit($id) {
        $data['penjualan'] = $this->Penjualan_model->get_penjualan($id);
        $this->load->view('penjualan_edit_form', $data);
    }

    public function update($id) {
        $id_barang = $this->input->post('id_barang');
        $quantity = $this->input->post('quantity');
        
        // Update penjualan
        $data = [
            'nama_pembeli' => $this->input->post('nama_pembeli'),
            'id_barang' => $id_barang,
            'total_harga' => $this->input->post('total_harga')
        ];
        $this->Penjualan_model->update_penjualan($id, $data);

        // Update stok barang (asumsi ada perubahan jumlah)
        $this->Barang_model->update_stock($id_barang, $quantity);

        redirect('penjualan');
    }

    public function delete($id) {
        $penjualan = $this->Penjualan_model->get_penjualan($id);

        // Restore stok barang sebelum menghapus penjualan
        $this->Barang_model->restore_stock($penjualan->id_barang, $penjualan->quantity);

        // Delete penjualan
        $this->Penjualan_model->delete_penjualan($id);
        
        redirect('penjualan');
    }
}
