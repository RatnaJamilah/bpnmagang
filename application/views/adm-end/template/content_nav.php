<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary bg-dark elevation-4">
  <!-- Brand Logo -->
  <a href="<?= site_url('backend/dashboard'); ?>" class="brand-link border-white bg-info">
    <img src="<?= base_url('include/img/bpn.png') ?>" alt="AdminLTE Logo" class="brand-image"
    style="opacity: .8">
    <span class="brand-text font-weight-light"><strong>BPN | ADMIN PANEL</strong></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex border-white">
      <div class="image mt-2">
        <img src="<?= base_url('include/assets/dist/img/avatar2.png') ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-white"><?php echo $this->session->userdata('nama_lengkap'); ?><br><small>Administrator</small></a>
      </div>
    </div>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!--<li class="nav-header text-white">MENU DASHBOARD</li>-->
        <li class="nav-item">
          <a href="<?= site_url('adm-end/dashboard') ?>" class="nav-link text-white <?php if(isset($active_dashboard)){echo $active_dashboard; } ?>">
            <i class="nav-icon fas fa-desktop"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>

        <!--<li class="nav-header text-white">MENU ADMINISTRATOR</li>-->
        <li class="nav-item">
          <a href="<?= site_url('adm-end/administrator') ?>" class="nav-link text-white <?php if(isset($active_cuti)){echo $active_cuti; } ?>">
            <i class="nav-icon far fa-user"></i>
            <p>
              Administrator
            </p>
            <span class="pull-right-container" style="float: right;">

            </span>
          </a>
        </li>

        <!--<li class="nav-header text-white">MENU MAHASISWA</li>-->
        <li class="nav-item">
          <a href="<?= site_url('adm-end/mahasiswa') ?>" class="nav-link text-white <?php if(isset($active_cuti)){echo $active_cuti; } ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Mahasiswa
            </p>
            <span class="pull-right-container" style="float: right;">

            </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('adm-end/pengajuan') ?>" class="nav-link text-white <?php if(isset($active_cuti)){echo $active_cuti; } ?>">
            <i class="nav-icon fas fa-check"></i>
            <p>
              Pengajuan Mahasiswa
            </p>
            <span class="pull-right-container" style="float: right;">

            </span>
          </a>
        </li>

        </span>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= site_url('adm-end/absensi') ?>" class="nav-link text-white <?php if(isset($active_cuti)){echo $active_cuti; } ?>">
            <i class="nav-icon far fa-file"></i>
            <p>
              Absensi Mahasiswa
            </p>
            <span class="pull-right-container" style="float: right;">

            </span>
          </a>
        </li>


        <!--<li class="nav-header text-white">MENU BACKUP</li>
        <li class="nav-item">
          <a href="<?= site_url('adm-end/backup') ?>" class="nav-link text-white <?php if(isset($active_cuti)){echo $active_cuti; } ?>">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Backup Database
            </p>
            <span class="pull-right-container" style="float: right;">

            </span>
          </a>
        </li>-->

        <li class="nav-header text-white">KELUAR</li>
        <li class="nav-item">
          <a href="<?= site_url('adm-end/login/logout') ?>" class="nav-link text-white <?php if(isset($active_backup)){echo $active_backup; } ?>">
            <i class="nav-icon fa fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>