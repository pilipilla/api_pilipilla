<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Filter</title>
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
        </div>
      </div>
    </div>
    </a>
    <?php }?>
  </div>
  <br>
  <center>
     <button class="btn waves-effect" id="loadMore" type="submit" name="action">Lihat lebih banyak
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
  <!-- End of Product List -->

    <!-- Hidden Filter-->
  <div id="modal_filter" class="modal bottom-sheet">
    <h5 style="text-align:center; margin-top:5px;"><strong>Filter</strong></h5>
    <div class="row">
      <form class="col s12" method="GET">
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s6 m6">
            <input type="number" id="min_harga" name="max" class="validate" style="margin-bottom: 0px; height: 16px;">
            <label for="min_harga">Harga Minimum</label>
          </div>
          <div class="input-field col s6 m6">
            <input type="number" id="max_harga" name="min" class="validate" style="margin-bottom: 0px; height: 16px;">
            <input type="hidden" id="id_kat" name="kategori" value="<?php echo $id_kat?>" class="validate" style="margin-bottom: 0px; height: 16px;">
            <label for="min_harga">Harga Maksimum</label>
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <select class="browser-default" name="provinsi" id="id_provinsi" onchange="getCity()">
            <option value="" disabled selected>Provinsi</option>
            <?php foreach($provinsi as $dat){?>
            <option value="<?php echo $dat->id?>"><?php echo $dat->namaprov?></option>
            <?php }?>
          </select>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <select class="browser-default" name="kota" id="kabkota">
            <option value="" disabled selected>Kabupaten/Kota</option>
          </select>
        </div>
        <center>
           <button class="btn waves-effect" id="loadMore" type="submit">Submit
            </button>
        </center>
      </form>
    </div>
  </div>
  <!-- End of Hidden Filter -->

  <!-- Fixed Button -->
  <center>
    <div class="row grey lighten-2 center" style="height:50px; width:100%; position:fixed; bottom:0; z-index:99; margin-bottom:0px;">
      <div class="col s12 m12" style="padding:6px 3px;">
        <a class="waves-effect waves-light btn modal-trigger" href="#modal_filter" style="width:100%; background-color:#fe6719; margin-top:10px;">
          <i class="material-icons left">filter_list</i>filter
        </a>
      </div>
    </div>
  </center>

  <!-- FOOTER -->
  <!-- End of FOOTER -->

  <!--  Scripts-->
<script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>
 
  </body>
</html>
<script type="text/javascript">
  function getCity()
  {
    var id_prov = $('#id_provinsi').val();
    $.ajax({
      url : '<?=Base_url()?>User/getCity/'+id_prov,
      dataType: 'JSON',
      method : 'GET',
      success : function(response)
      {
          //alert(response);
          var dKota = '';
          for(i = 0; i < response.length; i++)
          {
            var da = response[i];
            //alert(da['kabkota']);
            dKota += '<option value="'+da['id']+'">'+da['kabkota']+'</option>';
          }
          $('#kabkota').html(dKota);
      }
    });
  }
</script>
<script type="text/javascript">
    var size_list = $('.asu').length;
    var count = 8;
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