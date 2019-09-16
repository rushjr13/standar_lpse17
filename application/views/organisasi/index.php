<div class="row">
  <div class="col-2">
    <div class="list-group shadow" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-struktur-list" data-toggle="list" href="#list-struktur" role="tab" aria-controls="struktur">Struktur Organisasi</a>
    	<?php foreach ($struktur_organisasi as $su): ?>
	      <a class="list-group-item list-group-item-action" id="list-<?=$su['id_su'] ?>-list" data-toggle="list" href="#list-<?=$su['id_su'] ?>" role="tab" aria-controls="<?=$su['id_su'] ?>"><?=$su['jabatan_su'] ?></a>
    	<?php endforeach ?>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">
    	<div class="tab-pane fade show active" id="list-struktur" role="tabpanel" aria-labelledby="list-struktur-list">
    		<div class="card shadow border-primary mb-3">
      		<div class="card-header bg-primary text-white">Struktur Organisasi LPSE</div>
      		<div class="card-body text-center">
      			<img src="<?=base_url('assets/img/strukturorganisasi.png') ?>" class="img-fluid shadow img-thumbnail" width="100%" alt="Struktur Organisasi LPSE">
      		</div>
      	</div>
    	</div>
    	<?php foreach ($struktur_organisasi as $su): ?>
	      <div class="tab-pane fade show" id="list-<?=$su['id_su'] ?>" role="tabpanel" aria-labelledby="list-<?=$su['id_su'] ?>-list">
	      	<div class="card shadow border-primary mb-3">
	      		<div class="card-header bg-primary text-white">
	      			<?=$su['jabatan_su'] ?>
	      			<a href="<?=base_url('organisasi/tupoksi/').$su['id_su'] ?>" class="btn btn-sm btn-circle btn-primary float-right" title="Ubah Tupoksi <?=$su['jabatan_su'] ?>"><i class="fa fa-fw fa-edit"></i></a>
	      			<a href="<?=base_url('organisasi/tambah_tupoksitambahan/').$su['id_su'] ?>" class="btn btn-sm btn-circle btn-primary float-right mr-2" title="Tambah Tupoksi Tambahan <?=$su['jabatan_su'] ?>"><i class="fa fa-fw fa-plus"></i></a>
	      		</div>
	      		<div class="card-body">
	      			<div class="alert alert-success shadow mb-4" role="alert">
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
	      				<div class="alert alert-warning shadow" role="alert">
						  <h4 class="alert-heading">Tugas Tambahan</h4>
		      				<?php foreach ($subtugas as $st): ?>
		      					<div class="card shadow mb-3">
		      						<div class="card-header font-weight-bold">
		      							<?=$st['jabatan_st'] ?>
		      							<button type="button" class="btn btn-sm btn-circle btn-danger float-right" data-toggle="modal" data-target="#hapusModal" title="Hapus Tugas Tambahan Ini"><i class="fa fa-fw fa-trash"></i></button>	
		      							<a href="<?=base_url('organisasi/tupoksitambahan/').$su['id_su'].'/'.$st['id_st'] ?>" class="btn btn-sm btn-circle btn-info float-right mr-2" title="Ubah Tugas Tambahan Ini"><i class="fa fa-fw fa-edit"></i></a>
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