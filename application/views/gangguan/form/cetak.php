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
        <h4 class="alert-heading font-weight-bold">Pencatatan Gangguan/Permasalahan dan Permintaan Layanan</h4>
      </div>
      <div class="col-md-2 m-auto">
        <img src="<?=base_url('assets/img/lpse.png') ?>" width="100%" class="img-fluid">
      </div>
    </div>
  </div>

  <div class="table-responsive">
    <table class="table table-sm table-bordered table-striped table-hover m-0" width="100%" id="dataTable" cellspacing="0">
      <thead>
        <tr class="bg-secondary text-center text-white small">
          <th rowspan="4" class="align-middle">NO. TIKET</th>
          <th colspan="4" class="align-middle">INFORMASI PELAPORAN</th>
          <th rowspan="4" class="align-middle">DESKRIPSI</th>
          <th colspan="7" class="align-middle">KLASIFIKASI</th>
          <th colspan="4" class="align-middle">INFORMASI PENANGANAN</th>
          <th colspan="3" class="align-middle">INFORMASI PENYELESAIAN</th>
        </tr>
        <tr class="bg-secondary text-center text-white small">
          <th rowspan="3" class="align-middle">NAMA PENGGUNA</th>
          <th rowspan="3" class="align-middle">KONTAK PENGGUNA</th>
          <th rowspan="3" class="align-middle">MEDIA PELAPORAN<br><small>(E-Mail, Telepon, SMS, Surat, Lainnya)</small></th>
          <th rowspan="3" class="align-middle">TANGGAL PELAPORAN</th>
          <th class="align-middle">TIPE</th>
          <th class="align-middle">KATEGORI</th>
          <th class="align-middle">USER</th>
          <th class="align-middle">JENIS</th>
          <th class="align-middle">URGENSI</th>
          <th class="align-middle">DAMPAK</th>
          <th class="align-middle">PRIORITAS</th>
          <th rowspan="3" class="align-middle">NAMA PETUGAS</th>
          <th rowspan="3" class="align-middle">STATUS</th>
          <th rowspan="3" class="align-middle">KETERANGAN</th>
          <th rowspan="3" class="align-middle">TANGGAL PEMUTAKHIRAN</th>
          <th rowspan="3" class="align-middle">SOLUSI</th>
          <th rowspan="3" class="align-middle">TANGGAL PENYELESAIAN</th>
          <th rowspan="3" class="align-middle">STATUS KONFIRMASI KEPADA PENGGUNA</th>
        </tr>
        <tr class="bg-secondary text-center text-white small">
          <th class="align-middle small">Gangguan, Masalah, Permintaan Layanan</th>
          <th class="align-middle small">Teknis, Non Teknis</th>
          <th class="align-middle small">Panitia, Penyedia, PPK, Auditor, Publik, Lainnya</th>
          <th class="align-middle small">Hardware, Software, Prosedur, Lain-lain</th>
          <th class="align-middle small">Mendesak, Tidak Mendesak</th>
          <th class="align-middle small">Besar, Sedang, Kecil</th>
          <th class="align-middle small">Tinggi, Menengah, Rendah</th>
        </tr>
        <tr class="bg-secondary text-center text-white small">
          <th class="align-middle small">G, M, PL</th>
          <th class="align-middle small">T, NT</th>
          <th class="align-middle small">Pt, Py, PPK, Aud, Pub, L</th>
          <th class="align-middle small">Hw, Sw, Ps, L</th>
          <th class="align-middle small">M, TM</th>
          <th class="align-middle small">B, S, K</th>
          <th class="align-middle small">T, M, R</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($gangguan as $gg): ?>
          <?php if($gg['status_gangguan']=='Tercatat'){ ?>
            <tr class="text-center text-danger small">
              <td class="align-middle"><?=$gg['id_gangguan'] ?></td>
              <td class="align-middle"><?=$gg['nama_pengguna'] ?></td>
              <td class="align-middle"><?=$gg['kontak_pengguna'] ?></td>
              <td class="align-middle"><?=$gg['media_pelaporan'] ?></td>
              <td class="align-middle"><?=$gg['tgl_pelaporan'] ?></td>
              <td class="align-middle"><?=$gg['deskripsi_gangguan'] ?></td>
              <td class="align-middle"><?=$gg['kode_tipe'] ?></td>
              <td class="align-middle"><?=$gg['kode_kategori'] ?></td>
              <td class="align-middle"><?=$gg['kode_user'] ?></td>
              <td class="align-middle"><?=$gg['kode_jenis'] ?></td>
              <td class="align-middle"><?=$gg['kode_urgensi'] ?></td>
              <td class="align-middle"><?=$gg['kode_dampak'] ?></td>
              <td class="align-middle"><?=$gg['kode_prioritas'] ?></td>
              <td class="align-middle"><?=$gg['petugas_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['status_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['ket_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['tgl_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['solusi_penyelesaian'] ?></td>
              <td class="align-middle"><?=$gg['tgl_penyelesaian'] ?></td>
              <td class="align-middle"><?=$gg['status_konfirmasi'] ?></td>
            </tr>
          <?php }else if($gg['status_gangguan']=='Penanganan'){ ?>
            <tr class="text-center text-success small">
              <td class="align-middle"><?=$gg['id_gangguan'] ?></td>
              <td class="align-middle"><?=$gg['nama_pengguna'] ?></td>
              <td class="align-middle"><?=$gg['kontak_pengguna'] ?></td>
              <td class="align-middle"><?=$gg['media_pelaporan'] ?></td>
              <td class="align-middle"><?=$gg['tgl_pelaporan'] ?></td>
              <td class="align-middle"><?=$gg['deskripsi_gangguan'] ?></td>
              <td class="align-middle"><?=$gg['kode_tipe'] ?></td>
              <td class="align-middle"><?=$gg['kode_kategori'] ?></td>
              <td class="align-middle"><?=$gg['kode_user'] ?></td>
              <td class="align-middle"><?=$gg['kode_jenis'] ?></td>
              <td class="align-middle"><?=$gg['kode_urgensi'] ?></td>
              <td class="align-middle"><?=$gg['kode_dampak'] ?></td>
              <td class="align-middle"><?=$gg['kode_prioritas'] ?></td>
              <td class="align-middle"><?=$gg['petugas_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['status_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['ket_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['tgl_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['solusi_penyelesaian'] ?></td>
              <td class="align-middle"><?=$gg['tgl_penyelesaian'] ?></td>
              <td class="align-middle"><?=$gg['status_konfirmasi'] ?></td>
            </tr>
          <?php }else{ ?>
            <tr class="text-center small">
              <td class="align-middle"><?=$gg['id_gangguan'] ?></td>
              <td class="align-middle"><?=$gg['nama_pengguna'] ?></td>
              <td class="align-middle"><?=$gg['kontak_pengguna'] ?></td>
              <td class="align-middle"><?=$gg['media_pelaporan'] ?></td>
              <td class="align-middle"><?=$gg['tgl_pelaporan'] ?></td>
              <td class="align-middle"><?=$gg['deskripsi_gangguan'] ?></td>
              <td class="align-middle"><?=$gg['kode_tipe'] ?></td>
              <td class="align-middle"><?=$gg['kode_kategori'] ?></td>
              <td class="align-middle"><?=$gg['kode_user'] ?></td>
              <td class="align-middle"><?=$gg['kode_jenis'] ?></td>
              <td class="align-middle"><?=$gg['kode_urgensi'] ?></td>
              <td class="align-middle"><?=$gg['kode_dampak'] ?></td>
              <td class="align-middle"><?=$gg['kode_prioritas'] ?></td>
              <td class="align-middle"><?=$gg['petugas_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['status_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['ket_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['tgl_penanganan'] ?></td>
              <td class="align-middle"><?=$gg['solusi_penyelesaian'] ?></td>
              <td class="align-middle"><?=$gg['tgl_penyelesaian'] ?></td>
              <td class="align-middle"><?=$gg['status_konfirmasi'] ?></td>
            </tr>
          <?php } ?>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>

  <div class="alert my-1">
    <h6 class="alert-heading">Keterangan :</h6>
    <ul class="small">
      <li class="text-danger"><?=$this->db->get_where('gangguan', ['status_gangguan'=>'Tercatat'])->num_rows(); ?> Gangguan/Masalah Tercatat tapi belum ditangani</li>
      <li class="text-success"><?=$this->db->get_where('gangguan', ['status_gangguan'=>'Penanganan'])->num_rows(); ?> Gangguan/Masalah Tercatat dan sudah ditangani tapi belum ada penyelesaian</li>
      <li><?=$this->db->get_where('gangguan', ['status_gangguan'=>'Penyelesaian'])->num_rows(); ?> Gangguan/Masalah selesai</li>
    </ul>
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
