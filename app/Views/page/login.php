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

        <?php if (session()->getFlashdata('error')) : ?>
            <h5 style="color: red;"><?= session()->getFlashdata('error') ?></h5>
        <?php endif; ?>

        <form action="/home/auth" method="post">
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password" style="font-weight: bold; font-size: 20px; padding: 20px;">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-block btn-danger" style="font-weight: bold; font-size: 20px;">MASUK</button>
        </form>
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