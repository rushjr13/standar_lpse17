<div class="row justify-content-md-center">
	<div class="col-8">
		<form action="<?=base_url('aset/form/layanan/ubah/').$aset_layanan['idl'] ?>" method="post">
			<div class="card shadow border-primary">
				<div class="card-header bg-primary text-white">Ubah Aset Layanan <?=$aset_layanan['nama'] ?></div>
				<div class="card-body">
          <div class="form-group row">
            <label for="id" class="col-md-12 col-form-label">Kode Aset : <strong><?=$aset_layanan['idl'] ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="<?=$aset_layanan['idl'] ?>">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Layanan" value="<?=$aset_layanan['nama'] ?>">
              <?php echo form_error('nama', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <select class="custom-select" id="klasifikasi" name="klasifikasi">
                <option value="">Klasifikasi Aset</option>
                <option value="Jaringan Internet Khusus" <?php if($aset_layanan['klasifikasi']=='Jaringan Internet Khusus'){echo "selected";} ?>>Jaringan Internet Khusus</option>
                <option value="Jaringan Internet Umum" <?php if($aset_layanan['klasifikasi']=='Jaringan Internet Umum'){echo "selected";} ?>>Jaringan Internet Umum</option>
                <option value="Jaringan Internet Load Balanced" <?php if($aset_layanan['klasifikasi']=='Jaringan Internet Load Balanced'){echo "selected";} ?>>Jaringan Internet Load Balanced</option>
                <option value="Jaringan Intranet Umum" <?php if($aset_layanan['klasifikasi']=='Jaringan Intranet Umum'){echo "selected";} ?>>Jaringan Intranet Umum</option>
                <option value="Jaringan Point to Point" <?php if($aset_layanan['klasifikasi']=='Jaringan Point to Point'){echo "selected";} ?>>Jaringan Point to Point</option>
                <option value="Lainnya" <?php if($aset_layanan['klasifikasi']=='Lainnya'){echo "selected";} ?>>Lainnya</option>
              </select>
              <?php echo form_error('klasifikasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">ASET :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control" id="pemilik" name="pemilik" placeholder="Pemilik Aset" value="<?=$aset_layanan['pemilik'] ?>">
              <?php echo form_error('pemilik', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="pemegang" name="pemegang" placeholder="Pemegang Aset" value="<?=$aset_layanan['pemegang'] ?>">
              <?php echo form_error('pemegang', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="penyedia" name="penyedia" placeholder="Penyedia Aset" value="<?=$aset_layanan['penyedia'] ?>">
              <?php echo form_error('penyedia', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KONTRAK / SLA :</label>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control" id="kontrak_no" name="kontrak_no" placeholder="Jabatan" value="<?=$aset_layanan['kontrak_no'] ?>">
              <?php echo form_error('kontrak_no', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <input type="date" class="form-control" id="kontrak_berlaku" name="kontrak_berlaku" placeholder="No. Kontrak/NDA" value="<?=$aset_layanan['kontrak_berlaku'] ?>">
              <?php echo form_error('kontrak_berlaku', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <input type="text" class="form-control" id="kontrak_deskripsi" name="kontrak_deskripsi" placeholder="Atasan Langsung" value="<?=$aset_layanan['kontrak_deskripsi'] ?>">
              <?php echo form_error('kontrak_deskripsi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
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
                  <option value="<?=$ar['id_rahasia'] ?>" <?php if($aset_layanan['kerahasiaan']==$ar['id_rahasia']){echo "selected";} ?>><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('kerahasiaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select" id="integritas" name="integritas">
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>" <?php if($aset_layanan['integritas']==$ai['id_integritas']){echo "selected";} ?>><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('integritas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select" id="ketersediaan" name="ketersediaan">
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>" <?php if($aset_layanan['ketersediaan']==$as['id_sedia']){echo "selected";} ?>><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('ketersediaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"><?=$aset_layanan['keterangan'] ?></textarea>
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