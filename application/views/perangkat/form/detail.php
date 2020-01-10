<div class="row justify-content-lg-centered">
	<div class="col-lg-5">
		<div class="card border-primary shadow">
			<div class="card-header bg-primary text-white shadow-sm">
				Ijin <?=$perangkat['nama_jenis_perangkat'] ?>
				<a href="<?=base_url('perangkat/form') ?>" class="btn btn-sm btn-circle shadow-sm btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			</div>
			<div class="card-body table-responsive">
				<table class="table table-sm table-borderless m-0">
					<tbody>
						<tr>
							<td width="15%">Kode</td>
							<td width="5%">:</td>
							<th><?=$perangkat['id_ijin_perangkat'] ?></th>
						</tr>
						<tr>
							<td>No. Badge</td>
							<td>:</td>
							<th><?=$perangkat['no_badge'] ?></th>
						</tr>
						<tr>
							<td>Nama</td>
							<td>:</td>
							<th><?=$perangkat['nama'] ?></th>
						</tr>
						<tr>
							<td>Identitas</td>
							<td>:</td>
							<th><?=$perangkat['jenis_identitas'] ?> - <?=$perangkat['identitas'] ?></th>
						</tr>
						<tr>
							<td>Instansi</td>
							<td>:</td>
							<th><?=$perangkat['instansi'] ?></th>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>:</td>
							<th><?=$perangkat['alamat'] ?></th>
						</tr>
						<tr>
							<td>Tujuan</td>
							<td>:</td>
							<th><?=$perangkat['tujuan'] ?></th>
						</tr>
						<tr>
							<td>Status Ijin</td>
							<td>:</td>
							<th><?=$perangkat['status_ijin']=="Setuju" ? "Diterima" : "Ditolak" ?></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<div class="col-lg-7">
		<form action="<?=base_url('perangkat/form/detail/').$perangkat['id_ijin_perangkat'] ?>" method="post">
			<div class="card shadow border-primary">
				<div class="card-header bg-primary shadow-sm text-white">
					Detail Ijin <?=$perangkat['nama_jenis_perangkat'] ?>
					<button type="submit" class="btn btn-sm btn-circle btn-success shadow-sm float-right" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
				</div>
				<div class="card-body">
					<div class="alert alert-light shadow-sm mb-4">
						<h5 class="text-center">Pelaksanaan</h5>
						<hr class="my-2">
						<div class="row m-0">
							<div class="form-group col-lg-4 mb-0 text-center">
						    <label for="tanggal_pelaksanaan">Tanggal Pelaksanaan</label>
						    <input type="date" class="form-control shadow-sm font-weight-bold text-center" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" value="<?=$perangkat_detail['tanggal_pelaksanaan'] ?>">
						    <?php echo form_error('tanggal_pelaksanaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						  </div>
						  <div class="form-group col-lg-4 mb-0 text-center">
						    <label for="jam_masuk">Jam Masuk</label>
						    <input type="text" class="form-control shadow-sm font-weight-bold text-center" id="jam_masuk" name="jam_masuk" value="<?=$perangkat_detail['jam_masuk'] ?>" maxlength="8" autofocus>
						    <?php echo form_error('jam_masuk', '<small class="text-danger ml-2" style="font-style:italic;">', '</small><br>'); ?>
						    <small id="jam_masuk" class="form-text text-muted">Format : 00:00:00</small>
						  </div>
						  <div class="form-group col-lg-4 mb-0 text-center">
						    <label for="jam_keluar">Jam Keluar</label>
						    <input type="text" class="form-control shadow-sm font-weight-bold text-center" id="jam_keluar" name="jam_keluar" value="<?=$perangkat_detail['jam_keluar'] ?>" maxlength="8">
						    <?php echo form_error('jam_keluar', '<small class="text-danger ml-2" style="font-style:italic;">', '</small><br>'); ?>
						    <small id="jam_keluar" class="form-text text-muted">Format : 00:00:00</small>
						  </div>
						</div>
					</div>
					<div class="alert alert-light shadow-sm m-0">
						<h5 class="text-center">Fasilitas / Perangkat</h5>
						<hr class="my-2">
						<div class="row m-0">
							<div class="form-group col-lg-6 mb-2 text-center">
						    <label for="jenis_fasilitas">Jenis</label>
						    <input type="text" class="form-control shadow-sm font-weight-bold text-center" id="jenis_fasilitas" name="jenis_fasilitas" value="<?=$perangkat_detail['jenis_fasilitas'] ?>">
						    <?php echo form_error('jenis_fasilitas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						  </div>
						  <div class="form-group col-lg-6 mb-2 text-center">
						    <label for="seri_fasilitas">No. Seri</label>
						    <input type="text" class="form-control shadow-sm font-weight-bold text-center" id="seri_fasilitas" name="seri_fasilitas" value="<?=$perangkat_detail['seri_fasilitas'] ?>">
						    <?php echo form_error('seri_fasilitas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>