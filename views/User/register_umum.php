<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Daftar | dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <div class="container">
    <h4 class="grey-text text-darken-4" style="text-align: center;"><strong>Registrasi</strong></h4>
    <br>
    <h5 class="grey-text text-darken-4" style="text-align: left;"><strong>Anda ingin menjual produk di Dollak? Daftar <a href="<?=Base_url()?>regist/pedagang">disini</a></strong></h5>
    <br>
  <?php if($this->session->flashdata('failed')){?>
    <div id="card-alert" class="card red">
        <div class="card-content white-text">
          <p><?php echo $this->session->flashdata('failed')?></p>
        </div>
    </div>
    <?php }?>
    <!-- Form Daftar -->
    <div class="row">
      <form action="<?=Base_url()?>User/regist" class="col s12 formValidate" name="myForm" onsubmit="return validate()" method="post">
        <h6>Kategori Bisnis</h6>
        <p>
          <input type="radio" id="umum" name="id_jeniscustomer" value="3">
          <label for="umum">Umum</label>
        </p>
        <p>
          <input type="radio" id="produsen" name="id_jeniscustomer" value="1">
          <label for="produsen">Usaha Dagang</label>
        </p>
        <p>
          <input type="radio" id="pedadgang" name="id_jeniscustomer" value="4">
          <label for="pedadgang">Usaha Jasa</label>
        </p>

        <div id="specify_pedagang">
          <select class="browser-default">
            <option value=""  selected>Pilih</option>
            <option value="1">Pedagang Lapak</option>
            <option value="2">Pedagang Agen</option>
            <option value="3">Pedagang Kios</option>
          </select>
        </div>
        <br>
        <div class="row">
          <div class="input-field col s12 m12">
            <input type="text" id="nama_customer" name="nama_customer" class="validate">
            <label for="no_hp">Nama</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12">
            <input type="text" id="no_hp" name="no_hp" class="validate" onkeypress="return isNumberKey(event)">
            <label for="no_hp">No. Handphone</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12">
            <input type="email" id="email" name="email" class="validate">
            <label for="email">Email (optional)</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12">
            <input type="password" id="password" name="password" class="validate">
            <label for="password">Sandi / Password Baru</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12">
            <input type="text" id="usia" name="usia" class="validate" onkeypress="return isNumberKey(event)">
            <label for="usia">Usia</label>
          </div>
        </div>
        <select id="gender" name="gender" class="browser-default">
          <option value="1">Laki-laki</option>
          <option value="2">Perempuan</option>
        </select>
        <br>
        <div class="row"> 
          <center>
          <button style="background-color:#fe6719;" class="btn waves-effect waves-light" type="submit" name="action">Daftar
           </button>
         </center>
        </div>
      </form>
    </div>
    <!-- end of Form Daftar -->
  </div>


  <!--  Scripts-->
  <script src="<?=base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=base_url()?>assets/js/materialize.js"></script>
  <script src="<?=base_url()?>assets/js/init.js"></script>
  <script src="<?=base_url()?>assets/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets/swal/sweetalert.min.js"></script>
 
  </body>
</html>

<script type="text/javascript">
$(document).ready(function() {
  $('#specify_pedagang').hide();
    $('input[type=radio][name=id_jeniscustomer]').change(function() {
        if (this.value == 1) {
            $('#specify_pedagang').show();
        }
        else {
            $('#specify_pedagang').hide();
        }
    });
});
</script>
<script type="text/javascript">
  function validate()
  {
    var x = document.forms["myForm"]["id_jeniscustomer"].value;
    var y = document.forms["myForm"]["no_hp"].value;
    var z = document.forms["myForm"]["email"].value;
    var y1 = document.forms["myForm"]["password"].value;
    var y2 = document.forms["myForm"]["usia"].value;
    var y3 = document.forms["myForm"]["gender"].value;
    var y4 = document.forms["myForm"]["nama_customer"].value;
    if (x == "") {
        swal("Error","Kategori bisnis anda harus diisi", "error");
        return false;
    }else if (y == "") {
        swal("Error","No handphone anda harus diisi", "error");
        return false;
    }else if (z == "") {
        swal("Error","Email anda harus diisi", "error");
        return false;
    }else if (y1 == "") {
        swal("Error","Password anda harus diisi", "error");
        return false;
    }else if (y2 == "") {
        swal("Error","Usia anda harus diisi", "error");
        return false;
    }else if (y3 == "") {
        swal("Error","Gender anda harus diisi", "error");
        return false;
    }else if (y4 == "") {
        swal("Error","Nama anda harus diisi", "error");
        return false;
    }
  }
</script>
<script>
   function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
     if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
          return true;
     }
  </script>
