<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= MainContent -->
<section class="content" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-7" style="border-right: 2px solid grey;">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-sm-12 d-flex justify-content-center">
                        <img src="<?= base_url(); ?>/assets/img/trxsukses.png" alt="" style="width: 300px; margin-bottom: 20px;">
                    </div>
                    <div class="col-sm-12 d-flex justify-content-center">
                        <h1 style="font-weight: bold;">Transaksi Sukses!</h1>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-center">
                        <h1 style="font-weight: bold; color: red; font-size: 50px; margin-bottom: 20px;">
                            <span>Kembalian Rp&nbsp;</span>
                            <span><?= number_format($kembalian); ?></span>
                        </h1>
                    </div>
                    <div class="col-sm-12 d-flex justify-content-center">
                        <h1 class="badge bg-danger" style="font-weight: bold; font-size: 30px; margin-bottom: 20px; border-radius: 15px; padding: 10px 15px;">
                            <span>Metode Pembayaran:&nbsp;</span>
                            <span><?= ucwords($transaksi['metode_pembayaran']); ?></span>
                        </h1>
                    </div>
                    <div class=" col-sm-12 d-flex justify-content-center" style="padding: 0px 50px; margin-bottom: 50px;">
                        <button type="button" class="btn btn-outline-secondary w-100" onclick="generatePDF()" style="font-weight: bold; font-size: 25px; padding: 20px; border-radius: 15px;">
                            Only Download PDF Files
                        </button>
                    </div>
                    <div class=" col-sm-12 d-flex justify-content-center" style="padding: 0px 50px;">
                        <button type="button" class="btn btn-outline-dark w-100" onclick="generateStruk()" style="font-weight: bold; font-size: 25px; padding: 20px; border-radius: 15px;">CETAK STRUK & AUTO DOWNLOAD</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="col-sm-12 d-flex justify-content-center" style="margin-top: 20px;">
                    <div style="max-height: 78vh; overflow-y: auto; padding: 0px 15px;">
                        <table class="bill w-100">
                            <tr>
                                <td rowspan="2" style="padding: 5px;">
                                    <img src="<?= base_url(); ?>/assets/img/logostruk.png" alt="" style="width: 65px;">
                                </td>
                                <td colspan="2" class="text-center" style="font-size: 20px; font-weight: 700;">Percetakan DETUDE</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center" style="font-size: 15px; font-weight: 600;">Jl. dr. Sam Ratulangi-Satria 1 No. 44, Kedaton Bandar Lampung</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="font-size: 20px; font-weight: 600; text-align: center;">-----------------------------------</td>
                            </tr>
                        </table>
                        <table class="bill w-100" style="font-size: 20px; font-weight: 600;">
                            <?php foreach ($detailTransaksi as $dt) : ?>
                                <tr>
                                    <td style="width: 60%"><?= $dt['nama_barang']; ?></td>
                                    <td style="width: 10%"><?= $dt['quantity']; ?></td>
                                    <td style="width: 30%; text-align: right;"><?= number_format($dt['jumlah']); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><?= number_format($dt['harga_barang']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <table class="bill w-100" style="font-size: 20px; font-weight: 600;">
                            <tr>
                                <td colspan="2" style="text-align: center;">-----------------------------------</td>
                            </tr>
                            <tr>
                                <td style="width: 60%; text-align: right;">Harga Jual</td>
                                <td style="width: 40%; text-align: right;"><?= number_format($transaksi['subtotal']); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;">-----------------------------------</td>
                            </tr>
                            <tr>
                                <td style="width: 60%; text-align: right;">Discount</td>
                                <td style="width: 40%; text-align: right;"><?= number_format($transaksi['diskon']); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 60%; text-align: right;">Total</td>
                                <td style="width: 40%; text-align: right;"><?= number_format($transaksi['total']); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 60%; text-align: right;">Tunai</td>
                                <td style="width: 40%; text-align: right;"><?= number_format($uang); ?></td>
                            </tr>
                            <tr>
                                <td style="width: 60%; text-align: right;">Kembali</td>
                                <td style="width: 40%; text-align: right;"><?= number_format($kembalian); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;">-----------------------------------</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center" style="font-size: 17px; font-weight: 600;">Terima Kasih, Selamat Berbelanja Kembali</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;">-----------------------------------</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-right"><?= date("d/m/Y", strtotime($transaksi['tanggal']))  . '/' . session()->get('nama_user'); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class=" col-sm-12 d-flex justify-content-center" style="margin-top: 20px; padding: 0px 20px;">
                    <a type="button" href="/" class="btn btn-danger w-100" style="font-weight: bold; font-size: 25px; padding: 20px; border-radius: 15px;">BUAT PESANAN BARU</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
$i = 0;
$no = 1;
?>
<?php while ($i < count($detailTransaksi)) : ?>
    <div class="fakturPDF" style="margin: 0; width: 210mm; height: 165mm; display: none;">
        <div class="bill" style="width: 21cm; height: 16.5cm; border: 1px solid black; padding: 0.8cm; background-image: url(<?= base_url(); ?>/assets/img/bgfaktur.png); background-size: cover;">
            <div style="display: flex; flex-wrap: wrap; margin-right: -7.5px; margin-left: -7.5px; align-items: flex-end !important;">
                <div style="text-align: center; padding: 0px; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex-basis: 0; flex-grow: 1; max-width: 100%;">
                    <img src="<?= base_url(); ?>/assets/img/logofaktur.png" style="width: 180px; margin-bottom: 5px; vertical-align: middle; border-style: none;">
                    <p style="font-size: 12px; text-align: center; margin: 0px;">Jl. dr. Samratulangi - Satria 1</p>
                    <p style="font-size: 12px; text-align: center; margin: -5px 0px 5px 0px;">No. 44 B Kedaton - B. Lampung</p>
                </div>
                <div style="align-items: center !important; text-align: center; padding: 0px; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex-basis: 0; flex-grow: 1; max-width: 100%;">
                    <div style="position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <table style="border: 1px solid red; width: 100%; margin-bottom: 5px; border-collapse: collapse;">
                            <tr style="background-color: red; color: white; height: 25px; border-collapse: collapse;">
                                <td style="font-size: 25px; font-weight: bold; border-collapse: collapse;">FAKTUR</td>
                            </tr>
                            <tr style="height: 25px; border-collapse: collapse;">
                                <td style="font-size: 18px; border-collapse: collapse;">&nbsp;L&nbsp;U&nbsp;N&nbsp;A&nbsp;S&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                    <div style="position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <p style="font-size: 16px; margin: 0px;">Nomor : <?= $transaksi['no_transaksi']; ?></p>
                    </div>
                </div>
                <div style="justify-content: flex-end !important; padding: 0px; position: relative; width: 100%; flex-basis: 0; flex-grow: 1; max-width: 100%;">
                    <div style="justify-content: flex-end !important; display: flex; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <p style="font-size: 14px; margin: 0px 15px 0px 0px;">B. Lampung, <?= date_format(date_create($transaksi['tanggal']), "d M Y"); ?></p>
                    </div>
                    <div style="margin-left: 15px; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <p style="font-size: 14px; margin: 6px 0px 0px 0px;">Kepada Yth.</p>
                        <p style="font-size: 14px; margin: -5px 0px 0px 0px;"><?= $pelanggan['nama_pelanggan']; ?></p>
                        <p style="font-size: 14px; margin: -5px 0px 0px 0px;">Phone <?= $pelanggan['no_telepon']; ?></p>
                        <p style="font-size: 14px; margin: -5px 0px 0px 0px;">di BANDAR LAMPUNG</p>
                    </div>
                </div>
            </div>
            <p style="font-weight: bolder; margin: 0px; text-align: center; margin-top: -7px">----------------------------------------------------------------------------</p>
            <table style="width: 100%; margin-top: -14px; border-collapse: collapse;">
                <tr style="border-collapse: collapse;">
                    <td style="width: 5%; border-collapse: collapse;">No</td>
                    <td style="width: 47%; border-collapse: collapse;">Jenis Cetakan</td>
                    <td style="width: 7%; border-collapse: collapse;">Qty</td>
                    <td style="width: 5%; border-collapse: collapse;">Sat</td>
                    <td style="width: 16%; text-align: right; border-collapse: collapse;">Harga</td>
                    <td style="width: 20%; text-align: right; border-collapse: collapse;">Jumlah</td>
                </tr>
            </table>
            <p style="font-weight: bolder; margin: 0px; text-align: center; margin-top: -13px">----------------------------------------------------------------------------</p>
            <div style="margin-top: -5px; margin-bottom: -5px;">
                <?php $j = 0; ?>
                <?php while ($j < 10) : ?>
                    <p style="width: 38px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= $no++ ?></p>
                    <?php if (isset($detailTransaksi[$i])) : ?>
                        <p style="width: 345px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= $detailTransaksi[$i]['nama_barang']; ?></p>
                        <p style="width: 50px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= $detailTransaksi[$i]['quantity']; ?></p>
                        <p style="width: 30px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= substr($detailTransaksi[$i]['satuan'], 0, 3); ?></p>
                        <p style="width: 123px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= number_format($detailTransaksi[$i]['harga_barang']); ?></p>
                        <p style="width: 145px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= number_format($detailTransaksi[$i]['jumlah']); ?></p>
                    <?php else : ?>
                        <p style="width: 345px; float: left; margin: -5px 0px 0px 0px; padding: 0px;">&zwnj;</p>
                        <p style="width: 50px; float: left; margin: -5px 0px 0px 0px; padding: 0px;">&zwnj;</p>
                        <p style="width: 30px; float: left; margin: -5px 0px 0px 0px; padding: 0px;">&zwnj;</p>
                        <p style="width: 123px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;">&zwnj;</p>
                        <p style="width: 145px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;">&zwnj;</p>
                    <?php endif; ?>
                    <?php
                    $i++;
                    $j++;
                    ?>
                <?php endwhile; ?>
            </div>
            <p style="font-weight: bolder; margin: 0px; text-align: center; position: relative; top: -10px">----------------------------------------------------------------------------</p>
            <div style="padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                <div style="margin-top: -20px; padding: 0px; position: relative; width: 100%; flex: 0 0 50%; max-width: 50%;">
                    <p style="font-size: 13px; margin: 6px 0px 0px 0px;">Terima Kasih atas kepercayaan Anda,</p>
                    <p style="font-size: 13px; margin: -4px 0px 0px 0px;">semoga jalinan ini, akan berkelanjutan</p>
                    <p style="font-size: 13px; margin: -4px 0px 0px 0px;">untuk waktu yang akan datang.</p>
                </div>
                <div style="padding: 0px; position: relative; width: 100%; flex: 0 0 50%; max-width: 50%;">
                    <div style="justify-content: flex-end !important; margin-top: -26px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Diskon :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format($transaksi['diskon']); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder;">------------------------------------</p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Total :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format($transaksi['total']); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder;">------------------------------------</p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Total DP :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format($transaksi['total_dp']); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -19px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder; text-align: right;">------------------------------------</p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -16px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Sisa Pembayaran :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format(((int)$transaksi['total'] - (int)$transaksi['total_dp'])); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -16px; padding: 0px; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder; text-align: right;">------------------------------------</p>
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                <div style="text-align: center; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 33.333333%; max-width: 33.333333%;">
                    <p style="margin-top: 0px;">Tanda Terima,</p>
                    <p style="margin-top: 50px;">( ................. )</p>
                </div>
                <div style="text-align: center; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 33.333333%; max-width: 33.333333%;">
                    <p style="margin-top: 0px;">Hormat Kami,</p>
                    <p style="margin-top: 50px;">( ................. )</p>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>

<?php
$a = 0;
$noS = 1;
?>
<?php while ($a < count($detailTransaksi)) : ?>
    <div class="struk" style="margin: 0; width: 210mm; height: 165mm; display: none;">
        <div class="bill" style="width: 21cm; height: 16.5cm; border: 1px solid black; padding: 0.8cm; background-size: cover;">
            <div style="display: flex; flex-wrap: wrap; margin-right: -7.5px; margin-left: -7.5px; align-items: flex-end !important;">
                <div style="text-align: center; padding: 0px; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex-basis: 0; flex-grow: 1; max-width: 100%;">
                    <p style="font-size: 12px; text-align: center; margin: 0px;">Jl. dr. Samratulangi - Satria 1</p>
                    <p style="font-size: 12px; text-align: center; margin: -5px 0px 5px 0px;">No. 44 B Kedaton - B. Lampung</p>
                </div>
                <div style="align-items: center !important; text-align: center; padding: 0px; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex-basis: 0; flex-grow: 1; max-width: 100%;">
                    <div style="position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <h1 style="font-size: 18px; margin: 0px 0px 15px 10px;">&nbsp;L&nbsp;U&nbsp;N&nbsp;A&nbsp;S&nbsp;</h1>
                    </div>
                    <div style="position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <p style="font-size: 16px; margin: 0px;">Nomor : <?= $transaksi['no_transaksi']; ?></p>
                    </div>
                </div>
                <div style="justify-content: flex-end !important; padding: 0px; position: relative; width: 100%; flex-basis: 0; flex-grow: 1; max-width: 100%;">
                    <div style="justify-content: flex-end !important; display: flex; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <p style="font-size: 14px; margin: 0px 15px 0px 0px;">B. Lampung, <?= date_format(date_create($transaksi['tanggal']), "d M Y"); ?></p>
                    </div>
                    <div style="margin-left: 15px; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <p style="font-size: 14px; margin: 6px 0px 0px 0px;">Kepada Yth.</p>
                        <p style="font-size: 14px; margin: -5px 0px 0px 0px;"><?= $pelanggan['nama_pelanggan']; ?></p>
                        <p style="font-size: 14px; margin: -5px 0px 0px 0px;">Phone <?= $pelanggan['no_telepon']; ?></p>
                        <p style="font-size: 14px; margin: -5px 0px 0px 0px;">di BANDAR LAMPUNG</p>
                    </div>
                </div>
            </div>
            <p style="font-weight: bolder; margin: 0px; text-align: center; margin-top: -7px">----------------------------------------------------------------------------</p>
            <table style="width: 100%; margin-top: -14px; border-collapse: collapse;">
                <tr style="border-collapse: collapse;">
                    <td style="width: 5%; border-collapse: collapse;">No</td>
                    <td style="width: 47%; border-collapse: collapse;">Jenis Cetakan</td>
                    <td style="width: 7%; border-collapse: collapse;">Qty</td>
                    <td style="width: 5%; border-collapse: collapse;">Sat</td>
                    <td style="width: 16%; text-align: right; border-collapse: collapse;">Harga</td>
                    <td style="width: 20%; text-align: right; border-collapse: collapse;">Jumlah</td>
                </tr>
            </table>
            <p style="font-weight: bolder; margin: 0px; text-align: center; margin-top: -13px">----------------------------------------------------------------------------</p>
            <div style="margin-top: -5px; margin-bottom: -5px;">
                <?php $b = 0; ?>
                <?php while ($b < 10) : ?>
                    <p style="width: 38px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= $noS++ ?></p>
                    <?php if (isset($detailTransaksi[$a])) : ?>
                        <p style="width: 345px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= $detailTransaksi[$a]['nama_barang']; ?></p>
                        <p style="width: 50px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= $detailTransaksi[$a]['quantity']; ?></p>
                        <p style="width: 30px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= substr($detailTransaksi[$a]['satuan'], 0, 3); ?></p>
                        <p style="width: 123px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= number_format($detailTransaksi[$a]['harga_barang']); ?></p>
                        <p style="width: 145px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= number_format($detailTransaksi[$a]['jumlah']); ?></p>
                    <?php else : ?>
                        <p style="width: 345px; float: left; margin: -5px 0px 0px 0px; padding: 0px;">&zwnj;</p>
                        <p style="width: 50px; float: left; margin: -5px 0px 0px 0px; padding: 0px;">&zwnj;</p>
                        <p style="width: 30px; float: left; margin: -5px 0px 0px 0px; padding: 0px;">&zwnj;</p>
                        <p style="width: 123px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;">&zwnj;</p>
                        <p style="width: 145px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;">&zwnj;</p>
                    <?php endif; ?>
                    <?php
                    $a++;
                    $b++;
                    ?>
                <?php endwhile; ?>
            </div>
            <p style="font-weight: bolder; margin: 0px; text-align: center; position: relative; top: -10px">----------------------------------------------------------------------------</p>
            <div style="padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                <div style="margin-top: -20px; padding: 0px; position: relative; width: 100%; flex: 0 0 50%; max-width: 50%;">
                    <p style="font-size: 13px; margin: 6px 0px 0px 0px;">Terima Kasih atas kepercayaan Anda,</p>
                    <p style="font-size: 13px; margin: -4px 0px 0px 0px;">semoga jalinan ini, akan berkelanjutan</p>
                    <p style="font-size: 13px; margin: -4px 0px 0px 0px;">untuk waktu yang akan datang.</p>
                </div>
                <div style="padding: 0px; position: relative; width: 100%; flex: 0 0 50%; max-width: 50%;">
                    <div style="justify-content: flex-end !important; margin-top: -26px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Diskon :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format($transaksi['diskon']); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder;">------------------------------------</p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Total :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format($transaksi['total']); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder;">------------------------------------</p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Total DP :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format($transaksi['total_dp']); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -19px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder; text-align: right;">------------------------------------</p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -16px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Sisa Pembayaran :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format(((int)$transaksi['total'] - (int)$transaksi['total_dp'])); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -16px; padding: 0px; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder; text-align: right;">------------------------------------</p>
                    </div>
                </div>
            </div>
            <div style="margin-top: 20px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                <div style="text-align: center; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 33.333333%; max-width: 33.333333%;">
                    <p style="margin-top: 0px;">Tanda Terima,</p>
                    <p style="margin-top: 50px;">( ................. )</p>
                </div>
                <div style="text-align: center; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 33.333333%; max-width: 33.333333%;">
                    <p style="margin-top: 0px;">Hormat Kami,</p>
                    <p style="margin-top: 50px;">( ................. )</p>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>