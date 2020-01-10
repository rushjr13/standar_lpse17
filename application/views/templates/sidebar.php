<body id="page-top" onload="startTime()">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <img src="<?=base_url('assets/img/').$pengaturan['icon'] ?>" width="40">
        </div>
        <div class="sidebar-brand-text mx-3"><img src="<?=base_url('assets/img/').$pengaturan['logo'] ?>" width="140"></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <?php if($pengguna_masuk){ ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if($judul=='Beranda'){echo 'active';} ?>">
          <a class="nav-link" href="<?=base_url() ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider mb-0">
        <?php if($pengguna_masuk['id_level']==1){ ?>
          <!-- Heading -->
          <div class="sidebar-heading mt-3">
            ADMIN
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item <?php if($judul=='Pengguna'){echo 'active';} ?>">
            <a class="nav-link" href="<?=base_url('pengguna') ?>">
              <i class="fas fa-fw fa-users"></i>
              <span>Pengguna</span>
            </a>
          </li>
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item <?php if($judul=='Pengaturan'){echo 'active';} ?>">
            <a class="nav-link" href="<?=base_url('pengaturan') ?>">
              <i class="fas fa-fw fa-cogs"></i>
              <span>Pengaturan</span>
            </a>
          </li>
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item <?php if($judul=='Pengumuman'){echo 'active';} ?>">
            <a class="nav-link" href="<?=base_url('pengumuman') ?>">
              <i class="fas fa-fw fa-bullhorn"></i>
              <span>Pengumuman</span>
            </a>
          </li>
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item <?php if($judul=='Menu'){echo 'active';} ?>">
            <a class="nav-link" href="<?=base_url('menu') ?>">
              <i class="fas fa-fw fa-list"></i>
              <span>Menu</span>
            </a>
          </li>
          
          <hr class="sidebar-divider mb-0">

        <?php } ?>
          <!-- Heading -->
          <?php foreach ($menu as $mn): ?>
             <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?=$mn['id_menu'] ?>" aria-expanded="true" aria-controls="collapseTwo">
              <span class="text-wrap"><?=$mn['nama_menu'] ?></span>
            </a>
            <!-- <div class="sidebar-heading">
              <?=$mn['nama_menu'] ?>
            </div> -->
            <div id="collapse<?=$mn['id_menu'] ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <?php
                  $this->db->select('*');
                  $this->db->from('submenu');
                  $this->db->where('id_menu', $mn['id_menu']);
                  $this->db->order_by('id_submenu', 'ASC');
                  $submenu = $this->db->get()->result_array();
                ?>
                <?php foreach ($submenu as $sm): ?>
                  <a class="collapse-item text-wrap" href="<?=base_url().$sm['link'] ?>" <?php if($judul==$sm['nama_submenu']){echo 'active';} ?>><?=$sm['nama_submenu'] ?></a>
                <?php endforeach ?>
              </div>
            </div>
            <hr class="sidebar-divider mb-0">
          </li>
          <?php endforeach ?>

      <?php }else{ ?>
        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="<?=base_url() ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Beranda</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
      <?php } ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->