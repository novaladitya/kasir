<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- ======= MainContent -->
<section class="content" style="height: 100vh;">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <div class="col-sm-12 pt-3">
                <div class="col-sm-12 col-md-12 d-flex align-items-center justify-content-between mb-2">
                    <div class="col-md-5 d-flex justify-content-start align-items-center">
                        <?php if ($po != NULL) : ?>
                            <a href="/detailpo/<?= $po; ?>" class="far fa-arrow-alt-circle-left fa-3x" style="color: black;"></a>
                        <?php else : ?>
                            <a href="/process" class="far fa-arrow-alt-circle-left fa-3x" style="color: black;"></a>
                        <?php endif; ?>
                        <h1 style="font-weight: bold; font-size: 25px; margin: 0px;">&nbsp;&nbsp;Metode Pembayaran</h1>
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
                        <h4>Total Tagihan</h4>
                    </div>
                    <div class="col-sm-12">
                        <h1 style="font-size: 60px; font-weight: bold;">
                            <span>Rp&nbsp;</span>
                            <span><?= number_format($total); ?></span>
                        </h1>
                    </div>
                </div>
                <div class="tabs" style="min-width: 900px;">
                    <div class="tabs__bar-wrap">
                        <div class="tabs__bar">
                            <div class="tabs__controls md-ripple">Tunai</div>
                            <div class="tabs__controls md-ripple">Non Tunai</div>
                        </div>
                    </div>
                    <div class="tabs__content">
                        <?php if ($po != NULL) : ?>
                            <form id="formSukses" action="/home/inputsuksespo/<?= $po; ?>" method="POST">
                            <?php else : ?>
                                <form id="formSukses" action="/home/inputsukses" method="POST">
                                <?php endif; ?>
                                <div class="tabs__section">
                                    <div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <button type="button" onClick="uangPas(<?= $total; ?>)" class="btn btn-danger w-100" style="font-size: 25px; padding: 5px 0px;"><b>UANG PAS</b></button>
                                                <br> <br>
                                            </div>
                                            <div class="col-sm-12" style="margin-top: -17px;">
                                                <h4>Uang Diterima</h4>
                                            </div>
                                            <div class="col-sm-12">
                                                <h2 style="font-size: 50px; font-weight: 600;">
                                                    <span>Rp&nbsp;</span>
                                                    <span id="uang_tunai"></span>
                                                </h2>
                                                <input type="hidden" name="uang" id="input_uang_tunai" value="0">
                                            </div>
                                            <div class="col-sm-12">
                                                <table style="width: 100%; height: 150px;">
                                                    <tr>
                                                        <th style="width: 13%;"><button type="button" onclick="tunai('1')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">1</button></th>
                                                        <th style="width: 13%;"><button type="button" onclick="tunai('2')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">2</button></th>
                                                        <th style="width: 13%;"><button type="button" onclick="tunai('3')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">3</button></th>
                                                        <th style="width: 13%;"><button type="button" onclick="tunai('4')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">4</button></th>
                                                        <th style="width: 13%;"><button type="button" onclick="tunai('5')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">5</button></th>
                                                        <th style="width: 13%;"><button type="button" onclick="tunai('6')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">6</button></th>
                                                        <th style="width: 22%;"><button type="button" onclick="delTunai()" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;"><i class="fas fa-backspace"></i></button></th>
                                                    </tr>
                                                    <tr>
                                                        <th><button type="button" onclick="clrTunai()" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">C</button></th>
                                                        <th><button type="button" onclick="tunai('7')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">7</button></th>
                                                        <th><button type="button" onclick="tunai('8')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">8</button></th>
                                                        <th><button type="button" onclick="tunai('9')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">9</button></th>
                                                        <th><button type="button" onclick="tunai('0')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">0</button></th>
                                                        <th><button type="button" onclick="tunai('000')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">000</button></th>
                                                        <th id="buttonLanjutTunai"></th>
                                                    </tr>
                                                </table>
                                                <input type="hidden" name="metode_pembayaran" value="tunai">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <?php if ($po != NULL) : ?>
                                    <form action="/home/inputsuksespo/<?= $po; ?>" method="POST">
                                    <?php else : ?>
                                        <form action="/home/inputsukses" method="POST">
                                        <?php endif; ?>
                                        <div class="tabs__section">
                                            <div>
                                                <div class="row">
                                                    <div class="col-sm-12" style="margin-top: 55px;">
                                                        <h4>Transfer Diterima</h4>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <h2 style="font-size: 50px; font-weight: 600;">
                                                            <span>Rp&nbsp;</span>
                                                            <span id="uang_nontunai"></span>
                                                        </h2>
                                                        <input type="hidden" name="uang" id="input_uang_nontunai">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <table style="width: 100%; height: 150px;">
                                                            <tr>
                                                                <th style="width: 13%;"><button type="button" onclick="nonTunai('1')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">1</button></th>
                                                                <th style="width: 13%;"><button type="button" onclick="nonTunai('2')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">2</button></th>
                                                                <th style="width: 13%;"><button type="button" onclick="nonTunai('3')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">3</button></th>
                                                                <th style="width: 13%;"><button type="button" onclick="nonTunai('4')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">4</button></th>
                                                                <th style="width: 13%;"><button type="button" onclick="nonTunai('5')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">5</button></th>
                                                                <th style="width: 13%;"><button type="button" onclick="nonTunai('6')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">6</button></th>
                                                                <th style="width: 22%;"><button type="button" onclick="delNonTunai()" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;"><i class="fas fa-backspace"></i></button></th>
                                                            </tr>
                                                            <tr>
                                                                <th><button type="button" onclick="clrNonTunai()" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">C</button></th>
                                                                <th><button type="button" onclick="nonTunai('7')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">7</button></th>
                                                                <th><button type="button" onclick="nonTunai('8')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">8</button></th>
                                                                <th><button type="button" onclick="nonTunai('9')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">9</button></th>
                                                                <th><button type="button" onclick="nonTunai('0')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">0</button></th>
                                                                <th><button type="button" onclick="nonTunai('000')" class="btn btn-outline-secondary w-100 h-100" style="font-size: 30px;">000</button></th>
                                                                <th id="buttonLanjutNonTunai"></th>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <input type="hidden" name="metode_pembayaran" value="nontunai">
                                                </div>
                                            </div>
                                        </div>
                                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======= /MainContent ======= -->
<?= $this->endSection(); ?>