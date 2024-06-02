<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/my_style.css') ?>">

    <title><?= $title ?></title>
    <style>
        a {
            text-decoration: none;
        }

        tbody {
            background-color: rgb(206, 212, 255);
        }

        tbody tr:nth-child(even) {
            background-color: white;
        }
    </style>
</head>

<body>
    <!-- <h1>Data sebelumnya</h1> -->
    <div class="logo">

        <img height="80px" src="<?php echo base_url('assets/img/logoapron.jpeg') ?>" alt="">
        <img height="80px" src="<?= base_url('assets/img/logojayapura.jpeg') ?>" alt="">
    </div>
    <h1>Rekaptulasi absen ( <?= $tp ?> ) prodi <?= $prodi ?></h1>
    <form action="<?php echo base_url('absen_jam/print_bulan') ?>" method="get">
        <input type="text" name="absen" value="<?php echo $absen ?>" style="display: none;">
        <input type="text" name="prodi" value="<?php echo $prodi ?>" style="display: none;">
        <input type="text" name="bulan" value="<?php echo $bulan ?>" style="display: none;">
        <input type="text" name="tahun" value="<?php echo $tahun ?>" style="display: none;">
        <input type="text" name="jumlah_hari" value="<?php echo $jumlah_hari ?>" style="display: none;">
        <input type="text" name="tahun" value="<?php echo $tahun ?>" style="display: none;">
        <table border="1">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Nama</th>
                    <th rowspan="2">Jabatan</th>
                    <th rowspan="2">Golongan</th>
                    <th colspan="<?php echo $jumlah_hari ?>"><?= $bulan . ' ' . $tahun ?></th>
                    <th rowspan="2">Total</th>
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
                        <td><?= $global->get_data($data->id_pegawai)->nama ?></td>
                        <td><?= $global->get_data($data->id_pegawai)->jabatan_akademik ?></td>
                        <td><?= $global->get_data($data->id_pegawai)->golongan ?></td>

                        <?php for ($i = 0; $i < $jumlah_hari; $i++) {
                            $j = $i + 1; ?>

                            <td><?= $global->data_tanggal($data->id_pegawai, $prodi, $absen, $j, $bulan, $tahun); ?></td>
                        <?php } ?>
                        <th><?= $global->total_jam($data->id_pegawai, $prodi, $absen, $bulan, $tahun) ?></th>
                    </tr>

                <?php endforeach; ?>

                <tr>
                    <th colspan="4">Total</th>

                    <?php for ($i = 0; $i < $jumlah_hari; $i++) {
                        $j = $i + 1; ?>

                        <th><?= $global->total_harian($prodi, $absen, $j, $bulan, $tahun); ?></th>
                    <?php } ?>
                    <th><?= $global->total_keseluruhan($prodi, $absen, $bulan, $tahun) ?></th>
                </tr>
            </tbody>
        </table>

        <a class="btn btn-back" href="<?php echo base_url('absen_jam') ?>">Kembali</a>
        <!-- <a class="btn btn-save" href="<?php echo base_url('absen_jam/print_bulan') ?>">Print</a> -->
        <input type="submit" class="btn btn-save" value="Print">
    </form>

</body>

</html>