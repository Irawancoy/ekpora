
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{
	private $table = 'materi';
	public function getDataGambar(){
        return $this->db->get('materi');
    }

   
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Mahasiswa_model"); //load model mahasiswa
		$this->load->library('upload');
		$this->load->model('Kategori_m');
		$this->load->model('Penulis_model');
    }
    

    //validasi form, method ini akan mengembailkan data berupa rules validasi form       
    public function rules()
    {
        return [
            [
                'field' => 'judul_materi',  //samakan dengan atribute name pada tags input
                'label' => 'judul_materi',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            
        ];
    }

	
    public function Mahasiswa($id = '')

    {

        $this->db->select('*')

            ->from($this->table);



        if ($id) {

            $this->db->where('id_materi', $id);

        }

        return $this->db->get();

    }
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id_materi" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where id_penulis='$id'
    }

    //menampilkan semua data mahasiswa
    public function getAll()
    {
        $this->db->from($this->table);
        $this->db->order_by("id_materi", "desc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from mahasiswa order by id_penulis desc
    }

    //menyimpan data mahasiswa
	function foto_materi()
    {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);
        if (!empty($_FILES['foto_materi']['name'])) {

            if ($this->upload->do_upload('foto_materi')) {
                $gbr = $this->upload->data();

                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = '../assets/img/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 50;
                $config['height'] = 50;
                $config['new_image'] = '../assets/img/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $last = $this->input->post('last');
                unlink("../assets/img/$last");
                $gambar = $gbr['file_name'];
                return $gambar;
            }
        } else {
            $gambar = $this->input->post('last');
            return $gambar;
        }
    }
	function thumbnail_materi()
    {
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
        $config['encrypt_name'] = TRUE;

        $this->upload->initialize($config);
        if (!empty($_FILES['thumbnail_materi']['name'])) {

            if ($this->upload->do_upload('thumbnail_materi')) {
                $gbr = $this->upload->data();

                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = '../assets/img/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['quality'] = '100%';
                $config['width'] = 50;
                $config['height'] = 50;
                $config['new_image'] = '../assets/img/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $last = $this->input->post('last');
                unlink("../assets/img/$last");
                $gambar = $gbr['file_name'];
                return $gambar;
            }
        } else {
            $gambar = $this->input->post('last');
            return $gambar;
        }
    }

    public function save()
    {
		$data = array(
            "judul_materi" => $this->input->post('judul_materi'),
            "isi_materi" => $this->input->post('isi_materi'),
			"tags_materi" => $this->input->post('tags_materi'),
			"kategori "=> $this->input->post('kategori'),

			"foto_materi" => $this->foto_materi(),
			"thumbnail_materi" => $this->thumbnail_materi()
        );
        return $this->db->insert($this->table, $data);
    }

    //edit data mahasiswa
    public function update()
    {
        $data = array(
			"judul_materi" => $this->input->post('judul_materi'),
            "isi_materi" => $this->input->post('isi_materi'),
			"tags_materi" => $this->input->post('tags_materi'),
			"foto_materi" => $this->foto_materi(),
			"thumbnail_materi" => $this->thumbnail_materi()
        );
        return $this->db->update($this->table, $data, array('id_materi' => $this->input->post('id_materi')));
    }

    //hapus data mahasiswa
    public function delete($id)
    {
        return $this->db->delete($this->table, array("id_materi" => $id));
    }
	
	
}
