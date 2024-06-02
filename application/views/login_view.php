<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("assets/css/my_style.css") ?>">
    <!-- <link rel="stylesheet" href="<?= base_url("assets/css/notification.css") ?>"> -->
    <link rel="stylesheet" href="<?= base_url("assets/css/login.css") ?>">
    <title>Login</title>
</head>

<body class="body">
    <div class="container">
        <form action="<?= base_url('login/login') ?>" method="post">
            <center>
                <div class="logo">

                    <img height="80px" src="<?= base_url('assets/img/logojayapura.jpeg') ?>" alt="">
                    <img height="70px" src="<?php echo base_url('assets/img/logoapron.jpg') ?>" alt="">
                </div>
                <!-- <h1>APRON</h1>
                <span>(Aplikasi Penyusunan Rekapitulasi Honor Dosen / Tenaga Pengajar)</span> -->
                <h2>LOGIN</h2>
            </center>
            <?= $this->session->flashdata('message') ?>
            <div class="input-group">
                <label for="">Email</label>
                <input class="input" name="email" type="email" placeholder="@gmail.com">
            </div>
            <div class="input-group">
                <label for="">Password</label>
                <input class="input" name="password" type="password">
            </div>
            <input class="btn btn-save submit-but" type="submit" value="Login">
        </form>
    </div>
</body>

</html>