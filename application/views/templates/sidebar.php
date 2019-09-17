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
        <hr class="sidebar-divider">
        <?php if($pengguna_masuk['id_level']==1){ ?>
          <!-- Heading -->
          <div class="sidebar-heading">
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
          <li class="nav-item <?php if($judul=='Menu'){echo 'active';} ?>">
            <a class="nav-link" href="<?=base_url('menu') ?>">
              <i class="fas fa-fw fa-list"></i>
              <span>Menu</span>
            </a>
          </li>
          
          <hr class="sidebar-divider">
        <?php } ?>
        <!-- Heading -->
          <?php foreach ($menu_akses as $mn): ?>
            <div class="sidebar-heading">
              <?=$mn['nama_menu'] ?>
            </div>
            <?php
              $this->db->select('*');
              $this->db->from('submenu');
              $this->db->where('id_menu', $mn['id_menu']);
              $this->db->order_by('id_submenu', 'ASC');
              $submenu = $this->db->get()->result_array();
            ?>
            <?php foreach ($submenu as $sm): ?>
              <!-- Nav Item - Pages Collapse Menu -->
              <li class="nav-item <?php if($judul==$sm['nama_submenu']){echo 'active';} ?>">
                <a class="nav-link" href="<?=base_url().$sm['link'] ?>">
                  <!-- <i class="fa fa-fw <?=$sm['icon'] ?>"></i> -->
                  <span><?=$sm['nama_submenu'] ?></span>
                </a>
              </li>
            <?php endforeach ?>
            <hr class="sidebar-divider">
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
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->