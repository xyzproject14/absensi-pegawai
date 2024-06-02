<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/my_style.css') ?>">
    <title>ADMIN AKADEMIK</title>
    <style>
        .myblue {
            background-color: rgb(206, 212, 255);
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
        <a href="<?php echo base_url('rekap') ?>">
            <img height="80px" src="<?php echo base_url('assets/img/logoapron.jpeg') ?>" alt="">
            <img height="80px" src="<?= base_url('assets/img/logojayapura.jpeg') ?>" alt="">
        </a>
    </div>
    <h1>Rekap data prodi <?php echo strtoupper($prodi) ?> bulan <?= $bulan . ' ' . $tahun ?> </h1>

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


    <div class="ttd">
        <div class="kiri">
            <p class="jabatan">Kepala Bagian Administrasi Akademik</p>
            <p class="nama">Syahrir Rasyid</p>
        </div>
        <div class="kanan">
            <div class="jabatan">Pengadminitrasi Akademik</div>
            <div class="nama">Ukkasyah Lubis</div>
        </div>
    </div>
    <script type="text/javascript">
        var td = document.getElementsByClassName("td");

        for (i = 0; i < td.length; i++) {
            if (i % 22 <= 10) {
                td[i].classList.add("myblue");
            }
        }
        window.print();
    </script>
</body>

</html>