<!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?= site_url('dashboard') ?>" class="navbar-brand ml-2">
        <img src="<?= base_url('include/img/bpn.png'); ?>" alt="AdminLTE Logo" class="brand-image">
        <span class="brand-text font-weight-light"><strong>BPN | Magang</strong></span>
      </a>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item ml-2">
            <a href="<?= site_url('dashboard') ?>" class="nav-link">Dashboard</a>
          </li>

          <li class="nav-item ml-2">
            <a href="<?= site_url('pengajuan') ?>" class="nav-link">Pengajuan Magang</a>
          </li>

          <li class="nav-item ml-2">
            <a href="<?= site_url('login/logout') ?>" class="nav-link">Logout</a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link">Halo, <?php echo $this->session->userdata('nama_lengkap'); ?></a>
          <!-- <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow animated slideInDown faster">
            <li><a href="<?= site_url('login/logout')?>" class="dropdown-item">Logout</a></li>
          </ul> -->
        </li>

        <button class="navbar-toggler order-1 border-0" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </ul>
    </div>
  </nav>
<!-- /.navbar