<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/jam.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jam_isi.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/my_style.css') ?>">

    <title>ADMIN PRODI</title>
</head>

<body>
    <!-- <div class="header">
    </div> -->
    <div class="body">
        <form class="form" action="<?= base_url('absen_jam/isi_absen_prodi_teori') ?>" method="post">
            <h2><?= $data->nama ?></h2>
            <span>absen prodi (teori)</span><br><br>
            <select class="bulan-style" name="bulan" id="">
                <option value="<?php echo date('F') ?>" selected><?= date('F') ?></option>
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
            <input class="tahun-style" type="number" name="tahun" value="<?php echo date('Y') ?>">
            <input class="id-style" type="number" name="id" value="<?php echo $data->id ?>">
            <table>


                <?php for ($i = 0; $i < $jumlah_hari; $i++) { ?>
                    <tr>
                        <td>Tanggal <?= $i + 1 ?></td>
                        <td><input class="input-style" name=<?php echo $i + 1 ?> type="number" value=0></td>
                    </tr>
                <?php } ?>
            </table>
            <a class="button1 kembali" href="<?= base_url('absen_jam') ?>">kembali</a>
            <input class="button1 btn-save" type="submit">
        </form>
    </div>
</body>

</html>