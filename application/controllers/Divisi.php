<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Divisi extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/divisi_sidebar');
        $this->load->view('divisi/dashboard');
        $this->load->view('templates/footer');
    }

    public function barang_temp()
    {
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();

        $data['barang_temp'] = $this->temp_model->getBarangTemp();
        $this->load->view('templates/header');
        $this->load->view('templates/divisi_sidebar');
        $this->load->view('divisi/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function fungsi_delete_temp($id)
    {
        $this->barang_model->hapus_temp($id);
        Redirect(Base_url('divisi/pengajuan'));
    }

    public function fungsi_delete_temp2($id)
    {
        $this->barang_model->hapus_temp($id);
        Redirect(Base_url('divisi/pengajuan2'));
    }

    public function fungsi_delete_temp3($id)
    {
        $this->barang_model->hapus_temp($id);
        Redirect(Base_url('divisi/pengajuan3'));
    }
    public function fungsi_delete_temp4($id)
    {
        $this->barang_model->hapus_temp($id);
        Redirect(Base_url('divisi/pengajuan4'));
    }

    public function fungsi_pengajuan()
    {
        $this->pengajuan_model->add_pengajuan();
        $this->pengajuan_model->delete_pengajuan();
        Redirect(Base_url('pengajuan/divpengajuan'));
    }

    public function fungsi_pengajuan2()
    {

        $this->pengajuan_model->add_pengajuan2();
        $this->pengajuan_model->delete_pengajuan();
        Redirect(Base_url('pengajuan/divpengajuan'));
    }

    public function fungsi_pengajuan3()
    {

        $this->pengajuan_model->add_pengajuan3();
        $this->pengajuan_model->delete_pengajuan();
        Redirect(Base_url('pengajuan/divpengajuan'));
    }
    public function fungsi_pengajuan4()
    {

        $this->pengajuan_model->add_pengajuan4();
        $this->pengajuan_model->delete_pengajuan();
        Redirect(Base_url('pengajuan/divpengajuan'));
    }

    public function pengajuan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['nama_brg'] = $this->db->get('barang')->result_array();
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();


        $data['barang'] = $this->barang_model->getBarang();
        $data['barang_temp'] = $this->temp_model->getBarangTemp1();
        $this->load->view('templates/header');
        $this->load->view('templates/divisi_sidebar');
        $this->load->view('divisi/pengajuan', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan2()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['nama_brg'] = $this->db->get('barang')->result_array();
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();


        $data['barang'] = $this->barang_model->getBarang();
        $data['barang_temp'] = $this->temp_model->getBarangTemp2();
        $this->load->view('templates/header');
        $this->load->view('templates/divisi_sidebar');
        $this->load->view('divisi/pengajuan2', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan3()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['nama_brg'] = $this->db->get('barang')->result_array();
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();


        $data['barang'] = $this->barang_model->getBarang();
        $data['barang_temp'] = $this->temp_model->getBarangTemp3();
        $this->load->view('templates/header');
        $this->load->view('templates/divisi_sidebar');
        $this->load->view('divisi/pengajuan3', $data);
        $this->load->view('templates/footer');
    }

    public function pengajuan4()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('Barang_model', 'barang_model');
        $data['nama_brg'] = $this->db->get('barang')->result_array();
        $this->load->model('Temp_model', 'temp_model');
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();


        $data['barang'] = $this->barang_model->getBarang();
        $data['barang_temp'] = $this->temp_model->getBarangTemp4();
        $this->load->view('templates/header');
        $this->load->view('templates/divisi_sidebar');
        $this->load->view('divisi/pengajuan4', $data);
        $this->load->view('templates/footer');
    }

    public function add_temp()
    {
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $data = [
            'nama_brg' => $this->input->post('nama_brg'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'total' => $this->input->post('total'),
            'minggu' => $this->input->post('minggu'),
            'divisi' => $this->input->post('divisi'),
            'barang_id' => $this->input->post('barang_id'),
            'user_id' => $this->input->post('user_id')
        ];
        $this->db->insert('barang_temp', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang added!</div>');
        redirect('divisi/pengajuan');
    }

    public function add_temp2()
    {
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $data = [
            'nama_brg' => $this->input->post('nama_brg'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'total' => $this->input->post('total'),
            'minggu' => $this->input->post('minggu'),
            'divisi' => $this->input->post('divisi'),
            'barang_id' => $this->input->post('barang_id'),
            'user_id' => $this->input->post('user_id')
        ];
        $this->db->insert('barang_temp', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang added!</div>');
        redirect('divisi/pengajuan2');
    }

    public function add_temp3()
    {
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $data = [
            'nama_brg' => $this->input->post('nama_brg'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'total' => $this->input->post('total'),
            'minggu' => $this->input->post('minggu'),
            'divisi' => $this->input->post('divisi'),
            'barang_id' => $this->input->post('barang_id'),
            'user_id' => $this->input->post('user_id')
        ];
        $this->db->insert('barang_temp', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang added!</div>');
        redirect('divisi/pengajuan3');
    }
    public function add_temp4()
    {
        $data['nama_brg'] = $this->db->get('barang_temp')->result_array();
        $data = [
            'nama_brg' => $this->input->post('nama_brg'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
            'harga' => $this->input->post('harga'),
            'total' => $this->input->post('total'),
            'minggu' => $this->input->post('minggu'),
            'divisi' => $this->input->post('divisi'),
            'barang_id' => $this->input->post('barang_id'),
            'user_id' => $this->input->post('user_id')
        ];
        $this->db->insert('barang_temp', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Barang added!</div>');
        redirect('divisi/pengajuan4');
    }
}