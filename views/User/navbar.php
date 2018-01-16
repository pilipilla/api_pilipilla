  <div class="navbar-fixed">
    <nav role="navigation">
      <div class="nav-wrapper"><a id="logo-container" href="<?=Base_url()?>" class="brand-logo center">Dollak</a>
        <ul class="right">
          <li><a id="btn-search"><i class="material-icons">search</i></a></li>
        </ul>

        <!-- Sidenav -->
        <ul id="slide-out" class="side-nav">
          <li class="nav-user">
              <div class="row" style="padding-top: 20px;">
                <div class="col s4" style="padding-right: 5px;">
                  <img src="https://dollak-indonesia.com/assets/img/logo-warna-beta.png" style="width:80px;height:auto;">
                </div>
                <div class="col s8" style="position:relative;">
                  <?php if($this->session->userdata('id_user') != null){?>
                  <a style="line-height: 20px; font-size: 14px; width: 100%;" href="#" class="truncate left-align grey-text text-darken-2"><?php echo $this->session->userdata('nama_user')?></a>
                  <?php }else{?>
                  <a style="line-height: 20px; font-size: 14px; width: 100%;" href="#" class="truncate left-align grey-text text-darken-2"></a>
                  <?php }?>
                  <i class="large material-icons grey-text text-darken-3" style="z-index:9999; position:absolute; right:5px;">clear</i>
                </div>
              </div>
            <hr>
          </li>
          <?php if($this->session->userdata('id_user') == null){?>
          <li><a href="<?=Base_url()?>" class="waves-effect">Beranda<i class="material-icons">home</i></a></li>
          <li><a href="<?=Base_url()?>login" class="waves-effect">Masuk<i class="material-icons">person</i></a></li>
          <li><a href="<?=Base_url()?>regist" class="waves-effect">Daftar<i class="material-icons">person_add</i></a></li>
          <li><a href="<?=Base_url()?>kategori" class="waves-effect">Semua Kategori<i class="material-icons">apps</i></a></li>
          <hr>
          <li><a href="http://berita.dollak-indonesia.com/" target="_blank" class="waves-effect">Berita Dollak<i class="material-icons">library_books</i></a></li>
          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
              <li>
                <a class="collapsible-header">Lainnya<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                  <ul>
                    <li><a href="<?=base_url();?>cara-menjual">Cara Menjual</a></li>
                    <li><a href="<?=base_url();?>cara-membeli">Cara Membeli</a></li>
                    <li><a href="<?=base_url();?>alur-transaksi">Alur Transaksi</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <?php }else{?>
          <li><a href="<?=Base_url()?>" class="waves-effect">Beranda<i class="material-icons">home</i></a></li>
          <hr>
          <li><a href="<?=Base_url()?>profile/keranjang" class="waves-effect">Keranjang<i class="material-icons">shopping_cart</i></a></li>
          <li><a href="<?=Base_url()?>profile/pembelian" class="waves-effect">Daftar Pembelian<i class="material-icons">library_books</i></a></li>
          <li><a href="#" class="waves-effect">Daftar Pesanan<i class="material-icons">card_giftcard</i></a></li>
          <hr>
          <!-- <li><a href="#" class="waves-effect">Profile<i class="material-icons">person</i></a></li> -->
          <li><a href="<?=Base_url()?>profile/ganti-password" class="waves-effect">Ganti Sandi<i class="material-icons">library_books</i></a></li>
          <li><a href="<?=Base_url()?>profile/alamat" class="waves-effect">Alamat Kirim<i class="material-icons">home</i></a></li>
          <?php $jml = json_decode($this->curl->simple_get("http://localhost/api/api/Accounts?action=getCountInbox&id_user=".$this->session->userdata('id_user')));?>
          <li><a href="<?=Base_url()?>profile/pesan" class="waves-effect">Pesan <?php echo "(".$jml->jumlah.")"?> <i class="material-icons">email</i></a></li>
          <?php if($this->session->userdata('id_jeniscustomer') == 2){?>
          <hr> 
          <li><a href="<?=Base_url()?>profile/transaksi" class="waves-effect">Kegiatan Transaksi <i class="material-icons">library_books</i></a></li>
          <hr> 
          <li><a href="<?=Base_url()?>profile/produk/tayang" class="waves-effect">Tayangkan Produk <i class="material-icons">library_books</i></a></li>
          <li><a href="<?=Base_url()?>profile/produk" class="waves-effect">Daftar Produk <i class="material-icons">library_books</i></a></li>
          <?php }?>
          <hr>
          <li><a href="<?=Base_url()?>User/logout" class="waves-effect">Logout<i class="material-icons">error_outline</i></a></li>
          <li class="no-padding">
            <ul class="collapsible collapsible-accordion">
              <li>
                <a class="collapsible-header">Lainnya<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                  <ul>
                    <li><a href="<?=base_url();?>cara-menjual">Cara Menjual</a></li>
                    <li><a href="<?=base_url();?>cara-membeli">Cara Membeli</a></li>
                    <li><a href="<?=base_url();?>alur-transaksi">Alur Transaksi</a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </li>
          <?php }?>
        </ul>
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
        <!-- end of Sidenav -->

      </div>
    </nav>
    <nav id="nav-search" style="display:none;">
      <div class="nav-wrapper">
        <form method="GET" action="<?=Base_url()?>cari">
          <div class="input-field">
            <input id="search" name="q" type="search" placeholder="Cari...">
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i id="btn-close-search" class="material-icons">close</i>
          </div>
        </form>
      </div>
    </nav>
  </div>
  <div class="row" id="txt" style="position:fixed; top:48px; height:100%; width:100%; z-index:9999; background-color:#fcfcfc; display:none;">

  </div>
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#btn-search").click(function(){
    $("#nav-search").show();
    $("#nav-main").hide();
    $(".label-icon").addClass("active");
    $("#search").focus();
    $("#txt").show();
  });
  $("#btn-close-search").click(function(){
    $("#nav-search").hide();
    $("#nav-main").show();
    $(".label-icon").removeClass("active");
    $("#search").focus();
    $("#txt").hide();
  });
});
</script>
<script>
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
</script>
<script>
$(document).ready(function(){
  $('#search').keyup(function(){
    if($(this).val().length >= 1)
    {
      $.ajax({
        url : '<?=Base_url()?>Product/searchSuggest?q='+$(this).val(),
        type : "GET",
        dataType : 'JSON',
        success : function(result){
            var k = '';
            if(result.length == 0)
            {
              $('#txt').hide();
            }else{
               for(i = 0; i < result.length; i++)
               {
                  $('#txt').show();
                    var dat = result[i];
                    var gmb = dat['gambar'];
                    var gbr = gmb.split(';');
                    var sti = dat['nama_produk'];
                    sti = sti.replace(/\s+/g, '-').toLowerCase();
                    k += '<a href="<?=Base_url()?>produk/detail/'+dat['id']+'/'+sti+'">';
                    k += '<div class="col s12">';
                    k += '<div class="row valign-wrapper" style="margin:5px 0;">';
                    k += '<div style="padding-left:10px;">';
                    k += '<p class="grey-text text-darken-4 truncate" style="margin:0px; font-size:14px;">'+dat['nama_produk']+'</p>';
                    k += '<p class="orange-text truncate" style="margin:0px; font-size:14px;">'+dat['namagrup']+'</p>';
                    k += '</div>';
                    k += '</div>';
                    k += '</div>';
                    k += '</a>';
                    $('#txt').html(k);
               }
            }
        }
      });
    } else{
      $('#txt').hide();
      $('#txt').html('');
    }
  });
});
</script>
