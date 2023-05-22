<?php
if ($this->session->flashdata('info')) echo $this->session->flashdata('info');
?>
<link rel="stylesheet" type="text/css" href="<?= base_url('include/assets-fe/assets/login.css')?>">
<form class="form-signin" method="POST" action="<?= site_url('login/process')?>">
  <?php echo validation_errors('<script>swal({title: "Warning", text: "', '", timer: 10000, icon: "warning", button: false});</script>'); ?>
  <div class="text-center mb-4">
    <img class="mb-4" src="<?= base_url('include/assets-fe/assets/img/favicon/bpn.png')?>" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Panel Mahasiswa | Login</h1>
  </div>

  <div class="form-group">
    <label>Username</label>
    <input class="form-control" placeholder="Username" type="text" name="username" value="<?= set_value('username'); ?>" required autofocus>
  </div>

  <div class="form-group">
    <label>Password</label>
    <input class="form-control" placeholder="Password" type="password" name="password" value="<?= set_value('password') ?>" required>
  </div>

  <button class="btn btn-info btn-block" type="submit" name="log">Login</button>
  <p class="mt-5 mb-3 text-muted text-center">&copy; 2023 Ratna Jamilah</p>
</form>