<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/my_style.css') ?>">

    <title><?= $title ?></title>
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

        <a href="<?php echo base_url('absen_jam') ?>">
            <img height="80px" src="<?php echo base_url('assets/img/logoapron.jpeg') ?>" alt="">
            <img height="80px" src="<?= base_url('assets/img/logojayapura.jpeg') ?>" alt="">
        </a>
    </div>
    <h1>Rekaptulasi absen ( <?= $tp ?> ) prodi <?= $prodi ?></h1>
    <!-- <h1>Data sebelumnya</h1> -->
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
                <th><?= $global->total_keseluruhan($prodi, $absen, $bulan, $tahun); ?></th>
            </tr>
        </tbody>
    </table>

    <div class="ttd">
        <div class="kanan-prodi">
            <p class="jabatan"><?= $jabatan ?></p>
            <p class="tulisan"><b>TTD</b></p>
            <p class="nama"><?= $nama ?></p>
        </div>
    </div>
    <script>
        window.print();
    </script>



</body>

</html>