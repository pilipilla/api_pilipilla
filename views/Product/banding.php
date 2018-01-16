<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Banding || dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Bandingkan Produk</strong></h5>
    <br>

    <!-- Bandingkan -->
    <table class="stripped responsive-table banding">
        <thead>
          <tr>
            <th><img style="visibility:hidden;" src="http://via.placeholder.com/100"></th>
            <th>Nama Produk</th>
            <th>Harga Minimum</th>
            <th>Harga Maximum</th>
            <th>Minimal Order</th>
            <th>Dilihat</th>
            <th>Partner</th>
            <th>Provinsi</th>
            <th>Kota/Kota</th>
            <th>Kontak Owner</th>
          </tr>
        </thead>
        <tbody>
          <?php if($ses_1 != null) {
            $img1 = explode(';', $ses_1->gambar)?>
          <tr>
            <td><img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img1[0]?>" style="width:60px;height:50px;"></td>
            <td><?php echo $ses_1->nama_produk?></td>
            <td>Rp <?php echo number_format($ses_1->harga)?></td>
            <td>Rp <?php echo number_format($ses_1->harga_pasar)?></td>
            <td><?php echo $ses_1->min_order." ".$ses_1->satuan?></td>
            <td><?php echo $ses_1->dilihat?> kali</td>
            <td><?php echo $ses_1->nama_toko?></td>
            <td><?php echo $ses_1->namaprov?></td>
            <td><?php echo $ses_1->kabkota?></td>
            <td><a href="#"><i class="material-icons orange-text text-darken-2">email</i></a></td>
          </tr>
          <?php }?>

          <?php if($ses_2 != null) {
            $img2 = explode(';', $ses_2->gambar)?>
          <tr>
            <td><img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img2[0]?>" style="width:60px;height:50px;"></td>
            <td><?php echo $ses_2->nama_produk?></td>
            <td>Rp <?php echo number_format($ses_2->harga)?></td>
            <td>Rp <?php echo number_format($ses_2->harga_pasar)?></td>
            <td><?php echo $ses_2->min_order." ".$ses_2->satuan?></td>
            <td><?php echo $ses_2->dilihat?> kali</td>
            <td><?php echo $ses_2->nama_toko?></td>
            <td><?php echo $ses_2->namaprov?></td>
            <td><?php echo $ses_2->kabkota?></td>
            <td><a href="#"><i class="material-icons orange-text text-darken-2">email</i></a></td>
          </tr>
          <?php }?>

          <?php if($ses_3 != null) {
            $img3 = explode(';', $ses_3->gambar)?>
          <tr>
            <td><img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img3[0]?>" style="width:60px;height:50px;"></td>
            <td><?php echo $ses_3->nama_produk?></td>
            <td>Rp <?php echo number_format($ses_3->harga)?></td>
            <td>Rp <?php echo number_format($ses_3->harga_pasar)?></td>
            <td><?php echo $ses_3->min_order." ".$ses_3->satuan?></td>
            <td><?php echo $ses_3->dilihat?> kali</td>
            <td><?php echo $ses_3->nama_toko?></td>
            <td><?php echo $ses_3->namaprov?></td>
            <td><?php echo $ses_3->kabkota?></td>
            <td><a href="#"><i class="material-icons orange-text text-darken-2">email</i></a></td>
          </tr>
          <?php }?>

          <?php if($ses_4 != null) {
            $img4 = explode(';', $ses_4->gambar)?>
          <tr>
            <td><img class="responsive-img" src="https://dollak-indonesia.com/dollakv2/data/<?php echo $img4[0]?>" style="width:60px;height:50px;"></td>
            <td><?php echo $ses_4->nama_produk?></td>
            <td>Rp <?php echo number_format($ses_4->harga)?></td>
            <td>Rp <?php echo number_format($ses_4->harga_pasar)?></td>
            <td><?php echo $ses_4->min_order." ".$ses_4->satuan?></td>
            <td><?php echo $ses_4->dilihat?> kali</td>
            <td><?php echo $ses_4->nama_toko?></td>
            <td><?php echo $ses_4->namaprov?></td>
            <td><?php echo $ses_4->kabkota?></td>
            <td><a href="#"><i class="material-icons orange-text text-darken-2">email</i></a></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
    <!-- end of Bandingkan -->
  </div>


  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>
  <script src="<?=base_url()?>assets/swal/sweetalert.min.js"></script>
  
  <script>
  function hapus(id)
  {
    //var aa = $('#radio'+id).val();
    $.ajax({
      url : '<?=Base_url()?>Product/hapusBanding/'+id,
      success : function(response)
      {
        swal("Sukses!", response, "success");
        window.location.reload();
      }
    });
  }
</script>
  </body>

</html>