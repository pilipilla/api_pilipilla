<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Keranjang Detail || dollak-indonesia.com</title>

  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

    <h5 class="grey-text text-darken-4" style="text-align: center; margin-top:0px;"><strong>Keranjang Detail</strong></h5>
    <?php if($this->session->flashdata('success')){?>
    <div id="card-alert" class="card cyan lighten-5">
      <div class="card-content cyan-text darken-1">
          <p><?php echo $this->session->flashdata('success')?></p>
        </div>
    </div>
    <?php }?>

    <?php if($this->session->flashdata('failed')){?>
    <div id="card-alert" class="card red">
        <div class="card-content white-text">
          <p><?php echo $this->session->flashdata('failed')?></p>
        </div>
    </div>
    <?php }?>


    <!-- Deskripsi Produk -->
    <?php $status;
            switch($keranjang->status){
              case 0:
              $status = "Nego";
              break;
              case 1:
              $status = "Sepakat Pihak Pembeli";
              break;
              case 2:
              $status = "Sepakat Penjual Dan Pembeli";
              break;
            }
    $img = explode(';', $keranjang->gambar)?>
    <div class="row" style="margin-bottom:0px;">
      <div class="col s12 m12">
        <div class="card" style="margin-bottom:0px;">
          <div class="card-content" style="padding:5px;">
            <p style="font-size: 13px; margin:0 0 10px 10px;">Nomor Transaksi: <?php echo $keranjang->id?></p>
            <p style="font-size: 13px; margin:0 0 10px 10px;">Status Transaksi: <?php echo $status?></p>
            <div class="row valign-wrapper" style="margin-bottom:10px;">
              <div class="col s3" style="padding-left:14px; padding-right:7px; padding-top: 2px;">
                <img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img[0]?>" style="width:100px;height:50px;"> <!-- notice the "circle" class -->
              </div>
              <div class="col s9" style="float:left;">
                <p class="truncate" style="line-height:15px; font-size:14px;"><?php echo $keranjang->nama_produk?></p>
                <p class="truncate orange-text" style="line-height:15px; font-size:12px;">Pembeli : <?php echo $keranjang->nama_customer?></p>
                <p class="grey-text text-darken-2" style="line-height:15px; font-size:12px;">Rp <?php echo number_format($keranjang->harga)?> - Rp. <?php echo number_format($keranjang->harga_pasar)?></p>
              </div>
            </div>
            <div class="row">
              <div class="col s12" style="font-size:13px; line-height:24px;">
                <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total item<span style="float:right;"><?php echo number_format($keranjang->total_item)?> <?php echo $keranjang->satuan?></span></p>
                <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Total harga penawaran<span style="float:right;">Rp <?php echo number_format($keranjang->total_harga)?></span></p>
                <p class="grey-text text-darken-2" style="border-bottom: 1px solid #eee;">Biaya Pengiriman<span style="float:right;">Rp <?php echo number_format($keranjang->ongkir)?></span></p>
              </div>
            </div>
            <?php if($keranjang->status < 2){?>
            <div class="row" style="margin-bottom:0px;">
              <div class="col s6" style="padding-right:6px;">
                <a href="#tawar1" class="btn modal-trigger waves-effect waves-light blue blue-darken-2" style="width:100%;">Tawar</a>
              </div>
              <div class="col s6" style="padding-left:2px;padding-right:10px;">
                 <a href="<?=Base_url()?>User/getAgreePenjual/<?php echo $keranjang->id?>" class="btn waves-effect waves-light" style="width:100%; background-color:#fe6719;">Sepakat</a>
              </div>
              <?php }?>
            </div>
            <div class="row" style="padding:5px 8px; margin:5px 0; line-height: 36px;">
              <a href="#riwayat1" class="modal-trigger">
                <div class="col s6 grey lighten-3 grey-text text-darken-1" style="text-align:center;">Riwayat
                  <i class="material-icons grey-text text-lighten-1" style="line-height:26px; display:inline-flex; vertical-align:middle;">chevron_right</i>
                </div>
              </a>
              <a href="#alamat1" class="modal-trigger">
                <div class="col s6 grey lighten-3 grey-text text-darken-1" style="text-align: center;">Alamat
                  <i class="material-icons grey-text text-lighten-1" style="line-height:26px; display:inline-flex; vertical-align:middle;">chevron_right</i>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end of Deskripsi Produk -->

    <!-- Modal Tawar -->
    <div id="tawar1" class="modal">
      <div class="modal-content" style="padding:10px 0 0 0;">
        <div class="row">
          <form class="col s12" action="<?=Base_url()?>User/postUpdateNego" method="POST">          
            <div class="row" style="margin-bottom: 10px;">
              <div class="input-field col s6 m6" style="padding-left:0px;">
                <input type="text" id="jumlah_produk" onkeypress="return isNumberKey(this)" name="qty" class="validate" style="margin-bottom:0px; height:20px;">
                <input type="hidden" id="a" class="validate" name="id_produk" value="<?php echo $keranjang->id_datajual?>" style="margin-bottom:0px; height:20px;">
                <input type="hidden" id="a" class="validate" name="id_cart" value="<?php echo $keranjang->id?>" style="margin-bottom:0px; height:20px;">
                <label for="jumlah_produk">Jumlah Produk</label>
              </div>
              <div class="input-field col s6 m6" style="padding-right:0px;">
                <input type="text" id="harga_satuan" name="price" onkeypress="return isNumberKey(this)" class="validate" style="margin-bottom: 0px; height: 20px;">
                <label for="harga_satuan">Harga/Satuan</label>
              </div>
            </div>
            <p style="font-size:13px;">Total Penawaran: Rp <span id="output" style="font-size:14px;">0</span></p>
            <button class="btn waves-effect waves-light blue darken-2" type="submit" name="action" style="width:100%;">Tawar
            </button>
          </form>
        </div>
      </div>
    </div>
    <!-- End of Modal Tawar -->

    <!-- Modal Riwayat -->
    <div id="riwayat1" class="modal">
      <div class="modal-content" style="padding:10px 0 0 0;">
        <div class="row">
          <table class="striped responsive-table" style="font-size:11px;">
            <thead>
              <tr>
                <th>Harga Nego</th>
                <th>Tanggal</th>
                <th>Oleh</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($nego as $datanego){
                $show;
                switch ($datanego->owner) {
                  case 1:
                    $show = "Pembeli";
                    break;
                  case 2:
                    $show = "Penjual";
                    break;
                }?>
              <tr>
                <td>Rp <?php echo number_format($datanego->hrg_nego)?></td>
                <td><?php echo date("d-m-Y", strtotime($datanego->tgl))?></td>
                <td><?php echo $show?></td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- End of Modal Riwayat -->

    <!-- Modal Alamat -->
    <div id="alamat1" class="modal">
      <div class="modal-content" style="padding:10px 0 0 0;">
        <div class="row">
          <p><?php echo "Alamat : ".$keranjang->alamat?></p>
          <p><?php echo "Penerima : ".$keranjang->penerima?></p>
          <p><?php echo "No Hp : ".$keranjang->nohp?></p>
          <p><?php echo "Provinsi : ".$keranjang->namaprov?></p>
          <p><?php echo "Kota : ".$keranjang->kabkota?></p>
        </div>
      </div>
    </div>
    <!-- End of Alamat -->

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
  <script>
  $('.modal').modal({
      dismissible: true, // Modal can be dismissed by clicking outside of the modal
      opacity: .5, // Opacity of modal background
      inDuration: 300, // Transition in duration
      outDuration: 200, // Transition out duration
      startingTop: '25%', // Starting top style attribute
      endingTop: '30%', // Ending top style attribute
    }
  );
</script>

<!-- Pengali Otomatis -->
<script type="text/javascript">
  $(function() {
      $source=$("#jumlah_produk");
      $source2=$("#harga_satuan");
      $output=$("#output");
      $source.keyup(function() {
         $output.text($source.val() * $source2.val());
      });
      $source2.keyup(function() {
         $output.text($source.val() * $source2.val());
      });
  });
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