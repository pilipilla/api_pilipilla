<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Show room</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>

  <!-- Navbar -->
  <?php $this->load->view('User/navbar')?>
  <!-- End of Navbar -->

  <!-- Owner Info -->
  <div class="row">
    <div class="col s12 m12">
      <div class="card" style="margin-bottom:0px;">
        <div class="card-content" style="padding:5px;">
          <div class="row valign-wrapper" style="margin:5px;">
            <div class="col s4" style="padding-left:0px;">
              <img src="https://dollak-indonesia.com/assets/img/promo011.png" alt="" class="circle responsive-img valign-wrapper">
            </div>
            <div class="col s8" style="padding:0px;">
              <p style="font-size:12px; color:#5d5d5d;">
                <img src="http://via.placeholder.com/50x50" style="height:10px; width:auto;">
                <?php echo $profile->nama_toko?>
              </p>
              <p style="font-size:12px; color:#5d5d5d;">
                <img src="http://via.placeholder.com/50x50" style="height:10px; width:auto;">
                <?php echo $profile->kabkota?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of Owner Info -->

  <div class="row">
    <div class="col s12">
      <!-- Deskripsi Produk -->
      <?php if($produk != null){?>
      <div class="row" style="margin-bottom:0px;">
        <?php $no = 1;
        foreach($produk as $dKat){
          $gbr = explode(';', $dKat->gambar);
          $id_kat = $dKat->id_kat;
          if ($gbr[0]=="")
          {
              $imgshow="https://dollak-indonesia.com/assets/img/promo011.png";
          }
          else { $imgshow= "https://dollak-indonesia.com/dollakv2/data/".$gbr[0];
          }?>
        <a href="<?=Base_url()?>produk/detail/<?php echo $dKat->id?>/<?php echo url_title($dKat->nama_produk, 'dash', TRUE)?>" class="asu">
          <div class="col s6 m6" style="padding:3px 3px;">
            <div class="card" style="margin-top:0px; margin-bottom:0px;">
              <div class="card-image">
                <img src="<?php echo $imgshow?>" style="min-width:135px; height:130px; object-fit: contain; margin-right:auto; margin-left:auto;">
              </div>
              <div class="card-content" style="padding:4px;">
                <p class="truncate" style="font-weight:bold; color: #2d2d2d; font-size: 13px;"><?php echo $dKat->nama_produk?></p>
                <p style="color: #5d5d5d; font-size: 11px;">Rp <?php echo number_format($dKat->harga)?> - Rp <?php echo number_format($dKat->harga_pasar)?></p>
                <p style="color: #5d5d5d; font-size: 11px;">Minimal Order : <?php echo $dKat->min_order?></p>
              </div>
            </div>
          </div>
        </a>
        <?php }?>
      </div>
      <br>
      <center>
         <button style="background-color:#fe6719; width:100%;" class="btn waves-effect" id="loadMore" type="submit" name="action">Lihat lebih banyak
          </button>
      </center>
    </div>
  </div>
  <br>
  <?php } else{?>
  <a href="#" class="asu">
    <div class="col s6 m6" style="padding:3px 3px;">
      
    </div>
    </a>
  <?php }?>
  <!-- end of Deskripsi Produk -->

  <!-- FOOTER -->
  <!-- End of FOOTER -->

  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>
 
  </body>
</html>

<script>
  $(document).ready(function(){
    $(".owl-carousel").owlCarousel();
    $('select').material_select();
  });
</script>

<script>
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    responsive:{
      0:{
          items:1
      },
      600:{
          items:1
      },
      1000:{
          items:1
      }
    }
  })
</script>

<script type="text/javascript">
  $('.button-collapse').sideNav({
    menuWidth: 300, // Default is 240
    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
  $('.collapsible').collapsible();
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
    var count = 4;
     $(document).ready(function(){
     $('.asu').hide();
    $('.asu:lt('+ count +')').show();
    $('#loadMore').click(function(){
      if(count <= size_list) {
          count += 4;
          $('.asu:lt('+ count +')').show();
     } else {
        $('#loadMore').hide();
          }
        });
      });
</script>