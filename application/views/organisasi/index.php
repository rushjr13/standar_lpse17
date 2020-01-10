<div class="row">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item shadow-sm list-group-item-action active" id="list-struktur-list" data-toggle="list" href="#list-struktur" role="tab" aria-controls="struktur">Struktur Organisasi</a>
      <a class="list-group-item shadow-sm list-group-item-action" id="list-tujuan-list" data-toggle="list" href="#list-tujuan" role="tab" aria-controls="tujuan">Tujuan Organisasi</a>
    	<?php foreach ($struktur_organisasi as $su): ?>
	      <a class="list-group-item shadow-sm list-group-item-action" id="list-<?=$su['id_su'] ?>-list" data-toggle="list" href="#list-<?=$su['id_su'] ?>" role="tab" aria-controls="<?=$su['id_su'] ?>"><?=$su['jabatan_su'] ?></a>
    	<?php endforeach ?>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">
    	<div class="tab-pane fade show active" id="list-struktur" role="tabpanel" aria-labelledby="list-struktur-list">
    		<div class="card shadow border-primary mb-3">
	      		<div class="card-header shadow-sm bg-primary text-white">
	      			Struktur Organisasi LPSE
              <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
  	      			<a href="<?=base_url('organisasi/tambah_tupoksi') ?>" class="btn btn-sm btn-circle shadow-sm btn-primary float-right" title="Tambah Jabatan"><i class="fa fa-fw fa-plus"></i></a>
  	      			<button type="button" class="btn btn-sm btn-circle btn-primary shadow-sm float-right mr-2" data-toggle="modal" data-target="#ubahstrukturModal" title="Ubah Struktur Organisasi"><i class="fa fa-fw fa-edit"></i></button>
              <?php } ?>
	      		</div>
	      		<div class="card-body text-center">
	      			<img src="<?=base_url('assets/img/').$gambar_organisasi['isi_ot'] ?>" class="img-fluid shadow-sm img-thumbnail" width="100%" alt="Struktur Organisasi LPSE">
	      		</div>
	      	</div>
    	</div>
    	<div class="tab-pane fade show" id="list-tujuan" role="tabpanel" aria-labelledby="list-tujuan-list">
    		<div class="card shadow border-primary mb-3">
	      		<div class="card-header shadow-sm bg-primary text-white">
	      			Tujuan Pengorganisasian
              <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
  	      			<button type="button" class="btn btn-sm btn-circle shadow-sm btn-primary float-right" data-toggle="modal" data-target="#ubahtujuanModal" title="Ubah Tujuan Organisasi"><i class="fa fa-fw fa-edit"></i></button>
              <?php } ?>
	      		</div>
	      		<div class="card-body">
	      			<?php if($tujuan_organisasi['isi_ot']){ ?>
	      				<div class="alert alert-success shadow-sm mb-4" role="alert">
			      			<?=$tujuan_organisasi['isi_ot'] ?>
			      		</div>
			      	<?php }else{ ?>
			      		<div class="alert alert-secondary text-center shadow-sm" role="alert">Tidak Ada data yang tersedia</div>
			      	<?php } ?>
	      		</div>
	      	</div>
    	</div>
    	<?php foreach ($struktur_organisasi as $su): ?>
	      <div class="tab-pane fade show" id="list-<?=$su['id_su'] ?>" role="tabpanel" aria-labelledby="list-<?=$su['id_su'] ?>-list">
	      	<div class="card shadow border-primary mb-3">
	      		<div class="card-header shadow-sm bg-primary text-white">
	      			<?=$su['jabatan_su'] ?>
              <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
                <button type="button" class="btn btn-sm btn-circle btn-danger shadow-sm float-right" id='hapussu' data-toggle="modal" data-target="#hapussuModal" data-idsu="<?=$su['id_su'] ?>" data-jabatansu="<?=$su['jabatan_su'] ?>" title="Hapus Jabatan <?=$su['jabatan_su'] ?>"><i class="fa fa-fw fa-trash"></i></button>
  	      			<a href="<?=base_url('organisasi/tupoksi/').$su['id_su'] ?>" class="btn btn-sm shadow-sm btn-circle btn-info float-right mr-2" title="Ubah Tupoksi <?=$su['jabatan_su'] ?>"><i class="fa fa-fw fa-edit"></i></a>
  	      			<a href="<?=base_url('organisasi/tambah_tupoksitambahan/').$su['id_su'] ?>" class="btn btn-sm shadow-sm btn-circle btn-success float-right mr-2" title="Tambah Tupoksi Tambahan <?=$su['jabatan_su'] ?>"><i class="fa fa-fw fa-plus"></i></a>
              <?php } ?>
	      		</div>
	      		<div class="card-body">
	      			<div class="alert alert-success shadow-sm mb-4" role="alert">
    					  <h4 class="alert-heading">Tugas Utama</h4>
    					  <?=$su['tugas_su'] ?>
    					</div>
  	      			<?php
  	      				$this->db->select('*');
  		            $this->db->from('organisasi_st');
  		            $this->db->where('id_su', $su['id_su']);
  		            $this->db->order_by('id_st', 'ASC');
  		            $subtugas = $this->db->get()->result_array();
  	      			?>
  	      			<?php if($subtugas){ ?>
	      				<div class="alert alert-warning shadow-sm" role="alert">
    						  <h4 class="alert-heading">Tugas Tambahan</h4>
		      				<?php foreach ($subtugas as $st): ?>
		      					<div class="card shadow mb-3">
		      						<div class="card-header shadow-sm font-weight-bold">
		      							<?=$st['jabatan_st'] ?>
                        <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
  		      							<button type="button" class="btn btn-sm btn-circle btn-danger shadow-sm float-right" id="hapusst" data-toggle="modal" data-target="#hapusstModal" data-idsu="<?=$su['id_su'] ?>" data-idst="<?=$st['id_st'] ?>" data-jabatanst="<?=$st['jabatan_st'] ?>" title="Hapus Tugas Tambahan <?=$su['jabatan_su'] ?> - <?=$st['jabatan_st'] ?>"><i class="fa fa-fw fa-trash"></i></button>	
  		      							<a href="<?=base_url('organisasi/tupoksitambahan/').$su['id_su'].'/'.$st['id_st'] ?>" class="btn shadow-sm btn-sm btn-circle btn-info float-right mr-2" title="Ubah Tugas Tambahan <?=$su['jabatan_su'] ?> - <?=$st['jabatan_st'] ?>"><i class="fa fa-fw fa-edit"></i></a>
                        <?php } ?>
	      							</div>
        							<div class="card-body"><?=$st['tugas_st'] ?></div>
  	      					</div>
  	      				<?php endforeach ?>
    						</div>
      				<?php } ?>
	      		</div>
	      	</div>
	      </div>
    	<?php endforeach ?>
    </div>
  </div>
</div>

<!-- Modal Tujuan Organisasi -->
<div class="modal fade" id="ubahtujuanModal" tabindex="-1" role="dialog" aria-labelledby="ubahtujuanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahtujuanModalLabel">Tujuan Pengorganisasian</h5>
      </div>
      <form id="formubahtujuan" action="<?=base_url('organisasi/tujuan_organisasi/tujuan') ?>" method="post">
        <div class="modal-body">
          <textarea class="form-control ckeditor shadow-sm" id="isi_ot" name="isi_ot" required><?=$tujuan_organisasi['isi_ot'] ?></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" id="tblubahtujuan" class="btn btn-sm btn-circle btn-primary shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Struktur Organisasi -->
<div class="modal fade" id="ubahstrukturModal" tabindex="-1" role="dialog" aria-labelledby="ubahstrukturModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahstrukturModalLabel">Ubah Gambar Struktur Organisasi</h5>
      </div>
      <form id="formubahstruktur" action="<?=base_url('organisasi/tujuan_organisasi/gambar') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
    		  <input type="hidden" class="form-control" id="isi_ot_lama" name="isi_ot_lama" value="<?=$gambar_organisasi['isi_ot'] ?>">
          <div class="custom-file">
    			  <input type="file" class="custom-file-input shadow-sm" id="isi_ot" name="isi_ot" required>
    			  <label class="custom-file-label shadow-sm" for="isi_ot" data-browse="Pilih Struktur Organisasi">Pilih file dengan format <strong>.jpg, .jpeg, .png</strong>!</label>
    			</div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" id="tblubahstruktur" class="btn btn-sm btn-circle btn-primary shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus ST -->
<div class="modal fade" id="hapusstModal" tabindex="-1" role="dialog" aria-labelledby="hapusstModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusstModalLabel">Hapus Tugas Tambahan</h5>
      </div>
      <form id="formhapusst" action="" method="post">
        <div class="modal-body">
          <p id="ket" class="text-center">Keterangan</p>
          <input class="form-control" type="hidden" id="jabatan_st" name="jabatan_st">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger shadow-sm" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus SU -->
<div class="modal fade" id="hapussuModal" tabindex="-1" role="dialog" aria-labelledby="hapussuModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapussuModalLabel">Hapus Jabatan</h5>
      </div>
      <form id="formhapussu" action="" method="post">
        <div class="modal-body">
          <p id="ket" class="text-center">Keterangan</p>
          <input class="form-control" type="hidden" id="jabatan_su" name="jabatan_su">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger shadow-sm" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusModal #nama_menu").val(nama);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus menu <strong>"+nama+"</strong> ?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>menu/hapus/"+id);
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