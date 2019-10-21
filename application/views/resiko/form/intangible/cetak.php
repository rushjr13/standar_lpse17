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
<body id="page-top">

  <div class="alert alert-ligth text-center" role="alert">
    <div class="row">
      <div class="col-md-2 m-auto">
        <img src="<?=base_url('assets/img/logo_provinsi.png') ?>" width="35%" class="img-fluid float-left">
      </div>
      <div class="col-md-8 m-auto">
        <h6 class="font-weight-bold">LAYANAN PENGADAAN SECARA ELEKTRONIK</h6>
        <h4 class="alert-heading font-weight-bold">DAFTAR ASET</h4>
      </div>
      <div class="col-md-2 m-auto">
        <img src="<?=base_url('assets/img/lpse.png') ?>" width="100%" class="img-fluid">
      </div>
    </div>
    <hr>
    <p class="mb-0 font-weight-bold">LAYANAN</p>
  </div>

  <div class="table-responsive">
    <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th rowspan="2" class="align-middle text-center">NO</th>
          <th rowspan="2" class="align-middle text-center">KODE</th>
          <th rowspan="2" class="align-middle text-center">NAMA LAYANAN</th>
          <th rowspan="2" class="align-middle text-center">SUB KLASIFIKASI</th>
          <th rowspan="2" class="align-middle text-center">PEMILIK</th>
          <th colspan="4" class="align-middle text-center">KLASIFIKASI KEAMANAN INFORMASI</th>
          <th rowspan="2" class="align-middle text-center">KETERANGAN</th>
        </tr>
        <tr>
          <th class="align-middle text-center">KERAHASIAAN</th>
          <th class="align-middle text-center">INTEGRITAS</th>
          <th class="align-middle text-center">KETERSEDIAAN</th>
          <th class="align-middle text-center">NILAI</th>
        </tr>
      </thead>
      <tbody>
        <?php if($aset_intangible){ ?>
          <?php $no=1; $nilai=0; foreach ($aset_intangible as $ai): ?>
            <?php
              $nilai = ($ai['kerahasiaan']+$ai['integritas']+$ai['ketersediaan'])/3;

              // NILAI
              if($nilai>=1 && $nilai<=1.5){
                $nl = 'Rendah';
              }else if($nilai>=1.5 && $nilai<=2.5){
                $nl = 'Sedang';
              }else if($nilai>=2.5 && $nilai<=3){
                $nl = 'Tinggi';
              }
            ?>
            <tr>
              <td class="align-middle text-center"><?=$no++ ?></td>
              <td class="align-middle text-center"><?=$ai['idi'] ?></td>
              <td class="align-middle"><?=$ai['nama'] ?></td>
              <td class="align-middle text-center"><?=$ai['klasifikasi'] ?></td>
              <td class="align-middle text-center"><?=$ai['pemilik'] ?></td>
              <td class="align-middle text-center"><strong><?=$ai['kerahasiaan'] ?></strong><br><small>(<?=$ai['nama_rahasia'] ?>)</small></td>
              <td class="align-middle text-center"><strong><?=$ai['integritas'] ?></strong><br><small>(<?=$ai['nama_integritas'] ?>)</small></td>
              <td class="align-middle text-center"><strong><?=$ai['ketersediaan'] ?></strong><br><small>(<?=$ai['nama_sedia'] ?>)</small></td>
              <td class="align-middle text-center"><strong><?=number_format($nilai, 0, ',','.'); ?></strong><br><small>(<?=$nl ?>)</small></td>
              <td class="align-middle text-center"><?=$ai['keterangan'] ?></td>
            </tr>
          <?php endforeach ?>
        <?php }else{ ?>
          <tr>
            <td colspan="10" class="text-center">Tidak ada data yang tersedia!</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

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
