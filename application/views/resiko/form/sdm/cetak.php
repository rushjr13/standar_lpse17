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
        <h4 class="alert-heading font-weight-bold">DAFTAR RESIKO</h4>
      </div>
      <div class="col-md-2 m-auto">
        <img src="<?=base_url('assets/img/lpse.png') ?>" width="100%" class="img-fluid">
      </div>
    </div>
    <hr>
    <p class="mb-0 font-weight-bold">SUMBER DAYA MANUSIA (SDM)</p>
  </div>

  <div class="table-responsive">
    <table class="table table-sm table-striped table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead class="text-center">
        <tr>
          <th rowspan="3" class="align-middle">NO</th>
          <th rowspan="3" class="align-middle">SUB KLASIFIKASI</th>
          <th colspan="2" rowspan="2" class="align-middle">DAMPAK</th>
          <th colspan="2" rowspan="2" class="align-middle">PENGANCAM</th>
          <th colspan="6" class="align-middle">IDENTIFIKASI RESIKO BAWAAN</th>
          <th rowspan="3" class="align-middle">KONTROL</th>
          <th colspan="6" class="align-middle">IDENTIFIKASI RESIKO SISA</th>
          <th rowspan="2" colspan="3" class="align-middle">MITIGASI</th>
        </tr>
        <tr>
          <th colspan="2" class="align-middle">KERENTANAN</th>
          <th colspan="2" class="align-middle">PAPARAN</th>
          <th rowspan="2" class="align-middle">JENIS RESIKO</th>
          <th rowspan="2" class="align-middle">NILAI RESIKO</th>
          <th colspan="2" class="align-middle">KERENTANAN</th>
          <th colspan="2" class="align-middle">PAPARAN</th>
          <th rowspan="2" class="align-middle">JENIS RESIKO</th>
          <th rowspan="2" class="align-middle">NILAI RESIKO</th>
        </tr>
        <tr>
          <th class="align-middle">KET</th>
          <th class="align-middle">NILAI</th>
          <th class="align-middle">KET</th>
          <th class="align-middle">NILAI</th>
          <th class="align-middle">KET</th>
          <th class="align-middle">NILAI</th>
          <th class="align-middle">KET</th>
          <th class="align-middle">NILAI</th>
          <th class="align-middle">KET</th>
          <th class="align-middle">NILAI</th>
          <th class="align-middle">KET</th>
          <th class="align-middle">NILAI</th>
          <th class="align-middle">KONTROL</th>
          <th class="align-middle">PIC</th>
          <th class="align-middle">TARGET</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php if($resiko_sdm){ ?>
          <?php $no=1; $nilai=0; foreach ($resiko_sdm as $rsdm): ?>
            <?php
              $nilai = $rsdm['dampak']*$rsdm['pengancam']*$rsdm['kerentanan']*$rsdm['paparan'];
              if($nilai<=24){
                $jenis_resiko = 'Rendah';
              }else if($nilai>24 && $nilai<=64){
                $jenis_resiko = 'Sedang';
              }else if($nilai>64){
                $jenis_resiko = 'Tinggi';
              }
            ?>
            <tr>
              <td class="align-middle"><?=$no++ ?></td>
              <td class="align-middle"><?=$rsdm['kla_sdm'] ?><br><small class="text-primary"><small><?=$rsdm['id'] ?></small></small></td>
              <td class="align-middle">
                <?php if($rsdm['dampak']==1){echo 'Tidak ada';}else{ ?>
                  <small class="text-primary"><small>EKONOMI :</small></small><br><?=$rsdm['ekonomi'] ?><hr class="m-1">
                  <small class="text-primary"><small>REPUTASI :</small></small><br><?=$rsdm['reputasi'] ?><hr class="m-1">
                  <small class="text-primary"><small>PIDANA :</small></small><br><?=$rsdm['pidana'] ?><hr class="m-1">
                  <small class="text-primary"><small>KINERJA :</small></small><br><?=$rsdm['kinerja'] ?>
                <?php } ?>
              </td>
              <td class="align-middle"><?=$rsdm['dampak'] ?></td>
              <td class="align-middle"><?=$rsdm['tingkat_pengancam'] ?></td>
              <td class="align-middle"><?=$rsdm['pengancam'] ?></td>
              <td class="align-middle"><?=$rsdm['tingkat_rentan'] ?></td>
              <td class="align-middle"><?=$rsdm['kerentanan'] ?></td>
              <td class="align-middle"><?=$rsdm['tingkat_paparan'] ?></td>
              <td class="align-middle"><?=$rsdm['paparan'] ?></td>
              <td class="align-middle"><?=$jenis_resiko ?></td>
              <td class="align-middle"><?=number_format($nilai, 0, ',','.'); ?></td>
              <td class="align-middle">-</td>
              <td class="align-middle">-</td>
              <td class="align-middle">-</td>
              <td class="align-middle">-</td>
              <td class="align-middle">-</td>
              <td class="align-middle">-</td>
              <td class="align-middle">-</td>
              <td class="align-middle">-</td>
              <td class="align-middle">-</td>
              <td class="align-middle">-</td>
            </tr>
          <?php endforeach ?>
        <?php }else{ ?>
          <tr>
            <td colspan="22" class="align-middle">Tidak ada data yang tersedia!</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

<!-- Bootstrap core JavaScrsdmpt-->
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
