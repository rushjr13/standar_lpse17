<div class="card border-primary shadow">
	<div class="card-header shadow-sm bg-primary text-white">
		Pencatatan Penggunaan Fasilitas & Akses Ruang Server
		<button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#formperangkatModal" title="Formulir Pencatatan Penggunaan Fasilitas & Akses Ruang Server"><i class="fa fa-fw fa-file"></i></button>
		<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
			<a href="<?=base_url('perangkat/form/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary mx-2 float-right" target="_blank" title="Cetak Pencatatan Penggunaan Fasilitas & Akses Ruang Server"><i class="fa fa-fw fa-print"></i></a>
			<button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahModal" title="Tambah Pencatatan Penggunaan Fasilitas & Akses Ruang Server"><i class="fa fa-fw fa-plus"></i></button>
		<?php } ?>
	</div>
	<div class="card-body table-responsive small">
		<table class="table shadow-sm table-sm table-bordered table-striped table-hover m-0" width="100%" id="dataTable" cellspacing="0">
			<thead class="bg-primary text-white text-center">
				<tr>
					<th class="align-middle" colspan="2">NOMOR</th>
					<th class="align-middle" rowspan="2">NAMA LENGKAP</th>
					<th class="align-middle" rowspan="2">INSTANSI</th>
					<th class="align-middle" rowspan="2">TUJUAN</th>
					<th class="align-middle" rowspan="2">JENIS PERIJINAN</th>
					<th class="align-middle" rowspan="2">OPSI</th>
				</tr>
				<tr>
					<th class="align-middle">URUT</th>
					<th class="align-middle">BADGE</th>
				</tr>
			</thead>
			<tbody>
				<?php if($perangkat){ ?>
					<?php $no=1; foreach ($perangkat as $prkt): ?>
						<tr>
							<td class="align-middle text-center" width="3%"><?=$no++ ?></td>
							<td class="align-middle text-center" width="5%"><?=$prkt['no_badge'] ?></td>
							<td class="align-middle text-center" width="17%"><strong><?=$prkt['nama'] ?></strong><br><small><?=$prkt['jenis_identitas'] ?> : <?=$prkt['identitas'] ?></small></td>
							<td class="align-middle" width="28%"><?=$prkt['instansi'] ?></td>
							<td class="align-middle" width="28%"><?=$prkt['tujuan'] ?></td>
							<td class="align-middle text-center" width="12%"><?=$prkt['nama_jenis_perangkat'] ?></td>
							<td class="align-middle text-center" width="7%">
								<?php if($prkt['status_ijin']=="Tunda"){ ?>
									<button class="btn shadow-sm btn-sm btn-circle btn-warning" id="persetujuan" title="Persetujuan" data-id="<?=$prkt['id_ijin_perangkat'] ?>" data-toggle="modal" data-target="#persetujuanModal"><i class="fa fa-fw fa-pencil-alt"></i></button>
									<a href="<?=base_url('perangkat/form/ubah/').$prkt['id_ijin_perangkat'] ?>" class="btn shadow-sm btn-sm btn-circle btn-info" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
									<button class="btn shadow-sm btn-sm btn-circle btn-danger" id="hapus" data-id="<?=$prkt['id_ijin_perangkat'] ?>" data-toggle="modal" data-target="#hapusModal" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
								<?php }else if($prkt['status_ijin']=="Setuju"){ ?>
									<a href="<?=base_url('perangkat/form/detail/').$prkt['id_ijin_perangkat'] ?>" class="btn shadow-sm btn-sm btn-circle btn-success" id="detail" title="Detail Perijinan"><i class="fa fa-fw fa-list"></i></a>
								<?php }else{ ?>
									<button class="btn shadow-sm btn-sm btn-circle btn-default" id="info" title="Info Perijinan" data-id="<?=$prkt['id_ijin_perangkat'] ?>" data-jenis="<?=$prkt['nama_jenis_perangkat'] ?>" data-nama="<?=$prkt['nama'] ?>" data-identitas="<?=$prkt['jenis_identitas'] ?> - <?=$prkt['identitas'] ?>" data-instansi="<?=$prkt['instansi'] ?>" data-alamat="<?=$prkt['alamat'] ?>" data-tujuan="<?=$prkt['tujuan'] ?>" data-status_ijin="<?=$prkt['status_ijin'] ?>" data-toggle="modal" data-target="#infoModal"><i class="fa fa-fw fa-info"></i></button>
								<?php } ?>
							</td>
						</tr>
					<?php endforeach ?>
				<?php }else{ ?>
					<tr class="text-center">
						<td colspan="8">Tidak ada yang yang tersedia!</td>
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
        <h5 class="modal-title" id="tambahModalLabel">Pencatatan Penggunaan Fasilitas & Akses Ruang Server</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form action="<?=base_url('perangkat/form/tambah/') ?>" method="post">
	      <div class="modal-body">
	        <div class="form-group row">
				    <label for="id_ijin_perangkat" class="col-sm-2 col-form-label">Nomor</label>
				    <div class="col-sm-5">
				      <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id_ijin_perangkat" name="id_ijin_perangkat" value="IP<?=time() ?>">
				    </div>
				    <label for="id_perangkat_jenis" class="col-sm-2 col-form-label text-right">Jenis Perijinan</label>
				    <div class="col-sm-3">
				      <select class="form-control shadow-sm font-weight-bold" id="id_perangkat_jenis" name="id_perangkat_jenis" required>
					      <option value="">-- Jenis Perijinan --</option>
					      <?php foreach ($perangkat_jenis as $pj): ?>
						      <option value="<?=$pj['id_perangkat_jenis'] ?>"><?=$pj['nama_jenis_perangkat'] ?></option>
					      <?php endforeach ?>
					    </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control shadow-sm font-weight-bold" id="nama" name="nama" placeholder="Nama Lengkap" required autofocus>
				    </div>
				    <label for="identitas" class="col-sm-1 col-form-label text-right">Identitas</label>
				    <div class="col-sm-1">
				      <select class="form-control shadow-sm font-weight-bold" id="jenis_identitas" name="jenis_identitas" required>
					      <option value="">--</option>
					      <option value="KTP">KTP</option>
					      <option value="SIM">SIM</option>
					      <option value="PASPOR">PASPOR</option>
					      <option value="Lainnya">Lainnya</option>
					    </select>
				    </div>
				    <div class="col-sm-3">
				      <input type="text" class="form-control shadow-sm font-weight-bold" id="identitas" name="identitas" placeholder="No. Identitas" required>
				      <small class="ml-2 mt-0 small text-primary"><small><em>KTP / SIM / PASPOR / dll</em></small></small>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="instansi" class="col-sm-2 col-form-label">Instansi</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control shadow-sm font-weight-bold" id="instansi" name="instansi" placeholder="Instansi" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
				    <div class="col-sm-10">
				    	<textarea rows="3" class="form-control shadow-sm font-weight-bold" id="alamat" name="alamat" placeholder="Alamat Lengkap ..." required></textarea>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="tujuan" class="col-sm-2 col-form-label">Tujuan</label>
				    <div class="col-sm-10">
				    	<textarea rows="3" class="form-control shadow-sm font-weight-bold" id="tujuan" name="tujuan" placeholder="Tujuan Perijinan ..." required></textarea>
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Persetujuan -->
<div class="modal fade" id="persetujuanModal" tabindex="-1" role="dialog" aria-labelledby="persetujuanModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="persetujuanModalLabel">Persetujuan</h5>
      </div>
      <form id="formpersetujuanModal" action="" method="post" >
	      <div class="modal-body">
				  <div class="form-group">
			      <select class="form-control shadow-sm font-weight-bold" id="status_ijin" name="status_ijin" required onchange="fungsiijin()">
				      <option value="">-- Pilih Status Persetujuan --</option>
				      <option value="Setuju">Setuju</option>
				      <option value="Tidak Setuju">Tidak Setuju</option>
				    </select>
				  </div>
				  <div class="form-group row mb-0" id="badge">
					  <label for="no_badge" class="col-sm-3 col-form-label">No.Badge</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control shadow-sm font-weight-bold text-center" maxlength="7" id="no_badge" name="no_badge" placeholder="LPSE01" required>
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Info -->
<div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="infoModalLabel">Informasi Ijin Penggunaan Perangkat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
			  <table class="table table-sm table-borderless" width="100%" cellspacing="0">
			  	<tbody>
			  		<tr>
			  			<td width="22%">ID Ijin Penggunaan</td>
			  			<td width="3%">:</td>
			  			<th id="id_ijin_perangkat"></th>
			  		</tr>
			  		<tr>
			  			<td>Jenis Perijinan</td>
			  			<td>:</td>
			  			<th id="jenis_perijinan"></th>
			  		</tr>
			  		<tr>
			  			<td>Nama</td>
			  			<td>:</td>
			  			<th id="nama"></th>
			  		</tr>
			  		<tr>
			  			<td>Identitas</td>
			  			<td>:</td>
			  			<th id="identitas"></th>
			  		</tr>
			  		<tr>
			  			<td>Instansi</td>
			  			<td>:</td>
			  			<th id="instansi"></th>
			  		</tr>
			  		<tr>
			  			<td>Alamat</td>
			  			<td>:</td>
			  			<th id="alamat"></th>
			  		</tr>
			  		<tr>
			  			<td>Tujuan Perijinan</td>
			  			<td>:</td>
			  			<th id="tujuan"></th>
			  		</tr>
			  		<tr>
			  			<td>Status Perijinan</td>
			  			<td>:</td>
			  			<th id="status_ijin"></th>
			  		</tr>
			  	</tbody>
			  </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Ijin Akses</h5>
      </div>
      <form id="formhapusModal" action="" method="post">
	      <div class="modal-body">
				  <input type="hidden" name="id_ijin_perangkat" id="id_ijin_perangkat">
				  <p id="ket" class="text-center">Anda yakin ingin menghapus permintaan ijin akses ini?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Formulir -->
<div class="modal fade" id="formperangkatModal" tabindex="-1" role="dialog" aria-labelledby="formperangkatModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formperangkatModalLabel">Formulir Pencatatan Penggunaan Fasilitas & Akses Ruang Server</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="<?=base_url('uploads/pdf/perangkat/form_ijin.pdf') ?>" width="100%" height="750"></iframe>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#persetujuan", function() {
        var id = $(this).data('id');
        $("#badge").hide();
        $("#no_badge").val('--');
        $("#persetujuanModal #formpersetujuanModal").attr('action', '<?php echo base_url() ?>perangkat/form/persetujuan/'+id);
    });

    function fungsiijin() {
		  var status = document.getElementById("status_ijin").value;
		  if(status=="Tidak Setuju"){
			  $("#no_badge").val('--');
			  $("#badge").hide();
		  }else if(status=="Setuju"){
			  $("#no_badge").val('');
			  $("#badge").show();
		  }
		}

		function validateFormpersetujuan() {
		  var no_badge = document.forms["formpersetujuanModal"]["no_badge"].value;
		  if (no_badge == "") {
		    alert("No. Badge Harus Diisi");
		    return false;
		  }
		}

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        $("#hapusModal #formhapusModal").attr('action', '<?php echo base_url() ?>perangkat/form/hapus/'+id);
    });

    $(document).on("click", "#info", function() {
        var id = $(this).data('id');
        var jenis = $(this).data('jenis');
        var nama = $(this).data('nama');
        var identitas = $(this).data('identitas');
        var instansi = $(this).data('instansi');
        var alamat = $(this).data('alamat');
        var tujuan = $(this).data('tujuan');
        var status_ijin = $(this).data('status_ijin');
        $("#infoModal #id_ijin_perangkat").html(id);
        $("#infoModal #jenis_perijinan").html(jenis);
        $("#infoModal #nama").html(nama);
        $("#infoModal #identitas").html(identitas);
        $("#infoModal #instansi").html(instansi);
        $("#infoModal #alamat").html(alamat);
        $("#infoModal #tujuan").html(tujuan);
        if(status_ijin=="Setuju"){
	        $("#infoModal #status_ijin").html('Diterima');
        }else{
	        $("#infoModal #status_ijin").html('Ditolak');
        }
    });

</script>