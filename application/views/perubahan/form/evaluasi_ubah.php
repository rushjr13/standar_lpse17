<div class="row">
	<div class="col-lg-5">
		<div class="card shadow mb-3 border-primary">
			<div class="card-header shadow-sm bg-primary text-white">Permintaan Perubahan</div>
			<div class="card-body table-responsive">
				<table class="table table-sm table-borderless" width="100%">
					<tbody>
						<tr>
							<td width="35%">Kode Perubahan</td>
							<td>:</td>
							<th><?=$perubahan['id_perubahan'] ?></th>
						</tr>
						<tr>
							<td>Tanggal Permohonan</td>
							<td>:</td>
							<?php
								date_default_timezone_set('Asia/Makassar');
					        $tgl_permohonan = substr($perubahan['tgl_permohonanperubahan'], 8, 2);
					        $bln_permohonan = substr($perubahan['tgl_permohonanperubahan'], 5, 2);
					        $thn_permohonan = substr($perubahan['tgl_permohonanperubahan'], 0, 4);

					        if($bln_permohonan=='01'){
					            $bulan_permohonan='Januari';
					        } else if($bln_permohonan=='02'){
					            $bulan_permohonan='Februari';
					        } else if($bln_permohonan=='03'){
					            $bulan_permohonan='Maret';
					        } else if($bln_permohonan=='04'){
					            $bulan_permohonan='April';
					        } else if($bln_permohonan=='05'){
					            $bulan_permohonan='Mei';
					        } else if($bln_permohonan=='06'){
					            $bulan_permohonan='Juni';
					        } else if($bln_permohonan=='07'){
					            $bulan_permohonan='Juli';
					        } else if($bln_permohonan=='08'){
					            $bulan_permohonan='Agustus';
					        } else if($bln_permohonan=='09'){
					            $bulan_permohonan='September';
					        } else if($bln_permohonan=='10'){
					            $bulan_permohonan='Oktober';
					        } else if($bln_permohonan=='11'){
					            $bulan_permohonan='November';
					        } else if($bln_permohonan=='12'){
					            $bulan_permohonan='Desember';
					        }

					        $tgl_permohonanperubahan = $tgl_permohonan.' '.$bulan_permohonan.' '.$thn_permohonan;
								?>
							<th><?=$tgl_permohonanperubahan ?></th>
						</tr>
						<tr>
							<td>Nama Pemohon</td>
							<td>:</td>
							<th><?=$perubahan['nama_pemohon'] ?></th>
						</tr>
						<tr>
							<td>Kontak</td>
							<td>:</td>
							<th><?=$perubahan['kontak_pemohon'] ?></th>
						</tr>
						<tr>
							<td>Instansi</td>
							<td>:</td>
							<th><?=$perubahan['instansi_pemohon'] ?></th>
						</tr>
						<tr>
							<td>Deskripsi Perubahan</td>
							<td>:</td>
							<th><?=$perubahan['deskripsi_perubahan'] ?></th>
						</tr>
						<tr>
							<td>Tanggal Permohonan</td>
							<td>:</td>
							<?php
								date_default_timezone_set('Asia/Makassar');
					        $tgl_berlaku = substr($perubahan['tgl_berlakuperubahan'], 8, 2);
					        $bln_berlaku = substr($perubahan['tgl_berlakuperubahan'], 5, 2);
					        $thn_berlaku = substr($perubahan['tgl_berlakuperubahan'], 0, 4);

					        if($bln_berlaku=='01'){
					            $bulan_berlaku='Januari';
					        } else if($bln_berlaku=='02'){
					            $bulan_berlaku='Februari';
					        } else if($bln_berlaku=='03'){
					            $bulan_berlaku='Maret';
					        } else if($bln_berlaku=='04'){
					            $bulan_berlaku='April';
					        } else if($bln_berlaku=='05'){
					            $bulan_berlaku='Mei';
					        } else if($bln_berlaku=='06'){
					            $bulan_berlaku='Juni';
					        } else if($bln_berlaku=='07'){
					            $bulan_berlaku='Juli';
					        } else if($bln_berlaku=='08'){
					            $bulan_berlaku='Agustus';
					        } else if($bln_berlaku=='09'){
					            $bulan_berlaku='September';
					        } else if($bln_berlaku=='10'){
					            $bulan_berlaku='Oktober';
					        } else if($bln_berlaku=='11'){
					            $bulan_berlaku='November';
					        } else if($bln_berlaku=='12'){
					            $bulan_berlaku='Desember';
					        }

					        $tgl_berlakuperubahan = $tgl_berlaku.' '.$bulan_berlaku.' '.$thn_berlaku;
								?>
							<th><?=$tgl_berlakuperubahan ?></th>
						</tr>
						<tr>
							<td>Maksud & Tujuan Perubahan</td>
							<td>:</td>
							<th><?=$perubahan['mt_perubahan'] ?></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-7">
		<div class="card shadow border-primary mb-3">
			<form action="<?=base_url('perubahan/form/ubah_evaluasi/').$perubahan['id_perubahan'] ?>" method="post">
				<div class="card-header shadow-sm bg-primary text-white">
					Perbarui Evaluasi Permintaan Perubahan
					<a href="<?=base_url('perubahan/form') ?>" class="btn shadow-sm btn-sm btn-circle btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
					<button type="submit" class="btn shadow-sm btn-sm btn-circle btn-warning float-right mr-2" title="Perbarui"><i class="fa fa-fw fa-save"></i></button>
				</div>
				<div class="card-body">
					<div class="form-group row">
				    <label for="jenis_perubahan" class="col-sm-4 col-form-label">Jenis Perubahan</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control shadow-sm" id="jenis_perubahan" name="jenis_perubahan" placeholder="Aplikasi, Infrastruktur, Layanan" value="<?=$perubahan['jenis_perubahan'] ?>" autofocus>
					    <?php echo form_error('jenis_perubahan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="kategori_perubahan" class="col-sm-4 col-form-label">Kategori Perubahan</label>
				    <div class="col-sm-8">
				      <select class="form-control shadow-sm" id="kategori_perubahan" name="kategori_perubahan">
					      <option value="">-- Kategori Perubahan --</option>
					      <option value="Emergency" <?php if($perubahan['kategori_perubahan']=='Emergency'){echo 'selected';} ?>>Emergency</option>
					      <option value="Normal" <?php if($perubahan['kategori_perubahan']=='Normal'){echo 'selected';} ?>>Normal</option>
					    </select>
					    <?php echo form_error('kategori_perubahan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="dampak_lingkungan" class="col-sm-4 col-form-label">Dampak Terhadap Lingkungan</label>
				    <div class="col-sm-8">
				      <textarea class="form-control shadow-sm" id="dampak_lingkungan" name="dampak_lingkungan" placeholder="Dampak Terhadap Lingkungan"><?=$perubahan['dampak_lingkungan'] ?></textarea>
				      <?php echo form_error('dampak_lingkungan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="sumber" class="col-sm-4 col-form-label">Sumber Yang Dibutuhkan</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control shadow-sm" id="sumber" name="sumber" placeholder="Software, Hardware, SDM" value="<?=$perubahan['sumber'] ?>">
				      <?php echo form_error('sumber', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="deskripsi_ujicoba" class="col-sm-4 col-form-label">Deskripsi Rencana Uji Coba</label>
				    <div class="col-sm-8">
				      <textarea class="form-control shadow-sm" id="deskripsi_ujicoba" name="deskripsi_ujicoba" placeholder="Deskripsi Rencana Uji Coba"><?=$perubahan['deskripsi_ujicoba'] ?></textarea>
				      <?php echo form_error('deskripsi_ujicoba', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="deskripsi_rollback" class="col-sm-4 col-form-label">Deskripsi <em>Roll Back</em></label>
				    <div class="col-sm-8">
				      <textarea class="form-control shadow-sm" id="deskripsi_rollback" name="deskripsi_rollback" placeholder="Deskripsi Roll Back"><?=$perubahan['deskripsi_rollback'] ?></textarea>
				      <?php echo form_error('deskripsi_rollback', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				</div>
				<div class="card-footer">Pengelola Perubahan : <strong><?=$pengguna_masuk['nama_lengkap'] ?></strong></div>
			</form>
		</div>
	</div>
</div>