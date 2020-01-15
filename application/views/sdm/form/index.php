<div class="card shadow border-primary mb-3">
	<div class="card-header shadow-sm bg-primary text-white">
		Pencatatan SDM
		<?php if($akses_menu>0){ ?>
			<button type="button" class="btn btn-sm shadow-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahModal" title="Tambah Pencatatan SDM"><i class="fa fa-fw fa-plus"></i></button>
		<?php } ?>
	</div>
	<div class="card-body table-responsive small">
		<table class="table shadow-sm table-sm table-bordered table-striped" width="100%" cellspacing="0">
			<thead class="bg-primary text-white text-center">
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
							<td class="align-middle text-center" width="3%"><?=$no++ ?></td>
							<td class="align-middle"><?=$sd['jabatan'] ?></td>
							<td class="align-middle"><?=$sd['nama'] ?></td>
							<td class="align-middle"><?=$sd['kompetensi_kebutuhan'] ?></td>
							<td class="align-middle text-center"><?=$sd['tingkatan_kebutuhan'] ?></td>
							<td class="align-middle"><?=$sd['kompetensi_saat_ini'] ?></td>
							<td class="align-middle text-center"><?=$sd['tingkatan_saat_ini'] ?></td>
							<td class="align-middle"><?=$sd['kebutuhan_pelatihan'] ?></td>
							<td class="align-middle text-center" width="8%">
								<a href="<?=base_url('sdm/form/detail/').$sd['id_sdm'] ?>" class="btn shadow-sm btn-sm btn-circle btn-success" title="Pelatihan & Dokumen"><i class="fa fa-fw fa-user-tie"></i></a>
								<?php if($akses_menu>0){ ?>
									<button type="button" class="btn btn-sm shadow-sm btn-circle btn-info" id="ubah" data-id="<?=$sd['id_sdm'] ?>" data-nama="<?=$sd['nama'] ?>" data-jabatan="<?=$sd['jabatan'] ?>" data-komtuh="<?=$sd['kompetensi_kebutuhan'] ?>" data-tkttuh="<?=$sd['tingkatan_kebutuhan'] ?>" data-komini="<?=$sd['kompetensi_saat_ini'] ?>" data-tktini="<?=$sd['tingkatan_saat_ini'] ?>" data-tuhtih="<?=$sd['kebutuhan_pelatihan'] ?>" data-toggle="modal" data-target="#ubahModal" title="Ubah Data SDM a.n <?=$sd['nama'] ?>"><i class="fa fa-fw fa-user-edit"></i></button>
									<button type="button" class="btn btn-sm shadow-sm btn-circle btn-danger" id="hapus" data-id="<?=$sd['id_sdm'] ?>" data-nama="<?=$sd['nama'] ?>" data-jabatan="<?=$sd['jabatan'] ?>" data-toggle="modal" data-target="#hapusModal" title="Hapus Data SDM a.n <?=$sd['nama'] ?>"><i class="fa fa-fw fa-user-times"></i></button>
								<?php } ?>
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
	        <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah -->
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahModalLabel">Ubah Pencatatan SDM</h5>
      </div>
      <form id="formubahModal" action="" method="post">
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
	        <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-info" title="Perbarui"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Pencatatan SDM</h5>
      </div>
      <form id="formhapusModal" action="" method="post">
	      <div class="modal-body">
		      <input type="hidden" class="form-control shadow-sm shadow-sm" id="nama" name="nama" placeholder="Nama Lengkap" autofocus required>
		      <input type="hidden" class="form-control shadow-sm shadow-sm" id="jabatan" name="jabatan" placeholder="Nama Lengkap" autofocus required>
		      <p id="ket" class="text-center">keterangan</p>
		    </div>
	      <div class="modal-footer">
	        <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

     $(document).on("click", "#ubah", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var jabatan = $(this).data('jabatan');
        var komtuh = $(this).data('komtuh');
        var komini = $(this).data('komini');
        var tkttuh = $(this).data('tkttuh');
        var tktini = $(this).data('tktini');
        var tuhtih = $(this).data('tuhtih');
        $("#ubahModal #nama").val(nama);
        $("#ubahModal #jabatan").val(jabatan);
        $("#ubahModal #kompetensi_kebutuhan").html(komtuh);
        $("#ubahModal #tingkatan_kebutuhan").html(tkttuh);
        $("#ubahModal #kompetensi_saat_ini").html(komini);
        $("#ubahModal #tingkatan_saat_ini").html(tktini);
        $("#ubahModal #kebutuhan_pelatihan").val(tuhtih);
        $("#ubahModal #formubahModal").attr("action","<?php echo base_url() ?>sdm/form/ubah/"+id);
    });

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var jabatan = $(this).data('jabatan');
        $("#hapusModal #nama").val(nama);
        $("#hapusModal #jabatan").val(jabatan);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus Pencatatan SDM a.n <strong>"+nama+"</strong> sebagai <strong>"+jabatan+"</strong> beserta Dokumen dan Data Pelatihan?");
        $("#hapusModal #formhapusModal").attr("action","<?php echo base_url() ?>sdm/form/hapus/"+id);
    });

</script>