<div class="card border-primary shadow">
	<div class="card-header bg-primary text-white">
		Pencatatan Gangguan/Permasalahan dan Permintaan Layanan
		<button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#formgangguanModal" title="Formulir Pencatatan Gangguan/Permasalahan dan Permintaan Layanan"><i class="fa fa-fw fa-file"></i></button>
		<a href="<?=base_url('gangguan/form/cetak') ?>" class="btn btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Pencatatan Gangguan/Permasalahan dan Permintaan Layanan"><i class="fa fa-fw fa-print"></i></a>
		<button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahModal" title="Tambah Pencatatan Gangguan/Permasalahan dan Permintaan Layanan"><i class="fa fa-fw fa-plus"></i></button>
	</div>
	<div class="card-body">
		<table class="table table-sm table-bordered table-striped table-hover m-0" width="100%" id="dataTable" cellspacing="0">
			<thead>
				<tr class="bg-dark text-center text-white small">
					<th rowspan="2" class="align-middle">NO. TIKET</th>
					<th colspan="4" class="align-middle">INFORMASI PELAPORAN</th>
					<th rowspan="2" class="align-middle">DESKRIPSI</th>
					<th rowspan="2" class="align-middle">OPSI</th>
				</tr>
				<tr class="bg-dark text-center text-white small">
					<th rowspan="3" class="align-middle">NAMA PENGGUNA</th>
					<th rowspan="3" class="align-middle">KONTAK PENGGUNA</th>
					<th rowspan="3" class="align-middle">MEDIA PELAPORAN<br><small>(E-Mail, Telepon, SMS, Surat, Lainnya)</small></th>
					<th rowspan="3" class="align-middle">TANGGAL PELAPORAN</th>
					<!-- <th class="align-middle">TIPE</th>
					<th class="align-middle">KATEGORI</th>
					<th class="align-middle">USER</th>
					<th class="align-middle">JENIS</th>
					<th class="align-middle">URGENSI</th>
					<th class="align-middle">DAMPAK</th>
					<th class="align-middle">PRIORITAS</th> -->
					<!-- <th rowspan="3" class="align-middle">NAMA PETUGAS</th>
					<th rowspan="3" class="align-middle">STATUS</th>
					<th rowspan="3" class="align-middle">KETERANGAN</th>
					<th rowspan="3" class="align-middle">TANGGAL PEMUTAKHIRAN</th>
					<th rowspan="3" class="align-middle">SOLUSI</th>
					<th rowspan="3" class="align-middle">TANGGAL PENYELESAIAN</th>
					<th rowspan="3" class="align-middle">STATUS KONFIRMASI KEPADA PENGGUNA</th> -->
				</tr>
				<!-- <tr class="bg-dark text-center text-white small">
					<th class="align-middle small">Gangguan, Masalah, Permintaan Layanan</th>
					<th class="align-middle small">Teknis, Non Teknis</th>
					<th class="align-middle small">Panitia, Penyedia, PPK, Auditor, Publik, Lainnya</th>
					<th class="align-middle small">Hardware, Software, Prosedur, Lain-lain</th>
					<th class="align-middle small">Mendesak, Tidak Mendesak</th>
					<th class="align-middle small">Besar, Sedang, Kecil</th>
					<th class="align-middle small">Tinggi, Menengah, Rendah</th>
				</tr>
				<tr class="bg-dark text-center text-white small">
					<th class="align-middle small">G, M, PL</th>
					<th class="align-middle small">T, NT</th>
					<th class="align-middle small">Pt, Py, PPK, Aud, Pub, L</th>
					<th class="align-middle small">Hw, Sw, Ps, L</th>
					<th class="align-middle small">M, TM</th>
					<th class="align-middle small">B, S, K</th>
					<th class="align-middle small">T, M, R</th>
				</tr> -->
			</thead>
			<tbody>
				<?php foreach ($gangguan as $gg): ?>
					<?php
						date_default_timezone_set('Asia/Makassar');
		        $tgl_lapor = substr($gg['tgl_pelaporan'], 8, 2);
		        $bln_lapor = substr($gg['tgl_pelaporan'], 5, 2);
		        $thn_lapor = substr($gg['tgl_pelaporan'], 0, 4);

		        if($bln_lapor=='01'){
		            $bulan_lapor='Januari';
		        } else if($bln_lapor=='02'){
		            $bulan_lapor='Februari';
		        } else if($bln_lapor=='03'){
		            $bulan_lapor='Maret';
		        } else if($bln_lapor=='04'){
		            $bulan_lapor='April';
		        } else if($bln_lapor=='05'){
		            $bulan_lapor='Mei';
		        } else if($bln_lapor=='06'){
		            $bulan_lapor='Juni';
		        } else if($bln_lapor=='07'){
		            $bulan_lapor='Juli';
		        } else if($bln_lapor=='08'){
		            $bulan_lapor='Agustus';
		        } else if($bln_lapor=='09'){
		            $bulan_lapor='September';
		        } else if($bln_lapor=='10'){
		            $bulan_lapor='Oktober';
		        } else if($bln_lapor=='11'){
		            $bulan_lapor='November';
		        } else if($bln_lapor=='12'){
		            $bulan_lapor='Desember';
		        }

		        $tgl_pelaporan = $tgl_lapor.' '.$bulan_lapor.' '.$thn_lapor;
					?>
					<tr class="text-center">
						<td class="align-middle"><?=$gg['id_gangguan'] ?></td>
						<td class="align-middle"><?=$gg['nama_pengguna'] ?></td>
						<td class="align-middle"><?=$gg['kontak_pengguna'] ?></td>
						<td class="align-middle"><?=$gg['media_pelaporan'] ?></td>
						<td class="align-middle"><?=$tgl_pelaporan ?></td>
						<td class="align-middle"><?=$gg['deskripsi_gangguan'] ?></td>
						<td class="align-middle">
							<button class="btn btn-sm rounded-circle btn-secondary" title="Klasifikasi" id="klasifikasi" data-toggle="modal" data-target="#klasifikasiModal" data-nomortiket="<?=$gg['id_gangguan'] ?>" data-namapengguna="<?=$gg['nama_pengguna'] ?>" data-tglpelaporan="<?=$tgl_pelaporan ?>" data-deskripsigangguan="<?=$gg['deskripsi_gangguan'] ?>" data-tipegangguan="<?=$gg['nama_tipe']." (".$gg['kode_tipe'].")" ?>" data-kategorigangguan="<?=$gg['nama_kategori']." (".$gg['kode_kategori'].")" ?>" data-usergangguan="<?=$gg['nama_user']." (".$gg['kode_user'].")" ?>" data-jenisgangguan="<?=$gg['nama_jenis']." (".$gg['kode_jenis'].")" ?>" data-urgensigangguan="<?=$gg['nama_urgensi']." (".$gg['kode_urgensi'].")" ?>" data-dampakgangguan="<?=$gg['nama_dampak']." (".$gg['kode_dampak'].")" ?>" data-prioritasgangguan="<?=$gg['nama_prioritas']." (".$gg['kode_prioritas'].")" ?>"><i class="fa fa-fw fa-list"></i></button>
							<?php if($gg['status_gangguan']=='Tercatat'){ ?>
								<button class="btn btn-sm rounded-circle btn-warning" title="Tangani" data-toggle="modal" data-target="#tanganiModal"><i class="fa fa-fw fa-paper-plane"></i></button>
							<?php }else if($gg['status_gangguan']=='Penanganan'){ ?>
								<button class="btn btn-sm rounded-circle btn-info" title="Selesaikan"><i class="fa fa-fw fa-paper-plane"></i></button>
							<?php }else{ ?>
								<a href="<?=base_url('gangguan/form/cetak/').$gg['id_gangguan'] ?>" class="btn btn-sm rounded-circle btn-success" title="Rincian"><i class="fa fa-fw fa-eye"></i></button>
							<?php } ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Pencatatan Gangguan/Permasalahan dan Permintaan Layanan</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form action="<?=base_url('gangguan/form/tambah/') ?>" method="post">
	      <div class="modal-body">
	        <div class="form-group row">
				    <label for="id_gangguan" class="col-sm-2 col-form-label">No. Tiket</label>
				    <div class="col-sm-10">
				      <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id_gangguan" name="id_gangguan" value="GG<?=time() ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nama_pengguna" class="col-sm-2 col-form-label">Nama Pengguna</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control font-weight-bold" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna" required>
				    </div>
				    <label for="kontak_pengguna" class="col-sm-2 col-form-label text-right">Kontak Pengguna</label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control font-weight-bold" id="kontak_pengguna" name="kontak_pengguna" placeholder="Kontak Pengguna">
				      <small class="ml-2 mt-0 small text-primary"><small><em>No. Telepon / HP / E-Mail / dll</em></small></small>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="media_pelaporan" class="col-sm-2 col-form-label">Media Pelaporan</label>
				    <div class="col-sm-5">
				     <select class="form-control font-weight-bold" id="media_pelaporan" name="media_pelaporan" required>
					      <option value="">-- Pilih Media Pelaporan --</option>
					      <option value="E-Mail">E-Mail</option>
					      <option value="Telepon">Telepon</option>
					      <option value="SMS">SMS</option>
					      <option value="Surat">Surat</option>
					      <option value="Lainnya">Lainnya</option>
					    </select>
				    </div>
				    <label for="tgl_pelaporan" class="col-sm-2 col-form-label text-right">Tanggal Pelaporan</label>
				    <div class="col-sm-3">
				      <input type="date" class="form-control font-weight-bold" id="tgl_pelaporan" name="tgl_pelaporan" value="<?=date('Y-m-d', time()) ?>" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="deskripsi_gangguan" class="col-sm-2 col-form-label">Deskripsi</label>
				    <div class="col-sm-10">
				      <textarea class="form-control font-weight-bold" id="deskripsi_gangguan" name="deskripsi_gangguan" rows="3" required></textarea>
				    </div>
				  </div>
				  <hr>
			    <div class="text-center font-weight-bold mb-2 h6">K L A S I F I K A S I</div>
				  <div class="form-group row">
				    <div class="col-sm-3">
				     <select class="form-control font-weight-bold" id="id_tipe" name="id_tipe" required>
					      <option value="">-- Tipe Gangguan --</option>
					      <?php foreach ($gangguan_tipe as $gt): ?>
						      <option value="<?=$gt['id_tipe'] ?>"><?=$gt['nama_tipe'] ?> (<?=$gt['kode_tipe'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				    <div class="col-sm-3">
				     <select class="form-control font-weight-bold" id="id_kategori" name="id_kategori" required>
					      <option value="">-- Kategori Gangguan --</option>
					      <?php foreach ($gangguan_kategori as $gk): ?>
						      <option value="<?=$gk['id_kategori'] ?>"><?=$gk['nama_kategori'] ?> (<?=$gk['kode_kategori'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				    <div class="col-sm-3">
				     <select class="form-control font-weight-bold" id="id_user" name="id_user" required>
					      <option value="">-- User --</option>
					      <?php foreach ($gangguan_user as $gus): ?>
						      <option value="<?=$gus['id_user'] ?>"><?=$gus['nama_user'] ?> (<?=$gus['kode_user'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				    <div class="col-sm-3">
				     <select class="form-control font-weight-bold" id="id_jenis" name="id_jenis" required>
					      <option value="">-- Jenis Gangguan --</option>
					      <?php foreach ($gangguan_jenis as $gj): ?>
						      <option value="<?=$gj['id_jenis'] ?>"><?=$gj['nama_jenis'] ?> (<?=$gj['kode_jenis'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-4">
				     <select class="form-control font-weight-bold" id="id_urgensi" name="id_urgensi" required>
					      <option value="">-- Urgensi Gangguan --</option>
					      <?php foreach ($gangguan_urgensi as $gur): ?>
						      <option value="<?=$gur['id_urgensi'] ?>"><?=$gur['nama_urgensi'] ?> (<?=$gur['kode_urgensi'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				    <div class="col-sm-4">
				     <select class="form-control font-weight-bold" id="id_dampak" name="id_dampak" required>
					      <option value="">-- Dampak Gangguan --</option>
					      <?php foreach ($gangguan_dampak as $gd): ?>
						      <option value="<?=$gd['id_dampak'] ?>"><?=$gd['nama_dampak'] ?> (<?=$gd['kode_dampak'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				    <div class="col-sm-4">
				     <select class="form-control font-weight-bold" id="id_prioritas" name="id_prioritas" required>
					      <option value="">-- Prioritas Gangguan --</option>
					      <?php foreach ($gangguan_prioritas as $gp): ?>
						      <option value="<?=$gp['id_prioritas'] ?>"><?=$gp['nama_prioritas'] ?> (<?=$gp['kode_prioritas'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				  </div>
				  <hr>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
	        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-save"></i> Simpan</button>
	      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tanganiModal" tabindex="-1" role="dialog" aria-labelledby="tanganiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tanganiModalLabel">Pencatatan Gangguan/Permasalahan dan Permintaan Layanan</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <form action="<?=base_url('gangguan/form/tambah/') ?>" method="post">
	      <div class="modal-body">
	        <div class="form-group row">
				    <label for="id_gangguan" class="col-sm-2 col-form-label">No. Tiket</label>
				    <div class="col-sm-10">
				      <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id_gangguan" name="id_gangguan" value="GG<?=time() ?>">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="nama_pengguna" class="col-sm-2 col-form-label">Nama Pengguna</label>
				    <div class="col-sm-5">
				      <input type="text" class="form-control font-weight-bold" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Pengguna" required>
				    </div>
				    <label for="kontak_pengguna" class="col-sm-2 col-form-label text-right">Kontak Pengguna</label>
				    <div class="col-sm-3">
				      <input type="text" class="form-control font-weight-bold" id="kontak_pengguna" name="kontak_pengguna" placeholder="Kontak Pengguna">
				      <small class="ml-2 mt-0 small text-primary"><small><em>No. Telepon / HP / E-Mail / dll</em></small></small>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="media_pelaporan" class="col-sm-2 col-form-label">Media Pelaporan</label>
				    <div class="col-sm-5">
				     <select class="form-control font-weight-bold" id="media_pelaporan" name="media_pelaporan" required>
					      <option value="">-- Pilih Media Pelaporan --</option>
					      <option value="E-Mail">E-Mail</option>
					      <option value="Telepon">Telepon</option>
					      <option value="SMS">SMS</option>
					      <option value="Surat">Surat</option>
					      <option value="Lainnya">Lainnya</option>
					    </select>
				    </div>
				    <label for="tgl_pelaporan" class="col-sm-2 col-form-label text-right">Tanggal Pelaporan</label>
				    <div class="col-sm-3">
				      <input type="date" class="form-control font-weight-bold" id="tgl_pelaporan" name="tgl_pelaporan" value="<?=date('Y-m-d', time()) ?>" required>
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="deskripsi_gangguan" class="col-sm-2 col-form-label">Deskripsi</label>
				    <div class="col-sm-10">
				      <textarea class="form-control font-weight-bold" id="deskripsi_gangguan" name="deskripsi_gangguan" rows="3" required></textarea>
				    </div>
				  </div>
				  <hr>
			    <div class="text-center font-weight-bold mb-2 h6">K L A S I F I K A S I</div>
				  <div class="form-group row">
				    <div class="col-sm-3">
				     <select class="form-control font-weight-bold" id="id_tipe" name="id_tipe" required>
					      <option value="">-- Tipe Gangguan --</option>
					      <?php foreach ($gangguan_tipe as $gt): ?>
						      <option value="<?=$gt['id_tipe'] ?>"><?=$gt['nama_tipe'] ?> (<?=$gt['kode_tipe'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				    <div class="col-sm-3">
				     <select class="form-control font-weight-bold" id="id_kategori" name="id_kategori" required>
					      <option value="">-- Kategori Gangguan --</option>
					      <?php foreach ($gangguan_kategori as $gk): ?>
						      <option value="<?=$gk['id_kategori'] ?>"><?=$gk['nama_kategori'] ?> (<?=$gk['kode_kategori'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				    <div class="col-sm-3">
				     <select class="form-control font-weight-bold" id="id_user" name="id_user" required>
					      <option value="">-- User --</option>
					      <?php foreach ($gangguan_user as $gus): ?>
						      <option value="<?=$gus['id_user'] ?>"><?=$gus['nama_user'] ?> (<?=$gus['kode_user'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				    <div class="col-sm-3">
				     <select class="form-control font-weight-bold" id="id_jenis" name="id_jenis" required>
					      <option value="">-- Jenis Gangguan --</option>
					      <?php foreach ($gangguan_jenis as $gj): ?>
						      <option value="<?=$gj['id_jenis'] ?>"><?=$gj['nama_jenis'] ?> (<?=$gj['kode_jenis'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-4">
				     <select class="form-control font-weight-bold" id="id_urgensi" name="id_urgensi" required>
					      <option value="">-- Urgensi Gangguan --</option>
					      <?php foreach ($gangguan_urgensi as $gur): ?>
						      <option value="<?=$gur['id_urgensi'] ?>"><?=$gur['nama_urgensi'] ?> (<?=$gur['kode_urgensi'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				    <div class="col-sm-4">
				     <select class="form-control font-weight-bold" id="id_dampak" name="id_dampak" required>
					      <option value="">-- Dampak Gangguan --</option>
					      <?php foreach ($gangguan_dampak as $gd): ?>
						      <option value="<?=$gd['id_dampak'] ?>"><?=$gd['nama_dampak'] ?> (<?=$gd['kode_dampak'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				    <div class="col-sm-4">
				     <select class="form-control font-weight-bold" id="id_prioritas" name="id_prioritas" required>
					      <option value="">-- Prioritas Gangguan --</option>
					      <?php foreach ($gangguan_prioritas as $gp): ?>
						      <option value="<?=$gp['id_prioritas'] ?>"><?=$gp['nama_prioritas'] ?> (<?=$gp['kode_prioritas'] ?>)</option>
					      <?php endforeach ?>
					    </select>
				    </div>
				  </div>
				  <hr>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="fa fa-fw fa-times"></i> Batal</button>
	        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-fw fa-save"></i> Simpan</button>
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
        	<div class="col-sm-10 font-weight-bold text-wrap" id="deskripsigangguan">DESKRIPSI</div>
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
        				<td class="align-middle" id="tipegangguan">tipe</td>
        				<td class="align-middle" id="kategorigangguan">kategori</td>
        				<td class="align-middle" id="usergangguan">user</td>
        				<td class="align-middle" id="jenisgangguan">jenis</td>
        				<td class="align-middle" id="urgensigangguan">urgensi</td>
        				<td class="align-middle" id="dampakgangguan">dampak</td>
        				<td class="align-middle" id="prioritasgangguan">prioritas</td>
        			</tr>
        		</tbody>
        	</table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Formulir Gangguan -->
<div class="modal fade" id="formgangguanModal" tabindex="-1" role="dialog" aria-labelledby="formgangguanModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="formgangguanModalLabel">Formulir Pencatatan Gangguan/Permasalahan dan Permintaan Layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe src="<?=base_url('assets/file/pdf/gangguan/form_gangguan.pdf') ?>" width="100%" height="750"></iframe>
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
        var deskripsigangguan = $(this).data('deskripsigangguan');
        var tipegangguan = $(this).data('tipegangguan');
        var kategorigangguan = $(this).data('kategorigangguan');
        var usergangguan = $(this).data('usergangguan');
        var jenisgangguan = $(this).data('jenisgangguan');
        var urgensigangguan = $(this).data('urgensigangguan');
        var dampakgangguan = $(this).data('dampakgangguan');
        var prioritasgangguan = $(this).data('prioritasgangguan');
        $("#klasifikasiModal #nomortiket").html(nomortiket);
        $("#klasifikasiModal #namapengguna").html(namapengguna);
        $("#klasifikasiModal #tglpelaporan").html(tglpelaporan);
        $("#klasifikasiModal #deskripsigangguan").html(deskripsigangguan);
        $("#klasifikasiModal #tipegangguan").html(tipegangguan);
        $("#klasifikasiModal #kategorigangguan").html(kategorigangguan);
        $("#klasifikasiModal #usergangguan").html(usergangguan);
        $("#klasifikasiModal #jenisgangguan").html(jenisgangguan);
        $("#klasifikasiModal #urgensigangguan").html(urgensigangguan);
        $("#klasifikasiModal #dampakgangguan").html(dampakgangguan);
        $("#klasifikasiModal #prioritasgangguan").html(prioritasgangguan);
    });

</script>