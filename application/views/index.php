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
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
      </div>
      <div class="card-body">
        <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
        <div class="progress mb-4">
          <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
        <div class="progress">
          <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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
