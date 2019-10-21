<div class="row">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
	      <a class="list-group-item list-group-item-action active" id="list-informasi-list" data-toggle="list" href="#list-informasi" role="tab" aria-controls="informasi">Informasi</a>
	      <a class="list-group-item list-group-item-action" id="list-sdm-list" data-toggle="list" href="#list-sdm" role="tab" aria-controls="sdm">Sumber Daya Manusia (SDM)</a>
	      <a class="list-group-item list-group-item-action" id="list-fisik-list" data-toggle="list" href="#list-fisik" role="tab" aria-controls="fisik">Fisik</a>
	      <a class="list-group-item list-group-item-action" id="list-software-list" data-toggle="list" href="#list-software" role="tab" aria-controls="software">Software</a>
	      <a class="list-group-item list-group-item-action" id="list-layanan-list" data-toggle="list" href="#list-layanan" role="tab" aria-controls="layanan">Layanan</a>
	      <a class="list-group-item list-group-item-action" id="list-intangible-list" data-toggle="list" href="#list-intangible" role="tab" aria-controls="intangible">Intangible</a>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">
    	<!-- INFORMASI -->
      <div class="tab-pane fade show active" id="list-informasi" role="tabpanel" aria-labelledby="list-informasi-list">
      	<div class="card shadow border-primary">
      		<div class="card-header bg-primary text-white">
      			Form Pencatatan Resiko Informasi
            <a href="<?=base_url('resiko/form/informasi/cetak') ?>" class="btn btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko Informasi"><i class="fa fa-fw fa-print"></i></a>
            <button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_informasiModal" title="Tambah Resiko Informasi"><i class="fa fa-fw fa-plus"></i></button>
      		</div>
      		<div class="card-body">
      			<?php include 'informasi/tabel.php'; ?>
      		</div>
      	</div>
      </div>

      <!-- SDM -->
      <div class="tab-pane fade show" id="list-sdm" role="tabpanel" aria-labelledby="list-sdm-list">
      	<div class="card shadow border-primary">
      		<div class="card-header bg-primary text-white">
      			Form Pencatatan Resiko Sumber Daya Manusia (SDM)
            <!-- <a href="<?=base_url('resiko/form/sdm/cetak') ?>" class="btn btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko SDM"><i class="fa fa-fw fa-print"></i></a>
            <button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_sdmModal" title="Tambah Resiko Sumber Daya Manusia (SDM)"><i class="fa fa-fw fa-plus"></i></button> -->
      		</div>
      		<div class="card-body">
            <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-dark text-white">
                <tr>
                  <th rowspan="2" class="align-middle text-center">NO</th>
                  <th rowspan="2" class="align-middle text-center">SUB KLASIFIKASI</th>
                  <th rowspan="2"class="align-middle text-center">DAMPAK</th>
                  <th rowspan="2"class="align-middle text-center">PENGANCAM</th>
                  <th colspan="3" class="align-middle text-center">IDENTIFIKASI RESIKO BAWAAN</th>
                  <th rowspan="2" class="align-middle text-center">OPSI</th>
                </tr>
                <tr>
                  <th class="align-middle text-center">KERENTANAN</th>
                  <th class="align-middle text-center">PAPARAN</th>
                  <th class="align-middle text-center">NILAI</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td colspan="8">Tidak Ada Data Yang Tersedia!</td>
                </tr>
              </tbody>
            </table>
      		</div>
      	</div>
      </div>

      <!-- FISIK -->
      <div class="tab-pane fade show" id="list-fisik" role="tabpanel" aria-labelledby="list-fisik-list">
      	<div class="card shadow border-primary">
      		<div class="card-header bg-primary text-white">
      			Form Pencatatan Resiko Fisik
            <!-- <a href="<?=base_url('resiko/form/fisik/cetak') ?>" class="btn btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko Fisik"><i class="fa fa-fw fa-print"></i></a>
            <a href="<?=base_url('resiko/form/fisik/tambah') ?>" class="btn btn-sm btn-circle btn-primary float-right" title="Tambah Resiko Fisik"><i class="fa fa-fw fa-plus"></i></a> -->
      		</div>
      		<div class="card-body">
      			<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-dark text-white">
                <tr>
                  <th rowspan="2" class="align-middle text-center">NO</th>
                  <th rowspan="2" class="align-middle text-center">SUB KLASIFIKASI</th>
                  <th rowspan="2"class="align-middle text-center">DAMPAK</th>
                  <th rowspan="2"class="align-middle text-center">PENGANCAM</th>
                  <th colspan="3" class="align-middle text-center">IDENTIFIKASI RESIKO BAWAAN</th>
                  <th rowspan="2" class="align-middle text-center">OPSI</th>
                </tr>
                <tr>
                  <th class="align-middle text-center">KERENTANAN</th>
                  <th class="align-middle text-center">PAPARAN</th>
                  <th class="align-middle text-center">NILAI</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td colspan="8">Tidak Ada Data Yang Tersedia!</td>
                </tr>
              </tbody>
            </table>
      		</div>
      	</div>
      </div>

      <!-- SOFTWARE -->
      <div class="tab-pane fade show" id="list-software" role="tabpanel" aria-labelledby="list-software-list">
      	<div class="card shadow border-primary">
      		<div class="card-header bg-primary text-white">
      			Form Pencatatan Resiko Software
            <!-- <a href="<?=base_url('resiko/form/software/cetak') ?>" class="btn btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko Perangkat Lunak (Software)"><i class="fa fa-fw fa-print"></i></a>
            <button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_softwareModal" title="Tambah Resiko Perangkat Lunak (Software)"><i class="fa fa-fw fa-plus"></i></button> -->
      		</div>
      		<div class="card-body">
      			<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-dark text-white">
                <tr>
                  <th rowspan="2" class="align-middle text-center">NO</th>
                  <th rowspan="2" class="align-middle text-center">SUB KLASIFIKASI</th>
                  <th rowspan="2"class="align-middle text-center">DAMPAK</th>
                  <th rowspan="2"class="align-middle text-center">PENGANCAM</th>
                  <th colspan="3" class="align-middle text-center">IDENTIFIKASI RESIKO BAWAAN</th>
                  <th rowspan="2" class="align-middle text-center">OPSI</th>
                </tr>
                <tr>
                  <th class="align-middle text-center">KERENTANAN</th>
                  <th class="align-middle text-center">PAPARAN</th>
                  <th class="align-middle text-center">NILAI</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td colspan="8">Tidak Ada Data Yang Tersedia!</td>
                </tr>
              </tbody>
            </table>
      		</div>
      	</div>
      </div>

      <!-- LAYANAN -->
      <div class="tab-pane fade show" id="list-layanan" role="tabpanel" aria-labelledby="list-layanan-list">
      	<div class="card shadow border-primary">
      		<div class="card-header bg-primary text-white">
      			Form Pencatatan Resiko Layanan
            <!-- <a href="<?=base_url('resiko/form/layanan/cetak') ?>" class="btn btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko Layanan"><i class="fa fa-fw fa-print"></i></a>
            <button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_layananModal" title="Tambah Resiko Layanan"><i class="fa fa-fw fa-plus"></i></button> -->
      		</div>
      		<div class="card-body">
      			<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-dark text-white">
                <tr>
                  <th rowspan="2" class="align-middle text-center">NO</th>
                  <th rowspan="2" class="align-middle text-center">SUB KLASIFIKASI</th>
                  <th rowspan="2"class="align-middle text-center">DAMPAK</th>
                  <th rowspan="2"class="align-middle text-center">PENGANCAM</th>
                  <th colspan="3" class="align-middle text-center">IDENTIFIKASI RESIKO BAWAAN</th>
                  <th rowspan="2" class="align-middle text-center">OPSI</th>
                </tr>
                <tr>
                  <th class="align-middle text-center">KERENTANAN</th>
                  <th class="align-middle text-center">PAPARAN</th>
                  <th class="align-middle text-center">NILAI</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td colspan="8">Tidak Ada Data Yang Tersedia!</td>
                </tr>
              </tbody>
            </table>
      		</div>
      	</div>
      </div>

      <!-- INTANGIBLE -->
      <div class="tab-pane fade show" id="list-intangible" role="tabpanel" aria-labelledby="list-intangible-list">
      	<div class="card shadow border-primary">
      		<div class="card-header bg-primary text-white">
      			Form Pencatatan Resiko Intagible
            <!-- <a href="<?=base_url('resiko/form/intangible/cetak') ?>" class="btn btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko Layanan"><i class="fa fa-fw fa-print"></i></a>
            <button type="button" class="btn btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_intangibleModal" title="Tambah Resiko Layanan"><i class="fa fa-fw fa-plus"></i></button> -->
      		</div>
      		<div class="card-body">
      			<table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-dark text-white">
                <tr>
                  <th rowspan="2" class="align-middle text-center">NO</th>
                  <th rowspan="2" class="align-middle text-center">SUB KLASIFIKASI</th>
                  <th rowspan="2"class="align-middle text-center">DAMPAK</th>
                  <th rowspan="2"class="align-middle text-center">PENGANCAM</th>
                  <th colspan="3" class="align-middle text-center">IDENTIFIKASI RESIKO BAWAAN</th>
                  <th rowspan="2" class="align-middle text-center">OPSI</th>
                </tr>
                <tr>
                  <th class="align-middle text-center">KERENTANAN</th>
                  <th class="align-middle text-center">PAPARAN</th>
                  <th class="align-middle text-center">NILAI</th>
                </tr>
              </thead>
              <tbody>
                <tr class="text-center">
                  <td colspan="8">Tidak Ada Data Yang Tersedia!</td>
                </tr>
              </tbody>
            </table>
      		</div>
      	</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Resiko Informasi -->
<div class="modal fade" id="tambahresiko_informasiModal" tabindex="-1" role="dialog" aria-labelledby="tambahresiko_informasiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahresiko_informasiModalLabel">Resiko Informasi</h5>
      </div>
      <form action="<?=base_url('resiko/form/informasi/tambah/') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode Resiko</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="RI<?=time() ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Klasifikasi</label>
            <div class="col-sm-10">
              <select class="custom-select" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Resiko</option>
                <?php foreach ($klasifikasi_informasi as $ki): ?>
                  <option value="<?=$ki['id_ki'] ?>"><?=$ki['kla_informasi'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Dampak</label>
            <div class="col-sm-10">
              <select class="custom-select" id="dampak" name="dampak" required>
                <option value="">Pilih Dampak</option>
                <?php foreach ($resiko_dampak as $rd): ?>
                  <option value="<?=$rd['nilai'] ?>"><?=$rd['nilai'] ?>. <?=$rd['ekonomi'] ?>, <?=$rd['reputasi'] ?>, <?=$rd['pidana'] ?>, <?=$rd['kinerja'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Pengancam</label>
            <div class="col-sm-10">
              <select class="custom-select" id="pengancam" name="pengancam" required>
                <option value="">Pilih Pengancam</option>
                <?php foreach ($resiko_pengancam as $rp): ?>
                  <option value="<?=$rp['nilai'] ?>"><?=$rp['nilai'] ?>. <?=$rp['profil_pengancam'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">IDENTIFIKASI RESIKO BAWAAN :</label>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kerentanan</label>
            <div class="col-sm-10">
              <select class="custom-select" id="kerentanan" name="kerentanan" required>
                <option value="">Pilih Tingkat Kerentanan</option>
                <?php foreach ($resiko_rentan as $rr): ?>
                  <option value="<?=$rr['nilai'] ?>"><?=$rr['nilai'] ?>. <?=$rr['tingkat_rentan'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Paparan</label>
            <div class="col-sm-10">
              <select class="custom-select" id="paparan" name="paparan" required>
                <option value="">Pilih Tingkat Paparan</option>
                <?php foreach ($resiko_paparan as $rpap): ?>
                  <option value="<?=$rpap['nilai'] ?>"><?=$rpap['nilai'] ?>. <?=$rpap['contoh_paparan'] ?></option>
                <?php endforeach ?>
              </select>
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

<!-- Modal Tambah Resiko SDM -->
<div class="modal fade" id="tambahresiko_sdmModal" tabindex="-1" role="dialog" aria-labelledby="tambahresiko_sdmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahresiko_sdmModalLabel">Resiko Sumber Daya Manusia (SDM)</h5>
      </div>
      <form action="<?=base_url('resiko/form/sdm/tambah/') ?>" method="post">
        <div class="modal-body">
          <label class="font-weight-bold">ASET SDM :</label>
          <div class="form-group row">
            <label for="id" class="col-md-6 col-form-label">Kode Resiko : <strong>SDM<?=time() ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="SDM<?=time() ?>">
            <div class="col-md-6">
              <select class="custom-select" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Resiko</option>
                <option value="Pegawai Tetap">Pegawai Tetap</option>
                <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                <option value="Pengambil Keputusan">Pengambil Keputusan</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pegawai" required>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="identitas" name="identitas" placeholder="No. Identitas / NIP" required>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">PEMILIK ASET :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control" id="pemilik_fungsi" name="pemilik_fungsi" placeholder="Fungsi" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="pemilik_subfungsi" name="pemilik_subfungsi" placeholder="Sub Fungsi" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="pemilik_unit" name="pemilik_unit" placeholder="Unit" required>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KEPEGAWAIAN :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="kontrak" name="kontrak" placeholder="No. Kontrak/NDA" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="atasan" name="atasan" placeholder="Atasan Langsung" required>
            </div>
            <div class="col-sm-10">
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-sm-4">
              <select class="custom-select" id="kerahasiaan" name="kerahasiaan" required>
                <option value="">Kerahasiaan</option>
                <?php foreach ($resiko_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>"><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select" id="integritas" name="integritas" required>
                <option value="">Integritas</option>
                <?php foreach ($resiko_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>"><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select" id="ketersediaan" name="ketersediaan" required>
                <option value="">Ketersediaan</option>
                <?php foreach ($resiko_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>"><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"></textarea>
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

<!-- Modal Tambah Resiko Software -->
<div class="modal fade" id="tambahresiko_softwareModal" tabindex="-1" role="dialog" aria-labelledby="tambahresiko_softwareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahresiko_softwareModalLabel">Resiko Perangkat Lunak (Software)</h5>
      </div>
      <form action="<?=base_url('resiko/form/software/tambah') ?>" method="post">
        <div class="modal-body">
          <label class="font-weight-bold">ASET SOFTWARE :</label>
          <div class="form-group row">
            <label for="id" class="col-md-12 col-form-label">Kode Resiko : <strong>SW<?=time() ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="SW<?=time() ?>">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Resiko" required>
            </div>
            <div class="col-md-6">
              <select class="custom-select" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Resiko</option>
                <option value="Operating System">Operating System</option>
                <option value="Application Server">Application Server</option>
                <option value="Application">Application</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">PEMILIK ASET :</label>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control" id="pemilik" name="pemilik" placeholder="Pemilik Resiko" required>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control" id="pemegang" name="pemegang" placeholder="Pemegang Resiko" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Resiko" required>
            </div>
            <div class="col-md-4">
              <input type="date" class="form-control" id="berlaku" name="berlaku" placeholder="Masa Berlaku" value="<?=date('Y-m-d') ?>" required>
            </div>
            <div class="col-md-4">
              <select class="custom-select" id="hapus" name="hapus" required>
                <option value="">Metode Penghapusan</option>
                <option value="Delete Normal">Delete Normal</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-sm-4">
              <select class="custom-select" id="kerahasiaan" name="kerahasiaan" required>
                <option value="">Kerahasiaan</option>
                <?php foreach ($resiko_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>"><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select" id="integritas" name="integritas" required>
                <option value="">Integritas</option>
                <?php foreach ($resiko_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>"><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select" id="ketersediaan" name="ketersediaan" required>
                <option value="">Ketersediaan</option>
                <?php foreach ($resiko_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>"><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"></textarea>
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

<!-- Modal Tambah Resiko Layanan -->
<div class="modal fade" id="tambahresiko_layananModal" tabindex="-1" role="dialog" aria-labelledby="tambahresiko_layananModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahresiko_layananModalLabel">Resiko Layanan</h5>
      </div>
      <form action="<?=base_url('resiko/form/layanan/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-md-12 col-form-label">Kode Resiko : <strong>LY<?=time() ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="LY<?=time() ?>">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Resiko" required>
            </div>
            <div class="col-md-6">
              <select class="custom-select" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Resiko</option>
                <option value="Jaringan Internet Khusus">Jaringan Internet Khusus</option>
                <option value="Jaringan Internet Umum">Jaringan Internet Umum</option>
                <option value="Jaringan Internet Load Balanced">Jaringan Internet Load Balanced</option>
                <option value="Jaringan Intranet Umum">Jaringan Intranet Umum</option>
                <option value="Jaringan Point to Point">Jaringan Point to Point</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">ASET :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control" id="pemilik" name="pemilik" placeholder="Pemilik Resiko" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="pemegang" name="pemegang" placeholder="Pemegang Resiko" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control" id="penyedia" name="penyedia" placeholder="Penyedia Resiko" required>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KONTRAK / SLA :</label>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control" id="nomor" name="nomor" placeholder="No. Kontrak / SLA" required>
            </div>
            <div class="col-md-6">
              <input type="date" class="form-control" id="berlaku" name="berlaku" placeholder="Masa Berlaku" value="<?=date('Y-m-d') ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Layanan" required></textarea>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-sm-4">
              <select class="custom-select" id="kerahasiaan" name="kerahasiaan" required>
                <option value="">Kerahasiaan</option>
                <?php foreach ($resiko_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>"><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select" id="integritas" name="integritas" required>
                <option value="">Integritas</option>
                <?php foreach ($resiko_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>"><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select" id="ketersediaan" name="ketersediaan" required>
                <option value="">Ketersediaan</option>
                <?php foreach ($resiko_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>"><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"></textarea>
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

<!-- Modal Tambah Resiko Integible -->
<div class="modal fade" id="tambahresiko_intangibleModal" tabindex="-1" role="dialog" aria-labelledby="tambahresiko_intangibleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahresiko_intangibleModalLabel">Resiko Integible</h5>
      </div>
      <form action="<?=base_url('resiko/form/intangible/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-md-12 col-form-label">Kode Resiko : <strong>IT<?=time() ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="IT<?=time() ?>">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Resiko" required>
            </div>
            <div class="col-md-6">
              <select class="custom-select" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Resiko</option>
                <option value="Layanan-Layanan">Layanan-Layanan</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <input type="text" class="form-control" id="pemilik" name="pemilik" placeholder="Pemilik Resiko" required>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-sm-4">
              <select class="custom-select" id="kerahasiaan" name="kerahasiaan" required>
                <option value="">Kerahasiaan</option>
                <?php foreach ($resiko_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>"><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select" id="integritas" name="integritas" required>
                <option value="">Integritas</option>
                <?php foreach ($resiko_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>"><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select" id="ketersediaan" name="ketersediaan" required>
                <option value="">Ketersediaan</option>
                <?php foreach ($resiko_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>"><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"></textarea>
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

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

     $(document).on("click", "#detailresikoinformasi", function() {
        var id = $(this).data('id');
        var klasifikasi = $(this).data('klasifikasi');
        var dampak = $(this).data('dampak');
        var ketdampak = $(this).data('ketdampak');
        var pengancam = $(this).data('pengancam');
        var tingkatpengancam = $(this).data('tingkatpengancam');
        var kerentanan = $(this).data('kerentanan');
        var tingkatrentan = $(this).data('tingkatrentan');
        var paparan = $(this).data('paparan');
        var tingkatpaparan = $(this).data('tingkatpaparan');
        var nilai = $(this).data('nilai');
        var jenisresiko = $(this).data('jenisresiko');
        $("#detailresikoinformasiModal #detailresikoinformasiModalLabel").html("Sub Klasifikasi : <span class='text-primary'>"+id+"</span> - "+klasifikasi);
        $("#detailresikoinformasiModal #ketdampak").html(ketdampak);
        $("#detailresikoinformasiModal #dampak").html(dampak);
        $("#detailresikoinformasiModal #tingkatpengancam").html(tingkatpengancam);
        $("#detailresikoinformasiModal #pengancam").html(pengancam);
        $("#detailresikoinformasiModal #tingkatrentan").html(tingkatrentan);
        $("#detailresikoinformasiModal #kerentanan").html(kerentanan);
        $("#detailresikoinformasiModal #tingkatpaparan").html(tingkatpaparan);
        $("#detailresikoinformasiModal #paparan").html(paparan);
        $("#detailresikoinformasiModal #jenisresiko").html(jenisresiko);
        $("#detailresikoinformasiModal #nilai").html(nilai);
        $("#detailresikoinformasiModal #sisatingkatrentan").html("-");
        $("#detailresikoinformasiModal #sisakerentanan").html("-");
        $("#detailresikoinformasiModal #sisatingkatpaparan").html("-");
        $("#detailresikoinformasiModal #sisapaparan").html("-");
        $("#detailresikoinformasiModal #sisajenisresiko").html("-");
        $("#detailresikoinformasiModal #sisanilai").html("-");
        $("#detailresikoinformasiModal #mitigasikontrol").html("-");
        $("#detailresikoinformasiModal #mitigasipic").html("-");
        $("#detailresikoinformasiModal #mitigasitarget").html("-");
    });

    $(document).on("click", "#hapusresikoinformasi", function() {
        var id = $(this).data('id');
        $("#hapusresikoinformasiModal #ket").html("Anda yakin ingin menghapus Resiko Informasi : <strong>"+id+"</strong> ?");
        $("#hapusresikoinformasiModal #formhapusresikoinformasi").attr("action","<?php echo base_url() ?>resiko/form/informasi/hapus/"+id);
    });

    $(document).on("click", "#hapusresikosdm", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusresikosdmModal #nama").val(nama);
        $("#hapusresikosdmModal #ket").html("Anda yakin ingin menghapus Resiko SDM a.n. <strong>"+nama+"</strong> ?");
        $("#hapusresikosdmModal #formhapusresikosdm").attr("action","<?php echo base_url() ?>resiko/form/sdm/hapus/"+id);
    });

    $(document).on("click", "#detailresikosdm", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var klasifikasi = $(this).data('klasifikasi');
        var identitas = $(this).data('identitas');
        var fungsi = $(this).data('fungsi');
        var subfungsi = $(this).data('subfungsi');
        var unit = $(this).data('unit');
        var jabatan = $(this).data('jabatan');
        var kontrak = $(this).data('kontrak');
        var atasan = $(this).data('atasan');
        var rahasia1 = $(this).data('rahasia1');
        var rahasia2 = $(this).data('rahasia2');
        var integritas1 = $(this).data('integritas1');
        var integritas2 = $(this).data('integritas2');
        var sedia1 = $(this).data('sedia1');
        var sedia2 = $(this).data('sedia2');
        var nilai1 = $(this).data('nilai1');
        var nilai2 = $(this).data('nilai2');
        var keterangan = $(this).data('keterangan');
        $("#detailresikosdmModal #kode").html(id);
        $("#detailresikosdmModal #nama").html(nama);
        $("#detailresikosdmModal #klasifikasi").html(klasifikasi);
        $("#detailresikosdmModal #identitas").html(identitas);
        $("#detailresikosdmModal #fungsi").html(fungsi);
        $("#detailresikosdmModal #subfungsi").html(subfungsi);
        $("#detailresikosdmModal #unit").html(unit);
        $("#detailresikosdmModal #jabatan").html(jabatan);
        $("#detailresikosdmModal #kontrak").html(kontrak);
        $("#detailresikosdmModal #atasan").html(atasan);
        $("#detailresikosdmModal #rahasia1").html(rahasia1);
        $("#detailresikosdmModal #rahasia2").html("("+rahasia2+")");
        $("#detailresikosdmModal #integritas1").html(integritas1);
        $("#detailresikosdmModal #integritas2").html("("+integritas2+")");
        $("#detailresikosdmModal #sedia1").html(sedia1);
        $("#detailresikosdmModal #sedia2").html("("+sedia2+")");
        $("#detailresikosdmModal #nilai1").html(nilai1);
        $("#detailresikosdmModal #nilai2").html("("+nilai2+")");
        $("#detailresikosdmModal #keterangan").html(keterangan);
    });

    $(document).on("click", "#hapusresikofisik", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusresikofisikModal #nama").val(nama);
        $("#hapusresikofisikModal #ket").html("Anda yakin ingin menghapus Resiko Fisik <strong>"+nama+"</strong> ?");
        $("#hapusresikofisikModal #formhapusresikofisik").attr("action","<?php echo base_url() ?>resiko/form/fisik/hapus/"+id);
    });

    $(document).on("click", "#detailresikofisik", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var klasifikasi = $(this).data('klasifikasi');
        var jenis = $(this).data('jenis');
        var spesifikasi = $(this).data('spesifikasi');
        var pemilik = $(this).data('pemilik');
        var penyedia = $(this).data('penyedia');
        var pemegang = $(this).data('pemegang');
        var lokasi = $(this).data('lokasi');
        var berlaku = $(this).data('berlaku');
        var rahasia1 = $(this).data('rahasia1');
        var rahasia2 = $(this).data('rahasia2');
        var integritas1 = $(this).data('integritas1');
        var integritas2 = $(this).data('integritas2');
        var sedia1 = $(this).data('sedia1');
        var sedia2 = $(this).data('sedia2');
        var nilai1 = $(this).data('nilai1');
        var nilai2 = $(this).data('nilai2');
        var keterangan = $(this).data('keterangan');
        $("#detailresikofisikModal #kode").html(id);
        $("#detailresikofisikModal #nama").html(nama);
        $("#detailresikofisikModal #klasifikasi").html(klasifikasi);
        $("#detailresikofisikModal #jenis").html(jenis);
        $("#detailresikofisikModal #spesifikasi").html(spesifikasi);
        $("#detailresikofisikModal #pemilik").html(pemilik);
        $("#detailresikofisikModal #penyedia").html(penyedia);
        $("#detailresikofisikModal #pemegang").html(pemegang);
        $("#detailresikofisikModal #lokasi").html(lokasi);
        $("#detailresikofisikModal #berlaku").html(berlaku);
        $("#detailresikofisikModal #rahasia1").html(rahasia1);
        $("#detailresikofisikModal #rahasia2").html("("+rahasia2+")");
        $("#detailresikofisikModal #integritas1").html(integritas1);
        $("#detailresikofisikModal #integritas2").html("("+integritas2+")");
        $("#detailresikofisikModal #sedia1").html(sedia1);
        $("#detailresikofisikModal #sedia2").html("("+sedia2+")");
        $("#detailresikofisikModal #nilai1").html(nilai1);
        $("#detailresikofisikModal #nilai2").html("("+nilai2+")");
        $("#detailresikofisikModal #keterangan").html(keterangan);
    });

    $(document).on("click", "#hapusresikosoftware", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusresikosoftwareModal #nama").val(nama);
        $("#hapusresikosoftwareModal #ket").html("Anda yakin ingin menghapus Resiko Software <strong>"+nama+"</strong> ?");
        $("#hapusresikosoftwareModal #formhapusresikosoftware").attr("action","<?php echo base_url() ?>resiko/form/software/hapus/"+id);
    });

    $(document).on("click", "#hapusresikolayanan", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusresikolayananModal #nama").val(nama);
        $("#hapusresikolayananModal #ket").html("Anda yakin ingin menghapus Resiko Layanan <strong>"+nama+"</strong> ?");
        $("#hapusresikolayananModal #formhapusresikolayanan").attr("action","<?php echo base_url() ?>resiko/form/layanan/hapus/"+id);
    });

    $(document).on("click", "#hapusresikointangible", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusresikointangibleModal #nama").val(nama);
        $("#hapusresikointangibleModal #ket").html("Anda yakin ingin menghapus Resiko Intangible <strong>"+nama+"</strong> ?");
        $("#hapusresikointangibleModal #formhapusresikointangible").attr("action","<?php echo base_url() ?>resiko/form/intangible/hapus/"+id);
    });

</script>