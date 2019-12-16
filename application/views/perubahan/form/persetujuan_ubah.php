<div class="row">
	<div class="col-lg-5">
		<div class="card shadow mb-3 border-primary">
			<div class="card-header bg-primary text-white">Permintaan Perubahan</div>
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
		<div class="card shadow mb-3 border-primary">
			<div class="card-header bg-primary text-white">Evaluasi Permintaan Perubahan</div>
			<div class="card-body table-responsive">
				<table class="table table-sm table-borderless" width="100%">
					<tbody>
						<tr>
							<td width="38%">Jenis Perubahan</td>
							<td>:</td>
							<th><?=$perubahan['jenis_perubahan'] ?></th>
						</tr>
						<tr>
							<td>Kategori Perubahan</td>
							<td>:</td>
							<th><?=$perubahan['kategori_perubahan'] ?></th>
						</tr>
						<tr>
							<td>Dampak Terhadap Lingkungan</td>
							<td>:</td>
							<th><?=$perubahan['dampak_lingkungan'] ?></th>
						</tr>
						<tr>
							<td>Sumber Yang Dibutuhkan</td>
							<td>:</td>
							<th><?=$perubahan['sumber'] ?></th>
						</tr>
						<tr>
							<td>Deskripsi Uji Coba</td>
							<td>:</td>
							<th><?=$perubahan['deskripsi_ujicoba'] ?></th>
						</tr>
						<tr>
							<td>Deskripsi <em>Roll Back</em></td>
							<td>:</td>
							<th><?=$perubahan['deskripsi_rollback'] ?></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-7">
		<div class="card shadow border-primary mb-3">
			<form action="<?=base_url('perubahan/form/ubah_persetujuan/').$perubahan['id_perubahan'] ?>" method="post">
				<div class="card-header bg-primary text-white">
					Perbarui Persetujuan Permintaan Perubahan
					<a href="<?=base_url('perubahan/form') ?>" class="btn btn-sm btn-circle btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
					<button type="submit" class="btn btn-sm btn-circle btn-warning float-right mr-2" title="Perbarui"><i class="fa fa-fw fa-save"></i></button>
				</div>
				<div class="card-body">
				  <div class="form-group row">
				    <label for="status_permintaan" class="col-sm-4 col-form-label">Status Permintaan</label>
				    <div class="col-sm-8">
				      <select class="form-control" id="status_permintaan" name="status_permintaan" value="<?=set_value('status_permintaan') ?>">
					      <option value="">-- Status Permintaan --</option>
					      <option value="Setuju" <?php if($perubahan['status_permintaan']=='Setuju'){echo 'selected';} ?>>Setuju</option>
					      <option value="Tidak Setuju" <?php if($perubahan['status_permintaan']=='Tidak Setuju'){echo 'selected';} ?>>Tidak Setuju</option>
					    </select>
					    <?php echo form_error('status_permintaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ket_statuspermintaan" class="col-sm-4 col-form-label">Keterangan</label>
				    <div class="col-sm-8">
				      <textarea class="form-control" id="ket_statuspermintaan" name="ket_statuspermintaan" placeholder="Keterangan" autofocus><?=$perubahan['ket_statuspermintaan'] ?></textarea>
				      <?php echo form_error('ket_statuspermintaan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="jadwal_perubahan" class="col-sm-4 col-form-label">Jadwal Perubahan (Tanggal)</label>
				    <div class="col-sm-8">
				      <input type="date" class="form-control" id="jadwal_perubahan" name="jadwal_perubahan" value="<?=$perubahan['jadwal_perubahan'] ?>">
				      <?php echo form_error('jadwal_perubahan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="petugas_implementasi" class="col-sm-4 col-form-label">Penugasan Untuk Implementasi (Nama)</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="petugas_implementasi" name="petugas_implementasi" placeholder="Penugasan Untuk Implementasi (Nama)" value="<?=$perubahan['petugas_implementasi'] ?>">
				      <?php echo form_error('petugas_implementasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
				    </div>
				  </div>
				</div>
				<div class="card-footer">Pengelola Perubahan : <strong><?=$pengguna_masuk['nama_lengkap'] ?></strong></div>
			</form>
		</div>
	</div>
</div>