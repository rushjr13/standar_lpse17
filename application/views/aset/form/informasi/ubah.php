<div class="row justify-content-md-center">
	<div class="col-8">
		<form action="<?=base_url('aset/form/informasi/ubah/').$aset_informasi['id'] ?>" method="post">
			<div class="card shadow border-primary">
				<div class="card-header shadow-sm bg-primary text-white">Ubah Aset Informasi : <?=$aset_informasi['nama'] ?></div>
				<div class="card-body">
					<label class="font-weight-bold">ASET INFORMASI :</label>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode Aset</label>
            <div class="col-sm-4">
              <input type="text" readonly class="form-control-plaintext" id="id" name="id" value="<?=$aset_informasi['id'] ?>">
            </div>
            <label for="id" class="col-sm-2 col-form-label text-right">Klasifikasi</label>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi">
                <option value="">Klasifikasi Aset</option>
                <option value="Dokumen Tertulis Internal" <?php if($aset_informasi['klasifikasi']=='Dokumen Tertulis Internal'){echo 'selected';} ?>>Dokumen Tertulis Internal</option>
              </select>
              <?php echo form_error('klasifikasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Aset</label>
            <div class="col-sm-10">
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Nama Aset" value="<?=$aset_informasi['nama'] ?>">
              <?php echo form_error('nama', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="format" class="col-sm-2 col-form-label">Format Penyimpanan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control shadow-sm" id="format" name="format" placeholder="Format Penyimpanan" value="<?=$aset_informasi['format'] ?>">
              <?php echo form_error('format', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="pemilik" class="col-sm-2 col-form-label">Pemilik Aset</label>
            <div class="col-sm-4">
              <input type="text" class="form-control shadow-sm" id="pemilik" name="pemilik" placeholder="Pemilik Aset" value="<?=$aset_informasi['pemilik'] ?>">
              <?php echo form_error('pemilik', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <label for="berlaku" class="col-sm-2 col-form-label text-right">Masa Berlaku</label>
            <div class="col-sm-4">
              <input type="text" class="form-control shadow-sm" id="berlaku" name="berlaku" placeholder="Masa Berlaku" value="<?=$aset_informasi['berlaku'] ?>" required>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="kerahasiaan" name="kerahasiaan">
                <option value="">Kerahasiaan</option>
                <?php foreach ($aset_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>" <?php if($aset_informasi['kerahasiaan']==$ar['id_rahasia']){echo "selected";} ?>><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('kerahasiaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="integritas" name="integritas">
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>" <?php if($aset_informasi['integritas']==$ai['id_integritas']){echo "selected";} ?>><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('integritas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="ketersediaan" name="ketersediaan">
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>" <?php if($aset_informasi['ketersediaan']==$as['id_sedia']){echo "selected";} ?>><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('ketersediaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-10">
              <textarea class="form-control shadow-sm" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"><?=$aset_informasi['keterangan'] ?></textarea>
            </div>
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