<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/rekap_bulanan.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/rekap.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/notification.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/my_style.css') ?>">
    <title>Bulan <?= $bulan ?></title>
    <style>
        * {
            font-family: 'Poppins';
        }

        .bisque {
            background-color: rgb(206, 212, 255);
        }

        td,
        th {
            padding: 5px;
        }

        table {
            /* border-collapse: collapse; */
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
            margin-bottom: 1rem;
        }

        button {
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 10px;
            cursor: pointer;
            font-weight: bold;
            background-color: rgb(116, 192, 255);
        }

        a {
            /* re */
            /* color: rgb(20, 0, 173); */
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
    <div class="logo">

        <img height="80px" src="<?php echo base_url('assets/img/logoapron.jpeg') ?>" alt="">
        <img height="80px" src="<?= base_url('assets/img/logojayapura.jpeg') ?>" alt="">
    </div>
    <h1>Rekap data prodi <?= strtoupper($prodi) . ' bulan ' . $bulan . ' ' . $tahun ?></h1>
    <!-- <input type="text" name="prodi" value="<?php echo $prodi ?>"> -->
    <table border="1">
        <thead>
            <tr>
                <th class="no" rowspan="2">No</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">NIP</th>
                <th rowspan="2">T/P</th>
                <th rowspan="2">Jabatan</th>
                <th rowspan="2">Golongan</th>
                <!-- <th colspan="5">Kehadiran</th> -->
                <th colspan="6"><?= $bulan . ' ' . $tahun ?></th>
                <!-- <th colspan="2">Jam Mengajar</th> -->
            </tr>
            <tr>
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
            foreach ($absen_terisi as $data) : ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $global->get_data_rekap($data, $prodi, $bulan, $tahun)['nama']; ?></td>
                    <td><?= $global->get_data_rekap($data, $prodi, $bulan, $tahun)['nip']; ?></td>
                    <td><?= $global->get_data_rekap($data, $prodi, $bulan, $tahun)['tp']; ?></td>
                    <td><?= $global->get_data_rekap($data, $prodi, $bulan, $tahun)['jabatan']; ?></td>
                    <td><?= $global->get_data_rekap($data, $prodi, $bulan, $tahun)['golongan']; ?></td>
                    <td><?= $global->get_data_rekap($data, $prodi, $bulan, $tahun)['jam_prodi']; ?></td>
                    <td><?= $global->get_data_rekap($data, $prodi, $bulan, $tahun)['jam_praktek']; ?></td>
                    <td><?= $global->get_data_rekap($data, $prodi, $bulan, $tahun)['jam_wajib']; ?></td>
                    <td><?= $global->rupiah($global->get_data_rekap($data, $prodi, $bulan, $tahun)['gaji_kotor']); ?></td>
                    <td><?= $global->rupiah($global->get_data_rekap($data, $prodi, $bulan, $tahun)['potongan']); ?></td>
                    <td><?= $global->rupiah($global->get_data_rekap($data, $prodi, $bulan, $tahun)['honor']); ?></td>
                </tr>
            <?php $no++;
            endforeach; ?>
        </tbody>
    </table>

    <a href="<?php echo base_url('rekap') ?>" class="button1 btn-save">Kembali</a>
    <a href="<?php echo base_url('rekap/print_bulan/') . $bulan . '_' . $tahun . '_' . $prodi ?>" class="button1 btn-back cetak">Cetak</a>

    <script>
        var td = document.getElementsByClassName("td");

        for (i = 0; i < td.length; i++) {
            if (i % 22 <= 10) {
                td[i].classList.add("bisque");
            }
        }
    </script>

</body>

</html>