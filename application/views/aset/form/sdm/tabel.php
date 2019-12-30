<div class="table-responsive">
  <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="bg-dark text-white">
      <tr>
        <th class="align-middle text-center">KODE</th>
        <th class="align-middle text-center">NAMA PEGAWAI & IDENTITAS</th>
        <th class="align-middle text-center">SUB KLASIFIKASI</th>
        <th class="align-middle text-center">FUNGSI</th>
        <th class="align-middle text-center">JABATAN</th>
        <th class="align-middle text-center">KEAMANAN<br>INFORMASI</th>
        <!-- <th class="align-middle text-center">KETERANGAN</th> -->
        <th class="align-middle text-center">OPSI</th>
      </tr>
    </thead>
    <tbody>
      <?php if($aset_sdm){ ?>
        <?php $nilai=0; foreach ($aset_sdm as $as): ?>
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
            <td class="align-middle text-center"><?=$as['id'] ?></td>
            <td class="align-middle text-center"><strong><?=$as['nama'] ?></strong><br><small><?=$as['identitas'] ?></small></td>
            <td class="align-middle text-center"><?=$as['klasifikasi'] ?></td>
            <td class="align-middle text-center">
              <!-- <small>Fungsi :</small><br><strong> --><?=$as['pemilik_fungsi'] ?><!-- </strong><hr class="mb-1 mt-1">
              <small>Sub Fungsi :</small><br><strong><?=$as['pemilik_subfungsi'] ?></strong><hr class="mb-1 mt-1">
              <small>Unit :</small><br><strong><?=$as['pemilik_unit'] ?></strong> -->
            </td>
            <td class="align-middle text-center">
              <!-- <small>Jabatan :</small><br><strong> --><?=$as['jabatan'] ?><!-- </strong><hr class="mb-1 mt-1">
              <small>No. Kontrak / NDA :</small><br><strong><?=$as['kontrak'] ?></strong><hr class="mb-1 mt-1">
              <small>Atasan Langsung :</small><br><strong><?=$as['atasan'] ?></strong> -->
            </td>
            <td class="align-middle text-center">
              <!-- Kerahasiaan : <strong><?=$as['kerahasiaan'] ?></strong> <small>(<?=$as['nama_rahasia'] ?>)</small><br>
              Integritas : <strong><?=$as['integritas'] ?></strong> <small>(<?=$as['nama_integritas'] ?>)</small><br>
              Ketersediaan : <strong><?=$as['ketersediaan'] ?></strong> <small>(<?=$as['nama_sedia'] ?>)</small><hr class="mb-1 mt-1"> -->
              <strong><?=number_format($nilai, 0, ',','.'); ?></strong><br><small>(<?=$nl ?>)</small>
            </td>
            <!-- <td class="align-middle"><?=$as['keterangan'] ?></td> -->
            <td class="align-middle text-center">
              <button
                type="button"
                class="btn btn-sm btn-circle btn-success"
                id="detailasetsdm"
                data-toggle="modal"
                data-target="#detailasetsdmModal"
                data-id="<?=$as['id'] ?>"
                data-nama="<?=$as['nama'] ?>"
                data-klasifikasi="<?=$as['klasifikasi'] ?>"
                data-identitas="<?=$as['identitas'] ?>"
                data-fungsi="<?=$as['pemilik_fungsi'] ?>"
                data-subfungsi="<?=$as['pemilik_subfungsi'] ?>"
                data-unit="<?=$as['pemilik_unit'] ?>"
                data-jabatan="<?=$as['jabatan'] ?>"
                data-kontrak="<?=$as['kontrak'] ?>"
                data-atasan="<?=$as['atasan'] ?>"
                data-rahasia1="<?=$as['kerahasiaan'] ?>"
                data-rahasia2="<?=$as['nama_rahasia'] ?>"
                data-integritas1="<?=$as['integritas'] ?>"
                data-integritas2="<?=$as['nama_integritas'] ?>"
                data-sedia1="<?=$as['ketersediaan'] ?>"
                data-sedia2="<?=$as['nama_sedia'] ?>"
                data-nilai1="<?=number_format($nilai, 0, ',','.'); ?>"
                data-nilai2="<?=$nl ?>"
                data-keterangan="<?=$as['keterangan'] ?>"
                title="Detail"><i class="fa fa-fw fa-list"></i></button>
              <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
                <a href="<?=base_url('aset/form/sdm/ubah/').$as['id'] ?>" class="btn btn-sm btn-circle btn-info" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
                <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapusasetsdm" data-toggle="modal" data-target="#hapusasetsdmModal" data-id="<?=$as['id'] ?>" data-nama="<?=$as['nama'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
              <?php } ?>
            </td>
          </tr>
        <?php endforeach ?>
      <?php }else{ ?>
        <tr>
          <td colspan="7" class="text-center">Tidak ada data yang tersedia!</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusasetsdmModal" tabindex="-1" role="dialog" aria-labelledby="hapusasetsdmModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusasetsdmModalLabel">Hapus Aset SDM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="formhapusasetsdm" action="" method="post">
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

<!-- Modal Detail -->
<div class="modal fade" id="detailasetsdmModal" tabindex="-1" role="dialog" aria-labelledby="detailasetsdmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailasetsdmModalLabel">Detail Aset Sumber Daya Manusia (SDM)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" title="Tutup">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-striped table-borderless" width="100%">
          <tbody>
            <tr>
              <td width="19%">Kode</td>
              <td width="3%">:</td>
              <th width="78%"><span id="kode">kode</span></th>
            </tr>
            <tr>
              <td>Nama Pegawai</td>
              <td>:</td>
              <th><span id="nama">nama</span></th>
            </tr>
            <tr>
              <td>Sub Klasifikasi</td>
              <td>:</td>
              <th><span id="klasifikasi">klasifikasi</span></th>
            </tr>
            <tr>
              <td>No. Identitas / NIP</td>
              <td>:</td>
              <th><span id="identitas">identitas</span></th>
            </tr>
            <tr>
              <td>Fungsi</td>
              <td>:</td>
              <th><span id="fungsi">fungsi</span></th>
            </tr>
            <tr>
              <td>Sub Fungsi</td>
              <td>:</td>
              <th><span id="subfungsi">subfungsi</span></th>
            </tr>
            <tr>
              <td>Unit Kerja</td>
              <td>:</td>
              <th><span id="unit">unit</span></th>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td>:</td>
              <th><span id="jabatan">jabatan</span></th>
            </tr>
            <tr>
              <td>No. Kontrak / NDA</td>
              <td>:</td>
              <th><span id="kontrak">kontrak</span></th>
            </tr>
            <tr>
              <td>Atasan Langsung</td>
              <td>:</td>
              <th><span id="atasan">atasan</span></th>
            </tr>
            <tr>
              <td>Kerahasiaan</td>
              <td>:</td>
              <th><span id="rahasia1">rahasia1</span> <small id="rahasia2">rahasia2</small></th>
            </tr>
            <tr>
              <td>Integritas</td>
              <td>:</td>
              <th><span id="integritas1">integritas1</span> <small id="integritas2">integritas2</small></th>
            </tr>
            <tr>
              <td>Ketersediaan</td>
              <td>:</td>
              <th><span id="sedia1">sedia1</span> <small id="sedia2">sedia2</small></th>
            </tr>
            <tr>
              <td>Nilai Keamanan Informasi</td>
              <td>:</td>
              <th><span id="nilai1">nilai1</span> <small id="nilai2">nilai2</small></th>
            </tr>
            <tr>
              <td>Keterangan</td>
              <td>:</td>
              <th><span id="keterangan">keterangan</span></th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>