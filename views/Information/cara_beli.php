<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Cara Beli || dollak-indonesia.com</title>

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
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Cara Membeli</strong></h5>
    <br>

    <div class="row">
      <div class="col s12">
        <h6><strong>5 Langkah Membeli Produk</strong></h6>
        <ol>
          <li><strong>Registrasi Sebagai Pedagang atau Umum. </strong>Jika Anda belum terdaftar sebagai user Dollak. Anda harus terdaftar sebagai PEDAGANG atau UMUM agar bisa membeli produk di Dollak.</li>
          <li><strong>Pilih Produk. </strong>Anda bisa menawar harga produk pilihan Anda atau mencoba produk yang disediakan oleh penjual.</li>
          <li><strong>Pembayaran Produk. </strong>Lengkapi informasi produk yang akan ditayangkan, agar menarik pembeli.</li>
          <li><strong>Pengiriman Produk. </strong>Tunggu konfirmasi pengiriman produk dari penjual.</li>
          <li><strong>Penerimaan Produk. </strong>Setelah produk Anda terima, segera konfirmasi produk telah diterima.</li>
        </ol>
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