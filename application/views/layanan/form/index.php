<div class="card shadow-sm border-primary">
	<div class="card-header shadow-sm bg-primary text-white">
		Pencatatan Pemberian Remote Akses
		<?php if($akses_menu>0){ ?>
			<a href="<?=base_url('layanan/form/tambah') ?>" class="btn btn-sm btn-circle btn-primary float-right shadow-sm" title="Tambah Pemberian Remote Akses Server"><i class="fa fa-fw fa-plus"></i></a>
		<?php } ?>
	</div>
	<div class="card-body table-responsive small">
		<table class="table table-sm table-bordered table-striped table-hover shadow-sm mb-0" width="100%" cellspacing="0">
			<thead class="bg-primary text-white text-center">
				<tr>
					<th class="align-middle" width="3%">NO</th>
					<th class="align-middle">NAMA</th>
					<th class="align-middle">INSTANSI</th>
					<th class="align-middle">TUJUAN</th>
					<th class="align-middle">SURAT</th>
					<th class="align-middle" width="6%">STATUS</th>
					<th class="align-middle" width="8%">OPSI</th>
				</tr>
			</thead>
			<tbody>
				<?php if($layanan){ ?>
					<?php $no=1; foreach ($layanan as $lyn): ?>
						<tr>
							<td class="align-middle text-center"><?=$no++ ?></td>
							<td class="align-middle text-center"><?=$lyn['nama_pemohon'] ?></td>
							<td class="align-middle text-center"><?=$lyn['instansi_pemohon'] ?></td>
							<td class="align-middle text-center"><?=$lyn['tujuan_pemohon'] ?></td>
							<td class="align-middle text-center">
								<a href="<?=base_url('layanan/form/surat/'.$lyn['id_layanan']) ?>" class="btn btn-sm btn-primary shadow-sm"><i class="fa fa-fw fa-file-alt"></i> <?=$lyn['no_surat'] ?> - <?=$lyn['tgl_surat'] ?></a>
							</td>
							<td class="align-middle text-center"><?=$lyn['status_layanan'] ?></td>
							<td class="align-middle text-center">
								<?php if($lyn['status_layanan']=='Tunda'){ ?>
									<button class="btn btn-sm btn-circle btn-default shadow-sm" title="Status Layanan"><i class="fa fa-fw fa-pencil-alt"></i></button>
									<button class="btn btn-sm btn-circle btn-info shadow-sm" title="Ubah"><i class="fa fa-fw fa-edit"></i></button>
									<button class="btn btn-sm btn-circle btn-danger shadow-sm" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
								<?php }else if($lyn['status_layanan']=='Setuju'){ ?>
									<button class="btn btn-sm btn-circle btn-success shadow-sm" title="Data Akses"><i class="fa fa-fw fa-pencil-alt"></i></button>
									<button class="btn btn-sm btn-circle btn-info shadow-sm" title="Ubah"><i class="fa fa-fw fa-edit"></i></button>
								<?php }else{ ?>
									<button class="btn btn-sm btn-circle btn-warning shadow-sm" title="Rincian"><i class="fa fa-fw fa-list"></i></button>
								<?php } ?>
							</td>
						</tr>
					<?php endforeach ?>
				<?php }else{ ?>
					<tr>
						<td class="align-middle text-center" colspan="7">Tidak ada data yang tersedia</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>