<form action="<?=base_url('kapasitas/form/laporan/').$kapasitas_laporan['id_kapasitas'] ?>" method="post">
	<div class="card shadow border-primary">
		<div class="card-header bg-primary text-white">
			Laporan Kapasitas Layanan <?=$kapasitas['item'] ?>
			<a href="<?=base_url('kapasitas/form') ?>" class="btn btn-sm btn-circle btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			<a href="<?=base_url('kapasitas/form/cetak/').$kapasitas_laporan['id_kapasitas'] ?>" target="_blank" class="btn btn-sm btn-circle btn-primary float-right mr-2" title="Cetak Laporan"><i class="fa fa-fw fa-print"></i></a>
			<button type="submit" class="btn btn-sm btn-circle btn-primary float-right mr-2" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
		</div>
		<div class="card-body ">
			<!-- PENDAHULUAN -->
			<div class="alert shadow alert-success mb-3">
				<h5>PENDAHULUAN</h5>
				<hr class="mt-0">
				<div class="row">
					<div class="col-lg-6">
						<div class="card shadow border-success mb-3">
							<div class="card-header bg-light">Latar Belakang</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="latar_belakang" name="latar_belakang"><?=$kapasitas_laporan['latar_belakang'] ?></textarea>
					        <?php echo form_error('latar_belakang', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
						<div class="card shadow border-success mb-3">
							<div class="card-header bg-light">Ruang Lingkup</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="ruang_lingkup" name="ruang_lingkup"><?=$kapasitas_laporan['ruang_lingkup'] ?></textarea>
					        <?php echo form_error('ruang_lingkup', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="card shadow border-success mb-3">
							<div class="card-header bg-light">Metode Pengumpulan Data</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="metode" name="metode"><?=$kapasitas_laporan['metode'] ?></textarea>
					        <?php echo form_error('metode', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
						<div class="card shadow border-success mb-3">
							<div class="card-header bg-light">Asumsi-Asumsi Yang Digunakan</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="asumsi" name="asumsi"><?=$kapasitas_laporan['asumsi'] ?></textarea>
					        <?php echo form_error('asumsi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- RINGKASAN -->
			<div class="alert shadow alert-warning mb-3">
				<h5>RINGKASAN LAYANAN</h5>
				<hr class="mt-0">
				<div class="row">
					<div class="col-lg-6">
						<div class="card shadow border-warning mb-3">
							<div class="card-header bg-light">Laporan Layanan Saat Ini</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="laporan_saat_ini" name="laporan_saat_ini"><?=$kapasitas_laporan['laporan_saat_ini'] ?></textarea>
					        <?php echo form_error('laporan_saat_ini', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="card shadow border-warning mb-3">
							<div class="card-header bg-light">Prediksi Layanan Akan Datang</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="prediksi_akan_datang" name="prediksi_akan_datang"><?=$kapasitas_laporan['prediksi_akan_datang'] ?></textarea>
					        <?php echo form_error('prediksi_akan_datang', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- RINGKASAN KOMPONEN -->
			<div class="alert shadow alert-success mb-3">
				<h5>RINGKASAN KOMPONEN PENDUKUNG LAYANAN</h5>
				<hr class="mt-0">
				<div class="row">
					<div class="col-lg-6">
						<div class="card shadow border-success mb-3">
							<div class="card-header bg-light">Laporan Penggunaan Komponen Pendukung</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="laporan_pakai_komponen" name="laporan_pakai_komponen"><?=$kapasitas_laporan['laporan_pakai_komponen'] ?></textarea>
					        <?php echo form_error('laporan_pakai_komponen', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
					</div>

					<div class="col-lg-6">
						<div class="card shadow border-success mb-3">
							<div class="card-header bg-light">Analisis Trend Penggunaan Komponen Pendukung</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="analisis_trend" name="analisis_trend"><?=$kapasitas_laporan['analisis_trend'] ?></textarea>
					        <?php echo form_error('analisis_trend', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
					</div>

					<div class="col-lg-12">
						<div class="card shadow border-success mb-3">
							<div class="card-header bg-light">Prediksi Kebutuhan Komponen Pendukung</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="prediksi_kebutuhan" name="prediksi_kebutuhan"><?=$kapasitas_laporan['prediksi_kebutuhan'] ?></textarea>
					        <?php echo form_error('prediksi_kebutuhan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- PILIHAN PENINGKATAN LAYANAN -->
			<div class="alert shadow alert-warning mb-3">
				<h5>PILIHAN PENINGKATAN LAYANAN</h5>
				<hr class="mt-0">
				<div class="row">
					<div class="col-lg-12">
						<div class="card shadow border-warning mb-3">
							<div class="card-header bg-light">Opsi Tindakan Yang Dapat Diambil Untuk Mengantisipasi Terjadinya Kekurangan Kapasitas</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="pilihan_peningkatan_layanan" name="pilihan_peningkatan_layanan"><?=$kapasitas_laporan['pilihan_peningkatan_layanan'] ?></textarea>
					        <?php echo form_error('pilihan_peningkatan_layanan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- PREDIKSI PEMBIAYAAN -->
			<div class="alert shadow alert-success mb-3">
				<h5>PREDIKSI PEMBIAYAAN</h5>
				<hr class="mt-0">
				<div class="row">
					<div class="col-lg-12">
						<div class="card shadow border-success mb-3">
							<div class="card-header bg-light">Perkiraan Biaya Yang Harus Dikeluarkan Untuk Mengantisipasi Terjadinya Kekurangan Kapasitas</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="prediksi_pembiayaan" name="prediksi_pembiayaan"><?=$kapasitas_laporan['prediksi_pembiayaan'] ?></textarea>
					        <?php echo form_error('prediksi_pembiayaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- REKOMENDASI RENCANA KAPASITAS -->
			<div class="alert shadow alert-warning m-0">
				<h5>REKOMENDASI TERKAIT RENCANA KAPASITAS</h5>
				<hr class="mt-0">
				<div class="row">
					<div class="col-lg-12">
						<div class="card shadow border-warning mb-3">
							<div class="card-header bg-light">Rekomendasi Tindakan Untuk Mengantisipasi Terjadinya Kekurangan Kapasitas Dalam Bentuk Rencana Peningkatan Kapasitas</div>
							<div class="card-body">
								<div class="form-group m-0">
					        <textarea rows="5" class="form-control ckeditor" id="rekomendasi_kapasitas" name="rekomendasi_kapasitas"><?=$kapasitas_laporan['rekomendasi_kapasitas'] ?></textarea>
					        <?php echo form_error('rekomendasi_kapasitas', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
					      </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>