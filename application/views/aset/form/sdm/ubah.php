<div class="row justify-content-md-center">
	<div class="col-8">
		<form action="<?=base_url('aset/form/sdm/ubah/').$aset_sdm['id'] ?>" method="post">
			<div class="card shadow border-primary">
				<div class="card-header bg-primary text-white">Ubah Aset SDM a.n <?=$aset_sdm['nama'] ?></div>
				<div class="card-body">
					<label class="font-weight-bold">ASET SDM :</label>
          <div class="form-group row">
            <label for="id" class="col-md-6 col-form-label">Kode Aset : <strong><?=$aset_sdm['id'] ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="<?=$aset_sdm['id'] ?>">
            <div class="col-md-6">
              <select class="custom-select" id="klasifikasi" name="klasifikasi">
                <option value="">Klasifikasi Aset</option>
                <option value="Pegawai Tetap" <?php if($aset_sdm['klasifikasi']=='Pegawai Tetap'){echo "selected";} ?>>Pegawai Tetap</option>
                <option value="Pegawai Tidak Tetap" <?php if($aset_sdm['klasifikasi']=='Pegawai Tidak Tetap'){echo "selected";} ?>>Pegawai Tidak Tetap</option>
                <option value="Pengambil Keputusan" <?php if($aset_sdm['klasifikasi']=='Pengambil Keputusan'){echo "selected";} ?>>Pengambil Keputusan</option>
                <option value="Lainnya" <?php if($aset_sdm['klasifikasi']=='Lainnya'){echo "selected";} ?>>Lainnya</option>
              </select>
              <?php echo form_error('klasifikasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pegawai" value="<?=$aset_sdm['nama'] ?>">
              <?php echo form_error('nama', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="identitas" name="identitas" placeholder="No. Identitas / NIP" value="<?=$aset_sdm['identitas'] ?>">
              <?php echo form_error('identitas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">PEMILIK ASET :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control" id="pemilik_fungsi" name="pemilik_fungsi" placeholder="Fungsi" value="<?=$aset_sdm['pemilik_fungsi'] ?>">
              <?php echo form_error('pemilik_fungsi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="pemilik_subfungsi" name="pemilik_subfungsi" placeholder="Sub Fungsi" value="<?=$aset_sdm['pemilik_subfungsi'] ?>">
              <?php echo form_error('pemilik_subfungsi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="pemilik_unit" name="pemilik_unit" placeholder="Unit" value="<?=$aset_sdm['pemilik_unit'] ?>">
              <?php echo form_error('pemilik_unit', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KEPEGAWAIAN :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" value="<?=$aset_sdm['jabatan'] ?>">
              <?php echo form_error('jabatan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="kontrak" name="kontrak" placeholder="No. Kontrak/NDA" value="<?=$aset_sdm['kontrak'] ?>">
              <?php echo form_error('kontrak', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="atasan" name="atasan" placeholder="Atasan Langsung" value="<?=$aset_sdm['atasan'] ?>">
              <?php echo form_error('atasan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-sm-10">
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <select class="custom-select" id="kerahasiaan" name="kerahasiaan">
                <option value="">Kerahasiaan</option>
                <?php foreach ($aset_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>" <?php if($aset_sdm['kerahasiaan']==$ar['id_rahasia']){echo "selected";} ?>><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('kerahasiaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select" id="integritas" name="integritas">
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>" <?php if($aset_sdm['integritas']==$ai['id_integritas']){echo "selected";} ?>><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('integritas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select" id="ketersediaan" name="ketersediaan">
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>" <?php if($aset_sdm['ketersediaan']==$as['id_sedia']){echo "selected";} ?>><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('ketersediaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"><?=$aset_sdm['keterangan'] ?></textarea>
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