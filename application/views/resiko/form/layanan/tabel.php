<div class="table-responsive">
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
      <?php if($resiko_layanan){ ?>
        <?php $no=1; $nilai=0; foreach ($resiko_layanan as $rlayanan): ?>
        <?php
          $nilai = $rlayanan['dampak']*$rlayanan['pengancam']*$rlayanan['kerentanan']*$rlayanan['paparan'];
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
            <td class="align-middle"><?=$rlayanan['kla_layanan'] ?></td>
            <td class="align-middle text-center"><?=$rlayanan['dampak'] ?><br><small>(<?=$rlayanan['ekonomi'] ?>)</small></td>
            <td class="align-middle text-center"><?=$rlayanan['pengancam'] ?><br><small>(<?=$rlayanan['tingkat_pengancam'] ?>)</small></td>
            <td class="align-middle text-center"><?=$rlayanan['kerentanan'] ?><br><small>(<?=$rlayanan['tingkat_rentan'] ?>)</small></td>
            <td class="align-middle text-center"><?=$rlayanan['paparan'] ?><br><small>(<?=$rlayanan['tingkat_paparan'] ?>)</small></td>
            <td class="align-middle text-center">
              <strong><?=number_format($nilai, 0, ',','.'); ?></strong><br><small>(<?=$jenis_resiko ?>)</small>
            </td>
            <!-- <td class="align-middle"><?=$ai['keterangan'] ?></td> -->
            <td class="align-middle text-center">
              <button
                type="button"
                class="btn btn-sm btn-circle btn-success"
                id="detailresikolayanan"
                data-toggle="modal"
                data-target="#detailresikolayananModal"
                data-id="<?=$rlayanan['id'] ?>"
                data-klasifikasi="<?=$rlayanan['kla_layanan'] ?>"
                data-dampak="<?=$rlayanan['dampak'] ?>"
                data-ketdampak="<?='Ekonomi : '.$rlayanan['ekonomi'].'<br>Reputasi : '.$rlayanan['reputasi'].'<br>Pidana : '.$rlayanan['pidana'].'<br>Kinerja : '.$rlayanan['kinerja'] ?>"
                data-pengancam="<?=$rlayanan['pengancam'] ?>"
                data-tingkatpengancam="<?=$rlayanan['tingkat_pengancam'] ?>"
                data-kerentanan="<?=$rlayanan['kerentanan'] ?>"
                data-tingkatrentan="<?=$rlayanan['tingkat_rentan'] ?>"
                data-paparan="<?=$rlayanan['paparan'] ?>"
                data-tingkatpaparan="<?=$rlayanan['tingkat_paparan'] ?>"
                data-nilai="<?=$nilai ?>"
                data-jenisresiko="<?=$jenis_resiko ?>"
                title="Detail">
                <i class="fa fa-fw fa-eye"></i>
              </button>
              <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
                <a href="<?=base_url('resiko/form/layanan/ubah/').$rlayanan['id'] ?>" class="btn btn-sm btn-circle btn-info m-1" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
                <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapusresikolayanan" data-toggle="modal" data-target="#hapusresikolayananModal" data-id="<?=$rlayanan['id'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
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
<div class="modal fade" id="detailresikolayananModal" tabindex="-1" role="dialog" aria-labelledby="detailresikolayananModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailresikolayananModalLabel">Sub Klasifikasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <div class="card bg-gradient-success mb-3">
          <div class="card-body">
            <table class="table table-sm table-bordered m-0">
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

        <div class="card bg-gradient-warning mb-3">
          <div class="card-body">
            <table class="table table-sm table-bordered m-0">
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

        <div class="card bg-gradient-danger">
          <div class="card-body">
            <table class="table table-sm table-bordered m-0">
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
<div class="modal fade" id="hapusresikolayananModal" tabindex="-1" role="dialog" aria-labelledby="hapusresikolayananModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusresikolayananModalLabel">Hapus Resiko Layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formhapusresikolayanan" action="" method="post">
        <div class="modal-body">
          <p id="ket">Keterangan</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" title="Batal" data-dismiss="modal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>