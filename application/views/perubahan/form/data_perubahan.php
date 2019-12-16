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
        <h4 class="alert-heading font-weight-bold">FORMULIR PERUBAHAN</h4>
      </div>
      <div class="col-sm-2 m-auto">
        <img src="<?=base_url('assets/img/lpse.png') ?>" width="100%" class="img-fluid">
      </div>
    </div>
    <hr>
  </div>

  <div class="table-responsive">
    <div class="alert border-dark">
      <table class="table table-borderless m-0" width="100%" cellspacing="0">
        <tbody>
          <tr class="text-center">
            <td class="align-middle" width="50%">Kode Permohonan Perubahan :<br><strong><u><?=strtoupper($perubahan['id_perubahan']) ?></u></strong></td>
            <?php
              date_default_timezone_set('Asia/Makassar');
              $tgl = substr($perubahan['tgl_permohonanperubahan'], 8, 2);
              $bln = substr($perubahan['tgl_permohonanperubahan'], 5, 2);
              $thn = substr($perubahan['tgl_permohonanperubahan'], 0, 4);

              if($bln=='01'){
                  $bulan='Januari';
              } else if($bln=='02'){
                  $bulan='Februari';
              } else if($bln=='03'){
                  $bulan='Maret';
              } else if($bln=='04'){
                  $bulan='April';
              } else if($bln=='05'){
                  $bulan='Mei';
              } else if($bln=='06'){
                  $bulan='Juni';
              } else if($bln=='07'){
                  $bulan='Juli';
              } else if($bln=='08'){
                  $bulan='Agustus';
              } else if($bln=='09'){
                  $bulan='September';
              } else if($bln=='10'){
                  $bulan='Oktober';
              } else if($bln=='11'){
                  $bulan='November';
              } else if($bln=='12'){
                  $bulan='Desember';
              }

              $tgl_permohonanperubahan = $tgl.' '.$bulan.' '.$thn;
            ?>
            <td class="align-middle" width="50%">Tanggal Permohonan Perubahan :<br><strong><u><?=strtoupper($tgl_permohonanperubahan) ?></u></strong></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="alert border-dark">
      <center class="my-2"><strong class="h5">PEMOHON</strong></center>
      <table class="table m-0" width="100%" cellspacing="0">
        <tbody>
          <tr>
            <td width="18%" class="align-middle">Nama Pemohon</td>
            <td width="2%" class="align-middle">:</td>
            <th width="50%" class="align-middle"><em><?=strtoupper($perubahan['nama_pemohon']) ?></em></th>
            <td class="text-right" class="align-middle">Kontak Pemohon : <strong><em><?=strtoupper($perubahan['kontak_pemohon']) ?></em></strong></td>
          </tr>
          <tr>
            <td class="align-middle">Instansi</td>
            <td class="align-middle">:</td>
            <th colspan="2" class="align-middle"><em><?=strtoupper($perubahan['instansi_pemohon']) ?></em></th>
          </tr>
          <tr>
            <td colspan="4" class="align-middle">Deskripsi Perubahan :<br><strong><em><?=strtoupper($perubahan['deskripsi_perubahan']) ?></em></strong></td>
          </tr>
          <tr>
            <?php
              date_default_timezone_set('Asia/Makassar');
                $tgl_berlaku = substr($perubahan['tgl_berlakuperubahan'], 8, 2);
                $bln_berlaku = substr($perubahan['tgl_berlakuperubahan'], 5, 2);
                $thn_berlaku = substr($perubahan['tgl_berlakuperubahan'], 0, 4);

                if($bln_berlaku=='01'){
                    $bulan_berlaku='Januari';
                } else if($bln_berlaku=='02'){
                    $bulan_berlaku='Februari';
                } else if($bln_berlaku=='03'){
                    $bulan_berlaku='Maret';
                } else if($bln_berlaku=='04'){
                    $bulan_berlaku='April';
                } else if($bln_berlaku=='05'){
                    $bulan_berlaku='Mei';
                } else if($bln_berlaku=='06'){
                    $bulan_berlaku='Juni';
                } else if($bln_berlaku=='07'){
                    $bulan_berlaku='Juli';
                } else if($bln_berlaku=='08'){
                    $bulan_berlaku='Agustus';
                } else if($bln_berlaku=='09'){
                    $bulan_berlaku='September';
                } else if($bln_berlaku=='10'){
                    $bulan_berlaku='Oktober';
                } else if($bln_berlaku=='11'){
                    $bulan_berlaku='November';
                } else if($bln_berlaku=='12'){
                    $bulan_berlaku='Desember';
                }

                $tgl_berlakuperubahan = $tgl_berlaku.' '.$bulan_berlaku.' '.$thn_berlaku;
              ?>
            <td colspan="4" class="align-middle">Permintaan Perubahan berlaku mulai tanggal : <br><strong><em><?=strtoupper($tgl_berlakuperubahan) ?></em></strong></td>
          </tr>
          <tr>
            <td colspan="4" class="align-middle">Maksud & Tujuan Perubahan :<br><strong><em><?=strtoupper($perubahan['mt_perubahan']) ?></em></strong></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="alert border-dark">
      <center class="my-2"><strong class="h5">EVALUASI DAMPAK PERUBAHAN</strong></center>
      <table class="table m-0" width="100%" cellspacing="0">
        <tbody>
          <tr>
            <td class="align-middle" width="27%">Jenis Perubahan</td>
            <td class="align-middle" width="2%">:</td>
            <th class="align-middle"><em><?=strtoupper($perubahan['jenis_perubahan']) ?></em></th>
          </tr>
          <tr>
            <td class="align-middle">Kategori Perubahan</td>
            <td class="align-middle">:</td>
            <th class="align-middle"><em><?=strtoupper($perubahan['kategori_perubahan']) ?></em></th>
          </tr>
          <tr>
            <td class="align-middle">Dampak Kepada Lingkungan</td>
            <td class="align-middle">:</td>
            <th class="align-middle"><em><?=strtoupper($perubahan['dampak_lingkungan']) ?></em></th>
          </tr>
          <tr>
            <td class="align-middle">Sumber Yang Dibutuhkan</td>
            <td class="align-middle">:</td>
            <th class="align-middle"><em><?=strtoupper($perubahan['sumber']) ?></em></th>
          </tr>
          <tr>
            <td class="align-middle">Deskripsi Rencana Uji Coba</td>
            <td class="align-middle">:</td>
            <th class="align-middle"><em><?=strtoupper($perubahan['deskripsi_ujicoba']) ?></em></th>
          </tr>
          <tr>
            <td class="align-middle">Deskripsi <em>Roll Back</em></td>
            <td class="align-middle">:</td>
            <th class="align-middle"><em><?=strtoupper($perubahan['deskripsi_rollback']) ?></em></th>
          </tr>
        </tbody>
      </table>

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>

      <table class="table table-borderless m-0" width="100%" cellspacing="0">
        <tbody>
          <tr class="text-center">
            <td class="align-middle" width="50%">Pengelola Perubahan<br><br><br><br><br><strong><u><?=strtoupper($perubahan['pengelola_perubahan']) ?></u></strong></td>
            <td class="align-middle" width="50%">Pemohon<br><br><br><br><br><strong><u><?=strtoupper($perubahan['nama_pemohon']) ?></u></strong></td>
          </tr>
        </tbody>
      </table>

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    </div>
  </div>


  <div class="alert alert-ligth text-center m-0" role="alert">
    <div class="row">
      <div class="col-sm-2 m-auto">
        <img src="<?=base_url('assets/img/logo_provinsi.png') ?>" width="35%" class="img-fluid float-left">
      </div>
      <div class="col-sm-8 m-auto">
        <h6 class="font-weight-bold">LAYANAN PENGADAAN SECARA ELEKTRONIK</h6>
        <h4 class="alert-heading font-weight-bold">FORMULIR PERUBAHAN</h4>
      </div>
      <div class="col-sm-2 m-auto">
        <img src="<?=base_url('assets/img/lpse.png') ?>" width="100%" class="img-fluid">
      </div>
    </div>
    <hr>
  </div>

  <div class="table-responsive">
    <div class="alert border-dark">
      <table class="table table-borderless m-0" width="100%" cellspacing="0">
        <tbody>
          <tr class="text-center">
            <td class="align-middle" width="50%">Kode Permohonan Perubahan :<br><strong><u><?=strtoupper($perubahan['id_perubahan']) ?></u></strong></td>
            <?php
              date_default_timezone_set('Asia/Makassar');
              $tgl = substr($perubahan['tgl_permohonanperubahan'], 8, 2);
              $bln = substr($perubahan['tgl_permohonanperubahan'], 5, 2);
              $thn = substr($perubahan['tgl_permohonanperubahan'], 0, 4);

              if($bln=='01'){
                  $bulan='Januari';
              } else if($bln=='02'){
                  $bulan='Februari';
              } else if($bln=='03'){
                  $bulan='Maret';
              } else if($bln=='04'){
                  $bulan='April';
              } else if($bln=='05'){
                  $bulan='Mei';
              } else if($bln=='06'){
                  $bulan='Juni';
              } else if($bln=='07'){
                  $bulan='Juli';
              } else if($bln=='08'){
                  $bulan='Agustus';
              } else if($bln=='09'){
                  $bulan='September';
              } else if($bln=='10'){
                  $bulan='Oktober';
              } else if($bln=='11'){
                  $bulan='November';
              } else if($bln=='12'){
                  $bulan='Desember';
              }

              $tgl_permohonanperubahan = $tgl.' '.$bulan.' '.$thn;
            ?>
            <td class="align-middle" width="50%">Tanggal Permohonan Perubahan :<br><strong><u><?=strtoupper($tgl_permohonanperubahan) ?></u></strong></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="alert border-dark">
      <center class="my-2"><strong class="h5">PERSETUJUAN ATAU PENOLAKAN PERMINTAAN PERUBAHAN</strong></center>
      <table class="table m-0" width="100%" cellspacing="0">
        <tbody>
          <tr>
            <td width="18%" class="align-middle">Status Permintaan</td>
            <td width="2%" class="align-middle">:</td>
            <th class="align-middle">
              <em><?=strtoupper($perubahan['status_permintaan']) ?></em>
              <!-- <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" disabled <?php if($perubahan['status_permintaan']=='Setuju'){echo "checked";} ?>>
                <label class="custom-control-label"><em>SETUJU</em></label>
              </div>
              <div class="custom-control custom-checkbox custom-control-inline">
                <input type="checkbox" class="custom-control-input" disabled <?php if($perubahan['status_permintaan']=='Tidak Setuju'){echo "checked";} ?>>
                <label class="custom-control-label"><em>TIDAK SETUJU</em></label>
              </div> -->
            </th>
          </tr>
          <tr>
            <td class="align-middle">Keterangan</td>
            <td class="align-middle">:</td>
            <th colspan="2" class="align-middle"><em><?=strtoupper($perubahan['ket_statuspermintaan']) ?></em></th>
          </tr>
          <tr>
            <?php
                date_default_timezone_set('Asia/Makassar');
                $tgl_setuju = substr($perubahan['jadwal_perubahan'], 8, 2);
                $bln_setuju = substr($perubahan['jadwal_perubahan'], 5, 2);
                $thn_setuju = substr($perubahan['jadwal_perubahan'], 0, 4);

                if($bln_setuju=='01'){
                    $bulan_setuju='Januari';
                } else if($bln_setuju=='02'){
                    $bulan_setuju='Februari';
                } else if($bln_setuju=='03'){
                    $bulan_setuju='Maret';
                } else if($bln_setuju=='04'){
                    $bulan_setuju='April';
                } else if($bln_setuju=='05'){
                    $bulan_setuju='Mei';
                } else if($bln_setuju=='06'){
                    $bulan_setuju='Juni';
                } else if($bln_setuju=='07'){
                    $bulan_setuju='Juli';
                } else if($bln_setuju=='08'){
                    $bulan_setuju='Agustus';
                } else if($bln_setuju=='09'){
                    $bulan_setuju='September';
                } else if($bln_setuju=='10'){
                    $bulan_setuju='Oktober';
                } else if($bln_setuju=='11'){
                    $bulan_setuju='November';
                } else if($bln_setuju=='12'){
                    $bulan_setuju='Desember';
                }

                $jadwal_perubahan = $tgl_setuju.' '.$bulan_setuju.' '.$thn_setuju;
            ?>
            <td colspan="3" class="align-middle">Jadwal Perubahan (Tanggal) : <br><strong><em><?=strtoupper($jadwal_perubahan) ?></em></strong></td>
          </tr>
          <tr>
            <td colspan="3" class="align-middle">Penugasan Untuk Implementasi (Nama) :<br><strong><em><?=strtoupper($perubahan['petugas_implementasi']) ?></em></strong></td>
          </tr>
          <tr>
            <td colspan="3" class="align-middle text-center"><br><br><br>KEPALA LPSE<br><br><br><br><strong><em>________________________________</em></strong><br><br><br></td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="alert border-dark">
      <center class="my-2"><strong class="h5">IMPLEMENTASI PERUBAHAN</strong></center>
      <table class="table m-0" width="100%" cellspacing="0">
        <tbody>
          <tr>
            <td colspan="3" class="align-middle">Hasil Dari Tes Perubahan :<br><strong><em><?=strtoupper($perubahan['test_perubahan']) ?></em></strong></td>
          </tr>
          <tr>
            <td colspan="3" class="align-middle">Hasil Implementasi Perubahan :<br><strong><em><?=strtoupper($perubahan['implementasi_perubahan']) ?></em></strong></td>
          </tr>
          <tr>
            <td class="align-middle" width="23%">Tanggal Implementasi</td>
            <td class="align-middle" width="2%">:</td>
            <?php
                date_default_timezone_set('Asia/Makassar');
                $t_implementasi = substr($perubahan['tgl_implementasi'], 8, 2);
                $b_implementasi = substr($perubahan['tgl_implementasi'], 5, 2);
                $th_implementasi = substr($perubahan['tgl_implementasi'], 0, 4);

                if($b_implementasi=='01'){
                    $bulan_implementasi='Januari';
                } else if($b_implementasi=='02'){
                    $bulan_implementasi='Februari';
                } else if($b_implementasi=='03'){
                    $bulan_implementasi='Maret';
                } else if($b_implementasi=='04'){
                    $bulan_implementasi='April';
                } else if($b_implementasi=='05'){
                    $bulan_implementasi='Mei';
                } else if($b_implementasi=='06'){
                    $bulan_implementasi='Juni';
                } else if($b_implementasi=='07'){
                    $bulan_implementasi='Juli';
                } else if($b_implementasi=='08'){
                    $bulan_implementasi='Agustus';
                } else if($b_implementasi=='09'){
                    $bulan_implementasi='September';
                } else if($b_implementasi=='10'){
                    $bulan_implementasi='Oktober';
                } else if($b_implementasi=='11'){
                    $bulan_implementasi='November';
                } else if($b_implementasi=='12'){
                    $bulan_implementasi='Desember';
                }

                $tgl_implementasi = $t_implementasi.' '.$bulan_implementasi.' '.$th_implementasi;
            ?>
            <th class="align-middle"><em><?=strtoupper($tgl_implementasi) ?></em></th>
          </tr>
          <tr>
            <td colspan="3" class="align-middle text-center"><br><br><br>Eksekutor<br><br><br><br><strong><u><?=strtoupper($perubahan['petugas_implementasi']) ?></u></strong><br><br><br><br><br><br><br></td>
          </tr>
        </tbody>
      </table>
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
