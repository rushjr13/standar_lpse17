<div class="row">
	<div class="col-lg-6">
		<div class="card shadow border-primary">
			<div class="card-header bg-primary text-white">
				<?=$sdm['nama'].' - '.$sdm['jabatan'] ?>
				<a href="<?=base_url('sdm/form') ?>" class="btn btn-sm btn-circle btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			</div>
			<div class="card-body table-responsive">
				<table class="table table-sm table-borderless m-0" width="100%">
					<tbody>
						<tr>
							<td class="align-middle" colspan="2">Nama Lengkap</td>
							<td class="align-middle">:</td>
							<th class="align-middle"><?=$sdm['nama'] ?></th>
						</tr>
						<tr>
							<td class="align-middle" colspan="2">Jabatan</td>
							<td class="align-middle">:</td>
							<th class="align-middle"><?=$sdm['jabatan'] ?></th>
						</tr>
						<tr>
							<th colspan="4">KEAHLIAN</th>
						</tr>
						<tr>
							<th class="align-middle" rowspan="2" width="15%">Kebutuhan</th>
							<td class="align-middle" width="15%">Kompetensi</td>
							<td class="align-middle" width=2%>:</td>
							<th class="align-middle"><?=$sdm['kompetensi_kebutuhan'] ?></th>
						</tr>
						<tr>
							<td class="align-middle">Tingkatan</td>
							<td class="align-middle">:</td>
							<th class="align-middle"><?=$sdm['tingkatan_kebutuhan'] ?></th>
						</tr>
						<tr>
							<th class="align-middle" rowspan="2">Ada Saat Ini</th>
							<td class="align-middle">Kompetensi</td>
							<td class="align-middle">:</td>
							<th class="align-middle"><?=$sdm['kompetensi_saat_ini'] ?></th>
						</tr>
						<tr>
							<td class="align-middle">Tingkatan</td>
							<td class="align-middle">:</td>
							<th class="align-middle"><?=$sdm['tingkatan_saat_ini'] ?></th>
						</tr>
						<tr>
							<td class="align-middle" colspan="2">Analisa Kebutuhan Pelatihan</td>
							<td class="align-middle">:</td>
							<th class="align-middle"><?=$sdm['kebutuhan_pelatihan'] ?></th>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card shadow border-primary mb-3">
			<div class="card-header bg-primary text-white">
				Pelatihan
				<button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahpelatihanModal" title="Tambah Pelatihan"><i class="fa fa-fw fa-plus"></i></button>
			</div>
			<div class="card-body table-responsive small">
				<table class="table table-sm table-bordered table-hover table-striped m-0" width="100%">
					<thead class="bg-secondary text-white text-center">
						<tr>
							<th class="align-middle" width="5%">NO</th>
							<th class="align-middle">PELATIHAN</th>
							<th class="align-middle">TINGKATAN</th>
							<th class="align-middle">WAKTU</th>
							<th class="align-middle" width="10%">OPSI</th>
						</tr>
					</thead>
					<tbody>
						<?php if($sdm_pelatihan){ ?>
							<?php $no=1; foreach ($sdm_pelatihan as $slth): ?>
								<tr>
									<td class="align-middle text-center"><?=$no++  ?></td>
									<td class="align-middle text-center"><?=$slth['pelatihan']  ?></td>
									<td class="align-middle text-center"><?=$slth['tingkatan']  ?></td>
									<td class="align-middle text-center"><?=$slth['waktu']  ?></td>
									<td class="align-middle text-center">
										<button type="button" class="btn btn-sm btn-circle btn-info" id="ubahpelatihan" data-id="<?=$slth['id_pelatihan'] ?>" data-idsdm="<?=$slth['id_sdm'] ?>" data-pelatihan="<?=$slth['pelatihan'] ?>" data-tingkatan="<?=$slth['tingkatan'] ?>" data-waktu="<?=$slth['waktu'] ?>" data-toggle="modal" data-target="#ubahpelatihanModal" title="Ubah"><i class="fa fa-fw fa-edit"></i></button>
										<button type="button" class="btn btn-sm btn-circle btn-danger" id="hapuspelatihan" data-id="<?=$slth['id_pelatihan'] ?>" data-idsdm="<?=$slth['id_sdm'] ?>" data-pelatihan="<?=$slth['pelatihan'] ?>" data-toggle="modal" data-target="#hapuspelatihanModal" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
									</td>
								</tr>
							<?php endforeach ?>
						<?php }else{ ?>
							<tr>
								<td class="align-middle text-center" colspan="5">Tidak Ada Data Tersedia!</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- DOKUMEN -->
		<!-- <div class="card shadow border-primary mb-3">
			<div class="card-header bg-primary text-white">
				Dokumen
				<button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahdokumenModal" title="Tambah Dokumen"><i class="fa fa-fw fa-plus"></i></button>
			</div>
			<div class="card-body table-responsive small">
				<table class="table table-sm table-bordered table-hover table-striped m-0" width="100%">
					<thead class="bg-secondary text-white text-center">
						<tr>
							<th class="align-middle" width="5%">NO</th>
							<th class="align-middle">NAMA DOKUMEN</th>
							<th class="align-middle" width="10%">OPSI</th>
						</tr>
					</thead>
					<tbody>
						<?php if($sdm_dokumen){ ?>
							<?php $no=1; foreach ($sdm_dokumen as $sdok): ?>
								<tr>
									<td class="align-middle text-center"><?=$no++  ?></td>
									<td class="align-middle text-center"><?=$sdok['judul_dokumen']  ?></td>
									<td class="align-middle text-center">
										<button type="button" class="btn btn-sm btn-circle btn-info" id="ubahdokumen" data-id="<?=$sdok['id_dokumen'] ?>" data-idsdm="<?=$sdok['id_sdm'] ?>" data-judul="<?=$sdok['judul_dokumen'] ?>" data-file="<?=$sdok['file_dokumen'] ?>" data-toggle="modal" data-target="#ubahdokumenModal" title="Ubah"><i class="fa fa-fw fa-edit"></i></button>
										<button type="button" class="btn btn-sm btn-circle btn-danger" id="hapusdokumen" data-id="<?=$sdok['id_dokumen'] ?>" data-idsdm="<?=$sdok['id_sdm'] ?>" data-judul="<?=$sdok['judul_dokumen'] ?>" data-toggle="modal" data-target="#hapusdokumenModal" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
									</td>
								</tr>
							<?php endforeach ?>
						<?php }else{ ?>
							<tr>
								<td class="align-middle text-center" colspan="3">Tidak Ada Data Tersedia!</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div> -->
	</div>
</div>

<!-- Modal Tambah Pelatihan -->
<div class="modal fade" id="tambahpelatihanModal" tabindex="-1" role="dialog" aria-labelledby="tambahpelatihanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahpelatihanModalLabel">Tambah Pelatihan SDM</h5>
      </div>
      <form action="<?=base_url('sdm/form/tambahpelatihan/').$sdm['id_sdm'] ?>" method="post">
	      <div class="modal-body">
	      	<div class="form-group row">
			    <label for="pelatihan" class="col-sm-2 col-form-label">Pelatihan</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control shadow-sm shadow-sm" id="pelatihan" name="pelatihan" placeholder="Pelatihan" autofocus required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="tingkatan" class="col-sm-2 col-form-label">Tingkatan</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control shadow-sm shadow-sm" id="tingkatan" name="tingkatan" placeholder="Tingkatan" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control shadow-sm shadow-sm" id="waktu" name="waktu" placeholder="Waktu" required>
			    </div>
			  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Tambah Dokumen -->
<div class="modal fade" id="tambahdokumenModal" tabindex="-1" role="dialog" aria-labelledby="tambahdokumenModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahdokumenModalLabel">Tambah Dokumen SDM</h5>
      </div>
      <form action="<?=base_url('sdm/form/tambahdokumen/').$sdm['id_sdm'] ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	      	<div class="form-group row">
				    <label for="judul_dokumen" class="col-sm-2 col-form-label">Judul</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control shadow-sm shadow-sm" id="judul_dokumen" name="judul_dokumen" placeholder="Judul" autofocus required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="file_dokumen" class="col-sm-2 col-form-label">File</label>
				    <div class="col-sm-10">
				      <div class="custom-file">
							  <input type="file" class="custom-file-input" id="file_dokumen" name="file_dokumen" required>
							  <label class="custom-file-label" for="file_dokumen" data-browse="Pilih">Pilih file dengan format <strong>.pdf</strong>!</label>
							</div>
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Pelatihan -->
<div class="modal fade" id="ubahpelatihanModal" tabindex="-1" role="dialog" aria-labelledby="ubahpelatihanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahpelatihanModalLabel">Ubah Pelatihan SDM</h5>
      </div>
      <form id="form_ubahpelatihan" action="" method="post">
	      <div class="modal-body">
	      	<div class="form-group row">
				    <label for="pelatihan" class="col-sm-2 col-form-label">Pelatihan</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control shadow-sm shadow-sm" id="pelatihan" name="pelatihan" placeholder="Pelatihan" autofocus required>
				      <input type="hidden" class="form-control shadow-sm shadow-sm" id="idsdm" name="idsdm" placeholder="Pelatihan"  required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="tingkatan" class="col-sm-2 col-form-label">Tingkatan</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control shadow-sm shadow-sm" id="tingkatan" name="tingkatan" placeholder="Tingkatan" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="waktu" class="col-sm-2 col-form-label">Waktu</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control shadow-sm shadow-sm" id="waktu" name="waktu" placeholder="Waktu" required>
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-info" title="Perbarui"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus Pelatihan -->
<div class="modal fade" id="hapuspelatihanModal" tabindex="-1" role="dialog" aria-labelledby="hapuspelatihanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapuspelatihanModalLabel">Hapus Pelatihan SDM</h5>
      </div>
      <form id="form_hapuspelatihan" action="" method="post">
	      <div class="modal-body">
		      <input type="hidden" class="form-control shadow-sm shadow-sm" id="idsdm" name="idsdm" placeholder="Pelatihan"  required>
		      <p id="kethapuspelatihan">keterangan</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

	$(document).on("click", "#ubahpelatihan", function() {
      var id = $(this).data('id');
      var idsdm = $(this).data('idsdm');
      var pelatihan = $(this).data('pelatihan');
      var tingkatan = $(this).data('tingkatan');
      var waktu = $(this).data('waktu');
      $("#ubahpelatihanModal #idsdm").val(idsdm);
      $("#ubahpelatihanModal #pelatihan").val(pelatihan);
      $("#ubahpelatihanModal #tingkatan").val(tingkatan);
      $("#ubahpelatihanModal #waktu").val(waktu);
      $("#ubahpelatihanModal #form_ubahpelatihan").attr('action', '<?php echo base_url() ?>sdm/form/ubahpelatihan/'+id);
  });

  $(document).on("click", "#hapuspelatihan", function() {
      var id = $(this).data('id');
      var idsdm = $(this).data('idsdm');
      var pelatihan = $(this).data('pelatihan');
      $("#hapuspelatihanModal #idsdm").val(idsdm);
      $("#hapuspelatihanModal #kethapuspelatihan").html("Hapus pelatihan <strong>"+pelatihan+"</strong>?");
      $("#hapuspelatihanModal #form_hapuspelatihan").attr('action', '<?php echo base_url() ?>sdm/form/hapuspelatihan/'+id);
  });

</script>