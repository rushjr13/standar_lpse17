<div class="row justify-content-md-center">
  <div class="col-8">
    <form action="<?=base_url('resiko/form/fisik/ubah/'.$resiko_fisik['id_rfisik']) ?>" method="post">
      <div class="card shadow border-primary">
        <div class="card-header shadow-sm bg-primary text-white">Ubah Resiko Fisik</div>
        <div class="card-body">
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode Resiko</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="<?=$resiko_fisik['id_rfisik'] ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Klasifikasi</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="klasifikasi" name="klasifikasi">
                <option value="">Klasifikasi Resiko</option>
                <?php foreach ($klasifikasi_fisik as $kfisik): ?>
                  <option value="<?=$kfisik['id'] ?>" <?php if($resiko_fisik['id_kfisik']==$kfisik['id']){echo "selected";} ?>><?=$kfisik['nama_klasifikasi'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('klasifikasi', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Dampak</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="dampak" name="dampak">
                <option value="">Pilih Dampak</option>
                <?php foreach ($resiko_dampak as $rd): ?>
                  <option value="<?=$rd['nilai'] ?>" <?php if($resiko_fisik['dampak']==$rd['nilai']){echo "selected";} ?>><?=$rd['nilai'] ?>. <?=$rd['ekonomi'] ?>, <?=$rd['reputasi'] ?>, <?=$rd['pidana'] ?>, <?=$rd['kinerja'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('dampak', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Pengancam</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="pengancam" name="pengancam">
                <option value="">Pilih Pengancam</option>
                <?php foreach ($resiko_pengancam as $rp): ?>
                  <option value="<?=$rp['nilai'] ?>" <?php if($resiko_fisik['pengancam']==$rp['nilai']){echo "selected";} ?>><?=$rp['nilai'] ?>. <?=$rp['profil_pengancam'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('pengancam', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <hr>
          <label class="font-weight-bold">IDENTIFIKASI RESIKO BAWAAN :</label>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kerentanan</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="kerentanan" name="kerentanan">
                <option value="">Pilih Tingkat Kerentanan</option>
                <?php foreach ($resiko_rentan as $rr): ?>
                  <option value="<?=$rr['nilai'] ?>" <?php if($resiko_fisik['kerentanan']==$rr['nilai']){echo "selected";} ?>><?=$rr['nilai'] ?>. <?=$rr['tingkat_rentan'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('kerentanan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Paparan</label>
            <div class="col-sm-10">
              <select class="custom-select shadow-sm" id="paparan" name="paparan">
                <option value="">Pilih Tingkat Paparan</option>
                <?php foreach ($resiko_paparan as $rpap): ?>
                  <option value="<?=$rpap['nilai'] ?>" <?php if($resiko_fisik['paparan']==$rpap['nilai']){echo "selected";} ?>><?=$rpap['nilai'] ?>. <?=$rpap['contoh_paparan'] ?></option>
                <?php endforeach ?>
              </select>
              <?php echo form_error('paparan', '<small class="text-danger ml-2" style="font-style:italic;">', '</small>'); ?>
            </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <a href="<?=base_url('resiko/form') ?>" class="btn shadow-sm btn-sm btn-circle btn-secondary"title="Batal"><i class="fa fa-fw fa-times"></i></a>
          <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </div>
    </form>
  </div>
</div>