<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>dollak-Indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Ganti Password</strong></h5>
    <br>
    <?php if($this->session->flashdata('failed')){?>
    <div id="card-alert" class="card red">
        <div class="card-content white-text">
          <p><?php echo $this->session->flashdata('failed')?></p>
        </div>
    </div>
    <?php }?>
    <?php if($this->session->flashdata('success')){?>
    <div id="card-alert" class="card cyan lighten-5">
        <div class="card-content cyan-text darken-1">
          <p><?php echo $this->session->flashdata('success')?></p>
        </div>
    </div>
    <?php }?>
    <!-- Form Daftar -->
    <div class="row">
      <form class="col s12" method="POST" action="<?=Base_url()?>User/postGantiPassword">
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s12 m12">
            <input type="password" name="old_password" class="validate" style="margin-bottom: 0px; height: 16px;">
            <label for="email">Password Lama</label>
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s12 m12">
            <input type="password" id="password" name="new_password" class="validate" style="margin-bottom: 0px; height: 16px;">
            <label for="email">Password Baru</label>
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s12 m12">
            <input type="password" id="password1" name="password2" class="validate" style="margin-bottom: 0px; height: 16px;">
            <label for="email">Konfirmasi Password</label>
          </div>
        </div>
        <br>
        <div class="center">
        <button id="btn" style="background-color:#fe6719;" class="btn waves-effect waves-light" type="submit" name="action">Simpan
          <i class="material-icons right">send</i>
        </button>
      </div>
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
    $(document).ready(function(){
      $('#btn').hide();
      $('#password1').keyup(function(){
        if($(this).val() == $('#password').val())
        {
          $('#btn').show();
        }else{
          $('#btn').hide();
        }
      });
    });
  </script>
  </body>
</html>