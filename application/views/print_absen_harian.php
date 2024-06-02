<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/my_style.css') ?>">

    <style>
        tbody {
            background-color: rgb(206, 212, 255);
        }

        tbody tr:nth-child(even) {
            background-color: white;
        }
    </style>
    <!-- <title><?= $title ?></title> -->
    <title>ADMIN PEGAWAI</title>
</head>

<body>
    <div class="logo">
        <a href="<?php echo base_url('absensi') ?>">
            <img height="80px" src="<?php echo base_url('assets/img/logoapron.jpeg') ?>" alt="">
            <img height="80px" src="<?= base_url('assets/img/logojayapura.jpeg') ?>" alt="">
        </a>
    </div>

    <h1>Rekaptulasi absen pegawai</h1>
    <table border="1">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">Nip</th>
                <th rowspan="2">Golongan</th>
                <th rowspan="2">Jabatan</th>
                <th rowspan="2">T/P</th>
                <th colspan="<?php echo $jumlah_hari ?>"><?= $bulan . ' ' . $tahun ?></th>
                <th>Total Kehadiran</th>
            </tr>
            <tr>
                <?php for ($i = 0; $i < $jumlah_hari; $i++) { ?>
                    <th><?= $i + 1 ?></th>
                <?php } ?>
            </tr>
        </thead>

        <tbody>
            <?php $no = 1;
            foreach ($data as $data) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $global->get_data_id($data->id_pegawai)->nama ?></td>
                    <td><?= $global->get_data_id($data->id_pegawai)->nip ?></td>
                    <td><?= $global->get_data_id($data->id_pegawai)->golongan ?></td>
                    <td><?= $global->get_data_id($data->id_pegawai)->jabatan_akademik ?></td>
                    <td><?= $global->get_data_id($data->id_pegawai)->tp ?></td>

                    <?php for ($i = 0; $i < $jumlah_hari; $i++) { ?>
                        <td><?= $global->rekap($data->id_pegawai, $i + 1, $bulan, $tahun) ?></td>
                    <?php } ?>

                    <th class="td"><?= $global->total_jam($data->id_pegawai, $bulan, $tahun) ?></th>
                </tr>

            <?php endforeach; ?>
            <tr>
                <th colspan="6">Total Kehadiran</th>
                <?php for ($i = 0; $i < $jumlah_hari; $i++) {
                    $j = $i + 1 ?>
                    <th class="td"><?= $global->total_harian($j, $bulan, $tahun) ?></th>
                <?php } ?>
                <th><?= $global->total_keseluruhan($bulan, $tahun) ?></th>
            </tr>
        </tbody>
    </table>
    <div class="keterangan2">
        <h3><b>Keterangan :</b></h3>
        <ul>
            <li><small>1 : Hadir</small></li>
            <li><small>2 : Sakit</small></li>
            <li><small>3 : Dinas Luar</small></li>
            <li><small>4 : Cuti</small></li>
            <li><small>5 : Alfa/Tidak Hadir</small></li>
            <li><small>6 : Libur</small></li>

        </ul>
    </div>

    <div class="ttd">
        <div class="kiri">
            <p class="jabatan">Koordinator Umum dan Kerjasama</p>
            <p class="nama">Andi F. Peranginangin</p>
        </div>
        <div class="kanan">
            <div class="jabatan">Pengelola Kepegawaian</div>
            <div class="nama">Susy Cahyaningrum</div>
        </div>
    </div>


    <script>
        window.print();
    </script>
</body>

</html>