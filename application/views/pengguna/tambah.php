<!-- DataTales Example -->
<div class="card border-primary shadow mb-4">
  <form action="<?=base_url('pengguna/tambah') ?>" method="post" enctype="multipart/form-data">
    <div class="card-header bg-primary text-white py-3">
      <strong><?=$subjudul ?></strong>
      <a href="<?=base_url('pengguna') ?>" class="btn btn-sm btn-circle btn-danger float-right shadow-sm" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
      <button type="submit" class="btn btn-sm btn-circle btn-info float-right mr-2 shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-4">
          <img src="<?=base_url('assets/img/pengguna/user.png') ?>" class="img-fluid shadow img-thumbnail rounded-circle">
        </div>
        <div class="col-md-8">
          <div class="card shadow-sm">
            <div class="card-body">
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="username">Nama Pengguna</label>
                  <input type="text" class="form-control shadow-sm"  id="username" name="username" placeholder="Nama Pengguna" value="<?=set_value('username') ?>" autofocus>
                  <?php echo form_error('username', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
                </div><div class="col-md-6">
                  <label for="email">Email</label>
                  <input type="text" class="form-control shadow-sm" id="email" name="email" placeholder="Email" value="<?=set_value('email') ?>">
                  <?php echo form_error('email', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="nama_lengkap">Nama Lengkap</label>
                  <input type="text" class="form-control shadow-sm"  id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" value="<?=set_value('nama_lengkap') ?>">
                  <?php echo form_error('nama_lengkap', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
                </div><div class="col-md-6">
                  <label for="password">Kata Sandi</label>
                  <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Kata Sandi" value="123456">
                  <?php echo form_error('password', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
                  <small id="password" class="form-text text-muted">Kata Sandi default : <strong>123456</strong></small>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-md-6">
                  <label for="id_level">Level</label>
                  <select class="form-control shadow-sm" id="id_level" name="id_level" placeholder="Pilih Level Pengguna">
                    <?php foreach ($level as $lvl): ?>
                      <option value="<?=$lvl['id_level'] ?>"><?=$lvl['nama_level'] ?></option>
                    <?php endforeach ?>
                  </select>
                  <?php echo form_error('id_level', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
                </div>
                <div class="col-md-6">
                  <label for="status">Status</label>
                  <select class="form-control shadow-sm" id="status" name="status" placeholder="Pilih Status Pengguna">
                    <option value="Aktif">Aktif</option>
                    <option value="Belum Aktif">Belum Aktif</option>
                  </select>
                  <?php echo form_error('status', '<small class="text-danger" style="font-style:italic;">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="foto">Foto Profil</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto" name="foto">
                  <label class="custom-file-label shadow-sm" for="foto" data-browse="Pilih Foto Profil">Pilih foto profil dengan format <strong>.jpg, .jpeg, .png!</strong></label>
                  <small id="foto" class="form-text text-muted">Kosongkan jika belum ingin menambah foto profil!</small>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </form>
</div>