<?php



class C_layanan extends CI_Controller

{

    public function __construct()

    {

        parent::__construct();

        $this->load->model('M_layanan', 'layanan');

        $this->load->model('Kategori_m');
		$this->load->model('Penulis_model');

    }



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



    private function uploader($upload, $index = array())

    {

        $data = array();



        foreach ($index as $key => $value) {

            if (isset($_FILES[$value]['size']) > 0) {

                if ($upload->upload($value)) {

                    $file_name = $upload->get_file_name();



                    $data[$key] = $file_name;

                } else {

                    return false;

                }

            } else {

                $data[$key] = null;

            }

        }



        return $data;

    }



    public function remover($upload, $index = array(), $location)

    {

        foreach ($index as $key => $value) {

            if (!$upload->remove($value, $location)) {

                return false;

            }

        }



        return true;

    }



    public function add_produk()

    {

        $judul_materi = $this->input->post('judul_materi');


        $isi_materi = $this->input->post('isi_materi');


        $kategori = $this->input->post('kategori');
		$penulis = $this->input->post('penulis');
		$tags_materi = $this->input->post('tags_materi');


        $upload = new FileUploadLibrary();

        $upload->setConfig(array(

            'upload_path' => realpath('assets/img'),

            'allowed_types' => 'jpg|png|jpeg',

            'max_size' => 2048, //2 MB

            'encrypt_name' => true

        ));

        $upload->initialize();



        $dataUpload = $this->uploader(

            $upload,

            array(

                'foto_materi' => 'foto_materi'

            )

        );


        $dataInsert['judul_materi'] = $judul_materi;

     

        $dataInsert['isi_materi'] = $isi_materi;

    

        $dataInsert['kategori'] = $kategori;
		$dataInsert['penulis']=$penulis;
		$dataInsert['tags_materi'] = $tags_materi;



        foreach ($dataUpload as $key => $value) {

            $dataInsert[$key] = $value;

        }



        if ($this->layanan->insert($dataInsert)) {

            echo json_encode(array(

                'RESULT' => 'OK',

                'MESSAGE' => 'Data berhasil ditambahkan'

            ));

            exit;

        } else {

            echo json_encode(array(

                'RESULT' => 'FAILED',

                'MESSAGE' => 'Gagal menambahkan data'

            ));

            exit;

        }

    }



    public function hapus_produk()

    {

        $id = getPost('id', null);



        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');



        $getData = $this->layanan->layanan($id);



        if ($getData->num_rows() == 0) {

            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');

        }



        $upload = new FileUploadLibrary();

        $row = $getData->row();



        $remove = $this->remover(

            $upload,

            array(

                $row->foto_layanan

            ),

            'assets/img'

        );



        if (!$remove) {

            return JSONResponseDefault('FAILED', 'Gagal menghapus beberapa gambar');

        }



        if ($this->layanan->delete($id)) {

            return JSONResponseDefault('OK', 'Data berhasil dihapus');

        } else {

            return JSONResponseDefault('FAILED', 'Gagal menghapus data');

        }

    }



    public function modal_edit_produk()

    {

        $id = getPost('id');



        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');



        $getData = $this->layanan->layanan($id);



        if ($getData->num_rows() == 0) {

            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');

        }



        $data = [

            'data' => $getData->row(),

            'joindata' => $this->Kategori_m->joinKategori($id),

            'kategori' => $this->Kategori_m->getAllKategori(),

        ];



        return JSONResponse(array(

            'RESULT' => 'OK',

            'HTML' => $this->load->view('admin/moduls/layanan/edit', $data, true)

        ));

    }



    private function edit_img_remover($upload, $row, $index = array())

    {

        $data = array();

        $deletedData = array();



        foreach ($index as $key => $value) {

            if ($_FILES[$value]['size'] > 0) {

                $data[$key] = $value;

                $deletedData[] = $row->$key;

            }

        }



        $this->remover($upload, $deletedData, 'assets/img');



        return $this->uploader($upload, $data);

    }



    public function edit_produk()

    {

        $id = getPost('id_layanan');



        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');



        $getData = $this->layanan->layanan($id);



        if ($getData->num_rows() == 0) {

            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');

        }



        $nama_layanan = getPost('nama_layanan');

        $nama_layanan_en = getPost('nama_layanan_en');

        $deskripsi_layanan = getPost('deskripsi_layanan');

        $deskripsi_layanan_en = getPost('deskripsi_layanan_en');

        $kategori = getPost('kategori');



        $updateData['nama_layanan'] = $nama_layanan;

        $updateData['nama_layanan_en'] = $nama_layanan_en;

        $updateData['deskripsi_layanan'] = $deskripsi_layanan;

        $updateData['deskripsi_layanan_en'] = $deskripsi_layanan_en;

        $updateData['kategori'] = $kategori;



        $upload = new FileUploadLibrary();

        $upload->setConfig(array(

            'upload_path' => realpath('assets/img'),

            'allowed_types' => 'jpg|png|jpeg',

            'max_size' => 2048, //2 MB

            'encrypt_name' => true

        ));

        $upload->initialize();



        $dataUpload = $this->edit_img_remover(

            $upload,

            $getData->row(),

            array(

                'foto_layanan' => 'foto_layanan'

            )

        );



        foreach ($dataUpload as $key => $value) {

            $updateData[$key] = $value;

        }



        if ($this->layanan->update($id, $updateData)) {

            return JSONResponseDefault('OK', 'Data berhasil diubah');

        } else {

            return JSONResponseDefault('FAILED', 'Gagal mengubah data');

        }

    }

}

