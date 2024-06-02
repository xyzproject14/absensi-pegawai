<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Absensi_model');

        // =========== HANYA TESTING DATA ========
        $this->load->model('Testing_absensi_model');
    }
    // @required(login)
    public function index()
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 3) {

            $data['title'] = 'ABSEN HARIAN PEGAWAI';
            $data['header'] = "Penginputan Absensi Kehadiran Pegawai";
            $data['judul_aplikasi'] = "APRON";
            $data['nama_aplikasi'] = "(Aplikasi Penyusunan Rekapitulasi Honor Dosen / Tenaga Pengajar)";

            // =========== HANYA TESTING =========
            $abasensi_model = $this->Absensi_model;

            $data['list_absen'] = $abasensi_model->tampilkan_form_absen()->result_array();

            $data['global'] = $this->Absensi_model;
            $data['nama2'] = $abasensi_model->get_name_2();
            $data['jumlah_hari'] = $abasensi_model->jumlah_hari;
            $data['tanggal'] = $abasensi_model->tanggal;
            $data['bulan'] = $abasensi_model->bulan;
            $data['tahun'] = $abasensi_model->tahun;
            // $abasensi_model->isi_auto();

            $this->load->view('Absensi_view', $data);
        } else {
            redirect('login');
        }
    }

    // public function isi_absen()
    // {
    //     $model = $this->Absensi_model;
    //     $data['list_absen'] = $model->tampilkan_list_absen()->result_array();

    //     $this->load->view('Absensi_view', $data);
    // }

    public function tambah_data_absen()
    {
        // echo 'ell ganteng';
        $absensi_model = $this->Absensi_model;

        $absensi_model->tambah_data_absen();
    }

    public function isi_absen_bulanan()
    {
        $model = $this->Absensi_model;
        $data['data'] = $this->Absensi_model;

        // $data = explode('_', $parm);

        $id = $_POST['id'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $nama = $model->get_data_id($id);

        $data['nama'] = $nama;
        $data['title'] = "ABSEN PEGAWAI";
        $data['header'] = "Penginputan Absensi <br> Kehadiran Pegawai";

        $data['id'] = $id;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['jumlah_hari'] = $model->jumlah_hari_2($bulan, $tahun);

        $data['data'] = $model->get_data_id($id);

        $validasi = $model->validasi_data($id, $bulan, $tahun);
        if ($validasi == true) {
            $this->load->view('isi_absen_bulanan', $data);
        } else {
            $sudah_isi = "<div class='notif notif-body-danger' value='1'>" . $nama->nama . " sudah mengisi absen untuk bulan " . $bulan . ' ' . $tahun . "<span>Hubungi admin untuk melakukan perubahan</span></div>";
            $this->session->set_flashdata('message', $sudah_isi);
            redirect('absensi');
        }
        // echo $model->bulan_terakhir()->bulan;
    }

    public function insert_data()
    {
        $model = $this->Absensi_model;
        $id = $_POST['id'];
        $data = $model->get_data_id($id);

        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];

        // ==== DATA UMUM ====
        // $nama = $_POST['nama'];
        $namadatabase = $data->nama;
        $nip = $data->nip;
        $jabatan = $data->jabatan_akademik;
        $golongan = $data->golongan;
        $tp = $data->tp;

        // ==== INSERT KE ABSEN HARIAN  =====
        $jumlah_hari = $_POST['jumlah_hari'];


        for ($i = 0; $i < $jumlah_hari; $i++) {
            $j = $i + 1;
            $keterangan = $_POST[$j];
            $str = "INSERT INTO absen_harian (id_pegawai, tanggal, bulan, tahun, keterangan) VALUES ('$id', '$j', '$bulan', '$tahun', '$keterangan')";
            // echo 'tanggal ' . $i + 1 . ' : ' . $_POST[$i + 1] . '<br>';
            $this->db->query($str);
        }

        $succes = "<div class='notif notif-body' value='1'>" . $data->nama . " berhasil menambahkan absen untuk bulan " . $bulan . ' ' . $tahun . "<span>Hubungi admin untuk melakukan perubahan</span></div>";
        $this->session->set_flashdata('message', $succes);

        redirect('absensi');
    }


    // ========== REKAP DATA BULAN-BULAN SEBELUMNYA ==========
    public function rekap()
    {
        $model = $this->Absensi_model;
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $data['title'] = 'ADMIN PEGAWAI';

        // $data['absen'] = $model->rekap($bulan, $tahun);
        // $data['data'] = $model->get_hadir();
        $data['data'] = $model->get_hadir($bulan, $tahun);
        // $nama = $model->get_hadir('april', 2022);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['jumlah_hari'] = $model->jumlah_hari_2($bulan, $tahun);
        $data['global'] = $this->Absensi_model;

        // foreach ($nama as $list) :
        //     echo $list->id_pegawai;
        // endforeach;

        // var_dump($model->get_hadir());
        $this->load->view('rekap_bulan_absen_harian', $data);
    }

    public function print_absen()
    {
        $model = $this->Absensi_model;
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];

        $data['title'] = 'ADMIN PEGAWAI';

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['data'] = $model->get_hadir($bulan, $tahun);
        $data['jumlah_hari'] = $model->jumlah_hari_2($bulan, $tahun);
        $data['global'] = $this->Absensi_model;

        $this->load->view('print_absen_harian', $data);
    }

    function tambah_data_baru()
    {
        $model = $this->Absensi_model;

        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $golongan = $_POST['golongan'];
        $jabatan = $_POST['jabatan'];
        $tp = $_POST['tp'];

        echo $model->cek_data_kosong($nama, $nip, $jabatan, $golongan, $tp);
    }

    function detail($id)
    {
        // echo $id;
        $model = $this->Absensi_model;
        // echo $id;
        $data['data'] = $model->get_data_id($id);
        $this->load->view('ubah_data_pegawai_2', $data);
    }

    function ubah_data()
    {
        $model = $this->Absensi_model;

        $id = (int) $_GET['id'];
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $golongan = $_POST['golongan'];
        $jabatan = $_POST['jabatan'];
        $tp = $_POST['tp'];

        $berhasil = "<div class='notif-body'>Data berhasil diupdate</div>";
        $gagal = "<div class='notif-body-danger'>Data gagal diupdate</div>";

        $update = $model->ubah_data_pegawai($id, $nama, $nip, $golongan, $jabatan, $tp);

        if ($update == true) {
            $this->session->set_flashdata('message', $berhasil);
            redirect('absensi');
        } else {
            $this->session->set_flashdata('message', $gagal);
            redirect('absensi');
        }
    }

    public function hapus_pegawai($nip)
    {
        $model = $this->Absensi_model;
        // $model->hapus_absen_prodi_dan_jam($id);

        $model->hapus_pegawai($nip);
        redirect('absensi');
        // echo $nip;
    }

    public function ubah_absen_harian()
    {
        // ===== FLASH DATA =====
        $succes = "<div class='notif-body'>Data berhasil diubah</div>";
        $null_data = "<div class='notif-body-danger'>Data yang anda masukkan belum pernah dimasukkan</div>";
        $null_nip = "<div class='notif-body-danger'>NIP tidak ditemukan</div>";

        $model = $this->Absensi_model;
        // $nip = 'H05118106';
        // $keterangan = 2;
        $nip = $_POST['nip_harian'];
        $tanggal = $_POST['tanggal_harian'];
        $bulan = $_POST['bulan_harian'];
        $tahun = $_POST['tahun_harian'];
        $keterangan = $_POST['keterangan_harian'];

        $ubah_data = $model->ubah_absen_harian($nip, $tanggal, $bulan, $tahun, $keterangan);

        if ($ubah_data == 'null nip') {
            $this->session->set_flashdata('message', $null_nip);
            redirect('absensi');
        } else if ($ubah_data == 'null data') {
            $this->session->set_flashdata('message', $null_data);
            redirect('absensi');
        } else {
            $this->session->set_flashdata('message', $succes);
            redirect('absensi');
        }
    }
}
