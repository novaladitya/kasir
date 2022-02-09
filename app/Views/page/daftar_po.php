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
                        <h1 style="font-weight: bold; font-size: 25px; margin: 0px;">&nbsp;&nbsp;Kasir</h1>
                    </div>
                    <div class="col-md-7 align-items-center">
                        <h1 class="text-right" style="color: black; font-size: 20px; margin: 0px;">Percetakan DETUDE</h1>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Jl. dr. Sam Ratulangi - Satria 1 No. 44</h2>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Kedaton Bandar Lampung</h2>
                    </div>
                </div>
                <hr>
                <div class="card card-light mb-2" style="height: 425px;">
                    <div class="card-header">
                        <a href="/manualharga?po=TRUE" class="btn btn-outline-secondary" style="font-size: 20px; font-weight: bold; padding: 6px 50px; position: relative; z-index: 2;">PO Manual</a>
                        <a href="/?po=TRUE" class="btn btn-outline-secondary" style="font-size: 20px; font-weight: bold; padding: 6px 50px; margin-left: 30px; position: relative; z-index: 2;">Tambah PO</a>
                    </div>

                    <div class="card-body" style="margin-top: -65px; position: relative; z-index: 1;">
                        <table id="listPO" class="display text-center">
                            <thead>
                                <tr>
                                    <th style="width: 30%; font-size: 20px; font-weight: 600;">Pelanggan</th>
                                    <th style="width: 25%; font-size: 20px; font-weight: 600;">Order</th>
                                    <th style="width: 15%; font-size: 20px; font-weight: 600;">Total</th>
                                    <th style="width: 15%; font-size: 20px; font-weight: 600;">DP</th>
                                    <th style="width: 15%; font-size: 20px; font-weight: 600;">Petugas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($po as $po) : ?>
                                    <tr onclick="window.location='/detailpo/<?= $po['id']; ?>';">
                                        <td style="font-size: 20px; font-weight: 600; text-align: left;">
                                            <span style="margin-right: 20px;"><i class="fas fa-eye"></i></span>
                                            <span><?= $po['nama_pelanggan']; ?></span>
                                        </td>
                                        <td style="font-size: 20px; font-weight: 600;"><?= $po['nama_barang']; ?></td>
                                        <td style="font-size: 20px; font-weight: 600;">
                                            <span>Rp&nbsp;</span>
                                            <span class="harga"><?= number_format($po['total']); ?></span>
                                        </td>
                                        <td style="font-size: 20px; font-weight: 600;">
                                            <span>Rp&nbsp;</span>
                                            <span class="harga"><?= number_format($po['total_dp']); ?></span>
                                        </td>
                                        <td style="font-size: 20px; font-weight: 600;"><?= $po['nama_petugas']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="fixed-bottom">
                    <div class="col-sm-12 col-md-12 py-4 d-flex align-items-center justify-content-around">
                        <a href="/"><img src="<?= base_url(); ?>/assets/img/katalogicon.png" style="width: 75px;"></a>
                        <a href="/manualharga"><img src="<?= base_url(); ?>/assets/img/manualicon.png" style="width: 78px;"></a>
                        <a href="/po"><img src="<?= base_url(); ?>/assets/img/poiconactive.png" style="width: 128px;"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>