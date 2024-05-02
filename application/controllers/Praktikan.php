<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Praktikan extends CI_Controller{
    public function __construct(){
        
        parent::__construct();
        $this->load->model('praktikan_model');
        $this->load->library('form_validation');   
        $this->load->helper('url');          
    }

    public function index(){
        $data['praktikan'] = $this->praktikan_model->getAll();
        $this->load->view('praktikan', $data);
    }

    public function inputData(){
        $this->load->view('tambahPraktikan');
    }

    public function simpanData(){
        $praktikan = $this->praktikan_model;
        $validation = $this->form_validation;
        $validation->set_rules($praktikan->rules());

        if ($validation->run()){
            $praktikan->createData();            
            $this->session->set_flashdata('success','Data Berhasil disimpan!');
            redirect(site_url('praktikan/inputData'));   
        }

        redirect(site_url('praktikan/inputData'));        
    }

    public function editdata($id_prak= null){
        if(!isset($id_prak)) redirect('praktikan/inputData');

        $data['praktikan'] = $this->praktikan_model->getByID($id_prak);
        if (!$data['praktikan']) show_404();
        $this->load->view('editPraktikan',$data);
    }

    public function updateData(){
        
        $praktikan = $this->praktikan_model;
        $validation = $this->form_validation;
        $validation->set_rules($praktikan->rules());

        if ($validation->run()){
            $praktikan->updatedata();
            $this->session->set_flashdata('success','Data Berhasil diperbaharui');            
            redirect(site_url('praktikan'));
        }
    
    }    

    public function hapusData($id_prak = null){
        if (!isset($id_prak)) show_404();

        if ($this->praktikan_model->hapus($id_prak)){
            $this->session->set_flashdata('delete','Data Berhasil Dihapus!');
            redirect(site_url('praktikan'));
        }
    }
}