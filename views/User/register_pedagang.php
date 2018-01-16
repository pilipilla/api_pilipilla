<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Daftar Produsen | dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Registrasi</strong></h5>
    <br>

    <!-- Form Daftar -->
    <div class="row">
      <form action="<?=Base_url()?>User/regist_pedagang" class="col s12" name="myForm" onsubmit="return validate()" method="post">
          <input type="hidden" id="produsen" name="id_jeniscustomer" value="2">

        <div id="specify_produsen">
          <select class="browser-default" name="bisnis">
            <option value="" disabled selected>Pilih</option>
            <option value="4">Produsen</option>
            <option value="5">Importir</option>
            <option value="6">Distributor</option>
            <option value="7">Pedagang Online</option>
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
            <label for="password">Sandi / Password</label>
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
        <div id="specify_tambahan">
          <p><strong>Informasi tambahan untuk kelengkapan anda sebagai produsen:</strong></p>
          <label for="id_kategori">Kategori Produsen</label>
          <select class="browser-default" id="id_kategori" name="id_kategori">
            <option value="">Pilih Kategori</option>
            <?php foreach($kategori as $dKat){?>
            <option value="<?php echo $dKat->id?>"><?php echo $dKat->namagrup?></option>
            <?php }?>
          </select>
          <div class="input-field">
            <input type="text" id="nama_toko" name="nama_toko" class="validate">
            <label for="nama_toko">Nama Toko/Perusahaan/Industri</label>
          </div>
          <div class="input-field">
            <input type="text" id="tahun_berdiri" name="tahun_berdiri" class="validate" onkeypress="return isNumberKey(event)">
            <label for="tahun_berdiri">Tahun Berdiri</label>
          </div>
          <div class="input-field">
            <input type="text" id="alamat_toko" name="alamat_toko" class="validate">
            <label for="alamat_toko">Alamat Toko/Perusahaan</label>
          </div>
          <label for="provinsi">Provinsi</label>
          <select id="id_provinsi" name="id_provinsi" class="browser-default" onchange="getCity()">
            <option>PILIH</option>
            <?php foreach($provinsi as $prov){?>
            <option value="<?php echo $prov->id?>"><?php echo $prov->namaprov?></option>
            <?php }?>
          </select>
          <label for="kabkota">Kabupaten/Kota</label>
          <select id="kabkota" name="id_kabkota" class="browser-default">
            <option>PILIH</option>
          </select>
          <div class="input-field">
            <input type="text" id="kode_pos" name="kode_pos" class="validate">
            <label for="nama_toko">Kode Pos</label>
          </div>
          <p style="margin-bottom:0;">Apakah anda menyediakan keagenan?</p>
          <p style="margin-top:0;">
            <input type="checkbox" id="keagenan" name="eksklusif" value="1" />
            <label class="grey-text text-darken-2" for="keagenan">Sedia Keagenan</label>
          </p>
          <p style="font-size:12px;">*Dengan menekan tombol 'Daftar' Anda telah menyetujui <a href="#">Syarat & Ketentuan</a> dan <a href="#">Kebijakan Privasi</a> dari Dollak.</p>
          <div class="row"> 
            <center>
            <button style="background-color:#fe6719;" class="btn waves-effect waves-light" type="submit" name="action">Daftar
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