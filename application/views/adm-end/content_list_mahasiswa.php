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
            <h1>List Akun Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('adm-end/dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Mahasiswa</li>
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
                        <th class="text-center">Foto</th>
                        <th class="text-center">Nama Mahasiswa</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Status Akun</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach ($mahasiswa as $data) {
                      ?>
                      <tr class="text-center">
                        <td class="text-center"><?php echo $no++; ?></td>
                        <td class="text-center">
                            <?php if($data->photo == ''){ ?>
                              <img class="img-rounded elevation-2" width="80" height="100" src="<?= base_url('include/img/default.png')?>" alt="User Avatar">
                            <?php }else{ ?>
                              <img class="img-rounded elevation-2" width="80" height="100" src="<?= base_url('include/foto_mahasiswa/'.$data->photo)?>" alt="User Avatar">
                            <?php } ?>
                        </td>
                        <td><?php echo $data->nama_lengkap ?></td>
                        <td><?php echo $data->username ?></td>
                        <td class="text-center">
                          <?php if($data->active == 'aktif'){ ?>
                          <span class="badge badge-success">AKTIF</span>
                          <?php }else if($data->active == 'wait'){ ?>
                          <span class="badge badge-warning text-white">MENUNGGU VERIFIKASI</span>
                          <?php }else{ ?>
                          <span class="badge badge-danger">NON-AKTIF</span>
                          <?php } ?>
                        </td>
                        <td class="text-center" nowrap="nowrap">
                          <div class="btn-group-vertical">
                            <?php if($data->active == 'aktif'){ ?>
                            <a href="<?= site_url('adm-end/mahasiswa/nonaktif_mahasiswa/'.$data->id) ?>" class="btn btn-warning btn-sm text-white nonaktifmhs"><i class="fas fa-times"></i> NONAKTIFKAN</a>
                            <?php }else if($data->active == 'nonaktif'){ ?>
                            <a href="<?= site_url('adm-end/mahasiswa/aktifkan_mahasiswa/'.$data->id) ?>" class="btn btn-success btn-sm aktifmhs"><i class="fas fa-check"></i> AKTIFKAN</a>
                            <?php } ?>

                            <a class="btn btn-sm btn-info" href="#modal-resetpass<?php echo $data->id ?>" data-toggle="modal">
                              <i class="fas fa-key"></i> Ganti Password
                            </a>
                            <a href="<?= site_url('adm-end/mahasiswa/hapus_mahasiswa/'.$data->id)?>" class="btn btn-danger btn-sm hapus"><i class="fas fa-trash"></i> Hapus</a>
                          </div>
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

  <?php foreach ($mahasiswa as $data) { ?>
  <div class="modal fade" id="modal-resetpass<?php echo $data->id ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ganti Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= site_url('adm-end/mahasiswa/ganti_passmhs') ?>" method="POST">
          <?php echo validation_errors('<script>swal({title: "Warning", text: "', '", timer: 10000, icon: "warning", button: false});</script>'); ?>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Password</label>
              <input type="hidden" name="id" value="<?php echo $data->id ?>">
              <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
              <span class="text-red"><?php echo form_error('password') ?></span>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php } ?>
  <!-- Sweetalert notification -->
  <script src="<?= base_url('include/assets/plugins/jquery/jquery.min.js') ?>"></script>
  <script type="text/javascript">
    $('.aktifmhs').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal({
        title: 'PERINGATAN',
        text: "YAKIN INGIN AKTIFKAN KEMBALI AKUN MAHASISWA INI ?",
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

    $('.nonaktifmhs').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal({
        title: 'PERINGATAN',
        text: "YAKIN INGIN NONAKTIFKAN AKUN MAHASISWA INI ?",
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

    $('.hapus').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal({
        title: 'PERINGATAN',
        text: "YAKIN INGIN HAPUS AKUN MAHASISWA INI ?",
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