<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Pesan || dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>


  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center; margin-top:0px;"><strong>Pesan</strong></h5>
    <!-- Deskripsi Produk -->
    <div class="row" style="margin-bottom:0px;">
      <div class="col s12 m12">
        <div class="card" style="margin-bottom:0px;">
          <div class="card-content" style="padding:5px;">
            <a href="#!" class="secondary-content dropdown-button" data-activates="option"><i class="material-icons grey-text">more_vert</i></a>
              <!-- Dropdown Structure -->
              <ul id='option' class='dropdown-content'>
                <li><a href="<?=Base_url()?>profile/pesan/inbox/balas/<?php echo $detail->id?>/<?php echo url_title($detail->subjek, 'dash', TRUE)?>">Balas</a></li>
                <li><a href="#!">Hapus</a></li>
              </ul>
              <!-- End of Dropdown -->
            <p><strong><?php echo $detail->pengirim?></strong></p>
            <p class="grey-text text-darken-4" style="font-size:12px;">Subjek: <?php echo $detail->subjek?></p>
            <p style="font-size:11px; color: #5d5d5d; margin-top:5px;"><?php echo $detail->tgl?> </p>
            <hr style="color: #eee;">
            <p  class="grey-text text-darken-4" style="font-size:12px;"><?php echo $detail->isi?></p>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Deskripsi Produk -->
  </div>

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
 
  </body>

</html>