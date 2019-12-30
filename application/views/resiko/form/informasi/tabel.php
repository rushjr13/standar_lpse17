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
      <?php if($resiko_informasi){ ?>
        <?php $no=1; $nilai=0; foreach ($resiko_informasi as $ri): ?>
        <?php
          $nilai = $ri['dampak']*$ri['pengancam']*$ri['kerentanan']*$ri['paparan'];
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
            <td class="align-middle"><?=$ri['kla_informasi'] ?></td>
            <td class="align-middle text-center"><?=$ri['dampak'] ?><br><small>(<?=$ri['ekonomi'] ?>)</small></td>
            <td class="align-middle text-center"><?=$ri['pengancam'] ?><br><small>(<?=$ri['tingkat_pengancam'] ?>)</small></td>
            <td class="align-middle text-center"><?=$ri['kerentanan'] ?><br><small>(<?=$ri['tingkat_rentan'] ?>)</small></td>
            <td class="align-middle text-center"><?=$ri['paparan'] ?><br><small>(<?=$ri['tingkat_paparan'] ?>)</small></td>
            <td class="align-middle text-center">
              <strong><?=number_format($nilai, 0, ',','.'); ?></strong><br><small>(<?=$jenis_resiko ?>)</small>
            </td>
            <!-- <td class="align-middle"><?=$ai['keterangan'] ?></td> -->
            <td class="align-middle text-center">
              <button
                type="button"
                class="btn btn-sm btn-circle btn-success"
                id="detailresikoinformasi"
                data-toggle="modal"
                data-target="#detailresikoinformasiModal"
                data-id="<?=$ri['id'] ?>"
                data-klasifikasi="<?=$ri['kla_informasi'] ?>"
                data-dampak="<?=$ri['dampak'] ?>"
                data-ketdampak="<?='Ekonomi : '.$ri['ekonomi'].'<br>Reputasi : '.$ri['reputasi'].'<br>Pidana : '.$ri['pidana'].'<br>Kinerja : '.$ri['kinerja'] ?>"
                data-pengancam="<?=$ri['pengancam'] ?>"
                data-tingkatpengancam="<?=$ri['tingkat_pengancam'] ?>"
                data-kerentanan="<?=$ri['kerentanan'] ?>"
                data-tingkatrentan="<?=$ri['tingkat_rentan'] ?>"
                data-paparan="<?=$ri['paparan'] ?>"
                data-tingkatpaparan="<?=$ri['tingkat_paparan'] ?>"
                data-nilai="<?=$nilai ?>"
                data-jenisresiko="<?=$jenis_resiko ?>"
                title="Detail">
                <i class="fa fa-fw fa-eye"></i>
              </button>
              <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
                <a href="<?=base_url('resiko/form/informasi/ubah/').$ri['id'] ?>" class="btn btn-sm btn-circle btn-info m-1" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
                <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapusresikoinformasi" data-toggle="modal" data-target="#hapusresikoinformasiModal" data-id="<?=$ri['id'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
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
<div class="modal fade" id="detailresikoinformasiModal" tabindex="-1" role="dialog" aria-labelledby="detailresikoinformasiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailresikoinformasiModalLabel">Sub Klasifikasi</h5>
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
<div class="modal fade" id="hapusresikoinformasiModal" tabindex="-1" role="dialog" aria-labelledby="hapusresikoinformasiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusresikoinformasiModalLabel">Hapus Aset Informasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formhapusresikoinformasi" action="" method="post">
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