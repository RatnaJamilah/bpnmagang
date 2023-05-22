<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title ?></title>
  <link rel="icon" href="<?= base_url('include/img/32.png') ?>">
  <!-- Tell the browser to be responsive to screen width -->
  <meta description="">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('include/assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('include/assets/plugins/fontawesome/css/font-awesome.min.css') ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('include/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css') ?>">
  <!-- Sweet alert notification -->
  <link rel="stylesheet" href="<?= base_url('include/assets/sweetalert2/sweetalert2.min.css') ?>">
  <!-- Animated -->
  <link rel="stylesheet" href="<?= base_url('include/assets/plugins/animate/animate.css') ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('include/assets/dist/css/adminlte.css') ?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url('include/assets/plugins/select2/css/select2.min.css') ?>">

  <link rel="stylesheet" href="<?= base_url('include/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') ?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <script src="<?= base_url('include/sweetalert/sweetalert.min.js'); ?>"></script>
  <style type="text/css">
    button.wh-ap-btn {
      outline: none;
        width:  55px;
        height:  55px;
        border:  0;
        background-color: #2ecc71;
        padding:  0;
        border-radius:  100%;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        cursor:  pointer;
        transition:  opacity 0.3s, background 0.3s, box-shadow 0.3s;
    }

    button.wh-ap-btn::after {
        content: '';
        background-image: url('//i.imgur.com/cAS6qqn.png');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: 60%;
        width:  100%;
        height:  100%;
        display:  block;
        opacity: 1;
    }

    button.wh-ap-btn:hover {
        opacity:  1;
        background-color: #20bf6b;
        box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    }

    .wh-api {
        position:  fixed;
        bottom:  0;
        left:  0;
    }

    .wh-fixed {
        margin-left:  15px;
        margin-bottom:  4px;
    }

    .wh-fixed>a {
        display:  block;
        text-decoration:  none;
    }

    .wh-fixed>a:hover button.wh-ap-btn::before {
        opacity:  1;
        width:  auto;
        padding-top: 7px;
        padding-left: 10px;
        padding-right: 10px;
        width:  80px;
    }
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">