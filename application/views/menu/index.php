<div class="row justify-content-md-center">
  <div class="col-md-12">
    <div class="card border-primary shadow mb-4">
      <div class="card-header bg-primary text-white py-3">
        <strong>Daftar Menu</strong>
        <button type="button" class="btn btn-sm btn-circle btn-primary float-right" id="tambah" data-toggle="modal" data-target="#tambahModal" title="Tambah Menu"><i class="fa fa-fw fa-plus"></i></button>
      </div>
      <div class="card-body">
        <?php if($menu){ ?>
          <table class="table table-sm table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
            <tbody>
              <?php $no=1; foreach ($menu as $mn): ?>
                <tr>
                  <td class="align-middle" ><?=$mn['nama_menu'] ?></td>
                  <td class="align-middle text-right">
                    <a href="<?=base_url('menu/submenu/').$mn['id_menu'] ?>" class="btn btn-sm btn-circle btn-secondary" title="Sub Menu <?=$mn['nama_menu'] ?>"><i class="fa fa-fw fa-list"></i></a>
                    <button type="button" class="btn btn-sm btn-circle btn-info" id="ubah" data-toggle="modal" data-target="#ubahModal" data-id="<?=$mn['id_menu'] ?>" data-nama="<?=$mn['nama_menu'] ?>" title="Ubah <?=$mn['nama_menu'] ?>"><i class="fa fa-fw fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-circle btn-danger" id="hapus" data-toggle="modal" data-target="#hapusModal" data-id="<?=$mn['id_menu'] ?>" data-nama="<?=$mn['nama_menu'] ?>" title="Hapus <?=$mn['nama_menu'] ?>"><i class="fa fa-fw fa-trash"></i></button>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahModalLabel">Tambah Menu</h5>
      </div>
      <form id="formtambah" action="<?=base_url('menu/tambah') ?>" method="post">
        <div class="modal-body">
          <input class="form-control" type="text" id="nama_menu" name="nama_menu" placeholder="Nama Menu" required>
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
        <h5 class="modal-title" id="hapusModalLabel">Hapus Menu</h5>
      </div>
      <form id="formhapus" action="" method="post">
        <div class="modal-body">
          <p id="ket">Keterangan</p>
          <input class="form-control" type="hidden" id="nama_menu" name="nama_menu">
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ubahModalLabel">Ubah Menu</h5>
      </div>
      <form id="formubah" action="" method="post">
        <div class="modal-body">
          <input class="form-control" type="text" id="nama_menu" name="nama_menu" placeholder="Nama Menu" required>
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
        var nama = $(this).data('nama');
        $("#hapusModal #nama_menu").val(nama);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus menu <strong>"+nama+"</strong> ?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>menu/hapus/"+id);
    });

    $(document).on("click", "#ubah", function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        $("#ubahModal #nama_menu").val(nama);
        $("#ubahModal #formubah").attr("action","<?php echo base_url() ?>menu/ubah/"+id);
    });

</script>