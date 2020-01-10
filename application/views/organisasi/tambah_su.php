<form action="<?=base_url('organisasi/tambah_tupoksi/') ?>" method="post">
	<div class="card border-primary shadow mb-3">
		<div class="card-header bg-primary text-white">
			Tambah Pejabat
			<a href="<?=base_url('organisasi') ?>" class="btn btn-sm btn-circle btn-danger shadow-sm float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			<button class="btn btn-sm btn-circle btn-info float-right shadow-sm mr-2" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
		</div>
		<div class="card-body">
			<div class="form-group row">
		    <label for="jabatan_su" class="col-sm-2 col-form-label">Jabatan</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control shadow-sm" id="jabatan_su" name="jabatan_su" autofocus>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="tugas_su">Tugas & Tanggung Jawab</label>
				<textarea class="form-control ckeditor shadow-sm" id="tugas_su" name="tugas_su" placeholder="Tugas & Tanggung Jawab"></textarea>
		  </div>
		</div>
	</div>
</form>