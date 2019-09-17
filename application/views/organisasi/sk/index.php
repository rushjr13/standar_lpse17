<div class="row justify-content-md-center">
	<div class="col-12">
		<div class="card shadow border-primary">
			<div class="card-header bg-primary text-white">
				Daftar SK Organisasi LPSE
				<a href="<?=base_url('organisasi/sk/tambah') ?>" class="btn btn-sm btn-circle btn-primary float-right" title="Tambah SK Organisasi"><i class="fa fa-fw fa-plus"></i></a>
			</div>
			<div class="card-body">
				<div class="card shadow border-primary">
					<div class="card-header bg-primary text-white">
						<div class="row text-center">
							<div class="col-lg-3 align-middle">NOMOR & TANGGAL SK</div>
							<div class="col-lg-4 align-middle">NAMA SK</div>
							<div class="col-lg-4 align-middle">TENTANG SK</div>
							<div class="col-lg-1 align-middle">OPSI</div>
						</div>
					</div>
					<div class="card-body">
						<?php if($sk_organisasi){ ?>
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
								<div class="row text-center">
									<div class="col-lg-3 align-middle"><?=$sko['nomor_sko'] ?><br><?=$tanggal_sko ?></div>
									<div class="col-lg-4 align-middle"><?=$sko['nama_sko'] ?></div>
									<div class="col-lg-4 align-middle"><?=$sko['tentang_sko'] ?></div>
									<div class="col-lg-1 align-middle">
										<button type="button" class="btn btn-sm btn-circle btn-success" id="files" data-toggle="modal" data-target="#filesModal" data-nama="<?=$sko['nama_sko'] ?>" data-file="<?=$sko['file_sko'] ?>" title="File <?=$sko['nama_sko'] ?>"><i class="fa fa-fw fa-file"></i></button>
										<a href="<?=base_url('organisasi/sk/ubah/').$sko['id_sko'] ?>" class="btn btn-sm btn-circle btn-info" title="Ubah <?=$sko['nama_sko'] ?>"><i class="fa fa-fw fa-edit"></i></a>
										<button type="button" class="btn btn-sm btn-circle btn-danger" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$sko['id_sko'] ?>" data-nama="<?=$sko['nama_sko'] ?>" data-file="<?=$sko['file_sko'] ?>" title="Hapus <?=$sko['nama_sko'] ?>"><i class="fa fa-fw fa-trash"></i></button>
									</div>
								</div>
							<?php endforeach ?>
						<?php }else{ ?>
							<div class="row">
								<div class="alert alert-secondary col-12 text-center" role="alert">Tidak ada data yang tersedia!</div>
							</div>
						<?php } ?>
					</div>
				</div>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <embed src="" id="framefile" width="100%" height="750px"></embed>
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
          <p id="ket">Keterangan</p>
          <input class="form-control" type="hidden" id="nama_sko" name="nama_sko">
          <input class="form-control" type="hidden" id="file_sko" name="file_sko">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
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
        $("#filesModal #framefile").attr('src',"<?php echo base_url() ?>assets/file/pdf/sk_organisasi/"+file);
    });

</script>