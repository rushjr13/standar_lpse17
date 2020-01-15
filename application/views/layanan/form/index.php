<div class="card shadow-sm border-primary">
	<div class="card-header shadow-sm bg-primary text-white">
		Pencatatan Pemberian Remote Akses
		<?php if($akses_menu>0){ ?>
			<a href="<?=base_url('layanan/form/tambah') ?>" class="btn btn-sm btn-circle btn-primary float-right shadow-sm" title="Tambah Pemberian Remote Akses Server"><i class="fa fa-fw fa-plus"></i></a>
		<?php } ?>
	</div>
	<div class="card-body table-responsive small">
		<table class="table table-sm table-bordered table-striped table-hover shadow-sm" width="100%" cellspacing="0">
			<thead class="bg-primary text-white text-center">
				<tr>
					<th class="align-middle" rowspan="2">NO</th>
					<th class="align-middle" rowspan="2">NAMA</th>
					<th class="align-middle" rowspan="2">INSTANSI</th>
					<th class="align-middle" rowspan="2">TUJUAN</th>
					<th class="align-middle" colspan="2">REMOTE AKSES</th>
					<th class="align-middle" colspan="2">WAKTU</th>
					<th class="align-middle" rowspan="2">OPSI</th>
				</tr>
				<tr>
					<th class="align-middle">USERNAME</th>
					<th class="align-middle">HAK AKSES</th>
					<th class="align-middle">PEMBERIAN</th>
					<th class="align-middle">PENUTUPAN</th>
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
							<td class="align-middle text-center"><?=$lyn['user_akses'] ?></td>
							<td class="align-middle text-center"><?=$lyn['hak_akses'] ?></td>
							<td class="align-middle text-center"><?=$lyn['tgl_buka'] ?></td>
							<td class="align-middle text-center"><?=$lyn['tgl_tutup'] ?></td>
							<td class="align-middle text-center">
								<button class="btn btn-sm btn-circle btn-info shadow-sm" title="Ubah"><i class="fa fa-fw fa-edit"></i></button>
								<button class="btn btn-sm btn-circle btn-danger shadow-sm" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				<?php }else{ ?>
					<tr>
						<td class="align-middle text-center" colspan="9">Tidak ada data yang tersedia</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>