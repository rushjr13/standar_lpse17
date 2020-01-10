<form action="<?=base_url('aset/ubah/').$sop_aset['id'] ?>" method="post">
	<div class="card shadow border-primary">
		<div class="card-header bg-primary text-white">
			<?=$sop_aset['nama'] ?>
			<a href="<?=base_url('aset') ?>" class="btn btn-sm btn-circle btn-danger float-right shadow-sm" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
			<button tipe="submit" class="btn btn-sm btn-circle btn-info mr-2 float-right shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
		</div>
		<div class="card-body">
			<div class="form-group row">
			    <label for="nama" class="col-sm-2 col-form-label">Nama SOP</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control shadow-sm" id="nama" name="nama" value="<?=$sop_aset['nama'] ?>" required autofocus>
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="isi">Isi SOP</label>
			    <textarea class="form-control shadow-sm ckeditor" id="isi" name="isi" rows="3"  required><?=$sop_aset['isi'] ?></textarea>
			  </div>
		</div>
	</div>
</form>