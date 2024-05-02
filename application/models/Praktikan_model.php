<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Praktikan_model extends CI_Model {
    private $_table = "praktikan";

    public $id_prak;
    public $nim_prak;
    public $nama_prak;
    public $kelas_prak;
    public $jadwal_prak;
    public $sesi_prak;

    public function rules(){
        return [
            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'nim',
            'label' => 'NIM', 
            'rules' => 'required'],            

            ['field' => 'kelas',
            'label' => 'Kelas',
            'rules' => 'required'],

            ['field' => 'jadwal',
            'label' => 'Jadwal',
            'rules' => 'required'],

            ['field' => 'sesi',
            'label' => 'Sesi',
            'rules' => 'required']
        ];
    }

    public function getAll(){
        $this->db->order_by('waktu_input','desc');        
        return $this->db->get($this->_table)->result();
    }

    public function getByID($id_prak){
        return $this->db->get_where($this->_table, ["id_prak" => $id_prak])->row();
    }

    public function createData(){
        
        $post = $this->input->post();
        $this->id_prak = uniqid();
        $this->nama_prak = $post['nama'];
        $this->nim_prak = $post['nim'];
        $this->kelas_prak = $post['kelas'];
        $this->jadwal_prak = $post['jadwal'];
        $this->sesi_prak = $post['sesi'];
        $this->db->insert($this->_table, $this);

    }

    public function updateData(){
        $post = $this->input->post();
        $this->id_prak= $post['id_prak'];
        $this->nama_prak = $post['nama'];
        $this->nim_prak = $post['nim'];
        $this->kelas_prak = $post['kelas'];
        $this->jadwal_prak = $post['jadwal'];
        $this->sesi_prak = $post['sesi'];
        $this->db->update($this->_table, $this, array('id_prak' => $post['id_prak']));
    }

    public function hapus($id_prak){
        return $this->db->delete($this->_table, array('id_prak' => $id_prak));
    }

}

?>