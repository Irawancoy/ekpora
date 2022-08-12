
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_layanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		$this->load->model('M_layanan', 'layanan');

        $this->load->model('Kategori_m');
		$this->load->model('Penulis_model');

		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
    }

    //method pertama yang akan di eksekusi
    public function index()
    {

		$data = [

            'view_file' => 'admin/moduls/V_layanan',

            'result' => $this->layanan->layanan()->result(),

            'kategori' => $this->Kategori_m->getAllKategori(),
			'penulis'=>$this->Penulis_model->getAllKategori(),

            // 'joindata' => $this->Kategori_m->joinKategori('4'),

        ];



        return $this->load->view('admin/admin_view', $data);
    }

    //method add digunakan untuk menampilkan form tambah data mahasiswa
    public function ()
    {
        $Materi = $this->M_layanan; //objek model
        $validation = $this->form_validation; //objek form validation
        $validation->set_rules($Materi->rules()); //menerapkan rules validasi pada mahasiswa_model
        //kondisi jika semua kolom telah divalidasi, maka akan menjalankan method save pada mahasiswa_model
        if ($validation->run()) {
            $Materi->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mahasiswa berhasil disimpan. 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("mahasiswa");
        }
        
       
        return $this->load->view('admin/admin_view', $data);
        $this->load->view('mahasiswa/add', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('mahasiswa');

        $Mahasiswa = $this->Mahasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($Mahasiswa->rules());

        if ($validation->run()) {
            $Mahasiswa->update();
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Mahasiswa berhasil disimpan.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
            redirect("mahasiswa");
        }
        $data["title"] = "Edit Data Mahasiswa";
        $data["data_mahasiswa"] = $Mahasiswa->getById($id);
        if (!$data["data_mahasiswa"]) show_404();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('mahasiswa/edit', $data);
        $this->load->view('templates/footer');
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->Mahasiswa_model->delete($id);
        $msg['success'] = true;
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data Mahasiswa berhasil dihapus.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button></div>');
        $this->output->set_output(json_encode($msg));
    }
	
		
}
