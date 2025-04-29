<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('berita_model');
        $this->load->library('form_validation'); // Load form validation library
    }

    public function index() {
        $data['berita'] = $this->berita_model->get_all_berita();
        $this->load->view('templates/header');
        $this->load->view('berita/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $this->load->view('templates/header');
        $this->load->view('berita/form_berita');
        $this->load->view('templates/footer');
    }

    public function insert() {
        $judul = $this->input->post('judul');
        $kategori = $this->input->post('kategori');
        $headline = $this->input->post('headline');
        $isi = $this->input->post('isi_berita');
        $pengirim = $this->input->post('pengirim');

        $data = array(
            'judul' => $judul,
            'kategori' => $kategori,
            'headline' => $headline,
            'isi_berita' => $isi,
            'pengirim' => $pengirim,
        );

        $result = $this->berita_model->insert_berita($data);
        if ($result) {
            $this->session->set_flashdata('success', 'Berita berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Berita gagal disimpan');
        }
        redirect('berita');
    }

    public function edit($idberita) {
        $data['berita'] = $this->berita_model->get_berita_by_id($idberita);
        $this->load->view('templates/header');
        $this->load->view('berita/edit_berita', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('headline', 'Headline', 'required');
        $this->form_validation->set_rules('isi_berita', 'isi_berita', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->edit($id); // Show the edit form again if validation fails
        } else {
            $data = array(
                'judul' => $this->input->post('judul'),
                'kategori' => $this->input->post('kategori'),
                'headline' => $this->input->post('headline'),
                'isi_berita' => $this->input->post('isi_berita'),
                'pengirim' => $this->input->post('pengirim')
            );
            $this->berita_model->update_berita($id, $data);
            redirect('berita');
        }
    }

    public function hapus($idberita) {
        $this->berita_model->delete_berita($idberita);
        redirect('berita');
    }
}