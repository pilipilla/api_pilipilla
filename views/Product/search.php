<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>JUAL <?php echo $q?></title>
  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>

  <!-- Navbar -->
  <?php $this->load->view('User/navbar')?>
  <!-- End of Navbar -->

  <!-- Product List -->
  <?php if($kategori != null){?>
  <div class="row" style="margin-bottom:0px;">
    <?php $no = 1;
    foreach($kategori as $dKat){
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
          <img src="<?php echo $imgshow?>" style="width:135px;height:130px;">
        </div>
        <div class="card-content" style="padding:4px;">
          <p class="truncate" style="font-weight:bold; color: #2d2d2d; font-size: 13px;"><?php echo $dKat->nama_produk?></p>
          <p style="color: #5d5d5d; font-size: 11px;">Rp <?php echo number_format($dKat->harga)?> - Rp <?php echo number_format($dKat->harga_pasar)?></p>
          <p style="color: #fe6719; font-size: 11px;"><?php echo $dKat->nama_toko?></p>
          <p style="color: #5d5d5d; font-size: 11px;">
            <i class="tiny material-icons" style="color: #fe6719;">location_on</i>
            <span class="truncate"><?php echo $dKat->kabkota?></span>
          </p>
          <p style="margin: 5px 0;">
            <input class="with-gap" name="pertanyaan" onclick="test(<?php echo $dKat->id?>)" type="radio" id="radio<?php echo $dKat->id?>" value="<?php echo $dKat->nama_produk?>" />
            <label for="radio<?php echo $dKat->id?>" class="grey-text text-darken-3" style="font-size:13px;">Bandingkan</label>
          </p>
          <p style="height:20px;">
              <?php if($dKat->jml_sample > 0){?>
              <img src="https://dollak-indonesia.com/assets/img/badges/custom.png" style="width:20px; height: auto; float:right;">
              <?php } if($dKat->premium_class > 0){?>
              <img src="https://dollak-indonesia.com/assets/img/badges/verified.png" style="width:20px; height: auto; float:right;">
              <?php } if($dKat->jml_sample > 0){?>
              <img src="https://dollak-indonesia.com/assets/img/badges/sample.png" style="width:20px; height: auto; float:right;">
              <?php }?>
            </p>
        </div>
      </div>
    </div>
    </a>
    <?php }?>
  </div>
  <br>
  <center>
     <button style="background-color:#fe6719;" class="btn waves-effect" id="loadMore" type="submit" name="action">Lihat lebih banyak
      </button>
  </center>
  <br>
  <?php } else{?>
  <a href="#">
    <div class="col s6 m6" style="padding:3px 3px;">
      <h6 class="grey-text text-darken-2 center-align">Hasil tidak ditemukan.</h6>
    </div>
  </a>
  <?php }?>

  <?php if($this->session->userdata('id_1') != null || $this->session->userdata('id_2') != null || $this->session->userdata('id_3') != null || $this->session->userdata('id_4') != null){?>
  <div class="row grey lighten-3 center" style="height:100px; width:100%; position:fixed; bottom:0; z-index:101; margin-bottom:0px;">
    <div class="col s12 m12" style="padding:6px 3px;">
      <div class="row" style="margin-bottom:0px;">
        <?php if($ses_1 != null){
          $img1 = explode(';', $ses_1->gambar)?>
        <div class="col s3" style="position:relative;">
          <img src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img1[0]?>" style="width:60px;height:50px;">
          <a href="#" onclick="hapus(<?php echo $ses_1->id?>)" class="black-text"><i class="tiny material-icons" style="position:absolute; top:-5px; right:2px;">clear</i></a>
        </div>
        <?php }?>

        <?php if($ses_2 != null){
          $img2 = explode(';', $ses_2->gambar)?>
        <div class="col s3" style="position:relative;">
          <img src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img2[0]?>" style="width:60px;height:50px;">
          <a href="#" onclick="hapus(<?php echo $ses_2->id?>)" class="black-text"><i class="tiny material-icons" style="position:absolute; top:-5px; right:2px;">clear</i></a>
        </div>
        <?php }?>

        <?php if($ses_3 != null){
          $img3 = explode(';', $ses_3->gambar)?>
        <div class="col s3" style="position:relative;">
          <img src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img3[0]?>" style="width:60px;height:50px;">
          <a href="#" onclick="hapus(<?php echo $ses_3->id?>)" class="black-text"><i class="tiny material-icons" style="position:absolute; top:-5px; right:2px;">clear</i></a>
        </div>
        <?php }?>

        <?php if($ses_4 != null){
          $img4 = explode(';', $ses_4->gambar)?>
        <div class="col s3" style="position:relative;">
          <img src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img4[0]?>" style="width:60px;height:50px;">
          <a href="#" onclick="hapus(<?php echo $ses_4->id?>)" class="black-text"><i class="tiny material-icons" style="position:absolute; top:-5px; right:2px;">clear</i></a>
        </div>
        <?php }?>
      </div>
    </div>
    <a href="<?=Base_url()?>banding" target="_blank" class="waves-effect waves-light btn blue darken-2" style="margin-bottom:10px; width:100%;">bandingkan</a>
  </div>
  <?php }?>

  <!-- FOOTER -->
  <div style="height:100px; visibility:hidden;"></div>
  <!-- End of FOOTER -->

  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets/swal/sweetalert.min.js"></script>
 
  </body>
</html>
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
<script type="text/javascript">
  $('.button-collapse').sideNav({
    menuWidth: 300, // Default is 240
    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
  $('.collapsible').collapsible();
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#kontol').hide();
    $('#sort').click(function(){
      $('#kontol').show();
      //alert('asasas');
    });
  });
</script>
<script>
  $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    $('.modal').modal();
  });     
</script>
<script>
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
<script>
  function test(id)
  {
    //var aa = $('#radio'+id).val();
    $.ajax({
      url : '<?=Base_url()?>Product/addBanding/'+id,
      success : function(response)
      {
        swal("Sukses!", response, "success");
        window.location.reload();
      }
    });
  }
</script>
<script>
  function hapus(id)
  {
    //var aa = $('#radio'+id).val();
    $.ajax({
      url : '<?=Base_url()?>Product/hapusBanding/'+id,
      success : function(response)
      {
        swal("Sukses!", response, "success");
        window.location.reload();
      }
    });
  }
</script>