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
                        <h1 style="font-weight: bold; font-size: 25px; margin: 0px;">&nbsp;&nbsp;Daftar Produk</h1>
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
                            <?= session()->getFlashdata('success') ? session()->getFlashdata('success') : 'Semua Produk'; ?>
                        </h3>
                    </div>

                    <div class="card-body" style="margin-top: -60px;">
                        <form action="/home/updatebarang" method="POST">
                            <table id="listBarang" class="display">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%; font-size: 20px; font-weight: 600; padding: 10px 18px 10px 10px;">Kode</th>
                                        <th style="width: 50%; font-size: 20px; font-weight: 600;">Nama</th>
                                        <th style="width: 40%; font-size: 20px; font-weight: 600;">Harga</th>
                                        <th style="width: 5%; font-size: 20px; font-weight: 600;">Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i = 0; $i < count($barang); $i++) : ?>
                                        <tr>
                                            <th style="background-color: grey; color: white; font-size: 30px;" class="text-center"><?= $barang[$i]['kode_barang']; ?></td>
                                            <td style="font-size: 20px; font-weight: 600;"><?= $barang[$i]['nama_barang']; ?></td>
                                            <td>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="rp">Rp</span>
                                                    </div>
                                                    <input type="text" class="form-control" placeholder="10000" value="<?= $barang[$i]['harga_barang']; ?>" onkeypress="return /^[0-9]*$/i.test(event.key)" aria-describedby="rp" name="harga_barang[]" required style="font-size: 20px; font-weight:600;">
                                                    <input type="hidden" value="<?= $barang[$i]['id']; ?>" name="id[]">
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <a type="button" class="fas fa-trash-alt fa-2x" data-toggle="modal" data-target="#modal-sm" data-id="<?= $barang[$i]['id']; ?>" style="color: red;"></a>
                                            </td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                            </table>
                    </div>

                    <div class="card-footer" style="padding: 10px 30px;">
                        <button type="submit" class="btn btn-danger w-100" style="font-weight: bold; font-size: 25px; padding: 5px 30px; border-radius: 10px;">SIMPAN</button>
                        </form>
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
                            <p>Yakin menghapus barang?</p>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <a type="button" class="btn btn-danger" id="btnDelete">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" col-sm-12 col-md-5 mt-3">
                <div class="card card-light" style="height: 75vh;">
                    <div class="card-header">
                        <h3 class="card-title" style="font-size: 20px; font-weight: bold; color: grey;">Tambah Produk</h3>
                    </div>

                    <div class="card-body">
                        <form action="/home/insertbarang" method="POST">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label for="kode_barang" class="col-md-3 col-form-label" style="font-size: 30px; font-weight:600;">Kode</label>
                                        <div class="col-md-4 d-flex align-items-center input-group flex-wrap">
                                            <input type="text" class="form-control" id="kode_barang" placeholder="AK" maxlength="2" name="kode_barang" required style="font-size: 30px; font-weight:600; padding: 25px;">
                                            <div class="invalid-feedback d-block">
                                                <?= session()->getFlashdata('error') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama_barang" class="col-md-12 col-form-label" style="font-size: 30px; font-weight:600;">Nama Barang</label>
                                        <div class="col-md-12 d-flex align-items-center">
                                            <input type="text" class="form-control" id="nama_barang" placeholder="Name Tag" name="nama_barang" required style="font-size: 30px; font-weight:600; padding: 25px;">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="satuan" style="font-size: 30px; font-weight:600;">Satuan</label>
                                            <input type="text" class="form-control" id="satuan" placeholder="pcs" name="satuan" required style="font-size: 30px; font-weight:600; padding: 25px;">
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="harga_barang" style="font-size: 30px; font-weight:600;">Harga Jual</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="rp" style="font-size: 25px; font-weight:600;">Rp</span>
                                                </div>
                                                <input type="text" class="form-control" placeholder="10000" id="harga_barang" onkeypress="return /^[0-9]*$/i.test(event.key)" aria-describedby="rp" name="harga_barang" reuqired style="font-size: 30px; font-weight:600; padding: 25px;">
                                            </div>
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