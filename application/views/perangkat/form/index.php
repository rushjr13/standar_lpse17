<div class="card border-primary shadow">
	<div class="card-header bg-primary text-white">
		Pencatatan Penggunaan Fasilitas & Akses Ruang Server
		<button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#formperangkatModal" title="Formulir Pencatatan Penggunaan Fasilitas & Akses Ruang Server"><i class="fa fa-fw fa-file"></i></button>
		<?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
			<a href="<?=base_url('perangkat/form/cetak') ?>" class="btn btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Pencatatan Penggunaan Fasilitas & Akses Ruang Server"><i class="fa fa-fw fa-print"></i></a>
			<button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahModal" title="Tambah Pencatatan Penggunaan Fasilitas & Akses Ruang Server"><i class="fa fa-fw fa-plus"></i></button>
		<?php } ?>
	</div>
	<div class="card-body">
		<table class="table table-sm table-bordered table-striped table-hover m-0" width="100%" id="dataTable" cellspacing="0">
			<thead class="bg-secondary text-white text-center">
				<tr>
					<th class="align-middle" colspan="2">NO</th>
					<th class="align-middle" rowspan="2">NAMA LENGKAP</th>
					<th class="align-middle" rowspan="2">INSTANSI</th>
					<th class="align-middle" rowspan="2">ALAMAT</th>
					<th class="align-middle" rowspan="2">JENIS PERIJINAN</th>
					<th class="align-middle" rowspan="2" width="7%">OPSI</th>
				</tr>
				<tr>
					<th class="align-middle" width="3%">URUT</th>
					<th class="align-middle" width="5%">BADGE</th>
				</tr>
			</thead>
			<tbody>
				<?php if($perangkat){ ?>
					<?php $no=1; foreach ($perangkat as $prkt): ?>
						<tr>
							<td class="align-middle text-center"><?=$no++ ?></td>
							<td class="align-middle text-center"><?=$prkt['no_badge'] ?></td>
							<td class="align-middle text-center"><?=$prkt['nama'] ?><br><small><?=$prkt['jenis_identitas'] ?> : <?=$prkt['identitas'] ?></small></td>
							<td class="align-middle"><?=$prkt['instansi'] ?></td>
							<td class="align-middle"><?=$prkt['alamat'] ?></td>
							<td class="align-middle text-center" width="15%"><?=$prkt['nama_jenis_perangkat'] ?></td>
							<td class="align-middle text-center">
								<button class="btn btn-sm btn-circle btn-warning"><i class="fa fa-fw fa-pencil-alt"></i></button>
								<button class="btn btn-sm btn-circle btn-info"><i class="fa fa-fw fa-edit"></i></button>
								<button class="btn btn-sm btn-circle btn-danger"><i class="fa fa-fw fa-trash"></i></button>
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
				    <div class="col-sm-2">
				      <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id_ijin_perangkat" name="id_ijin_perangkat" value="IP<?=time() ?>">
				    </div>
				    <label for="no_badge" class="col-sm-1 col-form-label text-right">No.Badge</label>
				    <div class="col-sm-2">
				      <input type="text" class="form-control shadow-sm font-weight-bold text-center" maxlength="6" id="no_badge" name="no_badge" placeholder="LPSE01" required>
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
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
	        <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Tangani -->
<div class="modal fade" id="tanganiModal" tabindex="-1" role="dialog" aria-labelledby="tanganiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tanganiModalLabel">Tangani Penggunaan Fasilitas & Akses Ruang Server</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form id="formtangani" action="<?=base_url('perangkat/form/tangani/') ?>" method="post">
	      <div class="modal-body">
	      	<h6 class="font-weight-bold">PENGGUNA</h6>
	        <div class="row">
	        	<div class="col-sm-2">No. Tiket</div>
	        	<div class="col-sm-10 font-weight-bold" id="nomortiket">NOMOR TIKET</div>
	        	<input type="hidden" id="id_perangkat" name="id_perangkat">
	        </div>
	        <div class="row">
	        	<div class="col-sm-2">Nama Pengguna</div>
	        	<div class="col-sm-10 font-weight-bold" id="nama_pengguna">NAMA PENGGUNA</div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-2">Tanggal Pelaporan</div>
	        	<div class="col-sm-10 font-weight-bold" id="tgl_pelaporan">TANGGAL PELAPORAN</div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-2">Deskripsi</div>
	        	<div class="col-sm-10 font-weight-bold text-wrap" id="deskripsi_perangkat">DESKRIPSI</div>
	        </div>
	        <hr>
	        <div class="form-group row">
				    <label for="petugas_penanganan" class="col-sm-2 col-form-label">Nama Petugas</label>
				    <div class="col-sm-6">
				      <input type="text" class="form-control font-weight-bold" id="petugas_penanganan" name="petugas_penanganan" placeholder="Nama Petugas" required>
				    </div>
				    <label for="tgl_penanganan" class="col-sm-1 col-form-label text-right">Tanggal</label>
				    <div class="col-sm-3">
				      <input type="date" class="form-control font-weight-bold" id="tgl_penanganan" name="tgl_penanganan" value="<?=date('Y-m-d', time()) ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="ket_penanganan" class="col-sm-2 col-form-label">Keterangan</label>
				    <div class="col-sm-6">
				      <textarea class="form-control font-weight-bold" id="ket_penanganan" name="ket_penanganan" rows="3" required></textarea>
				    </div>
				    <label for="status_penanganan" class="col-sm-1 col-form-label text-right">Status</label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control font-weight-bold" id="status_penanganan" name="status_penanganan" placeholder="Status Penanganan">
				    </div>
				  </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
	        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-fw fa-save"></i> Tangani</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Selesaikan -->
<div class="modal fade" id="selesaikanModal" tabindex="-1" role="dialog" aria-labelledby="selesaikanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="selesaikanModalLabel">Selesaikan Penggunaan Fasilitas & Akses Ruang Server</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form id="formselesaikan" action="<?=base_url('perangkat/form/selesaikan/') ?>" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
	      	<h6 class="font-weight-bold">PENGGUNA</h6>
	        <div class="row">
	        	<div class="col-sm-2">No. Tiket</div>
	        	<div class="col-sm-10 font-weight-bold" id="nomortiket">NOMOR TIKET</div>
	        	<input type="hidden" id="id_perangkat" name="id_perangkat">
	        </div>
	        <div class="row">
	        	<div class="col-sm-2">Nama Pengguna</div>
	        	<div class="col-sm-10 font-weight-bold" id="nama_pengguna">NAMA PENGGUNA</div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-2">Tanggal Pelaporan</div>
	        	<div class="col-sm-10 font-weight-bold" id="tgl_pelaporan">TANGGAL PELAPORAN</div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-2">Deskripsi</div>
	        	<div class="col-sm-10 font-weight-bold text-wrap" id="deskripsi_perangkat">DESKRIPSI</div>
	        </div>
	        <hr>
	        <h6 class="font-weight-bold">PENANGANAN</h6>
	        <div class="row">
	        	<div class="col-sm-2">Nama Petugas</div>
	        	<div class="col-sm-10 font-weight-bold" id="petugas_penanganan">nama_petugas</div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-2">Tanggal</div>
	        	<div class="col-sm-10 font-weight-bold" id="tgl_penanganan">tgl_penanganan</div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-2">Keterangan</div>
	        	<div class="col-sm-10 font-weight-bold" id="ket_penanganan">ket_penanganan</div>
	        </div>
	        <div class="row">
	        	<div class="col-sm-2">Status</div>
	        	<div class="col-sm-10 font-weight-bold text-wrap" id="status_penanganan">status_penanganan</div>
	        </div>
	        <hr>
	        <div class="row">
	        	<div class="col-sm-7">
			        <div class="form-group row">
						    <label for="solusi_penyelesaian" class="col-sm-2 col-form-label">Solusi</label>
						    <div class="col-sm-10">
						      <textarea class="form-control font-weight-bold" id="solusi_penyelesaian" name="solusi_penyelesaian" rows="4" required></textarea>
						    </div>
						  </div>
	        	</div>
	        	<div class="col-sm-5">
			        <div class="form-group row">
						    <label for="tgl_penyelesaian" class="col-sm-6 col-form-label text-right">Tanggal</label>
						    <div class="col-sm-6">
						      <input type="date" class="form-control font-weight-bold" id="tgl_penyelesaian" name="tgl_penyelesaian" value="<?=date('Y-m-d', time()) ?>">
						    </div>
	        		</div>
	        		<div class="form-group row">
						    <label for="status_konfirmasi" class="col-sm-6 col-form-label text-right">Status Konfirmasi Pengguna</label>
						    <div class="col-sm-6">
						      <select class="form-control font-weight-bold" id="status_konfirmasi" name="status_konfirmasi" required>
							      <option value="">-- Pilih --</option>
							      <option value="Telah Diinformasikan">Telah Diinformasikan</option>
							      <option value="Belum Diinformasikan">Belum Diinformasikan</option>
							    </select>
						    </div>
	        		</div>
	        	</div>
	        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
	        <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-fw fa-save"></i> Selesaikan</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Klasifikasi -->
<div class="modal fade" id="klasifikasiModal" tabindex="-1" role="dialog" aria-labelledby="klasifikasiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="klasifikasiModalLabel">Klasifikasi Gangguan/Permasalahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-sm-2">No. Tiket</div>
        	<div class="col-sm-10 font-weight-bold" id="nomortiket">NOMOR TIKET</div>
        </div>
        <div class="row">
        	<div class="col-sm-2">Nama Pengguna</div>
        	<div class="col-sm-10 font-weight-bold" id="namapengguna">NAMA PENGGUNA</div>
        </div>
        <div class="row">
        	<div class="col-sm-2">Tanggal Pelaporan</div>
        	<div class="col-sm-10 font-weight-bold" id="tglpelaporan">TANGGAL PELAPORAN</div>
        </div>
        <div class="row">
        	<div class="col-sm-2">Deskripsi</div>
        	<div class="col-sm-10 font-weight-bold text-wrap" id="deskripsiperangkat">DESKRIPSI</div>
        </div>
        <div class="table-responsive mt-3">
        	<table class="table table-sm table-bordered" width="100%" cellspacing="0">
        		<thead class="bg-secondary text-white text-center small">
        			<tr>
        				<th>TIPE<br><small>Gangguan (G), Masalah (M), Permintaan Layanan (PL)</small></th>
        				<th>KATEGORI<br><small>Teknis (T), Non Teknis (NT)</small></th>
        				<th>USER<br><small>Panitia (Pt), Penyedia (Py), PPK, Auditor (Aud), Publik (Pub), Lainnya (L)</small></th>
        				<th>JENIS<br><small>Hardware (Hw), Software (Sw), Prosedur (Ps), Lain-lain (L)</small></th>
        				<th>URGENSI<br><small>Mendesak (M), Tidak Mendesak (TM)</small></th>
        				<th>DAMPAK<br><small>Besar (B), Sedang (S), Kecil (K)</small></th>
        				<th>PRIORITAS<br><small>Tinggi (T), Menengah (M), Rendah (R)</small></th>
        			</tr>
        		</thead>
        		<tbody class="text-center font-weight-bold">
        			<tr>
        				<td class="align-middle" id="tipeperangkat">tipe</td>
        				<td class="align-middle" id="kategoriperangkat">kategori</td>
        				<td class="align-middle" id="userperangkat">user</td>
        				<td class="align-middle" id="jenisperangkat">jenis</td>
        				<td class="align-middle" id="urgensiperangkat">urgensi</td>
        				<td class="align-middle" id="dampakperangkat">dampak</td>
        				<td class="align-middle" id="prioritasperangkat">prioritas</td>
        			</tr>
        		</tbody>
        	</table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Formulir Gangguan -->
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

    $(document).on("click", "#klasifikasi", function() {
        var nomortiket = $(this).data('nomortiket');
        var namapengguna = $(this).data('namapengguna');
        var tglpelaporan = $(this).data('tglpelaporan');
        var deskripsiperangkat = $(this).data('deskripsiperangkat');
        var tipeperangkat = $(this).data('tipeperangkat');
        var kategoriperangkat = $(this).data('kategoriperangkat');
        var userperangkat = $(this).data('userperangkat');
        var jenisperangkat = $(this).data('jenisperangkat');
        var urgensiperangkat = $(this).data('urgensiperangkat');
        var dampakperangkat = $(this).data('dampakperangkat');
        var prioritasperangkat = $(this).data('prioritasperangkat');
        $("#klasifikasiModal #nomortiket").html(nomortiket);
        $("#klasifikasiModal #namapengguna").html(namapengguna);
        $("#klasifikasiModal #tglpelaporan").html(tglpelaporan);
        $("#klasifikasiModal #deskripsiperangkat").html(deskripsiperangkat);
        $("#klasifikasiModal #tipeperangkat").html(tipeperangkat);
        $("#klasifikasiModal #kategoriperangkat").html(kategoriperangkat);
        $("#klasifikasiModal #userperangkat").html(userperangkat);
        $("#klasifikasiModal #jenisperangkat").html(jenisperangkat);
        $("#klasifikasiModal #urgensiperangkat").html(urgensiperangkat);
        $("#klasifikasiModal #dampakperangkat").html(dampakperangkat);
        $("#klasifikasiModal #prioritasperangkat").html(prioritasperangkat);
    });

    $(document).on("click", "#tangani", function() {
        var id_perangkat = $(this).data('id_perangkat');
        var nama_pengguna = $(this).data('nama_pengguna');
        var tgl_pelaporan = $(this).data('tgl_pelaporan');
        var deskripsi_perangkat = $(this).data('deskripsi_perangkat');
        $("#tanganiModal #nomortiket").html(id_perangkat);
        $("#tanganiModal #id_perangkat").val(id_perangkat);
        $("#tanganiModal #nama_pengguna").html(nama_pengguna);
        $("#tanganiModal #tgl_pelaporan").html(tgl_pelaporan);
        $("#tanganiModal #deskripsi_perangkat").html(deskripsi_perangkat);
        $("#tanganiModal #formtangani").attr('action', '<?php echo base_url() ?>perangkat/form/tangani/'+id_perangkat);
    });

    $(document).on("click", "#selesaikan", function() {
        var id_perangkat = $(this).data('id_perangkat');
        var nama_pengguna = $(this).data('nama_pengguna');
        var tgl_pelaporan = $(this).data('tgl_pelaporan');
        var deskripsi_perangkat = $(this).data('deskripsi_perangkat');
        var petugas_penanganan = $(this).data('petugas_penanganan');
        var status_penanganan = $(this).data('status_penanganan');
        var ket_penanganan = $(this).data('ket_penanganan');
        var tgl_penanganan = $(this).data('tgl_penanganan');
        $("#selesaikanModal #nomortiket").html(id_perangkat);
        $("#selesaikanModal #id_perangkat").val(id_perangkat);
        $("#selesaikanModal #nama_pengguna").html(nama_pengguna);
        $("#selesaikanModal #tgl_pelaporan").html(tgl_pelaporan);
        $("#selesaikanModal #deskripsi_perangkat").html(deskripsi_perangkat);
        $("#selesaikanModal #petugas_penanganan").html(petugas_penanganan);
        $("#selesaikanModal #status_penanganan").html(status_penanganan);
        $("#selesaikanModal #ket_penanganan").html(ket_penanganan);
        $("#selesaikanModal #tgl_penanganan").html(tgl_penanganan);
        $("#selesaikanModal #formselesaikan").attr('action', '<?php echo base_url() ?>perangkat/form/selesaikan/'+id_perangkat);
    });

</script>