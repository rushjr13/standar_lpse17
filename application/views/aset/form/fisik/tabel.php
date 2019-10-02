<div class="table-responsive">
  <table class="table table-sm table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead class="bg-dark text-white">
      <tr>
        <th class="align-middle text-center">KODE</th>
        <th class="align-middle text-center">NAMA ASET</th>
        <th class="align-middle text-center">SUB KLASIFIKASI</th>
        <th class="align-middle text-center">JENIS ASET</th>
        <!-- <th class="align-middle text-center">SPESIFIKASI</th>
        <th class="align-middle text-center">PENGADAAN</th> -->
        <th class="align-middle text-center">KEAMANAN<br>INFORMASI</th>
        <!-- <th class="align-middle text-center">KETERANGAN</th> -->
        <th class="align-middle text-center">OPSI</th>
      </tr>
    </thead>
    <tbody>
      <?php if($aset_fisik){ ?>
        <?php $nilai=0; foreach ($aset_fisik as $af): ?>
          <?php
            $nilai = ($af['kerahasiaan']+$af['integritas']+$af['ketersediaan'])/3;

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
            <td class="align-middle text-center"><?=$af['idf'] ?></td>
            <td class="align-middle text-center"><?=$af['nama'] ?></td>
            <td class="align-middle text-center"><?=$af['nama_klasifikasi'] ?></td>
            <td class="align-middle text-center"><?=$af['nama_jenisaset'] ?></td>
            <!-- <td class="align-middle text-center"><?=$af['spesifikasi'] ?></td>
            <td class="align-middle text-center">
              <small>Pemilik :</small><br><strong><?=$af['pemilik'] ?></strong><hr class="mb-1 mt-1">
              <small>Penyedia :</small><br><strong><?=$af['penyedia'] ?></strong><hr class="mb-1 mt-1">
              <small>Pemegang :</small><br><strong><?=$af['pemegang'] ?></strong><hr class="mb-1 mt-1">
              <small>Lokasi :</small><br><strong><?=$af['lokasi'] ?></strong><hr class="mb-1 mt-1">
              <small>Masa Berlaku :</small><br><strong><?=$af['berlaku'] ?></strong>
            </td> -->
            <td class="align-middle text-center">
              <!-- Kerahasiaan : <strong><?=$af['kerahasiaan'] ?></strong> <small>(<?=$af['nama_rahasia'] ?>)</small><br>
              Integritas : <strong><?=$af['integritas'] ?></strong> <small>(<?=$af['nama_integritas'] ?>)</small><br>
              Ketersediaan : <strong><?=$af['ketersediaan'] ?></strong> <small>(<?=$af['nama_sedia'] ?>)</small><hr class="mb-1 mt-1"> -->
              <strong><?=number_format($nilai, 0, ',','.'); ?></strong><br><small>(<?=$nl ?>)</small>
            </td>
            <!-- <td class="align-middle"><?=$af['keterangan'] ?></td> -->
            <td class="align-middle text-center">
              <button
                type="button"
                class="btn btn-sm btn-circle btn-success"
                id="detailasetfisik"
                data-toggle="modal"
                data-target="#detailasetfisikModal"
                data-id="<?=$af['idf'] ?>"
                data-nama="<?=$af['nama'] ?>"
                data-klasifikasi="<?=$af['nama_klasifikasi'] ?>"
                data-jenis="<?=$af['nama_jenisaset'] ?>"
                data-spesifikasi="<?=$af['spesifikasi'] ?>"
                data-pemilik="<?=$af['pemilik'] ?>"
                data-penyedia="<?=$af['penyedia'] ?>"
                data-pemegang="<?=$af['pemegang'] ?>"
                data-lokasi="<?=$af['lokasi'] ?>"
                data-berlaku="<?=$af['berlaku'] ?>"
                data-rahasia1="<?=$af['kerahasiaan'] ?>"
                data-rahasia2="<?=$af['nama_rahasia'] ?>"
                data-integritas1="<?=$af['integritas'] ?>"
                data-integritas2="<?=$af['nama_integritas'] ?>"
                data-sedia1="<?=$af['ketersediaan'] ?>"
                data-sedia2="<?=$af['nama_sedia'] ?>"
                data-nilai1="<?=number_format($nilai, 0, ',','.'); ?>"
                data-nilai2="<?=$nl ?>"
                data-keterangan="<?=$af['keterangan'] ?>"
                title="Detail"><i class="fa fa-fw fa-list"></i></button>
              <a href="<?=base_url('aset/form/fisik/ubah/').$af['idf'] ?>" class="btn btn-sm btn-circle btn-info m-1" title="Ubah"><i class="fa fa-fw fa-edit"></i></a>
              <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapusasetfisik" data-toggle="modal" data-target="#hapusasetfisikModal" data-id="<?=$af['idf'] ?>" data-nama="<?=$af['nama'] ?>" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
            </td>
          </tr>
        <?php endforeach ?>
      <?php }else{ ?>
        <tr>
          <td colspan="12" class="text-center">Tidak ada data yang tersedia!</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusasetfisikModal" tabindex="-1" role="dialog" aria-labelledby="hapusasetfisikModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusasetfisikModalLabel">Hapus Aset Fisik</h5>
      </div>
      <form id="formhapusasetfisik" action="" method="post">
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
<div class="modal fade" id="detailasetfisikModal" tabindex="-1" role="dialog" aria-labelledby="detailasetfisikModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailasetfisikModalLabel">Detail Aset Fisik</h5>
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
              <td>Nama Aset</td>
              <td>:</td>
              <th><span id="nama">nama</span></th>
            </tr>
            <tr>
              <td>Sub Klasifikasi</td>
              <td>:</td>
              <th><span id="klasifikasi">klasifikasi</span></th>
            </tr>
            <tr>
              <td>Jenis Aset</td>
              <td>:</td>
              <th><span id="jenis">jenis</span></th>
            </tr>
            <tr>
              <td>Spesifikasi</td>
              <td>:</td>
              <th><span id="spesifikasi" class="text-justify">spesifikasi</span></th>
            </tr>
            <tr>
              <td>Pemilik Aset</td>
              <td>:</td>
              <th><span id="pemilik">pemilik</span></th>
            </tr>
            <tr>
              <td>Penyedia Aset</td>
              <td>:</td>
              <th><span id="penyedia">penyedia</span></th>
            </tr>
            <tr>
              <td>Pemegang Aset</td>
              <td>:</td>
              <th><span id="pemegang">pemegang</span></th>
            </tr>
            <tr>
              <td>Lokasi Aset</td>
              <td>:</td>
              <th><span id="lokasi">lokasi</span></th>
            </tr>
            <tr>
              <td>Masa Berlaku</td>
              <td>:</td>
              <th><span id="berlaku">berlaku</span></th>
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