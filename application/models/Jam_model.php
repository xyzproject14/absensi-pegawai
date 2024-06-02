<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jam_model extends CI_Model
{
    public $tanggal, $bulan, $tahun, $jumlah_hari;
    public function __construct()
    {
        parent::__construct();
        $this->load->database('aplikasiabsensi');
        $this->tanggal = date('d');
        $this->bulan = date('F');
        $this->tahun = date('Y');
        $this->jumlah_hari = cal_days_in_month(CAL_GREGORIAN, date('m'), $this->tahun);
    }


    public function get_data($id)
    {
        $str = "SELECT * FROM data_pegawai WHERE id=$id";
        $data = $this->db->query($str)->row();
        return $data;
    }
    public function get_nama_pegawai()
    {
        $str = "SELECT * FROM data_pegawai";
        $list_nama = $this->db->query($str)->result();
        return $list_nama;
    }

    public function jumlah_hari_2($bulan, $tahun)
    {
        switch ($bulan) {
            case 'January':
                $bulan_int = 01;
                break;

            case 'February':
                $bulan_int = 02;
                break;

            case 'March':
                $bulan_int = 03;
                break;

            case 'April':
                $bulan_int = 04;
                break;

            case 'May':
                $bulan_int = 05;
                break;

            case 'June':
                $bulan_int = 06;
                break;

            case 'July':
                $bulan_int = 07;
                break;

            case 'August':
                $bulan_int = 8;
                break;

            case 'September':
                $bulan_int = 9;
                break;
            case 'October':
                $bulan_int = 10;
                break;

            case 'November':
                $bulan_int = 11;
                break;

            case 'December':
                $bulan_int = 12;
                break;
        }

        return cal_days_in_month(CAL_GREGORIAN, $bulan_int, $tahun);
    }


    public function get_jam_terisi($id, $tanggal)
    {
        $str = "SELECT * FROM absen_jam WHERE id_pegawai=$id AND tanggal=$tanggal";
        $list_jam = $this->db->query($str)->row();
        if ($list_jam !== null) {
            return $list_jam->id_pegawai . "_" . $list_jam->tanggal . $list_jam->bulan . $list_jam->tahun;
        } else {
            return 'ell ganteng';
        }
    }

    public function get_total_jam($id, $tanggal)
    {
        $str = "SELECT * FROM absen_jam WHERE id_pegawai=$id AND tanggal=$tanggal";
        $list_jam = $this->db->query($str)->row();
        return $list_jam->total_jam;
    }

    public function get_jam_terisi_P($id, $tanggal)
    {
        $str = "SELECT * FROM absen_jam_p WHERE id_pegawai=$id AND tanggal=$tanggal";
        $list_jam = $this->db->query($str)->row();
        if ($list_jam !== null) {
            return $list_jam->id_pegawai . "_" . $list_jam->tanggal . $list_jam->bulan . $list_jam->tahun;
        } else {
            return 'ell ganteng';
        }
    }

    public function get_total_jam_P($id, $tanggal)
    {
        $str = "SELECT * FROM absen_jam_p WHERE id_pegawai=$id AND tanggal=$tanggal";
        $list_jam = $this->db->query($str)->row();
        return $list_jam->total_jam;
    }

    public function isi_absen_jam($id, $jam)
    {
        $str = "INSERT INTO absen_jam (id_pegawai, tanggal, bulan, tahun, total_jam) VALUES ('$id', '$this->tanggal' , '$this->bulan', '$this->tahun', '$jam')";
        $this->db->query($str);
    }

    // ===== UNTUK CEK APAKAH HARI INI SUDAH ABSEN BERDASARKAN ID TERTENTU =====
    public function cek_data_double($id)
    {
        $str = "SELECT * FROM absen_jam WHERE id_pegawai='$id' AND tanggal='$this->tanggal' AND bulan='$this->bulan' AND tahun='$this->tahun'";
        $data = $this->db->query($str)->row();

        if ($data == null) {
            return false;
        } else {
            return true;
        }
    }

    //  MENGISI ABSEN PRODI SEKALI SEBULAN ====
    // public function isi_absen_teori($id, $tanggal, $bulan, $tahun,  $jam){
    public function isi_absen_teori($id, $bulan, $tahun)
    {

        // CEK DATA TERAKHIR DI DATABASE
        $cek_str = "SELECT * FROM absen_jam WHERE bulan='$bulan' AND tahun='$tahun' ORDER BY id DESC";
        $cek = $this->db->query($cek_str)->row();
        // $bulanDB = $cek->bulan . $cek->tahun;
        // return $cek;
        if ($cek == null) {
            for ($i = 0; $i < $this->jumlah_hari; $i++) {
                $jam = $_POST[$i + 1];
                $tanggal = $i + 1;
                $str = "INSERT INTO absen_jam (id_pegawai, tanggal, bulan, tahun, total_jam) VALUES ('$id', '$tanggal', '$bulan', '$tahun', '$jam')";
                $this->db->query($str);
            }
            echo 'data telah dimasukkan';
        } else {
            echo $bulan . $tahun;
            echo 'data sudah pernah dimasukkan';
            // echo $bulanDB;
        }
    }

    public function isi_absen_praktek($id, $bulan, $tahun)
    {

        // CEK DATA TERAKHIR DI DATABASE
        $cek_str = "SELECT * FROM absen_jam_p WHERE bulan='$bulan' AND tahun='$tahun' ORDER BY id DESC";
        $cek = $this->db->query($cek_str)->row();
        // $bulanDB = $cek->bulan . $cek->tahun;
        // return $cek;
        if ($cek == null) {
            for ($i = 0; $i < $this->jumlah_hari; $i++) {
                $jam = $_POST[$i + 1];
                $tanggal = $i + 1;
                $str = "INSERT INTO absen_jam_p (id_pegawai, tanggal, bulan, tahun, total_jam) VALUES ('$id', '$tanggal', '$bulan', '$tahun', '$jam')";
                $this->db->query($str);
            }
            echo 'data belum dimasukkan di praktek';
        } else {
            echo $bulan . $tahun;
            echo 'data sudah pernah dimasukkan dipraktek';
            // echo $bulanDB;
        }
    }


    // ========== UNTUK VALIDASI ROW ABSEN HARIAN YNG TIDAK TERISI(DISABLE) =======
    public function validasi($id, $bulan, $tahun)
    {
        $str = "SELECT * FROM absen_harian WHERE keterangan=1 AND id_pegawai='$id' AND bulan='$bulan' AND tahun='$tahun'";
        $query = $this->db->query($str)->result();

        return $query;
    }

    // ======== VALIDASI PEGAWAI YANG SUDAH ISI ABSEN AGAR TIDAK BISA MENGISI LAGI =========
    public function validasi_jam($id, $prodi, $absen, $bulan, $tahun)
    {
        $str = "SELECT * FROM $absen WHERE id_pegawai='$id' AND prodi='$prodi' AND bulan='$bulan' AND tahun='$tahun'";
        $data = $this->db->query($str)->row();

        return $data;
    }

    // ==== REKAP OTOMATIS DENGAN METODE BARU =====
    public function get_absen_harian($id, $bulan, $tahun)
    {
        // ======= MENGAMBIL DATA DARI ABSEN HARIAN ======
        $str_kehadiran = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND keterangan=1 AND bulan='$bulan' AND tahun='$tahun'";
        $query_kehadiran = $this->db->query($str_kehadiran)->result();

        $str_sakit = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND keterangan=2 AND bulan='$bulan' AND tahun='$tahun'";
        $query_sakit = $this->db->query($str_sakit)->result();

        $str_izin = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND keterangan=3 AND bulan='$bulan' AND tahun='$tahun'";
        $query_izin = $this->db->query($str_izin)->result();

        $str_cuti = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND keterangan=4 AND bulan='$bulan' AND tahun='$tahun'";
        $query_cuti = $this->db->query($str_cuti)->result();

        $str_alfa = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND keterangan=5 AND bulan='$bulan' AND tahun='$tahun'";
        $query_alfa = $this->db->query($str_alfa)->result();


        $kehadiran = count($query_kehadiran);
        $sakit = count($query_sakit);
        $izin = count($query_izin);
        $cuti = count($query_cuti);
        $alfa = count($query_alfa);


        // ======= ANTISIPASI ABSEN JAM JIKA DI ABSEN HARIAN TIDAK TERISI =======

        // $str_v = "SELECT * FROM absen_harian "
        return [
            'hadir' => $kehadiran,
            'sakit' => $sakit,
            'izin' => $izin,
            'cuti' => $cuti,
            'alfa' => $alfa
        ];

        // return $kehadiran;
    }


    // ===== INSERT DATA KE ABSEN JAM TEORI DAN PRAKTEK =====
    public function insert_data($id, $prodi, $bulan, $tahun, $jumlah_hari)
    {

        for ($i = 0; $i < $jumlah_hari; $i++) {
            $tanggal = ($i + 1) . "t";
            $total_jam = $_POST[$tanggal];
            $str = "INSERT INTO absen_jam (id_pegawai, tanggal, bulan, tahun, total_jam, prodi) VALUES ('$id', '$tanggal', '$bulan', '$tahun', '$total_jam', '$prodi')";
            $this->db->query($str);
        }
        for ($i = 0; $i < $jumlah_hari; $i++) {
            $tanggal = ($i + 1) . "p";
            $jam_wajib = ($i + 1) . "j";
            $total_jam_wajib = $_POST[$jam_wajib];
            $total_jam = $_POST[$tanggal];
            $str = "INSERT INTO absen_jam_p (id_pegawai, tanggal, bulan, tahun, total_jam, jam_wajib, prodi) VALUES ('$id', '$tanggal', '$bulan', '$tahun', '$total_jam', '$total_jam_wajib', '$prodi')";
            $this->db->query($str);
        }
    }

    public function delete_data_nol($absen, $bulan, $tahun)
    {
        $str = "DELETE FROM $absen WHERE bulan='$bulan' AND tahun='$tahun' AND total_jam=0";
        $this->db->query($str);
    }

    // ====== REKAP ABSEN BULAN SEBELUMNYA =======
    public function id_absen($prodi, $absen, $bulan, $tahun)
    {
        $str = "SELECT DISTINCT id_pegawai FROM $absen WHERE prodi='$prodi' AND bulan='$bulan' AND tahun='$tahun'";
        $data = $this->db->query($str)->result();

        return $data;
    }

    public function data_tanggal($id, $prodi, $absen, $tanggal, $bulan, $tahun)
    {
        $str = "SELECT * FROM  $absen WHERE id_pegawai='$id' AND prodi='$prodi' AND tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun'";
        $data = $this->db->query($str)->row();

        return $data->total_jam;
    }

    public function ubah_absen_jam($nip, $prodi, $tanggal, $bulan, $tahun, $jam)
    {
        $str_cek_nip = "SELECT * FROM data_pegawai WHERE nip='$nip'";
        $cek_nip = $this->db->query($str_cek_nip)->row();
        if ($cek_nip !== null) {

            $str_cek_data = "SELECT * FROM absen_jam WHERE id_pegawai='$cek_nip->id' AND prodi='$prodi' AND tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun'";
            $cek_data = $this->db->query($str_cek_data)->row();

            if ($cek_data !== null) {
                $str_update_jam = "UPDATE absen_jam SET total_jam= '$jam' WHERE id_pegawai='$cek_nip->id'  AND prodi='$prodi' AND tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun'";
                $this->db->query($str_update_jam);
                return 'true';
            } else {
                return 'null data';
            }
        } else {
            return 'null nip';
        }
    }

    public function ubah_absen_jam_praktek($nip, $prodi, $tanggal, $bulan, $tahun, $jam)
    {
        $str_cek_nip = "SELECT * FROM data_pegawai WHERE nip='$nip'";
        $cek_nip = $this->db->query($str_cek_nip)->row();
        if ($cek_nip !== null) {

            $str_cek_data = "SELECT * FROM absen_jam_p WHERE id_pegawai='$cek_nip->id' AND prodi='$prodi' AND tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun'";
            $cek_data = $this->db->query($str_cek_data)->row();

            if ($cek_data !== null) {
                $str_update_jam = "UPDATE absen_jam_p SET total_jam='$jam' WHERE id_pegawai='$cek_nip->id' AND prodi='$prodi' AND tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun'";
                $this->db->query($str_update_jam);
                return 'true';
            } else {
                echo 'data belum pernah dimasukkan sebelumnya, periksa kembali data anda';
            }
        } else {
            echo 'harap isi nip';
        }
    }

    // ====== MENDAPATKAN TOTAL JAM MENGAJAR =======
    function total_jam($id, $prodi, $absen, $bulan, $tahun)
    {
        $str = "SELECT * FROM $absen WHERE id_pegawai='$id' AND bulan='$bulan' AND tahun='$tahun' AND prodi='$prodi'";
        $query = $this->db->query($str)->result();
        // $str = "SELECT DISTINCT id,prodi,bulan,tahun FROM $absen WHERE id_pegawai = '$id' AND prodi = '$prodi' AND bulan = '$bulan' AND tahun = '$tahun'";
        // $query = $this->db->query($str)->result();

        $total_jam = [];

        foreach ($query as $data) :

            array_push($total_jam, $data->total_jam);
        endforeach;

        return array_sum($total_jam);

        // return $query;
    }

    function total_harian($prodi, $absen, $tanggal, $bulan, $tahun)
    {
        $str = "SELECT * FROM $absen WHERE tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun' AND prodi='$prodi'";
        $query = $this->db->query($str)->result();
        $total_harian = [];
        foreach ($query as $data) :
            array_push($total_harian, $data->total_jam);
        endforeach;

        return array_sum($total_harian);
    }

    public function total_keseluruhan($prodi, $absen, $bulan, $tahun)
    {
        $where = array('prodi' => $prodi, 'bulan' => $bulan, 'tahun' => $tahun);
        $this->db->where($where);
        $data = $this->db->get($absen)->result();


        $total_keseluruhan = [];
        foreach ($data as $data) :
            array_push($total_keseluruhan, $data->total_jam);
        endforeach;

        return array_sum($total_keseluruhan);
    }
}
