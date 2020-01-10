<div class="table-responsive">
  <table class="table shadow-sm table-sm table-striped table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
    <thead class="bg-primary text-white">
      <tr class="text-center">
        <th class="align-middle">KODE</th>
        <th class="align-middle">NAMA ASET</th>
        <th class="align-middle">SUB KLASIFIKASI</th>
        <th class="align-middle">FORMAT PENYIMPANAN</th>
        <th class="align-middle">PEMILIK ASET</th>
        <th class="align-middle">MASA BERLAKU</th>
        <th class="align-middle">KEAMANAN INFORMASI</th>
        <!-- <th class="align-middle text-center">KETERANGAN</th> -->
        <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
          <th class="align-middle text-center" width="6%">OPSI</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php if($aset_informasi){ ?>
        <?php $nilai=0; foreach ($aset_informasi as $ai): ?>
          <?php
            $nilai = ($ai['kerahasiaan']+$ai['integritas']+$ai['ketersediaan'])/3;

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
            <td class="align-middle text-center"><?=$ai['id'] ?></td>
            <td class="align-middle text-center"><?=$ai['nama'] ?></td>
            <td class="align-middle text-center"><?=$ai['klasifikasi'] ?></td>
            <td class="align-middle text-center"><?=$ai['format'] ?></td>
            <td class="align-middle text-center"><?=$ai['pemilik'] ?></td>
            <td class="align-middle text-center"><?=$ai['berlaku'] ?></td>
            <td class="align-middle text-right">
              Kerahasiaan : <strong><?=$ai['kerahasiaan'] ?></strong> <small>(<?=$ai['nama_rahasia'] ?>)</small><br>
              Integritas : <strong><?=$ai['integritas'] ?></strong> <small>(<?=$ai['nama_integritas'] ?>)</small><br>
              Ketersediaan : <strong><?=$ai['ketersediaan'] ?></strong> <small>(<?=$ai['nama_sedia'] ?>)</small><hr class="mb-1 mt-1">
              Nilai : <strong><?=number_format($nilai, 0, ',','.'); ?></strong> <small>(<?=$nl ?>)</small>
            </td>
            <!-- <td class="align-middle"><?=$ai['keterangan'] ?></td> -->
            <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
              <td class="align-middle text-center">
                <a href="<?=base_url('aset/form/informasi/ubah/').$ai['id'] ?>" class="btn shadow-sm btn-sm btn-circle btn-info" title="Ubah Aset Informasi <?=$ai['nama'] ?>"><i class="fa fa-fw fa-edit"></i></a>
                <button type="button" class="btn shadow-sm btn-sm btn-circle btn-danger" id="hapusasetinformasi" data-toggle="modal" data-target="#hapusasetinformasiModal" data-id="<?=$ai['id'] ?>" data-nama="<?=$ai['nama'] ?>" title="Hapus Aset Informasi <?=$ai['nama'] ?>"><i class="fa fa-fw fa-trash"></i></button>
              </td>
            <?php } ?>
          </tr>
        <?php endforeach ?>
      <?php }else{ ?>
        <tr>
          <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
            <td colspan="8" class="text-center">Tidak ada data yang tersedia!</td>
          <?php }else{ ?>
            <td colspan="7" class="text-center">Tidak ada data yang tersedia!</td>
          <?php } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusasetinformasiModal" tabindex="-1" role="dialog" aria-labelledby="hapusasetinformasiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusasetinformasiModalLabel">Hapus Aset Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formhapusasetinformasi" action="" method="post">
        <div class="modal-body">
          <p id="ket" class="text-center">Keterangan</p>
          <input type="hidden" id="nama" name="nama">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" title="Batal" data-dismiss="modal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>