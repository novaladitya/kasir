<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Percetakan DETUDE</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            Percetakan <b>DETUDE</b>
        </div>

        <h5 style="font-weight: bold; font-size: 25px;">Selamat Datang</h5>
        <h5 style="font-weight: bold; font-size: 22px; color: grey;"><?= session()->get('nama_user'); ?></h5>
        <hr style="margin: 0px 0px 16px 0px;">
        <h5 style="font-weight: bold; font-size: 25px;">Anda Masuk Aplikasi Sebagai</h5>
        <h5 style="font-weight: bold; font-size: 22px; color: grey;"><?= ucfirst(session()->get('role')); ?></h5>
        <hr style="margin: 0px 0px 16px 0px;">
        <h5 style="font-weight: bold; font-size: 25px;">Persediaan kas</h5>
        <h5 style="font-weight: bold; font-size: 22px; color: grey;">Rp.&nbsp;<?= number_format($kas); ?></h5>
        <hr style="margin: 0px 0px 16px 0px;">
        <a href="/" class="btn btn-block btn-danger" style="font-weight: bold; font-size: 20px;">LANJUT</a>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
</body>

</html>