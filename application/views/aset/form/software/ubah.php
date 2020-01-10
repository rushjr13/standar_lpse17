<div class="row justify-content-md-center">
  <div class="col-8">
    <form action="<?=base_url('aset/form/software/ubah/').$aset_software['ids'] ?>" method="post">
      <div class="card shadow border-primary">
        <div class="card-header shadow-sm bg-primary text-white">Ubah Aset Perangkat Lunak (Software)</div>
        <div class="card-body">
          <label class="font-weight-bold">ASET SOFTWARE :</label>
          <div class="form-group row">
            <label for="id" class="col-md-12 col-form-label">Kode Aset : <strong><?=$aset_software['ids'] ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="<?=$aset_software['ids'] ?>">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Nama Aset" value="<?=$aset_software['nama'] ?>">
              <?php echo form_error('nama', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Aset</option>
                <option value="Operating System" <?php if($aset_software['klasifikasi']=='Operating System'){echo "selected";} ?>>Operating System</option>
                <option value="Application Server" <?php if($aset_software['klasifikasi']=='Application Server'){echo "selected";} ?>>Application Server</option>
                <option value="Application" <?php if($aset_software['klasifikasi']=='Application'){echo "selected";} ?>>Application</option>
                <option value="Lainnya" <?php if($aset_software['klasifikasi']=='Lainnya'){echo "selected";} ?>>Lainnya</option>
              </select>
              <?php echo form_error('klasifikasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">PEMILIK ASET :</label>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="pemilik" name="pemilik" placeholder="Pemilik Aset" value="<?=$aset_software['pemilik'] ?>">
              <?php echo form_error('pemilik', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="pemegang" name="pemegang" placeholder="Pemegang Aset" value="<?=$aset_software['pemegang'] ?>">
              <?php echo form_error('pemegang', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="lokasi" name="lokasi" placeholder="Lokasi Aset" value="<?=$aset_software['lokasi'] ?>">
              <?php echo form_error('lokasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <input type="date" class="form-control shadow-sm" id="berlaku" name="berlaku" placeholder="Masa Berlaku" value="<?=$aset_software['berlaku'] ?>">
              <?php echo form_error('berlaku', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="hapus" name="hapus">
                <option value="">Metode Penghapusan</option>
                <option value="Delete Normal" <?php if($aset_software['hapus']=='Delete Normal'){echo "selected";} ?>>Delete Normal</option>
                <option value="Lainnya" <?php if($aset_software['hapus']=='Lainnya'){echo "selected";} ?>>Lainnya</option>
              </select>
              <?php echo form_error('hapus', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="kerahasiaan" name="kerahasiaan">
                <option value="">Kerahasiaan</option>
                <?php foreach ($aset_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>" <?php if($aset_software['kerahasiaan']==$ar['id_rahasia']){echo "selected";} ?>><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('kerahasiaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="integritas" name="integritas">
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>" <?php if($aset_software['integritas']==$ai['id_integritas']){echo "selected";} ?>><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('integritas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="ketersediaan" name="ketersediaan">
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>" <?php if($aset_software['ketersediaan']==$as['id_sedia']){echo "selected";} ?>><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('ketersediaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control shadow-sm" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"><?=$aset_software['keterangan'] ?></textarea>
          </div>
        </div>
        <div class="card-footer text-right">
          <a href="<?=base_url('aset/form') ?>" class="btn shadow-sm btn-sm btn-circle btn-secondary" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
          <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>