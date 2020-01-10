<div class="card shadow border-primary">
	<div class="card-header shadow-sm bg-primary text-white">
		Pencatatan Perubahan
		<button class="btn shadow-sm btn-sm btn-circle btn-primary float-right ml-2" title="Formulir Pencatatan Perubahan" data-toggle="modal" data-target="#formulirModal"><i class="fa fa-fw fa-file"></i></button>
		<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
			<button class="btn shadow-sm btn-sm btn-circle btn-primary float-right" title="Tambah Catatan Perubahan" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-fw fa-plus"></i></button>
		<?php } ?>
	</div>
	<div class="card-body table-responsive">
		<table class="table shadow-sm table-sm table-bordered table-hover table-striped m-0" id="DataTables" width="100%">
			<thead class="bg-primary text-white text-center">
				<tr>
					<th class="align-middle" width="3%">NO</th>
					<th class="align-middle">KODE</th>
					<th class="align-middle">TANGGAL PERUBAHAN</th>
					<th class="align-middle">NAMA PEMOHON</th>
					<th class="align-middle">INSTANSI</th>
					<th class="align-middle">DESKRIPSI PERUBAHAN</th>
					<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
						<th class="align-middle" width="7%">OPSI</th>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php if($perubahan){ ?>
					<?php $no=1; foreach ($perubahan as $ubah): ?>
					<?php
						date_default_timezone_set('Asia/Makassar');
		        $tgl = substr($ubah['tgl_permohonanperubahan'], 8, 2);
		        $bln = substr($ubah['tgl_permohonanperubahan'], 5, 2);
		        $thn = substr($ubah['tgl_permohonanperubahan'], 0, 4);

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

		        $tgl_permohonanperubahan = $tgl.' '.$bulan.' '.$thn;
					?>
						<tr class="text-center">
							<td class="align-middle"><?=$no++  ?></td>
							<td class="align-middle"><?=$ubah['id_perubahan']  ?></td>
							<td class="align-middle"><?=$tgl_permohonanperubahan  ?></td>
							<td class="align-middle"><?=$ubah['nama_pemohon']  ?><br><small><?=$ubah['kontak_pemohon']  ?></small></td>
							<td class="align-middle"><?=$ubah['instansi_pemohon']  ?></td>
							<td class="align-middle"><?=$ubah['deskripsi_perubahan']  ?></td>
							<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
								<td class="align-middle">
									<?php if($ubah['status_perubahan']=='Tercatat'){ ?>
										<a href="<?=base_url('perubahan/form/evaluasi/').$ubah['id_perubahan'] ?>" class="btn shadow-sm btn-sm btn-circle btn-warning" title="Evaluasi"><i class="fa fa-fw fa-pencil-alt"></i></a>
										<button type="button" class="btn shadow-sm btn-sm btn-circle btn-info" id="ubah_permohonan" title="Ubah Data Permohonan" data-toggle="modal" data-target="#ubah_permohonanModal" data-id="<?=$ubah['id_perubahan']  ?>" data-tglpermohonan="<?=$ubah['tgl_permohonanperubahan']  ?>" data-namapemohon="<?=$ubah['nama_pemohon']  ?>" data-kontakpemohon="<?=$ubah['kontak_pemohon']  ?>" data-instansipemohon="<?=$ubah['instansi_pemohon']  ?>" data-deskripsiperubahan="<?=$ubah['deskripsi_perubahan']  ?>" data-tglberlaku="<?=$ubah['tgl_berlakuperubahan']  ?>" data-mtperubahan="<?=$ubah['mt_perubahan']  ?>"><i class="fa fa-fw fa-edit"></i></button>
										<button type="button" class="btn shadow-sm btn-sm btn-circle btn-danger" id="hapus" title="Hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$ubah['id_perubahan'] ?>"><i class="fa fa-fw fa-trash"></i></button>
									<?php }else if($ubah['status_perubahan']=='Evaluasi'){ ?>
										<a href="<?=base_url('perubahan/form/persetujuan/').$ubah['id_perubahan'] ?>" class="btn shadow-sm btn-sm btn-circle btn-success" title="Persetujuan"><i class="fa fa-fw fa-pencil-alt"></i></a>
										<a href="<?=base_url('perubahan/form/ubah_evaluasi/').$ubah['id_perubahan'] ?>" class="btn shadow-sm btn-sm btn-circle btn-info" title="Ubah Data Evaluasi"><i class="fa fa-fw fa-edit"></i></a>
									<?php }else if($ubah['status_perubahan']=='Persetujuan'){ ?>
										<a href="<?=base_url('perubahan/form/implementasi/').$ubah['id_perubahan'] ?>" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Implementasi"><i class="fa fa-fw fa-paper-plane"></i></a>
										<a href="<?=base_url('perubahan/form/ubah_persetujuan/').$ubah['id_perubahan'] ?>" class="btn shadow-sm btn-sm btn-circle btn-info" id="ubah_persetujuan" title="Ubah Data Persetujuan"><i class="fa fa-fw fa-edit"></i></a>
									<?php }else if($ubah['status_perubahan']=='Implementasi'){ ?>
										<a href="<?=base_url('perubahan/form/data_perubahan/').$ubah['id_perubahan'] ?>" class="btn shadow-sm btn-sm btn-circle btn-secondary" title="Lihat" target="_blank"><i class="fa fa-fw fa-eye"></i></a>
										<a href="<?=base_url('perubahan/form/ubah_implementasi/').$ubah['id_perubahan'] ?>" class="btn shadow-sm btn-sm btn-circle btn-info" id="ubah_implementasi" title="Ubah Data Implementasi"><i class="fa fa-fw fa-edit"></i></a>
									<?php } ?>
								</td>
							<?php } ?>
						</tr>
					<?php endforeach ?>
				<?php }else{ ?>
					<tr>
						<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
							<td class="align-middle text-center" colspan="7">Tidak ada data yang tersedia!</td>
						<?php }else{ ?>
							<td class="align-middle text-center" colspan="6">Tidak ada data yang tersedia!</td>
						<?php } ?>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalTitle">Pencatatan Perubahan</h5>
      </div>
      <form action="<?=base_url('perubahan/form/tambah') ?>" method="post">
	      <div class="modal-body">
	        <div class="form-group row">
				    <label for="id_perubahan" class="col-sm-3 col-form-label">Kode Perubahan</label>
				    <div class="col-sm-3">
				      <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id_perubahan" name="id_perubahan" value="UB<?=time() ?>">
				    </div>
				    <label for="tgl_permohonanperubahan" class="col-sm-3 col-form-label text-right">Tanggal Permohonan</label>
				    <div class="col-sm-3">
				      <input type="date" class="form-control shadow-sm font-weight-bold" id="tgl_permohonanperubahan" name="tgl_permohonanperubahan" value="<?=date('Y-m-d', time()) ?>" required>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="nama_pemohon" class="col-sm-3 col-form-label">Nama Pemohon</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control shadow-sm font-weight-bold" id="nama_pemohon" name="nama_pemohon" placeholder="Nama Pemohon" required>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="kontak_pemohon" class="col-sm-3 col-form-label">Kontak Pemohon</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control shadow-sm font-weight-bold" id="kontak_pemohon" name="kontak_pemohon" placeholder="Kontak Pemohon" required>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="instansi_pemohon" class="col-sm-3 col-form-label">Instansi Pemohon</label>
				    <div class="col-sm-9">
				      <textarea class="form-control shadow-sm font-weight-bold" id="instansi_pemohon" name="instansi_pemohon" placeholder="Instansi Pemohon ..." required></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="deskripsi_perubahan" class="col-sm-3 col-form-label">Deskripsi Perubahan</label>
				    <div class="col-sm-9">
				      <textarea class="form-control shadow-sm font-weight-bold" id="deskripsi_perubahan" name="deskripsi_perubahan" placeholder="Deskripsi Perubahan ..." required></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="tgl_berlakuperubahan" class="col-sm-3 col-form-label">Tanggal Berlaku</label>
				    <div class="col-sm-9">
				      <input type="date" class="form-control shadow-sm font-weight-bold" id="tgl_berlakuperubahan" name="tgl_berlakuperubahan" value="<?=date('Y-m-d', time()) ?>" required>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="mt_perubahan" class="col-sm-3 col-form-label">Maksud dan Tujuan Perubahan</label>
				    <div class="col-sm-9">
				      <textarea class="form-control shadow-sm font-weight-bold" id="mt_perubahan" name="mt_perubahan" placeholder="Maksud dan Tujuan Perubahan ..." required></textarea>
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Tutup"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah Permohonan -->
<div class="modal fade" id="ubah_permohonanModal" tabindex="-1" role="dialog" aria-labelledby="ubah_permohonanModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubah_permohonanModalTitle">Pencatatan Perubahan</h5>
      </div>
      <form id="form_ubah_permohonan" action="" method="post">
	      <div class="modal-body">
	        <div class="form-group row">
				    <label for="id_perubahan" class="col-sm-3 col-form-label">Kode Perubahan</label>
				    <div class="col-sm-3">
				      <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id_perubahan" name="id_perubahan">
				    </div>
				    <label for="tgl_permohonanperubahan" class="col-sm-3 col-form-label text-right">Tanggal Permohonan</label>
				    <div class="col-sm-3">
				      <input type="date" class="form-control shadow-sm font-weight-bold" id="tgl_permohonanperubahan" name="tgl_permohonanperubahan" required>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="nama_pemohon" class="col-sm-3 col-form-label">Nama Pemohon</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control shadow-sm font-weight-bold" id="nama_pemohon" name="nama_pemohon" placeholder="Nama Pemohon" required>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="kontak_pemohon" class="col-sm-3 col-form-label">Kontak Pemohon</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control shadow-sm font-weight-bold" id="kontak_pemohon" name="kontak_pemohon" placeholder="Kontak Pemohon" required>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="instansi_pemohon" class="col-sm-3 col-form-label">Instansi Pemohon</label>
				    <div class="col-sm-9">
				      <textarea class="form-control shadow-sm font-weight-bold" id="instansi_pemohon" name="instansi_pemohon" placeholder="Instansi Pemohon ..." required></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="deskripsi_perubahan" class="col-sm-3 col-form-label">Deskripsi Perubahan</label>
				    <div class="col-sm-9">
				      <textarea class="form-control shadow-sm font-weight-bold" id="deskripsi_perubahan" name="deskripsi_perubahan" placeholder="Deskripsi Perubahan ..." required></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="tgl_berlakuperubahan" class="col-sm-3 col-form-label">Tanggal Berlaku</label>
				    <div class="col-sm-9">
				      <input type="date" class="form-control shadow-sm font-weight-bold" id="tgl_berlakuperubahan" name="tgl_berlakuperubahan" required>
				    </div>
				  </div>
				  <div class="form-group row">
				  	<label for="mt_perubahan" class="col-sm-3 col-form-label">Maksud dan Tujuan Perubahan</label>
				    <div class="col-sm-9">
				      <textarea class="form-control shadow-sm font-weight-bold" id="mt_perubahan" name="mt_perubahan" placeholder="Maksud dan Tujuan Perubahan ..." required></textarea>
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Tutup"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Formulir -->
<div class="modal fade" id="formulirModal" tabindex="-1" role="dialog" aria-labelledby="formulirModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formulirModalTitle">Formulir Pencatatan Perubahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <embed class="embed-responsive-item" src="<?=base_url('uploads/pdf/perubahan/form_perubahan.pdf') ?>" allowfullscreen width="100%" height="750px"></embed>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalTitle">Hapus Permohonan Perubahan</h5>
      </div>
      <form id="formhapusperubahan" action="" method="post">
	      <div class="modal-body">
		        <p id="ketperubahan" class="text-center">keterangan</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Tutup"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

	$(document).on("click", "#ubah_permohonan", function() {
      var id = $(this).data('id');
      var tglpermohonan = $(this).data('tglpermohonan');
      var namapemohon = $(this).data('namapemohon');
      var kontakpemohon = $(this).data('kontakpemohon');
      var instansipemohon = $(this).data('instansipemohon');
      var deskripsiperubahan = $(this).data('deskripsiperubahan');
      var tglberlaku = $(this).data('tglberlaku');
      var mtperubahan = $(this).data('mtperubahan');
      $("#ubah_permohonanModal #id_perubahan").val(id);
      $("#ubah_permohonanModal #tgl_permohonanperubahan").val(tglpermohonan);
      $("#ubah_permohonanModal #nama_pemohon").val(namapemohon);
      $("#ubah_permohonanModal #kontak_pemohon").val(kontakpemohon);
      $("#ubah_permohonanModal #instansi_pemohon").val(instansipemohon);
      $("#ubah_permohonanModal #deskripsi_perubahan").val(deskripsiperubahan);
      $("#ubah_permohonanModal #tgl_berlakuperubahan").val(tglberlaku);
      $("#ubah_permohonanModal #mt_perubahan").val(mtperubahan);
      $("#ubah_permohonanModal #form_ubah_permohonan").attr('action', '<?php echo base_url() ?>perubahan/form/ubah_permohonan/'+id);
  });

  $(document).on("click", "#hapus", function() {
      var id = $(this).data('id');
      $("#hapusModal #ketperubahan").html("Hapus Permohonan Perubahan <strong>"+id+"</strong>?");
      $("#hapusModal #formhapusperubahan").attr('action', '<?php echo base_url() ?>perubahan/form/hapus/'+id);
  });

</script>