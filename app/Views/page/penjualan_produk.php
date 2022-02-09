<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= MainContent -->
<section class="content" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-12 py-3">
                <div class="col-sm-12 col-md-12 d-flex align-items-center justify-content-between mb-2">
                    <div class="col-md-5 d-flex justify-content-start align-items-center">
                        <form action="/laporan" method="post" id="form">
                            <input type="hidden" name="inputTanggal" value="<?= $pureTanggal; ?>">
                            <a onclick="$('#form').submit()" class="far fa-arrow-alt-circle-left fa-3x" style="color: black;"></a>
                        </form>
                        <h1 style="font-weight: bold; font-size: 25px; margin: 0px;">&nbsp;&nbsp;Penjualan Produk</h1>
                    </div>
                    <div class="col-md-7 align-items-center">
                        <h1 class="text-right" style="color: black; font-size: 20px; margin: 0px;">Percetakan DETUDE</h1>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Jl. dr. Sam Ratulangi - Satria 1 No. 44</h2>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Kedaton Bandar Lampung</h2>
                    </div>
                </div>
                <hr>
                <div class="col-sm-12 col-md-12 px-4">
                    <h1 style="font-weight: bold; font-size: 30px; margin-bottom: 20px;"><?= $tanggal; ?></h1>
                    <div class="col-sm-12 col-md-12 p-0">
                        <table class="table table-sm table-striped w-100" id="penjualanProduk">
                            <thead>
                                <tr style="font-weight: bold; font-size: 25px;">
                                    <th style="width: 45%">Nama Produk</td>
                                    <th style="width: 10%; text-align: center;">Terjual</td>
                                    <th style="width: 45%; text-align: right;">Total Penjualan (Gross)</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($detailTransaksi as $dt) : ?>
                                    <tr style="font-size: 20px;">
                                        <td style="width: 45%"><?= $dt['nama_barang']; ?></td>
                                        <td style="width: 10%; text-align: center;"><?= $dt['quantity']; ?></td>
                                        <td style="width: 45%; text-align: right;">Rp.&nbsp;<?= number_format($dt['gross']); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>