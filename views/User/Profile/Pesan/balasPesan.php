<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Pesan | dollak-indonesia.com</title>

  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <?php if($this->session->flashdata('failed')){?>
    <div id="card-alert" class="card red">
        <div class="card-content white-text">
          <p><?php echo $this->session->flashdata('failed')?></p>
        </div>
    </div>
    <?php }?>
  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Balas Pesan</strong></h5>

    <!-- Form Daftar --> 
    <div class="row">
      <form class="col s12" method="POST" action="<?=Base_url()?>User/postPesan">
        <p>Balas pesan untuk <b><?php echo $detail->pengirim?></b></p>
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s12 m12">
            <input type="text" id="nama" name="isi" class="validate" style="margin-bottom: 0px; height: 20px;">
            <label for="nama" class="grey-text text-darken-3">Balas</label>
            <input type="hidden" id="b" name="subjek" class="validate" value="<?php echo $detail->subjek?>" style="margin-bottom: 0px; height: 20px;">
            <input type="hidden" id="a" name="pengirim" value="<?php echo $detail->from_user?>" class="validate" style="margin-bottom: 0px; height: 20px;">
            <input type="hidden" id="a" name="id" value="<?php echo $detail->id?>" class="validate" style="margin-bottom: 0px; height: 20px;">
            <input type="hidden" id="a" name="id_product" value="<?php echo $detail->source_page?>" class="validate" style="margin-bottom: 0px; height: 20px;">
          </div>
        </div>
        <center>
          <button class="btn waves-effect waves-light" type="submit" name="action" style="width:100%; background-color:#fe6719;">Kirim Pesan
          </button>
        </center>

      </form>
    </div>
    <!-- end of Form Daftar -->
  </div>


  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
  <script>
    $('#radio_onn').click(function()
      {
        $('#item_shipping_cost').removeAttr("disabled");
      });

    $('#item_shipping_false').click(function()
    {
      $('#item_shipping_cost').attr("disabled","disabled");
    });
  </script>
 
  </body>

</html>