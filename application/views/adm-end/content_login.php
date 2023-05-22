<?php
  if ($this->session->flashdata('info')) echo $this->session->flashdata('info');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?= base_url('include/img/32.png') ?>">
  <title>BPN Magang - Login Administrator</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('include/assets/plugins/fontawesome-free/css/all.min.css')?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('include/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('include/assets/dist/css/adminlte.min.css') ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?= base_url('include/sweetalert/sweetalert.min.js'); ?>"></script>
</head>
<body class="hold-transition login-page bg-light  ">
<div class="login-box">
  <div class="login-logo">
    <a href="#">
      <b><h4>BPN Magang | Administrator</h4></b>
    </a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
        <img src="<?= base_url('include/img/bpn.png') ?>" width="100" class="img-fluid d-block m-auto">
        <?php
          $pesan = $this->session->flashdata('danger');
          if($pesan){
            echo '<p class="login-box-msg text-center alert">'.$pesan.'</p>';
          }
        ?>
      <form action="<?php echo base_url('adm-end/login/process')  ?>" method="POST">
        <?php echo validation_errors('<script>swal({title: "Warning", text: "', '", timer: 10000, icon: "warning", button: false});</script>'); ?>
        <div class="input-group mb-3 mt-3">
          <input type="text" name="username" class="form-control" placeholder="Username" value="<?= set_value('username'); ?>">
          <div class="input-group-append">
            <div class="input-group-text bg-white">
              <span class="fas fa-envelope text-info"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>">
          <div class="input-group-append">
            <div class="input-group-text bg-white">
              <span class="fas fa-lock text-info"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <button type="submit" class="btn btn-info btn-block">Login</button>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('include/assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('include/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('include/assets/dist/js/adminlte.min.js') ?>"></script>
<script type="text/javascript">
  $('.alert').alert().delay(3000).slideUp('slow');
</script>
</body>
</html>