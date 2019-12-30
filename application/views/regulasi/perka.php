<div class="card shadow border-primary">
  <div class="card-header bg-primary text-white">
    Regulasi Peraturan Kepala LPSE
    <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
        <button type="button" class="btn btn-sm btn-circle btn-primary mr-2 float-right" id="tambah" data-toggle="modal" data-target="#tambahModal" title="Tambah Regulasi"><i class="fa fa-fw fa-plus"></i></button>
    <?php } ?>
  </div>
  <div class="card-body table-responsive">
    <?php if($perka){ ?>
        <table class="table table-sm table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr class="bg-primary text-white">
                    <th>
                        <div class="row text-center align-items-center">
                            <div class="col-lg-1">Nomor/Tahun</div>
                            <div class="col-lg-3">Nama Regulasi</div>
                            <div class="col-lg-3">Tentang</div>
                            <div class="col-lg-2">Tanggal Berlaku</div>
                            <div class="col-lg-2">Tanggal Berakhir</div>
                            <div class="col-lg-1">Opsi</div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
          <?php $no=1; foreach ($perka as $pk): ?>
          <?php
          date_default_timezone_set('Asia/Makassar'); // 2019-09-10 
            $tgl_berlaku = substr($pk['berlaku'], 8, 2);
            $bln_berlaku = substr($pk['berlaku'], 5, 2);
            $thn_berlaku = substr($pk['berlaku'], 0, 4);

            $tgl_berakhir = substr($pk['berakhir'], 8, 2);
            $bln_berakhir = substr($pk['berakhir'], 5, 2);
            $thn_berakhir = substr($pk['berakhir'], 0, 4);

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

            $tgl_berlaku = $tgl_berlaku.' '.$bulan_berlaku.' '.$thn_berlaku;
            $tgl_berakhir = $tgl_berakhir.' '.$bulan_berakhir.' '.$thn_berakhir;
        ?>
                <tr>
                    <td>
                        <div class="row align-items-center text-center">
                            <div class="col-lg-1 p-2"><?=$pk['nomor'].' / '.$pk['tahun'] ?></div>
                            <div class="col-lg-3 p-2"><?=$pk['nama'] ?></div>
                            <div class="col-lg-3 p-2"><?=$pk['tentang'] ?></div>
                            <div class="col-lg-2 p-2"><?=$tgl_berlaku ?></div>
                            <div class="col-lg-2 p-2"><?=$tgl_berakhir ?></div>
                            <div class="col-lg-1 p-2">
                                <button type="button" class="btn btn-sm btn-circle btn-success" id="file" data-toggle="modal" data-target="#fileModal" data-nomor="<?=$pk['nomor'] ?>" data-tahun="<?=$pk['tahun'] ?>" data-nama="<?=$pk['nama'] ?>" data-file="<?=$pk['file'] ?>" title="Dokumen"><i class="fa fa-fw fa-file"></i></button>
                                <?php if($akses_menu['username']==$pengguna_masuk['username']){ ?>
                                    <button type="button" class="btn btn-sm btn-circle btn-info" id="ubah" data-toggle="modal" data-target="#ubahModal" data-id="<?=$pk['id'] ?>" data-nomor="<?=$pk['nomor'] ?>" data-tahun="<?=$pk['tahun'] ?>" data-nama="<?=$pk['nama'] ?>" data-tentang="<?=$pk['tentang'] ?>" data-berlaku="<?=$pk['berlaku'] ?>" data-berakhir="<?=$pk['berakhir'] ?>" data-file="<?=$pk['file'] ?>" title="Ubah <?=$pk['nama'] ?>"><i class="fa fa-fw fa-edit"></i></button>
                                    <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$pk['id'] ?>" data-nomor="<?=$pk['nomor'] ?>" data-tahun="<?=$pk['tahun'] ?>" data-nama="<?=$pk['nama'] ?>" data-file="<?=$pk['file'] ?>" title="Hapus <?=$pk['nama'] ?>"><i class="fa fa-fw fa-trash"></i></button>
                                <?php } ?>
                            </div>
                        </div>
                    </td>
                </tr>
          <?php endforeach ?>
      </tbody></table>
    <?php }else{ ?>
      <div class="alert alert-secondary text-center" role="alert">Tidak ada data yang tersedia!</div>
    <?php } ?>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Regulasi</h5>
      </div>
      <form id="formtambah" action="<?=base_url('regulasi/tambahperka') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="nomor">Nomor Peraturan</label>
                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor Peraturan" required>
                </div>
                <div class="col-md-3">
                    <label for="tahun">Tahun Peraturan</label>
                    <input type="number" maxlength="4" class="form-control" id="tahun" name="tahun" placeholder="Tahun Peraturan" required>
                </div>
                <div class="col-md-3">
                    <label for="berlaku">Tanggal Berlaku</label>
                    <input type="date" class="form-control" id="berlaku" name="berlaku" placeholder="Tanggal Berlaku" required>
                </div>
                <div class="col-md-3">
                    <label for="berakhir">Tanggal Berakhir</label>
                    <input type="date" class="form-control" id="berakhir" name="berakhir" placeholder="Tanggal Berakhir" required>
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Nama Peraturan</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Peraturan" required>
            </div>
            <div class="form-group">
                <label for="tentang">Tentang</label>
                <textarea class="form-control" id="tentang" name="tentang" placeholder="Tentang" required></textarea>
            </div>
            <div class="form-group">
                <label for="file">File Upload</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file" name="file" required>
                  <label class="custom-file-label" for="file" data-browse="Pilih File">Pilih file dengan format <strong>.pdf</strong>!</label>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Perka</h5>
      </div>
      <form id="formhapus" action="" method="post">
        <div class="modal-body">
          <p id="ket">Keterangan</p>
          <input class="form-control" type="hidden" id="nomor" name="nomor">
          <input class="form-control" type="hidden" id="tahun" name="tahun">
          <input class="form-control" type="hidden" id="nama" name="nama">
          <input class="form-control" type="hidden" id="file" name="file">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Ubah -->
<div class="modal fade" id="ubahModal" tabindex="-1" role="dialog" aria-labelledby="ubahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahModalLabel">Ubah Perka</h5>
      </div>
      <form id="formubah" action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group row">
                <div class="col-md-3">
                    <label for="nomor">Nomor Peraturan</label>
                    <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor Peraturan" required>
                </div>
                <div class="col-md-3">
                    <label for="tahun">Tahun Peraturan</label>
                    <input type="number" maxlength="4" class="form-control" id="tahun" name="tahun" placeholder="Tahun Peraturan" required>
                </div>
                <div class="col-md-3">
                    <label for="berlaku">Tanggal Berlaku</label>
                    <input type="date" class="form-control" id="berlaku" name="berlaku" placeholder="Tanggal Berlaku" required>
                </div>
                <div class="col-md-3">
                    <label for="berakhir">Tanggal Berakhir</label>
                    <input type="date" class="form-control" id="berakhir" name="berakhir" placeholder="Tanggal Berakhir" required>
                </div>
            </div>
            <div class="form-group">
                <label for="nama">Nama Peraturan</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Peraturan" required>
            </div>
            <div class="form-group">
                <label for="tentang">Tentang</label>
                <textarea class="form-control" id="tentang" name="tentang" placeholder="Tentang" required></textarea>
            </div>
            <div class="form-group">
                <label for="file">File Upload</label>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="file" name="file">
                  <input type="hidden" class="custom-file-input" id="filelama" name="filelama">
                  <label class="custom-file-label" for="file" data-browse="Pilih File">Pilih file dengan format <strong>.pdf</strong>!</label>
                  <small class="text-muted">Kosongkan jika tidak ingin mengubah file!</small>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-info" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal File -->
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="fileModalLabel">Dokumen Perka</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <embed id="sumberfile" width="100%" height="750" src="file.pdf" type="application/pdf" />
        </div>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        var nomor = $(this).data('nomor');
        var tahun = $(this).data('tahun');
        var nama = $(this).data('nama');
        var file = $(this).data('file');
        $("#hapusModal #nomor").val(nomor);
        $("#hapusModal #tahun").val(tahun);
        $("#hapusModal #nama").val(nama);
        $("#hapusModal #file").val(file);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus <strong>"+nama+"</strong> Nomor <strong>"+nomor+"</strong> Tahun <strong>"+tahun+"</strong>?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>regulasi/hapusperka/"+id);
    });

    $(document).on("click", "#ubah", function() {
        var id = $(this).data('id');
        var nomor = $(this).data('nomor');
        var tahun = $(this).data('tahun');
        var nama = $(this).data('nama');
        var tentang = $(this).data('tentang');
        var berlaku = $(this).data('berlaku');
        var berakhir = $(this).data('berakhir');
        var file = $(this).data('file');
        $("#ubahModal #nomor").val(nomor);
        $("#ubahModal #tahun").val(tahun);
        $("#ubahModal #nama").val(nama);
        $("#ubahModal #tentang").html(tentang);
        $("#ubahModal #tahun").val(tahun);
        $("#ubahModal #berlaku").val(berlaku);
        $("#ubahModal #berakhir").val(berakhir);
        $("#ubahModal #filelama").val(file);
        $("#ubahModal #formubah").attr("action","<?php echo base_url() ?>regulasi/ubahperka/"+id);
    });

    $(document).on("click", "#file", function() {
        var nomor = $(this).data('nomor');
        var tahun = $(this).data('tahun');
        var nama = $(this).data('nama');
        var file = $(this).data('file');
        $("#fileModal #fileModalLabel").html("Dokumen "+nama+" Nomor "+nomor+" Tahun "+tahun);
        $("#fileModal #sumberfile").attr("src","<?php echo base_url() ?>uploads/pdf/perka/"+file);
    });

</script>