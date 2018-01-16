<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Pembayaran | dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Pembayaran untuk nomor belanja <?php echo $keranjang->id?></strong></h5>
    <br>

    <!-- Form Daftar -->
    <div class="row">
      <form action="<?=Base_url()?>User/postAgreePembeli" class="col s12" name="myForm" onsubmit="return validate()" method="post">
        <input type="hidden" id="a" name="id_cart" class="validate" value="<?php echo $keranjang->id?>" onkeypress="return isNumberKey(event)">
        <label for="tipe_bayar">Tipe Bayar</label>
        <select id="tipe_bayar" name="tipe_bayar" class="browser-default">
            <option value="atm">ATM</option>
            <option value="mobile/sms banking">Mobile/SMS Banking</option>
            <option value="internet banking">Internet Banking</option>
        </select>
        <div class="row">
          <div class="input-field col s12 m12">
            <input type="text" id="nama_bank" name="nama_bank" class="validate">
            <label for="nama_bank">Nama Bank</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12">
            <input type="text" id="norek" name="norek" class="validate" onkeypress="return isNumberKey(event)">
            <label for="norek">Nomor Rekening</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12 m12">
            <input type="text" id="nm_norek" name="nm_norek" class="validate">
            <label for="nm_norek">Atas Nama</label>
          </div>
        </div>
        <label for="id_bank">Kirim ke</label>
        <select id="id_bank" name="id_bank" class="browser-default">
          <?php foreach($bank as $dBank){?>
          <option value="<?php echo $dBank->idbank?>"><?php echo $dBank->nmbank?> - <?php echo $dBank->anbank?> - <?php echo $dBank->rekinfo?></option>
          <?php }?>
        </select>
        <br>
        <div id="specify_tambahan">
          <div class="row"> 
          <center>
          <button style="background-color:#fe6719;" class="btn waves-effect waves-light" type="submit" name="action">Submit
           </button>
         </center>
        </div>
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
    var y5 = document.forms["myForm"]["id_kategori"].value;
    var y6 = document.forms["myForm"]["nama_toko"].value;
    var y7 = document.forms["myForm"]["id_provinsi"].value;
    var y8 = document.forms["myForm"]["id_kabkota"].value;
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
    }else if (y5 == "") {
        swal("Error","Kategori anda harus diisi", "error");
        return false;
    }else if (y6 == "") {
        swal("Error","Nama toko anda harus diisi", "error");
        return false;
    }else if (y7 == "") {
        swal("Error","Provinsi anda harus diisi", "error");
        return false;
    }else if (y8 == "") {
        swal("Error","Kota/Kabupaten anda harus diisi", "error");
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
  </body>
</html>