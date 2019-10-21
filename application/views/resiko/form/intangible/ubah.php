<div class="row justify-content-md-center">
	<div class="col-8">
		<form action="<?=base_url('aset/form/intangible/ubah/').$aset_intangible['idi'] ?>" method="post">
			<div class="card shadow border-primary">
				<div class="card-header bg-primary text-white">Ubah Aset Intangible <?=$aset_intangible['nama'] ?></div>
				<div class="card-body">
          <div class="form-group row">
            <label for="id" class="col-md-12 col-form-label">Kode Aset : <strong><?=$aset_intangible['idi'] ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="<?=$aset_intangible['idi'] ?>">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Aset" value="<?=$aset_intangible['nama'] ?>">
              <?php echo form_error('nama', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <select class="custom-select" id="klasifikasi" name="klasifikasi">
                <option value="">Klasifikasi Aset</option>
                <option value="Layanan-Layanan" <?php if($aset_intangible['klasifikasi']=='Layanan-Layanan'){echo "selected";} ?>>Layanan-Layanan</option>
                <option value="Lainnya" <?php if($aset_intangible['klasifikasi']=='Lainnya'){echo "selected";} ?>>Lainnya</option>
              </select>
              <?php echo form_error('klasifikasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <input type="text" class="form-control" id="pemilik" name="pemilik" placeholder="Pemilik Aset" value="<?=$aset_intangible['pemilik'] ?>">
              <?php echo form_error('pemilik', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <select class="custom-select" id="kerahasiaan" name="kerahasiaan">
                <option value="">Kerahasiaan</option>
                <?php foreach ($aset_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>" <?php if($aset_intangible['kerahasiaan']==$ar['id_rahasia']){echo "selected";} ?>><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('kerahasiaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select" id="integritas" name="integritas">
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>" <?php if($aset_intangible['integritas']==$ai['id_integritas']){echo "selected";} ?>><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('integritas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select" id="ketersediaan" name="ketersediaan">
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>" <?php if($aset_intangible['ketersediaan']==$as['id_sedia']){echo "selected";} ?>><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('ketersediaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"><?=$aset_intangible['keterangan'] ?></textarea>
          </div>
				</div>
				<div class="card-footer text-right">
					<a href="<?=base_url('aset/form') ?>" class="btn btn-sm btn-circle btn-secondary" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
					<button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
				</div>
			</div>
		</form>
	</div>
</div>