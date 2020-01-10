<div class="card shadow mb-4 border-primary">
	<div class="card-header bg-primary text-white">
		<i class="fas fa-fw fa-bullhorn"></i> Pengumuman
		<button type="button" class="btn btn-sm btn-circle btn-primary shadow-sm float-right" data-toggle="modal" data-target="#tambahModal" title="Buat Pengumuman"><i class="fa fa-fw fa-plus"></i></button>
	</div>
	<div class="card-body table-responsive">
		<table class="table shadow-sm table-sm table-bordered table-hover table-striped" id="dataTables" cellspacing="0" width="100%">
			<thead class="bg-primary text-white text-center">
				<tr>
					<th class="align-center" width="3%">NO</th>
					<th class="align-center" width="13%">TANGGAL</th>
					<th class="align-center">ISI PENGUMUMAN</th>
					<th class="align-center" width="7%">OPSI</th>
				</tr>
			</thead>
			<tbody>
				<?php if($pengumuman){ ?>
					<?php $no=1; foreach ($pengumuman as $png): ?>
						<?php
							$hari = date('l', $png['tgl_pengumuman']);
							$tgl = date('d', $png['tgl_pengumuman']);
			        $bln = date('F', $png['tgl_pengumuman']);
			        $thn = date('Y', $png['tgl_pengumuman']);

			        if($hari=='Sunday'){
			        	$hr='Minggu';
			        } else if($hari=='Monday'){
			        	$hr='Senin';
			        } else if($hari=='Tuesday'){
			        	$hr='Selasa';
			        } else if($hari=='Wednesday'){
			        	$hr='Rabu';
			        } else if($hari=='Thursday'){
			        	$hr='Kamis';
			        } else if($hari=='Friday'){
			        	$hr='Jumat';
			        } else if($hari=='Saturday'){
			        	$hr='Sabtu';
			        }

			        if($bln=='January'){
			            $bulan='Januari';
			        } else if($bln=='February'){
			            $bulan='Februari';
			        } else if($bln=='March'){
			            $bulan='Maret';
			        } else if($bln=='April'){
			            $bulan='April';
			        } else if($bln=='May'){
			            $bulan='Mei';
			        } else if($bln=='June'){
			            $bulan='Juni';
			        } else if($bln=='July'){
			            $bulan='Juli';
			        } else if($bln=='August'){
			            $bulan='Agustus';
			        } else if($bln=='September'){
			            $bulan='September';
			        } else if($bln=='October'){
			            $bulan='Oktober';
			        } else if($bln=='November'){
			            $bulan='November';
			        } else if($bln=='December'){
			            $bulan='Desember';
			        }

			        $tgl_pengumuman = $hr.', '.$tgl.' '.$bulan.' '.$thn;
						?>
						<tr>
							<td class="align-middle text-center"><?=$no++ ?></td>
							<td class="align-middle text-center"><?=$tgl_pengumuman ?></td>
							<td class="align-middle"><?=$png['isi_pengumuman'] ?></td>
							<td class="align-middle text-center">
								<?php if($png['status_pengumuman']==0){ ?>
									<button class="btn btn-sm btn-circle btn-warning shadow-sm" id="status" data-toggle="modal" data-target="#statusModal" data-id="<?=$png['id_pengumuman'] ?>" data-ket="Aktifkan" data-status="1" data-btn="success" data-icon="fa fa-fw fa-check" title="Aktifkan"><i class="fa fa-fw fa-power-off"></i></button>
								<?php }else{ ?>
									<button class="btn btn-sm btn-circle btn-success shadow-sm" id="status" data-toggle="modal" data-target="#statusModal" data-id="<?=$png['id_pengumuman'] ?>" data-ket="Non Aktifkan" data-status="0" data-btn="warning" data-icon="fa fa-fw fa-power-off" title="Non Aktifkan"><i class="fa fa-fw fa-check"></i></button>
								<?php } ?>
								<button class="btn btn-sm btn-circle btn-info shadow-sm" id="ubah" data-toggle="modal" data-target="#ubahModal" data-id="<?=$png['id_pengumuman'] ?>" data-isi="<?=$png['isi_pengumuman'] ?>" title="Ubah"><i class="fa fa-fw fa-edit"></i></button>
								<button class="btn btn-sm btn-circle btn-danger shadow-sm" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$png['id_pengumuman'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
							</td>
						</tr>
					<?php endforeach ?>
				<?php }else{ ?>
					<tr>
						<td class="align-middle text-center" colspan="4">Tidak ada pengumuman!</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Buat Pengumuman</h5>
      </div>
      <form action="<?=base_url('pengumuman/tambah') ?>" method="post">
	      <div class="modal-body">
	        <table class="table table-sm table-borderless" width="100%" cellspacing="0">
	        	<tbody>
	        		<?php
								$hari_ini = date('l', time());
								$tgl_ini = date('d', time());
				        $bln_ini = date('F', time());
				        $thn_ini = date('Y', time());

				        if($hari_ini=='Sunday'){
				        	$hr_ini='Minggu';
				        } else if($hari_ini=='Monday'){
				        	$hr_ini='Senin';
				        } else if($hari_ini=='Tuesday'){
				        	$hr_ini='Selasa';
				        } else if($hari_ini=='Wednesday'){
				        	$hr_ini='Rabu';
				        } else if($hari_ini=='Thursday'){
				        	$hr_ini='Kamis';
				        } else if($hari_ini=='Friday'){
				        	$hr_ini='Jumat';
				        } else if($hari_ini=='Saturday'){
				        	$hr_ini='Sabtu';
				        }

				        if($bln_ini=='January'){
				            $bulan='Januari';
				        } else if($bln_ini=='February'){
				            $bulan='Februari';
				        } else if($bln_ini=='March'){
				            $bulan='Maret';
				        } else if($bln_ini=='April'){
				            $bulan='April';
				        } else if($bln_ini=='May'){
				            $bulan='Mei';
				        } else if($bln_ini=='June'){
				            $bulan='Juni';
				        } else if($bln_ini=='July'){
				            $bulan='Juli';
				        } else if($bln_ini=='August'){
				            $bulan='Agustus';
				        } else if($bln_ini=='September'){
				            $bulan='September';
				        } else if($bln_ini=='October'){
				            $bulan='Oktober';
				        } else if($bln_ini=='November'){
				            $bulan='November';
				        } else if($bln_ini=='December'){
				            $bulan='Desember';
				        }

				        $tgl_hari_ini = $hr_ini.', '.$tgl_ini.' '.$bulan.' '.$thn_ini;
							?>
	        		<tr>
	        			<td class="align-middle" width="50%">Penulis : <span class="font-weight-bold"><?=$pengguna_masuk['nama_lengkap'] ?></span></td>
	        			<td class="align-middle text-right" width="50%">Tanggal : <span class="font-weight-bold"><?=$tgl_hari_ini ?></span></td>
	        		</tr>
	        	</tbody>
	        </table>
	        <input type="hidden" name="penulis" id="penulis" value="<?=$pengguna_masuk['nama_lengkap'] ?>">
	        <textarea rows="15" class="form-control shadow-sm" id="isi_pengumuman" name="isi_pengumuman" placeholder="Isi Pengumuman..." required></textarea>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-primary shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah -->
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahModalLabel">Buat Pengumuman</h5>
      </div>
      <form id="formubah" action="" method="post">
	      <div class="modal-body">
	        <table class="table table-sm table-borderless" width="100%" cellspacing="0">
	        	<tbody>
	        		<?php
								$hari_ini = date('l', time());
								$tgl_ini = date('d', time());
				        $bln_ini = date('F', time());
				        $thn_ini = date('Y', time());

				        if($hari_ini=='Sunday'){
				        	$hr_ini='Minggu';
				        } else if($hari_ini=='Monday'){
				        	$hr_ini='Senin';
				        } else if($hari_ini=='Tuesday'){
				        	$hr_ini='Selasa';
				        } else if($hari_ini=='Wednesday'){
				        	$hr_ini='Rabu';
				        } else if($hari_ini=='Thursday'){
				        	$hr_ini='Kamis';
				        } else if($hari_ini=='Friday'){
				        	$hr_ini='Jumat';
				        } else if($hari_ini=='Saturday'){
				        	$hr_ini='Sabtu';
				        }

				        if($bln_ini=='January'){
				            $bulan='Januari';
				        } else if($bln_ini=='February'){
				            $bulan='Februari';
				        } else if($bln_ini=='March'){
				            $bulan='Maret';
				        } else if($bln_ini=='April'){
				            $bulan='April';
				        } else if($bln_ini=='May'){
				            $bulan='Mei';
				        } else if($bln_ini=='June'){
				            $bulan='Juni';
				        } else if($bln_ini=='July'){
				            $bulan='Juli';
				        } else if($bln_ini=='August'){
				            $bulan='Agustus';
				        } else if($bln_ini=='September'){
				            $bulan='September';
				        } else if($bln_ini=='October'){
				            $bulan='Oktober';
				        } else if($bln_ini=='November'){
				            $bulan='November';
				        } else if($bln_ini=='December'){
				            $bulan='Desember';
				        }

				        $tgl_hari_ini = $hr_ini.', '.$tgl_ini.' '.$bulan.' '.$thn_ini;
							?>
	        		<tr>
	        			<td class="align-middle" width="50%">Penulis : <span class="font-weight-bold"><?=$pengguna_masuk['nama_lengkap'] ?></span></td>
	        			<td class="align-middle text-right" width="50%">Tanggal : <span class="font-weight-bold"><?=$tgl_hari_ini ?></span></td>
	        		</tr>
	        	</tbody>
	        </table>
	        <input type="hidden" name="penulis" id="penulis" value="<?=$pengguna_masuk['nama_lengkap'] ?>">
	        <textarea rows="15" class="form-control shadow-sm" id="isi_pengumuman" name="isi_pengumuman" placeholder="Isi Pengumuman ..." required></textarea>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-primary shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Status -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusModalLabel">Status Pengumuman</h5>
      </div>
      <form id="formstatus" action="" method="post">
	      <div class="modal-body text-center">
	      	<input type="hidden" id="id_pengumuman" name="id_pengumuman">
	      	<input type="hidden" id="status_pengumuman" name="status_pengumuman">
	      	<input type="hidden" id="ket_pengumuman" name="ket_pengumuman">
	      	<p id="ket">keterangan</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="" id="btnStatus"><i id="iconStatus" class=""></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Pengumuman</h5>
      </div>
      <form id="formhapus" action="" method="post">
	      <div class="modal-body text-center">
	      	<p id="ket">keterangan</p>
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

    $(document).on("click", "#status", function() {
        var id = $(this).data('id');
        var ket = $(this).data('ket');
        var status = $(this).data('status');
        var btn = $(this).data('btn');
        var icon = $(this).data('icon');
        $("#statusModal #id_pengumuman").val(id);
        $("#statusModal #ket_pengumuman").val(ket);
        $("#statusModal #status_pengumuman").val(status);
        $("#statusModal #btnStatus").addClass("btn btn-sm btn-circle shadow-sm btn-"+btn);
        $("#statusModal #btnStatus").attr("title",ket);
        $("#statusModal #iconStatus").addClass(icon);
        $("#statusModal #ket").html("Anda yakin ingin <strong>"+ket+"</strong> Pengumuman ini ?");
        $("#statusModal #formstatus").attr("action","<?php echo base_url() ?>pengumuman/status/"+id);
    });

    $(document).on("click", "#ubah", function() {
        var id = $(this).data('id');
        var isi = $(this).data('isi');
        $("#ubahModal #id_pengumuman").val(id);
        $("#ubahModal #isi_pengumuman").html(isi);
        $("#ubahModal #formubah").attr("action","<?php echo base_url() ?>pengumuman/ubah/"+id);
    });

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        $("#hapusModal #ket").html("Anda yakin ingin menghapus pengumuman ini?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>pengumuman/hapus/"+id);
    });


</script>