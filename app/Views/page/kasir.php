<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= MainContent -->
<section class="content" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-12 col-md-7 py-3" style="border-right: 2px solid grey;">
                <div class="col-sm-12 col-md-12 d-flex align-items-center justify-content-between mb-2">
                    <div class="col-md-4 d-flex justify-content-start align-items-center">
                        <a class="fas fa-bars fa-2x" data-widget="pushmenu" href="#" role="button" style="color: black;"></a>
                        <h1 style="font-weight: bold; font-size: 25px; margin: 0px;">&nbsp;&nbsp;Kasir</h1>
                    </div>
                    <div class="col-md-8 align-items-center">
                        <h1 class="text-right" style="color: black; font-size: 20px; margin: 0px;">Percetakan DETUDE</h1>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Jl. dr. Sam Ratulangi - Satria 1 No. 44</h2>
                        <h2 class="text-right" style="color: black; font-size: 15px; margin: 0px;">Kedaton Bandar Lampung</h2>
                    </div>
                </div>
                <div class="card card-light mb-2" style="height: 470px;">
                    <div class="card-header" style="height: 65px;">
                        <a href="/produk" class="btn btn-outline-secondary" style="font-size: 20px; font-weight: bold; padding: 6px; position: relative; z-index: 2;">Tambah Produk</a>
                    </div>

                    <div class="card-body" style="margin-top: -65px; position: relative; z-index: 1;">
                        <form action="/home/fixitem" method="POST">
                            <table id="listBarang" class="display">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: 5%; font-size: 20px; font-weight: 600; padding: 10px 18px 10px 10px;">Kode</th>
                                        <th style="width: 40%; font-size: 20px; font-weight: 600;">Nama</th>
                                        <th style="width: 25%; font-size: 20px; font-weight: 600;">Harga</th>
                                        <th style="width: 30%; font-size: 20px; font-weight: 600;">Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $selectedQty = []; ?>
                                    <?php for ($i = 0; $i < count($barang); $i++) : ?>
                                        <tr>
                                            <th style="background-color: grey; color: white; font-size: 30px; padding: 0px;" class="text-center"><?= $barang[$i]['kode_barang']; ?></td>
                                            <td style="font-size: 20px; font-weight: 600;"><?= $barang[$i]['nama_barang']; ?></td>
                                            <td style="font-size: 20px; font-weight: 600; color: grey;" class="text-right">
                                                <span>Rp&nbsp;</span>
                                                <span class="harga" harga="<?= $barang[$i]['harga_barang']; ?>"><?= number_format($barang[$i]['harga_barang']); ?></span>
                                            </td>
                                            <input type="hidden" value="<?= $barang[$i]['kode_barang']; ?>" name="kode_barang[]">
                                            <input type="hidden" value="<?= $barang[$i]['nama_barang']; ?>" name="nama_barang[]">
                                            <input type="hidden" value="<?= $barang[$i]['harga_barang']; ?>" name="harga_barang[]">
                                            <input type="hidden" value="<?= $barang[$i]['satuan']; ?>" name="satuan[]">
                                            <?php
                                            if (isset($dataTrx)) {
                                                $ada = FALSE;
                                                foreach ($dataTrx as $trx) {
                                                    if ($trx['nama_barang'] == $barang[$i]['nama_barang']) {
                                                        $selectedQty[] = $trx['quantity'];
                                                        $ada = TRUE;
                                                    }
                                                }
                                                if (!$ada) {
                                                    $selectedQty[] = 0;
                                                }
                                            }
                                            ?>
                                            <td><input type="number" class="bootstrap-input-spinner form-control-sm" value="<?= isset($selectedQty[$i]) ? $selectedQty[$i] : 0; ?>" min="0" name="quantity[]" /></td>
                                        </tr>
                                    <?php endfor; ?>
                                </tbody>
                                <?php if ($po) : ?>
                                    <input type="hidden" name="po" value="TRUE">
                                <?php endif; ?>
                            </table>
                    </div>

                    <div class="card-footer" style="padding: 10px 30px;">
                        <button type="submit" class="btn btn-danger w-100" style="font-weight: bold; font-size: 25px; padding: 5px 30px; border-radius: 10px;">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-6 d-flex justify-content-start">
                                    <i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;
                                    <span id="jumlahItem">0</span>
                                    <span>&nbsp;&nbsp;Items</span>
                                </div>
                                <div class="col-6 d-flex justify-content-end">
                                    <span>Rp&nbsp;</span>
                                    <span id="totalHarga">0</span>
                                </div>
                            </div>
                        </button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 d-flex align-items-center justify-content-around">
                    <?php if ($po) : ?>
                        <a href="/"><img src="<?= base_url(); ?>/assets/img/katalogicon.png" style="width: 75px;"></a>
                    <?php else : ?>
                        <a href="/"><img src="<?= base_url(); ?>/assets/img/katalogiconactive.png" style="width: 75px;"></a>
                    <?php endif; ?>
                    <a href="/manualharga"><img src="<?= base_url(); ?>/assets/img/manualicon.png" style="width: 78px;"></a>
                    <?php if ($po) : ?>
                        <a href="/po"><img src="<?= base_url(); ?>/assets/img/poiconactive.png" style="width: 128px;"></a>
                    <?php else : ?>
                        <a href="/po"><img src="<?= base_url(); ?>/assets/img/poicon.png" style="width: 128px;"></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (isset($dataTrx)) : ?>
                <div class=" col-sm-12 col-md-5 mt-3">
                    <div class="card card-light" style="height: 95vh;">
                        <div class="card-header">
                            <h3 class="card-title" style="font-size: 20px; font-weight: bold; color: grey;">Detail Pesanan</h3>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <?php if ($po) : ?>
                                        <form action="/home/simpanpo" method="POST">
                                        <?php else : ?>
                                            <form action="/home/fixbayar" method="POST">
                                            <?php endif; ?>
                                            <button type="button" class="btn btn-outline-secondary w-100" data-toggle="modal" data-target="#modalPelanggan" style="font-weight: 550; font-size: 20px; border-radius: 10px; margin-bottom: 20px;">
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
                                <div class="col-sm-12">
                                    <div style="max-height: 170px; overflow-y: auto;">
                                        <table class="table table-hover" style="font-size: 20px; font-weight: 600;">
                                            <tbody>
                                                <?php
                                                $subtotal = 0;
                                                $i = 0;
                                                ?>
                                                <?php foreach ($dataTrx as $dataTrx) : ?>
                                                    <tr onclick="$('#modalDiskon<?= $i; ?>').modal('show');">
                                                        <th scope="row" style="width: 5%;"><span class="badge bg-dark quantity" style="font-size: 20px;"><?= $dataTrx['quantity']; ?></span></th>
                                                        <td style="width: 55%;"><?= $dataTrx['nama_barang']; ?></td>
                                                        <td style="width: 40%;" class="text-right">
                                                            <span>Rp&nbsp;</span>
                                                            <span><?= number_format($dataTrx['harga_barang']); ?></span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $subtotal = $subtotal + ((int)$dataTrx['quantity'] * (int)$dataTrx['harga_barang']);
                                                    ?>

                                                    <!-- Modal Diskon -->
                                                    <div class="modal fade" id="modalDiskon<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="modalDiskontitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalDiskontitle" style="font-size: 25px;">Banyaknya Diskon <?= $dataTrx['nama_barang']; ?></h5>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <label for="diskon" class="col-sm-2 col-form-label" style="font-size: 20px; font-weight:600;">Diskon</label>
                                                                        <div class="col-sm-10">
                                                                            <div class="input-group">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text" id="rp">Rp</span>
                                                                                </div>
                                                                                <input type="text" class="form-control diskon" placeholder="10000" onkeypress="return /^[0-9]*$/i.test(event.key)" aria-describedby="rp" style="font-size: 20px; font-weight:600;">
                                                                                <div class="input-group-append">
                                                                                    <span class="input-group-text">/pcs</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger closeModalDiskon" data-dismiss="modal" style="font-size: 20px; font-weight:600;">Simpan</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12" style="margin-top: -20px;">
                                    <hr>
                                    <table class="w-100" style="font-size: 20px; font-weight: 600; margin-top: -10px;">
                                        <tr>
                                            <td>Subtotal</td>
                                            <td class="text-right">
                                                <span>Rp&nbsp;</span>
                                                <span id="subtotal" subtotal="<?= $subtotal; ?>"><?= number_format($subtotal); ?></span>
                                                <input type="hidden" name="subtotal" value="<?= $subtotal; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Diskon</td>
                                            <td class="text-right">
                                                <span>Rp&nbsp;</span>
                                                <span id="displayDiskon">0</span>
                                                <input type="hidden" name="diskon" id="inputDiskon">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!-- <div class="col-sm-12">
                                    <button type="button" class="btn btn-outline-secondary w-100" data-toggle="modal" data-target="#modalDiskon" style="font-weight: 550; font-size: 20px; border-radius: 10px; margin-top: 10px;">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-9 d-flex justify-content-start">
                                                <span>Diskon</span>
                                                <span style="margin-left: 10px;">Rp&nbsp;</span>
                                                <span id="displayDiskon">0</span>
                                            </div>
                                            <div class="col-3 d-flex justify-content-end">
                                                <i class="fas fa-chevron-right"></i>
                                            </div>
                                        </div>
                                    </button>
                                </div> -->
                                <?php if ($po) : ?>
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-outline-secondary w-100" data-toggle="modal" data-target="#modalDP" style="font-weight: 550; font-size: 20px; border-radius: 10px; margin-top: 10px;">
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
                                <?php endif; ?>
                                <div class="col-sm-12 d-flex justify-content-center">
                                    <?php if ($po) : ?>
                                        <a href="/?po=TRUE" style="font-weight: 550; font-size: 20px; margin-top: 10px; color: red;">Hapus Pesanan</a>
                                    <?php else : ?>
                                        <a href="/" style="font-weight: 550; font-size: 20px; margin-top: 10px; color: red;">Hapus Pesanan</a>
                                    <?php endif; ?>
                                </div>
                                <div class="col-sm-12" style="margin-top: -10px;">
                                    <hr>
                                    <table class="w-100" style="font-size: 20px; font-weight: 600;">
                                        <tr>
                                            <td>Total</td>
                                            <td class="text-right">
                                                <span>Rp&nbsp;</span>
                                                <span id="total"><?= number_format($subtotal); ?></span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

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
                                                <input type="text" class="form-control" id="noTelepon" placeholder="081218659065" name="no_telepon" onkeypress="return /^[0-9]*$/i.test(event.key)" required style="font-size: 20px; font-weight:600;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="font-size: 20px; font-weight:600;">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Diskon -->
                        <!-- <div class="modal fade" id="modalDiskon" tabindex="-1" role="dialog" aria-labelledby="modalDiskontitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDiskontitle" style="font-size: 25px;">Banyaknya Diskon</h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label for="diskon" class="col-sm-2 col-form-label" style="font-size: 20px; font-weight:600;">Diskon</label>
                                            <div class="col-sm-10">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="rp">Rp</span>
                                                    </div>
                                                    <input type="text" class="form-control" id="diskon" placeholder="10000" onkeypress="return /^[0-9]*$/i.test(event.key)" aria-describedby="rp" name="diskon" style="font-size: 20px; font-weight:600;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" id="closeModalDiskon" class="btn btn-danger" data-dismiss="modal" style="font-size: 20px; font-weight:600;">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div> -->

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
                                                    <input type="text" class="form-control" id="total_dp" placeholder="10000" onkeypress="return /^[0-9]*$/i.test(event.key)" aria-describedby="rp" name="total_dp" style="font-size: 20px; font-weight:600;">
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

                        <div class="card-footer" style="padding: 10px 30px;">
                            <?php if ($po) : ?>
                                <button id="btnBayar" type="submit" class="btn btn-danger w-100" style="font-weight: bold; font-size: 25px; padding: 5px 30px; border-radius: 10px;">SIMPAN PO</button>
                            <?php else : ?>
                                <button id="btnBayar" type="submit" class="btn btn-danger w-100" style="font-weight: bold; font-size: 25px; padding: 5px 30px; border-radius: 10px;">BAYAR</button>
                            <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>