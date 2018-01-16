<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Profile - Alamat | dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Daftar Alamat</strong></h5>
    <br>
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
    <!-- Form Daftar -->
    <div class="row">
      <div class="col s12">
        <ul class="collection">
        <?php if($alamat != null){
        $i = 0;
        foreach($alamat as $dAl){?>
          <li class="collection-item" style="padding:10px;">
            <div>
              <a href="#!" class="secondary-content dropdown-button" data-activates="dropdown<?php echo $i ?>"><i class="material-icons grey-text">more_vert</i></a>
              <!-- Dropdown Structure -->
              <ul id='dropdown<?php echo $i++ ?>' class='dropdown-content'>
                <li><a href="<?=Base_url()?>profile/alamat/form-edit/<?php echo $dAl->id?>/<?php echo url_title($dAl->nama_data, 'dash', TRUE)?>">Ubah</a></li>
                <li><a href="#" onclick="setuju(<?php echo $dAl->id?>)">Hapus</a></li>
              </ul>
              <!-- End of Dropdown -->

              <p style="margin:0px; font-size:12px;"><strong><?php echo $dAl->nama_data?></strong></p>
              <p style="margin:0px; font-size:12px;"><?php echo $dAl->penerima?></p>
              <p style="margin:0px; font-size:12px;"><?php echo $dAl->nohp?></p>
              <p style="margin:0px; font-size:12px; color:#5d5d5d;"><?php echo $dAl->alamat?></p>
            </div>
          </li>
          <hr style="border-color: #eee;"> 
          <?php }?>
          <?php } else{?>
          <li class="collection-item" style="padding:10px;">
            <div>
              <p style="margin:0px; font-size:12px;"><strong>Anda belum memiliki alamat silahkan tambahkan alamat anda terlebih dahulu</strong></p>
            </div>
          </li>
          <?php }?>
        </ul>
      </div>
    </div>
    <!-- end of Form Daftar -->

    <!-- FAB -->
    <div class="fixed-action-btn">
      <a href="<?=Base_url()?>profile/alamat/form-tambah" class="btn-floating btn-large orange">
        <i class="large material-icons">add</i>
      </a>
    </div>

  </div>

  <?php $this->load->view('User/footer')?>
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
  function setuju(id)
  {
    swal({
    title: "Apakah anda ingin memproduksi design anda ?",
    type: "warning",
    showCancelButton: true,
    confirmButtonClass: "btn-default",
    confirmButtonText: "Ya",
    cancelButtonText: "Tidak",
    closeOnConfirm: false,
    closeOnCancel: false
    },
    function(isConfirm) {
      if (isConfirm) {
        $.ajax({
          url : '<?=Base_url()?>profile/alamat/hapus/'+id,
          success : function(){
            swal('Berhasil', 'Anda berhasil menghapus alamat', 'success');
            window.location.reload();
          }
        });     
      }
    });
  }
  </script>
  </body>

</html>