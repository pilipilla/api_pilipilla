<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Keranjang || dollak-indonesia.com</title>

 <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

    <h5 class="grey-text text-darken-4" style="text-align: center; margin-top:0px;"><strong>Keranjang</strong></h5>
    <!-- Deskripsi Produk -->
    <div class="row" style="margin-bottom:0px;">
      <div class="col s12 m12">
      <?php if($keranjang != null){
          foreach($keranjang as $dKeranjang){
            $status;
            switch($dKeranjang->status){
              case 0:
              $status = "Nego";
              break;
              case 1:
              $status = "Deal Pihak Pembeli";
              break;
              case 2:
              $status = "Deal Penjual";
              break;
            }
            $img = explode(';', $dKeranjang->gambar)?>
        <div class="card asu" style="margin-bottom:0px;">
          <div class="card-content" style="padding:5px;">
            <p style="font-size: 13px; margin:0 0 10px 10px;">Nomor Transaksi: <?php echo $dKeranjang->id?></p>
            <p style="font-size: 13px; margin:0 0 10px 10px;">Status: <span class="badge"><?php echo $status?></span></p>
            <div class="row valign-wrapper" style="margin-bottom:10px;">
              <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
              </div>
              <div class="col s9" style="float:left;">
                <p class="truncate" style="line-height:15px; font-size:14px;"><?php echo $dKeranjang->nama_produk?></p>
                <p class="truncate orange-text" style="line-height:15px; font-size:12px;"><?php echo $dKeranjang->nama_toko?></p>
                <p class="grey-text text-darken-2" style="line-height:15px; font-size:12px;">Rp <?php echo number_format($dKeranjang->harga)?> - Rp. <?php echo number_format($dKeranjang->harga_pasar)?></p>
              </div>
            </div>
            <div class="row">
              <div class="col s12" style="font-size:13px; line-height:24px;">
                <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total item<span style="float:right;"><?php echo $dKeranjang->total_item?></span></p>
                <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total harga penawaran<span style="float:right;">Rp <?php echo number_format($dKeranjang->total_harga)?></span></p>
                <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Biaya Pengiriman<span style="float:right;">Rp <?php echo number_format($dKeranjang->total_harga)?></span></p>
              </div>
            </div>
            <div class="row" style="margin-bottom:0px;">
              <div class="col s12" style="padding-left:2px;">
                 <a href="<?=Base_url()?>profile/keranjang/detail/<?php echo $dKeranjang->id?>" class="btn waves-effect waves-light" style="width:100%; background-color:#fe6719;">Detail</a>
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
    <!-- end of Deskripsi Produk -->


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