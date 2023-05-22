<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-info navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars text-white"></i></a>
    </li>
  </ul>  

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a style="cursor: default;" id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link text-white">  Halo, <?php echo $this->session->userdata('username'); ?>
        </a>
      </li>
  </ul>
</nav>
<!-- /.navbar -->