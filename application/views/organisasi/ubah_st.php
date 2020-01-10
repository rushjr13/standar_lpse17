<form action="<?=base_url('organisasi/tupoksitambahan/').$struktur_organisasi['id_su'].'/'.$tugas_tambahan['id_st'] ?>" method="post">
	<div class="card border-primary shadow mb-3">
		<div class="card-header bg-primary text-white">
			<?=$struktur_organisasi['jabatan_su'] ?>
			<a href="<?=base_url('organisasi') ?>" class="btn btn-sm btn-circle shadow-sm btn-danger float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			<button class="btn btn-sm btn-circle btn-info float-right mr-2 shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
		</div>
		<div class="card-body">
			<div class="form-group row">
			    <label for="jabatan_st" class="col-sm-2 col-form-label">Jabatan Tambahan</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control shadow-sm" id="jabatan_st" name="jabatan_st" value="<?=$tugas_tambahan['jabatan_st'] ?>" autofocus>
			    </div>
			  </div>
		  <div class="form-group">
		    <label for="tugas_st">Tugas & Tanggung Jawab</label>
			<textarea class="form-control ckeditor" id="tugas_st" name="tugas_st" placeholder="Tugas & Tanggung Jawab"><?=$tugas_tambahan['tugas_st'] ?></textarea>
		  </div>
		</div>
	</div>
</form>