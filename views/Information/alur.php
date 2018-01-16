<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Alur Transaksi || dollak-indonesia.com</title>

  <!-- CSS  -->
  <?php $this->load->view('User/assets')?>
  <style type="text/css">
    body {
      font-size: 13px;
      color: #555;
    }
    p {
      margin: 5px 0;
    }
    ol,ul {
      padding-left:24px;
      margin-top: 5px;
    }
    .row {
      margin-bottom:8px;
    }
    hr {
      border-width: 1px 0 0 0;
      color: #ddd;
      margin-bottom: 16px;
    }
    .kotak-biru{
      display:inline-block;
      width:16px;
      height:16px;
      background-color:#81BFFC;
    }
    .kotak-orange{
      display:inline-block;
      width:16px;
      height:16px;
      background-color:#FF6839;
    }
  </style>
</head>
<body>
  <?php $this->load->view('User/navbar')?>

  <div class="container">
    <h5 class="grey-text text-darken-4" style="text-align: center;"><strong>Alur Transaksi</strong></h5>
    <br>

    <div class="row">
      <div class="col s12">
        <p><b>Ada 3 (Tiga) Jenis transaksi dengan aplikasi Dollak yaitu:</b></p>
        <ol>
          <li>Pembelian langsung (ready – order )</li>
          <li>Pemesanan barang (pre – order )</li>
          <li>Penyediaan data vendor (customized – product)</li>
        </ol>
        <hr>
        <h6><strong>Timeline Transaksi Ready Order (ekspektasi transaksi selesai tanpa ada keluhan, waktu 8 hari)</strong></h6>
        <div class="row"> 
          <div class="col s12">
            <p>Tenggat Waktu Pembeli Transfer Pembayaran</p>
          </div>
          <div class="col s12">
            <div class="kotak-orange"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
          </div>
        </div>
        <div class="row"> 
          <div class="col s12">
            <p>Tenggat Waktu Penjual Mengirim Barang</p>
          </div>
          <div class="col s12">
            <div class="kotak-biru"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
          </div>
        </div>
        <div class="row"> 
          <div class="col s12">
            <p>Tenggat Waktu Status Barang Terkirim</p>
          </div>
          <div class="col s12">
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-biru"></div>
          </div>
        </div>
        <div class="row"> 
          <div class="col s12">
            <p>Tenggat Waktu Transaksi Dianggap Selesai</p>
          </div>
          <div class="col s12">
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
          </div>
        </div>
        <div class="row"> 
          <div class="col s12">
            <p>Uang Dikirm ke Penjual</p>
          </div>
          <div class="col s12">
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-orange"></div>
          </div>
        </div>
        <hr>

        <h6><strong>Timeline Transaksi Pre Order (ekspektasi transaksi selesai tanpa ada keluhan, waktu 11 hari)</strong></h6>
        <div class="row"> 
          <div class="col s12">
            <p>Tenggat Waktu Pembeli Transfer Pembayaran</p>
          </div>
          <div class="col s12">
            <div class="kotak-orange"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
          </div>
        </div>
        <div class="row"> 
          <div class="col s12">
            <p>Tenggat Waktu Penjual Mengirim Barang</p>
          </div>
          <div class="col s12">
            <div class="kotak-biru"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
          </div>
        </div>
        <div class="row"> 
          <div class="col s12">
            <p>Tenggat Waktu Produksi</p>
          </div>
          <div class="col s12">
            <div class="kotak-biru"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
          </div>
        </div>
        <div class="row"> 
          <div class="col s12">
            <p>Tenggat Waktu Status Barang Terkirim</p>
          </div>
          <div class="col s12">
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-biru"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-orange"></div>
            <div class="kotak-biru"></div>
          </div>
        </div>
        <hr>
        <h6><strong>Estimasi Waktu Pengiriman</strong></h6>
        <div class="row">
          <div class="col s12">
            <table class="striped">
              <thead>
                <tr>
                    <th>No</th>
                    <th>Wilayah</th>
                    <th>Estimasi Waktu</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Jabodetabek</td>
                  <td>1 - 3 hari kerja</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Kota-kota di Pulau Jawa</td>
                  <td>4 - 6 Hari Kerja</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Kota-Kota di Pulau Sumatera</td>
                  <td>7 - 9 Hari Kerja</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Kota-Kota di Pulau Kalimantan</td>
                  <td>7 - 9 Hari Kerja</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Kota-Kota di Pulau Sulawesi</td>
                  <td>7 - 9 Hari Kerja</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Kota-Kota di Pulau Papua</td>
                  <td>7 - 14 Hari Kerja</td>
                </tr>
                <tr>
                  <td>7</td>
                  <td>Kota-Kota di Kepulauan Riau</td>
                  <td><i>TBA</i></td>
                </tr>
                <tr>
                  <td>8</td>
                  <td>Kota-Kota di Kepulauan Maluku</td>
                  <td><i>TBA</i></td>
                </tr>
                <tr>
                  <td>9</td>
                  <td>Kota-Kota di Kepulauan Bangka Belitung</td>
                  <td><i>TBA</i></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <hr>
        <h6><strong>Timeline Transaksi dengan vendor (customized – product)</strong></h6>
        <div class="row">
          <div class="col s12">
            Tergantung pada kesepakatan dengan vendor
          </div>
        </div>
      </div>
    </div>

  </div>


  <!--  Scripts-->
  <script src="<?=Base_url()?>assets/js/jquery.min.js"></script>
  <script src="<?=Base_url()?>assets/js/materialize.js"></script>
  <script src="<?=Base_url()?>assets/js/init.js"></script>
  <script src="<?=Base_url()?>assets/js/owl.carousel.min.js"></script>

  <script>
    $(document).ready(function() {
      $('select').material_select();
    });
  </script>
 
  </body>

</html>