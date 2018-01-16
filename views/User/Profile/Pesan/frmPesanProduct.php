<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Pesan <?php echo $pesan->nama_produk?> || dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <?php if($this->session->flashdata('failed')){?>
    <div id="card-alert" class="card red">
        <div class="card-content white-text">
          <p><?php echo $this->session->flashdata('failed')?></p>
        </div>
    </div>
    <?php }?>
  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Kirim Pesan</strong></h5>

    <!-- Form Daftar -->
    <div class="row">
      <form class="col s12" method="POST" action="<?=Base_url()?>Product/postPesan">
        <p>Kirim pesan untuk <b><?php echo $pesan->nama_toko?></b></p>
        <p style="margin: 5px 0;">
          <input class="with-gap" name="pertanyaan" type="radio" id="radio1" value="Berapa lama waktu pengiriman barang?" />
          <label for="radio1" class="grey-text text-darken-3" style="font-size:13px;">Berapa lama waktu pengiriman barang?</label>
        </p>
        <p style="margin: 5px 0;">
          <input class="with-gap" name="pertanyaan" type="radio" id="radio2" value="Bisa jelaskan tentang material produk?" />
          <label for="radio2" class="grey-text text-darken-3" style="font-size:13px;">Bisa jelaskan tentang material produk?</label>
        </p>
        <p style="margin: 5px 0;">
          <input class="with-gap" name="pertanyaan" type="radio" id="radio3" value="Bagaimana packing produk saat pengiriman?" />
          <label for="radio3" class="grey-text text-darken-3" style="font-size:13px;">Bagaimana packing produk saat pengiriman?</label>
        </p>
        <p style="margin: 5px 0;">
          <input class="with-gap" name="pertanyaan" type="radio" id="radio4" value="Bagaimana ketentuan harga untuk pembelian rutin?" />
          <label for="radio4" class="grey-text text-darken-3" style="font-size:13px;">Bagaimana ketentuan harga untuk pembelian rutin?</label>
        </p>
        <p style="margin: 5px 0;">
          <input class="with-gap" name="pertanyaan" type="radio" id="radio5" value="Jasa kurir/ekspedisi apa yang anda gunakan untuk pengiriman produk?" />
          <label for="radio5" class="grey-text text-darken-3" style="font-size:13px;">Jasa kurir/ekspedisi apa yang anda gunakan untuk pengiriman produk?</label>
        </p>
        <p style="margin: 5px 0;">
          <input class="with-gap" name="pertanyaan" type="radio" id="radio6" value="Apa ada peluang keagenan, dan bagaimana ketentuannya jika ada?" />
          <label for="radio6" class="grey-text text-darken-3" style="font-size:13px;">Apa ada peluang keagenan, dan bagaimana ketentuannya jika ada?</label>
        </p>
        <p style="margin: 5px 0;">
          <input class="with-gap" name="pertanyaan" type="radio" id="radio7" value="Tanggal berapa produk kadaluarsa?" />
          <label for="radio7" class="grey-text text-darken-3" style="font-size:13px;">Tanggal berapa produk kadaluarsa?</label>
        </p>
        <p style="margin: 5px 0;">
          <input class="with-gap" name="pertanyaan" type="radio" id="radio8" />
          <label for="radio8" class="grey-text text-darken-3" style="font-size:13px;">Pertanyaan Lainnya</label>
        </p>
         <div class="row" style="margin-bottom: 10px;" id="lain">
          <div class="input-field col s12 m12">
            <input type="text" id="nama" name="lainnya" class="validate" style="margin-bottom: 0px; height: 20px;">
            <label for="nama" class="grey-text text-darken-3">Pertanyaan lainnya:</label>
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;" id="lain">
          <div class="input-field col s12 m12">
            <input type="hidden" id="nama" name="dest_user" value="<?php echo $pesan->owner?>" class="validate" style="margin-bottom: 0px; height: 20px;">
            <input type="hidden" id="nama" name="subjek" value="<?php echo $pesan->nama_produk?>" class="validate" style="margin-bottom: 0px; height: 20px;">
            <input type="hidden" id="nama" name="id_product" value="<?php echo $pesan->id?>" class="validate" style="margin-bottom: 0px; height: 20px;">
          </div>
        </div>
        <center>
          <button class="btn waves-effect waves-light" type="submit" name="action" style="width:100%; background-color:#fe6719;">Kirim Pesan
          </button>
        </center>

      </form>
    </div>
    <!-- end of Form Daftar -->
  </div>


  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#lain').hide();
      $('select').material_select();
      $('#radio8').click(function(){
        $('#lain').show();
      });
    });
  </script>
  <script>
    $('#radio_onn').click(function()
      {
        $('#item_shipping_cost').removeAttr("disabled");
      });

    $('#item_shipping_false').click(function()
    {
      $('#item_shipping_cost').attr("disabled","disabled");
    });
  </script>
 
  </body>

</html>