<div class="table-responsive">
  <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="bg-dark text-white">
      <tr>
        <th class="align-middle text-center">KODE</th>
        <th class="align-middle text-center">NAMA ASET</th>
        <th class="align-middle text-center">SUB KLASIFIKASI</th>
        <th colspan="2" class="align-middle text-center">ASET</th>
        <th class="align-middle text-center">KEAMANAN<br>INFORMASI</th>
        <!-- <th class="align-middle text-center">KETERANGAN</th> -->
        <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
          <th class="align-middle text-center">OPSI</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php if($aset_software){ ?>
        <?php $nilai=0; foreach ($aset_software as $as): ?>
          <?php
            $nilai = ($as['kerahasiaan']+$as['integritas']+$as['ketersediaan'])/3;

            // NILAI
            if($nilai>=1 && $nilai<=1.5){
              $nl = 'Rendah';
            }else if($nilai>=1.5 && $nilai<=2.5){
              $nl = 'Sedang';
            }else if($nilai>=2.5 && $nilai<=3){
              $nl = 'Tinggi';
            }
          ?>
          <tr>
            <td class="align-middle text-center"><?=$as['ids'] ?></td>
            <td class="align-middle text-center"><?=$as['nama'] ?></td>
            <td class="align-middle text-center"><?=$as['klasifikasi'] ?></td>
            <td class="align-middle text-center">
              <small>Pemilik :</small><br><strong><?=$as['pemilik'] ?></strong><hr class="mb-1 mt-1">
              <small>Pemegang :</small><br><strong><?=$as['pemegang'] ?></strong><hr class="mb-1 mt-1">
              <small>Lokasi :</small><br><strong><?=$as['lokasi'] ?></strong>
            </td>
            <td class="align-middle text-center">
              <small>Masa Berlaku :</small><br><strong><?=$as['berlaku'] ?></strong><hr class="mb-1 mt-1">
              <small>Metode Hapus :</small><br><strong><?=$as['hapus'] ?></strong>
            </td>
            <td class="align-middle text-right">
              Kerahasiaan : <strong><?=$as['kerahasiaan'] ?></strong> <small>(<?=$as['nama_rahasia'] ?>)</small><br>
              Integritas : <strong><?=$as['integritas'] ?></strong> <small>(<?=$as['nama_integritas'] ?>)</small><br>
              Ketersediaan : <strong><?=$as['ketersediaan'] ?></strong> <small>(<?=$as['nama_sedia'] ?>)</small><hr class="mb-1 mt-1">
              Nilai : <strong><?=number_format($nilai, 0, ',','.'); ?></strong> <small>(<?=$nl ?>)</small>
            </td>
            <!-- <td class="align-middle"><?=$as['keterangan'] ?></td> -->
            <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
              <td class="align-middle text-center">
                <a href="<?=base_url('aset/form/software/ubah/').$as['ids'] ?>" class="btn btn-sm btn-circle btn-info m-1" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
                <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapusasetsoftware" data-toggle="modal" data-target="#hapusasetsoftwareModal" data-id="<?=$as['ids'] ?>" data-nama="<?=$as['nama'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
              </td>
            <?php } ?>
          </tr>
        <?php endforeach ?>
      <?php }else{ ?>
        <tr>
          <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
            <td colspan="6" class="text-center">Tidak ada data yang tersedia!</td>
          <?php }else{ ?>
            <td colspan="5" class="text-center">Tidak ada data yang tersedia!</td>
          <?php } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusasetsoftwareModal" tabindex="-1" role="dialog" aria-labelledby="hapusasetsoftwareModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusasetsoftwareModalLabel">Hapus Aset Perangkat Lunak</h5>
      </div>
      <form id="formhapusasetsoftware" action="" method="post">
        <div class="modal-body">
          <p id="ket">Keterangan</p>
          <input type="hidden" id="nama" name="nama">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" title="Batal" data-dismiss="modal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>