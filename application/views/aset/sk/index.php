<div class="card shadow border-primary">
	<div class="card-header shadow-sm bg-primary text-white">
		SK Koordinator Aset
    <?php if($akses_menu>0){ ?>
  		<button type="button" class="btn btn-sm btn-circle btn-primary shadow-sm float-right" data-toggle="modal" data-target="#tambahModal" title="Tambah SK Koordinator Aset"><i class="fa fa-fw fa-plus"></i></button>
    <?php } ?>
	</div>
	<div class="card-body table-responsive">
		<table class="table table-sm table-borderless table-striped table-hover shadow-sm" id="dataTable" width="100%" cellspacing="0">
      <thead class="bg-primary text-white">
        <tr>
          <th class="align-middle text-center" width="3%">NO</th>
          <th class="align-middle text-center">NOMOR<br>TANGGAL</th>
          <th class="align-middle text-center">NAMA</th>
          <th class="align-middle text-center">TENTANG</th>
          <th class="align-middle text-center">MASA BERLAKU</th>
          <?php if($akses_menu>0){ ?>
            <th class="align-middle text-center" width="6%">OPSI</th>
          <?php } ?>
        </tr>
      </thead>
      <tbody>
        <?php if($aset_sk){ ?>
          <?php $no=1; foreach ($aset_sk as $sk): ?>
          <?php
            date_default_timezone_set('Asia/Makassar');

            // TANGGAL SK
            $tgl_sk = substr($sk['tanggal'], 8, 2);
            $bln_sk = substr($sk['tanggal'], 5, 2);
            $thn_sk = substr($sk['tanggal'], 0, 4);

            if($bln_sk=='01'){
                $bulan_sk='Januari';
            } else if($bln_sk=='02'){
                $bulan_sk='Februari';
            } else if($bln_sk=='03'){
                $bulan_sk='Maret';
            } else if($bln_sk=='04'){
                $bulan_sk='April';
            } else if($bln_sk=='05'){
                $bulan_sk='Mei';
            } else if($bln_sk=='06'){
                $bulan_sk='Juni';
            } else if($bln_sk=='07'){
                $bulan_sk='Juli';
            } else if($bln_sk=='08'){
                $bulan_sk='Agustus';
            } else if($bln_sk=='09'){
                $bulan_sk='September';
            } else if($bln_sk=='10'){
                $bulan_sk='Oktober';
            } else if($bln_sk=='11'){
                $bulan_sk='November';
            } else if($bln_sk=='12'){
                $bulan_sk='Desember';
            }

            $tanggal_sk = $tgl_sk.' '.$bulan_sk.' '.$thn_sk;

            // TANGGAL BERLAKU
            $tgl_berlaku = substr($sk['berlaku'], 8, 2);
            $bln_berlaku = substr($sk['berlaku'], 5, 2);
            $thn_berlaku = substr($sk['berlaku'], 0, 4);

            if($bln_berlaku=='01'){
                $bulan_berlaku='Januari';
            } else if($bln_berlaku=='02'){
                $bulan_berlaku='Februari';
            } else if($bln_berlaku=='03'){
                $bulan_berlaku='Maret';
            } else if($bln_berlaku=='04'){
                $bulan_berlaku='April';
            } else if($bln_berlaku=='05'){
                $bulan_berlaku='Mei';
            } else if($bln_berlaku=='06'){
                $bulan_berlaku='Juni';
            } else if($bln_berlaku=='07'){
                $bulan_berlaku='Juli';
            } else if($bln_berlaku=='08'){
                $bulan_berlaku='Agustus';
            } else if($bln_berlaku=='09'){
                $bulan_berlaku='September';
            } else if($bln_berlaku=='10'){
                $bulan_berlaku='Oktober';
            } else if($bln_berlaku=='11'){
                $bulan_berlaku='November';
            } else if($bln_berlaku=='12'){
                $bulan_berlaku='Desember';
            }

            $tanggal_berlaku = $tgl_berlaku.' '.$bulan_berlaku.' '.$thn_berlaku;

            // TANGGAL BERAKHIR
            $tgl_berakhir = substr($sk['berakhir'], 8, 2);
            $bln_berakhir = substr($sk['berakhir'], 5, 2);
            $thn_berakhir = substr($sk['berakhir'], 0, 4);

            if($bln_berakhir=='01'){
                $bulan_berakhir='Januari';
            } else if($bln_berakhir=='02'){
                $bulan_berakhir='Februari';
            } else if($bln_berakhir=='03'){
                $bulan_berakhir='Maret';
            } else if($bln_berakhir=='04'){
                $bulan_berakhir='April';
            } else if($bln_berakhir=='05'){
                $bulan_berakhir='Mei';
            } else if($bln_berakhir=='06'){
                $bulan_berakhir='Juni';
            } else if($bln_berakhir=='07'){
                $bulan_berakhir='Juli';
            } else if($bln_berakhir=='08'){
                $bulan_berakhir='Agustus';
            } else if($bln_berakhir=='09'){
                $bulan_berakhir='September';
            } else if($bln_berakhir=='10'){
                $bulan_berakhir='Oktober';
            } else if($bln_berakhir=='11'){
                $bulan_berakhir='November';
            } else if($bln_berakhir=='12'){
                $bulan_berakhir='Desember';
            }

            $tanggal_berakhir = $tgl_berakhir.' '.$bulan_berakhir.' '.$thn_berakhir;
          ?>
            <tr>
              <td class="align-middle text-center"><?=$no++ ?></td>
              <td class="align-middle text-center"><?=$sk['nomor'] ?><br><?=$tanggal_sk ?></td>
              <td class="align-middle text-center"><button id="file" class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#fileModal" title="Lihat File <?=$sk['file'] ?>" data-nomor="<?=$sk['nomor'] ?>" data-tanggal="<?=$tanggal_sk ?>" data-nama="<?=$sk['nama'] ?>" data-file="<?=$sk['file'] ?>"><i class="fa fa-w fa-file-pdf"></i> <?=$sk['nama'] ?></button></td>
              <td class="align-middle text-center"><?=$sk['tentang'] ?></td>
              <td class="align-middle text-center"><?=$tanggal_berlaku ?><br>s.d.<br><?=$tanggal_berakhir ?></td>
              <?php if($akses_menu>0){ ?>
                <td class="align-middle text-center">
                  <button tipe="button" class="btn btn-sm btn-circle btn-info shadow-sm" id="ubah" data-toggle="modal" data-target="#ubahModal" title="Ubah" data-id="<?=$sk['id'] ?>" data-nomor="<?=$sk['nomor'] ?>" data-tanggal="<?=$sk['tanggal'] ?>" data-nama="<?=$sk['nama'] ?>" data-tentang="<?=$sk['tentang'] ?>" data-berlaku="<?=$sk['berlaku'] ?>" data-berakhir="<?=$sk['berakhir'] ?>" data-file="<?=$sk['file'] ?>"><i class="fa fa-fw fa-edit"></i></button>
                  <button tipe="button" class="btn btn-sm btn-circle btn-danger shadow-sm" id="hapus" data-toggle="modal" data-target="#hapusModal" title="Hapus" data-id="<?=$sk['id'] ?>" data-nomor="<?=$sk['nomor'] ?>" data-tanggal="<?=$tanggal_sk ?>" data-nama="<?=$sk['nama'] ?>" data-file="<?=$sk['file'] ?>"><i class="fa fa-fw fa-trash"></i></button>
                </td>
              <?php } ?>
            </tr>
          <?php endforeach ?>
        <?php }else{ ?>
          <tr>
            <?php if($akses_menu>0){ ?>
            <td colspan="7" class="align-middle text-center">Tidak ada data yang tersedia!</td>
            <?php }else{ ?>
            <td colspan="6" class="align-middle text-center">Tidak ada data yang tersedia!</td>
            <?php } ?>
          </tr>
        <?php } ?>
      </tbody>
    </table>
	</div>
</div>

<!-- Modal Tambah SK -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah SK Koordinator Aset</h5>
      </div>
      <form id="formtambah" action="<?=base_url('aset/sk/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode SK</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" value="SK<?=time() ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="nomor" class="col-sm-2 col-form-label">Nomor SK</label>
            <div class="col-sm-4">
              <input type="text" class="form-control shadow-sm" id="nomor" name="nomor" placeholder="Nomor SK" required>
            </div>
            <label for="tanggal" class="col-sm-2 col-form-label text-right">Tanggal SK</label>
            <div class="col-sm-4">
              <input type="date" class="form-control shadow-sm" id="tanggal" name="tanggal" value="<?=date('Y-m-d') ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama SK</label>
            <div class="col-sm-10">
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Nama SK" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="tentang" class="col-sm-2 col-form-label">Tentang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control shadow-sm" id="tentang" name="tentang" placeholder="SK Tentang" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="berlaku" class="col-sm-2 col-form-label">Tanggal Berlaku</label>
            <div class="col-sm-4">
              <input type="date" class="form-control shadow-sm" id="berlaku" name="berlaku" value="<?=date('Y-m-d') ?>" required>
            </div>
            <label for="berakhir" class="col-sm-2 col-form-label text-right">Tanggal Berakhir</label>
            <div class="col-sm-4">
              <input type="date" class="form-control shadow-sm" id="berakhir" name="berakhir" value="<?=date('Y-m-d') ?>" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="file_upload" class="col-sm-2 col-form-label">File</label>
            <div class="col-sm-10">
              <div class="custom-file">
                <input type="file" class="custom-file-input shadow-sm" id="file_upload" name="file_upload" required>
                <label class="custom-file-label shadow-sm" for="file_upload" data-browse="Pilih File">Pilih file dengan format <strong>.pdf</strong>!</label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-primary shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah SK -->
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahModalLabel">Tambah SK Koordinator Aset</h5>
      </div>
      <form id="formubah" action="<?=base_url('aset/sk/ubah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">Kode SK</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext font-weight-bold" id="id" name="id" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="nomor" class="col-sm-2 col-form-label">Nomor SK</label>
            <div class="col-sm-4">
              <input type="text" class="form-control shadow-sm" id="nomor" name="nomor" placeholder="Nomor SK" required>
            </div>
            <label for="tanggal" class="col-sm-2 col-form-label text-right">Tanggal SK</label>
            <div class="col-sm-4">
              <input type="date" class="form-control shadow-sm" id="tanggal" name="tanggal" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama SK</label>
            <div class="col-sm-10">
              <input type="text" class="form-control shadow-sm" id="nama" name="nama" placeholder="Nama SK" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="tentang" class="col-sm-2 col-form-label">Tentang</label>
            <div class="col-sm-10">
              <input type="text" class="form-control shadow-sm" id="tentang" name="tentang" placeholder="SK Tentang" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="berlaku" class="col-sm-2 col-form-label">Tanggal Berlaku</label>
            <div class="col-sm-4">
              <input type="date" class="form-control shadow-sm" id="berlaku" name="berlaku" required>
            </div>
            <label for="berakhir" class="col-sm-2 col-form-label text-right">Tanggal Berakhir</label>
            <div class="col-sm-4">
              <input type="date" class="form-control shadow-sm" id="berakhir" name="berakhir" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="file_upload" class="col-sm-2 col-form-label">File</label>
            <input type="hidden" class="form-control shadow-sm" id="file_lama" name="file_lama" required>
            <div class="col-sm-10">
              <div class="custom-file">
                <input type="file" class="custom-file-input shadow-sm" id="file_upload" name="file_upload">
                <label class="custom-file-label shadow-sm" for="file_upload" data-browse="Pilih File">Pilih file dengan format <strong>.pdf</strong>!</label>
                <small class="text-info ml-2" style="font-style: italic;">Kosongkan jika tidak ingin mengubah file sk!</small>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-primary shadow-sm" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus SK -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus SK Koordinator Aset</h5>
      </div>
      <form id="formhapus" action="" method="post">
        <div class="modal-body">
          <p id="ket" align="center">keterangan</p>
          <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="id" name="id">
          <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="nomor" name="nomor">
          <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="tanggal" name="tanggal">
          <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="nama" name="nama">
          <input type="hidden" readonly class="form-control-plaintext font-weight-bold" id="file" name="file">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger shadow-sm" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal File SK -->
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fileModalLabel">File SK Koordinator Aset</h5>
        <a href="<?=base_url('aset/sk') ?>" class="close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <iframe id="framefile" class="embed-responsive-item" src="" allowfullscreen width="100%" height="750px"></iframe>
      </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#file", function() {
        var nomor = $(this).data('nomor');
        var tanggal = $(this).data('tanggal');
        var nama = $(this).data('nama');
        var file = $(this).data('file');
        $("#fileModal #fileModalLabel").html('File '+nama+' Nomor '+nomor+' tanggal '+tanggal);
        $("#fileModal #framefile").attr('src', '<?=base_url('uploads/pdf/sk/') ?>'+file);
    });

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        var nomor = $(this).data('nomor');
        var tanggal = $(this).data('tanggal');
        var nama = $(this).data('nama');
        var file = $(this).data('file');
        $("#hapusModal #ket").html('Anda ingin menghapus <strong>'+nama+'</strong> nomor <strong>'+nomor+'</strong> tanggal <strong>'+tanggal+'</strong>?');
        $("#hapusModal #id").val(id);
        $("#hapusModal #nomor").val(nomor);
        $("#hapusModal #tanggal").val(tanggal);
        $("#hapusModal #nama").val(nama);
        $("#hapusModal #file").val(file);
        $("#hapusModal #formhapus").attr('action', '<?=base_url('aset/sk/hapus/') ?>'+id);
    });

    $(document).on("click", "#ubah", function() {
        var id = $(this).data('id');
        var nomor = $(this).data('nomor');
        var tanggal = $(this).data('tanggal');
        var nama = $(this).data('nama');
        var tentang = $(this).data('tentang');
        var berlaku = $(this).data('berlaku');
        var berakhir = $(this).data('berakhir');
        var file = $(this).data('file');
        $("#ubahModal #id").val(id);
        $("#ubahModal #nomor").val(nomor);
        $("#ubahModal #tanggal").val(tanggal);
        $("#ubahModal #nama").val(nama);
        $("#ubahModal #tentang").val(tentang);
        $("#ubahModal #berlaku").val(berlaku);
        $("#ubahModal #berakhir").val(berakhir);
        $("#ubahModal #file_lama").val(file);
        $("#ubahModal #formubah").attr('action', '<?=base_url('aset/sk/ubah/') ?>'+id);
    });

</script>