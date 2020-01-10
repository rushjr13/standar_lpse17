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
        <h4 class="alert-heading font-weight-bold">PENCATATAN PENGGUNAAN FASILITAS & AKSES RUANG SERVER</h4>
      </div>
      <div class="col-md-2 m-auto">
        <img src="<?=base_url('assets/img/lpse.png') ?>" width="100%" class="img-fluid">
      </div>
    </div>
    <hr>
  </div>

  <div class="table-responsive small">
    <table class="table table-sm table-striped table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead class="bg-secondary text-center text-white">
        <tr>
          <th class="align-middle" colspan="2">NO</th>
          <th class="align-middle" colspan="5">IDENTITAS</th>
          <th class="align-middle" colspan="3">WAKTU</th>
          <th class="align-middle" rowspan="2">TUJUAN</th>
          <th class="align-middle" colspan="2">FASILITAS / PERANGKAT</th>
          <th class="align-middle" rowspan="2" width="5%">STATUS</th>
        </tr>
        <tr>
          <th class="align-middle" width="2%">URUT</th>
          <th class="align-middle" width="4%">BADGE</th>
          <th class="align-middle">NAMA</th>
          <th class="align-middle">INSTANSI</th>
          <th class="align-middle">ALAMAT</th>
          <th class="align-middle" width="4%">JENIS ID</th>
          <th class="align-middle" width="9%">NOMOR ID</th>
          <th class="align-middle" width="8%">TANGGAL</th>
          <th class="align-middle" width="6%">JAM MASUK</th>
          <th class="align-middle" width="6%">JAM KELUAR</th>
          <th class="align-middle">JENIS</th>
          <th class="align-middle">NO. SERI</th>
        </tr>
      </thead>
      <tbody>
        <!-- PENGGUNAAN FASILITAS LPSE -->
        <tr>
          <th class="align-middle" colspan="14">Penggunaan Fasilitas LPSE</th>
        </tr>
        <?php if($fasilitas){ ?>
          <?php $no=1; foreach ($fasilitas as $fslt): ?>
            <?php
              if($fslt['status_ijin']=="Tunda"){
                $warna="text-primary";
              }else if($fslt['status_ijin']=="Tidak Setuju"){
                $warna="text-danger";
              }else{
                $warna="text-dark";
              }
              $this->db->where('id_ijin_perangkat', $fslt['id_ijin_perangkat']);
              $fslt_detail = $this->db->get('perangkat_detail')->row_array();
            ?>
            <tr class="<?=$warna ?>">
              <td class="align-middle text-center"><?=$no++ ?></td>
              <td class="align-middle text-center"><?=$fslt['no_badge'] ?></td>
              <td class="align-middle"><?=$fslt['nama'] ?></td>
              <td class="align-middle"><?=$fslt['instansi'] ?></td>
              <td class="align-middle"><?=$fslt['alamat'] ?></td>
              <td class="align-middle text-center"><?=$fslt['jenis_identitas'] ?></td>
              <td class="align-middle text-center"><?=$fslt['identitas'] ?></td>
              <td class="align-middle text-center"><?=$fslt_detail['tanggal_pelaksanaan'] ?></td>
              <td class="align-middle text-center"><?=$fslt_detail['jam_masuk'] ?></td>
              <td class="align-middle text-center"><?=$fslt_detail['jam_keluar'] ?></td>
              <td class="align-middle"><?=$fslt['tujuan'] ?></td>
              <td class="align-middle text-center"><?=$fslt_detail['jenis_fasilitas'] ?></td>
              <td class="align-middle text-center"><?=$fslt_detail['seri_fasilitas'] ?></td>
              <td class="align-middle text-center"><?=$fslt['status_ijin'] ?></td>
            </tr>
          <?php endforeach ?>
        <?php }else{ ?>
          <tr>
            <td colspan="14" class="align-middle">Tidak ada data Penggunaan Fasilitas LPSE!</td>
          </tr>
        <?php } ?>

        <!-- AKSES RUANG SERVER -->
        <tr>
          <th class="align-middle" colspan="14">Akses Ruang Server LPSE</th>
        </tr>
        <?php if($server){ ?>
          <?php $no=1; foreach ($server as $srv): ?>
            <?php
              if($srv['status_ijin']=="Tunda"){
                $warna="text-primary";
              }else if($srv['status_ijin']=="Tidak Setuju"){
                $warna="text-danger";
              }else{
                $warna="text-dark";
              }
              $this->db->where('id_ijin_perangkat', $srv['id_ijin_perangkat']);
              $srv_detail = $this->db->get('perangkat_detail')->row_array();
            ?>
            <tr class="<?=$warna ?>">
              <td class="align-middle text-center"><?=$no++ ?></td>
              <td class="align-middle text-center"><?=$srv['no_badge'] ?></td>
              <td class="align-middle"><?=$srv['nama'] ?></td>
              <td class="align-middle"><?=$srv['instansi'] ?></td>
              <td class="align-middle"><?=$srv['alamat'] ?></td>
              <td class="align-middle text-center"><?=$srv['jenis_identitas'] ?></td>
              <td class="align-middle text-center"><?=$srv['identitas'] ?></td>
              <td class="align-middle text-center"><?=$srv_detail['tanggal_pelaksanaan'] ?></td>
              <td class="align-middle text-center"><?=$srv_detail['jam_masuk'] ?></td>
              <td class="align-middle text-center"><?=$srv_detail['jam_keluar'] ?></td>
              <td class="align-middle"><?=$srv['tujuan'] ?></td>
              <td class="align-middle text-center"><?=$srv_detail['jenis_fasilitas'] ?></td>
              <td class="align-middle text-center"><?=$srv_detail['seri_fasilitas'] ?></td>
              <td class="align-middle text-center"><?=$srv['status_ijin'] ?></td>
            </tr>
          <?php endforeach ?>
        <?php }else{ ?>
          <tr>
            <td colspan="14" class="align-middle">Tidak ada data Akses Ruang Server LPSE!</td>
          </tr>
        <?php } ?>
      </tbody>
    </table>

    <div class="ml-4 small">
      <p class="m-0">Keterangan</p>
      <ul>
        <li class="text-primary">Teks Biru = Ijin Ditunda</li>
        <li class="text-dark">Teks Hitam = Ijin Disetujui</li>
        <li class="text-danger">Teks Merah = Ijin Tidak Disetujui</li>
      </ul>
    </div>

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
