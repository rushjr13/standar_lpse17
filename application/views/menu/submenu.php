<div class="row justify-content-md-center">
  <div class="col-md-12">
    <div class="card border-primary shadow mb-4">
      <div class="card-header bg-primary text-white py-3">
        <strong><?=$menudata['nama_menu'] ?></strong>
        <a href="<?=base_url('menu') ?>" class="btn btn-sm btn-circle btn-secondary float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
        <button type="button" class="btn btn-sm btn-circle btn-primary float-right mr-1" id="tambah" data-toggle="modal" data-target="#tambahModal" title="Tambah <?=$subjudul.' '.$menudata['nama_menu'] ?>"><i class="fa fa-fw fa-plus"></i></button>
      </div>
      <div class="card-body">
        <?php if($submenubymenu){ ?>
          <table class="table table-sm table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
            <tbody>
              <?php $no=1; foreach ($submenubymenu as $sm): ?>
                <tr>
                  <td class="align-middle" ><i class="fa fa-fw <?=$sm['icon'] ?>"></i> <?=$sm['nama_submenu'] ?><br><small><?=base_url().$sm['link'] ?></small></td>
                  <td class="align-middle text-right">
                    <button type="button" class="btn btn-sm btn-circle btn-info" id="ubah" data-toggle="modal" data-target="#ubahModal" data-id="<?=$sm['id_submenu'] ?>" data-menu="<?=$sm['id_menu'] ?>" data-nama="<?=$sm['nama_submenu'] ?>" data-link="<?=$sm['link'] ?>" data-icon="<?=$sm['icon'] ?>" title="Ubah <?=$sm['nama_submenu'] ?>"><i class="fa fa-fw fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$sm['id_submenu'] ?>" data-menu="<?=$sm['id_menu'] ?>" data-nama="<?=$sm['nama_submenu'] ?>" title="Hapus <?=$sm['nama_submenu'] ?>"><i class="fa fa-fw fa-trash"></i></button>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        <?php }else{ ?>
          <div class="alert alert-secondary text-center" role="alert">Tidak ada data yang tersedia!</div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Sub Menu <?=$menudata['nama_menu'] ?></h5>
      </div>
      <form id="formtambah" action="<?=base_url('menu/tambahsubmenu/').$menudata['id_menu'] ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="nama_submenu" class="col-sm-3 col-form-label">Nama Sub Menu</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="nama_submenu" name="nama_submenu" placeholder="Nama Sub Menu" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="link" class="col-sm-3 col-form-label">URL/Link Sub Menu</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="link" name="link" placeholder="URL/Link Sub Menu" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="icon" class="col-sm-3 col-form-label">Icon</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="icon" name="icon" placeholder="Icon" required>
              <small class="text-muted ml-2">Pilih Icon dari <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a></small>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" id="tblstatus" class="btn btn-sm btn-circle btn-primary" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
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
        <h5 class="modal-title" id="hapusModalLabel">Hapus Sub Menu <?=$menudata['nama_menu'] ?></h5>
      </div>
      <form id="formhapus" action="" method="post">
        <div class="modal-body">
          <p id="ket">Keterangan</p>
          <input class="form-control" type="hidden" id="nama_submenu" name="nama_submenu">
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
        <h5 class="modal-title" id="ubahModalLabel">Ubah Sub Menu <?=$menudata['nama_menu'] ?></h5>
      </div>
      <form id="formubah" action="" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="nama_submenu" class="col-sm-3 col-form-label">Nama Sub Menu</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="nama_submenu" name="nama_submenu" placeholder="Nama Sub Menu" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="link" class="col-sm-3 col-form-label">URL/Link Sub Menu</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="link" name="link" placeholder="URL/Link Sub Menu" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="icon" class="col-sm-3 col-form-label">Icon</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="icon" name="icon" placeholder="Icon" required>
              <small class="text-muted ml-2">Pilih Icon dari <a href="https://fontawesome.com/icons" target="_blank">Font Awesome</a></small>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" id="tblstatus" class="btn btn-sm btn-circle btn-info" title="Simpan"><i class="fa fa-fw fa-save"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#hapus", function() {
        var id = $(this).data('id');
        var menu = $(this).data('menu');
        var nama = $(this).data('nama');
        $("#hapusModal #nama_submenu").val(nama);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus menu <strong>"+nama+"</strong> ?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>menu/hapussubmenu/"+menu+"/"+id);
    });

    $(document).on("click", "#ubah", function() {
        var id = $(this).data('id');
        var menu = $(this).data('menu');
        var nama = $(this).data('nama');
        var link = $(this).data('link');
        var icon = $(this).data('icon');
        $("#ubahModal #nama_submenu").val(nama);
        $("#ubahModal #link").val(link);
        $("#ubahModal #icon").val(icon);
        $("#ubahModal #formubah").attr("action","<?php echo base_url() ?>menu/ubahsubmenu/"+menu+"/"+id);
    });

</script>