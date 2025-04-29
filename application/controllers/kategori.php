<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model'); // Ganti model berita dengan model kategori
        $this->load->library('form_validation'); // Load form validation library
    }

    public function index()
    {
        $data['kategori'] = $this->kategori_model->get_all_kategori(); // Ambil semua kategori
        $this->load->view('templates/header');
        $this->load->view('kategori/index', $data); // Ganti tampilan berita dengan tampilan kategori
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('kategori/form_kategori'); // Ganti tampilan form berita dengan form kategori
        $this->load->view('templates/footer');
    }

    public function insert()
    {
        $nama_kategori = $this->input->post('nama_kategori');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'nama_kategori' => $nama_kategori,
            'deskripsi' => $deskripsi,
        );

        $result = $this->kategori_model->insert_kategori($data); // Panggil model untuk menyimpan kategori
        if ($result) {
            $this->session->set_flashdata('success', 'Kategori berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Kategori gagal disimpan');
        }
        redirect('kategori');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->kategori_model->get_kategori_by_id($id); // Ambil kategori berdasarkan ID
        $this->load->view('templates/header');
        $this->load->view('kategori/edit_kategori', $data); // Ganti tampilan edit berita dengan edit kategori
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->edit($id); // Tampilkan form edit lagi jika validasi gagal
        } else {
            $data = array(
                'nama_kategori' => $this->input->post('nama_kategori'),
                'deskripsi' => $this->input->post('deskripsi')
            );
            $this->kategori_model->update_kategori($id, $data); // Panggil model untuk memperbarui kategori
            redirect('kategori');
        }
    }

    public function hapus($id)
    {
        // Panggil model untuk menghapus kategori
        $this->kategori_model->delete_kategori($id);

        // Set flashdata untuk pesan sukses
        $this->session->set_flashdata('success', 'Kategori berhasil dihapus');

        // Redirect kembali ke halaman kategori
        redirect('kategori');
    }
}
