<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/my_style.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/notification.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/isi_absen_bulanan.css') ?>">
    <title><?= $title ?></title>

</head>

<body>

    <form action="<?php echo base_url('absen_jam/insert_data') ?>" class="container" method="post">

        <h2><?= $data->nama ?></h2>
        <span><?= $keterangan . ' ' . $bulan . ' ' . $tahun ?></span>
        <div class="action-button">
            <input type="text" name="prodi" value="<?php echo $prodi ?>" style="display: none;">
            <input type="number" name="jumlah_hari" value="<?php echo $jumlah_hari ?>" style="display:none">
            <input type="text" name="nama" value="<?php echo $data->nama ?>" style='display:none'>
            <input type="number" name="id" value="<?php echo $data->id ?>" style='display:none'>
            <input type="text" name="absen" value="<?php echo $absen ?>" style='display:none'>
            <select class="input-style bulan-style" name="bulan" style='display:none'>
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
            <input name="tahun" class="input-style tahun-style" type="number" value="<?php echo $tahun ?>" style='display:none'>
        </div>
        <table>
            <tr>
                <th>Tanggal</th>
                <th>Teori</th>
                <th>Praktek</th>
                <th>Jam wajib</th>
            </tr>
            <?php

            for ($i = 0; $i < $jumlah_hari; $i++) {
                $undisable = false; ?>
                <tr>

                    <?php foreach ($validasi as $data) :
                        if ($i + 1 == $data->tanggal) {
                            $undisable = true;
                        } ?>

                    <?php endforeach; ?>

                    <?php if ($undisable == true) { ?>
                        <td>Tanggal <?= $i + 1 ?></td>
                        <td><input class="input-style" name=<?php echo ($i + 1) . "t" ?> type="number" value=0></td>
                        <td><input class="input-style" name=<?php echo ($i + 1) . "p" ?> type="number" value=0></td>
                        <td><input class="input-style" name=<?php echo ($i + 1) . "j" ?> type="number" value=0></td>
                    <?php } else { ?>
                        <td class="tidak-mengisi">Tanggal <?= $i + 1 ?></td>
                        <td><input class="input-style" type="number" value=0 disabled></td>
                        <td><input class="input-style" type="number" value=0 disabled></td>
                        <td><input class="input-style" name=<?php echo ($i + 1) . "j" ?> type="number" value=0></td>
                        <td><input class="input-style" name=<?php echo $i + 1 . "t" ?> type="number" value=0 style="display:none ;"></td>
                        <td><input class="input-style" name=<?php echo $i + 1 . "p" ?> type="number" value=0 style="display:none ;"></td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </table>

        <div class="action-button">
            <a class="btn kembali" href="<?php echo base_url('absen_jam') ?>">Batalkan</a>
            <input type="submit" value="Isi Jam Ngajar" class="btn btn-save">
        </div>
    </form>

</body>

</html>