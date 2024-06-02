<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet"> -->

    <!-- === MY CSS STYLE === -->
    <link rel="stylesheet" href=<?= base_url("assets/css/jam.css") ?>>
    <link rel="stylesheet" href=<?= base_url("assets/css/my_style.css") ?>>
    <link rel="stylesheet" href=<?= base_url("assets/css/notification.css") ?>>

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

    <div class="body active">
        <div class="header">
            <div class="title">
                <h2><?= $header ?></h2>
                <?= $this->session->flashdata('message') ?>
            </div>

            <div class="button-group">
                <button id="isi_jam" class="btn-green">Input (T)</button>
                <button id="keluar" class="btn-red"><a href="<?= base_url('login/logout') ?>">Keluar</a></button>
            </div>
        </div>


        <!-- ====== TAMPILKAN DATA =====-->
        <div class="cover">

            <table border="collapse" class="my-table">
                <!-- <h3>Tabel jam mengajar TEORI prodi <?= $prodi ?></h3> -->
                <thead>

                    <?php $no = 1; ?>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">NIP</th>
                        <th rowspan="2">Golongan</th>
                        <th colspan="<?= $jumlah_hari ?>"><?= $bulan . ' ' . $tahun ?></th>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i < $jumlah_hari + 1; $i++) { ?>
                            <th><?= $i ?></th>
                        <?php } ?>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($list_nama as $list) : ?>
                        <tr>
                            <td class="td"><?= $no ?></td>
                            <td class="td"><?= $list->nama ?></td>
                            <td class="td"><?= $list->nip ?></td>
                            <td class="td center"><?= $list->golongan ?></td>
                            <?php for ($i = 1; $i < $jumlah_hari + 1; $i++) {
                                $nama =  $list->id . "_" . $i . $bulan . $tahun ?>
                                <td class="td">-</td>
                            <?php } ?>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
    
    
            </table>
        </div>
        <div class="button-group bottom">

            <button class="button1 btn-save" id="ubah-absen-jam">Ubah Data Jam Prodi Teori</button>
            <button class="button1 btn-save" id="cetak-absen-jam">Tampilkan Rekaptulasi Sebelumnya</button>

        </div>

        <!-- ====== FORM ISI ABSEN TEORI ===== -->
        <div id="container-jam" class="container-jam">
            <div class="form-absen">
                <form class="isi_absen" action="<?php echo base_url('absen_jam/isi_absen_bulanan') ?>" method="post">

                    <div class="keterangan">
                        <div class="ket-kiri">
                            <h3>Absen Teori</h3>
                            <div>
                                <input type="text" name="prodi" value="<?php echo $prodi ?>" style="display: none;">
                                <input type="text" name="absen" value="absen_jam" style="display: none;">
                                <select class="input-style bulan-style" name="bulan">
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
                    <hr>

                    <select class="input-style name-style" name="id">
                        <?php foreach ($list_nama as $data) : ?>
                            <option value="<?php echo $data->id ?>"><?= $data->nama ?></option>
                        <?php endforeach; ?>
                    </select>

                    <div class="btn-forms action-button">
                        <a id="tutup-form" class="btn btn-back">Kembali</a>
                        <input type="submit" class="btn btn-save">
                    </div>
                </form>
            </div>
        </div>

        <br>

        <!-- ================== ABSEN PRAKTEK ==================== -->
        <div class="header">
            <div class="title">
                <?= $this->session->flashdata('messagep') ?>
            </div>

        </div>

        <div class="cover">

            <table border="collapse" class="my-table">
                <h3>Tabel jam mengajar PRAKTEK prodi <?= $prodi ?></h3>
    
                <?php $no = 1; ?>
                <thead>
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">NIP</th>
                        <th rowspan="2">Golongan</th>
                        <th colspan="<?= $jumlah_hari ?>"><?= $bulan . ' ' . $tahun ?></th>
                    </tr>
                    <tr>
                        <?php for ($i = 1; $i < $jumlah_hari + 1; $i++) { ?>
                            <th><?= $i ?></th>
                        <?php } ?>
                    </tr>
                </thead>
    
                <tbody>
                    <?php foreach ($list_nama as $list) : ?>
                        <tr>
                            <td class="td"><?= $no ?></td>
                            <td class="td"><?= $list->nama ?></td>
                            <td class="td"><?= $list->nip ?></td>
                            <td class="td center"><?= $list->golongan ?></td>
                            <?php for ($i = 1; $i < $jumlah_hari + 1; $i++) {
                                $nama =  $list->id . "_" . $i . $bulan . $tahun ?>
    
                                <td class="td">-</td>
                            <?php } ?>
                        </tr>
                    <?php $no++;
                    endforeach; ?>
                </tbody>
    
            </table>
        </div>

        <div class="button-group bottom">

            <button class="button1 btn-save" id="ubah-absen-jam-praktek">Ubah Data Jam Prodi Praktek</button>
            <button class="button1 btn-save" id="tampilkan-absen-jam-praktek">Tampilkan Rekaptulasi Sebelumnya</button>
        </div>

    </div>


    <!-- ====== FORM ISI ABSEN PERAKTEK ===== -->
    <div id="container-jam" class="container-jam">
        <div class="form-absen">
            <form class="isi_absen" action="<?php echo base_url('absen_jam/isi_absen_bulanan') ?>" method="post">

                <div class="keterangan">
                    <div class="ket-kiri">
                        <h3>Absen Praktek</h3>
                        <div>
                            <input type="text" name="prodi" value="<?php echo $prodi ?>" style="display: none;">
                            <input type="text" value="absen_jam_p" name="absen" style="display: none;">
                            <select class="input-style bulan-style" name="bulan">
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
                <hr>

                <select class="input-style name-style" name="id">
                    <?php foreach ($list_nama as $data) : ?>
                        <option value="<?php echo $data->id ?>"><?= $data->nama ?></option>
                    <?php endforeach; ?>
                </select>

                <div class="btn-forms action-button">
                    <a id="tutup-form-p" class="btn btn-back">Kembali</a>
                    <input type="submit" class="btn btn-save">
                </div>
            </form>
        </div>
    </div>

    <br>
    <!-- <button class="button" id="ell" onclick="disable(ell)">ell</button><br>
    <button class="button" id="marsya" onclick="disable(marsya)">marsya</button> -->


    <!-- ========== FORM UBAH JAM TEORI ============  -->
    <div id="tambah-data" class="containerdatabaru">

        <form class="form-ubah-absen-jam" action=<?php echo base_url('absen_jam/ubah_absen_jam') ?> method="post">
            <div class="header_ubah_absen_jam">
                <a class="close">x</a>
            </div>
            <div class="header-form">
                <h1>Ubah Absen Teori (Prodi)</h1>
            </div>
            <!-- <input type="text" value="teori" > -->
            <!-- <label for="">Masukkan Nama Pegawai Baru</label> -->
            <input name="nip_jam" type="text" class="input-form" placeholder="masukkan NIP Pegawai">
            <div class="group-input">

                <input type="text" name="prodi" value="<?php echo $prodi ?>" style="display: none;">
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
                <input name="keterangan_jam" type="number" placeholder="Jam" class="input-ubah-data">
            </div>
            <!-- <input type="option"> -->

            <input type="submit" value="Selesai" class="btn-selesai btn-save">
        </form>

    </div>
    <!-- =========== END OF FORM UBAH JAM TEORI ========= -->



    <div id="tambah-data" class="containerdatabaru">

        <!-- =============== FORM UBAH DATA ABSEN JAM PRAKTEK ==== -->
        <form class="form-ubah-absen-jam" action=<?php echo base_url('absen_jam/ubah_absen_jam_praktek') ?> method="post">
            <div class="header_ubah_absen_jam">
                <a class="close">x</a>
            </div>
            <div class="header-form">

                <h1>Ubah Absen Prodi (Praktek)</h1>
            </div>
            <!-- <label for="">Masukkan Nama Pegawai Baru</label> -->
            <input name="nip_jam" type="text" class="input-form" placeholder="masukkan NIP Pegawai">
            <div class="group-input">

                <input type="text" name="prodi" value="<?php echo $prodi ?>" style="display: none;">
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
                </select> <input name="tahun_jam" type="text" placeholder="Tahun" class="input-ubah-data" value="<?php echo date('Y') ?>">
                <input name="keterangan_jam" type="number" placeholder="Jam" class="input-ubah-data">
            </div>
            <!-- <input type="option"> -->

            <input type="submit" value="Selesai" class="btn-selesai btn-save">
        </form>

    </div>
    <!-- =============== END OF FORM UBAH DATA ABSEN JAM PRAKTEK ==== -->


    <!-- ========= MENAMPILKAN DATA ABSEN BULAN SEBELUMNYA (TEORI) ========= -->

    <div class="container-data-sebelumnya">

        <form action=<?php echo base_url("absen_jam/cetak_bulan") ?> method="post">
            <div class="header_ubah_absen_jam">
                <a class="close">x</a>
            </div>

            <h3>Rekap data bulan sebelumnya</h3>

            <input style="display: none;" type="text" name="absen" value="absen_jam">
            <input style="display: none;" type="text" name="prodi" value="<?php echo $prodi ?>">
            <div class="group-input">

                <select class="input-style-2" name="bulan">
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
                <input name="tahun" class="input-style-2" type="number" value="<?php echo $tahun ?>">

            </div>
            <input class="btn btn-save" type="submit" value="cari">
        </form>
    </div>
    <!-- ========= END OF MENAMPILKAN DATA ABSEN BULAN SEBELUMNYA (TEORI) ========= -->


    <!-- ========= MENAMPILKAN DATA ABSEN BULAN SEBELUMNYA (PRAKTEK) ========= -->

    <div class="container-data-sebelumnya">

        <form action="absen_jam/cetak_bulan" method="post">
            <div class="header_ubah_absen_jam">
                <a class="close">x</a>
            </div>
            <h3>Rekap data bulan sebelumnya</h3>

            <input style="display: none;" type="text" name="absen" value="absen_jam_p">
            <input style="display: none;" type="text" name="prodi" value="<?php echo $prodi ?>">
            <div class="group-input">

                <select class="input-style-2" name="bulan">
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
                <input name="tahun" class="input-style-2" type="number" value="<?php echo $tahun ?>">

            </div>
            <input class="btn btn-save" type="submit" value="cari">
        </form>
    </div>
    <!-- ========= END OF MENAMPILKAN DATA ABSEN BULAN SEBELUMNYA (PRAKTEK) ========= -->



    <script src="<?php echo base_url('assets/script/jam.js') ?>">
    </script>
</body>

</html>