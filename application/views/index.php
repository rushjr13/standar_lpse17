<!-- Content Row -->
<div class="row">

  <?php if($pengguna_masuk){ ?>
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow-sm h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?=time() ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow-sm h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow-sm h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow-sm h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

</div>

<!-- Content Row -->
<div class="row">

  <!-- Content Column -->
  <div class="col-lg-8 mb-4">

    <!-- Approach -->
    <div class="card shadow-sm mb-4">
      <div class="card-header bg-primary text-white py-3">
        <h6 class="m-0 font-weight-bold"><i class="fa fa-fw fa-bullhorn"></i> Pengumuman</h6>
      </div>
      <div class="card-body">
        <?php if($pengumuman){ ?>
          <?php foreach ($pengumuman as $png): ?>
            <?php
              $hari = date('l', $png['tgl_pengumuman']);
              $tgl = date('d', $png['tgl_pengumuman']);
              $bln = date('F', $png['tgl_pengumuman']);
              $thn = date('Y', $png['tgl_pengumuman']);

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

              $tgl_pengumuman = $hr.', '.$tgl.' '.$bulan.' '.$thn;
            ?>
            <div class="alert alert-success shadow-sm mb-3">
              <div class="font-weight-bold small"><?=$png['penulis'] ?> - <?=$tgl_pengumuman ?></div>
              <hr class="my-1">
              <div class="text-justify"><?=$png['isi_pengumuman'] ?></div>
            </div>
          <?php endforeach ?>
        <?php }else{ ?>
          <div class="alert alert-secondary shadow-sm m-0 text-center">Belum ada pengumuman!</div>
        <?php } ?>
      </div>
    </div>

    <!-- Project Card Example -->
    <div class="card shadow-sm mb-4">
      <div class="card-header bg-primary shadow-sm py-3">
        <h6 class="m-0 font-weight-bold text-white">Kontrol Input SOP</h6>
      </div>
      <div class="card-body">
        <div class="list-group shadow-sm">
          <a href="#" class="list-group-item shadow-sm list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1 font-weight-bold">01. Kebijakan Layanan</h5>
            </div>
            <table class="table table-sm table-hover table-borderless m-0">
              <tbody>
                <tr>
                  <?php
                    if($regulasi_update){
                      $hariregup = round((time()-$tglregup)/86400,0);
                      if($hariregup<=15){
                        $warna = "text-dark";
                      }else if($hariregup>15 && $hariregup<=30){
                        $warna = "text-warning";
                      }else if($hariregup>30){
                        $warna = "text-danger";
                      }
                    }else{
                      $warna = "text-success";
                    }
                  ?>
                  <td class="<?=$warna ?>"><i class="fa fa-fw fa-list"></i> Informasi <small class="float-right"><?php if($regulasi_update){ ?>Terakhir diperbarui pada tanggal <?=$tglregupindo ?> - <?=$hariregup; ?> Hari Yang lalu<?php }else{echo "Belum ada data";} ?></small></td>
                </tr>
                <tr>
                  <?php
                    if($regulasi_perka_update){
                      $hariregperkaup = round((time()-$tglregperkaup)/86400,0);
                      if($hariregperkaup<=15){
                        $warna = "text-dark";
                      }else if($hariregperkaup>15 && $hariregperkaup<=30){
                        $warna = "text-warning";
                      }else if($hariregperkaup>30){
                        $warna = "text-danger";
                      }
                    }else{
                      $warna = "text-success";
                    }
                  ?>
                  <td class="<?=$warna ?>"><i class="fa fa-fw fa-list"></i> Regulasi <small class="float-right"><?php if($regulasi_perka_update){ ?>Terakhir diperbarui pada tanggal <?=$tglregperkaupindo ?> - <?=$hariregperkaup; ?> Hari Yang lalu<?php }else{echo "Belum ada data";} ?></small></td>
                </tr>
              </tbody>
            </table>
          </a>
          <a href="#" class="list-group-item shadow-sm list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1 font-weight-bold">02. Pengorganisasian Layanan</h5>
            </div>
            <table class="table table-sm table-hover table-borderless m-0">
              <tbody>
                <tr>
                  <?php
                    if($organisasi_tujuan_update){
                      $hariortu = round((time()-$tglortu)/86400,0);
                      if($hariortu<=15){
                        $warna = "text-dark";
                      }else if($hariortu>15 && $hariortu<=30){
                        $warna = "text-warning";
                      }else if($hariortu>30){
                        $warna = "text-danger";
                      }
                    }else{
                      $warna = "text-success";
                    }
                  ?>
                  <td class="<?=$warna ?>"><i class="fa fa-fw fa-list"></i> Struktur Organisasi <small class="float-right"><?php if($organisasi_tujuan_update){ ?>Terakhir diperbarui pada tanggal <?=$tglortuindo ?> - <?=$hariortu; ?> Hari Yang lalu<?php }else{echo "Belum ada data";} ?></small></td>
                </tr>
                <!-- <tr>
                  <td class="text-dark"><i class="fa fa-fw fa-list"></i> SOP Organisasi</td>
                </tr> -->
                <tr>
                  <?php
                    if($organisasi_sk_update){
                      $hariosk = round((time()-$tglosk)/86400,0);
                      if($hariosk<=15){
                        $warna = "text-dark";
                      }else if($hariosk>15 && $hariosk<=30){
                        $warna = "text-warning";
                      }else if($hariosk>30){
                        $warna = "text-danger";
                      }
                    }else{
                      $warna = "text-success";
                    }
                  ?>
                  <td class="<?=$warna ?>"><i class="fa fa-fw fa-list"></i> SK Organisasi <small class="float-right"><?php if($organisasi_sk_update){ ?>Terakhir diperbarui pada tanggal <?=$tgloskindo ?> - <?=$hariosk; ?> Hari Yang lalu<?php }else{echo "Belum ada data";} ?></small></td>
                </tr>
              </tbody>
            </table>
          </a>
          <a href="#" class="list-group-item shadow-sm list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1 font-weight-bold">03. Pengelolaan Aset Layanan</h5>
            </div>
            <table class="table table-sm table-hover table-borderless m-0">
              <tbody>
                <tr>
                  <?php
                    if($sop_aset_update){
                      $harisopset = round((time()-$tglsopset)/86400,0);
                      if($harisopset<=15){
                        $warna = "text-dark";
                      }else if($harisopset>15 && $harisopset<=30){
                        $warna = "text-warning";
                      }else if($harisopset>30){
                        $warna = "text-danger";
                      }
                    }else{
                      $warna = "text-success";
                    }
                  ?>
                  <td class="<?=$warna ?>"><i class="fa fa-fw fa-list"></i> Struktur Organisasi <small class="float-right"><?php if($sop_aset_update){ ?>Terakhir diperbarui pada tanggal <?=$tglsopsetindo ?> - <?=$harisopset; ?> Hari Yang lalu<?php }else{echo "Belum ada data";} ?></small></td>
                </tr>
                <tr>
                  <?php
                    if($aset_sk_update){
                      $hariskset = round((time()-$tglskset)/86400,0);
                      if($hariskset<=15){
                        $warna = "text-dark";
                      }else if($hariskset>15 && $hariskset<=30){
                        $warna = "text-warning";
                      }else if($hariskset>30){
                        $warna = "text-danger";
                      }
                    }else{
                      $warna = "text-success";
                    }
                  ?>
                  <td class="<?=$warna ?>"><i class="fa fa-fw fa-list"></i> SK Organisasi <small class="float-right"><?php if($aset_sk_update){ ?>Terakhir diperbarui pada tanggal <?=$tglsksetindo ?> - <?=$hariskset; ?> Hari Yang lalu<?php }else{echo "Belum ada data";} ?></small></td>
                </tr>
                <tr>
                  <td class="text-dark"><i class="fa fa-fw fa-list"></i> Pencatatan Aset Layanan
                    <table class="table table-sm table-borderless table-hover text-dark small">
                      <tbody>
                        <tr>
                          <td><i class="fa fa-fw fa-angle-double-right"></i> Informasi <span class="float-right">1 Hari yang lalu</span></td>
                        </tr>
                        <tr>
                          <td><i class="fa fa-fw fa-angle-double-right"></i> Sumber Daya Manusia (SDM) <span class="float-right">1 Hari yang lalu</span></td>
                        </tr>
                        <tr>
                          <td><i class="fa fa-fw fa-angle-double-right"></i> Fisik <span class="float-right">1 Hari yang lalu</span></td>
                        </tr>
                        <tr>
                          <td><i class="fa fa-fw fa-angle-double-right"></i> Software <span class="float-right">1 Hari yang lalu</span></td>
                        </tr>
                        <tr>
                          <td><i class="fa fa-fw fa-angle-double-right"></i> Layanan <span class="float-right">1 Hari yang lalu</span></td>
                        </tr>
                        <tr>
                          <td><i class="fa fa-fw fa-angle-double-right"></i> Intangible <span class="float-right">1 Hari yang lalu</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </a>
        </div>
      </div>
    </div>

  </div>

  <div class="col-lg-4 mb-4">
    <!-- Illustrations -->
    <div class="card shadow-sm mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Standarisasi LPSE</h6>
      </div>
      <div class="card-body">
        ...
      </div>
    </div>
  </div>
</div>
