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
            <h1>List Operator</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('adm-end/dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Operator</li>
            </ol>
          </div><!-- /.col -->
        </div>
      </div>
    </div>
    <!-- /.content-header -->

     <!-- Main content -->
    <?php echo validation_errors('<script>swal({title: "Warning", text: "', '", timer: 10000, icon: "warning", button: false});</script>'); ?>
    <div class="content animated fadeInUp faster">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline">
              <div class="card-header bg-info">
                <h5 class="card-title mt-1 m-0"><i class="fas fa-user"> </i> Administrator</h5>
                <div class="card-tools">
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modal-default">
                    <i class="fa fa-plus"></i> 
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive no-border">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Status Akun</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach ($operator as $data) {
                      ?>
                      <tr class="text-center">
                        <td><?php echo $no++; ?></td>
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
                        <td nowrap="nowrap">
                            <?php if($data->nama_lengkap == 'Administrator'){ ?>
                            <a href="#" class="btn btn-secondary btn-sm disabled"><i class="fas fa-ban"></i> NO ACTION</a>
                            <?php }else{ ?>
                              <?php if($data->active == 'aktif'){ ?>
                                <a href="<?= site_url('adm-end/administrator/nonaktif_administrator/'.$data->id) ?>" class="btn btn-warning btn-sm text-white"><i class="fas fa-times"></i> NONAKTIFKAN</a>
                                <?php }else if($data->active == 'nonaktif'){ ?>
                                <a href="<?= site_url('adm-end/administrator/aktifkan_administrator/'.$data->id) ?>" class="btn btn-success btn-sm"><i class="fas fa-check"></i> AKTIFKAN</a>
                              <?php } ?>
                              <a class="btn btn-sm btn-info" href="#modal-resetpassadm<?php echo $data->id ?>" data-toggle="modal">
                                  <i class="fas fa-key"></i>
                              </a>
                              <a href="<?= base_url('adm-end/administrator/hapus_administrator/'.$data->id )?>" class="btn btn-danger btn-sm hapusop"><i class="fas fa-trash"></i> </a>
                            <?php } ?>
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
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Tambah Operator</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= site_url('adm-end/administrator/register') ?>" method="POST">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" name="nama_lengkap" placeholder="Masukan Nama" value="<?= set_value('nama_lengkap')  ?>">
              <input type="hidden" name="role" value="Admin">
            </div>

            <div class="form-group">
              <label for="">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username" value="<?= set_value('username')  ?>">
            </div>

            <div class="form-group">
              <label for="">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password" value="<?= set_value('password')  ?>">
            </div>

            <div class="form-group">
              <label for="">Konfirmasi Password</label>
              <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Masukan Konfirmasi Password" value="<?= set_value('cpassword') ?>">
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

  <?php foreach ($operator as $data) { ?>
  <div class="modal fade" id="modal-resetpassadm<?php echo $data->id ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h4 class="modal-title">Ganti Password</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= site_url('adm-end/administrator/ganti_passadmin') ?>" method="POST">
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
    $('.hapusop').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal({
        title: 'PERINGATAN',
        text: "YAKIN INGIN HAPUS AKUN OPERATOR INI ?",
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