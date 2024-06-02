<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testing_model extends CI_Model
{
    public $name, $birth, $hoby, $today, $temp_today;

    public function __construct()
    {
        parent::__construct();
        $this->load->database('aplikasiabsensi');
        $this->today = 3;
        $this->temp_today = 3;
    }

    // public function index(){
    //     $database
    // }
    public function get_data()
    {
        return $this->db->get('testing_nama_pegawai')->result_array();
    }

    public function hobi()
    {
        // $this->db->select('*');
        // $this->db->from('testing');
        $this->db->where('hoby', 'Coding');
        // $query = $this->db->get();
        // return $query->result();
        return $this->db->get('testing')->result_array();
    }

    // ===== CEK INPUTAN KOSONG =====
    public function validation()
    {
    }

    public function insert()
    {
        $this->db->insert('testing', $this);
    }
    public function get_name()
    {
        return $this->db->get('testing_nama_pegawai')->result_array();
    }
    public function get_kehadiran($alamat)
    {
        $this->db->where_in('nama_pegawai', $alamat);
        return $this->db->get('testing_bulan');
    }

    public function data_langsung()
    {
        // menampilkan nama bulan secara full ex 'April'
        $this_month = date('F');
        $today = 3;
        $maret = [];
        for ($tanggal = 1; $tanggal < $today + 1; $tanggal++) {
            $str_query = "SELECT keterangan FROM absensi_tanggal_terpisah  where tanggal='$tanggal'";
            $query = $this->db->query($str_query)->result_array();
            array_push($maret, $query);
        }
        return $query;
    }

    public function tes_nama()
    {
        $str = "SELECT keterangan FROM absensi_tanggal_terpisah WHERE id_pegawai=1";
        $query = $this->db->query($str);
        return $query;
    }

    public function update_auto()
    {
        // $this->today = 3;
        // $this->temp_today = $this->today;

        if ($this->temp_today != $this->today) {
            return 'hari telah berubah : ' . $this->today . ', ini temp : ' . $this->temp_today;
        } else {
            return 'hari masih sama : ' . $this->temp_today . ', ini temp : ' . $this->temp_today;
        }
    }

    public function get_data_sementara()
    {
        $data = [
            ['id' => 1],
            ['id' => 2],
            ['id' => 3],
        ];
        $str_query = "SELECT id, nama FROM testing_nama_pegawai";
        $query = $this->db->query($str_query);
        return $query;
    }

    public function insert_absen_db($idnew, $ketnew)
    {
        $tanggal = date('d');
        $bulan = date('F');
        $tahun = date('Y');
        for ($i = 0; $i < count($idnew); $i++) {
            $str_query = "INSERT INTO absensi_tanggal_terpisah (id_pegawai, tanggal, bulan, tahun, keterangan) VALUES ('$idnew[$i]', '$tanggal', '$bulan', '$tahun', '$ketnew[$i]')";
            $this->db->query($str_query);
        }
    }

    public function absen_terakhir()
    {
        $str_query = "SELECT * FROM absensi_tanggal_terpisah ORDER BY tanggal DESC ";
        $query = $this->db->query($str_query);
        return $query->row_array()['tanggal'];
    }
}
