<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testing extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('absensi_model');
        $this->load->model('Jam_model');
        $this->load->model('Testing_model');
        $this->load->model('Testing_absensi_model');
    }

    public function index()
    {
        $model = $this->absensi_model;
        // $data['auto'] = $model->isi_auto();
        $model->isi_auto();
        // $data = $model->isi_auto();
        // foreach ($data as $data) :
        $data['title'] = 'ell gantengss';
        //     echo $data;
        // endforeach;
        $this->load->view('testing1', $data);
    }

    public function testing2()
    {
        $model = $this->Jam_model;

        $data = $model->id_absen('tlb', 'absen_jam', 'april', 2022);

        foreach ($data as $list) {
            echo $list->id_pegawai;
        }
        var_dump($data);
        // $nama = $_POST['nama'];
        // echo $nama;
    }
}
