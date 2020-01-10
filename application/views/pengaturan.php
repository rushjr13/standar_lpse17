<div class="row">
  <div class="col-2">
    <div class="list-group shadow-sm" id="list-tab" role="tablist">
      <a class="list-group-item shadow-sm list-group-item-action active" id="list-app-list" data-toggle="list" href="#list-app" role="tab" aria-controls="app">Aplikasi</a>
      <a class="list-group-item shadow-sm list-group-item-action" id="list-kontak-list" data-toggle="list" href="#list-kontak" role="tab" aria-controls="kontak">Kontak</a>
      <a class="list-group-item shadow-sm list-group-item-action" id="list-sosmed-list" data-toggle="list" href="#list-sosmed" role="tab" aria-controls="sosmed">Sosial Media</a>
      <a class="list-group-item shadow-sm list-group-item-action" id="list-informasi-list" data-toggle="list" href="#list-informasi" role="tab" aria-controls="informasi">Lokasi</a>
      <a class="list-group-item shadow-sm list-group-item-action" id="list-logo-list" data-toggle="list" href="#list-logo" role="tab" aria-controls="logo">Logo & Icon</a>
    </div>
  </div>
  <div class="col-10">
    <form action="<?=base_url('pengaturan') ?>" method="post" enctype="mutlipart/form-data">
      <div class="card shadow border-primary">
        <div class="tab-content" id="nav-tabContent">
          <!-- APLIKASI -->
          <div class="tab-pane fade show active" id="list-app" role="tabpanel" aria-labelledby="list-app-list">
            <h5 class="card-header bg-primary text-white">Aplikasi & Website</h5>
            <div class="card-body row justify-content-md-center">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="nama_web">Nama Aplikasi / Website</label>
                  <input type="text" class="form-control shadow-sm" id="nama_web" name="nama_web" placeholder="Nama Aplikasi / Website" value="<?=$pengaturan['nama_web'] ?>">
                  <?php echo form_error('nama_web', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="alias">Nama Alias Aplikasi / Website</label>
                  <input type="text" class="form-control shadow-sm" id="alias" name="alias" placeholder="Nama Alias Aplikasi / Website" value="<?=$pengaturan['alias'] ?>">
                  <?php echo form_error('alias', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="url">URL / Link Aplikasi / Website</label>
                  <input type="text" class="form-control shadow-sm" id="url" name="url" placeholder="URL / Link Aplikasi / Website" value="<?=$pengaturan['url'] ?>">
                  <?php echo form_error('url', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label for="info">Informasi Aplikasi</label>
                  <textarea rows="5" class="form-control shadow-sm ckeditor" id="info" name="info" placeholder="Alamat Lengkap"><?=$pengaturan['info'] ?></textarea>
                  <?php echo form_error('info', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
              </div>
            </div>
          </div>

          <!-- KONTAK -->
          <div class="tab-pane fade" id="list-kontak" role="tabpanel" aria-labelledby="list-kontak-list">
            <h5 class="card-header bg-primary text-white">Kontak</h5>
            <div class="card-body row justify-content-md-center">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="email">Alamat Email</label>
                  <input type="text" class="form-control shadow-sm" id="email" name="email" placeholder="Alamat Email" value="<?=$pengaturan['email'] ?>">
                  <?php echo form_error('email', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="telpon">No. Telepon</label>
                  <input type="text" class="form-control shadow-sm" id="telpon" name="telpon" placeholder="No. Telepon" value="<?=$pengaturan['telpon'] ?>">
                  <?php echo form_error('telpon', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="jam_kerja">Jam Pelayanan</label>
                  <input type="text" class="form-control shadow-sm" id="jam_kerja" name="jam_kerja" placeholder="Jam Pelayanan" value="<?=$pengaturan['jam_kerja'] ?>">
                  <?php echo form_error('jam_kerja', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
              </div>
              <div class="col-md-8">
                <div class="form-group">
                  <label for="alamat">Alamat Lengkap</label>
                  <textarea rows="5" class="form-control shadow-sm ckeditor" id="alamat" name="alamat" placeholder="Alamat Lengkap"><?=$pengaturan['alamat'] ?></textarea>
                  <?php echo form_error('alamat', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
              </div>
            </div>
          </div>

          <!-- SOSMED -->
          <div class="tab-pane fade" id="list-sosmed" role="tabpanel" aria-labelledby="list-sosmed-list">
            <h5 class="card-header bg-primary text-white">Sosial Media</h5>
            <div class="card-body row justify-content-md-center">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="facebook">Facebook</label>
                  <input type="text" class="form-control shadow-sm" id="facebook" name="facebook" placeholder="Facebook" value="<?=$pengaturan['facebook'] ?>">
                  <?php echo form_error('facebook', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="instagram">Instagram</label>
                  <input type="text" class="form-control shadow-sm" id="instagram" name="instagram" placeholder="Instagram" value="<?=$pengaturan['instagram'] ?>">
                  <?php echo form_error('instagram', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="twitter">Twitter</label>
                  <input type="text" class="form-control shadow-sm" id="twitter" name="twitter" placeholder="Twitter" value="<?=$pengaturan['twitter'] ?>">
                  <?php echo form_error('twitter', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
                </div>
              </div>
            </div>
          </div>

          <!-- INFORMASI -->
          <div class="tab-pane fade" id="list-informasi" role="tabpanel" aria-labelledby="list-informasi-list">
            <h5 class="card-header bg-primary text-white">Lokasi</h5>
            <div class="card-body">
              <div class="embed-responsive embed-responsive-21by9 mb-3 shadow-sm">
                <iframe class="embed-responsive-item img-thumbnail" src="<?=$pengaturan['map'] ?>" allowfullscreen></iframe>
              </div>
              <div class="form-group row mb-0">
                <label for="map" class="col-md-2 col-form-label">URL Google Map</label>
                <div class="col-md-10">
                  <input type="text" class="form-control shadow-sm" id="map" name="map" placeholder="URL Google Map" value="<?=$pengaturan['map'] ?>">
                  <?php echo form_error('map', '<small class="text-danger" style="font-style:italic;"><i class="fa fa-fw fa-exclamation"></i>', '</small>'); ?>
                </div>
              </div>
            </div>
          </div>

          <!-- LOGO & ICON -->
          <div class="tab-pane fade" id="list-logo" role="tabpanel" aria-labelledby="list-logo-list">
            <h5 class="card-header bg-primary text-white">Logo & Icon</h5>
            <div class="card-body row justify-content-md-center">
              <div class="col-md-4">
                <div class="card shadow border-danger">
                  <div class="card-header bg-danger text-white">
                    Icon
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <img src="<?=base_url('assets/img/').$pengaturan['icon'] ?>" width="100%" class="img-fluid img-thumbnail shadow-sm">
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="card shadow border-danger mb-4">
                  <div class="card-header bg-danger text-white">
                    Logo
                  </div>
                  <div class="card-body">
                    <div class="text-center">
                      <img src="<?=base_url('assets/img/').$pengaturan['logo'] ?>" width="100%" class="img-fluid img-thumbnail shadow-sm">
                    </div>
                  </div>
                </div>
                <div class="card shadow-sm">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="logo">Logo</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input shadow-sm" id="logo" name="logo">
                        <input type="hidden" class="custom-file-input shadow-sm" id="logolama" name="logolama" value="<?=$pengaturan['logo'] ?>">
                        <label class="custom-file-label shadow-sm" for="logo" data-browse="Pilih Logo">Pilih Logo dengan format <strong>.png, .jpg, .jpeg</strong>!</label>
                        <small class="form-text text-muted">Logo saat ini : <?=$pengaturan['logo'] ?></small>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="icon">Icon</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input shadow-sm" id="icon" name="icon">
                        <input type="hidden" class="custom-file-input shadow-sm" id="iconlama" name="iconlama" value="<?=$pengaturan['icon'] ?>">
                        <label class="custom-file-label shadow-sm" for="icon" data-browse="Pilih Icon">Pilih Icon dengan format <strong>.png, .jpg, .jpeg</strong>!</label>
                        <small class="form-text text-muted">Icon saat ini : <?=$pengaturan['icon'] ?></small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="reset" class="btn btn-sm btn-circle btn-secondary float-right shadow-sm" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-primary float-right mr-2 shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>