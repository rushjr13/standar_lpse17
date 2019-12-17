<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=$pengaturan['nama_web'] ?> - <?=$judul ?></title>
  <link rel="shortcut icon" href="<?=base_url('assets/img/').$pengaturan['icon'] ?>">

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('assets/vendor') ?>/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets/css') ?>/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/css') ?>/select2.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/css') ?>/select2-bootstrap4.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/css') ?>/select2-bootstrap4.css" rel="stylesheet">
  <link href="<?=base_url('assets/vendor') ?>/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body id="page-top" class="container">

  <div class="alert alert-ligth text-center m-0" role="alert">
    <div class="row">
      <div class="col-sm-2 m-auto">
        <img src="<?=base_url('assets/img/logo_provinsi.png') ?>" width="35%" class="img-fluid float-left">
      </div>
      <div class="col-sm-8 m-auto">
        <h6 class="font-weight-bold">LAYANAN PENGADAAN SECARA ELEKTRONIK</h6>
        <h4 class="alert-heading font-weight-bold">LAPORAN KAPASITAS LAYANAN</h4>
        <h6 class="font-weight-bold"><?=$kapasitas['item'] ?></h6>
      </div>
      <div class="col-sm-2 m-auto">
        <img src="<?=base_url('assets/img/lpse.png') ?>" width="100%" class="img-fluid">
      </div>
    </div>
    <hr>
  </div>

  <ol>
    <li class="font-weight-bold">PENDAHULUAN</li>
    <ul>
      <li class="font-weight-bold">Latar Belakang</li>
      <div class="text-justify"><?=$kapasitas_laporan['latar_belakang'] ?></div>
      <li class="font-weight-bold">Ruang Lingkup</li>
      <div class="text-justify"><?=$kapasitas_laporan['ruang_lingkup'] ?></div>
      <li class="font-weight-bold">Metode Pengumpulan Data</li>
      <div class="text-justify"><?=$kapasitas_laporan['metode'] ?></div>
      <li class="font-weight-bold">Asumsi-Asumsi Yang Digunakan</li>
      <div class="text-justify"><?=$kapasitas_laporan['asumsi'] ?></div>
    </ul>
    <li class="font-weight-bold">RINGKASAN LAYANAN</li>
    <ul>
      <li class="font-weight-bold">Laporan Layanan Saat Ini</li>
      <div class="text-justify"><?=$kapasitas_laporan['laporan_saat_ini'] ?></div>
      <li class="font-weight-bold">Prediksi Layanan Yang Akan Datang</li>
      <div class="text-justify"><?=$kapasitas_laporan['prediksi_akan_datang'] ?></div>
    </ul>
    <li class="font-weight-bold">RINGKASAN KOMPONEN PENDUKUNG LAYANAN</li>
    <ul>
      <li class="font-weight-bold">Laporan Penggunaan Komponen Layanan Pendukung</li>
      <div class="text-justify"><?=$kapasitas_laporan['laporan_pakai_komponen'] ?></div>
      <li class="font-weight-bold">Analisis Trend Penggunaan Komponen Pendukung Layanan Untuk Jangka Pendek, Menengah dan Panjang</li>
      <div class="text-justify"><?=$kapasitas_laporan['analisis_trend'] ?></div>
      <li class="font-weight-bold">Prediksi Kebutuhan Komponen Pendukung Layanan</li>
      <div class="text-justify"><?=$kapasitas_laporan['prediksi_kebutuhan'] ?></div>
    </ul>
    <li class="font-weight-bold">PILIHAN PENINGKATAN LAYANAN</li>
    <div class="text-justify"><?=$kapasitas_laporan['pilihan_peningkatan_layanan'] ?></div>
    <li class="font-weight-bold">PREDIKSI PEMBIAYAAN</li>
    <div class="text-justify"><?=$kapasitas_laporan['prediksi_pembiayaan'] ?></div>
    <li class="font-weight-bold">REKOMENDASI TERKAIT RENCANA KAPASITAS</li>
    <div class="text-justify"><?=$kapasitas_laporan['rekomendasi_kapasitas'] ?></div>
  </ol>


<!-- Bootstrap core JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?=base_url('assets/')?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?=base_url('assets/')?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?=base_url('assets/')?>vendor/chart.js/Chart.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url('assets/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

</body>

</html>
