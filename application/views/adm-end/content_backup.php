<?php
  if ($this->session->flashdata('info')) echo $this->session->flashdata('info');
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header animated fadeInUp">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Backup Database</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('adm-end/dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Backup Database</li>
            </ol>
          </div><!-- /.col -->
        </div>
      </div>
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
    <div class="content animated fadeInUp faster">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline card-info">
              <div class="card-body">
                <dl>
                  <dt><i class="fa fa-bullhorn"></i> PERHATIAN</dt>
                  <dd>Lakukan backup database secara berkala untuk membuat cadangan database yang bisa direstore kapan saja ketika dibutuhkan. Silakan klik tombol "Backup" untuk memulai proses backup data. Setelah proses backup selesai, silakan download file backup database tersebut dan simpan di lokasi yang aman.*
                    <br><br><span class="text-danger">* Tidak disarankan menyimpan file backup database dalam my documents / Local Disk C.</span>
                  </dd>
                </dl>
                <a href="<?php echo site_url('adm-end/backup/backup_database') ?>" target="_self" class="btn btn-success btn-block"><i class="fa fa-download"></i> Backup Database</a>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->