<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller{
    public function __construct(){
        
        parent::__construct();
        $this->load->model('mahasiswa_model');
        $this->load->library('form_validation');   
        $this->load->helper('url');          
    }

    public function index(){
        $data['mahasiswa'] = $this->mahasiswa_model->getAll();
        $this->load->view('index', $data);
    }

    public function inputdata(){
        $this->load->view('tambahdata');
    }

    public function simpandata(){
        $mahasiswa = $this->mahasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        if ($validation->run()){
            $mahasiswa->simpan();            
            
            redirect(site_url('mahasiswa'));   
        }

        redirect(site_url('mahasiswa'));        
    }

    public function editdata($id_mahasiswa = null){
        if(!isset($id_mahasiswa)) redirect('mahasiswa/inputdata');

        $data['mahasiswa'] = $this->mahasiswa_model->getByID($id_mahasiswa);
        if (!$data['mahasiswa']) show_404();
        $this->load->view('editdata',$data);
    }

    public function updatedata(){
        
        $mahasiswa = $this->mahasiswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($mahasiswa->rules());

        if ($validation->run()){
            $mahasiswa->updatedata();
            
            redirect(site_url('mahasiswa'));
        }
    
    }    

    public function hapusdata($id_mahasiswa = null){
        if (!isset($id_mahasiswa)) show_404();

        if ($this->mahasiswa_model->hapus($id_mahasiswa)){
            redirect(site_url('mahasiswa'));
        }
    }
}