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
                        <h1 style="font-weight: bold; font-size: 25px; margin: 0px;">&nbsp;&nbsp;Laporan</h1>
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
                    <form action="/laporan" id="tanggal" method="post">
                        <input type="hidden" id="inputTanggal" name="inputTanggal">
                    </form>
                </div>
                <hr>
                <div class="col-sm-12 col-md-12 px-4">
                    <div class="col-md-12 p-0 d-flex justify-content-start mb-3">
                        <form action="/laporan" method="post">
                            <input type="hidden" name="inputTanggal" value="<?= date('Y-m-d') . '|' . date('Y-m-d'); ?>">
                            <button type="submit" class="btn btn-danger" style="font-size: 22px; font-weight: bold; border-radius: 10px;">Hari Ini</button>
                        </form>
                        <form action="/laporan" method="post">
                            <input type="hidden" name="inputTanggal" value="<?= date('Y-m-d', strtotime('-30 days')) . '|' . date('Y-m-d'); ?>">
                            <button type="submit" class="btn btn-outline-secondary ml-4" style="font-size: 22px; font-weight: bold; border-radius: 10px;">30 Hari Terakhir</button>
                        </form>
                    </div>
                    <div class="card card-light w-100">
                        <div class="card-header">
                            <h1 style="font-size: 25px; font-weight: bold; margin: 0px;">Ringkasan</h1>
                        </div>
                        <div class="card-body">
                            <table class="w-100" cellPadding="0" cellSpacing="0">
                                <tr style="font-size: 20px; font-weight: bold;">
                                    <td>Penjualan Kotor</td>
                                    <td>Tunai</td>
                                    <td>Non Tunai</td>
                                    <td>Diskon</td>
                                    <td>Jumlah Transaksi</td>
                                </tr>
                                <tr style="font-size: 31.8px; font-weight: bold;">
                                    <td>Rp.&nbsp;<?= number_format($laporan['penjualan_kotor']); ?></td>
                                    <td>Rp.&nbsp;<?= number_format($laporan['tunai']); ?></td>
                                    <td>Rp.&nbsp;<?= number_format($laporan['nontunai']); ?></td>
                                    <td>Rp.&nbsp;<?= number_format($laporan['diskon']); ?></td>
                                    <td><?= number_format($laporan['jumlah_transaksi']); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4 p-0">
                        <form action="/laporan/penjualanproduk" method="post">
                            <input type="hidden" value="<?= $pureTanggal; ?>" name="inputTanggal">
                            <button class="btn btn-outline-secondary w-100" type="submit" style="color: black; font-weight: 600; font-size: 25px; margin-top: 10px;">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-9 d-flex justify-content-start">
                                        Penjualan Produk
                                    </div>
                                    <div class="col-3 d-flex justify-content-end">
                                        <i class="fas fa-chevron-right"></i>
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>