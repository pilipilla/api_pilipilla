<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Pesan || dollak-indonesia.com</title>

  <?php $this->load->view('User/assets')?>
</head>
<body>
  <?php $this->load->view('User/navbar')?>


  <div class="container">
    <!-- TABS -->
    <?php if($this->session->flashdata('success')){?>
  <div id="card-alert" class="card cyan lighten-5">
    <div class="card-content cyan-text darken-1">
        <p><?php echo $this->session->flashdata('success')?></p>
      </div>
  </div>
  <?php }?>
    <div class="row">
      <div class="col s12">
        <ul class="tabs">
          <li class="tab col s3"><a class="active" href="#inbox">Inbox</a></li>
          <li class="tab col s3"><a href="#outbox">Outbox</a></li>
        </ul>
      </div>

      <!-- Inbox -->
      <div id="inbox" class="col s12">
        <div class="row">
          <div class="col s12">
            <div class="collection pesan">
              <?php if($inbox != null){
                foreach($inbox as $dInbox){?>
              <a href="<?=Base_url()?>profile/pesan/inbox/detail/<?php echo $dInbox->id?>/<?php echo url_title($dInbox->subjek, 'dash', TRUE)?>" class="collection-item asu" style="padding:10px; ">
                <span class="secondary-content grey-text text-darken-2" style="font-size:10px; padding-left:10px;"><?php echo $dInbox->tgl?></span>

                <p style="margin:0 0 5px 0; font-size:14px;">Dari : <strong><?php echo $dInbox->pengirim?></strong></p>
                <p class="pesan-subjek grey-text text-darken-2" style="margin:0px; font-size:12px; line-height:14px;"><?php echo $dInbox->subjek?></p>
              </a>
                <?php }?>
              <?php } else{?>
              <a href="#" class="collection-item" style="padding:10px; ">
                <p style="margin:0 0 5px 0; font-size:14px;"><strong>Tidak ada pesan masuk</strong></p>
              </a>
              <?php }?>
            </div>
            <center>
               <button style="background-color:#fe6719;" class="btn waves-effect" id="loadMore" type="submit" name="action">Lihat lebih banyak
                </button>
            </center>
          </div>
        </div>
      </div>
      <!-- end of Inbox -->

      <!-- Outbox -->
      <div id="outbox" class="col s12">
        <div class="row">
          <div class="col s12">
            <div class="collection pesan">
              <?php if($outbox != null){
                foreach($outbox as $dOutbox){?>
              <a href="<?=Base_url()?>profile/pesan/outbox/detail/<?php echo $dOutbox->id?>/<?php echo url_title($dOutbox->subjek, 'dash', TRUE)?>" class="collection-item ahay" style="padding:10px; ">
                <span class="secondary-content grey-text text-darken-2" style="font-size:10px; padding-left:10px;"><?php echo $dOutbox->tgl?></span>

                <p style="margin:0 0 5px 0; font-size:14px;">Ke : <strong><?php echo $dOutbox->penerima?></strong></p>
                <p class="pesan-subjek grey-text text-darken-2" style="margin:0px; font-size:12px; line-height:14px;"><?php echo $dOutbox->subjek?></p>
              </a>
                <?php }?>
              <?php } else{?>
              <a href="#" class="collection-item" style="padding:10px; ">
                <p style="margin:0 0 5px 0; font-size:14px;"><strong>Tidak ada pesan keluar</strong></p>
              </a>
              <?php }?>
            </div>
            <center>
               <button style="background-color:#fe6719;" class="btn waves-effect" id="loadMore1" type="submit" name="action">Lihat lebih banyak
                </button>
            </center>
          </div>
        </div>
      </div>
      <!-- end of Outbox -->
    </div>
    <!-- End of TABS -->

  </div>
  <!-- End of Container -->

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
 <script type="text/javascript">
    var size_list = $('.asu').length;
    var count = 10;
     $(document).ready(function(){
     $('.asu').hide();
    $('.asu:lt('+ count +')').show();
    $('#loadMore').click(function(){
      if(count <= size_list) {
          count += 4;
          $('.asu:lt('+ count +')').show();
     } else {
        $('#loadMore').hide();
          }
        });
      });
</script>
<script type="text/javascript">
    var size_list = $('.ahay').length;
    var count = 10;
     $(document).ready(function(){
     $('.ahay').hide();
    $('.ahay:lt('+ count +')').show();
    $('#loadMore1').click(function(){
      if(count <= size_list) {
          count += 4;
          $('.ahay:lt('+ count +')').show();
     } else {
        $('#loadMore1').hide();
          }
        });
      });
</script>
  </body>

</html>