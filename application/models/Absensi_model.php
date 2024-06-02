<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_model extends CI_Model
{
    public $jumlah_hari, $tanggal, $bulan, $tahun, $jumlah_hari_2;
    // public $tanggal = date('d');
    public function __construct()
    {
        parent::__construct();
        $this->load->database('aplikasiabsensi');
        $this->tanggal = date('d');
        $this->bulan = date('F');
        $this->tahun = date('Y');
        $this->jumlah_hari = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
        // $this->jumlah_hari_2 = cal_days_in_month(CAL_GREGORIAN, $this->bulan_terakhir()->bulan, $this->bulan_terakhir()->tahun);
    }

    public function index()
    {
        $tanggal = date('d');
        $bulan = date('F');
        $tahun = date('Y');
    }

    public function get_name()
    {
        return $this->db->get('data_pegawai')->result_array();
    }

    public function get_name_2()
    {
        return $this->db->get('data_pegawai')->result();
    }

    public function get_hadir($bulan, $tahun)
    {
        $str = "SELECT DISTINCT id_pegawai FROM absen_harian WHERE bulan='$bulan' AND tahun='$tahun'";
        $data = $this->db->query($str)->result();

        return $data;
    }

    public function get_data_id($id)
    {
        $str_query = "SELECT * FROM data_pegawai WHERE id='$id'";
        $data = $this->db->query($str_query)->row();

        return $data;
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

    public function tampilkan_data()
    {
        $today = date('d');
        $bulan_ini = date('F');

        $bulan = [];
        for ($tanggal = 1; $tanggal < $today + 1; $tanggal++) {
            $str_query = "SELECT keterangan FROM absensi_tanggal_terpisah WHERE tanggal='$tanggal' AND bulan='$bulan_ini'";
            $list_tanggal = $this->db->query($str_query)->result_array();
            array_push($bulan, $list_tanggal);
        }
        return $bulan;
    }

    public function get_kalender()
    {
        $tanggal = Date('d');
        $bulan = date('F');
        $tahun = date('Y');
        $jumlah_hari = cal_days_in_month(CAL_GREGORIAN, date('m'), $tahun);
        $kalender = ['tanggal' => $tanggal, 'bulan' => $bulan, 'tahun' => $tahun, 'jumlah_hari' => $jumlah_hari];
        return $kalender;
    }



    // ===== MENGAMBIL ID DARI TABEL NAMA_PEGAWAI =====
    public function get_id()
    {
        $str_get_id = "SELECT id FROM data_pegawai ORDER BY id DESC";
        $id = $this->db->query($str_get_id);
        return $id->row_array();
    }

    public function tampilkan_form_absen()
    {
        $str_query = "SELECT * FROM data_pegawai";
        $query = $this->db->query($str_query);
        return $query;
    }

    public function tampilkan_list_absen()
    {
        $str_query = "SELECT * FROM data_pegawai";
        $query = $this->db->query($str_query);
        return $query;
    }

    // ======= CEK ABSEN TERAKHIR ======
    public function absen_terakhir()
    {
        $str_query = "SELECT * FROM absensi_tanggal_terpisah ORDER BY tanggal DESC ";
        $query = $this->db->query($str_query);
        return $query->row_array()['tanggal'];
    }
    public function isi_otomatis($id, $tanggal)
    {
        $str = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND tanggal='$tanggal' AND bulan='$this->bulan' AND tahun='$this->tahun'";
        $data = $this->db->query($str)->row();
        if ($data !== null) {
            return $data->id_pegawai . '_' . $tanggal . $this->bulan . $this->tahun;
        } else {
            return 'ell ganteng';
        }
    }

    // ======= MENGISI SECARA OTOMATIS JIKA TIDAK MELAKUKAN ABSENSI ========
    public function isi_auto()
    {
        $str = "SELECT * FROM absen_harian ORDER BY tanggal DESC";
        $tanggal_database = $this->db->query($str)->row();

        $data = $this->get_name_2();
        $tanggal = $this->tanggal - 1;

        $database_tanggal = $tanggal_database->tanggal . $tanggal_database->bulan . $tanggal_database->tahun;
        $time = strtotime($database_tanggal) + (2 * 24 * 3600);
        // return date('d-F-Y', $time);
        $awal = $tanggal_database->tanggal + 1;

        $list_id = [];
        foreach ($data as $data) {
            array_push($list_id, $data->id);
        }
        // $akhir = $this->tanggal - 1;
        $time2 = strtotime($this->tanggal . $this->bulan . $this->tahun);

        if ($time <= $time2) {

            for ($i = $awal; $i < $this->tanggal; $i++) {
                // echo '<br> ini $i : ' . $i . '<br>';
                foreach ($list_id as $data) :
                    $str_insert = "INSERT INTO absen_harian (id_pegawai, tanggal, bulan, tahun, keterangan) VALUES ('$data', '$i', '$this->bulan', '$this->tahun', 5)";
                    $this->db->query($str_insert);
                // echo $data;
                endforeach;
            }
        }
        // return 'time : ' . date('d-F-Y', $time) . '<br>hari ini : ' . date('d-F-Y', $time2) . '<br>tanggal dari databse : ' . $database_tanggal . '<br>tanggal database : ' . $tanggal_database->tanggal + 1 . '<br>tanggal hari ini : ' . $this->tanggal - 1;
    }

    public function cek_data()
    {
        $str = "SELECT * FROM absen_harian WHERE tanggal='$this->tanggal' AND bulan='$this->bulan' AND tahun='$this->tahun'";
        $data = $this->db->query($str)->row();
        if ($data == null) {
            return true;
        } else {
            return false;
        }
    }

    public function tambah_data_absen()
    {
        $succes = "<div class='notif-body'>Data berhasil ditambahkan</div>";
        $belum_isi = "<div class='notif notif-body-danger' value='1'>Masih absen yang belum diisi
        <span>Periksa kembali data anda</span></div>";
        $sudah_isi = "<div class='notif notif-body-danger' value='1'>Anda sudah mengisi absen hari ini<span>Hubungi admin untuk melakukan perubahan</span></div>";

        $str = "SELECT * FROM data_pegawai";
        $data = $this->db->query($str)->result();
        $terisi = true;

        if ($this->cek_data() == true) {

            foreach ($data as $data) :
                // $keterangan = $_POST[$data->id];
                if (!isset($_POST[$data->id])) {
                    $terisi = false;
                }

            endforeach;

            if ($terisi == true) {
                $str = "SELECT * FROM data_pegawai";
                $data = $this->db->query($str)->result();
                foreach ($data as $data) :
                    $keterangan = $_POST[$data->id];
                    $str_insert = "INSERT INTO absen_harian (id_pegawai, tanggal, bulan, tahun, keterangan) VALUES ('$data->id', '$this->tanggal', '$this->bulan', '$this->tahun', '$keterangan')";
                    $this->db->query($str_insert);
                // echo $keterangan;
                endforeach;
                $this->session->set_flashdata('message', $succes);
                redirect('Absensi');
                // echo 'terisi = true';
            } else {
                // echo 'terisi = false';
                $this->session->set_flashdata('message', $belum_isi);
                redirect('absensi');
            }
        } else {
            $this->session->set_flashdata('message', $sudah_isi);
            redirect('absensi');
        }


        // if ($terisi == true) {

        //     foreach ($data as $list) :
        //         // echo $list->nama;
        //         $keterangan = $_POST[$list->id];
        //         echo 'data berhasil ditambahkan';
        //     endforeach;
        // } else {
        //     echo 'los contre los contre';
        // }
    }



    public function get_keterangan($id, $tanggal)
    {
        $str = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND tanggal='$tanggal' ORDER BY id DESC";
        $data = $this->db->query($str)->row();

        return $data->keterangan;
    }

    public function isi_absen_bulanan($id)
    {
        $data = $this->get_data_id($id);
        return $data;
    }

    // ==== MEMVALIDASI DATA YANG SUDAH TERISI ====
    public function validasi_data($id, $bulan, $tahun)
    {
        $str = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND bulan='$bulan' AND tahun='$tahun'";
        $data = $this->db->query($str)->row();

        if ($data == null) {
            return true;
        } else {
            return false;
        }
    }

    // MENGAMBIL DATA BULAN TERAKHIR YANG DI INPUT DI DATABASE
    public function bulan_terakhir()
    {
        $str = "SELECT * FROM absen_harian ORDER BY id DESC";
        $data = $this->db->query($str)->row();
        return $data;
    }


    // ======= REKAP DATA BULAN SEBELUMNYA =========
    public function rekap($id, $tanggal, $bulan, $tahun)
    {
        $str = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun'";
        $data = $this->db->query($str)->row();

        if ($data != null) {
            // return $data->keterangan;
            switch ($data->keterangan) {
                case 1:
                    return "H";
                    break;
                case 2:
                    return "S";
                    break;
                case 3:
                    return "DL";
                    break;
                case 4:
                    return "C";
                    break;
                case 5:
                    return "A";
                    break;
                case 6:
                    return "L";
                    break;
            }
        } else {
            return ' - ';
        }
        // return 'keterangan';
    }

    public function validasi_data_2($nip)
    {
        $str = "SELECT * FROM data_pegawai WHERE nip='$nip'";
        $data = $this->db->query($str)->row();

        return $data;
    }

    public function tambah_data_baru($nama, $nip, $jabatan, $golongan, $tp)
    {
        // $data = $this->validasi_data($nip);
        $str = "INSERT INTO data_pegawai (nama, nip, golongan, jabatan_akademik, tp) VALUES ('$nama', '$nip', '$golongan', '$jabatan', '$tp')";
        $this->db->query($str);
    }

    function cek_data_kosong($nama, $nip, $jabatan, $golongan, $tp)
    {
        $succes = "<div class='notif-body'>Data baru berhasil ditambahkan</div>";
        $null_nip = "<div class='notif-body-danger'>Harap mengisi semua kolom yang telah disediakan!!</div>";
        $double_nip = "<div class='notif notif-body-danger'>" . $nip . " sudah digunakan oleh pegawai lain <span>nip tidak boleh sama</span></div>";

        if ($nama !== '' && $nip !== '' && $golongan !== '' && $tp !== '' && $jabatan !== '') {

            $data = $this->validasi_data_2($nip);
            if ($data !== null) {
                // return 'data sudah ada';
                $this->session->set_flashdata('message', $double_nip);
                redirect('absensi');
            } else {
                // return 'data belum ada';
                // var_dump($nip);
                // echo $nip;
                $this->tambah_data_baru($nama, $nip, $jabatan, $golongan, $tp);
                $this->session->set_flashdata('message', $succes);
                redirect('absensi');
            }
        } else {
            $this->session->set_flashdata('message', $null_nip);
            redirect('absensi');
            // return '<br>ada data yang kosong';
        }
    }

    public function ubah_data_pegawai($id, $nama, $nip, $golongan, $jabatan, $tp)
    {
        $str = "UPDATE data_pegawai SET nama='$nama' , nip='$nip' , golongan='$golongan' , jabatan_akademik='$jabatan', tp='$tp' WHERE id='$id' ";
        $query = $this->db->query($str);

        if ($query == true) {
            return true;
        } else {
            return false;
        }
    }

    public function hapus_pegawai($nip)
    {
        $str5 = "SELECT id FROM data_pegawai WHERE nip='$nip'";
        $query = $this->db->query($str5)->row();

        $id = $query->id;

        $str = "DELETE FROM data_pegawai WHERE id='$id'";
        $str2 = "DELETE FROM absen_harian WHERE id_pegawai='$id'";
        $str3 = "DELETE FROM absen_jam WHERE id_pegawai='$id'";
        $str4 = "DELETE FROM absen_jam_p WHERE id_pegawai='$id'";
        $this->db->query($str);
        $this->db->query($str2);
        $this->db->query($str3);
        $this->db->query($str4);
    }

    public function ubah_absen_harian($nip, $tanggal, $bulan, $tahun, $keterangan)
    {
        $str_get_id = "SELECT * FROM data_pegawai WHERE nip='$nip'";
        $id = $this->db->query($str_get_id)->row();
        if ($id !== null) {
            // return $id->nama . $id->nip . $tanggal . $bulan . $tahun . '_' . $keterangan;
            $str_check_data = "SELECT * FROM absen_harian  WHERE id_pegawai='$id->id' AND tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun'";
            $check_data = $this->db->query($str_check_data)->row();

            if ($check_data !== null) {
                $str_update = "UPDATE absen_harian SET keterangan='$keterangan' WHERE id_pegawai='$id->id' AND tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun'";
                $this->db->query($str_update);
                return 'true';
            } else {
                return 'null data';
            }
        } else {
            return 'null nip';
        }
    }

    public function total_jam($id_pegawai, $bulan, $tahun)
    {
        $where = array('id_pegawai' => $id_pegawai, 'bulan' => $bulan, 'tahun' => $tahun, 'keterangan' => 1);
        $this->db->where($where);
        $data = $this->db->get('absen_harian')->result();

        $total_perorang = [];
        foreach ($data as $data) :
            array_push($total_perorang, $data->keterangan);
        endforeach;

        return count($total_perorang);
    }

    public function total_harian($tanggal, $bulan, $tahun)
    {
        $where = array('tanggal' => $tanggal, 'bulan' => $bulan, 'tahun' => $tahun, 'keterangan' => 1);
        $this->db->where($where);
        $data = $this->db->get('absen_harian')->result();

        return count($data);
        // $total_perhari = [];

        // foreach ($data as $data) :
        //     array_push($total_perorang, $data->keterangan);
        // endforeach;


    }

    public function total_keseluruhan($bulan, $tahun)
    {
        $where = array('bulan' => $bulan, 'tahun' => $tahun, 'keterangan' => 1);
        $this->db->where($where);
        $data = $this->db->get('absen_harian')->result();

        return count($data);
    }
}
