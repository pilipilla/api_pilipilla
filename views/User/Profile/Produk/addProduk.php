<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Tayangkan Produk || dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Tayangkan Produk</strong></h5>
    <br>

    <!-- Form Daftar -->
    <div class="row">
      <form name="myForm" onsubmit="return validate()" class="col s12" method="POST" action="http://127.0.0.1/develop/Detail_Product/postInputProductTest" enctype="multipart/form-data">
          
        <div class="row" style="margin-bottom: 10px;">
          <div class="input-field col s12 m12">
            <input type="hidden" id="a" name="id_kategori" value="<?php echo $kategori->id?>" class="validate" style="margin-bottom: 10px; height: 20px;">
            <input type="hidden" id="b" name="owner" value="<?php echo $this->session->userdata('id_user')?>" class="validate" style="margin-bottom: 10px; height: 20px;">
            <input type="text" id="nama_produk" name="nama_produk" class="validate" style="margin-bottom: 10px; height: 20px;">
            <label for="nama_produk">Nama Produk</label>
          </div>
          <div class="col s12 m12">
            <h5 style="margin: 10px 0 5px 0;">Kategori</h5>
            <p style="margin-top:0px;"><?php echo $kategori->namagrup?></p>
          </div>
          <div class="input-field col s12 m12">
            <select style="margin-bottom: 0px;" name="subcat">
              <option value="" disabled selected>Sub Kategori</option>
              <?php foreach($subkat as $dSub){?>
              <option value="<?php echo $dSub->idjenisdagang?>"><?php echo $dSub->namajenis?></option>
              <?php }?>
            </select>
          </div>
          <div class="input-field col s12 m12">
            <select style="margin-bottom: 0px;" name="jns_penjualan">
              <option value="" disabled selected>Jenis Penjualan</option>
              <option value="0">Jual Stok</option>
              <option value="1">Pre Order</option>
            </select>
          </div>
          <div class="col s12 m12">
            <h5 style="margin: 10px 0 5px 0;">Kisaran Harga</h5>
          </div>
          <div class="input-field col s6 m6">
            <input type="number" id="harga_min" onkeypress="return isNumberKey(this)" name="harga_min" class="validate" style="margin-bottom:10px; height:20px;">
            <label for="harga_min">Harga Minimal</label>
          </div>
          <div class="input-field col s6 m6">
            <input type="number" id="harga_max" onkeypress="return isNumberKey(this)" name="harga_max" class="validate" style="margin-bottom:10px; height: 20px;">
            <label for="harga_max">Harga Maksimal</label>
          </div>
          <div class="input-field col s12 m12">
            <select style="margin-bottom: 0px;" name="satuan">
              <option value="" disabled selected>Satuan</option>
              <option value="pcs">PCS</option>
              <option value="botol">Botol</option>
            </select>
          </div>
          <div class="input-field col s12 m12">
            <input type="number" id="min_order" onkeypress="return isNumberKey(this)" name="min_order" class="validate" style="margin-bottom: 10px; height: 20px;">
            <label for="min_order">Minimum Order</label>
          </div>
          <div class="input-field col s12 m12">
            <input type="number" id="berat" onkeypress="return isNumberKey(this)" name="berat" class="validate" style="margin-bottom: 10px; height: 20px;">
            <label for="berat">Berat (dalam gram)</label>
          </div>
          <div class="input-field col s12 m12">
            <input type="number" id="jumlah_stock" name="jumlah_stok" class="validate" style="margin-bottom: 10px; height: 20px;">
            <label for="jumlah_stok">Jumlah Stok Produk</label>
          </div>
          <div class="input-field col s12">
            <textarea id="textarea1" name="deskripsi" class="materialize-textarea" style="margin-bottom:0px; padding:0px;"></textarea>
            <label for="textarea1">Deskripsi Produk</label>
          </div>
          <div class="col s12 m12">
            <h5 style="margin: 10px 0 5px 0;">Informasi Tambahan</h5>
            <p style="margin-top:5px;">
              <input type="checkbox" id="sample" />
              <label for="sample">Tersedia Produk Sample</label>
            </p>
          </div>          
        </div>
        <div class="row" id="sampleProperty">
          <div class="input-field col s6 m6">
            <input type="number" id="sampleStok" onkeypress="return isNumberKey(this)" name="sample_stok" class="validate" style="margin-bottom:10px; height:20px;">
            <label for="sampleStok">Jumlah Stok</label>
          </div>
          <div class="input-field col s6 m6">
            <input type="number" id="samplePrice" onkeypress="return isNumberKey(this)" name="sample_price" class="validate" style="margin-bottom:10px; height: 20px;">
            <label for="samplePrice">Harga Satuan</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12">
            <h5 style="margin: 10px 0 5px 0;">Tambahkan Gambar</h5>
            <div class="file-field input-field" style="height:36px; margin-top:5px;">
              <div class="btn waves-effect waves-light blue darken-2" style="height:32px;">
                <span class="valign-wrapper" style="height:32px;">File</span>
                <input type="file" style="height:32px;" name="imgs[]" multiple="multiple">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" style="height:32px;">
              </div>
            </div>
          </div>
          <div class="col s12">
            <h5 style="margin: 10px 0 5px 0;">Tambahkan Gambar</h5>
            <div class="file-field input-field" style="height:36px; margin-top:5px;">
              <div class="btn waves-effect waves-light blue darken-2" style="height:32px;">
                <span class="valign-wrapper" style="height:32px;">File</span>
                <input type="file" style="height:32px;" name="imgs[]" multiple="multiple">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" style="height:32px;">
              </div>
            </div>
          </div>
          <div class="col s12">
            <h5 style="margin: 10px 0 5px 0;">Tambahkan Gambar</h5>
            <div class="file-field input-field" style="height:36px; margin-top:5px;">
              <div class="btn waves-effect waves-light blue darken-2" style="height:32px;">
                <span class="valign-wrapper" style="height:32px;">File</span>
                <input type="file" style="height:32px;" name="imgs[]" multiple="multiple">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text" style="height:32px;">
              </div>
            </div>
          </div>
        </div>
        
        <button class="btn waves-effect waves-light" type="submit" name="action" style="width:100%; background-color:#fe6719; margin-top:10px;">tayangkan produk</button>

      </form>
    </div>
    <!-- end of Form Daftar -->
  </div>


  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets/swal/sweetalert.min.js"></script>

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
  <script>
    $(function() {
      $('#sampleProperty').hide();
      $('#specialProperty').hide();
      $('#sampleStok').prop('disabled', true);
      $('#samplePrice').prop('disabled', true);
      $('#specialMin').prop('disabled', true);
      $('#specialType').prop('disabled', true);

      $('#sample').change(function() {
        if ($(this).is(':checked')) {
          $('#sampleProperty').show();
          $('#sampleStok').prop('disabled', false);
          $('#samplePrice').prop('disabled', false);
        } else {
          $('#sampleProperty').hide();
          $('#sampleStok').prop('disabled', true);
          $('#samplePrice').prop('disabled', true);
        }
      });

      $('#special').change(function() {
        if ($(this).is(':checked')) {
          $('#specialProperty').show();
          $('#specialMin').prop('disabled', false);
          $('#specialType').prop('disabled', false);
        } else {
          $('#specialProperty').hide();
          $('#specialMin').prop('disabled', true);
          $('#specialType').prop('disabled', true);
        }
      });

      // $('#cat').change(function() {
      //     $.get('https://dollak-indonesia.com/SubCategory/getByCategoryId'+'/'+this.value, function(data) {
      //         $('#subcat').html('');
      //         const subCats = $.parseJSON(data);

      //         $.each(subCats, function(index, value) {
      //             $('#subcat')
      //                 .append($('<option>', {value: value.idjenisdagang})
      //                 .text(value.namajenis));
      //         })
      //     });
      // });
    });
  </script>
  <script type="text/javascript">
  function validate()
  {
    var x = document.forms["myForm"]["nama_produk"].value;
    var y = document.forms["myForm"]["jns_penjualan"].value;
    var z = document.forms["myForm"]["harga_min"].value;
    var y1 = document.forms["myForm"]["harga_max"].value;
    var y2 = document.forms["myForm"]["satuan"].value;
    var y3 = document.forms["myForm"]["min_order"].value;
    var y4 = document.forms["myForm"]["berat"].value;
    var y5 = document.forms["myForm"]["jumlah_stok"].value;
    var y6 = document.forms["myForm"]["deskripsi"].value;
    if (x == "") {
        swal("Error","Nama produk anda harus diisi", "error");
        return false;
    }else if (y == "") {
        swal("Error","Jenis jualan anda harus diisi", "error");
        return false;
    }else if (z == "") {
        swal("Error","Harga minimal anda harus diisi", "error");
        return false;
    }else if (y1 == "") {
        swal("Error","Harga maximal anda harus diisi", "error");
        return false;
    }else if (y2 == "") {
        swal("Error","Satuan anda harus diisi", "error");
        return false;
    }else if (y3 == "") {
        swal("Error","Minimal order anda harus diisi", "error");
        return false;
    }else if (y4 == "") {
        swal("Error","Berat anda harus diisi", "error");
        return false;
    }else if (y5 == "") {
        swal("Error","Jumlah stok anda harus diisi", "error");
        return false;
    }else if (y6 == "") {
        swal("Error","Deskripsi produk anda harus diisi", "error");
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