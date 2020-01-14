<div class="card border-primary shadow">
	<div class="card-header shadow-sm bg-primary text-white">
		Pencatatan Kapasitas Layanan
		<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
			<a href="<?=base_url('kapasitas/form/tambah') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" title="Tambah Pencatatan Kapasitas Layanan"><i class="fa fa-fw fa-plus"></i></a>
		<?php } ?>
	</div>
	<div class="card-body table-responsive">
		<small>
			<table class="table shadow-sm table-sm table-bordered table-striped table-hover" width="100%" cellspacing="0">
				<thead class="bg-primary text-white text-center">
					<tr>
						<th class="align-middle" rowspan="3">NO</th>
						<th class="align-middle" rowspan="3">ITEM</th>
						<th class="align-middle" rowspan="3">BATASAN (TRESHOLD)</th>
						<th class="align-middle" rowspan="2" colspan="2">PENGGUNAAN RESOURCE</th>
						<th class="align-middle" colspan="8">FORECAST</th>
						<th class="align-middle" rowspan="3">PERKIRAAN RESOURCE</th>
						<th class="align-middle" rowspan="3">LANGKAH TINDAK LANJUT</th>
						<th class="align-middle" rowspan="3">OPSI</th>
					</tr>
					<tr>
						<th class="align-middle" colspan="4">KONDISI AKTUAL</th>
						<th class="align-middle" colspan="4">PERKIRAAN AKAN DATANG</th>
					</tr>
					<tr>
						<th class="align-middle">WAKTU AKTUAL</th>
						<th class="align-middle">UTILITAS</th>
						<th class="align-middle">P1</th>
						<th class="align-middle">P2</th>
						<th class="align-middle">P3</th>
						<th class="align-middle">P4</th>
						<th class="align-middle">P1</th>
						<th class="align-middle">P2</th>
						<th class="align-middle">P3</th>
						<th class="align-middle">P4</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($kapasitas_kategori as $kk): ?>
						<tr class="bg-light">
							<th class="align-middle"><?=$kk['id_kk'] ?></th>
							<th colspan="15" class="text-uppercase"><?=$kk['nama_kk'] ?></th>
						</tr>
						<?php
							$this->db->where('id_kk', $kk['id_kk']);
							$kapasitas = $this->db->get('kapasitas')->result_array();
						?>
						<?php if($kapasitas){ ?>
							<?php $no=1; foreach ($kapasitas as $kp): ?>
								<tr>
									<td class="align-middle"><?=$kp['id_kk'].'.'.$no++ ?></td>
									<td class="align-middle"><?=$kp['item'] ?></td>
									<td class="align-middle text-center"><?=$kp['batasan'] ?></td>
									<td class="align-middle text-center"><?=$kp['waktu_pantau'] ?></td>
									<td class="align-middle text-center"><?=$kp['utilitas'] ?></td>
									<td class="align-middle text-center"><?=$kp['kondisi_p1'] ?></td>
									<td class="align-middle text-center"><?=$kp['kondisi_p2'] ?></td>
									<td class="align-middle text-center"><?=$kp['kondisi_p3'] ?></td>
									<td class="align-middle text-center"><?=$kp['kondisi_p4'] ?></td>
									<td class="align-middle text-center"><?=$kp['perkiraan_p1'] ?></td>
									<td class="align-middle text-center"><?=$kp['perkiraan_p2'] ?></td>
									<td class="align-middle text-center"><?=$kp['perkiraan_p3'] ?></td>
									<td class="align-middle text-center"><?=$kp['perkiraan_p4'] ?></td>
									<td class="align-middle text-center"><?=$kp['perkiraan_resource'] ?></td>
									<td class="align-middle"><?=$kp['tindak_lanjut'] ?></td>
									<td class="align-middle text-center" width="7%">
										<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
											<a href="<?=base_url('kapasitas/form/laporan/').$kp['id_kapasitas'] ?>" class="btn shadow-sm btn-sm btn-circle btn-success" title="Laporan"><i class="fa fa-fw fa-file"></i></a>
											<a href="<?=base_url('kapasitas/form/ubah/').$kp['id_kapasitas'] ?>" class="btn shadow-sm btn-sm btn-circle btn-info" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
											<button type="button" class="btn shadow-sm btn-sm btn-circle btn-danger" id="hapus" title="Hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$kp['id_kapasitas'] ?>" data-item="<?=$kp['item'] ?>"><i class="fa fa-fw fa-trash"></i></button>
										<?php }else{ ?>
											<a href="<?=base_url('kapasitas/form/cetak/').$kp['id_kapasitas'] ?>" target="_blank" class="btn shadow-sm btn-sm btn-circle btn-success" title="Laporan"><i class="fa fa-fw fa-print"></i></a>
										<?php } ?>
									</td>
								</tr>
							<?php endforeach ?>
						<?php }else{ ?>
							<tr>
								<td colspan="16">Tidak ada data Item <?=$kk['nama_kk'] ?></td>
							</tr>
						<?php } ?>
					<?php endforeach ?>
				</tbody>
			</table>
		</small>
	</div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Modal title</h5>
      </div>
      <form id="formhapuskapasitas" action="" method="post">
	      <div class="modal-body">
	        <input type="hidden" id="id_kapasitas" name="id_kapasitas">
	        <input type="hidden" id="item" name="item">
	        <p id="kethapus" class="text-center">keterangan</p>
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

  $(document).on("click", "#hapus", function() {
      var id = $(this).data('id');
      var item = $(this).data('item');
      $("#hapusModal #id_kapasitas").val(id);
      $("#hapusModal #item").val(item);
      $("#hapusModal #kethapus").html("Hapus Kapasitas Layanan <strong>"+item+"</strong>?");
      $("#hapusModal #formhapuskapasitas").attr('action', '<?php echo base_url() ?>kapasitas/form/hapus/'+id);
  });

</script>