<div class="row">
  <div class="col-2">
    <div class="list-group" id="list-tab" role="tablist">
	      <a class="list-group-item shadow-sm list-group-item-action active" id="list-informasi-list" data-toggle="list" href="#list-informasi" role="tab" aria-controls="informasi">Informasi</a>
	      <a class="list-group-item shadow-sm list-group-item-action" id="list-sdm-list" data-toggle="list" href="#list-sdm" role="tab" aria-controls="sdm">Sumber Daya Manusia (SDM)</a>
	      <a class="list-group-item shadow-sm list-group-item-action" id="list-fisik-list" data-toggle="list" href="#list-fisik" role="tab" aria-controls="fisik">Fisik</a>
	      <a class="list-group-item shadow-sm list-group-item-action" id="list-software-list" data-toggle="list" href="#list-software" role="tab" aria-controls="software">Software</a>
	      <a class="list-group-item shadow-sm list-group-item-action" id="list-layanan-list" data-toggle="list" href="#list-layanan" role="tab" aria-controls="layanan">Layanan</a>
	      <a class="list-group-item shadow-sm list-group-item-action" id="list-intangible-list" data-toggle="list" href="#list-intangible" role="tab" aria-controls="intangible">Intangible</a>
    </div>
  </div>
  <div class="col-10">
    <div class="tab-content" id="nav-tabContent">
    	<!-- INFORMASI -->
      <div class="tab-pane fade show active" id="list-informasi" role="tabpanel" aria-labelledby="list-informasi-list">
      	<div class="card shadow border-primary">
      		<div class="card-header shadow-sm bg-primary text-white">
      			Form Pencatatan Aset Informasi
            <a href="<?=base_url('aset/form/informasi/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Aset Informasi"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahaset_informasiModal" title="Tambah Aset Informasi"><i class="fa fa-fw fa-plus"></i></button>
            <?php } ?>
      		</div>
      		<div class="card-body">
      			<?php include 'informasi/tabel.php'; ?>
      		</div>
      	</div>
      </div>

      <!-- SDM -->
      <div class="tab-pane fade show" id="list-sdm" role="tabpanel" aria-labelledby="list-sdm-list">
      	<div class="card shadow border-primary">
      		<div class="card-header shadow-sm bg-primary text-white">
      			Form Pencatatan Aset Sumber Daya Manusia (SDM)
            <a href="<?=base_url('aset/form/sdm/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Aset SDM"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahaset_sdmModal" title="Tambah Aset Sumber Daya Manusia (SDM)"><i class="fa fa-fw fa-plus"></i></button>
            <?php } ?>
      		</div>
      		<div class="card-body">
            <?php include 'sdm/tabel.php'; ?>
      		</div>
      	</div>
      </div>

      <!-- FISIK -->
      <div class="tab-pane fade show" id="list-fisik" role="tabpanel" aria-labelledby="list-fisik-list">
      	<div class="card shadow border-primary">
      		<div class="card-header shadow-sm bg-primary text-white">
      			Form Pencatatan Aset Fisik
            <a href="<?=base_url('aset/form/fisik/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Aset Fisik"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <a href="<?=base_url('aset/form/fisik/tambah') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" title="Tambah Aset Fisik"><i class="fa fa-fw fa-plus"></i></a>
            <?php } ?>
      		</div>
      		<div class="card-body">
      			<?php include 'fisik/tabel.php'; ?>
      		</div>
      	</div>
      </div>

      <!-- SOFTWARE -->
      <div class="tab-pane fade show" id="list-software" role="tabpanel" aria-labelledby="list-software-list">
      	<div class="card shadow border-primary">
      		<div class="card-header shadow-sm bg-primary text-white">
      			Form Pencatatan Aset Software
            <a href="<?=base_url('aset/form/software/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Aset Perangkat Lunak (Software)"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahaset_softwareModal" title="Tambah Aset Perangkat Lunak (Software)"><i class="fa fa-fw fa-plus"></i></button>
            <?php } ?>
      		</div>
      		<div class="card-body">
      			<?php include 'software/tabel.php'; ?>
      		</div>
      	</div>
      </div>

      <!-- LAYANAN -->
      <div class="tab-pane fade show" id="list-layanan" role="tabpanel" aria-labelledby="list-layanan-list">
      	<div class="card shadow border-primary">
      		<div class="card-header shadow-sm bg-primary text-white">
      			Form Pencatatan Aset Layanan
            <a href="<?=base_url('aset/form/layanan/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Aset Layanan"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahaset_layananModal" title="Tambah Aset Layanan"><i class="fa fa-fw fa-plus"></i></button>
            <?php } ?>
      		</div>
      		<div class="card-body">
      			<?php include 'layanan/tabel.php'; ?>
      		</div>
      	</div>
      </div>

      <!-- INTANGIBLE -->
      <div class="tab-pane fade show" id="list-intangible" role="tabpanel" aria-labelledby="list-intangible-list">
      	<div class="card shadow border-primary">
      		<div class="card-header shadow-sm bg-primary text-white">
      			Form Pencatatan Aset Intagible
            <a href="<?=base_url('aset/form/intangible/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Aset Layanan"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahaset_intangibleModal" title="Tambah Aset Layanan"><i class="fa fa-fw fa-plus"></i></button>
            <?php } ?>
      		</div>
      		<div class="card-body">
      			<?php include 'intangible/tabel.php'; ?>
      		</div>
      	</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Aset Informasi -->
<div class="modal fade" id="tambahaset_informasiModal" tabindex="-1" role="dialog" aria-labelledby="tambahaset_informasiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahaset_informasiModalLabel">Aset Informasi</h5>
      </div>
      <form action="<?=base_url('aset/form/informasi/tambah/') ?>" method="post">
        <div class="modal-body">
          <label class="font-weight-bold">ASET INFORMASI :</label>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode Aset</label>
            <div class="col-sm-4">
              <input type="text" readonly class="form-control-plaintext" id="id" name="id" value="i<?=time() ?>">
            </div>
            <label for="id" class="col-sm-2 col-form-label text-right">Klasifikasi</label>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Aset</option>
                <option value="Dokumen Tertulis Internal">Dokumen Tertulis Internal</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Aset</label>
            <div class="col-sm-10">
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Nama Aset" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="format" class="col-sm-2 col-form-label">Format Penyimpanan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control shadow-sm" id="format" name="format" placeholder="Format Penyimpanan" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="pemilik" class="col-sm-2 col-form-label">Pemilik Aset</label>
            <div class="col-sm-4">
              <input type="text" class="form-control shadow-sm" id="pemilik" name="pemilik" placeholder="Pemilik Aset" required>
            </div>
            <label for="berlaku" class="col-sm-2 col-form-label text-right">Masa Berlaku</label>
            <div class="col-sm-4">
              <input type="date" class="form-control shadow-sm" id="berlaku" name="berlaku" placeholder="Masa Berlaku" value="<?=date('Y-m-d') ?>" required>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="kerahasiaan" name="kerahasiaan" required>
                <option value="">Kerahasiaan</option>
                <?php foreach ($aset_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>"><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="integritas" name="integritas" required>
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>"><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="ketersediaan" name="ketersediaan" required>
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>"><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12">
              <textarea class="form-control shadow-sm" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"></textarea>
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

<!-- Modal Tambah Aset SDM -->
<div class="modal fade" id="tambahaset_sdmModal" tabindex="-1" role="dialog" aria-labelledby="tambahaset_sdmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahaset_sdmModalLabel">Aset Sumber Daya Manusia (SDM)</h5>
      </div>
      <form action="<?=base_url('aset/form/sdm/tambah/') ?>" method="post">
        <div class="modal-body">
          <label class="font-weight-bold">ASET SDM :</label>
          <div class="form-group row">
            <label for="id" class="col-md-6 col-form-label">Kode Aset : <strong>SDM<?=time() ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="SDM<?=time() ?>">
            <div class="col-md-6">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Aset</option>
                <option value="Pegawai Tetap">Pegawai Tetap</option>
                <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                <option value="Pengambil Keputusan">Pengambil Keputusan</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Nama Pegawai" required>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="identitas" name="identitas" placeholder="No. Identitas / NIP" required>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">PEMILIK ASET :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="pemilik_fungsi" name="pemilik_fungsi" placeholder="Fungsi" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="pemilik_subfungsi" name="pemilik_subfungsi" placeholder="Sub Fungsi" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="pemilik_unit" name="pemilik_unit" placeholder="Unit" required>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KEPEGAWAIAN :</label>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="jabatan" name="jabatan" placeholder="Jabatan" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="kontrak" name="kontrak" placeholder="No. Kontrak/NDA" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="atasan" name="atasan" placeholder="Atasan Langsung" required>
            </div>
            <div class="col-sm-10">
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="kerahasiaan" name="kerahasiaan" required>
                <option value="">Kerahasiaan</option>
                <?php foreach ($aset_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>"><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="integritas" name="integritas" required>
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>"><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="ketersediaan" name="ketersediaan" required>
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>"><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control shadow-sm" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"></textarea>
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

<!-- Modal Tambah Aset Software -->
<div class="modal fade" id="tambahaset_softwareModal" tabindex="-1" role="dialog" aria-labelledby="tambahaset_softwareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahaset_softwareModalLabel">Aset Perangkat Lunak (Software)</h5>
      </div>
      <form action="<?=base_url('aset/form/software/tambah') ?>" method="post">
        <div class="modal-body">
          <label class="font-weight-bold">ASET SOFTWARE :</label>
          <div class="form-group row">
            <label for="id" class="col-md-12 col-form-label">Kode Aset : <strong>SW<?=time() ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="SW<?=time() ?>">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Nama Aset" required>
            </div>
            <div class="col-md-6">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Aset</option>
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
              <input type="text" class="form-control shadow-sm" id="pemilik" name="pemilik" placeholder="Pemilik Aset" required>
            </div>
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="pemegang" name="pemegang" placeholder="Pemegang Aset" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="lokasi" name="lokasi" placeholder="Lokasi Aset" required>
            </div>
            <div class="col-md-4">
              <input type="date" class="form-control shadow-sm" id="berlaku" name="berlaku" placeholder="Masa Berlaku" value="<?=date('Y-m-d') ?>" required>
            </div>
            <div class="col-md-4">
              <select class="custom-select shadow-sm" id="hapus" name="hapus" required>
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
              <select class="custom-select shadow-sm" id="kerahasiaan" name="kerahasiaan" required>
                <option value="">Kerahasiaan</option>
                <?php foreach ($aset_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>"><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="integritas" name="integritas" required>
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>"><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="ketersediaan" name="ketersediaan" required>
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>"><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control shadow-sm" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"></textarea>
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

<!-- Modal Tambah Aset Layanan -->
<div class="modal fade" id="tambahaset_layananModal" tabindex="-1" role="dialog" aria-labelledby="tambahaset_layananModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahaset_layananModalLabel">Aset Layanan</h5>
      </div>
      <form action="<?=base_url('aset/form/layanan/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-md-12 col-form-label">Kode Aset : <strong>LY<?=time() ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="LY<?=time() ?>">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Nama Aset" required>
            </div>
            <div class="col-md-6">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Aset</option>
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
              <input type="text" class="form-control shadow-sm" id="pemilik" name="pemilik" placeholder="Pemilik Aset" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="pemegang" name="pemegang" placeholder="Pemegang Aset" required>
            </div>
            <div class="col-md-4">
              <input type="text" class="form-control shadow-sm" id="penyedia" name="penyedia" placeholder="Penyedia Aset" required>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KONTRAK / SLA :</label>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="nomor" name="nomor" placeholder="No. Kontrak / SLA" required>
            </div>
            <div class="col-md-6">
              <input type="date" class="form-control shadow-sm" id="berlaku" name="berlaku" placeholder="Masa Berlaku" value="<?=date('Y-m-d') ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <textarea class="form-control shadow-sm" id="deskripsi" name="deskripsi" placeholder="Deskripsi Layanan" required></textarea>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="kerahasiaan" name="kerahasiaan" required>
                <option value="">Kerahasiaan</option>
                <?php foreach ($aset_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>"><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="integritas" name="integritas" required>
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>"><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="ketersediaan" name="ketersediaan" required>
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>"><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control shadow-sm" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"></textarea>
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

<!-- Modal Tambah Aset Integible -->
<div class="modal fade" id="tambahaset_intangibleModal" tabindex="-1" role="dialog" aria-labelledby="tambahaset_intangibleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahaset_intangibleModalLabel">Aset Integible</h5>
      </div>
      <form action="<?=base_url('aset/form/intangible/tambah') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-md-12 col-form-label">Kode Aset : <strong>IT<?=time() ?></strong></label>
            <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="IT<?=time() ?>">
          </div>
          <div class="form-group row">
            <div class="col-md-6">
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Nama Aset" required>
            </div>
            <div class="col-md-6">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Aset</option>
                <option value="Layanan-Layanan">Layanan-Layanan</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-12">
              <input type="text" class="form-control shadow-sm" id="pemilik" name="pemilik" placeholder="Pemilik Aset" required>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">KLASIFIKASI KEAMANAN INFORMASI :</label>
          <div class="form-group row">
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="kerahasiaan" name="kerahasiaan" required>
                <option value="">Kerahasiaan</option>
                <?php foreach ($aset_kerahasiaan as $ar): ?>
                  <option value="<?=$ar['id_rahasia'] ?>"><?=$ar['id_rahasia'].' - '.$ar['nama_rahasia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="integritas" name="integritas" required>
                <option value="">Integritas</option>
                <?php foreach ($aset_integritas as $ai): ?>
                  <option value="<?=$ai['id_integritas'] ?>"><?=$ai['id_integritas'].' - '.$ai['nama_integritas'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <div class="col-sm-4">
              <select class="custom-select shadow-sm" id="ketersediaan" name="ketersediaan" required>
                <option value="">Ketersediaan</option>
                <?php foreach ($aset_ketersediaan as $as): ?>
                  <option value="<?=$as['id_sedia'] ?>"><?=$as['id_sedia'].' - '.$as['nama_sedia'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <textarea class="form-control shadow-sm" id="keterangan" name="keterangan" placeholder="Keterangan Tambahan"></textarea>
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

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#hapusasetinformasi", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusasetinformasiModal #nama").val(nama);
        $("#hapusasetinformasiModal #ket").html("Anda yakin ingin menghapus Aset Informasi : <strong>"+nama+"</strong> ?");
        $("#hapusasetinformasiModal #formhapusasetinformasi").attr("action","<?php echo base_url() ?>aset/form/informasi/hapus/"+id);
    });

    $(document).on("click", "#hapusasetsdm", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusasetsdmModal #nama").val(nama);
        $("#hapusasetsdmModal #ket").html("Anda yakin ingin menghapus Aset SDM a.n. <strong>"+nama+"</strong> ?");
        $("#hapusasetsdmModal #formhapusasetsdm").attr("action","<?php echo base_url() ?>aset/form/sdm/hapus/"+id);
    });

    $(document).on("click", "#detailasetsdm", function() {
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
        $("#detailasetsdmModal #kode").html(id);
        $("#detailasetsdmModal #nama").html(nama);
        $("#detailasetsdmModal #klasifikasi").html(klasifikasi);
        $("#detailasetsdmModal #identitas").html(identitas);
        $("#detailasetsdmModal #fungsi").html(fungsi);
        $("#detailasetsdmModal #subfungsi").html(subfungsi);
        $("#detailasetsdmModal #unit").html(unit);
        $("#detailasetsdmModal #jabatan").html(jabatan);
        $("#detailasetsdmModal #kontrak").html(kontrak);
        $("#detailasetsdmModal #atasan").html(atasan);
        $("#detailasetsdmModal #rahasia1").html(rahasia1);
        $("#detailasetsdmModal #rahasia2").html("("+rahasia2+")");
        $("#detailasetsdmModal #integritas1").html(integritas1);
        $("#detailasetsdmModal #integritas2").html("("+integritas2+")");
        $("#detailasetsdmModal #sedia1").html(sedia1);
        $("#detailasetsdmModal #sedia2").html("("+sedia2+")");
        $("#detailasetsdmModal #nilai1").html(nilai1);
        $("#detailasetsdmModal #nilai2").html("("+nilai2+")");
        $("#detailasetsdmModal #keterangan").html(keterangan);
    });

    $(document).on("click", "#hapusasetfisik", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusasetfisikModal #nama").val(nama);
        $("#hapusasetfisikModal #ket").html("Anda yakin ingin menghapus Aset Fisik <strong>"+nama+"</strong> ?");
        $("#hapusasetfisikModal #formhapusasetfisik").attr("action","<?php echo base_url() ?>aset/form/fisik/hapus/"+id);
    });

    $(document).on("click", "#detailasetfisik", function() {
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
        $("#detailasetfisikModal #kode").html(id);
        $("#detailasetfisikModal #nama").html(nama);
        $("#detailasetfisikModal #klasifikasi").html(klasifikasi);
        $("#detailasetfisikModal #jenis").html(jenis);
        $("#detailasetfisikModal #spesifikasi").html(spesifikasi);
        $("#detailasetfisikModal #pemilik").html(pemilik);
        $("#detailasetfisikModal #penyedia").html(penyedia);
        $("#detailasetfisikModal #pemegang").html(pemegang);
        $("#detailasetfisikModal #lokasi").html(lokasi);
        $("#detailasetfisikModal #berlaku").html(berlaku);
        $("#detailasetfisikModal #rahasia1").html(rahasia1);
        $("#detailasetfisikModal #rahasia2").html("("+rahasia2+")");
        $("#detailasetfisikModal #integritas1").html(integritas1);
        $("#detailasetfisikModal #integritas2").html("("+integritas2+")");
        $("#detailasetfisikModal #sedia1").html(sedia1);
        $("#detailasetfisikModal #sedia2").html("("+sedia2+")");
        $("#detailasetfisikModal #nilai1").html(nilai1);
        $("#detailasetfisikModal #nilai2").html("("+nilai2+")");
        $("#detailasetfisikModal #keterangan").html(keterangan);
    });

    $(document).on("click", "#hapusasetsoftware", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusasetsoftwareModal #nama").val(nama);
        $("#hapusasetsoftwareModal #ket").html("Anda yakin ingin menghapus Aset Software <strong>"+nama+"</strong> ?");
        $("#hapusasetsoftwareModal #formhapusasetsoftware").attr("action","<?php echo base_url() ?>aset/form/software/hapus/"+id);
    });

    $(document).on("click", "#hapusasetlayanan", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusasetlayananModal #nama").val(nama);
        $("#hapusasetlayananModal #ket").html("Anda yakin ingin menghapus Aset Layanan <strong>"+nama+"</strong> ?");
        $("#hapusasetlayananModal #formhapusasetlayanan").attr("action","<?php echo base_url() ?>aset/form/layanan/hapus/"+id);
    });

    $(document).on("click", "#hapusasetintangible", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#hapusasetintangibleModal #nama").val(nama);
        $("#hapusasetintangibleModal #ket").html("Anda yakin ingin menghapus Aset Intangible <strong>"+nama+"</strong> ?");
        $("#hapusasetintangibleModal #formhapusasetintangible").attr("action","<?php echo base_url() ?>aset/form/intangible/hapus/"+id);
    });

</script>