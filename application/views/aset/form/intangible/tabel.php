<div class="table-responsive">
  <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="bg-dark text-white">
      <tr>
        <th class="align-middle text-center">KODE</th>
        <th class="align-middle text-center">NAMA LAYANAN</th>
        <th class="align-middle text-center">KLASIFIKASI</th>
        <th class="align-middle text-center">PEMILIK</th>
        <th class="align-middle text-center">KEAMANAN<br>INFORMASI</th>
        <th class="align-middle text-center">KETERANGAN</th>
        <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
          <th class="align-middle text-center">OPSI</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php if($aset_intangible){ ?>
        <?php $nilai=0; foreach ($aset_intangible as $ai): ?>
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
            <td class="align-middle text-center"><?=$ai['idi'] ?></td>
            <td class="align-middle text-center"><?=$ai['nama'] ?></td>
            <td class="align-middle text-center"><?=$ai['klasifikasi'] ?></td>
            <td class="align-middle text-center"><?=$ai['pemilik'] ?></td>
            <td class="align-middle text-right">
              Kerahasiaan : <strong><?=$ai['kerahasiaan'] ?></strong> <small>(<?=$ai['nama_rahasia'] ?>)</small><br>
              Integritas : <strong><?=$ai['integritas'] ?></strong> <small>(<?=$ai['nama_integritas'] ?>)</small><br>
              Ketersediaan : <strong><?=$ai['ketersediaan'] ?></strong> <small>(<?=$ai['nama_sedia'] ?>)</small><hr class="mb-1 mt-1">
              Nilai : <strong><?=number_format($nilai, 0, ',','.'); ?></strong> <small>(<?=$nl ?>)</small>
            </td>
            <td class="align-middle text-center"><?=$ai['keterangan'] ?></td>
            <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
              <td class="align-middle text-center">
                <a href="<?=base_url('aset/form/intangible/ubah/').$ai['idi'] ?>" class="btn btn-sm btn-circle btn-info" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
                <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapusasetintangible" data-toggle="modal" data-target="#hapusasetintangibleModal" data-id="<?=$ai['idi'] ?>" data-nama="<?=$ai['nama'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
              </td>
            <?php } ?>
          </tr>
        <?php endforeach ?>
      <?php }else{ ?>
        <tr>
          <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
            <td colspan="7" class="text-center">Tidak ada data yang tersedia!</td>
          <?php }else{ ?>
            <td colspan="6" class="text-center">Tidak ada data yang tersedia!</td>
          <?php } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusasetintangibleModal" tabindex="-1" role="dialog" aria-labelledby="hapusasetintangibleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusasetintangibleModalLabel">Hapus Aset Integible</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formhapusasetintangible" action="" method="post">
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