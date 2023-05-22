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
            <h1>List Pengajuan Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('adm-end/dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Pengajuan Mahasiswa</li>
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
                <div class="table-responsive no-border">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">NIM</th>
                        <th class="text-center">Universitas</th>
                        <th class="text-center">Jurusan / Fakultas</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
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
                        <td><?php echo $data->jurfak ?></td>
                        <td>
                          <?php if($data->status == "pending") { ?>
                            <span class="badge badge-warning text-white"><?php echo strtoupper($data->status) ?></span>
                          <?php }else if($data->status == "ditolak"){ ?>
                            <span class="badge badge-danger"><?php echo strtoupper($data->status) ?></span>
                          <?php }else if ($data->status == "disetujui"){ ?>
                            <span class="badge badge-success"><?php echo strtoupper($data->status) ?></span>
                          <?php } ?>
                        </td>
                        <td nowrap="nowrap">
                          <a href="<?php echo site_url('adm-end/pengajuan/detail_pengajuan/'.encode_url($data->id_pengajuan)) ?>" class="btn btn-info btn-sm"><i class="fas fa-search"></i> Detail</a>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script src="<?= base_url('include/assets/plugins/jquery/jquery.min.js') ?>"></script>
  <script type="text/javascript">
    $('.hapuspengajuan').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal({
        title: 'PERINGATAN',
        text: "YAKIN INGIN PENGAJUAN MAHASISWA INI ?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Konfirmasi',
        cancelButtonText: 'Batal'
      }).then((result) => {
         if (result.value) {
            document.location.href = href;
        } 
      })
    });
  </script>