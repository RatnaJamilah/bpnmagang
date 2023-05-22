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
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Dashboard</li>
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
          <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3 style="margin-left:10px;">
                  <?php
                    $mhs_role = 'Mahasiswa';
                    $user_mahasiswa = $this->db->query("SELECT * FROM akun WHERE role='$mhs_role'");

                    echo $user_mahasiswa->num_rows();
                  ?>
                </h3>
                <p style="margin-left:10px; font-weight:600;">TOTAL MAHASISWA</p>
              </div>
              <div class="icon">
                <i class="fas fa-users text-white"></i>
              </div>
              <a href="<?= base_url('adm-end/mahasiswa') ?>" class="small-box-footer" style="background: none;">
                Selengkapnya <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-6 col-xs-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3 style="margin-left:10px;">
                  <?php
                    $operator_role = 'admin';
                    $operator = $this->db->query("SELECT * FROM akun WHERE role='$operator_role'");
                    // echo $this->db->get('mahasiswa')->num_rows();

                    echo $operator->num_rows();
                  ?>
                </h3>
                <p style="margin-left:10px; font-weight:600;">TOTAL OPERATOR</p>
              </div>
              <div class="icon">
                <i class="fas fa-user text-white"></i>
              </div>
              <a href="<?= base_url('adm-end/administrator') ?>" class="small-box-footer" style="background: none;">
                Selengkapnya <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-12 col-xs-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3 style="margin-left:10px;">
                  <?php
                    $pengajuan_mhs = $this->db->query("SELECT * FROM pengajuan");
                    // echo $this->db->get('mahasiswa')->num_rows();

                    echo $pengajuan_mhs->num_rows();
                  ?>
                </h3>
                <p style="margin-left:10px; font-weight:600;">TOTAL PENGAJUAN MAHASISWA</p>
              </div>
              <div class="icon">
                <i class="fas fa-edit text-white"></i>
              </div>
              <a href="<?= base_url('adm-end/pengajuan') ?>" class="small-box-footer" style="background: none;">
                Selengkapnya <i class="fa fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline">
              <div class="card-header bg-info">
                <h5 class="card-title m-0"><i class="fas fa-edit"></i> List pengajuan pending</h5>
              </div>
              <div class="card-body">
                <div class="table-responsive no-border">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center">NIM</th>
                        <th class="text-center">Universitas</th>
                        <th class="text-center">Tanggal Pengajuan</th>
                        <th class="text-center">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                        foreach ($pengajuan as $data) {
                      ?>
                      <tr class="text-center">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data->nama_lengkap ?></td>
                        <td><?php echo $data->nim ?></td>
                        <td><?php echo $data->universitas ?></td>
                        <td><?php echo date('d M Y',strtotime($data->timecreated_pengajuan)) ?></td>
                        <td><span class="badge badge-warning text-white"><?php echo strtoupper($data->status) ?></span></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <a href="<?php echo site_url('adm-end/backup/backup_database') ?>" target="_self" class="btn btn-success btn-block mb-3"><i class="fa fa-download"></i> Backup Database</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- jQuery -->
  <script src="<?= base_url('include/assets/plugins/jquery/jquery.min.js') ?>"></script>