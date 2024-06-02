<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <link rel="stylesheet" href=<?= base_url("assets/css/rekap.css") ?>>
    <link rel="stylesheet" href=<?= base_url("assets/css/notification.css") ?>>
    <link rel="stylesheet" href=<?= base_url("assets/css/my_style.css") ?>>
    <!-- <link rel="stylesheet" href="assets/css/notification.css"> -->
    <style>
        tbody {
            background-color: rgb(206, 212, 255);
        }

        tbody tr:nth-child(even) {
            background-color: white;
        }
    </style>
</head>

<body>


    <div class="judul_aplikasi">
        <div class="logo">

            <img height="80px" src="<?php echo base_url('assets/img/logoapron.jpeg') ?>" alt="">
            <img height="80px" src="<?= base_url('assets/img/logojayapura.jpeg') ?>" alt="">
        </div>
        <h1><?= $judul_aplikasi ?></h1>
        <p><?= $nama_aplikasi ?></p>
    </div>
    <header class="header active">
        <div class="title">

            <h1><?= $title ?></h1>
            <?= $this->session->flashdata('message') ?>
            <?= $this->session->flashdata('ubah_data') ?>
            <!-- <span><?= $tanggal . '-' . $bulan . '-' . $tahun ?></span> -->
        </div>
        <div class="action">
            <button class="button btn-green" id="tampilkan-form">Tambah data</button>
            <button class="button btn-red"><a href="<?= base_url('login/logout') ?>">Keluar</a></button>
        </div>
    </header>
    <div class="body active">

        <!-- <h1>jancokk</h1> -->
        <table class="tabel-umum" border="collapse">

            <thead>
                <tr>
                    <th class="no" rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">NIP</th>
                    <th rowspan="2">T/P</th>
                    <th rowspan="2">Jabatan Akademik</th>
                    <th rowspan="2">Golongan</th>
                    <th colspan="6"><?= $bulan . ' ' . $tahun ?></th>
                </tr>
                <tr>
                    <!-- <th>Hadir</th> -->

                    <!-- <th>Kehadiran</th> -->
                    <th>Jam Ajar (T)</th>
                    <th>Jam Ajar (P)</th>
                    <th>Jam wajib</th>
                    <th>Honor Bruto</th>
                    <th>Pajak PPH 21</th>
                    <th>Honor Netto</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1;
                foreach ($nama as $list) : ?>
                    <tr>
                        <form action="Rekap/detail?id=<?= $list->id ?>" method="post">
                            <td class="no"><?= $no ?></td>
                            <td><?= $list->nama ?></td>
                            <td><?= $list->nip ?></td>
                            <td><?= $list->tp ?></td>
                            <td><?= $list->jabatan_akademik ?></td>
                            <td class="center"><?= $list->golongan ?></td>
                            <td class="center"> - </td>
                            <td class="center"> - </td>
                            <td class="center"> - </td>
                            <td class="center"> - </td>
                            <td class="center"> - </td>
                            <td class="center"> - </td>

                        </form>
                    </tr>
                <?php $no++;
                endforeach; ?>
            </tbody>
            <!-- <h1>apasih bgsat</h1> -->
        </table>

        <div class="change-button">
            <button class="button1 btn-save" id="ubah-absen-harian">Ubah Data Absen Harian</button>
            <button class="button1 btn-save" id="ubah-absen-jam">Ubah Data Jam Ngajar</button>
            <button class="button1 btn-save" id="ubah-data-pegawai">Ubah Data Pegawai</button>
            <button class="button1 btn-back" id="rekap_sebelumnya">Data rekap sebelumnya</button>
            <!-- <a href="rekap/cetak" class="button1 btn-back cetak">Cetak</a> -->
        </div>
    </div>



    <!-- ========= TAMBAH NAMA PEGAWAI BARU ========== -->
    <div id="tambah-data" class="containerdatabaru">

        <form class="databaru" action=<?php echo base_url('Rekap/tambah_data_baru') ?> method="post">
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
                <option>-- Jabtan --</option>
                <option value="Asisten Ahli">Asisten Ahli</option>
                <option value="Lektor">Lektor</option>
                <option value="Lektor Kepala">Lektor Kepala</option>
                <option value="Professor">Professor</option>
                <option value="Tenaga Pengajar">Tenaga Pengajar</option>
            </select>
            <select name="tp" id="tp-pegawai" class="input-form">
                <option value="T/P">Teori dan Praktek</option>
                <option value="T">Teori</option>
                <option value="P">Praktek</option>
            </select>
            <!-- <input type="option"> -->

            <input type="submit" value="Selesai" id="submit">
        </form>

        <!-- ========= END OF TAMBAH NAMA PEGAWAI BARU ========== -->

        <!-- =============== FORM UBAH DATA ABSEN HARIAN ==== -->
        <form class="form-ubah-absen-harian" action=<?php echo base_url('Rekap/ubah_absen_harian') ?> method="post">
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
                    <!-- <option value=>Hadri</option> -->
                </select>
            </div>
            <!-- <input type="option"> -->

            <input type="submit" value="Selesai" id="submit" class="btn-selesai btn-save">
        </form>
        <!-- =============== END OF FORM UBAH DATA ABSEN HARIAN ==== -->


        <!-- =============== FORM UBAH DATA ABSEN JAM ==== -->
        <form class="form-ubah-absen-jam" action=<?php echo base_url('Rekap/ubah_absen_jam') ?> method="post">
            <div class="header_ubah_absen_jam">
                <a class="close">x</a>
            </div>
            <h1>Ubah Absen Jam</h1>
            <!-- <label for="">Masukkan Nama Pegawai Baru</label> -->
            <input name="nip_jam" type="text" class="input-form" placeholder="masukkan NIP Pegawai">
            <div class="group-input">

                <input name="tanggal_jam" type="number" placeholder="Tanggal" class="input-ubah-data" value=<?php echo date('d') ?>>
                <select name="bulan_jam" id="" class="input-ubah-data">
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
                <input name="tahun_jam" type="text" placeholder="Tahun" class="input-ubah-data" value="<?php echo date('Y') ?>">
            </div>
            <div class="group-input">
                <select name="prodi" class="input-ubah-data">
                    <option value="tlb">TLB</option>
                    <option value="mbu">MBU</option>
                    <option value="mllu">MLLU</option>
                </select>
                <select name="tp" class="input-ubah-data">
                    <option value="absen_jam">teori</option>
                    <option value="absen_jam_p">praktek</option>
                </select>
                <input name="keterangan_jam" type="number" placeholder="Jam" class="input-ubah-data">

            </div>
            <!-- <input type="option"> -->

            <input type="submit" value="Selesai" class="btn-selesai btn-save">
        </form>
        <!-- =============== END OF FORM UBAH DATA ABSEN JAM ==== -->



        <!-- ========== CONTAINER LIST BULAN =========== -->
        <div class="container-list-bulan">
            <div class="header-list-bulan">
                <a class="close">x</a>
            </div>
            <form action="rekap/rekap_detail" method="post">
                <h2>Rekap Data Bulan Sebelumnya</h2>

                <hr>
                <div class="group-input">

                    <select name="bulan" class="bulan">
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
                    <input class="tahun" type="number" name="tahun" value="<?php echo $tahun ?>">
                    <select name="prodi" id="">
                        <option value="tlb">TLB</option>
                        <option value="mbu">MBU</option>
                        <option value="mllu">MLLU</option>
                    </select>
                    <!-- <input class="" type="number" name="prodi" value=""> -->
                </div>
                <input class="btn btn-save" type="submit" value="Submit">
            </form>


        </div>
        <!-- ========== END OF CONTAINER LIST BULAN =========== -->

        <!-- ========= FORM UBAH DATA PEGAWAI =========== -->
        <div class="container-ubah-data-pegawai">
            <div class="header-list-pegawai">
                <a class="close">x</a>
            </div>
            <h2>Daftar nama pegawai</h2>

            <?php foreach ($nama as $data) : ?>
                <hr><br>
                <div class="list-pegawai1">

                    <span><?= $data->nama ?></span>
                    <div class="action-pegawai">
                        <a class="btn btn-detail" href="<?php echo base_url('rekap/detail/') . $data->id ?>">Detail</a>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>



        <!-- ========= END OF FORM UBAH DATA PEGAWAI =========== -->
    </div>



    <!-- <script src="rekap.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="assets/script/rekap2.js"></script>
</body>

</html>