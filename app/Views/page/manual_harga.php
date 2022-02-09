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
                <div class="col-sm-12 col-md-12">
                    <div class="col-sm-12">
                        <h4>Isi Nominal Harga Barang</h4>
                    </div>
                    <div class="col-sm-12">
                        <h1 style="font-size: 70px; font-weight: bold;">
                            <span>Rp&nbsp;</span>
                            <span id="harga"></span>
                        </h1>
                    </div>
                </div>
                <div class="fixed-bottom">
                    <form action="/home/sethargamanual">
                        <div class="col-sm-12 p-5">
                            <table style="width: 100%; height: 170px;">
                                <tr>
                                    <th style="width: 13%;"><button type="button" onclick="harga('1')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">1</button></th>
                                    <th style="width: 13%;"><button type="button" onclick="harga('2')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">2</button></th>
                                    <th style="width: 13%;"><button type="button" onclick="harga('3')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">3</button></th>
                                    <th style="width: 13%;"><button type="button" onclick="harga('4')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">4</button></th>
                                    <th style="width: 13%;"><button type="button" onclick="harga('5')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">5</button></th>
                                    <th style="width: 13%;"><button type="button" onclick="harga('6')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">6</button></th>
                                    <th style="width: 22%;"><button type="button" onclick="delHarga()" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;"><i class="fas fa-backspace"></i></button></th>
                                </tr>
                                <tr>
                                    <th><button type="button" onclick="clrHarga()" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">C</button></th>
                                    <th><button type="button" onclick="harga('7')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">7</button></th>
                                    <th><button type="button" onclick="harga('8')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">8</button></th>
                                    <th><button type="button" onclick="harga('9')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">9</button></th>
                                    <th><button type="button" onclick="harga('0')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">0</button></th>
                                    <th><button type="button" onclick="harga('000')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">000</button></th>
                                    <th id="buttonLanjut"></th>
                                </tr>
                            </table>
                            <input type="hidden" name="harga_manual" id="input_harga_manual" value="0">
                            <?php if ($po) : ?>
                                <input type="hidden" name="po" value="TRUE">
                            <?php endif; ?>
                        </div>
                    </form>
                    <div class="col-sm-12 col-md-12 py-4 d-flex align-items-center justify-content-around">
                        <a href="/"><img src="<?= base_url(); ?>/assets/img/katalogicon.png" style="width: 75px;"></a>
                        <a href="/manualharga"><img src="<?= base_url(); ?>/assets/img/manualiconactive.png" style="width: 78px;"></a>
                        <a href="/po"><img src="<?= base_url(); ?>/assets/img/poicon.png" style="width: 128px;"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>