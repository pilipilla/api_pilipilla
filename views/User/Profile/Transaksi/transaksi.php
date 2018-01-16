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
    <div class="row" style="margin-bottom:0px;">
      <div class="col s12">
        <ul class="tabs tabs-fixed-width">
          <li class="tab col s3"><a class="active" href="#tawar">Penawaran Produk</a></li>
          <li class="tab col s3"><a href="#tunggu">Tunggu Pembayaran</a></li>
          <li class="tab col s3"><a href="#kirim">Siap Dikirim</a></li>
          <li class="tab col s3"><a href="#bayar">Konfirmasi Sampai</a></li>
          <li class="tab col s3"><a href="#riwayat">Riwayat Penjualan</a></li>
        </ul>
      </div>
      <div id="tawar" class="col s12">
        <!-- Penawaran Produk -->
        <h5>Penawaran Produk</h5>
        <hr style="border-width: 1px 0 0 0; border-color: #ccc;">
        <div class="row" style="margin-bottom:0px;">
        <?php if($keranjang != null){
          foreach($keranjang as $dKeranjang){
            $img = explode(';', $dKeranjang->gambar)?>
          <div class="col s12 m12" style="padding:0px;">
            <div class="card" style="margin-bottom:0px;">
              <div class="card-content" style="padding:5px;">
                <p style="font-size: 13px; margin:0 0 10px 10px;">Nomor Transaksi: <?php echo $dKeranjang->id?></p>
                <div class="row valign-wrapper" style="margin-bottom:10px;">
                  <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                    <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
                  </div>
                  <div class="col s9" style="float:left;">
                    <p class="truncate" style="line-height:15px; font-size:14px;">Pembeli : <?php echo $dKeranjang->nama_customer?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12" style="font-size:13px; line-height:24px;">
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total item<span style="float:right;"><?php echo number_format($dKeranjang->total_item)?> <?php echo $dKeranjang->satuan?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total harga penawaran<span style="float:right;">Rp <?php echo number_format($dKeranjang->total_harga)?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Biaya Pengiriman<span style="float:right;">Rp <?php echo number_format($dKeranjang->ongkir)?></span></p>
                  </div>
                </div>
                <div class="row" style="margin-bottom:0px;">
                  <div class="col s12" style="padding-left:2px;">
                     <a href="<?=Base_url()?>profile/transaksi/keranjang/detail/<?php echo $dKeranjang->id?>" class="btn waves-effect waves-light" style="width:100%; background-color:#fe6719;">Detail</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php }?>
        <?php }?>
        </div>
      </div>
      <!-- End of Penawaran Produk -->
      <div id="tunggu" class="col s12">
        <h5>Tunggu Pembayaran</h5>
        <hr style="border-width: 1px 0 0 0; border-color: #ccc;">
        <div class="row" style="margin-bottom:0px;">
          <div class="col s12 m12" style="padding:0px;">
            <?php if($tunggu != null){
              foreach($tunggu as $dTunggu){
                $imgTunggu = explode(';', $dTunggu->gambar);?>
            <div class="card" style="margin-bottom:0px;">
              <div class="card-content" style="padding:5px;">
                <p style="font-size: 13px; margin:0 0 10px 10px;">Nomor Transaksi: <?php echo $dTunggu->id_beli?></p>
                <div class="row valign-wrapper" style="margin-bottom:10px;">
                  <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                    <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $imgTunggu[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
                  </div>
                  <div class="col s9" style="float:left;">
                    <p class="truncate" style="line-height:15px; font-size:14px;"><?php echo $dTunggu->nama_produk?></p>
                    <p class="truncate orange-text" style="line-height:15px; font-size:12px;">Pembeli : <?php echo $dTunggu->nama_customer?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12" style="font-size:13px; line-height:24px;">
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total item<span style="float:right;"><?php echo number_format($dTunggu->total_item)?> <?php echo $dTunggu->satuan?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total harga<span style="float:right;">Rp <?php echo number_format($dTunggu->total_harga)?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Biaya Pengiriman<span style="float:right;">Rp <?php echo number_format($dTunggu->ongkir)?></span></p>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          <?php }?>
          </div>
        </div>
      </div>
      <div id="kirim" class="col s12">
        <h5>Siap Dikrim</h5>
        <hr style="border-width: 1px 0 0 0; border-color: #ccc;">
        <div class="row" style="margin-bottom:0px;">
          <div class="col s12 m12" style="padding:0px;">
            <?php if($kirim != null){
              foreach($kirim as $dKirim){
                $imgKirim = explode(';', $dKirim->gambar);?>
            <div class="card" style="margin-bottom:0px;">
              <div class="card-content" style="padding:5px;">
                <p style="font-size: 13px; margin:0 0 10px 10px;">Nomor Transaksi: <?php echo $dKirim->id_beli?></p>
                <div class="row valign-wrapper" style="margin-bottom:10px;">
                  <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                    <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $imgKirim[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
                  </div>
                  <div class="col s9" style="float:left;">
                    <p class="truncate" style="line-height:15px; font-size:14px;"><?php echo $dKirim->nama_produk?></p>
                    <p class="truncate orange-text" style="line-height:15px; font-size:12px;">Pembeli : <?php echo $dKirim->nama_customer?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12" style="font-size:13px; line-height:24px;">
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total item<span style="float:right;"><?php echo number_format($dKirim->total_item)?> <?php echo $dTunggu->satuan?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total harga<span style="float:right;">Rp <?php echo number_format($dKirim->total_harga)?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Biaya Pengiriman<span style="float:right;">Rp <?php echo number_format($dKirim->ongkir)?></span></p>
                  </div>
                </div>
                <div class="row" style="margin-bottom:0px;">
                  <div class="col s12" style="padding-left:2px;">
                     <a href="<?=Base_url()?>User/kirimBarang/<?php echo $dKirim->id_beli?>" class="btn waves-effect waves-light" style="width:100%; background-color:#fe6719;">Kirim</a>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          <?php }?>
          </div>
        </div>
      </div>
      <div id="bayar" class="col s12">
        <h5>Konfirmasi Terima Barang</h5>
        <hr style="border-width: 1px 0 0 0; border-color: #ccc;">
        <div class="row" style="margin-bottom:0px;">
          <div class="col s12 m12" style="padding:0px;">
            <?php if($terima != null){
              foreach($terima as $dTerima){
                $imgTerima = explode(';', $dTerima->gambar);?>
            <div class="card" style="margin-bottom:0px;">
              <div class="card-content" style="padding:5px;">
                <p style="font-size: 13px; margin:0 0 10px 10px;">Nomor Transaksi: <?php echo $dTerima->id_beli?></p>
                <div class="row valign-wrapper" style="margin-bottom:10px;">
                  <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                    <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $imgTerima[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
                  </div>
                  <div class="col s9" style="float:left;">
                    <p class="truncate" style="line-height:15px; font-size:14px;"><?php echo $dTerima->nama_produk?></p>
                    <p class="truncate orange-text" style="line-height:15px; font-size:12px;">Pembeli : <?php echo $dTerima->nama_customer?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12" style="font-size:13px; line-height:24px;">
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total item<span style="float:right;"><?php echo number_format($dTerima->total_item)?> <?php echo $dTerima->satuan?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total harga<span style="float:right;">Rp <?php echo number_format($dTerima->total_harga)?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Biaya Pengiriman<span style="float:right;">Rp <?php echo number_format($dTerima->ongkir)?></span></p>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          <?php }?>
          </div>
        </div>
      </div>
      <div id="riwayat" class="col s12">
        <h5>Konfirmasi Terima Barang</h5>
        <hr style="border-width: 1px 0 0 0; border-color: #ccc;">
        <div class="row" style="margin-bottom:0px;">
          <div class="col s12 m12" style="padding:0px;">
            <?php if($riwayat != null){
              foreach($riwayat as $dRiwayat){
                $imgRiwayat = explode(';', $dRiwayat->gambar);?>
            <div class="card" style="margin-bottom:0px;">
              <div class="card-content" style="padding:5px;">
                <p style="font-size: 13px; margin:0 0 10px 10px;">Nomor Transaksi: <?php echo $dRiwayat->id_beli?></p>
                <div class="row valign-wrapper" style="margin-bottom:10px;">
                  <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                    <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $imgRiwayat[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
                  </div>
                  <div class="col s9" style="float:left;">
                    <p class="truncate" style="line-height:15px; font-size:14px;"><?php echo $dRiwayat->nama_produk?></p>
                    <p class="truncate orange-text" style="line-height:15px; font-size:12px;">Pembeli : <?php echo $dRiwayat->nama_customer?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12" style="font-size:13px; line-height:24px;">
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total item<span style="float:right;"><?php echo number_format($dRiwayat->total_item)?> <?php echo $dRiwayat->satuan?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total harga<span style="float:right;">Rp <?php echo number_format($dRiwayat->total_harga)?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Biaya Pengiriman<span style="float:right;">Rp <?php echo number_format($dRiwayat->ongkir)?></span></p>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          <?php }?>
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
 
  </body>

</html>