<form action="<?=base_url('layanan/form/tambah') ?>" method="post">
	<div class="card border-primary shadow">
		<div class="card-header bg-primary text-white">
			Tambah Form Layanan Pemberian Remote Akses Server LPSE
			<a href="<?=base_url('layanan/form') ?>" class="btn btn-sm btn-circle btn-danger shadow-sm float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			<button type="submit" class="btn btn-sm btn-circle btn-success shadow-sm float-right mr-2" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
		</div>
		<div class="card-body row">
			<div class="col-sm-4">
				<div class="card shadow-sm">
					<div class="card-body">
						<h6 class="font-weight-bold">Surat Masuk</h6>
						<hr>
						<div class="form-group">
					    <label for="no_surat">Nomor Surat</label>
					    <input type="text" class="form-control shadow-sm" id="no_surat" name="no_surat" autofocus>
					    <?php echo form_error('no_surat', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					    <label for="tgl_surat">Tanggal Surat</label>
					    <input type="date" class="form-control shadow-sm" id="tgl_surat" name="tgl_surat" value="<?=date('Y-m-d', time()) ?>">
					    <?php echo form_error('tgl_surat', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					    <label for="asal_surat">Asal Surat</label>
					    <textarea class="form-control shadow-sm" id="asal_surat" name="asal_surat"></textarea>
					    <?php echo form_error('asal_surat', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					    <label for="perihal_surat">Perihal Surat</label>
					    <textarea class="form-control shadow-sm" id="perihal_surat" name="perihal_surat"></textarea>
					    <?php echo form_error('perihal_surat', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					   <div class="form-group">
					    <label for="dokumen_surat">Perihal Surat</label>
					    <div class="custom-file">
							  <input type="file" class="custom-file-input shadow-sm" id="dokumen_surat" name="dokumen_surat">
							  <label class="custom-file-label shadow-sm" for="dokumen_surat" data-browse="Pilih File">Pilih file dengan format <strong>pdf</strong></label>
							</div>
							<?php echo form_error('dokumen_surat', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					</div>
				</div>
			</div>
			<div class="col-sm-8"></div>
		</div>
	</div>
</form>