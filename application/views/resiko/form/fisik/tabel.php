<div class="table-responsive">
  <table class="table shadow-sm table-sm table-hover table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="bg-primary text-white">
      <tr>
        <th rowspan="2" class="align-middle text-center" width="3%">NO</th>
        <th rowspan="2" class="align-middle text-center">SUB KLASIFIKASI</th>
        <th rowspan="2"class="align-middle text-center">DAMPAK</th>
        <th rowspan="2"class="align-middle text-center">PENGANCAM</th>
        <th colspan="3" class="align-middle text-center">IDENTIFIKASI RESIKO BAWAAN</th>
        <th rowspan="2" class="align-middle text-center" width="9%">OPSI</th>
      </tr>
      <tr>
        <th class="align-middle text-center">KERENTANAN</th>
        <th class="align-middle text-center">PAPARAN</th>
        <th class="align-middle text-center">NILAI</th>
      </tr>
    </thead>
    <tbody>
      <?php if($resiko_fisik){ ?>
        <?php $no=1; $nilai=0; foreach ($resiko_fisik as $rfisik): ?>
        <?php
          $nilai = $rfisik['dampak']*$rfisik['pengancam']*$rfisik['kerentanan']*$rfisik['paparan'];
          if($nilai<=24){
            $jenis_resiko = 'Rendah';
          }else if($nilai>24 && $nilai<=64){
            $jenis_resiko = 'Sedang';
          }else if($nilai>64){
            $jenis_resiko = 'Tinggi';
          }
        ?>
          <tr>
            <td class="align-middle text-center"><?=$no++ ?></td>
            <td class="align-middle"><?=$rfisik['nama_klasifikasi'] ?></td>
            <td class="align-middle text-center"><?=$rfisik['dampak'] ?><br><small>(<?=$rfisik['ekonomi'] ?>)</small></td>
            <td class="align-middle text-center"><?=$rfisik['pengancam'] ?><br><small>(<?=$rfisik['tingkat_pengancam'] ?>)</small></td>
            <td class="align-middle text-center"><?=$rfisik['kerentanan'] ?><br><small>(<?=$rfisik['tingkat_rentan'] ?>)</small></td>
            <td class="align-middle text-center"><?=$rfisik['paparan'] ?><br><small>(<?=$rfisik['tingkat_paparan'] ?>)</small></td>
            <td class="align-middle text-center">
              <strong><?=number_format($nilai, 0, ',','.'); ?></strong><br><small>(<?=$jenis_resiko ?>)</small>
            </td>
            <!-- <td class="align-middle"><?=$ai['keterangan'] ?></td> -->
            <td class="align-middle text-center">
              <button
                type="button"
                class="btn shadow-sm btn-sm btn-circle btn-success"
                id="detailresikofisik"
                data-toggle="modal"
                data-target="#detailresikofisikModal"
                data-id="<?=$rfisik['id_rfisik'] ?>"
                data-klasifikasi="<?=$rfisik['nama_klasifikasi'] ?>"
                data-dampak="<?=$rfisik['dampak'] ?>"
                data-ketdampak="<?='Ekonomi : '.$rfisik['ekonomi'].'<br>Reputasi : '.$rfisik['reputasi'].'<br>Pidana : '.$rfisik['pidana'].'<br>Kinerja : '.$rfisik['kinerja'] ?>"
                data-pengancam="<?=$rfisik['pengancam'] ?>"
                data-tingkatpengancam="<?=$rfisik['tingkat_pengancam'] ?>"
                data-kerentanan="<?=$rfisik['kerentanan'] ?>"
                data-tingkatrentan="<?=$rfisik['tingkat_rentan'] ?>"
                data-paparan="<?=$rfisik['paparan'] ?>"
                data-tingkatpaparan="<?=$rfisik['tingkat_paparan'] ?>"
                data-nilai="<?=$nilai ?>"
                data-jenisresiko="<?=$jenis_resiko ?>"
                title="Detail">
                <i class="fa fa-fw fa-eye"></i>
              </button>
              <?php if($akses_menu>0){ ?>
                <a href="<?=base_url('resiko/form/fisik/ubah/').$rfisik['id_rfisik'] ?>" class="btn shadow-sm btn-sm btn-circle btn-info" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
                <button type="button" class="btn shadow-sm btn-sm btn-circle btn-danger" id="hapusresikofisik" data-toggle="modal" data-target="#hapusresikofisikModal" data-id="<?=$rfisik['id_rfisik'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
              <?php } ?>
            </td>
          </tr>
        <?php endforeach ?>
      <?php }else{ ?>
        <tr>
          <td colspan="8" class="text-center">Tidak ada data yang tersedia!</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailresikofisikModal" tabindex="-1" role="dialog" aria-labelledby="detailresikofisikModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailresikofisikModalLabel">Sub Klasifikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <div class="card bg-gradient-success mb-3 shadow-sm">
          <div class="card-body">
            <table class="table shadow-sm table-sm table-bordered m-0">
              <thead class="text-center text-white">
                <tr>
                  <td colspan="2" class="align-middle">DAMPAK</td>
                  <td colspan="2" class="align-middle">PENGANCAM</td>
                </tr>
                <tr>
                  <td class="align-middle">KETERANGAN</td>
                  <td class="align-middle">NILAI</td>
                  <td class="align-middle">KETERANGAN</td>
                  <td class="align-middle">NILAI</td>
                </tr>
              </thead>
              <tbody class="text-center bg-light">
                <tr>
                  <th class="align-middle" id="ketdampak">-</th>
                  <th class="align-middle" id="dampak">-</th>
                  <th class="align-middle" id="tingkatpengancam">-</th>
                  <th class="align-middle" id="pengancam">-</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card bg-gradient-warning mb-3 shadow-sm">
          <div class="card-body">
            <table class="table shadow-sm table-sm table-bordered m-0">
              <thead class="text-center text-white">
                <tr>
                  <td colspan="6" class="align-middle">IDENTIFIKASI RESIKO BAWAAN</td>
                  <td rowspan="3" class="align-middle">KONTROL</td>
                </tr>
                <tr>
                  <td colspan="2" class="align-middle">KERENTANAN</td>
                  <td colspan="2" class="align-middle">PAPARAN</td>
                  <td rowspan="2" class="align-middle">JENIS RESIKO</td>
                  <td rowspan="2" class="align-middle">NILAI RESIKO</td>
                </tr>
                <tr>
                  <td class="align-middle">KETERANGAN</td>
                  <td class="align-middle">NILAI</td>
                  <td class="align-middle">KETERANGAN</td>
                  <td class="align-middle">NILAI</td>
                </tr>
              </thead>
              <tbody class="text-center bg-light">
                <tr>
                  <th class="align-middle" id="tingkatrentan">-</th>
                  <th class="align-middle" id="kerentanan">-</th>
                  <th class="align-middle" id="tingkatpaparan">-</th>
                  <th class="align-middle" id="paparan">-</th>
                  <th class="align-middle" id="jenisresiko">-</th>
                  <th class="align-middle" id="nilai">-</th>
                  <th class="align-middle" id="kontrol">-</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <div class="card bg-gradient-danger shadow-sm">
          <div class="card-body">
            <table class="table shadow-sm table-sm table-bordered m-0">
              <thead class="text-center text-white">
                <tr>
                  <td colspan="6" class="align-middle">IDENTIFIKASI RESIKO SISA</td>
                  <td rowspan="2" colspan="3" class="align-middle">MITIGASI</td>
                </tr>
                <tr>
                  <td colspan="2" class="align-middle">KERENTANAN</td>
                  <td colspan="2" class="align-middle">PAPARAN</td>
                  <td rowspan="2" class="align-middle">JENIS RESIKO</td>
                  <td rowspan="2" class="align-middle">NILAI RESIKO</td>
                </tr>
                <tr>
                  <td class="align-middle">KETERANGAN</td>
                  <td class="align-middle">NILAI</td>
                  <td class="align-middle">KETERANGAN</td>
                  <td class="align-middle">NILAI</td>
                  <td class="align-middle">KONTROL</td>
                  <td class="align-middle">PIC</td>
                  <td class="align-middle">TARGET</td>
                </tr>
              </thead>
              <tbody class="text-center bg-light">
                <tr>
                  <th class="align-middle" id="sisatingkatrentan">-</th>
                  <th class="align-middle" id="sisakerentanan">-</th>
                  <th class="align-middle" id="sisatingkatpaparan">-</th>
                  <th class="align-middle" id="sisapaparan">-</th>
                  <th class="align-middle" id="sisajenisresiko">-</th>
                  <th class="align-middle" id="sisanilai">-</th>
                  <th class="align-middle" id="mitigasikontrol">-</th>
                  <th class="align-middle" id="mitigasipic">-</th>
                  <th class="align-middle" id="mitigasitarget">-</th>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusresikofisikModal" tabindex="-1" role="dialog" aria-labelledby="hapusresikofisikModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusresikofisikModalLabel">Hapus Resiko Fisik</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formhapusresikofisik" action="" method="post">
        <div class="modal-body">
          <p id="ket" class="text-center">Keterangan</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn shadow-sm btn-sm btn-circle btn-secondary" title="Batal" data-dismiss="modal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn shadow-sm btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>