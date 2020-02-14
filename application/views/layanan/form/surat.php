<div class="card border-primary shadow">
	<div class="card-header bg-primary text-white">
		Surat Layanan Pemberian Remote Akses Server LPSE
		<a href="<?=base_url('layanan/form') ?>" class="btn btn-sm btn-circle btn-danger shadow-sm float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
	</div>
	<div class="card-body row justify-content-sm-center">
		<div class="col-sm-4 table-responsive">
			<table class="table table-sm table-borderless table striped" width="100%" cellspacing="0">
				<tbody>
					<tr>
						<td class="align-middle" width="23%">No. Surat</td>
						<td class="align-middle text-center" width="5%">:</td>
						<th class="align-middle"><?=$layanan['no_surat'] ?></th>
					</tr>
					<tr>
						<td class="align-middle">Tanggal Surat</td>
						<td class="align-middle text-center">:</td>
						<th class="align-middle"><?=$layanan['tgl_surat'] ?></th>
					</tr>
					<tr>
						<td class="align-middle">Perihal</td>
						<td class="align-middle text-center">:</td>
						<th class="align-middle"><?=$layanan['perihal_surat'] ?></th>
					</tr>
					<tr>
						<td class="align-middle">Asal Surat</td>
						<td class="align-middle text-center">:</td>
						<th class="align-middle"><?=$layanan['asal_surat'] ?></th>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-sm-12">
			<div class="embed-responsive embed-responsive-4by3 mb-3 shadow-sm">
        <iframe class="embed-responsive-item img-thumbnail" src="<?=base_url('uploads/pdf/layanan/'.$layanan['dokumen_surat']) ?>" allowfullscreen></iframe>
      </div>
		</div>
	</div>
</div>