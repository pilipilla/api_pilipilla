<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Dollak Indonesia</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>

  <!-- Navbar -->
  <?php $this->load->view('User/navbar')?>
  <!-- End of Navbar -->

  <!-- Banner -->
  <div class="owl-carousel carousel-banner">
    <div class="card">
      <div class="card-image">
        <img src="<?=base_url();?>assets/img/banner-main-1.jpg">
      </div>
    </div>
    <div class="card">
      <div class="card-image">
        <img src="<?=base_url();?>assets/img/banner-main-2.jpg">
      </div>
    </div>
    <div class="card">
      <div class="card-image">
        <img src="<?=base_url();?>assets/img/banner-main-3.jpg">
      </div>
    </div>
  </div>
  <?php if($this->session->flashdata('success')){?>
  <div id="card-alert" class="card cyan lighten-5">
    <div class="card-content cyan-text darken-1">
        <p><?php echo $this->session->flashdata('success')?></p>
      </div>
  </div>
  <?php }?>
  <!-- end of Banner -->

  <!-- Produk Terbaru -->
  <h5>Produk Terbaru<span class="right" style="font-size: 12px;"></span></h5>
  <div class="row">
    <?php foreach($terbaru as $d){
      $gmbr = explode(';',$d->gambar);?>
      <div class="col s6 m12" style="padding:3px 3px;">
        <div class="product">
          <a href="<?=Base_url()?>produk/detail/<?php echo $d->id?>/<?php echo url_title($d->nama_produk, 'dash', TRUE)?>">
            <div class="card">
              <div class="card-image waves-effect waves-block waves-light">
                <img src="https://dollak-indonesia.com/dollakv2/data/<?php echo $gmbr[0]?>">
              </div>
              <div class="card-content">
                <span class="card-title grey-text text-darken-4 truncate"><?php echo $d->nama_produk?></span>
                <p class="price red-text text-darken-4">Rp <?php echo number_format($d->harga)?> - Rp <?php echo number_format($d->harga_pasar)?></p>
              </div>
            </div>
          </a>
        </div>
      </div>
    <?php }?>
  </div>
  <!-- End of Produk Terbaru -->

  <!-- Produk Paling Dilihat -->
  <h5>Produk Paling Dilihat<span class="right" style="font-size: 12px;"></span></h5>
  <div class="row">
  <?php foreach($dilihat as $dLihat){
    $gambar = explode(';', $dLihat->gambar);?>
    <div class="col s6 m6" style="padding:3px 3px;">
      <div class="product">
        <a href="<?=Base_url()?>produk/detail/<?php echo $dLihat->id?>/<?php echo url_title($dLihat->nama_produk, 'dash', TRUE)?>">
          <div class="card">
            <div class="card-image">
              <img src="https://dollak-indonesia.com/dollakv2/data/<?php echo $gambar[0]?>">
            </div>
            <div class="card-content">
              <span class="card-title grey-text text-darken-4 truncate"><?php echo $dLihat->nama_produk?></span>
              <p class="price red-text text-darken-4">Rp <?php echo number_format($dLihat->harga)?> - Rp <?php echo number_format($dLihat->harga_pasar)?></p>
            </div>
          </div>
        </a>
      </div>
    </div>
  <?php }?>
  </div>

  <h5>Produk Untuk Konsumen<span class="right" style="font-size: 12px;"></span></h5>
  <div class="row">
  <?php foreach($konsumen as $dKonsumen){
    $gKonsumen = explode(';', $dKonsumen->gambar);?>
    <div class="col s6 m6" style="padding:3px 3px;">
      <div class="product">
        <a href="<?=Base_url()?>produk/detail/<?php echo $dKonsumen->id?>/<?php echo url_title($dKonsumen->nama_produk, 'dash', TRUE)?>">
          <div class="card">
            <div class="card-image">
              <img src="https://dollak-indonesia.com/dollakv2/data/<?php echo $gKonsumen[0]?>">
            </div>
            <div class="card-content">
              <span class="card-title grey-text text-darken-4 truncate"><?php echo $dKonsumen->nama_produk?></span>
              <p class="price red-text text-darken-4">Rp <?php echo number_format($dKonsumen->harga)?> - Rp <?php echo number_format($dKonsumen->harga_pasar)?></p>
            </div>
          </div>
        </a>
      </div>
    </div>
  <?php }?>
  </div>

  <h5>Produk Untuk Pedagang<span class="right" style="font-size: 12px;"></span></h5>
  <div class="row">
  <?php foreach($pedagang as $dPedagang){
    $gPedangang = explode(';', $dPedagang->gambar);?>
    <div class="col s6 m6" style="padding:3px 3px;">
      <div class="product">
        <a href="<?=Base_url()?>produk/detail/<?php echo $dPedagang->id?>/<?php echo url_title($dPedagang->nama_produk, 'dash', TRUE)?>">
          <div class="card">
            <div class="card-image">
              <img src="https://dollak-indonesia.com/dollakv2/data/<?php echo $gPedangang[0]?>">
            </div>
            <div class="card-content">
              <span class="card-title grey-text text-darken-4 truncate"><?php echo $dPedagang->nama_produk?></span>
              <p class="price red-text text-darken-4">Rp <?php echo number_format($dPedagang->harga)?> - Rp <?php echo number_format($dPedagang->harga_pasar)?></p>
            </div>
          </div>
        </a>
      </div>
    </div>
  <?php }?>
  </div>
  <!-- end of Produk Paling Dilihat -->

  <div id="demo"></div>

  <!-- FOOTER -->
  <?php $this->load->view('User/footer')?>
  <!-- End of FOOTER -->



  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>
  <script src="<?=Base_url()?>assets/js/custom.js"></script>

  </body>
</html>