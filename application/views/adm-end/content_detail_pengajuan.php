
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header animated fadeInUp faster">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1>Detail Pengajuan Mahasiswa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('adm-end/dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="<?= site_url('adm-end/pengajuan')?>">Pengajuan Mahasiswa</a></li>
              <li class="breadcrumb-item active">Detail Pengajuan</li>
            </ol>
          </div><!-- /.col -->
        </div>
        <div class="row">
          <div class="col-lg-12">
            <button type="button" onclick="window.history.go(-1)" class="btn btn-flat btn-info btn-sm"><i class="fas fa-arrow-left"></i> Kembali</button>
            </div>
          </div>
      </div>
    </div>
    <!-- /.content-header -->
    <?php foreach ($detail_pengajuan as $data) { ?>
    <!-- Main content -->
    <div class="content animated fadeInUp faster">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-7">
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info p-2">
                  <a href="<?= base_url('include/foto_mahasiswa/'.$data->photo) ?>" target="_blank">
                    <div class="widget-user-image">
                        <?php if($data->photo == ''){ ?>
                          <img class="img-rounded elevation-2" src="<?= base_url('include/img/default.png')?>" alt="User Avatar">
                        <?php }else{ ?>
                          <img class="img-rounded elevation-2" src="<?= base_url('include/foto_mahasiswa/'.$data->photo)?>" alt="User Avatar">
                        <?php } ?>
                    </div>
                  </a>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><?php echo $data->nama_lengkap ?></h3>
                <h5 class="widget-user-desc"><?php echo $data->universitas ?></h5>
              </div>
              <div class="card-footer p-0">
                <table id="example1" class="table table-striped">
                  <tr>
                    <th width="30%">Nama Lengkap</th>
                    <td width="1%">:</td>
                    <td><?php echo $data->nama_lengkap ?></td>
                  </tr>

                  <tr>
                    <th width="30%">NIM</th>
                    <td width="1%">:</td>
                    <td><?php echo $data->nim ?></td>
                  </tr>

                  <tr>
                    <th width="30%">Universitas</th>
                    <td width="1%">:</td>
                    <td><?php echo $data->universitas ?></td>
                  </tr>

                  <tr>
                    <th width="30%">Jurusan / Fakultas</th>
                    <td width="1%">:</td>
                    <td><?php echo $data->jurfak ?></td>
                  </tr>

                  <tr>
                    <th width="30%">Semester</th>
                    <td width="1%">:</td>
                    <td>Semester <?php echo $data->semester ?></td>
                  </tr>

                  <tr>
                    <th width="30%">Mulai periode magang</th>
                    <td width="1%">:</td>
                    <td><?php echo date('d M Y',strtotime($data->mulai_periode)) ?></td>
                  </tr>

                  <tr>
                    <th width="30%">Akhir periode magang</th>
                    <td width="1%">:</td>
                    <td><?php echo date('d M Y',strtotime($data->akhir_periode)) ?></td>
                  </tr>

                  <tr>
                    <th width="30%">Username</th>
                    <td width="1%">:</td>
                    <td><?php echo $data->username ?></td>
                  </tr>

                  <tr>
                    <th width="30%">Alamat</th>
                    <td width="1%">:</td>
                    <td><?php echo $data->alamat ?></td>
                  </tr>

                  <tr>
                    <th width="30%">Status Pengajuan</th>
                    <td width="1%">:</td>
                    <?php if($data->status == 'disetujui'){ ?>
                      <td class="text-success"><strong><?php echo strtoupper($data->status) ?></strong></td>
                    <?php }else if($data->status == 'pending'){ ?>
                      <td class="text-warning"><strong><?php echo strtoupper($data->status) ?></strong></td>
                    <?php }else{ ?>
                      <td class="text-danger"><strong><?php echo strtoupper($data->status) ?></strong></td>
                    <?php } ?>
                  </tr>
              </table>
              </div>
            </div>
          </div>

          <div class="col-md-5">
            <div class="card card-outline">
              <div class="card-header bg-info">
                <h5 class="card-title m-0"><i class="fas fa-file-alt"></i> Surat Pengantar</h5>
              </div>
              <div class="card-body p-1">
                <a href="<?= base_url('include/surat_pengantar/'.$data->foto_surat) ?>" target="_blank">
                  <img width="100%" id="blah" alt="Foto Surat Pengantar" src="<?= base_url('include/surat_pengantar/'.$data->foto_surat) ?>">
                </a>
              </div>
            </div>
          </div>

          <?php if($data->status == 'disetujui'){ ?>
            <div class="col-md-12 mb-2">
              <div class="alert alert-primary alert-dismissible text-center d-block disabled">
                <i class="fas fa-check"></i> SUDAH DIVERIFIKASI
              </div>
            </div>
          <?php }else if($data->status == 'ditolak') { ?>
            <div class="col-md-12 mb-2">
              <div class="alert alert-primary alert-dismissible text-center d-block disabled">
                <i class="fas fa-check"></i> SUDAH DIVERIFIKASI
              </div>
            </div>
          <?php }else{ ?>
            <div class="col-md-6 mb-2">
              <a href="<?php echo site_url('adm-end/pengajuan/setuju_mahasiswa/'.encode_url($data->id_pengajuan)) ?>" class="btn btn-success btn-block setuju"><i class="fas fa-check"></i> Setuju</a>
            </div>

            <div class="col-md-6">
              <a href="<?php echo site_url('adm-end/pengajuan/tolak_mahasiswa/'.encode_url($data->id_pengajuan)) ?>" class="btn btn-danger btn-block tolak"><i class="fas fa-times"></i> Tolak</a>
            </div>
          <?php } ?>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
    <?php } ?>
  </div>
  <!-- /.content-wrapper -->
  <script src="<?= base_url('include/assets/plugins/jquery/jquery.min.js') ?>"></script>
  <script type="text/javascript">
    $('.setuju').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal({
        title: 'PERINGATAN',
        text: "YAKIN INGIN MENYETUJUI PENGAJUAN INI ?",
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

    $('.tolak').on('click', function(e) {
      e.preventDefault();
      const href = $(this).attr('href');

      Swal({
        title: 'PERINGATAN',
        text: "YAKIN INGIN TOLAK PENGAJUAN INI ?",
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