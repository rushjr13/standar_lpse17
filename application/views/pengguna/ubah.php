<?php
  date_default_timezone_set('Asia/Makassar');
  $tgl = date('d', $pengguna['tgl_daftar']);
  $bln = date('F', $pengguna['tgl_daftar']);
  $thn = date('Y', $pengguna['tgl_daftar']);
  $hari = date('l', $pengguna['tgl_daftar']);

  if($bln=='January'){
      $bulan='Januari';
  } else if($bln=='February'){
      $bulan='Februari';
  } else if($bln=='March'){
      $bulan='Maret';
  } else if($bln=='April'){
      $bulan='April';
  } else if($bln=='May'){
      $bulan='Mei';
  } else if($bln=='June'){
      $bulan='Juni';
  } else if($bln=='July'){
      $bulan='Juli';
  } else if($bln=='August'){
      $bulan='Agustus';
  } else if($bln=='September'){
      $bulan='September';
  } else if($bln=='October'){
      $bulan='Oktober';
  } else if($bln=='November'){
      $bulan='November';
  } else if($bln=='December'){
      $bulan='Desember';
  }

  if($hari=='Sunday'){
    $hr='Minggu';
  } else if($hari=='Monday'){
    $hr='Senin';
  } else if($hari=='Tuesday'){
    $hr='Selasa';
  } else if($hari=='Wednesday'){
    $hr='Rabu';
  } else if($hari=='Thursday'){
    $hr='Kamis';
  } else if($hari=='Friday'){
    $hr='Jumat';
  } else if($hari=='Saturday'){
    $hr='Sabtu';
  }

  $tgl_daftar = $hr.', '.$tgl.' '.$bulan.' '.$thn;
?>
<!-- DataTales Example -->
<div class="card border-primary shadow mb-4">
  <form action="<?=base_url('pengguna/ubah/').$pengguna['username'] ?>" method="post" enctype="multipart/form-data">
    <div class="card-header bg-primary text-white py-3">
      <strong><?=$pengguna['nama_lengkap'] ?></strong>
      <a href="<?=base_url('pengguna') ?>" class="btn btn-sm btn-circle btn-danger float-right shadow-sm" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
      <button type="submit" class="btn btn-sm btn-circle btn-info float-right mr-2 shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <img src="<?=base_url('assets/img/pengguna/').$pengguna['foto'] ?>" class="img-fluid shadow img-thumbnail rounded-circle">
        </div>
        <div class="col-md-8">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="username">Nama Pengguna</label>
                  <input type="text" readonly class="form-control shadow-sm"  id="username" name="username" placeholder="Nama Pengguna" value="<?=$pengguna['username'] ?>">
                </div><div class="col-md-6">
                  <label for="email">Email</label>
                  <input type="text" class="form-control shadow-sm" id="email" name="email" placeholder="Email" value="<?=$pengguna['email'] ?>">
                  <?php echo form_error('email', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="text" class="form-control shadow-sm"  id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?=$pengguna['nama_lengkap'] ?>">
                  <?php echo form_error('nama_lengkap', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
                </div><div class="col-md-6">
                  <label for="password">Kata Sandi</label>
                  <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Kata Sandi">
                  <small id="password" class="form-text text-muted">Kosongkan jika tidak ingin mengubah Kata Sandi!</small>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="id_level">Level</label>
                  <select class="form-control shadow-sm" id="id_level" name="id_level" placeholder="Pilih Level Pengguna">
                    <?php foreach ($level as $lvl): ?>
                      <option value="<?=$lvl['id_level'] ?>" <?php if($lvl['id_level']==$pengguna['id_level']){echo 'selected';} ?>><?=$lvl['nama_level'] ?></option>
                    <?php endforeach ?>
                  </select>
                  <?php echo form_error('id_level', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                  <label for="status">Status</label>
                  <select class="form-control shadow-sm" id="status" name="status" placeholder="Pilih Status Pengguna">
                    <option value="Aktif" <?php if($pengguna['status']=='Aktif'){echo 'selected';} ?>>Aktif</option>
                    <option value="Belum Aktif" <?php if($pengguna['status']=='Belum Aktif'){echo 'selected';} ?>>Belum Aktif</option>
                  </select>
                  <?php echo form_error('status', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="foto">Foto Profil</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto" name="foto">
                  <input type="hidden" class="form-control shadow-sm" id="fotolama" name="fotolama" value="<?=$pengguna['foto'] ?>">
                  <label class="custom-file-label shadow-sm" for="foto" data-browse="Pilih Foto Profil">Pilih foto profil dengan format <strong>.jpg, .jpeg, .png!</strong></label>
                  <small id="foto" class="form-text text-muted">Kosongkan jika tidak ingin mengubah foto profil!</small>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </form>
</div>