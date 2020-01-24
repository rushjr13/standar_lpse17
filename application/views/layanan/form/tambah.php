<form action="<?=base_url('layanan/form/tambah') ?>" method="post">
	<div class="card border-primary shadow">
		<div class="card-header bg-primary text-white">
			Tambah Form Layanan Pemberian Remote Akses Server LPSE
			<a href="<?=base_url('layanan/form') ?>" class="btn btn-sm btn-circle btn-danger shadow-sm float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			<button type="submit" class="btn btn-sm btn-circle btn-success shadow-sm float-right mr-2" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
		</div>
		<div class="card-body row justify-content-sm-center">
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
							  <input type="file" class="custom-file-input shadow-sm" id="dokumen_surat" name="dokumen_surat" required>
							  <label class="custom-file-label shadow-sm" for="dokumen_surat" data-browse="Pilih File">Pilih file dengan format <strong>pdf</strong></label>
							</div>
					  </div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card shadow-sm mb-4">
					<div class="card-body">
						<h6 class="font-weight-bold">Pemohon</h6>
						<hr>
						<div class="form-group">
					    <label for="nama_pemohon">Nama Lengkap</label>
					    <input type="text" class="form-control shadow-sm" id="nama_pemohon" name="nama_pemohon">
					    <?php echo form_error('nama_pemohon', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					    <label for="instansi_pemohon">Instansi</label>
					    <input type="date" class="form-control shadow-sm" id="instansi_pemohon" name="instansi_pemohon">
					    <?php echo form_error('instansi_pemohon', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					    <label for="tujuan_pemohon">Tujuan Remote Akses</label>
					    <input type="date" class="form-control shadow-sm" id="tujuan_pemohon" name="tujuan_pemohon">
					    <?php echo form_error('tujuan_pemohon', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					</div>
				</div>
				<div class="card shadow-sm">
					<div class="card-body">
						<div class="form-group">
					    <label for="status_layanan">Status</label>
					    <select class="form-control shadow-sm" id="status_layanan" name="status_layanan" onchange="status_permohonan()">
					    	<option value="Setuju">Setuju</option>
					    	<option value="Tidak Setuju" selected>Tidak Setuju</option>
					    </select>
					    <?php echo form_error('status_layanan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					</div>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="card shadow-sm">
					<div class="card-body">
						<h6 class="font-weight-bold">Remote Akses</h6>
						<hr>
						<div class="form-group">
					    <label for="user_akses">Nama Pengguna</label>
					    <input type="text" class="form-control shadow-sm" id="user_akses" name="user_akses" value="root">
					    <?php echo form_error('user_akses', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					  <div class="form-group">
					    <label for="hak_akses">Hak Akses</label>
					    <select class="form-control shadow-sm" id="hak_akses" name="hak_akses">
					    	<option value="Admin">Admin</option>
					    	<option value="User" selected>User</option>
					    </select>
					    <?php echo form_error('hak_akses', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  </div>
					  <div class="form-group row">
					  	<div class="col-sm-7">
						    <label for="tgl_buka">Tanggal Buka</label>
						    <input type="date" class="form-control shadow-sm" id="tgl_buka" name="tgl_buka">
						    <?php echo form_error('tgl_buka', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  	</div>
					  	<div class="col-sm-5">
						    <label for="jam_buka">Jam Buka</label>
						    <input type="text" class="form-control shadow-sm" id="jam_buka" maxlength="5" name="jam_buka">
						    <small class="text-muted ml-2">Format : hh:mm</small><br>
						    <?php echo form_error('jam_buka', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  	</div>
					  </div>
					  <div class="form-group row">
					  	<div class="col-sm-7">
						    <label for="tgl_tutup">Tanggal Tutup</label>
						    <input type="date" class="form-control shadow-sm" id="tgl_tutup" name="tgl_tutup">
						    <?php echo form_error('tgl_tutup', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  	</div>
					  	<div class="col-sm-5">
						    <label for="jam_tutup">Jam Tutup</label>
						    <input type="text" class="form-control shadow-sm" id="jam_tutup" maxlength="5" name="jam_tutup">
						    <small class="text-muted ml-2">Format : hh:mm</small><br>
						    <?php echo form_error('jam_tutup', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					  	</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>