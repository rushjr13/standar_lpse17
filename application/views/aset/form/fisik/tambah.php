<div class="row justify-content-md-center">
	<div class="col-8">
		<form action="<?=base_url('aset/form/fisik/tambah/') ?>" method="post">
			<div class="card shadow border-primary">
				<div class="card-header shadow-sm bg-primary text-white">Tambah Aset Fisik</div>
				<div class="card-body">
					<label class="font-weight-bold">ASET FISIK :</label>
          <div class="form-group row">
            <label for="id" class="col-md-6 col-form-label">Kode Aset : <strong>F<?=time() ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="idf" name="idf" value="F<?=time() ?>">
            <div class="col-md-6">
              <div class="input-group">
                <select class="custom-select shadow-sm" id="id_klasifikasiaset" name="id_klasifikasiaset" aria-describedby="id_klasifikasiaset">
                  <option value="">Klasifikasi Aset</option>
                  <?php foreach ($klasifikasi_aset_fisik as $kaf): ?>
                    <option value="<?=$kaf['id'] ?>"><?=$kaf['nama_klasifikasi'] ?></option>
                  <?php endforeach ?>
                </select>
                <div class="input-group-append">
                  <button class="btn shadow-sm btn-outline-secondary" type="button" id="id_klasifikasiaset" data-toggle="modal" data-target="#tambahklasifikasiModal" title="Tambah Klasifikasi"><i class="fa fa-fw fa-plus"></i></button>
                </div>
              </div>
              <?php echo form_error('id_klasifikasiaset', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Nama Aset" value="<?=set_value('nama') ?>">
              <?php echo form_error('nama', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <select class="custom-select shadow-sm" id="id_jenisaset" name="id_jenisaset" aria-describedby="id_jenisaset">
                  <option value="">Jenis Aset</option>
                  <?php foreach ($jenis_aset_fisik as $jaf): ?>
                    <option value="<?=$jaf['id'] ?>"><?=$jaf['nama_jenisaset'] ?></option>
                  <?php endforeach ?>
                </select>
                <div class="input-group-append">
                  <button class="btn shadow-sm btn-outline-secondary" type="button" id="id_jenisaset" data-toggle="modal" data-target="#tambahjenisasetModal" title="Tambah Jenis Aset"><i class="fa fa-fw fa-plus"></i></button>
                </div>
              </div>
              <?php echo form_error('id_jenisaset', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control shadow-sm" id="spesifikasi" name="spesifikasi" placeholder="Spesifikasi Aset"><?=set_value('spesifikasi') ?></textarea>
            <?php echo form_error('spesifikasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
          </div>
          <hr>
          <label class="font-weight-bold">AKSES ASET :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="pemilik" name="pemilik" placeholder="Pemilik" value="<?=set_value('pemilik') ?>">
              <?php echo form_error('pemilik', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="penyedia" name="penyedia" placeholder="Penyedia" value="<?=set_value('penyedia') ?>">
              <?php echo form_error('penyedia', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="pemegang" name="pemegang" placeholder="Pemegang" value="<?=set_value('pemegang') ?>">
              <?php echo form_error('pemegang', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="lokasi" name="lokasi" placeholder="Lokasi Aset" value="<?=set_value('lokasi') ?>">
              <?php echo form_error('lokasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-6">
              <input type="date" class="form-control shadow-sm" id="berlaku" name="berlaku" placeholder="Masa Berlaku" value="<?=date('Y-m-d') ?>">
              <?php echo form_error('berlaku', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="kerahasiaan" name="kerahasiaan">
                <option value="">Kerahasiaan</option>
                <?php foreach ($aset_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>"><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('kerahasiaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="integritas" name="integritas">
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>"><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('integritas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="ketersediaan" name="ketersediaan">
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>"><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('ketersediaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control shadow-sm" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"><?=set_value('keterangan') ?></textarea>
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

<!-- Modal Tambah Klasifikasi -->
<div class="modal fade" id="tambahklasifikasiModal" tabindex="-1" role="dialog" aria-labelledby="tambahklasifikasiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahklasifikasiModalLabel">Tambah Klasifikasi</h5>
      </div>
      <form action="<?=base_url('aset/tambah_klasifikasi') ?>" method="post">
        <div class="modal-body">
          <input type="text" class="form-control shadow-sm" id="nama_klasifikasi" name="nama_klasifikasi" placeholder="Nama Klasifikasi" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" title="Batal" data-dismiss="modal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Tambah Jenis Aset -->
<div class="modal fade" id="tambahjenisasetModal" tabindex="-1" role="dialog" aria-labelledby="tambahjenisasetModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahjenisasetModalLabel">Tambah Jenis Aset</h5>
      </div>
      <form action="<?=base_url('aset/tambah_jenisaset') ?>" method="post">
        <div class="modal-body">
          <input type="text" class="form-control shadow-sm" id="nama_jenisaset" name="nama_jenisaset" placeholder="Nama Jenis Aset" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" title="Batal" data-dismiss="modal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>