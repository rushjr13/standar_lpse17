<div class="row">
  <div class="col-3">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item shadow-sm list-group-item-action active" id="list-resiko-list" data-toggle="list" href="#list-resiko" role="tab" aria-controls="resiko">Resiko Layanan</a>
      <?php foreach ($sop_resiko as $sopr): ?>
	      <a class="list-group-item shadow-sm list-group-item-action" id="list-<?=$sopr['id'] ?>-list" data-toggle="list" href="#list-<?=$sopr['id'] ?>" role="tab" aria-controls="<?=$sopr['id'] ?>"><?=$sopr['nama'] ?></a>
      <?php endforeach ?>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active mb-4" id="list-resiko" role="tabpanel" aria-labelledby="list-resiko-list">
      	<div class="card shadow border-primary">
      		<div class="card-header shadow-sm bg-primary text-white">
      			Resiko Layanan
            <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
        			<button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right mr-2" id="editresiko" data-toggle="modal" data-target="#editresikoModal" title="Edit Daftar Istilah Pengelolaan Resiko Layanan"><i class="fa fa-fw fa-edit"></i></button>
            <?php } ?>
      		</div>
      		<div class="card-body">
      			<?=$istilah['isi'] ?>
      		</div>
      	</div>
      </div>
      <?php foreach ($sop_resiko as $sopr): ?>
	      <div class="tab-pane fade show mb-4" id="list-<?=$sopr['id'] ?>" role="tabpanel" aria-labelledby="list-<?=$sopr['id'] ?>-list">
	      	<div class="card shadow border-primary">
	      		<div class="card-header shadow-sm bg-primary text-white">
	      			<?=$sopr['nama'] ?>
              <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
  	      			<a href="<?=base_url('resiko/edit/').$sopr['id'] ?>" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" title="Edit <?=$sopr['nama'] ?>"><i class="fa fa-fw fa-edit"></i></a>
              <?php } ?>
	      		</div>
	      		<div class="card-body">
	      			<?=$sopr['isi'] ?>
	      		</div>
	      	</div>
	      </div>
      <?php endforeach ?>
    </div>
  </div>
</div>

<!-- Modal Ubah Daftar Istilah -->
<div class="modal fade" id="editresikoModal" tabindex="-1" role="dialog" aria-labelledby="editresikoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editresikoModalLabel">Ubah Daftar Istilah Aset</h5>
      </div>
      <form id="formeditresiko" action="<?=base_url('resiko/ubah/istilah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
				  <div class="form-group row">
				    <label for="nama" class="col-sm-2 col-form-label">Nama SOP</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control shadow-sm" id="nama" name="nama" value="<?=$istilah['nama'] ?>" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="isi">Isi SOP</label>
				    <textarea class="form-control ckeditor" id="isi" name="isi" rows="3"><?=$istilah['isi'] ?></textarea>
				  </div>
				</div>
        <div class="modal-footer">
          <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" id="tblubahstruktur" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus SOP -->
<div class="modal fade" id="hapussopModal" tabindex="-1" role="dialog" aria-labelledby="hapussopModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapussopModalLabel">Hapus SOP Pengelolaan Aset</h5>
      </div>
      <form id="formhapussop" action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
				  <p id="ket">Keterangan</p>
          <input class="form-control shadow-sm" type="hidden" id="nama" name="nama">
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

    $(document).on("click", "#hapussop", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapussopModal #nama").val(nama);
        $("#hapussopModal #ket").html("Anda yakin ingin menghapus SOP <strong>"+nama+"</strong> ?");
        $("#hapussopModal #formhapussop").attr("action","<?php echo base_url() ?>resiko/hapus/"+id);
    });

    $(document).on("click", "#hapusst", function() {
        var idsu = $(this).data('idsu');
        var idst = $(this).data('idst');
        var jabatanst = $(this).data('jabatanst');
        $("#hapusstModal #jabatan_st").val(jabatanst);
        $("#hapusstModal #ket").html("Anda yakin ingin menghapus tugas tambahan <strong>"+jabatanst+"</strong> ?");
        $("#hapusstModal #formhapusst").attr("action","<?php echo base_url() ?>organisasi/hapus_tupoksitambahan/"+idsu+"/"+idst);
    });

    $(document).on("click", "#hapussu", function() {
        var idsu = $(this).data('idsu');
        var jabatansu = $(this).data('jabatansu');
        $("#hapussuModal #jabatan_su").val(jabatansu);
        $("#hapussuModal #ket").html("Anda yakin ingin menghapus jabatan <strong>"+jabatansu+"</strong> ?");
        $("#hapussuModal #formhapussu").attr("action","<?php echo base_url() ?>organisasi/hapus_tupoksi/"+idsu);
    });

    $(document).on("click", "#ubah", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#ubahModal #nama_menu").val(nama);
        $("#ubahModal #formubah").attr("action","<?php echo base_url() ?>menu/ubah/"+id);
    });

</script>