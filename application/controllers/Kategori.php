<?php
class Kategori extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

    public function index() {
        $data['kategori'] = $this->Kategori_model->get_all_kategori();
        $this->load->view('kategori_view', $data);
    }

    public function create() {
        $this->load->view('kategori_form');
    }

    public function store() {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $this->Kategori_model->insert_kategori($data);
        redirect('kategori');
    }

    public function edit($id) {
        $data['kategori'] = $this->Kategori_model->get_kategori($id);
        $this->load->view('kategori_edit_form', $data);
    }

    public function update($id) {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        $this->Kategori_model->update_kategori($id, $data);
        redirect('kategori');
    }

    public function delete($id) {
        $this->Kategori_model->delete_kategori($id);
        redirect('kategori');
    }
}
