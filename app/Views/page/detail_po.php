<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= MainContent -->
<section class="content" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-12 py-3">
                <div class="col-sm-12 col-md-12 d-flex align-items-center justify-content-between mb-2">
                    <div class="col-md-5 d-flex justify-content-start align-items-center">
                        <a href="/po" class="far fa-arrow-alt-circle-left fa-3x" style="color: black;"></a>
                        <h1 style="font-weight: bold; font-size: 25px; margin: 0px;">&nbsp;&nbsp;Kasir</h1>
                    </div>
                    <div class="col-md-7 align-items-center">
                        <h1 class="text-right" style="color: black; font-size: 20px; margin: 0px;">Percetakan DETUDE</h1>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Jl. dr. Sam Ratulangi - Satria 1 No. 44</h2>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Kedaton Bandar Lampung</h2>
                    </div>
                </div>
                <hr>
                <div class="col-md-12" style="padding:0px 55px;">
                    <h1 style="font-size: 25px; font-weight: 600;">Detail Pesanan PO</h1>
                    <hr style="margin: 0px 0px 10px 0px;">
                    <h2 style="font-size: 25px; font-weight: 600;"><?= $pelangganPO['nama_pelanggan'] . ' - ' . $pelangganPO['no_telepon']; ?></h2>
                    <hr style="margin: 0px;">
                    <div style="max-height: 180px; overflow-y: auto;">
                        <table style="width: 100%;">
                            <?php foreach ($detailTransaksiPO as $dt) : ?>
                                <tr style="border-bottom: 1.5px solid #e7e9ec;">
                                    <td style="padding: 8px 0px; width: 5%"><span class="badge bg-dark" style="font-size: 20px;"><?= $dt['quantity']; ?></span></td>
                                    <td style="padding: 8px 0px; width: 35%"><span style="font-size: 20px; font-weight: 600;"><?= $dt['nama_barang']; ?></span></td>
                                    <td style="padding: 8px 0px; width: 60%">
                                        <span style="font-size: 20px; font-weight: 600;">Rp.&nbsp;</span>
                                        <span style="font-size: 20px; font-weight: 600;"><?= number_format($dt['jumlah']); ?></span>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                    <table style="width: 100%;">
                        <tr style="border-bottom: 1.5px solid #e7e9ec;">
                            <td style="padding: 8px 0px; width: 5%"></td>
                            <td style="padding: 8px 0px; width: 35%"><span style="font-size: 20px; font-weight: 600;">Diskon</span></td>
                            <td style="padding: 8px 0px; width: 60%">
                                <span style="font-size: 20px; font-weight: 600;">Rp.&nbsp;</span>
                                <span style="font-size: 20px; font-weight: 600;"><?= number_format($transaksiPO['diskon']); ?></span>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1.5px solid #e7e9ec;">
                            <td style="padding: 8px 0px; width: 5%"></td>
                            <td style="padding: 8px 0px; width: 35%"><span style="font-size: 20px; font-weight: 600;">Total</span></td>
                            <td style="padding: 8px 0px; width: 60%">
                                <span style="font-size: 20px; font-weight: 600;">Rp.&nbsp;</span>
                                <span style="font-size: 20px; font-weight: 600;"><?= number_format($transaksiPO['total']); ?></span>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1.5px solid #e7e9ec;">
                            <td style="padding: 8px 0px; width: 5%"></td>
                            <td style="padding: 8px 0px; width: 35%"><span style="font-size: 20px; font-weight: 600;">DP</span></td>
                            <td style="padding: 8px 0px; width: 60%">
                                <span style="font-size: 20px; font-weight: 600;">Rp.&nbsp;</span>
                                <span style="font-size: 20px; font-weight: 600;"><?= number_format($transaksiPO['total_dp']); ?></span>
                            </td>
                        </tr>
                        <tr style="border-bottom: 1.5px solid #e7e9ec;">
                            <td style="padding: 8px 0px; width: 5%"></td>
                            <td style="padding: 8px 0px; width: 35%"><span style="font-size: 20px; font-weight: 600;">Sisa Bayar</span></td>
                            <td style="padding: 8px 0px; width: 60%">
                                <span style="font-size: 20px; font-weight: 600;">Rp.&nbsp;</span>
                                <span style="font-size: 20px; font-weight: 600;"><?= number_format(((int)$transaksiPO['total'] - (int)$transaksiPO['total_dp'])); ?></span>
                            </td>
                        </tr>
                    </table>
                    <div class="col-md-12 w-100 mt-3 d-flex justify-content-between">
                        <a class="btn btn-danger" data-toggle="modal" data-target="#modal-sm" data-id="<?= $transaksiPO['id']; ?>" style="font-weight: bold; font-size: 25px; padding: 10px 20px;">Hapus PO</a>
                        <a href="/home/metodepembayaranpo/<?= $transaksiPO['id']; ?>" class="btn btn-danger" style="font-weight: bold; font-size: 25px; padding: 10px 90px;">Bayar</a>
                        <button type="button" class="btn btn-danger" onclick="generatePDF()" style="font-weight: bold; font-size: 25px; padding: 10px 60px;">Download PDF Files</button>
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
                            <p>Yakin menghapus PO?</p>
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
</section>

<?php
$i = 0;
$no = 1;
?>
<?php while ($i < count($detailTransaksiPO)) : ?>
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
                                <td style="font-size: 18px; border-collapse: collapse;">&nbsp;T&nbsp;A&nbsp;G&nbsp;I&nbsp;H&nbsp;A&nbsp;N&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                    <div style="position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <p style="font-size: 16px; margin: 0px;">Nomor : <?= $transaksiPO['no_transaksi_po']; ?></p>
                    </div>
                </div>
                <div style="justify-content: flex-end !important; padding: 0px; position: relative; width: 100%; flex-basis: 0; flex-grow: 1; max-width: 100%;">
                    <div style="justify-content: flex-end !important; display: flex; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <p style="font-size: 14px; margin: 0px 15px 0px 0px;">B. Lampung, <?= date_format(date_create($transaksiPO['tanggal']), "d M Y"); ?></p>
                    </div>
                    <div style="margin-left: 15px; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                        <p style="font-size: 14px; margin: 6px 0px 0px 0px;">Kepada Yth.</p>
                        <p style="font-size: 14px; margin: -5px 0px 0px 0px;"><?= $pelangganPO['nama_pelanggan']; ?></p>
                        <p style="font-size: 14px; margin: -5px 0px 0px 0px;">Phone <?= $pelangganPO['no_telepon']; ?></p>
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
                    <?php if (isset($detailTransaksiPO[$i])) : ?>
                        <p style="width: 345px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= $detailTransaksiPO[$i]['nama_barang']; ?></p>
                        <p style="width: 50px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= $detailTransaksiPO[$i]['quantity']; ?></p>
                        <p style="width: 30px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= substr($detailTransaksiPO[$i]['satuan'], 0, 3); ?></p>
                        <p style="width: 123px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= number_format($detailTransaksiPO[$i]['harga_barang']); ?></p>
                        <p style="width: 145px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= number_format($detailTransaksiPO[$i]['jumlah']); ?></p>
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
                    <p style="font-size: 13px; margin: 6px 0px 0px 0px;">Faktur Tagihan ini, bersifat sementara.</p>
                    <p style="font-size: 13px; margin: -4px 0px 0px 0px;">Anda akan menerima Faktur Lunas, jika sudah</p>
                    <p style="font-size: 13px; margin: -4px 0px 0px 0px;">melakukan pembayaran secara penuh.</p>
                    <p style="font-size: 13px; margin: -4px 0px 0px 0px;">------Terima Kasih-----</p>
                </div>
                <div style="padding: 0px; position: relative; width: 100%; flex: 0 0 50%; max-width: 50%;">
                    <div style="justify-content: flex-end !important; margin-top: -26px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Diskon :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format($transaksiPO['diskon']); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder;">------------------------------------</p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Total :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format($transaksiPO['total']); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder;">------------------------------------</p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Total DP :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format($transaksiPO['total_dp']); ?></p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -19px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px; font-weight: bolder; text-align: right;">------------------------------------</p>
                    </div>
                    <div style="justify-content: flex-end !important; margin-top: -16px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                        <p style="margin: 6px 0px 0px 0px;">Sisa Pembayaran :</p>
                        <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;"><?= number_format(((int)$transaksiPO['total'] - (int)$transaksiPO['total_dp'])); ?></p>
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