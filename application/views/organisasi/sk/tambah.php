<div class="row justify-content-md-center">
	<div class="col-8">
		<form action="<?=base_url('organisasi/sk/tambah') ?>" method="post" enctype="multipart/form-data">
			<div class="card shadow border-primary">
				<div class="card-header bg-primary text-white">
					Tambah SK Organisasi
				</div>
				<div class="card-body">
					<div class="form-group row">
						<div class="col-6">
					    <label for="nomor_sko">Nomor SK</label>
					    <input type="text" class="form-control shadow-sm" id="nomor_sko" name="nomor_sko" placeholder="Nomor SK" value="<?=set_value('nomor_sko') ?>">
					    <?php echo form_error('nomor_sko', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
						<div class="col-6">
					    <label for="tanggal_sko">Tanggal SK</label>
					    <input type="date" class="form-control shadow-sm" id="tanggal_sko" name="tanggal_sko" placeholder="Tanggal SK" value="<?=set_value('tanggal_sko') ?>">
					    <?php echo form_error('tanggal_sko', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						</div>
				  </div>
				  <div class="form-group">
				    <label for="nama_sko">Nama SK</label>
				    <input type="text" class="form-control shadow-sm" id="nama_sko" name="nama_sko" placeholder="Nama SK" value="<?=set_value('nama_sko') ?>">
					    <?php echo form_error('nama_sko', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				  </div>
				  <div class="form-group">
				    <label for="tentang_sko">SK Tentang</label>
				    <textarea class="form-control shadow-sm" id="tentang_sko" name="tentang_sko" placeholder="SK Tentang"><?=set_value('tentang_sko') ?></textarea>
					    <?php echo form_error('tentang_sko', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				  </div>
				  <div class="form-group">
				    <label for="file_sko">File SK</label>
				    <div class="custom-file">
						  <input type="file" class="custom-file-input shadow-sm" id="file_sko" name="file_sko" required>
						  <label class="custom-file-label shadow-sm" for="file_sko" data-browse="Pilih File SK">Pilih file dengan format <strong>.pdf</strong>!</label>
						</div>
				  </div>
				</div>
				<div class="card-footer text-right">
					<a href="<?=base_url('organisasi/sk') ?>" class="btn btn-sm btn-circle btn-secondary shadow-sm" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
					<button type="submit" class="btn btn-sm btn-circle btn-primary shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
				</div>
			</div>
		</form>
	</div>
</div>