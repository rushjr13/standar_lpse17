<!-- DataTales Example -->
<div class="card border-primary shadow mb-4">
  <div class="card-header bg-primary text-white py-3">
    <strong>Data Pengguna</strong>
    <a href="<?=base_url('pengguna/tambah') ?>" class="btn btn-sm btn-circle btn-primary float-right shadow-sm" title="Tambah Pengguna"><i class="fa fa-fw fa-user-plus"></i></a>
  </div>
  <div class="card-body">
    <div class="row justify-content-md-center">
      <?php foreach ($daftarpengguna as $p): ?>
        <?php
      date_default_timezone_set('Asia/Makassar');
        $tgl = date('d', $p['tgl_daftar']);
        $bln = date('F', $p['tgl_daftar']);
        $thn = date('Y', $p['tgl_daftar']);
        $hari = date('l', $p['tgl_daftar']);

        if($bln=='January'){
            $bulan='Januari';
        } else if($bln=='February'){
            $bulan='Februari';
        } else if($bln=='March'){
            $bulan='Maret';
        } else if($bln=='April'){
            $bulan='April';
        } else if($bln=='May'){
            $bulan='Mei';
        } else if($bln=='June'){
            $bulan='Juni';
        } else if($bln=='July'){
            $bulan='Juli';
        } else if($bln=='August'){
            $bulan='Agustus';
        } else if($bln=='September'){
            $bulan='September';
        } else if($bln=='October'){
            $bulan='Oktober';
        } else if($bln=='November'){
            $bulan='November';
        } else if($bln=='December'){
            $bulan='Desember';
        }

        if($hari=='Sunday'){
          $hr='Minggu';
        } else if($hari=='Monday'){
          $hr='Senin';
        } else if($hari=='Tuesday'){
          $hr='Selasa';
        } else if($hari=='Wednesday'){
          $hr='Rabu';
        } else if($hari=='Thursday'){
          $hr='Kamis';
        } else if($hari=='Friday'){
          $hr='Jumat';
        } else if($hari=='Saturday'){
          $hr='Sabtu';
        }

        $tgl_daftar = $hr.', '.$tgl.' '.$bulan.' '.$thn;

      if($p['status']=='Aktif'){
        $warna = 'success';
        $warnaform = 'warning';
        $icon = 'fa fa-fw fa-user-check';
        $iconform = 'fa fa-fw fa-user-times';
        $title = 'Non Aktifkan';
        $status = 'Belum Aktif';
      }else{
        $warna = 'warning';
        $warnaform = 'success';
        $icon = 'fa fa-fw fa-user-times';
        $iconform = 'fa fa-fw fa-user-check';
        $title = 'Aktifkan';
        $status = 'Aktif';
      }
    ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-2">
          <div class="card-deck mb-3">
            <div class="card shadow-sm border-<?=$warna ?>">
              <img src="<?=base_url('assets/img/pengguna/').$p['foto'] ?>" class="card-img-top shadow-sm rounded-circle">
              <div class="card-body text-center">
                <h5 class="card-title"><span class="font-weight-bold"><?=$p['nama_lengkap'] ?></span></h5>
                <p class="card-text"><?=$p['email'] ?></p>
                <small class="text-muted">Terdaftar sejak :<br><?=$tgl_daftar ?></small>
              </div>
              <div class="card-footer text-center">
                <a href="<?=base_url('pengguna/akses/').$p['username'] ?>" class="btn btn-sm btn-circle btn-secondary shadow-sm" title="Akses Menu"><i class="fa fa-fw fa-list"></i></a>
                <button type="button" id="status" data-toggle="modal" data-target="#statusModal" data-username="<?=$p['username'] ?>" data-nama="<?=$p['nama_lengkap'] ?>" data-status="<?=$status ?>" data-judul="<?=$title ?>" data-warna="<?=$warnaform ?>" data-icon="<?=$iconform ?>" class="btn btn-circle btn-sm btn-<?=$warna ?> shadow-sm" title="<?=$title ?>"><i class="<?=$icon ?>"></i></button>
                <a href="<?=base_url('pengguna/ubah/').$p['username'] ?>" class="btn btn-sm btn-circle btn-info shadow-sm" title="Lihat"><i class="fa fa-fw fa-eye"></i></a>
                <button type="button" id="hapus" data-toggle="modal" data-target="#hapusModal" data-username="<?=$p['username'] ?>" data-nama="<?=$p['nama_lengkap'] ?>" data-foto="<?=$p['foto'] ?>" class="btn btn-circle btn-sm btn-danger shadow-sm" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
              </div>
            </div>
          </div>
        </div> 
      <?php endforeach ?>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusModalLabel">Hapus Pengguna</h5>
      </div>
      <form id="formhapus" action="" method="post">
        <div class="modal-body">
          <p id="ket">Keterangan</p>
          <input class="form-control" type="hidden" id="nama" name="nama">
          <input class="form-control" type="hidden" id="foto" name="foto">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" class="btn btn-sm btn-circle btn-danger shadow-sm" title="Hapus"><i class="fa fa-fw fa-trash"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Status -->
<div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="statusModalLabel">Status Pengguna</h5>
      </div>
      <form id="formstatus" action="" method="post">
        <div class="modal-body">
          <p id="ket">Keterangan</p>
          <input class="form-control" type="hidden" id="nama" name="nama">
          <input class="form-control" type="hidden" id="status" name="status">
          <input class="form-control" type="hidden" id="judul" name="judul">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-circle btn-secondary shadow-sm" data-dismiss="modal" title="Batal"><i class="fa fa-fw fa-times"></i></button>
          <button type="submit" id="tblstatus" class="btn btn-sm btn-circle btn-danger shadow-sm" title="Hapus"><i class="fa fa-fw fa-trash" id="iconstatus"></i></button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.js"></script>
<script>

    $(document).on("click", "#hapus", function() {
        var username = $(this).data('username');
        var nama = $(this).data('nama');
        var foto = $(this).data('foto');
        $("#hapusModal #nama").val(nama);
        $("#hapusModal #foto").val(foto);
        $("#hapusModal #ket").html("Anda yakin ingin menghapus <strong>"+nama+"</strong> ?");
        $("#hapusModal #formhapus").attr("action","<?php echo base_url() ?>pengguna/hapus/"+username);
    });

    $(document).on("click", "#status", function() {
        var username = $(this).data('username');
        var nama = $(this).data('nama');
        var status = $(this).data('status');
        var judul = $(this).data('judul');
        var warna = $(this).data('warna');
        var icon = $(this).data('icon');
        $("#statusModal #nama").val(nama);
        $("#statusModal #status").val(status);
        $("#statusModal #judul").val(judul);
        $("#statusModal #ket").html("Anda yakin ingin "+judul+" <strong>"+nama+"</strong> ?");
        $("#statusModal #tblstatus").attr("class","btn btn-sm btn-circle btn-"+warna);
        $("#statusModal #tblstatus").attr("title",judul);
        $("#statusModal #iconstatus").attr("class",icon);
        $("#statusModal #formstatus").attr("action","<?php echo base_url() ?>pengguna/status/"+username);
    });

</script>