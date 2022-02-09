<!DOCTYPE html>
<html style="line-height: 1.15;">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/kasir/public/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bill/mybill.css">
</head>

<body style="font-size: 1rem; font-weight: 400; line-height: 1.5; color: #212529; text-align: left; margin: 0;">
    <div class="bill" style="width: 21cm; height: 16.5cm; border: 1px solid black; padding: 0.8cm; background-image: url(/kasir/public/assets/img/bgfaktur.png); background-size: cover;">
        <div style="display: flex; flex-wrap: wrap; margin-right: -7.5px; margin-left: -7.5px; align-items: flex-end !important;">
            <div style="text-align: center; padding: 0px; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex-basis: 0; flex-grow: 1; max-width: 100%;">
                <?php $img = ROOTPATH . "public\assets\img\logofaktur.png"; ?>
                <img src="/kasir/public/assets/img/logofaktur.png" style="width: 180px; margin-bottom: 5px; vertical-align: middle; border-style: none;">
                <p style="font-size: 12px; text-align: center; margin: 0px;">Jl. dr. Samratulangi - Satria 1</p>
                <p style="font-size: 12px; text-align: center; margin: -5px 0px 5px 0px;">No. 44 B Kedaton - B. Lampung</p>
            </div>
            <div style="align-items: center !important; text-align: center; padding: 0px; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex-basis: 0; flex-grow: 1; max-width: 100%;">
                <div style="position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                    <!-- <h1 style="letter-spacing: 20px; font-size: 18px; margin: 0px 0px 15px 10px;">LUNAS</h1> -->
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
                    <p style="font-size: 16px; margin: 0px;">Nomor : PO-0001-27921</p>
                </div>
            </div>
            <div style="justify-content: flex-end !important; padding: 0px; position: relative; width: 100%; flex-basis: 0; flex-grow: 1; max-width: 100%;">
                <div style="justify-content: flex-end !important; display: flex; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                    <p style="font-size: 14px; margin: 0px 8px 0px 0px;">B. Lampung, 27 Sept 2021</p>
                </div>
                <div style="margin-left: 15px; position: relative; width: 100%; padding-right: 7.5px; padding-left: 7.5px; flex: 0 0 100%; max-width: 100%;">
                    <p style="font-size: 14px; margin: 6px 0px 0px 0px;">Kepada Yth.</p>
                    <p style="font-size: 14px; margin: -5px 0px 0px 0px;">Alfara Sehati Husada</p>
                    <p style="font-size: 14px; margin: -5px 0px 0px 0px;">Phone 0813 6796 6768</p>
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
            <?php for ($i = 0; $i < 10; $i++) : ?>
                <p style="width: 38px; float: left; margin: -5px 0px 0px 0px; padding: 0px;"><?= $i + 1 ?></p>
                <p style="width: 345px; float: left; margin: -5px 0px 0px 0px; padding: 0px;">ID Card</p>
                <p style="width: 50px; float: left; margin: -5px 0px 0px 0px; padding: 0px;">100</p>
                <p style="width: 30px; float: left; margin: -5px 0px 0px 0px; padding: 0px;">pcs</p>
                <p style="width: 123px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;">5,000</p>
                <p style="width: 145px; text-align: right; float: left; margin: -5px 0px 0px 0px; padding: 0px;">000,000,000</p>
            <?php endfor; ?>
        </div>
        <p style="font-weight: bolder; margin: 0px; text-align: center; position: relative; top: -10px">----------------------------------------------------------------------------</p>
        <div style="padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
            <div style="margin-top: -20px; padding: 0px; position: relative; width: 100%; flex: 0 0 50%; max-width: 50%;">
                <p style="font-size: 13px; margin: 6px 0px 0px 0px;">Terima Kasih atas kepercayaan Anda,</p>
                <p style="font-size: 13px; margin: -4px 0px 0px 0px;">semoga jalinan ini, akan berkelanjutan</p>
                <p style="font-size: 13px; margin: -4px 0px 0px 0px;">untuk waktu yang akan datang.</p>
                <!-- <p style="font-size: 13px; margin: -4px 0px 0px 0px;">------Terima Kasih-----</p> -->
            </div>
            <div style="padding: 0px; position: relative; width: 100%; flex: 0 0 50%; max-width: 50%;">
                <div style="justify-content: flex-end !important; margin-top: -26px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                    <p style="margin: 6px 0px 0px 0px;">Total :</p>
                    <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;">000,000,000</p>
                </div>
                <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                    <p style="margin: 6px 0px 0px 0px; font-weight: bolder;">------------------------------------</p>
                </div>
                <div style="justify-content: flex-end !important; margin-top: -17px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                    <p style="margin: 6px 0px 0px 0px;">Total DP :</p>
                    <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;">000,000,000</p>
                </div>
                <div style="justify-content: flex-end !important; margin-top: -19px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                    <p style="margin: 6px 0px 0px 0px; font-weight: bolder; text-align: right;">------------------------------------</p>
                </div>
                <div style="justify-content: flex-end !important; margin-top: -16px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                    <p style="margin: 6px 0px 0px 0px;">Sisa Pembayaran :</p>
                    <p style="margin: 6px 0px 0px 0px; text-align: right; width: 183px;">000,000,000</p>
                </div>
                <div style="justify-content: flex-end !important; margin-top: -16px; padding: 0px; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
                    <p style="margin: 6px 0px 0px 0px; font-weight: bolder; text-align: right;">------------------------------------</p>
                </div>
            </div>
        </div>
        <div style="margin-top: 45px; padding: 0px; display: flex; position: relative; width: 100%; flex: 0 0 100%; max-width: 100%;">
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
</body>

</html>