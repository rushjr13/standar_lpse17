<div class="row justify-content-md-center">
  <div class="col-md-6">
    <div class="card border-primary shadow mb-4">
      <div class="card-header bg-primary text-white py-3">
        <strong>Menu Yang Dapat Diakses Oleh <?=$pengguna['nama_lengkap'] ?></strong>
        <a href="<?=base_url('pengguna') ?>" class="btn btn-sm btn-circle btn-secondary float-right" title="Kembali"><i class="fa fa-fw fa-times"></i></a>
      </div>
      <div class="card-body">
        <?php if($menu){ ?>
          <table class="table table-sm table-borderless table-hover" id="dataTable" width="100%" cellspacing="0">
            <tbody>
              <?php $no=1; foreach ($menu as $mn): ?>
                <tr>
                  <td class="align-middle" ><?=$mn['nama_menu'] ?></td>
                  <td class="align-middle" width="5%">
                    <?php
                      $this->db->select('*');
                      $this->db->from('akses_menu');
                      $this->db->where('id_menu', $mn['id_menu']);
                      $this->db->where('username', $pengguna['username']);
                      $akses =  $this->db->get()->row_array();
                    ?>
                    <?php if($akses){ ?>
                      <a href="<?=base_url('menu/akses/').$pengguna['username'].'/'.$mn['id_menu'].'/off' ?>" class="btn btn-sm btn-circle btn-success" title="Akses Menu Diberikan"><i class="fa fa-fw fa-check"></i></a>
                    <?php }else{ ?>
                      <a href="<?=base_url('menu/akses/').$pengguna['username'].'/'.$mn['id_menu'].'/on' ?>" class="btn btn-sm btn-circle btn-danger" title="Akses Menu Tidak Diberikan"><i class="fa fa-fw fa-power-off"></i></a>
                    <?php } ?>
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

<!-- Modal Akses -->
<div class="modal fade" id="aksesModal" tabindex="-1" role="dialog" aria-labelledby="aksesModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="aksesModalLabel">Akses Menu</h5>
      </div>
      <form id="formakses" action="" method="post">
        <div class="modal-body">
          <p id="ktr">Keterangan</p>
          <input class="form-control" type="text" id="ket" name="ket">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger" title="Hapus" id="tblakses"><i class="fa fa-fw fa-trash" id="iconakses"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#aks", function() {
        var menu = $(this).data('menu');
        var username = $(this).data('username');
        var ket = $(this).data('ket');
        var tbl = $(this).data('tbl');
        var icon = $(this).data('icon');
        $("#aksesModal #ket").val(ket);
        $("#aksesModal #ktr").html("Anda yakin ingin "+ket+" ?");
        $("#aksesModal #formakses").attr("action","<?php echo base_url() ?>menu/akses/"+username+"/"menu);
        $("#aksesModal #tblakses").attr("class",tbl);
        $("#aksesModal #iconakses").attr("class",icon);
    });

</script>