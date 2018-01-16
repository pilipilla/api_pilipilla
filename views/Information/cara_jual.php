<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Mobile Dollak</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
  <style type="text/css">
    body {
      font-size: 13px;
      color: #555;
    }
    p {
      margin: 5px 0;
    }
    ol,ul {
      padding-left:24px;
      margin-top:5px;
    }
  </style>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Cara Menjual</strong></h5>
    <br>

    <div class="row">
      <div class="col s12">
        <h6><strong>5 Langkah Menayangkan Produk</strong></h6>
        <ol>
          <li><strong>Registrasi sebagai produsen. </strong>Jika Anda belum terdaftar sebagai user Dollak. Anda harus terdaftar sebagai PRODUSEN agar bisa menayangkan produk di Dollak.</li>
          <li><strong>Menayangkan produk. </strong>Anda bisa menayangkan produk Anda, dengan mengunjungi halaman profile Anda, Lalu pilih menu Tayangkan Produk di sisi sebelah kiri.</li>
          <li><strong>Isi Form Data Produk. </strong>Lengkapi informasi produk yang akan ditayangkan, agar menarik pembeli.</li>
          <li><strong>Upload Foto Produk. </strong>Tampilkan foto produk Anda yang memperlihatkan detail fisik produk Anda.</li>
          <li><strong>Selesai, Klik Tombol Tayangkan Produk. </strong>Selamat, Produk Anda telah ditayangkan dan bisa dilihat oleh orang-orang.</li>
        </ol>

        <h6><strong>Segmentasi Pembeli Berdasarkan Jumlah Minimum Order</strong></h6>
        <ul class="browser-default">
          <li>Jumlah Minimum Order Penjualan Produk untuk Pedagang harus dalam jumlah lebih dari satu.</li>
          <li>Jumlah Minimum Order Penjualan Produk untuk Konsumen adalah nol hingga satu</li>
        </ul>

        <h6><strong>Penentuan Rentang Harga</strong></h6>
        <ul>
          <li>
            <i class="tiny material-icons green-text text-darken-2 " style="display: inline-flex; vertical-align: middle; line-height:5px; font-weight:bold;">check</i>
            <span>Harga Maksimum memiliki nilai 200% - 300% dari harga minimum.</span>
            <blockquote class="green-text text-darken-2" style="margin: 2px 0 10px 20px; padding-left:10px; border-left-color:#81c784;">
              Contoh: Rp 25.000 - Rp 75.000
            </blockquote>
          </li>
          <li>
            <i class="tiny material-icons green-text text-darken-2 " style="display: inline-flex; vertical-align: middle; line-height:5px; font-weight:bold;">check</i>
            <span>Harga minimum mulai dari nol, harga maksimum bernilai harga tertinggi Produk.</span>
            <blockquote class="green-text text-darken-2" style="margin: 2px 0 10px 20px; padding-left:10px; border-left-color:#81c784;">
              Contoh: Rp Rp 0 - Rp 40.000
            </blockquote>
          </li>
          <li>
            <i class="tiny material-icons red-text" style="display: inline-flex; vertical-align: middle; line-height:5px; font-weight:bold;">clear</i>
            <span>Harga minimum mulai dari nol, harga maksimum bernilai harga tertinggi Produk.</span>
            <blockquote class="red-text" style="margin: 2px 0 10px 20px; padding-left:10px;">
              Contoh: Rp 25.000 - Rp 30.000
            </blockquote>
          </li>
          <li>
            <i class="tiny material-icons red-text" style="display: inline-flex; vertical-align: middle; line-height:5px; font-weight:bold;">clear</i>
            <span>Harga Maksimum sama dengan harga minimum.</span>
            <blockquote class="red-text" style="margin: 2px 0 10px 20px; padding-left:10px;">
              Contoh: Rp 10.000 - Rp 10.000
            </blockquote>
          </li>
          <li>
            <i class="tiny material-icons red-text" style="display: inline-flex; vertical-align: middle; line-height:5px; font-weight:bold;">clear</i>
            <span>Harga Maksimum lebih rendah dari harga minimum.</span>
            <blockquote class="red-text" style="margin: 2px 0 10px 20px; padding-left:10px;">
              Contoh: Rp 25.000 - Rp 10.000
            </blockquote>
          </li>
        </ul>
      </div>
    </div>
  </div>


  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
 
  </body>

</html>
