<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testing_absensi_model extends CI_Model
{

    public $pegawai = ['Ell', 'Naura Alfatiyya Arda', 'Marsya Anggun Prisilla', 'Juni', 'Niniz', 'Fuad'];

    public $aprilsatu = [1, 2, 3, 1, 4, 2];
    public $april = [[00, 01, 02, 03, 04, 05, 06, 07], [10, 11, 12, 13, 14, 15, 16, 17]];

    public function __construct()
    {
        parent::__construct();
        $this->load->database('aplikasiabsensi');
    }

    public function get_today()
    {
        $today = date('d ');
        $parseToday = (int) $today;
        return $parseToday;
    }

    public function get_datamaret()
    {
        return $this->db->get('testing_bulan')->result_array();
    }

    public function get_kehadiran($nama)
    {
        $this->db->where('nama_pegawai', $nama);
        $kehadiran = $this->db->get('testing_bulan')->result_array();
        return $kehadiran;
    }
}
