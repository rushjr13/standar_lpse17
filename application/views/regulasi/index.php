<div class="row">
  <div class="col-lg-6">
    <div class="card shadow border-primary mb-3">
      <div class="card-header shadow-sm bg-primary text-white">
        Kebijakan Umum
        <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
          <a href="<?=base_url('regulasi/edit/kebijakan_umum') ?>" class="btn btn-sm btn-circle btn-primary shadow-sm float-right" title="Perbarui Regulasi Kebijakan Umum"><i class="fa fa-fw fa-edit"></i></a>
        <?php } ?>
      </div>
      <div class="card-body">
        <?=$kebijakan_umum['isi_regulasi'] ?>
      </div>
    </div>

    <div class="card shadow border-primary mb-3">
      <div class="card-header shadow-sm bg-primary text-white">
        Kebijakan Layanan
        <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
          <a href="<?=base_url('regulasi/edit/kebijakan_layanan') ?>" class="btn btn-sm btn-circle btn-primary shadow-sm float-right" title="Perbarui Regulasi Kebijakan Layanan"><i class="fa fa-fw fa-edit"></i></a>
        <?php } ?>
      </div>
      <div class="card-body">
        <?=$kebijakan_layanan['isi_regulasi'] ?>
      </div>
    </div>
  </div>

  <div class="col-lg-6">
    <div class="card shadow border-primary mb-3">
      <div class="card-header shadow-sm bg-primary text-white">
        Kebijakan Keamanan Informasi
        <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
          <a href="<?=base_url('regulasi/edit/kebijakan_keamanan_informasi') ?>" class="btn btn-sm btn-circle btn-primary shadow-sm float-right" title="Perbarui Regulasi Kebijakan Keamanan Informasi"><i class="fa fa-fw fa-edit"></i></a>
        <?php } ?>
      </div>
      <div class="card-body">
        <?=$kebijakan_keamanan_informasi['isi_regulasi'] ?>
      </div>
    </div>
  </div>
</div>