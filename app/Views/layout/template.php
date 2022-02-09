<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Percetakan DETUDE</title>

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Favicons -->
  <link href="<?= base_url(); ?>/assets/img/logo.png" rel="icon">
  <link href="<?= base_url(); ?>/assets/img/logo.png" rel="apple-touch-icon">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/tabs-slider/css/tabs.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/bill/mybill.css">
  <style>
    @media print {
      @page {
        size: 210mm 155mm;
        margin: 0;
      }

      body {
        width: 210mm;
        height: 155mm;
        margin: 0;
        -webkit-print-color-adjust: exact;
      }
    }
  </style>

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.css">
</head>

<body class="hold-transition layout-fixed layout-navbar-fixed sidebar-collapse">
  <!-- ======= Wrapper ======= -->

  <!-- ======= Sidebar ======= -->
  <?= $this->include('layout/sidebar'); ?>
  <!-- ======= /Sidebar ======= -->

  <!-- ======= Konten ======= -->
  <div class="content-wrapper">
    <?= $this->renderSection('content'); ?>
  </div>
  <!-- ======= /Konten ======= -->

  <!-- ======= /Wrapper ======= -->

  <!-- JS Files -->
  <script src="<?= base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/bootstrap-input-spinner/bootstrap-input-spinner.js"></script>
  <script src="<?= base_url(); ?>/assets/plugins/tabs-slider/js/tabsSlider.js"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

  <?php if ($halaman == 'index') : ?>
    <script>
      $(document).ready(function() {
        $('#listBarang').DataTable({
          scrollY: '285px',
          scrollCollapse: true,
          paging: false,
          order: [],
          bInfo: false
        });
      });

      $(".bootstrap-input-spinner").inputSpinner({
        autoInterval: undefined
      });

      var $spinner = $('.bootstrap-input-spinner');
      var $jumlahItem = $("#jumlahItem");
      var $harga = $('.harga');
      var $totalHarga = $("#totalHarga");

      var $eachItem = [];
      var $eachHarga = [];
      for (i = 0; i < $harga.length; i++) {
        $eachHarga.push(parseInt($harga[i].getAttribute('harga')));
      }

      $spinner.on("input", function(event) {
        $eachItem = [];
        for (i = 0; i < $spinner.length; i++) {
          $eachItem.push(parseInt($spinner.eq(i).val().replace(/[.,]/g, '')));
        }
        $eachItem = $eachItem.filter((value, index) => (index % 2));

        $eachTotal = $eachItem.map(function(idx, idx2) {
          return idx * $eachHarga[idx2];
        });

        $jumlahItem.html(Intl.NumberFormat().format($eachItem.reduce((a, b) => (a + b || 0), 0)));
        $totalHarga.html(Intl.NumberFormat().format($eachTotal.reduce((a, b) => (a + b || 0), 0)));
      })

      var $btnCloseModalDiskon = $(".closeModalDiskon");
      var $subtotal = document.getElementById('subtotal').getAttribute('subtotal');
      var $total = $("#total");
      var $DP;
      var $diskon = $(".diskon");
      $inputDiskon = document.getElementById("inputDiskon");
      $inputDiskon.value = 0;

      $btnCloseModalDiskon.on('click', function() {
        var $sumDiskon = 0;
        for (i = 0; i < $diskon.length; i++) {
          $val = $diskon.eq(i).val();
          if (!$val) $val = 0;
          $sumDiskon += (parseInt($val) * parseInt($(".quantity").eq(i).html()));
        }
        $inputDiskon.value = $sumDiskon;
        if (!$DP) $DP = 0;
        $total.html(Intl.NumberFormat().format($subtotal - $sumDiskon - $DP));
        document.getElementById('displayDiskon').innerHTML = Intl.NumberFormat().format($sumDiskon);
      })

      var $btnCloseModalDP = document.getElementById("closeModalDP");
      $btnCloseModalDP.addEventListener('click', function(event) {
        $DP = document.getElementById("total_dp").value;
        if (!$DP) $DP = 0;
        $total.html(Intl.NumberFormat().format($subtotal - $inputDiskon.value - $DP));
        document.getElementById('displayDP').innerHTML = Intl.NumberFormat().format($DP);
      })

      var $btnBayar = document.getElementById("btnBayar");
      btnBayar.onclick = function() {
        var $inputNamaPelanggan = document.getElementById("namaPelanggan").value;
        var $inputNoPelanggan = document.getElementById("noTelepon").value;

        if (
          (!$inputNamaPelanggan) ||
          (!$inputNoPelanggan)
        ) {
          $('#modalPelanggan').modal('show');
        }
      }
    </script>
  <?php endif; ?>

  <?php if ($halaman == 'metode_pembayaran') : ?>
    <script>
      var opts = {
        draggable: true,
        slide: 0,
      };

      var elem = document.querySelector('.tabs');
      var tabs = new TabsSlider(elem, opts);

      var $val = '',
        $valNon = '';

      function tunai(num) {
        if (num == '<?= $total; ?>') {
          $val = '<?= $total; ?>';
        } else {
          $val += num;
        }
        document.getElementById("uang_tunai").textContent = Intl.NumberFormat().format($val);
        document.getElementById("input_uang_tunai").value = $val;
        btnLanjutTunai();
      }

      function uangPas(num) {
        tunai(num);
        document.getElementById("formSukses").submit();
      }

      function delTunai() {
        $val = $val.slice(0, -1);
        document.getElementById("uang_tunai").textContent = Intl.NumberFormat().format($val);
        document.getElementById("input_uang_tunai").value = $val;
        btnLanjutTunai();
      }

      function clrTunai() {
        $val = 0;
        document.getElementById('uang_tunai').textContent = $val;
        document.getElementById('input_uang_tunai').value = $val
        btnLanjutTunai();
      }

      function nonTunai(num) {
        $valNon += num;
        document.getElementById("uang_nontunai").textContent = Intl.NumberFormat().format($valNon);
        document.getElementById("input_uang_nontunai").value = $valNon;
        btnLanjutNonTunai();
      }

      function delNonTunai() {
        $valNon = $valNon.slice(0, -1);
        document.getElementById("uang_nontunai").textContent = Intl.NumberFormat().format($valNon);
        document.getElementById("input_uang_nontunai").value = $valNon;
        btnLanjutNonTunai();
      }

      function clrNonTunai() {
        $valNon = 0;
        document.getElementById('uang_nontunai').textContent = $valNon;
        document.getElementById('input_uang_nontunai').value = $valNon;
        btnLanjutNonTunai();
      }

      function btnLanjutTunai() {
        var $root = document.getElementById('buttonLanjutTunai');
        if (parseInt($val) != NaN && parseInt($val) >= <?= $total; ?>) {
          $root.innerHTML = '<button type="submit" class="btn btn-danger w-100 h-100">LANJUT</button>';
        } else {
          $root.innerHTML = '';
        }
      }

      function btnLanjutNonTunai() {
        var $root = document.getElementById('buttonLanjutNonTunai');
        if (parseInt($valNon) != NaN && parseInt($valNon) >= <?= $total; ?>) {
          $root.innerHTML = '<button type="submit" class="btn btn-danger w-100 h-100">LANJUT</button>';
        } else {
          $root.innerHTML = '';
        }
      }
    </script>
  <?php endif; ?>

  <?php if ($halaman == 'daftar_barang') : ?>
    <script>
      $(document).ready(function() {
        $('#listBarang').DataTable({
          scrollY: '50vh',
          scrollCollapse: true,
          paging: false,
          order: [],
          bInfo: false
        });
      });

      $('#modal-sm').on('show.bs.modal', function(event) {
        var a = $(event.relatedTarget)
        var id = a[0].getAttribute('data-id');

        document.getElementById('btnDelete').href = '<?= base_url() ?>/home/deletebarang/' + id;
      })
    </script>
  <?php endif; ?>

  <?php if ($halaman == 'manual_harga') : ?>
    <script>
      var $val = '';

      function harga(num) {
        $val += num;
        document.getElementById("harga").textContent = Intl.NumberFormat().format($val);
        document.getElementById("input_harga_manual").value = $val;
        btnLanjut();
      }

      function delHarga() {
        $val = $val.slice(0, -1);
        document.getElementById("harga").textContent = Intl.NumberFormat().format($val);
        document.getElementById("input_harga_manual").value = $val;
        btnLanjut();
      }

      function clrHarga() {
        $val = 0;
        document.getElementById('harga').textContent = $val;
        document.getElementById('input_harga_manual').value = $val;
        btnLanjut();
      }

      function btnLanjut() {
        var $root = document.getElementById('buttonLanjut');
        if (parseInt($val) != NaN) {
          $root.innerHTML = '<button type="submit" class="btn btn-danger w-100 h-100">LANJUT</button>';
        } else {
          $root.innerHTML = '';
        }
      }
    </script>
  <?php endif; ?>

  <?php if ($halaman == 'manual_barang') : ?>
    <script>
      var $btnMin = document.getElementById('btnMin');
      var $btnPlus = document.getElementById('btnPlus');
      var $inputQty = document.getElementById('inputQty');

      $btnMin.addEventListener("click", function() {
        if (parseInt($inputQty.value) <= 1) {
          $btnMin.disabled = true;
        } else {
          parseInt($inputQty.value--);
        }
      });
      $btnPlus.addEventListener("click", function() {
        if (parseInt($inputQty.value) >= 1) {
          $btnMin.disabled = false;
        }
        parseInt($inputQty.value++);
      });

      function avoidNan() {
        return ($inputQty.value || parseInt($inputQty.value = 1))
      }

      var $btnBayar = document.getElementById("btnBayar");
      btnBayar.onclick = function() {
        var $inputNamaPelanggan = document.getElementById("namaPelanggan").value;
        var $inputNoPelanggan = document.getElementById("noTelepon").value;

        if (
          (!$inputNamaPelanggan) ||
          (!$inputNoPelanggan)
        ) {
          $('#modalPelanggan').modal('show');
        }
      }

      var $btnCloseModalDP = document.getElementById("closeModalDP");
      $btnCloseModalDP.addEventListener('click', function(event) {
        var $DP = document.getElementById("total_dp").value;
        if (!$DP) $DP = 0;
        document.getElementById('displayDP').innerHTML = Intl.NumberFormat().format($DP);
      })
    </script>
  <?php endif; ?>

  <?php if ($halaman == 'daftar_po') : ?>
    <script>
      $(document).ready(function() {
        $('#listPO').DataTable({
          scrollY: '41vh',
          scrollCollapse: true,
          paging: false,
          order: []
        });
      });
    </script>
  <?php endif; ?>

  <?php if ($halaman == 'detail_po') : ?>
    <script>
      $('#modal-sm').on('show.bs.modal', function(event) {
        var a = $(event.relatedTarget)
        var id = a[0].getAttribute('data-id');

        document.getElementById('btnDelete').href = '<?= base_url() ?>/home/deletepo/' + id;
      })

      var pdf = new jsPDF('l', 'mm', [210, 165]);
      pdf.internal.write(0, "Tw");

      async function generatePDF() {
        var downloading = $(".fakturPDF");
        for (i = 0; i < downloading.length; i++) {
          downloading[i].style.display = null;
          await html2canvas(downloading[i], {
            allowTaint: true,
            useCORS: true,
            scale: 5,
            onrendered: function(canvas) {
              pdf.addImage(canvas.toDataURL("image/png"), 'PNG', 0, 0);
            }
          });
          if (i != downloading.length - 1) {
            pdf.addPage();
          }
          downloading[i].style.display = "none";
        }
        pdf.save("<?= $transaksiPO['no_transaksi_po'] . '.pdf'; ?>");
      }
    </script>
  <?php endif; ?>

  <?php if ($halaman == 'riwayat_transaksi' || $halaman == 'laporan') : ?>
    <script>
      $("#datepicker").daterangepicker({
        opens: 'left',
        maxDate: '<?= date('m/d/Y'); ?>',
        applyButtonClasses: 'btn-danger'
      });
      $('#datepicker').on('apply.daterangepicker', function(ev, picker) {
        document.getElementById('inputTanggal').value = picker.startDate.format('YYYY-MM-DD') + '|' + picker.endDate.format('YYYY-MM-DD');
        document.getElementById('tanggal').submit();
      });

      $('#modal-sm').on('show.bs.modal', function(event) {
        var a = $(event.relatedTarget)
        var id = a[0].getAttribute('data-id');

        var btnDelete = document.getElementById('btnDelete');
        btnDelete.onclick = function() {
          $.ajax({
              url: '<?= base_url() ?>/home/deletetransaksi/' + id
            })
            .done(function() {
              location.reload();
            });
        }
      })
    </script>
  <?php endif; ?>

  <?php if ($halaman == 'penjualan_produk') : ?>
    <script>
      $(document).ready(function() {
        $('#penjualanProduk').DataTable({
          scrollY: '380px',
          scrollCollapse: true,
          paging: false,
          order: [],
          searching: false,
          bInfo: false
        });
      });
    </script>
  <?php endif; ?>

  <?php if ($halaman == 'sukses') : ?>
    <script>
      var pdf = new jsPDF('l', 'mm', [210, 165]);
      pdf.internal.write(0, "Tw");
      var struk = new jsPDF('l', 'mm', [210, 165]);
      struk.internal.write(0, "Tw");

      async function generatePDF() {
        var downloading = $(".fakturPDF");
        for (i = 0; i < downloading.length; i++) {
          downloading[i].style.display = null;
          await html2canvas(downloading[i], {
            allowTaint: true,
            useCORS: true,
            scale: 5,
            onrendered: function(canvas) {
              pdf.addImage(canvas.toDataURL("image/png"), 'PNG', 0, 0);
            }
          });
          if (i != downloading.length - 1) {
            pdf.addPage();
          }
          downloading[i].style.display = "none";
        }
        pdf.save("<?= $transaksi['no_transaksi'] . '.pdf'; ?>");
      }

      async function generateStruk() {
        var printing = $(".struk");
        for (i = 0; i < printing.length; i++) {
          printing[i].style.display = null;
          await html2canvas(printing[i], {
            allowTaint: true,
            useCORS: true,
            scale: 5,
            onrendered: function(canvas) {
              struk.addImage(canvas.toDataURL("image/png"), 'PNG', 0, 0);
            }
          });
          if (i != printing.length - 1) {
            struk.addPage();
          }
          printing[i].style.display = "none";
        }

        var blob = new Blob([struk.output('blob')], {
          type: 'application/pdf'
        });
        var blobURL = URL.createObjectURL(blob);

        iframe = document.createElement('iframe');
        printing[0].appendChild(iframe);

        iframe.style.display = 'none';
        iframe.src = blobURL;
        iframe.onload = function() {
          setTimeout(function() {
            iframe.focus();
            iframe.contentWindow.print();
          }, 1);
        };
        generatePDF();
      }
    </script>
  <?php endif; ?>

  <?php if ($halaman == 'akun') : ?>
    <script>
      $(document).ready(function() {
        $('#listUser').DataTable({
          scrollY: '50vh',
          scrollCollapse: true,
          paging: false,
          order: []
        });
      });

      $('#modal-sm').on('show.bs.modal', function(event) {
        var a = $(event.relatedTarget)
        var id = a[0].getAttribute('data-id');

        document.getElementById('btnDelete').href = '<?= base_url() ?>/home/deleteuser/' + id;
      })
    </script>
  <?php endif; ?>
</body>

</html>