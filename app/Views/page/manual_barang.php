<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= MainContent -->
<section class="content" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-12 py-3">
                <div class="col-sm-12 col-md-12 d-flex align-items-center justify-content-between mb-2">
                    <div class="col-md-6 d-flex justify-content-start align-items-center">
                        <?php if ($po) : ?>
                            <a href="/manualharga?po=TRUE" class="far fa-arrow-alt-circle-left fa-3x" style="color: black;"></a>
                        <?php else : ?>
                            <a href="/manualharga" class="far fa-arrow-alt-circle-left fa-3x" style="color: black;"></a>
                        <?php endif; ?>
                        <h1 style="font-weight: bold; font-size: 25px; margin: 0px;">&nbsp;&nbsp;Isi nama Produk & Kuantitas</h1>
                    </div>
                    <div class="col-md-6 align-items-center">
                        <h1 class="text-right" style="color: black; font-size: 20px; margin: 0px;">Percetakan DETUDE</h1>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Jl. dr. Sam Ratulangi - Satria 1 No. 44</h2>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Kedaton Bandar Lampung</h2>
                    </div>
                </div>
                <hr>
                <?php if ($po) : ?>
                    <form action="/home/simpanpo" method="post">
                    <?php else : ?>
                        <form action="/home/manualfixitem" method="post">
                        <?php endif; ?>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-8">
                                    <label for="nama_barang" style="font-size: 25px; font-weight:600;">Nama Barang</label>
                                    <input type="text" class="form-control" id="nama_barang" placeholder="Pasang Sticker One Way" name="nama_barang" required style="font-size: 25px; font-weight:600; padding: 30px;">
                                </div>
                                <div class="form-group col-md-3" style="margin-top: 50px; margin-left: 50px">
                                    <div class="input-group">
                                        <button style="width: 55px; height: 55px; padding: 0px 12px;" class="btn btn-decrement btn-danger" type="button" id="btnMin"><strong style='font-size: 40px'>&minus;</strong></button>
                                        <input type="number" onkeypress="return /^[0-9]*$/i.test(event.key)" oninput="avoidNan()" class="form-control" value="1" name="quantity" id="inputQty" style="text-align: center; font-size: 25px; font-weight:600; padding: 27px;" />
                                        <button style="width: 55px; height: 55px; padding: 0px 12px;" class="btn btn-increment btn-danger" type="button" id="btnPlus"><strong style='font-size: 40px'>&plus;</strong></button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-3 p-0">
                                <label for="satuan" style="font-size: 25px; font-weight:600;">Satuan</label>
                                <input type="text" class="form-control" id="satuan" placeholder="pcs" name="satuan" required style="font-size: 25px; font-weight:600; padding: 30px;">
                            </div>
                            <div class="col-md-8 p-0">
                                <button type="button" class="btn btn-outline-secondary w-100" data-toggle="modal" data-target="#modalPelanggan" style="font-weight: 600; font-size: 25px; margin-top: 15px;">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-9 d-flex justify-content-start">
                                            Pelanggan
                                        </div>
                                        <div class="col-3 d-flex justify-content-end">
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                    </div>
                                </button>
                            </div>
                            <?php if ($po) : ?>
                                <div class="col-md-8 p-0">
                                    <button type="button" class="btn btn-outline-secondary w-100" data-toggle="modal" data-target="#modalDP" style="font-weight: 600; font-size: 25px; margin-top: 25px;">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-9 d-flex justify-content-start">
                                                <span>DP</span>
                                                <span style="margin-left: 10px;">Rp&nbsp;</span>
                                                <span id="displayDP">0</span>
                                            </div>
                                            <div class="col-3 d-flex justify-content-end">
                                                <i class="fas fa-chevron-right"></i>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                                <input type="hidden" name="manual" value="TRUE">
                            <?php endif; ?>
                            <!-- Modal Pelanggan -->
                            <div class="modal fade" id="modalPelanggan" tabindex="-1" role="dialog" aria-labelledby="modalPelangganTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalPelangganTitle" style="font-size: 25px;">Isi Data Pelanggan</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="namaPelanggan" class="col-sm-3 col-form-label" style="font-size: 20px; font-weight:600;">Nama</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="namaPelanggan" placeholder="Jhon Doe" name="nama_pelanggan" required style="font-size: 20px; font-weight:600;">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="noTelepon" class="col-sm-3 col-form-label" style="font-size: 20px; font-weight:600;">No. Telepon</label>
                                                <div class="col-sm-9">
                                                    <input type="number" class="form-control" id="noTelepon" placeholder="081218659065" name="no_telepon" onkeypress="return /^[0-9]*$/i.test(event.key)" required style="font-size: 20px; font-weight:600;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 20px; font-weight:600;">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal DP -->
                            <div class="modal fade" id="modalDP" tabindex="-1" role="dialog" aria-labelledby="modalDPtitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalDPtitle" style="font-size: 25px;">Banyaknya DP</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label for="total_dp" class="col-sm-2 col-form-label" style="font-size: 20px; font-weight:600;">DP</label>
                                                <div class="col-sm-10">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="rp">Rp</span>
                                                        </div>
                                                        <input type="number" class="form-control" id="total_dp" placeholder="10000" onkeypress="return /^[0-9]*$/i.test(event.key)" aria-describedby="rp" name="total_dp" style="font-size: 20px; font-weight:600;">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" id="closeModalDP" class="btn btn-danger" data-dismiss="modal" style="font-size: 20px; font-weight:600;">Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-sm-12 d-flex justify-content-center" style="margin-top: 50px; padding: 0px 20px;">
                                <?php if ($po) : ?>
                                    <button type="submit" id="btnBayar" class="btn btn-danger" style="font-weight: bold; font-size: 25px; padding: 10px 180px;">SIMPAN PO MANUAL</button>
                                <?php else : ?>
                                    <button type="submit" id="btnBayar" class="btn btn-danger" style="font-weight: bold; font-size: 25px; padding: 10px 180px;">MASUKKAN ORDER</button>
                                <?php endif; ?>
                            </div>
                        </div>
                        </form>
            </div>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>