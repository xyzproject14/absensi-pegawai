<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("assets/css/ubah_data.css") ?>">
    <link rel="stylesh  eet" href="<?= base_url("assets/css/notification.css") ?>">
    <!-- <link rel="stylesh  eet" href="<?= base_url("assets/css/my_style.css") ?>"> -->
    <title>Document</title>
</head>

<body class="body">

    <div class="container">

        <div class="container-detail active">
            <h1>Ubah data pegawai</h1>

            <form action="<?= base_url('absensi/ubah_data?id=') ?><?php echo $data->id ?>" method="post">
                <!-- <form action="<?= base_url('absensi') ?>" method="post"> -->
                <table>
                    <tr>
                        <td><span>Nama</span></td>
                        <td> : </td>
                        <td><input name="nama" type="text" value="<?php echo $data->nama ?>"></td>
                    </tr>
                    <tr>
                        <td><span>NIP</span></td>
                        <td> : </td>
                        <td><input name="nip" type="text" value="<?php echo $data->nip ?>"></td>
                    </tr>
                    <tr>
                        <td><span>Golongan</span></td>
                        <td> : </td>
                        <td>
                            <select name="golongan" id="">
                                <option value="<?php echo $data->golongan ?>"><?= $data->golongan ?></option>
                                <option value="PTT">PTT</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><span>Jabatan</span></td>
                        <td> : </td>
                        <td>
                            <select name="jabatan" id="">
                                <option value="<?php echo $data->jabatan_akademik ?>"><?= $data->jabatan_akademik ?></option>
                                <option value="Asisten Ahli">Asisten ahli</option>
                                <option value="Lektor">Lektor</option>
                                <option value="Lektor Kepala">Lektor Kepala</option>
                                <option value="Professor">Professor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><span>P/T</span></td>
                        <td> : </td>
                        <td>
                            <select name="tp" id="">
                                <option value="<?php echo $data->tp ?>"><?= $data->tp ?></option>
                                <option value="T">T</option>
                                <option value="P">P</option>
                                <option value="T/P">T/P</option>
                            </select>
                        </td>
                    </tr>

                </table>
                <button type="button" class="action action-back"><a href="<?php echo base_url('absensi') ?>">Kembali</a></button>
                <button type="button" id="hapus-data" class="action action-hapus">Hapus</button>
                <input class="action action-save" type="submit" value="Ubah data">

                <div class="container-popup">

                    <div class="popup-hapus">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                        <button type="button" id="batal-hapus" class="action action-hapus">Batal</button>
                        <a class="action action-save action-oke" href="<?php echo base_url('absensi/hapus_pegawai/' . $data->nip) ?> ">Oke</a>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <script src="<?php echo base_url('assets/script/ubah_data.js') ?>"> </script>
</body>

</html>