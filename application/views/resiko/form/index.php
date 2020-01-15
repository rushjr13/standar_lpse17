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
      			Form Pencatatan Resiko Informasi
            <a href="<?=base_url('resiko/form/informasi/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko Informasi"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_informasiModal" title="Tambah Resiko Informasi"><i class="fa fa-fw fa-plus"></i></button>
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
      			Form Pencatatan Resiko Sumber Daya Manusia (SDM)
            <a href="<?=base_url('resiko/form/sdm/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko SDM"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_sdmModal" title="Tambah Resiko Sumber Daya Manusia (SDM)"><i class="fa fa-fw fa-plus"></i></button>
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
      			Form Pencatatan Resiko Fisik
            <a href="<?=base_url('resiko/form/fisik/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko Fisik"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_fisikModal" title="Tambah Resiko Fisik"><i class="fa fa-fw fa-plus"></i></button>
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
      			Form Pencatatan Resiko Software
            <a href="<?=base_url('resiko/form/software/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko Perangkat Lunak (Software)"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_softwareModal" title="Tambah Resiko Perangkat Lunak (Software)"><i class="fa fa-fw fa-plus"></i></button>
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
      			Form Pencatatan Resiko Layanan
            <a href="<?=base_url('resiko/form/layanan/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko Layanan"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_layananModal" title="Tambah Resiko Layanan"><i class="fa fa-fw fa-plus"></i></button>
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
      			Form Pencatatan Resiko Intagible
            <a href="<?=base_url('resiko/form/intangible/cetak') ?>" class="btn shadow-sm btn-sm btn-circle btn-primary ml-2 float-right" target="_blank" title="Cetak Resiko Layanan"><i class="fa fa-fw fa-print"></i></a>
            <?php if($akses_menu>0){ ?>
              <button type="button" class="btn shadow-sm btn-sm btn-circle btn-primary float-right" data-toggle="modal" data-target="#tambahresiko_intangibleModal" title="Tambah Resiko Layanan"><i class="fa fa-fw fa-plus"></i></button>
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
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
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
              <select class="custom-select shadow-sm" id="dampak" name="dampak" required>
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
              <select class="custom-select shadow-sm" id="pengancam" name="pengancam" required>
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
              <select class="custom-select shadow-sm" id="kerentanan" name="kerentanan" required>
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
              <select class="custom-select shadow-sm" id="paparan" name="paparan" required>
                <option value="">Pilih Tingkat Paparan</option>
                <?php foreach ($resiko_paparan as $rpap): ?>
                  <option value="<?=$rpap['nilai'] ?>"><?=$rpap['nilai'] ?>. <?=$rpap['contoh_paparan'] ?></option>
                <?php endforeach ?>
              </select>
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

<!-- Modal Tambah Resiko SDM -->
<div class="modal fade" id="tambahresiko_sdmModal" tabindex="-1" role="dialog" aria-labelledby="tambahresiko_sdmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahresiko_sdmModalLabel">Resiko Sumber Daya Manusia (SDM)</h5>
      </div>
      <form action="<?=base_url('resiko/form/sdm/tambah/') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode Resiko</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="RSDM<?=time() ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Klasifikasi</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Resiko</option>
                <?php foreach ($klasifikasi_sdm as $ksdm): ?>
                  <option value="<?=$ksdm['id_ksdm'] ?>"><?=$ksdm['kla_sdm'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Dampak</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="dampak" name="dampak" required>
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
              <select class="custom-select shadow-sm" id="pengancam" name="pengancam" required>
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
              <select class="custom-select shadow-sm" id="kerentanan" name="kerentanan" required>
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
              <select class="custom-select shadow-sm" id="paparan" name="paparan" required>
                <option value="">Pilih Tingkat Paparan</option>
                <?php foreach ($resiko_paparan as $rpap): ?>
                  <option value="<?=$rpap['nilai'] ?>"><?=$rpap['nilai'] ?>. <?=$rpap['contoh_paparan'] ?></option>
                <?php endforeach ?>
              </select>
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

<!-- Modal Tambah Resiko Fisik -->
<div class="modal fade" id="tambahresiko_fisikModal" tabindex="-1" role="dialog" aria-labelledby="tambahresiko_sdmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahresiko_fisikModalLabel">Resiko Fisik</h5>
      </div>
      <form action="<?=base_url('resiko/form/fisik/tambah/') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode Resiko</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="RF<?=time() ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Klasifikasi</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Resiko</option>
                <?php foreach ($klasifikasi_aset_fisik as $kfisik): ?>
                  <option value="<?=$kfisik['id'] ?>"><?=$kfisik['nama_klasifikasi'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Dampak</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="dampak" name="dampak" required>
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
              <select class="custom-select shadow-sm" id="pengancam" name="pengancam" required>
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
              <select class="custom-select shadow-sm" id="kerentanan" name="kerentanan" required>
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
              <select class="custom-select shadow-sm" id="paparan" name="paparan" required>
                <option value="">Pilih Tingkat Paparan</option>
                <?php foreach ($resiko_paparan as $rpap): ?>
                  <option value="<?=$rpap['nilai'] ?>"><?=$rpap['nilai'] ?>. <?=$rpap['contoh_paparan'] ?></option>
                <?php endforeach ?>
              </select>
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

<!-- Modal Tambah Resiko Software -->
<div class="modal fade" id="tambahresiko_softwareModal" tabindex="-1" role="dialog" aria-labelledby="tambahresiko_softwareModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahresiko_softwareModalLabel">Resiko Perangkat Lunak (Software)</h5>
      </div>
      <form action="<?=base_url('resiko/form/software/tambah/') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode Resiko</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="RSW<?=time() ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Klasifikasi</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Resiko</option>
                <?php foreach ($klasifikasi_software as $ksoftware): ?>
                  <option value="<?=$ksoftware['id_ksw'] ?>"><?=$ksoftware['kla_sw'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Dampak</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="dampak" name="dampak" required>
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
              <select class="custom-select shadow-sm" id="pengancam" name="pengancam" required>
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
              <select class="custom-select shadow-sm" id="kerentanan" name="kerentanan" required>
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
              <select class="custom-select shadow-sm" id="paparan" name="paparan" required>
                <option value="">Pilih Tingkat Paparan</option>
                <?php foreach ($resiko_paparan as $rpap): ?>
                  <option value="<?=$rpap['nilai'] ?>"><?=$rpap['nilai'] ?>. <?=$rpap['contoh_paparan'] ?></option>
                <?php endforeach ?>
              </select>
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

<!-- Modal Tambah Resiko Layanan -->
<div class="modal fade" id="tambahresiko_layananModal" tabindex="-1" role="dialog" aria-labelledby="tambahresiko_layananModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahresiko_layananModalLabel">Resiko Layanan</h5>
      </div>
      <form action="<?=base_url('resiko/form/layanan/tambah/') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode Resiko</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="RL<?=time() ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Klasifikasi</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Resiko</option>
                <?php foreach ($klasifikasi_layanan as $klayanan): ?>
                  <option value="<?=$klayanan['id_kl'] ?>"><?=$klayanan['kla_layanan'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Dampak</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="dampak" name="dampak" required>
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
              <select class="custom-select shadow-sm" id="pengancam" name="pengancam" required>
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
              <select class="custom-select shadow-sm" id="kerentanan" name="kerentanan" required>
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
              <select class="custom-select shadow-sm" id="paparan" name="paparan" required>
                <option value="">Pilih Tingkat Paparan</option>
                <?php foreach ($resiko_paparan as $rpap): ?>
                  <option value="<?=$rpap['nilai'] ?>"><?=$rpap['nilai'] ?>. <?=$rpap['contoh_paparan'] ?></option>
                <?php endforeach ?>
              </select>
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

<!-- Modal Tambah Resiko Integible -->
<div class="modal fade" id="tambahresiko_intangibleModal" tabindex="-1" role="dialog" aria-labelledby="tambahresiko_intangibleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahresiko_intangibleModalLabel">Resiko Integible</h5>
      </div>
      <form action="<?=base_url('resiko/form/intangible/tambah/') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode Resiko</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="RIN<?=time() ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Klasifikasi</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi" required>
                <option value="">Klasifikasi Resiko</option>
                <?php foreach ($klasifikasi_intangible as $kintangible): ?>
                  <option value="<?=$kintangible['id_in'] ?>"><?=$kintangible['kla_intangible'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Dampak</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="dampak" name="dampak" required>
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
              <select class="custom-select shadow-sm" id="pengancam" name="pengancam" required>
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
              <select class="custom-select shadow-sm" id="kerentanan" name="kerentanan" required>
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
              <select class="custom-select shadow-sm" id="paparan" name="paparan" required>
                <option value="">Pilih Tingkat Paparan</option>
                <?php foreach ($resiko_paparan as $rpap): ?>
                  <option value="<?=$rpap['nilai'] ?>"><?=$rpap['nilai'] ?>. <?=$rpap['contoh_paparan'] ?></option>
                <?php endforeach ?>
              </select>
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
        $("#hapusresikosdmModal #ket").html("Anda yakin ingin menghapus Resiko SDM : <strong>"+id+"</strong> ?");
        $("#hapusresikosdmModal #formhapusresikosdm").attr("action","<?php echo base_url() ?>resiko/form/sdm/hapus/"+id);
    });

    $(document).on("click", "#detailresikosdm", function() {
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
        $("#detailresikosdmModal #detailresikosdmModalLabel").html("Sub Klasifikasi : <span class='text-primary'>"+id+"</span> - "+klasifikasi);
        $("#detailresikosdmModal #ketdampak").html(ketdampak);
        $("#detailresikosdmModal #dampak").html(dampak);
        $("#detailresikosdmModal #tingkatpengancam").html(tingkatpengancam);
        $("#detailresikosdmModal #pengancam").html(pengancam);
        $("#detailresikosdmModal #tingkatrentan").html(tingkatrentan);
        $("#detailresikosdmModal #kerentanan").html(kerentanan);
        $("#detailresikosdmModal #tingkatpaparan").html(tingkatpaparan);
        $("#detailresikosdmModal #paparan").html(paparan);
        $("#detailresikosdmModal #jenisresiko").html(jenisresiko);
        $("#detailresikosdmModal #nilai").html(nilai);
        $("#detailresikosdmModal #sisatingkatrentan").html("-");
        $("#detailresikosdmModal #sisakerentanan").html("-");
        $("#detailresikosdmModal #sisatingkatpaparan").html("-");
        $("#detailresikosdmModal #sisapaparan").html("-");
        $("#detailresikosdmModal #sisajenisresiko").html("-");
        $("#detailresikosdmModal #sisanilai").html("-");
        $("#detailresikosdmModal #mitigasikontrol").html("-");
        $("#detailresikosdmModal #mitigasipic").html("-");
        $("#detailresikosdmModal #mitigasitarget").html("-");
    });

    $(document).on("click", "#hapusresikofisik", function() {
        var id = $(this).data('id');
        $("#hapusresikofisikModal #ket").html("Anda yakin ingin menghapus Resiko Fisik : <strong>"+id+"</strong> ?");
        $("#hapusresikofisikModal #formhapusresikofisik").attr("action","<?php echo base_url() ?>resiko/form/fisik/hapus/"+id);
    });

    $(document).on("click", "#detailresikofisik", function() {
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
        $("#detailresikofisikModal #detailresikofisikModalLabel").html("Sub Klasifikasi : <span class='text-primary'>"+id+"</span> - "+klasifikasi);
        $("#detailresikofisikModal #ketdampak").html(ketdampak);
        $("#detailresikofisikModal #dampak").html(dampak);
        $("#detailresikofisikModal #tingkatpengancam").html(tingkatpengancam);
        $("#detailresikofisikModal #pengancam").html(pengancam);
        $("#detailresikofisikModal #tingkatrentan").html(tingkatrentan);
        $("#detailresikofisikModal #kerentanan").html(kerentanan);
        $("#detailresikofisikModal #tingkatpaparan").html(tingkatpaparan);
        $("#detailresikofisikModal #paparan").html(paparan);
        $("#detailresikofisikModal #jenisresiko").html(jenisresiko);
        $("#detailresikofisikModal #nilai").html(nilai);
        $("#detailresikofisikModal #sisatingkatrentan").html("-");
        $("#detailresikofisikModal #sisakerentanan").html("-");
        $("#detailresikofisikModal #sisatingkatpaparan").html("-");
        $("#detailresikofisikModal #sisapaparan").html("-");
        $("#detailresikofisikModal #sisajenisresiko").html("-");
        $("#detailresikofisikModal #sisanilai").html("-");
        $("#detailresikofisikModal #mitigasikontrol").html("-");
        $("#detailresikofisikModal #mitigasipic").html("-");
        $("#detailresikofisikModal #mitigasitarget").html("-");
    });

    $(document).on("click", "#hapusresikosoftware", function() {
        var id = $(this).data('id');
        $("#hapusresikosoftwareModal #ket").html("Anda yakin ingin menghapus Resiko Software : <strong>"+id+"</strong> ?");
        $("#hapusresikosoftwareModal #formhapusresikosoftware").attr("action","<?php echo base_url() ?>resiko/form/software/hapus/"+id);
    });

    $(document).on("click", "#detailresikosoftware", function() {
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
        $("#detailresikosoftwareModal #detailresikosoftwareModalLabel").html("Sub Klasifikasi : <span class='text-primary'>"+id+"</span> - "+klasifikasi);
        $("#detailresikosoftwareModal #ketdampak").html(ketdampak);
        $("#detailresikosoftwareModal #dampak").html(dampak);
        $("#detailresikosoftwareModal #tingkatpengancam").html(tingkatpengancam);
        $("#detailresikosoftwareModal #pengancam").html(pengancam);
        $("#detailresikosoftwareModal #tingkatrentan").html(tingkatrentan);
        $("#detailresikosoftwareModal #kerentanan").html(kerentanan);
        $("#detailresikosoftwareModal #tingkatpaparan").html(tingkatpaparan);
        $("#detailresikosoftwareModal #paparan").html(paparan);
        $("#detailresikosoftwareModal #jenisresiko").html(jenisresiko);
        $("#detailresikosoftwareModal #nilai").html(nilai);
        $("#detailresikosoftwareModal #sisatingkatrentan").html("-");
        $("#detailresikosoftwareModal #sisakerentanan").html("-");
        $("#detailresikosoftwareModal #sisatingkatpaparan").html("-");
        $("#detailresikosoftwareModal #sisapaparan").html("-");
        $("#detailresikosoftwareModal #sisajenisresiko").html("-");
        $("#detailresikosoftwareModal #sisanilai").html("-");
        $("#detailresikosoftwareModal #mitigasikontrol").html("-");
        $("#detailresikosoftwareModal #mitigasipic").html("-");
        $("#detailresikosoftwareModal #mitigasitarget").html("-");
    });

    $(document).on("click", "#hapusresikolayanan", function() {
        var id = $(this).data('id');
        $("#hapusresikolayananModal #ket").html("Anda yakin ingin menghapus Resiko Layanan : <strong>"+id+"</strong> ?");
        $("#hapusresikolayananModal #formhapusresikolayanan").attr("action","<?php echo base_url() ?>resiko/form/layanan/hapus/"+id);
    });

    $(document).on("click", "#detailresikolayanan", function() {
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
        $("#detailresikolayananModal #detailresikolayananModalLabel").html("Sub Klasifikasi : <span class='text-primary'>"+id+"</span> - "+klasifikasi);
        $("#detailresikolayananModal #ketdampak").html(ketdampak);
        $("#detailresikolayananModal #dampak").html(dampak);
        $("#detailresikolayananModal #tingkatpengancam").html(tingkatpengancam);
        $("#detailresikolayananModal #pengancam").html(pengancam);
        $("#detailresikolayananModal #tingkatrentan").html(tingkatrentan);
        $("#detailresikolayananModal #kerentanan").html(kerentanan);
        $("#detailresikolayananModal #tingkatpaparan").html(tingkatpaparan);
        $("#detailresikolayananModal #paparan").html(paparan);
        $("#detailresikolayananModal #jenisresiko").html(jenisresiko);
        $("#detailresikolayananModal #nilai").html(nilai);
        $("#detailresikolayananModal #sisatingkatrentan").html("-");
        $("#detailresikolayananModal #sisakerentanan").html("-");
        $("#detailresikolayananModal #sisatingkatpaparan").html("-");
        $("#detailresikolayananModal #sisapaparan").html("-");
        $("#detailresikolayananModal #sisajenisresiko").html("-");
        $("#detailresikolayananModal #sisanilai").html("-");
        $("#detailresikolayananModal #mitigasikontrol").html("-");
        $("#detailresikolayananModal #mitigasipic").html("-");
        $("#detailresikolayananModal #mitigasitarget").html("-");
    });

    $(document).on("click", "#hapusresikointangible", function() {
        var id = $(this).data('id');
        $("#hapusresikointangibleModal #ket").html("Anda yakin ingin menghapus Resiko Layanan : <strong>"+id+"</strong> ?");
        $("#hapusresikointangibleModal #formhapusresikointangible").attr("action","<?php echo base_url() ?>resiko/form/intangible/hapus/"+id);
    });

    $(document).on("click", "#detailresikointangible", function() {
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
        $("#detailresikointangibleModal #detailresikointangibleModalLabel").html("Sub Klasifikasi : <span class='text-primary'>"+id+"</span> - "+klasifikasi);
        $("#detailresikointangibleModal #ketdampak").html(ketdampak);
        $("#detailresikointangibleModal #dampak").html(dampak);
        $("#detailresikointangibleModal #tingkatpengancam").html(tingkatpengancam);
        $("#detailresikointangibleModal #pengancam").html(pengancam);
        $("#detailresikointangibleModal #tingkatrentan").html(tingkatrentan);
        $("#detailresikointangibleModal #kerentanan").html(kerentanan);
        $("#detailresikointangibleModal #tingkatpaparan").html(tingkatpaparan);
        $("#detailresikointangibleModal #paparan").html(paparan);
        $("#detailresikointangibleModal #jenisresiko").html(jenisresiko);
        $("#detailresikointangibleModal #nilai").html(nilai);
        $("#detailresikointangibleModal #sisatingkatrentan").html("-");
        $("#detailresikointangibleModal #sisakerentanan").html("-");
        $("#detailresikointangibleModal #sisatingkatpaparan").html("-");
        $("#detailresikointangibleModal #sisapaparan").html("-");
        $("#detailresikointangibleModal #sisajenisresiko").html("-");
        $("#detailresikointangibleModal #sisanilai").html("-");
        $("#detailresikointangibleModal #mitigasikontrol").html("-");
        $("#detailresikointangibleModal #mitigasipic").html("-");
        $("#detailresikointangibleModal #mitigasitarget").html("-");
    });

</script>