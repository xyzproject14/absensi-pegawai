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

    <form action="<?php echo base_url('absensi/insert_data') ?>" class="container" method="post">

        <h2><?= $nama->nama ?></h2>
        <span><?= $bulan . ' ' . $tahun ?></span>
        <div class="action-button">
            <input type="text" name="nama" value="<?php echo $nama->nama ?>" style='display:none'>
            <input type="number" name="id" value="<?php echo $nama->id ?>" style='display:none'>
            <input type="number" name="jumlah_hari" value="<?php echo $jumlah_hari ?>" style='display:none'>
            <input type="text" name="bulan" value="<?php echo $bulan ?>" style="display:none ;">
            <input name="tahun" classs="input-style tahun-style" type="number" value="<?php echo $tahun ?>" style="display:none">
        </div>
        <table>
            <?php for ($i = 0; $i < $jumlah_hari; $i++) { ?>
                <tr>
                    <td>Tanggal <?= $i + 1 ?></td>
                    <td>
                        <select name="<?php echo $i + 1 ?>" id="">
                            <option value=1 selected>Hadir</option>
                            <option value=2>Sakit</option>
                            <option value=3>Dinas Luar</option>
                            <option value=4>Cuti</option>
                            <option value=5>Alfa</option>
                            <option value=6>Libur</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <div class="action-button">
            <a class="btn kembali" href="<?php echo base_url('absensi') ?>">Batalkan</a>
            <input type="submit" value="Isi absen" class="btn btn-save">
        </div>
    </form>

</body>

</html>