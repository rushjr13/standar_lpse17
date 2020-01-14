<div class="card shadow-sm border-primary">
	<div class="card-header shadow-sm bg-primary text-white">
		Pencatatan Pemberian Remote Akses
		<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
			<button class="btn btn-sm btn-circle btn-primary float-right shadow-sm" title="Tambah Pemberian Remote Akses Server"><i class="fa fa-fw fa-plus"></i></button>
		<?php } ?>
	</div>
	<div class="card-body table-responsive">
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
				<tr>
					<td class="align-middle"></td>
				</tr>
			</tbody>
		</table>
	</div>
</div>