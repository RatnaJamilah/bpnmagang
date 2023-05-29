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
            <h1>Absensi Mahasiswa</h1>
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
    <?php echo validation_errors('<script>swal({title: "Warning", text: "', '", timer: 10000, icon: "warning", button: false});</script>'); ?>
    <div class="content animated fadeInUp faster">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-outline">
              <div class="card-header bg-info">
                <h5 class="card-title mt-1 m-0"><i class="fas fa-user"></i> List Absensi</h5>
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
                        <th class="text-center">Nim</th>
                        <th class="text-center">Nama Lengkap</th>
                        <th class="text-center">Universitas</th>
                        <th class="text-center">Jurusan</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $no = 1;
                        foreach ($absensi as $data) {
                      ?>
                      <tr class="text-center">
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data->nim ?></td>
                        <td><?php echo $data->nama_lengkap ?></td>
                        <td><?php echo $data->universitas ?></td>
                        <td><?php echo $data->jurusan ?></td>
                        <td><?php echo date('d/M/y') ?></td>
                        <td><?php echo $data->keterangan ?>
                        </td>
                        <td style="width:10%;">
                        <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $data->id; ?>">
                           <i class="fa fa-edit"></i>
                        </a>
                            <div class="modal fade" id="edit<?php echo $data->id ?>">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header bg-info">
                                  <h4 class="modal-title">Edit Absensi</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="<?= site_url('absensi/update') ?>" method="POST">
                                  <div class="modal-body">
                                  <div class="form-group">
                                      <label for="">Nim</label>
                                      <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan Nim" value="<?= set_value('nim')  ?>">
                                      <input type="hidden" name="role" value="Admin">
                                    </div>
                                <div class="form-group">
                                  <label for="">Nama Lengkap</label>
                                  <input type="text" class="form-control" id="name" name="nama_lengkap" placeholder="Masukan Nama" value="<?= set_value('nama_lengkap')  ?>">
                                  <input type="hidden" name="role" value="Admin">
                                </div>
                                <div class="form-group">
                                  <label for="">Universitas</label>
                                  <input type="text" class="form-control" id="universitas" name="universitas" placeholder="Masukan Universitas" value="<?= set_value('universitas')  ?>">
                                  <input type="hidden" name="role" value="Admin">
                                </div>
                                <div class="form-group">
                                  <label for="">Jurusan</label>
                                  <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukan Jurusan" value="<?= set_value('jurusan')  ?>">
                                  <input type="hidden" name="role" value="Admin">
                                </div>
                                <div class="form-group">
                                  <label for="">Tanggal</label>
                                  <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="" value="<?= set_value('tanggal') ?>">
                                </div>
                                <div class="form-group">
                                  <label for="">Keterangan</label>
                                <select class="form-control select2" required="required"  name="keterangan">
                                                  <option value='Hadir'>Hadir</option>
                                                  <option value='Izin'>Izin</option>
                                                  <option value='Sakit'>Sakit</option>
                                                  <option value='Tanpa Keterangan'>Tanpa Keterangan</option>
                                              </select>
                                </div>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                        <a href="<?= base_url('absensi/hapus_absensi/'.$data->id )?>" class="btn btn-danger btn-sm hapusop"><i class="fas fa-trash"></i> </a>
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

  <!-- Tambah -->
  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-info">
          <h4 class="modal-title">Tambah Absensi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= site_url('absensi/tambah') ?>" method="POST">
          <div class="modal-body">
          <div class="form-group">
              <label for="">Nim</label>
              <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukan Nim" value="<?= set_value('nim')  ?>">
              <input type="hidden" name="role" value="Admin">
            </div>

            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control" id="name" name="nama_lengkap" placeholder="Masukan Nama" value="<?= set_value('nama_lengkap')  ?>">
              <input type="hidden" name="role" value="Admin">
            </div>

            <div class="form-group">
              <label for="">Universitas</label>
              <input type="text" class="form-control" id="universitas" name="universitas" placeholder="Masukan Universitas" value="<?= set_value('universitas')  ?>">
              <input type="hidden" name="role" value="Admin">
            </div>

            <div class="form-group">
              <label for="">Jurusan</label>
              <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukan Jurusan" value="<?= set_value('jurusan')  ?>">
              <input type="hidden" name="role" value="Admin">
            </div>

            <div class="form-group">
              <label for="">Tanggal</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="" value="<?= set_value('tanggal') ?>">
            </div>

            <div class="form-group">
              <label for="">Keterangan</label>
            <select class="form-control select2" required="required"  name="keterangan">
                              <option value='Hadir'>Hadir</option>
		                          <option value='Izin'>Izin</option>
	                    	      <option value='Sakit'>Sakit</option>
		                          <option value='Tanpa Keterangan'>Tanpa Keterangan</option>
	                         </select>
            </div>
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Tutup</button>
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
    <!--End Tambah -->
    
     <!--End Edit -->
  <?php foreach ($absensi as $data) { ?>
  
  <?php } ?>
    <!--End Edit -->


  <!-- Sweetalert notification -->
  <script src="<?= base_url('include/assets/plugins/jquery/jquery.min.js') ?>"></script>
  <script type="text/javascript">
    $('.hapusop').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal({
        title: 'PERINGATAN',
        text: "YAKIN INGIN HAPUS DATA INI ?",
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