<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Produk || dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

    <h5 class="grey-text text-darken-4" style="text-align: center; margin-top:0px;"><strong>Produk</strong></h5>

    <!-- TABS -->
    <div class="row" style="margin-bottom:0px;">
      <div class="col s12">
        <ul class="tabs tabs-fixed-width">
          <li class="tab col s3"><a class="active" href="#kirim">Draft</a></li>
          <li class="tab col s3"><a href="#tawar">Produk Tidak Dipublikasi</a></li>
          <li class="tab col s3"><a href="#tunggu">Produk Tidak Dipublikasi</a></li>
        </ul>
      </div>

      <div id="tawar" class="col s12">
        <!-- Penawaran Produk -->
        <h5>Produk Tidak Dipublikasi</h5>
        <hr style="border-width: 1px 0 0 0; border-color: #ccc;">
        <div class="row" style="margin-bottom:0px;">
          <div class="col s12 m12" style="padding:0px;">
            <?php if($unpublish != null){
              foreach($unpublish as $dUnpublish){
                $imgUnpublish = explode(';', $dUnpublish->gambar);?>
            <div class="card" style="margin-bottom:0px;">
              <div class="card-content" style="padding:5px;">
                <div class="row valign-wrapper" style="margin-bottom:10px;">
                  <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                    <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $imgUnpublish[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
                  </div>
                  <div class="col s9" style="float:left;">
                    <p class="truncate" style="line-height:15px; font-size:14px;"><?php echo $dUnpublish->nama_produk?></p>
                    <p class="grey-text text-darken-2" style="line-height:15px; font-size:12px;">Rp <?php echo number_format($dUnpublish->harga)?> - Rp. <?php echo number_format($dUnpublish->harga_pasar)?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12" style="font-size:13px; line-height:24px;">
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Stok<span style="float:right;"><?php echo $dUnpublish->jml_stock?> <?php echo $dUnpublish->satuan?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Dilihat<span style="float:right;"><?php echo $dUnpublish->dilihat?></span></p>
                  </div>
                </div>
                <div class="row" style="margin-bottom:0px;">
                  <div class="col s6" style="padding-left:2px;">
                     <a href="<?=Base_url()?>User/publishProduk/<?php echo $dUnpublish->id?>" class="btn waves-effect waves-light" style="width:100%; background-color:#fe6719;">Publish</a>
                  </div>
                </div>
              </div>
            </div>
            <?php }?>
          <?php }?>
          </div>
        </div>
      </div>

      <div id="tunggu" class="col s12">
        <!-- Penawaran Produk -->
        <h5>Produk Dipublikasi</h5>
        <hr style="border-width: 1px 0 0 0; border-color: #ccc;">
        <div class="row" style="margin-bottom:0px;">
          <div class="col s12 m12" style="padding:0px;">
            <?php if($publish != null){
              foreach($publish as $dPublish){
                $imgPublish = explode(';', $dPublish->gambar);?>
            <div class="card" style="margin-bottom:0px;">
              <div class="card-content" style="padding:5px;">
                <div class="row valign-wrapper" style="margin-bottom:10px;">
                  <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                    <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $imgPublish[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
                  </div>
                  <div class="col s9" style="float:left;">
                    <p class="truncate" style="line-height:15px; font-size:14px;"><?php echo $dPublish->nama_produk?></p>
                    <p class="grey-text text-darken-2" style="line-height:15px; font-size:12px;">Rp <?php echo number_format($dPublish->harga)?> - Rp. <?php echo number_format($dPublish->harga_pasar)?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12" style="font-size:13px; line-height:24px;">
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Stok<span style="float:right;"><?php echo $dPublish->jml_stock?> <?php echo $dPublish->satuan?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Dilihat<span style="float:right;"><?php echo $dPublish->dilihat?></span></p>
                  </div>
                </div>
                <div class="row" style="margin-bottom:0px;">
                  <div class="col s6" style="padding-left:2px;">
                     <a href="<?=Base_url()?>User/unpublishProduk/<?php echo $dPublish->id?>" class="btn waves-effect waves-light" style="width:100%; background-color:red;">Unpublish</a>
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
        <!-- Penawaran Produk -->
        <h5>Draft Produk</h5>
        <hr style="border-width: 1px 0 0 0; border-color: #ccc;">
        <div class="row" style="margin-bottom:0px;">
          <div class="col s12 m12" style="padding:0px;">
            <?php if($draft != null){
              foreach($draft as $dDraft){
                $imgDraft = explode(';', $dDraft->gambar);?>
            <div class="card" style="margin-bottom:0px;">
              <div class="card-content" style="padding:5px;">
                <div class="row valign-wrapper" style="margin-bottom:10px;">
                  <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                    <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $imgDraft[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
                  </div>
                  <div class="col s9" style="float:left;">
                    <p class="truncate" style="line-height:15px; font-size:14px;"><?php echo $dDraft->nama_produk?></p>
                    <p class="grey-text text-darken-2" style="line-height:15px; font-size:12px;">Rp <?php echo number_format($dDraft->harga)?> - Rp. <?php echo number_format($dDraft->harga_pasar)?></p>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12" style="font-size:13px; line-height:24px;">
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Stok<span style="float:right;"><?php echo $dDraft->jml_stock?> <?php echo $dDraft->satuan?></span></p>
                    <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Dilihat<span style="float:right;"><?php echo $dDraft->dilihat?></span></p>
                  </div>
                </div>
                <div class="row" style="margin-bottom:0px;">
                  <div class="col s6" style="padding-left:2px;">
                     <a href="<?=Base_url()?>User/publishProduk/<?php echo $dDraft->id?>" class="btn waves-effect waves-light" style="width:100%; background-color:#fe6719;">Publish</a>
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
      <!-- End of Penawaran Produk -->
    <!-- End of TABS -->

    

    <!-- Modal Tawar -->
    <!-- End of Modal Tawar -->

    <!-- Modal Riwayat -->

    <!-- End of Modal Riwayat -->


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
  </body>

</html>