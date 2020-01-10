<div class="row justify-content-md-center">
	<div class="col-12">
		<div class="card shadow border-primary">
			<div class="card-header bg-primary text-white">
				Daftar SK Organisasi LPSE
				<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
					<a href="<?=base_url('organisasi/sk/tambah') ?>" class="btn btn-sm btn-circle btn-primary shadow-sm float-right" title="Tambah SK Organisasi"><i class="fa fa-fw fa-plus"></i></a>
        <?php } ?>
			</div>
			<div class="card-body table-responsive">
				<?php if($sk_organisasi){ ?>
					<table class="table table-sm table-borderless table-hover shadow-sm" id="dataTable" width="100%" cellspacing="0">
						<thead class="bg-primary text-white">
							<tr>
								<th class="align-middle text-center" width="3%">NO</th>
								<th class="align-middle">
									<div class="row text-center align-items-center">
										<div class="col-lg-3">NOMOR & TANGGAL SK</div>
										<div class="col-lg-4">NAMA SK</div>
										<div class="col-lg-4">TENTANG SK</div>
										<div class="col-lg-1">OPSI</div>
									</div>
								</th>
							</tr>
						</thead>
						<tbody>
							<?php $no=1; foreach ($sk_organisasi as $sko): ?>
							<?php
								date_default_timezone_set('Asia/Makassar');
				        $tgl = substr($sko['tanggal_sko'], 8, 2);
				        $bln = substr($sko['tanggal_sko'], 5, 2);
				        $thn = substr($sko['tanggal_sko'], 0, 4);

				        if($bln=='01'){
				            $bulan='Januari';
				        } else if($bln=='02'){
				            $bulan='Februari';
				        } else if($bln=='03'){
				            $bulan='Maret';
				        } else if($bln=='04'){
				            $bulan='April';
				        } else if($bln=='05'){
				            $bulan='Mei';
				        } else if($bln=='06'){
				            $bulan='Juni';
				        } else if($bln=='07'){
				            $bulan='Juli';
				        } else if($bln=='08'){
				            $bulan='Agustus';
				        } else if($bln=='09'){
				            $bulan='September';
				        } else if($bln=='10'){
				            $bulan='Oktober';
				        } else if($bln=='11'){
				            $bulan='November';
				        } else if($bln=='12'){
				            $bulan='Desember';
				        }

				        $tanggal_sko = $tgl.' '.$bulan.' '.$thn;
							?>
							<tr>
								<td class="align-middle text-center"><?=$no++ ?></td>
								<td class="align-middle">
									<div class="row text-center align-items-center">
										<div class="col-lg-3"><?=$sko['nomor_sko'] ?><br><?=$tanggal_sko ?></div>
										<div class="col-lg-4"><?=$sko['nama_sko'] ?></div>
										<div class="col-lg-4"><?=$sko['tentang_sko'] ?></div>
										<div class="col-lg-1">
											<button type="button" class="btn btn-sm btn-circle btn-success shadow-sm" id="files" data-toggle="modal" data-target="#filesModal" data-nama="<?=$sko['nama_sko'] ?>" data-file="<?=$sko['file_sko'] ?>" title="File <?=$sko['nama_sko'] ?>"><i class="fa fa-fw fa-file"></i></button>
											<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
												<a href="<?=base_url('organisasi/sk/ubah/').$sko['id_sko'] ?>" class="btn btn-sm btn-circle btn-info shadow-sm" title="Ubah <?=$sko['nama_sko'] ?>"><i class="fa fa-fw fa-edit"></i></a>
												<button type="button" class="btn btn-sm btn-circle btn-danger shadow-sm" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$sko['id_sko'] ?>" data-nama="<?=$sko['nama_sko'] ?>" data-file="<?=$sko['file_sko'] ?>" title="Hapus <?=$sko['nama_sko'] ?>"><i class="fa fa-fw fa-trash"></i></button>
				              <?php } ?>
										</div>
									</div>
								</td>
							</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				<?php }else{ ?>
					<div class="row">
						<div class="alert alert-secondary col-12 text-center shadow-sm" role="alert">Tidak ada data yang tersedia!</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<!-- Modal File -->
<div class="modal fade" id="filesModal" tabindex="-1" role="dialog" aria-labelledby="filesModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filesModalLabel">Dokumen</h5>
        <a href="<?=base_url('organisasi/sk') ?>" class="close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <iframe id="framefile" class="embed-responsive-item" src="" allowfullscreen width="100%" height="750px"></iframe>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus SK</h5>
      </div>
      <form id="formhapus" action="" method="post">
        <div class="modal-body">
          <p id="ket" class="text-center">Keterangan</p>
          <input class="form-control" type="hidden" id="nama_sko" name="nama_sko">
          <input class="form-control" type="hidden" id="file_sko" name="file_sko">
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
        var file = $(this).data('file');
        $("#hapusModal #nama_sko").val(nama);
        $("#hapusModal #file_sko").val(file);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus <strong>"+nama+"</strong> ?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>organisasi/sk/hapus/"+id);
    });

    $(document).on("click", "#files", function() {
        var nama = $(this).data('nama');
        var file = $(this).data('file');
        $("#filesModal #filesModalLabel").html('Dokumen '+nama);
        $("#filesModal #framefile").attr('src',"<?php echo base_url() ?>uploads/pdf/sk_organisasi/"+file);
    });

</script>