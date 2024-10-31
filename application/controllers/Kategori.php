<?php
class Kategori extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kategori_model');
    }

    // Menampilkan semua kategori
    public function index() {
        $data['kategori'] = $this->Kategori_model->get_all_kategori();
        $this->load->view('kategori_view', $data);
    }

    // Menampilkan form untuk menambah kategori baru
    public function create() {
        $this->load->view('kategori_form');
    }

    // Menyimpan kategori baru ke database
    public function store() {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];
        // Validasi input
        if (empty($data['nama_kategori'])) {
            $this->session->set_flashdata('error', 'Nama kategori tidak boleh kosong.');
            redirect('add_categories');
        }

        $this->Kategori_model->insert_kategori($data);
        redirect('categories');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id) {
        $data['kategori'] = $this->Kategori_model->get_kategori($id);
        // Cek apakah kategori ditemukan
        if (!$data['kategori']) {
            show_404(); // Tampilkan halaman 404 jika tidak ditemukan
        }
        $this->load->view('kategori_edit_form', $data);
    }

    // Memperbarui data kategori
    public function update($id) {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        // Validasi input
        if (empty($data['nama_kategori'])) {
            // Jika nama kategori kosong, tampilkan error
            $this->session->set_flashdata('error', 'Nama kategori tidak boleh kosong.');
            redirect('edit_categories/' . $id); // Kembali ke form edit
        }

        // Cek apakah kategori yang dipilih untuk diubah ada
        $kategori = $this->Kategori_model->get_kategori($id);
        if (!$kategori) {
            // Jika kategori tidak ditemukan, tampilkan error
            $this->session->set_flashdata('error', 'Data kategori yang dipilih untuk diubah tidak ditemukan.');
            redirect('categories');
        }

        // Lakukan update
        $this->Kategori_model->update_kategori($id, $data);
        $this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
        redirect('categories');
    }

    // Menghapus kategori
    public function delete($id) {
        $this->Kategori_model->delete_kategori($id);
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
        redirect('categories');
    }
}
