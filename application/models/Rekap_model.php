<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_model extends CI_Model
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

    public function get_nama_pegawai()
    {
        $str = "SELECT * FROM data_pegawai";
        $list_nama = $this->db->query($str)->result();
        return $list_nama;
    }

    public function get_total_kehadiran($id, $prodi, $bulan, $tahun)
    {
        // ====== GET ABSEN HARIAN =======
        $str_kehadiran = "SELECT * FROM absen_harian WHERE bulan='$this->bulan' AND id_pegawai='$id' AND keterangan=1";
        $kehadiran = $this->db->query($str_kehadiran)->result();

        // ====== GET ABSEN JAM TEORI =======
        $str_jam_ajar = "SELECT total_jam FROM absen_jam WHERE id_pegawai='$id' AND bulan='$bulan' AND tahun='$tahun' AND prodi='$prodi'";
        $jam_ajar = $this->db->query($str_jam_ajar)->result();
        $total_jam_ajar = [];
        foreach ($jam_ajar as $list) :
            array_push($total_jam_ajar, $list->total_jam);
        endforeach;

        // ====== GET ABSEN JAM PRAKTEK =======
        $str_jam_ajar_p = "SELECT total_jam FROM absen_jam_p WHERE id_pegawai='$id' AND bulan='$bulan' AND tahun='$tahun' AND prodi='$prodi'";
        $jam_ajar_p = $this->db->query($str_jam_ajar_p)->result();
        $total_jam_ajar_p = [];

        foreach ($jam_ajar_p as $list) :
            array_push($total_jam_ajar_p, $list->total_jam);
        endforeach;

        // ====== GET ABSEN JAM WAJIB=======
        $str_jam_wajib = "SELECT jam_wajib FROM absen_jam_p WHERE id_pegawai='$id' AND bulan='$bulan' AND tahun='$tahun' AND prodi='$prodi'";
        $jam_wajib = $this->db->query($str_jam_wajib)->result();
        $total_jam_wajib = [];

        foreach ($jam_wajib as $list) :
            array_push($total_jam_wajib, $list->jam_wajib);
        endforeach;

        return ['kehadiran' => count($kehadiran), 'jam_teori' => array_sum($total_jam_ajar), 'jam_praktek' => array_sum($total_jam_ajar_p), 'jam_wajib' => array_sum($total_jam_wajib)];
    }

    public function total_gaji()
    {
        // Ambil data bulan terakhir
        $str = "SELECT bulan FROM absensi_tanggal_terpisah ORDER BY bulan DESC";
        $bulan_terakhir = $this->db->query($str)->row();

        if ($this->bulan == $bulan_terakhir->bulan) {
        } else {
            return $bulan_terakhir->bulan . $this->bulan;
        }
    }

    // ========== TAMBAH DATA BARU ============
    public function validasi_data($nip)
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

    public function cek_data_kosong($nama, $nip, $jabatan, $golongan, $tp)
    {
        // ===== FLASH DATA =====
        $succes = "<div class='notif-body'>Data baru berhasil ditambahkan</div>";
        $null_data = "<div class='notif-body-danger'>Data yang anda masukkan belum pernah dimasukkan</div>";
        $null_nip = "<div class='notif-body-danger'>Harap mengisi semua kolom yang telah disediakan!!</div>";
        $double_nip = "<div class='notif notif-body-danger'>" . $nip . " sudah digunakan oleh pegawai lain <span>nip tidak boleh sama</span></div>";


        if ($nama !== '' && $nip !== '' && $golongan !== '' && $tp !== '' && $jabatan !== '') {

            $data = $this->validasi_data($nip);

            if ($data !== null) {
                // return 'data sudah ada';
                $this->session->set_flashdata('message', $double_nip);
                redirect('rekap');
            } else {
                // return 'data belum ada';
                // var_dump($nip);
                // echo $nip;
                $this->tambah_data_baru($nama, $nip, $jabatan, $golongan, $tp);
                $this->session->set_flashdata('message', $succes);
                redirect('rekap');
            }
        } else {
            $this->session->set_flashdata('message', $null_nip);
            redirect('rekap');
            // return '<br>ada data yang kosong';
        }
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

    public function ubah_absen_jam($nip, $prodi, $tp, $tanggal, $bulan, $tahun, $jam)
    {
        $str_cek_nip = "SELECT * FROM data_pegawai WHERE nip='$nip'";
        $cek_nip = $this->db->query($str_cek_nip)->row();
        if ($cek_nip !== null) {

            $str_cek_data = "SELECT * FROM $tp WHERE id_pegawai='$cek_nip->id' AND prodi='$prodi' AND tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun'";
            $cek_data = $this->db->query($str_cek_data)->row();

            if ($cek_data !== null) {
                $str_update_jam = "UPDATE $tp SET total_jam='$jam' WHERE id_pegawai='$cek_nip->id'  AND prodi='$prodi' AND tanggal='$tanggal' AND bulan='$bulan' AND tahun='$tahun'";
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

    public function get_total_kehadiran_perbulan($id, $bulan, $tahun)
    {
        $str = "SELECT * FROM absen_harian WHERE keterangan=1 AND bulan='$bulan' AND tahun='$tahun' AND id_pegawai='$id'";
        $data_harian = $this->db->query($str)->result();
        $total_kehadiran =  count($data_harian);
        // if($data_harian->keterangan == 1){

        $arr_total_jam = [];
        $str2 = "SELECT * FROM absen_jam WHERE bulan='$bulan' AND tahun='$tahun' AND id_pegawai='$id'";
        $data_perjam = $this->db->query($str2)->result();
        foreach ($data_perjam as $data) :
            array_push($arr_total_jam, $data->total_jam);
        endforeach;
        $total_jam = array_sum($arr_total_jam);

        return [$total_kehadiran, $total_jam];

        // }
    }

    public function get_ket_perbulan($id, $bulan, $tahun)
    {
        $str = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND keterangan=2 AND bulan='$bulan' AND tahun='$tahun'";
        $sakit = count($this->db->query($str)->result());

        $str2 = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND keterangan=3 AND bulan='$bulan' AND tahun='$tahun'";
        $izin = count($this->db->query($str2)->result());

        $str3 = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND keterangan=4 AND bulan='$bulan' AND tahun='$tahun'";
        $cuti = count($this->db->query($str3)->result());

        $str4 = "SELECT * FROM absen_harian WHERE id_pegawai='$id' AND keterangan=5 AND bulan='$bulan' AND tahun='$tahun'";
        $alfa = count($this->db->query($str4)->result());

        return ['sakit' => $sakit, 'izin' => $izin, 'cuti' => $cuti, 'alfa' => $alfa];
    }

    // public function gaji_tp()
    public function gaji_bersih_input($id, $prodi, $golongan, $bulan, $tahun)
    {
        $absen_jam = $this->get_total_kehadiran_perbulan($id, $bulan, $tahun)[1];
        $gaji_kotor = $this->gaji_kotor($id, $prodi, $bulan, $tahun);

        if ($golongan == '4') {
            $potongan = ($gaji_kotor * 15) / 100;
            $gaji_bersih = $gaji_kotor - $potongan;
            return [$potongan, $gaji_bersih];
        } else if ($golongan == '2') {
            $potongan = 0;
            $gaji_bersih = $gaji_kotor - $potongan;
            return [$potongan, $gaji_bersih];
        } else {
            $potongan = ($gaji_kotor * 5) / 100;
            $gaji_bersih = $gaji_kotor - $potongan;
            return [$potongan, $gaji_bersih];

            // echo 'ini golongan 4 <br>';
        }
    }

    // ====== INI DIJADIKAN KOMENTAR KARENA BERUBAH KONSEP HUHU =====

    // public function rekap_auto()
    // {
    //     $str = "SELECT * FROM absen_harian ORDER BY id DESC";
    //     // MENGAMBIL DATA BULAN DAN TAHUN TERAKHIR DI DATABASE
    //     $month_query = $this->db->query($str)->row();

    //     $data_pegawai = $this->get_nama_pegawai();

    //     // echo $data_bulan
    //     // memeriksa bulan terakhir dalam database
    //     if ($month_query->bulan . $month_query->tahun !== $this->bulan . $this->tahun) {

    //         foreach ($data_pegawai as $data) :

    //             $potongan = $this->gaji_bersih_input($data->id, $data->golongan, $month_query->bulan, $month_query->tahun)[0];
    //             $gaji_bersih = $this->gaji_bersih_input($data->id, $data->golongan, $month_query->bulan, $month_query->tahun)[1];
    //             $total_kehadiran = $this->get_total_kehadiran_perbulan($data->id, $month_query->bulan, $month_query->tahun)[0];
    //             $total_jam = $this->get_total_kehadiran_perbulan($data->id, $month_query->bulan, $month_query->tahun)[1];
    //             $sakit = $this->get_ket_perbulan($data->id, $month_query->bulan, $month_query->tahun)['sakit'];
    //             $izin = $this->get_ket_perbulan($data->id, $month_query->bulan, $month_query->tahun)['izin'];
    //             $cuti = $this->get_ket_perbulan($data->id, $month_query->bulan, $month_query->tahun)['cuti'];
    //             $alfa = $this->get_ket_perbulan($data->id, $month_query->bulan, $month_query->tahun)['alfa'];

    //             $str_insert_auto = "INSERT INTO rekap_bulanan 
    //                             (id_pegawai, nama, nip, golongan, kehadiran, sakit, izin, cuti, alfa, jam_ajar, potongan, gaji, bulan, tahun) VALUES
    //                             ('$data->id', '$data->nama', '$data->nip', '$data->golongan', '$total_kehadiran', '$sakit', '$izin', '$cuti', '$alfa', '$total_jam', '$potongan', '$gaji_bersih', '$month_query->bulan', '$month_query->tahun')";

    //             $this->db->query($str_insert_auto);
    //         endforeach;
    //     }
    // }

    public function get_list_bulan()
    {
        $str = "SELECT * FROM rekap_bulanan ORDER BY id DESC";
        $kalender = $this->db->query($str)->result();
        // return $kalender;
        $temp = 'ell ganteng';
        $list_bulan = [];

        foreach ($kalender as $kalender) :
            if ($kalender->bulan . $kalender->tahun !== $temp) {
                $temp = $kalender->bulan . $kalender->tahun;
                array_push($list_bulan, [$kalender->bulan, $kalender->tahun]);
            }
        endforeach;

        return $list_bulan;
    }

    public function get_list_bulan_sebelumnya($bulan, $tahun)
    {
        $str = "SELECT * FROM rekap_bulanan WHERE bulan='$bulan' AND tahun='$tahun'";
        $data_bulan = $this->db->query($str)->result();
        return $data_bulan;
    }

    public function rupiah($angka)
    {

        $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
        return $hasil_rupiah;
    }

    public function get_data_pegawai($id)
    {
        $str = "SELECT * FROM data_pegawai WHERE id='$id'";
        $data = $this->db->query($str)->row();

        return $data;
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

        // $str = "DELETE FROM absen_harian"

        // redirect('rekap');
    }

    public function gaji_kotor($id, $prodi, $bulan, $tahun)
    {
        $str = "SELECT * FROM data_pegawai WHERE id='$id'";
        $data = $this->db->query($str)->row();

        $jabatan = $data->jabatan_akademik;

        $kehadiran = $this->get_total_kehadiran($id, $prodi, $bulan, $tahun)['jam_teori'] + $this->get_total_kehadiran($id, $prodi, $bulan, $tahun)['jam_praktek'] - $this->get_total_kehadiran($id, $prodi, $bulan, $tahun)['jam_wajib'];

        $gaji = 0;

        if ($jabatan == 'Asisten Ahli' || $jabatan == 'Tenaga Pengajar') {
            // echo 'anda lektor';
            $gaji = 150000;
        } elseif ($jabatan == 'Lektor') {
            $gaji = 200000;
        } elseif ($jabatan == 'Lektor Kepala') {
            $gaji = 250000;
        } elseif ($jabatan == 'Professor') {
            $gaji = 300000;
        }

        return $kehadiran * $gaji;
    }

    // ===== MENGECEK APAKAH BULAN + TAHUN SUDAH ADA DATANA =====
    public function cek_bulan($prodi, $bulan, $tahun)
    {
        $str = "SELECT * FROM absen_jam WHERE prodi='$prodi' AND bulan='$bulan' AND tahun='$tahun'";
        $absen_teori = $this->db->query($str)->row();

        $str2 = "SELECT * FROM absen_jam_p WHERE prodi='$prodi' AND bulan='$bulan' AND tahun='$tahun'";
        $absen_praktek = $this->db->query($str2)->row();

        if ($absen_teori !== null || $absen_praktek !== null) {
            return true;
        } else {
            return false;
        }
    }
    // ======  MEMASUKKAN DATA SETELAH DI CEK KALAU DATA PADA BULAN + TAHUN TERSEBUT BELUM ADA DI DATABASE ======
    public function insert_rekap($prodi, $bulan, $tahun)
    {
        $data = $this->cek_bulan($prodi, $bulan, $tahun);

        if ($data == true) {
            // echo 'silahkan absen';
            $str = "SELECT DISTINCT id_pegawai FROM absen_jam WHERE prodi='$prodi' AND bulan='$bulan' AND tahun='$tahun'";
            $data = $this->db->query($str)->result();

            $str2 = "SELECT DISTINCT id_pegawai FROM absen_jam_p WHERE prodi='$prodi' AND bulan='$bulan' AND tahun='$tahun'";
            $data2 = $this->db->query($str2)->result();

            $absen_terisi = [];

            foreach ($data as $data) :
                array_push($absen_terisi, $data->id_pegawai);
            endforeach;

            foreach ($data2 as $data2) :
                $kembar = false;

                foreach ($absen_terisi as $absen) :
                    if ($absen == $data2->id_pegawai) {
                        $kembar = true;
                        // echo $data2->id_pegawai;
                    }

                endforeach;

                if ($kembar == false) {
                    array_push($absen_terisi, $data2->id_pegawai);
                }
            endforeach;

            return $absen_terisi;
            // foreach($absen_prodi as $list)
        } else {
            return false;
        }
    }

    public function get_data_rekap($id, $prodi, $bulan, $tahun)
    {
        $validasi = $this->get_data_pegawai($id);

        if ($validasi == null) {

            $nama = " - ";
            $nip = " - ";
            $tp = " - ";
            $jabatan = " - ";
            $golongan = " - ";

            $jam_prodi = " - ";
            $jam_praktek = " - ";

            $gaji_kotor = " - ";

            $potongan = " - ";
            $honor = " - ";
        } else {

            $nama = $this->get_data_pegawai($id)->nama;
            $nip = $this->get_data_pegawai($id)->nip;
            $tp = $this->get_data_pegawai($id)->tp;
            $jabatan = $this->get_data_pegawai($id)->jabatan_akademik;
            $golongan = $this->get_data_pegawai($id)->golongan;

            $jam_prodi = $this->get_total_kehadiran($id, $prodi,  $bulan, $tahun)['jam_teori'];
            $jam_praktek = $this->get_total_kehadiran($id, $prodi, $bulan, $tahun)['jam_praktek'];
            $jam_wajib = $this->get_total_kehadiran($id, $prodi, $bulan, $tahun)['jam_wajib'];

            $gaji_kotor = $this->gaji_kotor($id, $prodi, $bulan, $tahun);

            $potongan = $this->gaji_bersih_input($id, $prodi, $golongan, $bulan, $tahun)[0];
            $honor = $this->gaji_bersih_input($id, $prodi, $golongan, $bulan, $tahun)[1];
        }

        return [
            'nama' => $nama,
            'nip' => $nip,
            'tp' => $tp,
            'jabatan' => $jabatan,
            'golongan' => $golongan,
            'jam_prodi' => $jam_prodi,
            'jam_praktek' => $jam_praktek,
            'jam_wajib' => $jam_wajib,
            'gaji_kotor' => $gaji_kotor,
            'potongan' => $potongan,
            'honor' => $honor,
        ];
    }
}
