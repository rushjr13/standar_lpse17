<form action="<?=base_url('kapasitas/form/ubah/').$kapasitas['id_kapasitas'] ?>" method="post">
	<div class="card border-primary shadow">
		<div class="card-header shadow-sm bg-primary text-white">
			Ubah Data Pencatatan Kapasitas Layanan
			<a href="<?=base_url('kapasitas/form') ?>" class="btn shadow-sm btn-sm btn-circle btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			<button type="submit" class="btn shadow-sm btn-sm btn-circle btn-warning float-right mr-2" title="Perbarui"><i class="fa fa-fw fa-save"></i></button>
		</div>
		<div class="card-body row">
			<div class="col-lg-4">
				<div class="alert shadow-sm">
					<h5>ITEM</h5>
					<hr class="mt-0">
					<div class="form-group row">
				    <label for="id_kk" class="col-lg-3 col-form-label">Kategori</label>
				    <div class="col-lg-9">
				      <select class="custom-select shadow-sm" id="id_kk" name="id_kk">
						    <option value="">-- Kategori --</option>
						    <?php foreach ($kapasitas_kategori as $kk): ?>
							    <option value="<?=$kk['id_kk'] ?>" <?php if($kapasitas['id_kk']==$kk['id_kk']){echo "selected";} ?>><?=$kk['nama_kk'] ?></option>
						    <?php endforeach ?>
						  </select>
						  <?php echo form_error('id_kk', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="item" class="col-lg-3 col-form-label">Item</label>
				    <div class="col-lg-9">
				      <input type="text" class="form-control shadow-sm" id="item" name="item" placeholder="Item" autofocus value="<?=$kapasitas['item'] ?>">
				      <?php echo form_error('item', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="batasan" class="col-lg-3 col-form-label">Batasan</label>
				    <div class="col-lg-9">
				      <textarea class="form-control shadow-sm" id="batasan" name="batasan"><?=$kapasitas['batasan'] ?></textarea>
				      <?php echo form_error('batasan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				</div>

				<div class="alert shadow-sm">
					<h5>PENGGUNAAN RESOURCE</h5>
					<hr class="mt-0">
				  <div class="form-group row">
				    <label for="waktu_pantau" class="col-lg-5 col-form-label">Waktu Pemantauan</label>
				    <div class="col-lg-7">
				      <input type="date" class="form-control shadow-sm" id="waktu_pantau" name="waktu_pantau" value="<?=$kapasitas['waktu_pantau'] ?>">
				      <?php echo form_error('waktu_pantau', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="utilitas" class="col-lg-2 col-form-label">Utilitas</label>
				    <div class="col-lg-10">
				      <textarea class="form-control shadow-sm" id="utilitas" name="utilitas"><?=$kapasitas['utilitas'] ?></textarea>
				      <?php echo form_error('utilitas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				</div>

				<div class="alert shadow-sm">
					<h5>KESIMPULAN</h5>
					<hr class="mt-0">
				  <div class="form-group row">
				    <label for="perkiraan_resource" class="col-lg-4 col-form-label">Perkiraan Resource</label>
				    <div class="col-lg-8">
				      <textarea class="form-control shadow-sm" id="perkiraan_resource" name="perkiraan_resource"><?=$kapasitas['perkiraan_resource'] ?></textarea>
				      <?php echo form_error('perkiraan_resource', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="tindak_lanjut" class="col-lg-4 col-form-label">Tindak Lanjut</label>
				    <div class="col-lg-8">
				      <textarea class="form-control shadow-sm" id="tindak_lanjut" name="tindak_lanjut"><?=$kapasitas['tindak_lanjut'] ?></textarea>
				      <?php echo form_error('tindak_lanjut', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				</div>
			</div>

			<div class="col-lg-8">
				<div class="alert shadow-sm">
					<h5>FORECAST</h5>
					<hr class="mt-0">
					<div class="alert shadow-sm">
						<h6>KONDISI AKTUAL</h6>
						<hr class="mt-0">
						<div class="form-group row">
					    <label for="kondisi_p1" class="col-lg-2 col-form-label">Parameter 1</label>
					    <div class="col-lg-10">
					      <textarea class="form-control shadow-sm" id="kondisi_p1" name="kondisi_p1"><?=$kapasitas['kondisi_p1'] ?></textarea>
					      <?php echo form_error('kondisi_p1', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="kondisi_p2" class="col-lg-2 col-form-label">Parameter 2<br><small class="text-muted"><em>(Opsional)</em></small></label>
					    <div class="col-lg-10">
					      <textarea class="form-control shadow-sm" id="kondisi_p2" name="kondisi_p2"><?=$kapasitas['kondisi_p2'] ?></textarea>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="kondisi_p3" class="col-lg-2 col-form-label">Parameter 3<br><small class="text-muted"><em>(Opsional)</em></small></label>
					    <div class="col-lg-10">
					      <textarea class="form-control shadow-sm" id="kondisi_p3" name="kondisi_p3"><?=$kapasitas['kondisi_p3'] ?></textarea>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="kondisi_p4" class="col-lg-2 col-form-label">Parameter 4<br><small class="text-muted"><em>(Opsional)</em></small></label>
					    <div class="col-lg-10">
					      <textarea class="form-control shadow-sm" id="kondisi_p4" name="kondisi_p4"><?=$kapasitas['kondisi_p4'] ?></textarea>
					    </div>
					  </div>
					</div>

					<div class="alert shadow-sm">
						<h6>PERKIRAAN AKAN DATANG</h6>
						<hr class="mt-0">
						<div class="form-group row">
					    <label for="perkiraan_p1" class="col-lg-2 col-form-label">Parameter 1</label>
					    <div class="col-lg-10">
					      <textarea class="form-control shadow-sm" id="perkiraan_p1" name="perkiraan_p1"><?=$kapasitas['perkiraan_p1'] ?></textarea>
					      <?php echo form_error('perkiraan_p1', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="perkiraan_p2" class="col-lg-2 col-form-label">Parameter 2<br><small class="text-muted"><em>(Opsional)</em></small></label>
					    <div class="col-lg-10">
					      <textarea class="form-control shadow-sm" id="perkiraan_p2" name="perkiraan_p2"><?=$kapasitas['perkiraan_p2'] ?></textarea>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="perkiraan_p3" class="col-lg-2 col-form-label">Parameter 3<br><small class="text-muted"><em>(Opsional)</em></small></label>
					    <div class="col-lg-10">
					      <textarea class="form-control shadow-sm" id="perkiraan_p3" name="perkiraan_p3"><?=$kapasitas['perkiraan_p3'] ?></textarea>
					    </div>
					  </div>
					  <div class="form-group row">
					    <label for="perkiraan_p4" class="col-lg-2 col-form-label">Parameter 4<br><small class="text-muted"><em>(Opsional)</em></small></label>
					    <div class="col-lg-10">
					      <textarea class="form-control shadow-sm" id="perkiraan_p4" name="perkiraan_p4"><?=$kapasitas['perkiraan_p4'] ?></textarea>
					    </div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>