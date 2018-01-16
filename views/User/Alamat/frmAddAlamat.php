<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Tambah alamat|dollak-indonesia.com</title>

  <!-- CSS  -->
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
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Tambah Alamat</strong></h5>
    <br>

    <!-- Form Daftar -->
    <div class="row">
      <form class="col s12" method="POST" action="<?=Base_url()?>User/postAddAlamat">         
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s12 m12">
            <input type="text" id="nama" name="nama_data" class="validate" style="margin-bottom: 0px; height: 20px;">
            <label for="nama">Nama Alamat</label>
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s12 m12">
            <input type="text" id="penerima" name="penerima" class="validate" style="margin-bottom: 0px; height: 20px;">
            <label for="penerima">Nama Penerima</label>
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s12 m12">
            <input type="text" id="no_hp" name="nohp" onkeypress="return isNumberKey(this)" class="validate" style="margin-bottom: 0px; height: 20px;">
            <label for="no_hp">Nomor HP</label>
          </div>
        </div>
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s12 m12">
            <input type="text" id="alamat" name="alamat" class="validate" style="margin-bottom: 0px; height: 20px;">
            <label for="alamat">Alamat</label>
          </div>
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
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s12 m12">
            <input type="text" id="pos" name="kodepos" class="validate" style="margin-bottom: 0px; height: 20px;">
            <label for="pos">Kode Pos</label>
          </div>
        </div>
        <center>
          <button class="btn waves-effect waves-light" type="submit" name="action" style="width:100%; background-color:#fe6719;">Simpan
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