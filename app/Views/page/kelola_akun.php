<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- ======= MainContent -->
<section class="content" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-12 col-md-7 py-3" style="border-right: 2px solid grey;">
                <div class="col-sm-12 col-md-12 d-flex align-items-center justify-content-between mb-2">
                    <div class="col-md-5 d-flex justify-content-start align-items-center">
                        <a href="/" class="far fa-arrow-alt-circle-left fa-3x" style="color: black;"></a>
                        <h1 style="font-weight: bold; font-size: 25px; margin: 0px;">&nbsp;&nbsp;Daftar Akun</h1>
                    </div>
                    <div class="col-md-7 align-items-center">
                        <h1 class="text-right" style="color: black; font-size: 20px; margin: 0px;">Percetakan DETUDE</h1>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Jl. dr. Sam Ratulangi - Satria 1 No. 44</h2>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Kedaton Bandar Lampung</h2>
                    </div>
                </div>
                <div class="card card-<?= session()->getFlashdata('success') ? 'success' : 'light'; ?> mb-2" style="height: 83vh;">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size: 20px; font-weight: bold; <?= session()->getFlashdata('success') ? 'color: white;' : 'color: grey;'; ?>">
                            <?= session()->getFlashdata('success') ? session()->getFlashdata('success') : 'Semua Akun'; ?>
                        </h3>
                    </div>

                    <div class="card-body" style="margin-top: -60px;">
                        <table id="listUser" class="display">
                            <thead>
                                <tr class="text-center">
                                    <th style="width: 30%; font-size: 20px; font-weight: 600;">Password</th>
                                    <th style="width: 30%; font-size: 20px; font-weight: 600;">Jabatan</th>
                                    <th style="width: 30%; font-size: 20px; font-weight: 600;">Nama</th>
                                    <th style="width: 10%; font-size: 20px; font-weight: 600;">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for ($i = 0; $i < count($user); $i++) : ?>
                                    <tr>
                                        <td style="font-size: 20px; font-weight: 600;"><?= $user[$i]['password']; ?></td>
                                        <td style="font-size: 20px; font-weight: 600;"><?= $user[$i]['role']; ?></td>
                                        <td style="font-size: 20px; font-weight: 600;"><?= $user[$i]['nama_user']; ?></td>
                                        <td class="text-center">
                                            <a type="button" class="fas fa-trash-alt fa-2x" data-toggle="modal" data-target="#modal-sm" data-id="<?= $user[$i]['id']; ?>" style="color: red;"></a>
                                        </td>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ======= ModalDelete ======= -->
            <div class="modal fade" id="modal-sm">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Konfirmasi</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Yakin menghapus akun?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <a type="button" class="btn btn-danger" id="btnDelete">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" col-sm-12 col-md-5 mt-3">
                <div class="card card-light" style="height: 80vh;">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size: 20px; font-weight: bold; color: grey;">Tambah Akun</h3>
                    </div>

                    <div class="card-body">
                        <form action="/home/insertuser" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="password" class="col-md-12 col-form-label" style="font-size: 30px; font-weight:600;">Password</label>
                                        <div class="col-md-12 d-flex align-items-center input-group flex-wrap">
                                            <input type="text" class="form-control" id="password" name="password" required style="font-size: 30px; font-weight:600; padding: 25px;">
                                            <div class="invalid-feedback d-block">
                                                <?= session()->getFlashdata('error') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_user" class="col-md-12 col-form-label" style="font-size: 30px; font-weight:600;">Nama User</label>
                                        <div class="col-md-12 d-flex align-items-center">
                                            <input type="text" class="form-control" id="nama_user" name="nama_user" required style="font-size: 30px; font-weight:600; padding: 25px;">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="role" class="col-md-12 col-form-label" style="font-size: 30px; font-weight:600;">Jabatan</label>
                                        <div class="col-md-12 d-flex align-items-center">
                                            <select class="form-control" id="role" name="role" required style="font-size: 30px; height: 50px;">
                                                <option value="" disabled selected>Pilih Jabatan</option>
                                                <option value="supervisor">Supervisor</option>
                                                <option value="admin">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>

                    <div class="card-footer" style="padding: 10px 30px;">
                        <button type="submit" class="btn btn-danger w-100" style="font-weight: bold; font-size: 25px; padding: 5px 30px; border-radius: 10px;">TAMBAH</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>