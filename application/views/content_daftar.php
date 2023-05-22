<?php
if ($this->session->flashdata('info')) echo $this->session->flashdata('info');
?>
<link rel="stylesheet" type="text/css" href="<?= base_url('include/assets-fe/assets/daftar.css') ?>">
<body class="bg-light mb-3">
  <div class="container">
    <div class="py-5 text-center">
      <!-- <img class="d-block mx-auto mb-4" src="assets/img/favicon/fiqs-logo.png" alt="" width="72" height="72"> -->
      <!-- <h2 class="mt-5">Daftar</h2> -->
    </div>

    <div class="row">
      <div class="col-md-6 order-md-2 mt-2">
        <h2 class="text-center">Tata Cara</h2>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex">
            <i class="fa fa-pencil-square text-info fa-3x mt-1"></i>
            <div class="ml-3">
              <h6 class="my-1">Registrasi</h6>
              <small class="text-muted">Isi data pada form</small>
            </div>
          </li>

          <li class="list-group-item d-flex">
            <i class="fa fa-sign-in text-info fa-3x mt-1"></i>
            <div class="ml-3">
              <h6 class="my-1">Masuk</h6>
              <small class="text-muted">Masuk ke halaman mahasiswa melalui tombol login</small>
            </div>
          </li>

          <li class="list-group-item d-flex">
            <i class="fa fa-file-text-o text-info fa-3x mt-1"></i>
            <div class="ml-3">
              <h6 class="my-1">Mulai Pengajuan</h6>
              <small class="text-muted">Isi form biodata pada menu Pengajuan Magang</small>
            </div>
          </li>

          <li class="list-group-item d-flex">
            <i class="fa fa-clock-o text-info fa-3x mt-1"></i>
            <div class="ml-3">
              <h6 class="my-1">Verifikasi Pengajuan</h6>
              <small class="text-muted">Kami akan meninjau pengajuan Mahasiswa</small>
            </div>
          </li>

          <li class="list-group-item d-flex">
            <i class="fa fa-check text-info fa-3x mt-1"></i>
            <div class="ml-3">
              <h6 class="my-1">Selesai</h6>
              <small class="text-muted">Kami akan memproses apakah diterima atau tidak</small>
            </div>
          </li>
        </ul>
      </div>

      <div class="col-md-6 order-md-1 mt-2">
        <h2 class="text-center">Daftar</h2>
        <form method="POST" action="<?= site_url('daftar/register')?>">
          <?php echo validation_errors('<script>swal({title: "Warning", text: "', '", timer: 10000, icon: "warning", button: false});</script>'); ?>
          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="firstName">Nama Lengkap</label>
              <input class="form-control" id="firstName" placeholder="Nama Lengkap" type="text" name="nama_lengkap" value="<?= set_value('nama_lengkap'); ?>" required="" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Diisi')"
                oninput="setCustomValidity('')">
              <input type="hidden" name="role" value="Mahasiswa">
              <!-- <span class="text-danger"><?php echo form_error('nama_lengkap'); ?></span> -->
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="firstName">Username</label>
              <input class="form-control" placeholder="Username" type="text" name="username" value="<?= set_value('username'); ?>" required="">
              <!-- <span class="text-danger text-left"><?php echo form_error('username'); ?></span> -->
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="firstName">Password</label>
              <input class="form-control" placeholder="Password" type="password" name="password" value="<?= set_value('password'); ?>">
              <!-- <span class="text-danger"><?php echo form_error('password'); ?></span> -->
            </div>
          </div>

          <div class="row">
            <div class="col-md-12 mb-3">
              <label for="firstName">Konfirmasi Password</label>
              <input class="form-control" placeholder="Password" type="password" name="cpassword" value="<?= set_value('cpassword'); ?>">
              <!-- <span class="text-danger"><?php echo form_error('cpassword'); ?></span> -->
            </div>
          </div>

          <button class="btn btn-info btn-block" name="daftar" type="submit">Daftar</button>
        </form>
      </div>
    </div>
  </div>
</body>