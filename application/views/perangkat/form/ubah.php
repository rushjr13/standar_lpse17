<form action="<?=base_url('perangkat/form/ubah/').$perangkat['id_ijin_perangkat'] ?>" method="post">
	<div class="card shadow border-primary">
		<div class="card-header bg-primary text-white shadow-sm">
			Ubah Pencatatan Penggunaan Fasilitas & Akses Ruang Server
			<a href="<?=base_url('perangkat/form') ?>" class="btn btn-sm btn-circle shadow-sm btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			<button type="submit" class="btn btn-sm btn-circle shadow-sm btn-info float-right mr-2" title="Perbarui"><i class="fa fa-fw fa-save"></i></button>
		</div>
		<div class="card-body">
			<div class="form-group row">
		    <label for="id_ijin_perangkat" class="col-sm-1 col-form-label">Nomor</label>
		    <div class="col-sm-6">
		      <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id_ijin_perangkat" name="id_ijin_perangkat" value="<?=$perangkat['id_ijin_perangkat'] ?>">
		    </div>
		    <label for="id_perangkat_jenis" class="col-sm-2 col-form-label text-right">Jenis Perijinan</label>
		    <div class="col-sm-3">
		      <select class="form-control shadow-sm font-weight-bold" id="id_perangkat_jenis" name="id_perangkat_jenis">
			      <option value="">-- Jenis Perijinan --</option>
			      <?php foreach ($perangkat_jenis as $pj): ?>
				      <option value="<?=$pj['id_perangkat_jenis'] ?>" <?php if($pj['id_perangkat_jenis']==$perangkat['id_perangkat_jenis']){echo "selected";} ?>><?=$pj['nama_jenis_perangkat'] ?></option>
			      <?php endforeach ?>
			    </select>
			    <?php echo form_error('id_perangkat_jenis', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="nama" class="col-sm-1 col-form-label">Nama Lengkap</label>
		    <div class="col-sm-5">
		      <input type="text" class="form-control shadow-sm font-weight-bold" id="nama" name="nama" placeholder="Nama Lengkap" value="<?=$perangkat['nama'] ?>" autofocus>
		      <?php echo form_error('nama', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
		    </div>
		    <label for="identitas" class="col-sm-1 col-form-label text-right">Identitas</label>
		    <div class="col-sm-2">
		      <select class="form-control shadow-sm font-weight-bold" id="jenis_identitas" name="jenis_identitas">
			      <option value="">-- Pilih Identitas --</option>
			      <option value="KTP" <?php if($perangkat['jenis_identitas']=="KTP"){echo "selected";} ?>>KTP</option>
			      <option value="SIM" <?php if($perangkat['jenis_identitas']=="SIM"){echo "selected";} ?>>SIM</option>
			      <option value="PASPOR" <?php if($perangkat['jenis_identitas']=="PASPOR"){echo "selected";} ?>>PASPOR</option>
			      <option value="Lainnya" <?php if($perangkat['jenis_identitas']=="Lainnya"){echo "selected";} ?>>Lainnya</option>
			    </select>
			    <?php echo form_error('jenis_identitas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
		    </div>
		    <div class="col-sm-3">
		      <input type="text" class="form-control shadow-sm font-weight-bold" id="identitas" name="identitas" placeholder="No. Identitas" value="<?=$perangkat['identitas'] ?>">
		      <?php echo form_error('identitas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small><br>'); ?>
		      <small class="ml-2 mt-0 small text-primary"><small><em>KTP / SIM / PASPOR / dll</em></small></small><br>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="instansi" class="col-sm-1 col-form-label">Instansi</label>
		    <div class="col-sm-11">
		    	<input type="text" class="form-control shadow-sm font-weight-bold" id="instansi" name="instansi" placeholder="Instansi" value="<?=$perangkat['instansi'] ?>">
		    	<?php echo form_error('instansi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="alamat" class="col-sm-1 col-form-label">Alamat</label>
		    <div class="col-sm-11">
		    	<textarea rows="2" class="form-control shadow-sm font-weight-bold" id="alamat" name="alamat" placeholder="Alamat Lengkap ..."><?=$perangkat['alamat'] ?></textarea>
		    	<?php echo form_error('alamat', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="tujuan" class="col-sm-1 col-form-label">Tujuan</label>
		    <div class="col-sm-11">
		    	<textarea rows="2" class="form-control shadow-sm font-weight-bold" id="tujuan" name="tujuan" placeholder="Tujuan Perijinan ..."><?=$perangkat['tujuan'] ?></textarea>
		    	<?php echo form_error('tujuan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
		    </div>
		  </div>
		</div>
	</div>
</form>