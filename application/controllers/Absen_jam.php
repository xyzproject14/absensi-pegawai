<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absen_jam extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Jam_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $role_id = $this->session->userdata('role_id');
        if ($role_id == 2 || $role_id == 4 || $role_id == 5) {
            $prodi = '';
            if ($role_id == 2) {
                $this->session->set_userdata(['prodi' => 'tlb']);
            } elseif ($role_id == 4) {
                $this->session->set_userdata(['prodi' => 'mbu']);
                // $prodi = strtoupper($this->session->userdata('prodi'));
                // echo 'role 4';
            } elseif ($role_id == 5) {
                $this->session->set_userdata(['prodi' => 'mllu']);

                // echo 'role 5';
            }
            $prodi = strtoupper($this->session->userdata('prodi'));
            // echo $prodi;

            $data['judul_aplikasi'] = "APRON";
            $data['nama_aplikasi'] = "(Aplikasi Penyusunan Rekapitulasi Honor Dosen / Tenaga Pengajar)";

            $model = $this->Jam_model;
            // $data['model']
            $prodi = strtoupper($this->session->userdata('prodi'));
            $data['tanggal'] = $model->tanggal;
            $data['bulan'] = $model->bulan;
            $data['tahun'] = $model->tahun;
            $data['jumlah_hari'] = $model->jumlah_hari;
            $data['prodi'] = $prodi;

            $data['title'] = "ADMIN PRODI " . $prodi;
            $data['header'] = "Penginputan Jam Ngajar Prodi " . $prodi . "<br>Dosen/Tenaga Pengajar";
            $data['list_nama'] = $model->get_nama_pegawai();
            $data['umum'] = $model;

            $this->load->view('jam_view', $data);
        } else {
            redirect('login');
        }
    }

    public function isi_absen_jam()
    {
        $model = $this->Jam_model;

        $id = $_GET['name'];
        $jam = $_POST[$id];

        $succes = "<div class='notif-body'>Data berhasil ditambahkan</div>";
        // $belum_isi = "<div class='notif notif-body-danger' value='1'>Masih absen yang belum diisi<span>Hubungi admin untuk melakukan perubahan</span></div>";
        $sudah_isi = "<div class='notif notif-body-danger' value='1'>Anda sudah mengisi absen hari ini<span>Hubungi admin untuk melakukan perubahan</span></div>";


        if ($model->cek_data_double($id) == false) {
            $data['disable'] = "disabled";
            $model->isi_absen_jam($id, $jam);
            $this->session->set_flashdata('message', $succes);
            redirect('absen_jam', $data);
        } else {
            // $sudah_absen = "<div class='notif-body-danger' value='1'>Anda sudah mengisi absen hari ini</div>";
            $this->session->set_flashdata('message', $sudah_isi);
            redirect('absen_jam');
        }
        // echo $jam . ' dan ' . $id;
        // $this->load->view('jam_view');
    }

    public function show_absen_jam()
    {
        $role = $this->session->userdata('role_id');
        if ($role == 2) {
            $model = $this->Jam_model;
            $data['public'] = $this->Jam_model;
            // $data['id'] = $_GET['id'];
            $data['jumlah_hari'] = $model->jumlah_hari;
            $data['data'] = $model->get_data($_GET['id']);

            $this->load->view('isi_absen_jam', $data);
        } else {
            echo 'gak masuk pak eko';
            echo $role;
        }
    }

    public function isi_absen_prodi_teori()
    {
        $model = $this->Jam_model;
        $bulan_ini = $_POST['bulan'];
        $tahun_ini = $_POST['tahun'];
        $id = $_POST['id'];

        // echo $id;

        $model->isi_absen_teori($id, $bulan_ini, $tahun_ini);
        // echo $bulan_ini . $tahun_ini

        // echo $model->isi_absen_teori()->bulan;
        // echo $model->isi_absen_teori()->tahun;
    }

    public function show_absen_jam_praktek()
    {
        // echo 'ell nack pratek anjauy';
        $role = $this->session->userdata('role_id');
        if ($role == 2) {
            $model = $this->Jam_model;

            $data['public'] = $this->Jam_model;
            $data['jumlah_hari'] = $model->jumlah_hari;
            $data['data'] = $model->get_data($_GET['id']);

            $this->load->view('isi_absen_jam_p', $data);
        } else {
            echo 'gak masuk pak eko';
            echo $role;
        }
    }

    public function isi_absen_prodi_praktek()
    {
        $model = $this->Jam_model;
        $bulan_ini = $_POST['bulan'];
        $tahun_ini = $_POST['tahun'];
        $id = $_POST['id'];

        // echo $id;

        $model->isi_absen_praktek($id, $bulan_ini, $tahun_ini);
        // echo $bulan_ini . $tahun_ini

        // echo $model->isi_absen_teori()->bulan;
        // echo $model->isi_absen_teori()->tahun;
    }

    // ========= INSERT DATA ABSEN TEORI DAN PRAKTEK ========\

    public function isi_absen_bulanan()
    {

        $model = $this->Jam_model;

        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $prodi = $_POST['prodi'];
        $absen = $_POST['absen'];
        $id = $_POST['id'];

        $sudah_isi = "<div class='notif notif-body-danger' value='1'>" . $model->get_data($id)->nama . " sudah mengisi absen hari ini<span>Hubungi admin untuk melakukan perubahan</span></div>";

        $data['title'] = 'ADMIN PRODI';
        $data['keterangan'] = '';
        $data['absen'] = $absen;
        $data['prodi'] = $prodi;

        $post_absen = $_POST['absen'];
        if ($post_absen == 'absen_jam') {
            $data['keterangan'] = 'Absen Teori';
        } else {
            $data['keterangan'] = 'Absen Praktek';
        }

        $jumlah_hari = $model->jumlah_hari_2($bulan, $tahun);
        $data['jumlah_hari'] = $jumlah_hari;

        $data['data'] = $model->get_data($id);
        $data['id'] = $id;
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $validasi_jam = $model->validasi_jam($id, $prodi, $absen, $bulan, $tahun);

        if ($validasi_jam == null) {
            $data['validasi'] = $model->validasi($id, $bulan, $tahun);

            $this->load->view('isi_jam', $data);
        } else {
            // echo 'data sudah ada';
            $this->session->set_flashdata('message', $sudah_isi);
            redirect('Absen_jam');
        }
    }

    // public function insert_data_2()
    // {
    //     $absen = $_POST['absen'];

    //     $id = $_POST['id'];
    //     $tanggal = $_POST['id'];
    //     $bulan = $_POST['id'];
    //     $tahun = $_POST['id'];
    //     $jumlah_hari = $_POST['jumlah_hari'];
    //     $absen = $_POST['absen'];



    //     // $total_jam = $_POST['total_jam'];


    //     // $str = "INSERT INTO $absen (id_pegawai, tanggal, bulan, tahun, total_jam) VALUES ()";
    //     // echo $str;
    // }


    public function insert_data()
    {
        $model = $this->Jam_model;

        $prodi = $_POST['prodi'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $id = $_POST['id'];
        $jumlah_hari = $_POST['jumlah_hari'];
        $absen = $_POST['absen'];

        $model->insert_data($id, $prodi, $bulan, $tahun, $jumlah_hari);
        // $model->delete_data_nol($absen, $bulan, $tahun);
        $succes = "<div class='notif notif-body' value='1'>Pengisian absen sukses<span>Hubungi admin untuk melakukan perubahan</span></div>";

        $this->session->set_flashdata('message', $succes);
        redirect('absen_jam');
    }

    // ======  UNTUK MENCETAK DATA ABSEN DARI BULAN SEBELUMNYA =====
    public function cetak_bulan()
    {
        $model = $this->Jam_model;

        $absen = $_POST['absen'];
        $prodi = $_POST['prodi'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];

        $jumlah_hari = $model->jumlah_hari_2($bulan, $tahun);

        $data['global'] = $model;
        $data['jumlah_hari'] = $jumlah_hari;
        $data['title'] = 'ADMIN PRODI ' .  strtoupper($prodi);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['prodi'] = $prodi;
        $data['absen'] = $absen;

        if ($absen == "absen_jam") {
            $data['tp'] = 'Teori';
        } else {
            $data['tp'] = 'Praktek';
        }
        // $data['data'] = $model->cetak_bulan($prodi, $absen, $bulan, $tahun);
        $data['data'] = $model->id_absen($prodi, $absen, $bulan, $tahun);
        // echo $absen . ' dan ' . $prodi;

        $this->load->view("prodi/rekap_data_sebelumnya", $data);

        // $data = $model->total_jam(25, 'tlb', 'absen_jam', 'june', 2022);
        // foreach ($data as $data) :
        //     // echo $data->total_jam;
        //     // echo "<br>";
        //     $str = "SELECT * FROM absen_jam WHERE id = '$data->id'";
        //     $query = $this->db->query($str)->row();

        //     echo $query->total_jam;
        //     echo "<br>";
        // endforeach;
    }

    public function print_bulan()
    {
        // echo 'cetak ell ganteng';
        $model = $this->Jam_model;

        $absen = $_GET['absen'];
        $prodi = $_GET['prodi'];
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];

        $jumlah_hari = $model->jumlah_hari_2($bulan, $tahun);

        $data['global'] = $model;
        $data['jumlah_hari'] = $jumlah_hari;
        $data['title'] = 'ADMIN PRODI ' .  strtoupper($prodi);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;
        $data['prodi'] = $prodi;
        $data['absen'] = $absen;

        if ($absen == "absen_jam") {
            $data['tp'] = 'Teori';
        } else {
            $data['tp'] = 'Praktek';
        }

        if ($prodi == "TLB") {
            $data['nama'] = "Ridwan Berlianto";
            $data['jabatan'] = "Plt. Kaprodi TLB";
        } else if ($prodi == "MBU") {
            $data['nama'] = "Akilla Makanuay";
            $data['jabatan'] = "Kaprodi MBU";
        } else {
            $data['nama'] = "Hendrich Pramana Yudha";
            $data['jabatan'] = "Plt. Kaprodi MLLU";
        }

        // $data['data'] = $model->cetak_bulan($prodi, $absen, $bulan, $tahun);
        $data['data'] = $model->id_absen($prodi, $absen, $bulan, $tahun);
        // echo $absen . ' dan ' . $prodi;

        $this->load->view("prodi/print_rekap_bulanan", $data);
    }

    public function ubah_absen_jam()
    {
        // $this->session->set_userdata(['role_id' => 2]);
        $succes = "<div class='notif-body'>Data berhasil diubah</div>";
        $null_data = "<div class='notif-body-danger'>Data yang anda masukkan belum pernah dimasukkan</div>";
        $null_nip = "<div class='notif-body-danger'>NIP tidak ditemukan</div>";

        $model = $this->Jam_model;

        $nip = $_POST['nip_jam'];
        $tanggal = $_POST['tanggal_jam'];
        $bulan = $_POST['bulan_jam'];
        $tahun = $_POST['tahun_jam'];
        $prodi = $_POST['prodi'];
        // $tp = $_POST['tp'];
        $jam = $_POST['keterangan_jam'];

        $ubah_data = $model->ubah_absen_jam($nip, $prodi, $tanggal, $bulan, $tahun, $jam);
        // redirect('rekap');
        if ($ubah_data == 'null nip') {
            $this->session->set_flashdata('message', $null_nip);
            redirect('absen_jam');
        } else if ($ubah_data == 'null data') {
            $this->session->set_flashdata('message', $null_data);
            redirect('absen_jam');
        } else {
            $this->session->set_flashdata('message', $succes);
            redirect('absen_jam');
        }
    }

    public function ubah_absen_jam_praktek()
    {
        $succes = "<div class='notif-body'>Data berhasil diubah</div>";
        $null_data = "<div class='notif-body-danger'>Data yang anda masukkan belum pernah dimasukkan</div>";
        $null_nip = "<div class='notif-body-danger'>NIP tidak ditemukan</div>";

        $model = $this->Jam_model;

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
}
