<?php
class Barang extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
    }

    public function index() {
        // Ambil filter harga atau pencarian keyword dari session atau query string
        $min_price = $this->input->get('min_price');
        $max_price = $this->input->get('max_price');
        $keyword = $this->input->get('keyword');

        if ($min_price !== null && $max_price !== null) {
            // Jika ada filter harga, ambil data berdasarkan range harga
            $data['barang'] = $this->Barang_model->filter_by_price_range($min_price, $max_price);
        } elseif ($keyword) {
            // Jika ada keyword, cari data barang berdasarkan keyword
            $data['barang'] = $this->Barang_model->search_barang($keyword);
        } else {
            // Tampilkan semua barang jika tidak ada filter atau search
            $data['barang'] = $this->Barang_model->get_all_barang();
        }

        $this->load->view('barang_view', $data);
    }

    public function create() {
        $data['kategori'] = $this->Kategori_model->get_all_kategori();
        $this->load->view('barang_form', $data);
    }

    public function store() {
        $data = [
            'sku' => $this->input->post('sku'),
            'nama_barang' => $this->input->post('nama_barang'),
            'id_kategori' => $this->input->post('id_kategori'),
            'harga' => $this->input->post('harga'),
            'jumlah_stok' => $this->input->post('jumlah_stok')
        ];
        $this->Barang_model->insert_barang($data);
        redirect('barang');
    }

    public function edit($id) {
        $data['barang'] = $this->Barang_model->get_barang($id);
        $data['kategori'] = $this->Kategori_model->get_all_kategori();
        $this->load->view('barang_edit_form', $data);
    }

    public function update($id) {
        $data = [
            'sku' => $this->input->post('sku'),
            'nama_barang' => $this->input->post('nama_barang'),
            'id_kategori' => $this->input->post('id_kategori'),
            'harga' => $this->input->post('harga'),
            'jumlah_stok' => $this->input->post('jumlah_stok')
        ];
        $this->Barang_model->update_barang($id, $data);
        redirect('barang');

        if ($this->Kategori_model->get_kategori($data['id_kategori'])) {
            if ($this->Barang_model->update_barang($id, $data)) {
                redirect('barang');
            } else {
                $this->session->set_flashdata('error', 'Gagal memperbarui barang.');
                redirect('barang/edit/' . $id);
            }
        } else {
            $this->session->set_flashdata('error', 'ID Kategori tidak valid.');
            redirect('barang/edit/' . $id);
        }
    }

    public function delete($id) {
        $this->Barang_model->delete_barang($id);
        redirect('barang');
    }

    public function search() {
        $keyword = $this->input->post('keyword');

        if ($keyword) {
            // Redirect ke index dengan query string untuk pencarian
            redirect("barang/index?keyword=" . urlencode($keyword));
        } else {
            redirect('barang');
        }
    }

    public function filter() {
        // Ambil input min dan max price dari form
        $min_price = $this->input->post('min_price');
        $max_price = $this->input->post('max_price');

        if ($min_price !== null && $max_price !== null) {
            // Redirect ke index dengan query string untuk filter harga
            redirect("barang/index?min_price=$min_price&max_price=$max_price");
        } else {
            // Jika input tidak valid, kembali ke halaman index
            redirect('barang');
        }
    }
}
