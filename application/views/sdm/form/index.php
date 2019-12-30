<div class="card shadow border-primary mb-3">
	<div class="card-header bg-primary text-white">
		Pencatatan SDM
		<button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahModal" title="Tambah Pencatatan SDM"><i class="fa fa-fw fa-plus"></i></button>
	</div>
	<div class="card-body table-responsive small">
		<table class="table table-sm table-bordered table-striped" width="100%" cellspacing="0">
			<thead class="bg-secondary text-white text-center">
				<tr>
					<th class="align-middle" rowspan="3">NO</th>
					<th class="align-middle" rowspan="3">JABATAN</th>
					<th class="align-middle" rowspan="3">NAMA</th>
					<th class="align-middle" colspan="4">KEAHLIAN</th>
					<th class="align-middle" rowspan="3">ANALISA KEBUTUHAN PELATIHAN</th>
					<th class="align-middle" rowspan="3">OPSI</th>
				</tr>
				<tr>
					<th class="align-middle" colspan="2">KEBUTUHAN</th>
					<th class="align-middle" colspan="2">ADA SAAT INI</th>
				</tr>
				<tr>
					<th class="align-middle">KOMPETENSI</th>
					<th class="align-middle">TINGKATAN</th>
					<th class="align-middle">KOMPETENSI</th>
					<th class="align-middle">TINGKATAN</th>
				</tr>
			</thead>
			<tbody>
				<?php if($sdm){ ?>
					<?php $no=1; foreach ($sdm as $sd): ?>
						<tr>
							<td class="align-middle text-center"><?=$no++ ?></td>
							<td class="align-middle"><?=$sd['jabatan'] ?></td>
							<td class="align-middle"><?=$sd['nama'] ?></td>
							<td class="align-middle"><?=$sd['kompetensi_kebutuhan'] ?></td>
							<td class="align-middle text-center"><?=$sd['tingkatan_kebutuhan'] ?></td>
							<td class="align-middle"><?=$sd['kompetensi_saat_ini'] ?></td>
							<td class="align-middle text-center"><?=$sd['tingkatan_saat_ini'] ?></td>
							<td class="align-middle"><?=$sd['kebutuhan_pelatihan'] ?></td>
							<td class="align-middle text-center">
								<a href="<?=base_url('sdm/form/detail/').$sd['id_sdm'] ?>" class="btn btn-sm btn-circle btn-success" title="Pelatihan & Dokumen"><i class="fa fa-fw fa-user-tie"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				<?php }else{ ?>
					<tr class="text-center">
						<td class="align-middle" colspan="9">Tidak Ada Data Tersedia!</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Pencatatan SDM</h5>
      </div>
      <form action="<?=base_url('sdm/form/tambah') ?>" method="post">
	      <div class="modal-body">
	      	<div class="form-group row">
				    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control shadow-sm shadow-sm" id="nama" name="nama" placeholder="Nama Lengkap" autofocus required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control shadow-sm" id="jabatan" name="jabatan" placeholder="Jabatan" required>
				    </div>
				  </div>
				  <hr class="mb-2">
				  <h5 class="font-weight-bold text-center">KEAHLIAN</h5>
				  <div class="row mb-0">
				  	<div class="col-lg-6">
				  		<div class="alert alert-light border-light shadow-sm">
				  			<h6 class="font-weight-bold text-center">KEBUTUHAN</h6>
				  			<hr class="my-2">
				  			<div class="form-group row">
							    <label for="kompetensi_kebutuhan" class="col-sm-3 col-form-label">Kompetensi</label>
							    <div class="col-sm-9">
							      <textarea class="form-control shadow-sm" id="kompetensi_kebutuhan" name="kompetensi_kebutuhan" placeholder="Kompetensi" required></textarea>
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="tingkatan_kebutuhan" class="col-sm-3 col-form-label">Tingkatan</label>
							    <div class="col-sm-9">
							      <textarea class="form-control shadow-sm" id="tingkatan_kebutuhan" name="tingkatan_kebutuhan" placeholder="Tingkatan" required></textarea>
							    </div>
							  </div>
				  		</div>
				  	</div>
				  	<div class="col-lg-6">
				  		<div class="alert alert-light border-light shadow-sm">
				  			<h6 class="font-weight-bold text-center">ADA SAAT INI</h6>
				  			<hr class="my-2">
				  			<div class="form-group row">
							    <label for="kompetensi_saat_ini" class="col-sm-3 col-form-label">Kompetensi</label>
							    <div class="col-sm-9">
							      <textarea class="form-control shadow-sm" id="kompetensi_saat_ini" name="kompetensi_saat_ini" placeholder="Kompetensi" required></textarea>
							    </div>
							  </div>
							  <div class="form-group row">
							    <label for="tingkatan_saat_ini" class="col-sm-3 col-form-label">Tingkatan</label>
							    <div class="col-sm-9">
							      <textarea class="form-control shadow-sm" id="tingkatan_saat_ini" name="tingkatan_saat_ini" placeholder="Tingkatan" required></textarea>
							    </div>
							  </div>
				  		</div>
				  	</div>
				  </div>
				  <hr class="mt-0">
				  <div class="form-group row">
				    <label for="kebutuhan_pelatihan" class="col-sm-3 col-form-label">Analisis Kebutuhan Pelatihan</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control shadow-sm" id="kebutuhan_pelatihan" name="kebutuhan_pelatihan" placeholder="Analisis Kebutuhan Pelatihan" required>
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