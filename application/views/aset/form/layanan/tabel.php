<div class="table-responsive">
  <table class="table shadow-sm table-hover table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="bg-primary text-white">
      <tr>
        <th class="align-middle text-center">KODE</th>
        <th class="align-middle text-center">NAMA LAYANAN</th>
        <th class="align-middle text-center">KLASIFIKASI</th>
        <th class="align-middle text-center">ASET</th>
        <th class="align-middle text-center">KONTRAK / SLA</th>
        <th class="align-middle text-center">KEAMANAN<br>INFORMASI</th>
        <th class="align-middle text-center">KETERANGAN</th>
        <?php if($akses_menu>0){ ?>
          <th class="align-middle text-center" width="6%">OPSI</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php if($aset_layanan){ ?>
        <?php $nilai=0; foreach ($aset_layanan as $al): ?>
          <?php
            $nilai = ($al['kerahasiaan']+$al['integritas']+$al['ketersediaan'])/3;

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
            <td class="align-middle text-center"><?=$al['idl'] ?></td>
            <td class="align-middle text-center"><?=$al['nama'] ?></td>
            <td class="align-middle text-center"><?=$al['klasifikasi'] ?></td>
            <td class="align-middle text-center">
              <small>Pemilik :</small><br><strong><?=$al['pemilik'] ?></strong><hr class="mb-1 mt-1">
              <small>Pemegang :</small><br><strong><?=$al['pemegang'] ?></strong><hr class="mb-1 mt-1">
              <small>Penyedia :</small><br><strong><?=$al['penyedia'] ?></strong>
            </td>
            <td class="align-middle text-center">
              <small>Nomor :</small><br><strong><?=$al['kontrak_no'] ?></strong><hr class="mb-1 mt-1">
              <small>Deskripsi :</small><br><strong><?=$al['kontrak_deskripsi'] ?></strong><hr class="mb-1 mt-1">
              <small>Masa Berlaku :</small><br><strong><?=$al['kontrak_berlaku'] ?></strong>
            </td>
            <td class="align-middle text-right">
              Kerahasiaan : <strong><?=$al['kerahasiaan'] ?></strong> <small>(<?=$al['nama_rahasia'] ?>)</small><br>
              Integritas : <strong><?=$al['integritas'] ?></strong> <small>(<?=$al['nama_integritas'] ?>)</small><br>
              Ketersediaan : <strong><?=$al['ketersediaan'] ?></strong> <small>(<?=$al['nama_sedia'] ?>)</small><hr class="mb-1 mt-1">
              Nilai : <strong><?=number_format($nilai, 0, ',','.'); ?></strong> <small>(<?=$nl ?>)</small>
            </td>
            <td class="align-middle text-center"><?=$al['keterangan'] ?></td>
            <?php if($akses_menu>0){ ?>
              <td class="align-middle text-center">
                <a href="<?=base_url('aset/form/layanan/ubah/').$al['idl'] ?>" class="btn shadow-sm btn-sm btn-circle btn-info" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
                <button type="button" class="btn shadow-sm btn-sm btn-circle btn-danger" id="hapusasetlayanan" data-toggle="modal" data-target="#hapusasetlayananModal" data-id="<?=$al['idl'] ?>" data-nama="<?=$al['nama'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
              </td>
            <?php } ?>
          </tr>
        <?php endforeach ?>
      <?php }else{ ?>
        <tr>
          <?php if($akses_menu>0){ ?>
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
<div class="modal fade" id="hapusasetlayananModal" tabindex="-1" role="dialog" aria-labelledby="hapusasetlayananModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusasetlayananModalLabel">Hapus Aset Layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formhapusasetlayanan" action="" method="post">
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