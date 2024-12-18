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
        // Ambil data dari POST
        $data = [
            'id_barang' => $this->input->post('id_barang'), // Mengambil id_barang dari form
            'jumlah_barang' => $this->input->post('jumlah_barang'), // Mengambil jumlah barang dari form
            'jumlah_harga' => $this->input->post('jumlah_harga'), // Mengambil total harga dari form
            'tanggal_pembelian' => $this->input->post('tanggal_pembelian'), // Mengambil tanggal pembelian dari form
            'waktu_pembelian' => $this->input->post('waktu_pembelian'), // Mengambil waktu pembelian dari form
            'nama_pembeli' => $this->input->post('nama_pembeli') // Mengambil nama pembeli dari form
        ];

        // Simpan data ke database menggunakan model
        $this->Penjualan_model->insert_penjualan($data);

        // Kurangi stok barang
        $id_barang = $this->input->post('id_barang');
        $quantity = $this->input->post('jumlah_barang'); // Mengambil jumlah barang dari form
        $this->Barang_model->update_stock($id_barang, -$quantity); // Kurangi stok sesuai dengan jumlah yang dibeli

        // Redirect ke halaman penjualan setelah berhasil
        redirect('transactions');
    }

    // Menampilkan form edit penjualan
    public function edit($id) {
        $data['penjualan'] = $this->Penjualan_model->get_penjualan($id);
        $data['barang'] = $this->Barang_model->get_all_barang();
        $this->load->view('penjualan_edit_form', $data);
    }

    // Memperbarui data penjualan dan mengatur stok barang
        public function update($id) {
        // Ambil data penjualan berdasarkan ID
        $penjualan = $this->Penjualan_model->get_penjualan($id);

        if (!$penjualan) {
            $this->session->set_flashdata('error', 'Data penjualan tidak ditemukan.');
            redirect('transactions');
        }

        // Ambil data dari form
        $id_barang = $this->input->post('id_barang');
        $new_quantity = (int) $this->input->post('jumlah_barang');

        // Hitung perbedaan quantity untuk update stok
        $quantity_diff = $new_quantity - $penjualan->jumlah_barang;

        // Validasi stok untuk perubahan
        if ($quantity_diff != 0 && !$this->Barang_model->is_stock_available($id_barang, $quantity_diff)) {
            $this->session->set_flashdata('error', 'Stok barang tidak mencukupi untuk perubahan ini.');
            redirect('edit_transactions/' . $id);
        }

        // Data penjualan yang diperbarui
        $data = [
            'id_barang' => $id_barang,
            'jumlah_barang' => $new_quantity,
            'jumlah_harga' => $this->input->post('jumlah_harga'),
            'tanggal_pembelian' => $this->input->post('tanggal_pembelian'),
            'waktu_pembelian' => $this->input->post('waktu_pembelian'),
            'nama_pembeli' => $this->input->post('nama_pembeli')
        ];

        // Update data penjualan
        if ($this->Penjualan_model->update_penjualan($id, $data)) {
            // Perbarui stok barang hanya jika ada perubahan jumlah
            if ($quantity_diff != 0) {
                $this->Barang_model->update_stock($id_barang, -$quantity_diff); // Mengurangi stok sesuai perubahan
            }
            $this->session->set_flashdata('success', 'Data penjualan berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data penjualan.');
        }

        // Redirect ke halaman penjualan
        redirect('transactions');
    }

    // Menghapus penjualan dan mengembalikan stok
    public function delete($id) {
        $penjualan = $this->Penjualan_model->get_penjualan($id);

        // Kembalikan stok barang sesuai quantity yang terjual
        $this->Barang_model->update_stock($penjualan->id_barang, $penjualan->jumlah_barang);

        // Hapus data penjualan
        $this->Penjualan_model->delete_penjualan($id);

        redirect('transactions');
    }
}
