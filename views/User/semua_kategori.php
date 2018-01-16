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

  <!-- Semua Kategori -->
  <div class="row">
    <div class="col s12">
      <h5>Semua Kategori<span class="right" style="font-size: 12px;"></span></h5>
      <div class="kategori collection">
        <?php foreach($kategori as $dKat){?>
        <a href="<?=Base_url()?>kategori/<?php echo $dKat->id?>/<?php echo url_title($dKat->namagrup, 'dash', TRUE)?>" class="collection-item truncate">
          <?php echo $dKat->namagrup?></a>
        <?php }?>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php $this->load->view('User/footer')?>
  <!-- End of FOOTER -->

  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>

<script type="text/javascript">
  $('.button-collapse').sideNav({
    menuWidth: 300, // Default is 240
    closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  );
  $('.collapsible').collapsible();
</script>
 
  </body>
</html>