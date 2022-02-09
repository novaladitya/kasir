<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= MainContent -->
<section class="content" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-12 py-3">
                <div class="col-sm-12 col-md-12 d-flex align-items-center justify-content-between mb-2">
                    <div class="col-md-5 d-flex justify-content-start align-items-center">
                        <a class="fas fa-bars fa-2x" data-widget="pushmenu" href="#" role="button" style="color: black;"></a>
                        <h1 style="font-weight: bold; font-size: 25px; margin: 0px;">&nbsp;&nbsp;Riwayat Transaksi</h1>
                    </div>
                    <div class="col-md-7 align-items-center">
                        <h1 class="text-right" style="color: black; font-size: 20px; margin: 0px;">Percetakan DETUDE</h1>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Jl. dr. Sam Ratulangi - Satria 1 No. 44</h2>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Kedaton Bandar Lampung</h2>
                    </div>
                </div>
                <hr>
                <div class="col-sm-12 col-md-12 d-flex align-items-center justify-content-center">
                    <button class="btn btn-outline-light" id="datepicker" style="color: black; font-size: 25px; font-weight: bold; border-color: grey; height: 60px; width: 800px; border-radius: 10px;">
                        <?= $tanggal; ?>
                        <img src="<?= base_url(); ?>/assets/img/kalender.png" style="width: 70px; margin-left: 60px;">
                    </button>
                    <form action="/riwayattransaksi" id="tanggal" method="post">
                        <input type="hidden" id="inputTanggal" name="inputTanggal">
                    </form>
                </div>
                <hr>
                <div class="col-sm-12 col-md-12 px-4" style="overflow-y: auto; max-height: 410px;">
                    <?php $sum = 0; ?>
                    <?php $total = &$sum; ?>
                    <?php foreach ($list as $list) : ?>
                        <div class="col-sm-12 col-md-12 d-flex justify-content-between mb-2">
                            <div class="col-md-6">
                                <h3 style="font-size: 25px; font-weight: bold;"><?= $list['tanggal']; ?></h3>
                            </div>
                            <div class="col-md-6">
                                <h4 class="text-right" style="font-size: 21px; font-weight: bold; margin: 0px;">Uang Diterima</h4>
                                <h4 class="text-right" style="font-size: 35px; font-weight: bold;">Rp.&nbsp;<?= number_format($list['jumlah']); ?></h4>
                            </div>
                        </div>
                        <?php foreach ($list['trx'] as $detail) : ?>
                            <div class="col-sm-12 col-md-12 d-flex align-items-center mb-2 px-3 py-1" style="border: 1px solid grey; border-radius: 10px;">
                                <table class="w-100">
                                    <tr>
                                        <td style="width: 35%; font-size: 30px; font-weight: bold;">Rp.&nbsp;<?= number_format($detail['total']); ?></td>
                                        <td style="width: 15%; font-size: 25px;"><?= $detail['jam']; ?></td>
                                        <td style="width: 25%; font-size: 25px;"><?= $detail['no_transaksi']; ?></td>
                                        <td style="width: 15%; text-align: right"><span class="badge badge-danger" style="font-size: 25px; padding: 8px 20px;">Lunas</span></td>
                                        <td style="width: 10%; text-align: right">
                                            <a type="button" class="fas fa-trash-alt fa-2x" data-toggle="modal" data-target="#modal-sm" data-id="<?= $detail['id']; ?>" style="color: red;"></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        <?php endforeach; ?>
                        <hr>
                    <?php endforeach; ?>

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
                                    <p>Yakin menghapus transaksi?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                    <a type="button" class="btn btn-danger" id="btnDelete">Hapus</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>