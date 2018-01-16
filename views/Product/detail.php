<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>JUAL <?php echo $product->nama_produk?></title>
  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>

  <!-- Navbar -->
  <?php $this->load->view('User/navbar')?>
  <!-- End of Navbar -->
  <?php if($this->session->flashdata('success')){?>
  <div id="card-alert" class="card cyan lighten-5">
    <div class="card-content cyan-text darken-1">
        <p><?php echo $this->session->flashdata('success')?></p>
      </div>
  </div>
  <?php }?>
  <!-- Produk Image -->
  <div class="owl-carousel owl-theme">
  <?php $gmb = explode(';', $product->gambar);
  for($i = 0;$i < count($gmb); $i++){
    if($gmb[0] != ""){?>
    <div class="card" style="margin:0px;">
      <div class="card-image">
        <img src="https://dollak-indonesia.com/dollakv2/data/<?php echo $gmb[$i]?>" style="width:280px;height:250px; margin-right:auto; margin-left:auto; object-fit:cover;">
      </div>
    </div>
  <?php } else{?>
  <div class="card" style="margin:0px;">
      <div class="card-image">
        <img src="https://dollak-indonesia.com/assets/img/promo011.png">
      </div>
    </div>
  <?php }?>
  <?php }?>
  </div>
  <!-- end of Produk Image -->

  <!-- Produk view -->
  <div class="row" style="margin-bottom:0px;">
    <div class="col s12 m12">
      <div class="card" style="margin-bottom:0px;">
        <div class="card-content" style="padding:5px;">
          <p><strong><?php echo $product->nama_produk?></strong></p>
          <p style="color: red; font-size: 12px;">Rp <?php echo number_format($product->harga)?> - Rp <?php echo number_format($product->harga_pasar)?></p>
          <hr style="border-color: #ccc;">
          <div class="row" style="margin-bottom:0px;">
            <div class="col s6 m6" style="color:#5d5d5d;">
              <i class="material-icons">shopping_cart</i>
              <span style="font-size:12px;">Terjual <?php echo number_format($product->terjual)?></span>
            </div>
            <div class="col s6 m6" style="color:#5d5d5d;">
              <i class="material-icons">shopping_cart</i>
              <span style="font-size:12px;">Dilihat <?php echo number_format($product->dilihat)?></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of Produk View -->

  <!-- Detail Produk -->
  <div class="row" style="margin-bottom:0px;">
    <div class="col s12 m12">
      <div class="card" style="margin-bottom:0px;">
        <div class="card-content" style="padding:5px;">
          <p style="margin-bottom:10px;"><strong>Detail Produk</strong></p>
          <div class="row" style="margin-bottom:0px; color: #5d5d5d;">
            <div class="col s3" style="text-align:center; font-size:12px;">
              <i class="material-icons">shopping_cart</i>
              <p>Berat</p>
              <p><?php echo $product->berat?> gram</p>
            </div>
            <div class="col s3" style="text-align:center; font-size:12px;">
              <i class="material-icons">shopping_cart</i>
              <p>Min. Order</p>
              <p><?php echo $product->min_order?> <?php echo $product->satuan?></p>
            </div>
            <div class="col s3" style="text-align:center; font-size:12px; padding: 0px;">
              <i class="material-icons">shopping_cart</i>
              <p>Stock</p>
              <p><?php echo $product->jml_stock?></p>
            </div>
            <div class="col s3" style="text-align:center; font-size:12px;">
              <i class="material-icons">shopping_cart</i>
              <p>Sample</p>
              <p><?php echo $product->jml_sample?></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end of Detail Produk -->

  <!-- Deskripsi Produk -->
  <div class="row" style="margin-bottom:0px;">
    <div class="col s12 m12">
      <div class="card" style="margin-bottom:0px;">
        <div class="card-content" style="padding:5px;">
          <p><strong>Deskripsi</strong></p>
          <p style="font-size:12px; color: #5d5d5d;"><?php echo $product->deskripsi?> </p>
        </div>
      </div>
    </div>
  </div>
  <!-- end of Deskripsi Produk -->

  <!-- Owner Info -->
  <div class="row" style="margin-bottom:0px;">
    <div class="col s12 m12">
      <div class="card" style="margin-bottom:0px;">
        <div class="card-content" style="padding:5px;">
          <p><strong>Owner</strong></p>
          <div class="row valign-wrapper" style="margin:5px;">
            <div class="col s12" style="padding:0px;">
              <?php if($this->session->userdata('id_user') != null  && $this->session->id_user != $product->owner){?>
              <a href="<?=Base_url()?>produk/pesan/<?php echo $product->id?>/<?php echo url_title($product->nama_produk, 'hash', TRUE)?>" class="secondary-content"><i class="material-icons orange-text">email</i></a>
              <?php }?>
              <a href="<?=Base_url()?>Product/showroom/<?php echo $product->owner?>">
              <p style="font-size:12px; color:#5d5d5d;">
                <?php echo $product->nama_toko?>
              </p>
            </a>
              <p style="font-size:12px; color:#5d5d5d;">
                <?php echo $product->kabkota?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php if($pesan != null){?>
  <div class="row" style="margin-bottom:0px;">
    <div class="col s12 m12">
      <div class="card" style="margin-bottom:0px;">
        <div class="card-content" style="padding:5px;">
          <p><strong>Pesan</strong></p>
          <?php foreach($pesan as $message){?>
          <div class="row valign-wrapper" style="margin:5px;">
            <div class="col s12" style="padding:0px;">
              <?php if($message->dest_user == $product->owner){?>
              <p style="font-size:16px;"><?php echo $message->nama_user?></p>
              <p class="grey-text text-darken-2" style="font-size:14px;"><?php echo $message->isi?></p>
              
              <?php }?>
              <?php if($message->dest_user != $product->owner){?>
              <!-- <p style="font-size:16px;"><?php echo $message->nama_toko?> [Penjual]</p> -->
              <p style="font-size:14px;">Jawaban penjual: <span class="grey-text text-darken-2"><?php echo $message->isi?><span></p>
              <hr>
              <?php }?>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
  <?php }?>

<?php if($product->owner != $this->session->userdata('id_user')){?>
  <?php if($this->session->userdata('id_user') != null){?>
  <div class="row grey lighten-2" style="height:50px; width:100%; position:fixed; bottom:0; z-index:99; margin-bottom:0px;">
      <div class="col s6 m6" style="padding:6px 3px;">
        <a class="waves-effect waves-light btn modal-trigger blue darken-2" href="#modal_tawar" style="width:100%;">tawar</a>
      </div>
      <?php if($product->jml_sample != 0){?>
      <div class="col s6 m6" style="padding:6px 3px;">
        <a class="waves-effect waves-light btn modal-trigger" href="#modal_coba" style="width:100%; background-color:#fe6719;">coba satu</a>
      </div>
      <?php }?>
  </div>
  <?php } else{?>
  <div class="row grey lighten-2" style="height:50px; width:100%; position:fixed; bottom:0; z-index:99; margin-bottom:0px;">
      <div class="col s6 m6" style="padding:6px 3px;">
        <a class="waves-effect waves-light btn modal-trigger" href="<?=Base_url()?>login" style="width:200%; background-color:#fe6719;">Login</a>
      </div>
  </div>
  <?php }?>
<?php }?>

  <!-- Modal Tawar -->
  <div id="modal_tawar" class="modal">
    <div class="modal-content" style="padding:10px 0 0 0;">
      <div class="row">
        <form class="col s12" method="POST" action="<?=Base_url()?>Product/postNego">          
          <div class="row" style="margin-bottom: 10px;">
            <div class="input-field col s6 m6" style="padding-left:0px;">
              <input type="text" id="jumlah_produk" name="qty" onchange="minimal()" class="validate" style="margin-bottom:0px; height:20px;">
              <label for="jumlah_produk">Jumlah Produk</label>
              <input type="hidden" id="a" name="id_produk" value="<?php echo $product->id?>" class="validate" style="margin-bottom:0px; height:20px;">
              <input type="hidden" id="a" name="owner" value="<?php echo $product->owner?>" class="validate" style="margin-bottom:0px; height:20px;">
              <input type="hidden" id="a" name="subjek" value="<?php echo $product->nama_produk?>" class="validate" style="margin-bottom:0px; height:20px;">
            </div>
            <div class="input-field col s6 m6" style="padding-right:0px;">
              <input type="text" id="harga_satuan" name="harga_satuan" onchange="minimal_harga()" class="validate" style="margin-bottom: 0px; height: 20px;">
              <label for="harga_satuan">Harga/Satuan</label>
            </div>
          </div>
          <p style="font-size:13px;">Total Penawaran: Rp <span id="output" style="font-size:14px;">0</span></p>
          <div class="input-field col s12 m12" style="padding:0px;">
            <?php if($alamat != null){?>
            <select style="margin-bottom: 0px;" name="id_alamat">
              <option value="" disabled selected>Alamat</option>
              <?php foreach($alamat as $dAlamat){?>
              <option value="<?php echo $dAlamat->id?>"><?php echo $dAlamat->nama_data?> - <?php echo $dAlamat->penerima?>(<?php echo $dAlamat->nohp?>) - <?php echo $dAlamat->alamat?></option>
              <?php }?>
            </select>
            <?php } else{?>
            <p style="font-size:12px;">(*) Belum memasukan alamat? Silakan masukan alamat <a href="<?=Base_url()?>profile/alamat/form-tambah">di sini</a>.</p>
            <?php }?>
            <br>
          </div>
          <button class="btn waves-effect waves-light blue darken-2" type="submit" name="action" style="width:100%;">Tawar
          </button>
        </form>
      </div>
    </div>
  </div>
  <!-- End of Modal Tawar -->

  <!-- Modal Coba -->
  <div id="modal_coba" class="modal">
    <div class="modal-content" style="padding:10px 0 0 0;">
      <div class="row">
        <form class="col s12" method="POST" action="<?=Base_url()?>Product/postCoba">
        <input type="hidden" id="a" name="id_produk" value="<?php echo $product->id?>" class="validate" style="margin-bottom:0px; height:20px;">
        <input type="hidden" id="a" name="subjek" value="<?php echo $product->nama_produk?>" class="validate" style="margin-bottom:0px; height:20px;">
        <input type="hidden" id="a" name="price" value="<?php echo $product->hrg_sample?>" class="validate" style="margin-bottom:0px; height:20px;">
        <input type="hidden" id="a" name="owner" value="<?php echo $product->owner?>" class="validate" style="margin-bottom:0px; height:20px;">
           <div class="input-field col s12 m12" style="padding:0px;">
            <?php if($alamat != null){?>
            <select style="margin-bottom: 0px;" name="id_alamat">
              <option value="" disabled selected>Alamat</option>
              <?php foreach($alamat as $dAlamat){?>
              <option value="<?php echo $dAlamat->id?>"><?php echo $dAlamat->nama_data?> - <?php echo $dAlamat->penerima?>(<?php echo $dAlamat->nohp?>) - <?php echo $dAlamat->alamat?></option>
              <?php }?>
            </select>
            <?php } else{?>
            <p style="font-size:12px;">(*) Belum memasukan alamat? Silakan masukan alamat <a href="<?=Base_url()?>profile/alamat/form-tambah">di sini</a>.</p>
            <?php }?>
            <br>
          </div>
          <button class="btn waves-effect waves-light" type="submit" name="action" style="width:100%; background-color:#fe6719;">Coba Satu
          </button>
        </form>
      </div>
    </div>
  </div>
  <!-- End of Modal Coba -->

  <!-- Fixed Button -->
    
  <!-- end of Owner Info -->

  <!-- FOOTER -->
  <div style="visibility:hidden;"><?php $this->load->view('User/footer')?></div>
  
  <!-- End of FOOTER -->

  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets/swal/sweetalert.min.js"></script>
 
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
  function minimal()
  {
    var minimal = <?php echo $product->min_order?>;
    var input = $('#jumlah_produk').val();
    if(input > minimal)
    {
      swal("Error","Maaf anda tidak bisa membeli lebih dari batas quantitas pembelian", "error");
    }
  }
</script>

<script type="text/javascript">
  function minimal_harga()
  {
    var minimal1 = <?php echo $product->harga?>;
    var input1 = $('#harga_satuan').val();
    if(input1 < minimal1)
    {
      swal("Error","Maaf anda tidak bisa membeli kurang dari batas harga", "error");
    }
  }
</script>