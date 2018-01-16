<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Transaksi || dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

    <h5 class="grey-text text-darken-4" style="text-align: center; margin-top:0px;"><strong>Transaksi</strong></h5>

    <!-- TABS -->
    <?php if($this->session->flashdata('success')){?>
      <div id="card-alert" class="card cyan lighten-5">
        <div class="card-content cyan-text darken-1">
            <p><?php echo $this->session->flashdata('success')?></p>
          </div>
      </div>
      <?php }?>
    <div class="row" style="margin-bottom:0px;">
      <div class="col s12">
        <ul class="tabs tabs-fixed-width">
          <li class="tab col s3"><a href="#riwayat">Riwayat Pembelian</a></li>
          <li class="tab col s3"><a href="#tunggu">Riwayat Pembelian Custom</a></li>
        </ul>
      </div>

      <div id="riwayat" class="col s12">
        <h5>Riwayat Transaksi</h5>
        <hr style="border-width: 1px 0 0 0; border-color: #ccc;">
        <div class="row" style="margin-bottom:0px;">
          <div class="col s12 m12" style="padding:0px;">
            <?php if($beli != null){
              foreach($beli as $dBeli){
                $img = explode(';', $dBeli->gambar);
                $stat = "";
                switch ($dBeli->status) {
                  case 0:
                    $stat = "Menunggu konfirmasi admin";
                    break;
                  case 1:
                    $stat = "Pembayaran selesai menunggu pengiriman";
                    break;
                  case 2:
                    $stat = "Pembayaran selesai menunggu pengiriman";
                    break;
                  case 3:
                    $stat = "<a href='".Base_url()."User/terimaBarang/".$dBeli->id_beli."' class='btn waves-effect waves-light' style='background-color:#fe6719;'>Terima</a>";
                    break;
                  case 5:
                    $stat = "Telah diterima";
                    break;
                }?>
            <div class="card asu" style="margin-bottom:0px;">
              <div class="card-content" style="padding:5px;">
                <p style="font-size: 13px; margin:0 0 10px 10px;">Nomor Transaksi: <?php echo $dBeli->id_beli?></p>
                <p style="font-size: 13px; margin:0 0 10px 10px;">Status Transaksi: <?php echo $stat?></p>
                <div class="row valign-wrapper" style="margin-bottom:10px;">
                  <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                    <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
                  </div>
                  <div class="col s9" style="float:left;">
                    <p class="truncate" style="line-height:15px; font-size:14px;"><?php echo $dBeli->nama_produk?></p>
                    <p class="truncate orange-text" style="line-height:15px; font-size:12px;"><?php echo $dBeli->nama_toko?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12" style="font-size:13px; line-height:24px;">
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total item<span style="float:right;"><?php echo number_format($dBeli->total_item)?> <?php echo $dBeli->satuan?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Harga<span style="float:right;">Rp <?php echo number_format($dBeli->total_harga)?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Biaya Pengiriman<span style="float:right;">Rp <?php echo number_format($dBeli->ongkir)?></span></p>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
            <center>
        <button style="background-color:#fe6719;" class="btn waves-effect" id="loadMore" type="submit" name="action">Lihat lebih banyak
        </button>
      </center>
          <?php }?>
          </div>
        </div>
      </div>
      
      <!-- End of Penawaran Produk -->
      <div id="tunggu" class="col s12">
        <h5>Pembelian Custom</h5>
        <hr style="border-width: 1px 0 0 0; border-color: #ccc;">
        <div class="row" style="margin-bottom:0px;">
          <div class="col s12 m12" style="padding:0px;">
          </div>
        </div>
      </div>
    </div>
    <!-- End of TABS -->

    

    <!-- Modal Tawar -->
    <!-- End of Modal Tawar -->

    <!-- Modal Riwayat -->

    <!-- End of Modal Riwayat -->

    <!-- Modal Alamat -->

    <!-- End of Alamat -->

  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>

  <script>
    $(document).ready(function() {
      $('select').material_select();
      $('ul.tabs').tabs();
    });
  </script>
  <script>
    $('.dropdown-button').dropdown({
        inDuration: 300,
        outDuration: 225,
        constrainWidth: false, // Does not change width of dropdown to that of the activator
        hover: false, // Activate on hover
        gutter: 0, // Spacing from edge
        belowOrigin: true, // Displays dropdown below the button
        alignment: 'right', // Displays dropdown with edge aligned to the left of button
        stopPropagation: false // Stops event propagation
      }
    );
  </script>
  <script>
  $('.modal').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '25%', // Starting top style attribute
      endingTop: '30%', // Ending top style attribute
    }
  );
</script>

<!-- Pengali Otomatis -->
<script type="text/javascript">
  $(function() {
      $source=$("#jumlah_produk");
      $source2=$("#harga_satuan");
      $output=$("#output");
      $source.keyup(function() {
         $output.text($source.val() * $source2.val());
      });
      $source2.keyup(function() {
         $output.text($source.val() * $source2.val());
      });
  });
</script>
 <script type="text/javascript">
    var size_list = $('.asu').length;
    var count = 5;
     $(document).ready(function(){
     $('.asu').hide();
    $('.asu:lt('+ count +')').show();
    $('#loadMore').click(function(){
      if(count <= size_list) {
          count += 5;
          $('.asu:lt('+ count +')').show();
     } else {
        $('#loadMore').hide();
          }
        });
      });
</script>
  </body>

</html>