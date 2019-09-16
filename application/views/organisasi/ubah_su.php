<form action="<?=base_url('organisasi/tupoksi/').$struktur_organisasi['id_su'] ?>" method="post">
	<div class="card border-primary shadow mb-3">
		<div class="card-header bg-primary text-white">
			<?=$struktur_organisasi['jabatan_su'] ?>
			<a href="<?=base_url('organisasi') ?>" class="btn btn-sm btn-circle btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			<button class="btn btn-sm btn-circle btn-info float-right mr-2" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
		</div>
		<div class="card-body">
			<div class="form-group row">
			    <label for="jabatan_st" class="col-sm-2 col-form-label">Jabatan</label>
			    <div class="col-sm-10">
					<input type="text" class="form-control" id="jabatan_su" name="jabatan_su" value="<?=$struktur_organisasi['jabatan_su'] ?>" autofocus>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="tugas_st">Tugas & Tanggung Jawab</label>
				<textarea class="form-control ckeditor" id="tugas_su" name="tugas_su" placeholder="Tugas & Tanggung Jawab"><?=$struktur_organisasi['tugas_su'] ?></textarea>
			  </div>
		</div>
	</div>
</form>