<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Rekap_model');
        $this->load->model('Jam_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 1) {

            $model = $this->Rekap_model;
            $data['judul_aplikasi'] = "APRON";
            $data['nama_aplikasi'] = "(Aplikasi Penyusunan Rekapitulasi Honor Dosen / Tenaga Pengajar)";


            $data['global'] = $this->Rekap_model;
            $data['tanggal'] = $model->tanggal;
            $data['bulan'] = $model->bulan;
            $data['tahun'] = $model->tahun;
            $data['jumlah_hari'] = $model->jumlah_hari;

            $data['title'] = 'REKAP DATA PEGAWAI';

            $data['nama'] = $model->get_nama_pegawai();
            // $model->rekap_auto();

            $data['list_bulan'] = $model->get_list_bulan();

            $this->load->view('rekap_view', $data);
        } else {
            // echo 'gak bisa ';
            $error = "<span style='color:red'>Masukkan Email dan password yang benar!!</span>";
            $this->session->set_flashdata('message', $error);
            redirect('login');
        }
    }

    public function tambah_data_baru()
    {
        $model = $this->Rekap_model;

        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $golongan = $_POST['golongan'];
        $jabatan = $_POST['jabatan'];
        $tp = $_POST['tp'];

        // ===== MEMVALIDASI DATA PEGAWAI BARU YANG AKAN DIMASUKKAN ===== 
        // $model->validasi_data($nip);

        // $model->tambah_data_baru($nama, $nip, $golongan);
        echo $model->cek_data_kosong($nama, $nip, $jabatan, $golongan, $tp);
    }

    public function ubah_absen_harian()
    {
        // ===== FLASH DATA =====
        $succes = "<div class='notif-body'>Data berhasil diubah</div>";
        $null_data = "<div class='notif-body-danger'>Data yang anda masukkan belum pernah dimasukkan</div>";
        $null_nip = "<div class='notif-body-danger'>NIP tidak ditemukan</div>";

        $model = $this->Rekap_model;
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
            redirect('rekap');
        } else if ($ubah_data == 'null data') {
            $this->session->set_flashdata('message', $null_data);
            redirect('rekap');
        } else {
            $this->session->set_flashdata('message', $succes);
            redirect('rekap');
        }
    }

    public function ubah_absen_jam()
    {
        // $this->session->set_userdata(['role_id' => 2]);
        $succes = "<div class='notif-body'>Data berhasil diubah</div>";
        $null_data = "<div class='notif-body-danger'>Data yang anda masukkan belum pernah dimasukkan</div>";
        $null_nip = "<div class='notif-body-danger'>NIP tidak ditemukan</div>";

        $model = $this->Rekap_model;

        $nip = $_POST['nip_jam'];
        $tanggal = $_POST['tanggal_jam'];
        $bulan = $_POST['bulan_jam'];
        $tahun = $_POST['tahun_jam'];
        $prodi = $_POST['prodi'];
        $tp = $_POST['tp'];
        $jam = $_POST['keterangan_jam'];

        $ubah_data = $model->ubah_absen_jam($nip, $prodi, $tp, $tanggal, $bulan, $tahun, $jam);
        // redirect('rekap');
        if ($ubah_data == 'null nip') {
            $this->session->set_flashdata('message', $null_nip);
            redirect('rekap');
        } else if ($ubah_data == 'null data') {
            $this->session->set_flashdata('message', $null_data);
            redirect('rekap');
        } else {
            $this->session->set_flashdata('message', $succes);
            redirect('rekap');
        }
    }

    public function ubah_absen_jam_praktek()
    {
        $succes = "<div class='notif-body'>Data berhasil diubah</div>";
        $null_data = "<div class='notif-body-danger'>Data yang anda masukkan belum pernah dimasukkan</div>";
        $null_nip = "<div class='notif-body-danger'>NIP tidak ditemukan</div>";

        $model = $this->Rekap_model;

        $nip = $_POST['nip_jam'];
        $tanggal = $_POST['tanggal_jam'];
        $prodi = $_POST['prodi'];
        $bulan = $_POST['bulan_jam'];
        $tahun = $_POST['tahun_jam'];
        $jam = $_POST['keterangan_jam'];

        $ubah_data = $model->ubah_absen_jam_praktek($nip, $prodi, $tanggal, $bulan, $tahun, $jam);
        // redirect('rekap');
        if ($ubah_data == 'null nip') {
            $this->session->set_flashdata('messagep', $null_nip);
            redirect('Absen_jam');
        } else if ($ubah_data == 'null data') {
            $this->session->set_flashdata('messagep', $null_data);
            redirect('Absen_jam');
        } else {
            $this->session->set_flashdata('messagep', $succes);
            redirect('Absen_jam');
        }
    }

    public function rekap_bulanan()
    {
        $model = $this->Rekap_model;
        $data['global'] = $this->Rekap_model;

        $data['data'] = $model->get_nama_pegawai();

        // var_dump($model->get_list_bulan());
        $this->load->view('sementara', $data);
    }



    public function ubah_data()
    {
        $model = $this->Rekap_model;
        // redirect('rekap');
        $id = (int) $_GET['id'];
        $nama = $_POST['nama'];
        $nip = $_POST['nip'];
        $golongan = $_POST['golongan'];
        $jabatan = $_POST['jabatan'];
        $tp = $_POST['tp'];

        // echo $nama;
        $berhasil = "<div class='notif-body'>Data berhasil diupdate</div>";
        $gagal = "<div class='notif-body-danger'>Data gagal diupdate</div>";
        $update = $model->ubah_data_pegawai($id, $nama, $nip, $golongan, $jabatan, $tp);

        if ($update == true) {
            $this->session->set_flashdata('ubah_data', $berhasil);
            redirect('rekap');
        } else {
            $this->session->set_flashdata('ubah_data', $gagal);
            redirect('rekap');
        }

        // echo $golongan;
        // var_dump($id_numb);
        // echo $id_numb + 3; // echo $_GET['nama'];
        // var_dump($_GET['nama']);
    }

    public function testing()
    {
        $model = $this->Rekap_model;

        // echo $model->gaji_kotor($id);
        $id = 25;
        $bulan = 'june';
        $tahun = 2022;
        $prodi = 'mbu';

        $str_jam_wajib = "SELECT total_jam FROM absen_jam_p WHERE id_pegawai='$id' AND bulan='$bulan' AND tahun='$tahun' AND prodi='$prodi'";
        $jam_wajib = $this->db->query($str_jam_wajib)->result();
        $total_jam_wajib = [];

        foreach ($jam_wajib as $list) :
            array_push($t, intval($list->total_jam));
        endforeach;
        // foreach ($jam_wajib as $list) :
        //     var_dump($list->id);
        //     echo "<br>";
        // endforeach;
        echo array_sum($total_jam_wajib);
        // var_dump($model->get_ket_perbulan(1));
    }

    public function detail($id)
    {
        $model = $this->Rekap_model;
        // echo $id;
        $data['data'] = $model->get_data_pegawai($id);
        $this->load->view('ubah_pegawai_view', $data);
    }

    public function hapus_pegawai($nip)
    {
        $model = $this->Rekap_model;
        // $model->hapus_absen_prodi_dan_jam($id);

        // $data = explode('%20', $nip);

        // $data_nip = [];
        // // echo $data[0];
        // foreach ($data as $data) :
        //     array_push($data_nip, $data);
        //     array_push($data_nip, ' ');
        // endforeach;

        // $real_data = '';
        // foreach ($data_nip as $data) :
        //     $real_data =+ $data;
        //     // echo $data;
        // endforeach;

        // echo $real_data;
        $model->hapus_pegawai($nip);
        redirect('rekap');
        // var_dump($data_nip);

    }

    public function rekap_detail()
    {
        $model = $this->Rekap_model;

        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $prodi = $_POST['prodi'];

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['prodi'] = $prodi;

        $rekap = $model->insert_rekap($prodi, $bulan, $tahun);
        // var_dump($rekap);
        if ($rekap == false) {
            $null_month = "<div class='notif-body-danger'>Tidak ditemukan data pada " . $prodi . ' bulan ' . $bulan . ' ' . $tahun . " </div>";
            $this->session->set_flashdata('message', $null_month);
            redirect('rekap');
        } else {
            // var_dump($rekap);
            $data['absen_terisi'] = $rekap;
            $data['global'] = $this->Rekap_model;
            $this->load->view('rekap_bulanan_view', $data);
        }
    }

    public function print_bulan($bulan_tahun)
    {
        $model = $this->Rekap_model;
        $data['global'] = $this->Rekap_model;
        $bulan_dan_tahun = explode('_', $bulan_tahun);
        // echo $bulan_dan_tahun[0] . ' ' . $bulan_dan_tahun[1];
        $bulan = $bulan_dan_tahun[0];
        $tahun = $bulan_dan_tahun[1];
        $prodi = $bulan_dan_tahun[2];
        // $prodi = $_POST['prodi'];
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['prodi'] = $prodi;

        $data['rekap_bulanan'] = $model->get_list_bulan_sebelumnya($bulan, $tahun);

        $rekap = $model->insert_rekap($prodi, $bulan, $tahun);
        $data['absen_terisi'] = $rekap;
        // echo 'ell ganteng';
        // var_dump($rekap);
        $this->load->view('print_rekap_bulanan', $data);
    }
}
