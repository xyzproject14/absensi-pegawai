<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/my_style.css') ?>">


    <!-- <title><?= $title ?></title> -->
    <title>ADMIN PEGAWAI</title>
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
    <div class="logo">

        <img height="80px" src="<?php echo base_url('assets/img/logoapron.jpeg') ?>" alt="">
        <img height="80px" src="<?= base_url('assets/img/logojayapura.jpeg') ?>" alt="">
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
                <th rowspan="2">Total Kehadiran</th>
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
                    <td class="td"><?= $no++ ?></td>
                    <td class="td"><?= $global->get_data_id($data->id_pegawai)->nama ?></td>
                    <td class="td"><?= $global->get_data_id($data->id_pegawai)->nip ?></td>
                    <td class="td"><?= $global->get_data_id($data->id_pegawai)->golongan ?></td>
                    <td class="td"><?= $global->get_data_id($data->id_pegawai)->jabatan_akademik ?></td>
                    <td class="td"><?= $global->get_data_id($data->id_pegawai)->tp ?></td>

                    <?php for ($i = 0; $i < $jumlah_hari; $i++) { ?>
                        <td class="td"><?= $global->rekap($data->id_pegawai, $i + 1, $bulan, $tahun) ?></td>
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



    <div class="action-button">
        <form action="<?= base_url('absensi/print_absen') ?>" method="get">
            <input type="text" name="bulan" value="<?php echo $bulan ?>" style="display: none;">
            <input type="text" name="tahun" value="<?php echo $tahun ?>" style="display: none;">
            <a class="btn kembali" href="<?= base_url('absensi') ?>">Kembali</a>
            <input type="submit" class="btn btn-save" value="print">
        </form>
    </div>


    <!--  -->
</body>

</html>