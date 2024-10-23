<?php
class Barang extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Barang_model');
        $this->load->model('Kategori_model');
    }

    public function index() {
        $data['barang'] = $this->Barang_model->get_all_barang();
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
    }

    public function delete($id) {
        $this->Barang_model->delete_barang($id);
        redirect('barang');
    }

    public function search() {
        $keyword = $this->input->post('keyword');
        $data['barang'] = $this->Barang_model->search_barang($keyword);
        $this->load->view('barang_view', $data);
    }

    public function filter() {
        $min_price = $this->input->post('min_price');
        $max_price = $this->input->post('max_price');
        $data['barang'] = $this->Barang_model->filter_by_price_range($min_price, $max_price);
        $this->load->view('barang_view', $data);
    }
}
