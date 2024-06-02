<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="stylesheet" href=<?php echo base_url("assets/css/notification.css") ?> type="text/css">
    <link rel="stylesheet" href=<?php echo base_url("assets/css/page_absensi.css") ?> type="text/css">
    <link rel=" stylesheet" href=<?php echo base_url("assets/css/my_style.css") ?> type="text/css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

</head>

<body>
    <!-- <td class="tanggal"></td> -->
    <div class="judul_aplikasi">
        <div class="logo">

            <img height="80px" src="<?php echo base_url('assets/img/logoapron.jpeg') ?>" alt="">
            <img height="80px" src="<?= base_url('assets/img/logojayapura.jpeg') ?>" alt="">
        </div>
        <h1><?= $judul_aplikasi ?></h1>
        <p><?= $nama_aplikasi ?></p>
    </div>

    <div class="header active">
        <div class="header-kiri ">
            <h2 class="title-header"><?= $header ?></h2>
            <?= $this->session->flashdata('message') ?>
            <span id="tanggal"></span>
        </div>

        <div class="action-button">
            <button class="button bg-green" id="btn_form_absen">Isi Absen</button>
            <button class="button bg-red" id="log_out"><a href="<?= base_url('login/logout') ?>">Keluar</a></button>
        </div>
    </div>


    <!-- =========== FORM ISI ABSENSI PEGAWAI ========== -->
    <!-- <button id="tampilkan_form_absen">Tampilkan</button> -->
    <!-- <div class="container" id="container"></div> -->
    <div class="containerisiabsen">
        <div class="container_form" id="container_form">
            <form class="isi_absen" action="absensi/isi_absen_bulanan" method="post" id="form_absen">

                <div class="keterangan">
                    <div class="ket-kiri">
                        <h3>Daftar Nama Pegawai</h3>

                        <select class="input-style name-style" name="id">
                            <?php foreach ($list_absen as $data) : ?>
                                <option value="<?php echo $data['id'] ?>"><?= $data['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <hr>
                        <div>
                            <select class="input-style bulan-style" name="bulan" id="">
                                <option selected><?= $bulan ?></option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="June">June</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                            <input name="tahun" class="input-style tahun-style" type="number" value="<?php echo $tahun ?>">

                        </div>
                    </div>

                </div>

                <div class="btn-forms">
                    <a id="kembali" class="btn btn-back">Kembali</a>
                    <input type="submit" class="btn btn-save">
                </div>
            </form>
        </div>
    </div>
    <!-- =========== END OF FORM ISI ABSENSI PEGAWAI ========== -->

    <!-- ============ NEW ABSENSI TABLE ========== -->
    <table class="body active">

        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Nama Pegawai</th>
            <th rowspan="2">Nip</th>
            <th rowspan="2">Jabatan</th>
            <th colspan="<?= $jumlah_hari ?>"><?= $bulan . ' ' . $tahun ?></th>
        </tr>
        <tr>
            <?php for ($i = 1; $i < $jumlah_hari + 1; $i++) { ?>
                <th><?= $i ?></th>
            <?php } ?>
        </tr>

        <?php $no = 1;
        foreach ($nama2 as $list) : ?>
            <tr>
                <td class="td"><?= $no ?></td>
                <td class="td tabel-nama"><?= $list->nama ?></td>
                <td class="td"><?= $list->nip ?></td>
                <td class="td center"><?= $list->jabatan_akademik ?></td>

                <?php for ($i = 1; $i < $jumlah_hari + 1; $i++) {

                    $nama =  $list->id . "_" . $i . $bulan . $tahun;

                    if ($global->isi_otomatis($list->id, $i) == $nama) { ?>
                        <td class="td td2"><?= $global->get_keterangan($list->id, $i) ?></td>
                    <?php } else { ?>
                        <td class="td td2">-</td>
                    <?php } ?>
                <?php } ?>
            </tr>
        <?php $no++;
        endforeach; ?>
    </table>

    <div class="footer active">

        <div class="keterangan">
            <h3><b>Keterangan :</b></h3>
            <ul>
                <li><small>H : Hadir</small></li>
                <li><small>S : Sakit</small></li>
                <li><small>D : Dinas Luar</small></li>
                <li><small>C : Cuti</small></li>
                <li><small>A : Alfa/Tidak Hadir</small></li>
                <li><small>6 : Libur</small></li>

            </ul>
        </div>

        <button class="button btn-save" id="rekap-data-absen-harian">Rekap data sebelumnya</button>
        <button class="button btn-save" id="ubah-absen-harian">Ubah Data Absen Harian</button>
        <button class="button btn-save" id="ubah-data-pegawai">Ubah data pegawai</button>
        <button class="button btn-save" id="tambah-databaru">Tambah Data Baru</button>
    </div>


    <div id="tambah-data" class="containerdatabaru">

        <!-- =============== FORM UBAH DATA ABSEN HARIAN ==== -->
        <form class="form-ubah-absen-harian" action=<?php echo base_url('absensi/ubah_absen_harian') ?> method="post">
            <div class="header_ubah_absen_harian">
                <a class="close">x</a>
            </div>
            <h1>Ubah Absen Harian</h1>
            <!-- <label for="">Masukkan Nama Pegawai Baru</label> -->
            <input name="nip_harian" type="text" class="input-form" placeholder="masukkan NIP Pegawai">
            <div class="group-input">

                <input name="tanggal_harian" type="number" placeholder="Tanggal" class="input-ubah-data" value=<?php echo date('d') ?>>
                <!-- <input name="bulan_harian" type="text" placeholder="Bulan" class="input-ubah-data" value=<?php echo date('F') ?>> -->
                <select name="bulan_harian" id="" class="input-ubah-data">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <input name="tahun_harian" type="text" placeholder="Tahun" class="input-ubah-data" value="<?php echo date('Y') ?>">
                <select name="keterangan_harian" id="" class="input-ubah-data">
                    <option value=1>Hadir</option>
                    <option value=2>Sakit</option>
                    <option value=3>Dinas Luar</option>
                    <option value=4>Cuti</option>
                    <option value=5>Alfa</option>
                    <option value=6>Libur</option>
                    <!-- <option value=>Hadri</option> -->
                </select>
            </div>
            <!-- <input type="option"> -->

            <input type="submit" value="Selesai" id="submit" class="btn-selesai btn-save">
        </form>
    </div>
    <!-- =============== END OF FORM UBAH DATA ABSEN HARIAN ==== -->


    <!-- =============== TAMBAHKAN DATABARU PEGAWAI ========= -->
    <div class="containertambahdata">

        <form action="<?php echo base_url('absensi/tambah_data_baru') ?>" method="post" class="form-tambahdata">
            <div class="header_tambah_data">
                <a class="close">x</a>
            </div>
            <h1>Tambah data</h1>
            <!-- <label for="">Masukkan Nama Pegawai Baru</label> -->
            <input type="text" name="nama" id="nama-pegawai" class="input-form" placeholder="Nama pegawai baru">
            <input type="text" name="nip" id="nip-pegawai" class="input-form" placeholder="NIP">
            <!-- <input type="text" name="golongan" id="golongan-pegawai" class="input-form" placeholder="Golongan"> -->
            <!-- <span>Golongan</span> -->
            <select name="golongan" id="golongan-pegawai" class="input-form">
                <option>-- Golongan --</option>
                <option value="PTT">PTT</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
            <select name="jabatan" id="jabatan-pegawai" class="input-form">
                <option>-- Jabatan --</option>
                <option value="Asisten Ahli">Asisten Ahli</option>
                <option value="Lektor">Lektor</option>
                <option value="Lektor Kepala">Lektor Kepala</option>
                <option value="Professor">Professor</option>
                <option value="Tenaga Pengajar">Tenaga Pengajar</option>
            </select>
            <select name="tp" id="tp-pegawai" class="input-form" style="display:none;">
                <option value="T/P">Teori dan Praktek</option>
                <option value="T">Teori</option>
                <option value="P">Praktek</option>
            </select>
            <!-- <input type="option"> -->

            <input type="submit" value="Selesai" id="btn-tambah">
        </form>

    </div>

    <!-- ===========    REKAP DATA SEBELUMNYA   ========= -->
    <div class="rekap-data-pegawai">

        <form action="<?php echo base_url('absensi/rekap') ?>" class="form-rekap" method="post">
            <div class="header_tambah_data">
                <a class="close">x</a>
            </div>
            <h4>Rekap data bulan sebelumnya</h4>
            <hr>
            <div class="input-rekap">
                <select name="bulan" class="input-form">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <input class="input-form tahun-rekap" type="number" name="tahun" value="<?php echo $tahun ?>">
            </div>
            <input class="button btn-save" type="submit" value="Tampilkan">
        </form>
    </div>

    <!-- ========== UBAH DATA PEGAWAI ========= -->
    <div class="main-container-ubah-data">
        <div class="container-ubah-data-pegawai">
            <div class="header-list-pegawai">
                <a class="close">x</a>
            </div>
            <h2>Daftar nama pegawai</h2>

            <?php foreach ($nama2 as $data) : ?>
                <hr><br>
                <div class="list-pegawai1">

                    <span><?= $data->nama ?></span>
                    <div class="action-pegawai">
                        <a class="btn btn-detail" href="<?php echo base_url('absensi/detail/') . $data->id ?>">Detail</a>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
    <script src="assets/script/absensi.js"></script>
    <!-- <script src="assets/script/absensi2.js"></script> -->
    <script src="assets/script/actionbutton.js"></script>

    <!-- <div class='notif-body'>Data berhasil ditambahkan</div>
    <div class='test-notif' value='1'>Masih ada data yang belum diisi
        <span>Hubungi admin untuk melakukan perubahan</span>
    </div>
    <div class='notif-body-danger' value='1'>Anda sudah mengisi absen hari ini</div> -->
</body>

</html>