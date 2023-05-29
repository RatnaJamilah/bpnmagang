  <?php
    if ($this->session->flashdata('info')) echo $this->session->flashdata('info');
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header animated fadeInUp">
      <div class="container">
        <div class="row">

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content animated fadeInUp faster">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-outline">
              <div class="card-header bg-primary">
                <h5 class="card-title m-0"><i class="fas fa-edit"></i> Form Pengajuan </h5>
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo base_url('pengajuan/process') ?>" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Nama Lengkap</label>
                    <input type="hidden" value="<?php echo $this->session->userdata('id'); ?>" name="id">
                    <input type="text" class="form-control" readonly value="<?php echo $this->session->userdata('nama_lengkap'); ?>" name="nama_lengkap">
                  </div>

                  <div class="form-group">
                    <label>Universitas</label>
                    <input type="text" class="form-control" name="universitas" placeholder="e.g. Universitas Bina Sarana Informatika">
                    <span class="text-red"><?php echo form_error('universitas') ?></span>
                  </div>

                  <div class="form-group">
                    <label>NIM</label>
                    <input type="text" class="form-control" name="nim" placeholder="e.g. 12164440">
                    <span class="text-red"><?php echo form_error('nim') ?></span>
                  </div>

                  <div class="form-group">
                    <label>Jurusan / Fakultas</label>
                    <input type="text" class="form-control" name="jurfak" placeholder="e.g. Sistem Informasi">
                    <span class="text-red"><?php echo form_error('jurfak') ?></span>
                  </div>

                  <div class="form-group">
                    <label>Semester</label>
                    <select class="form-control" name="semester">
                      <option value="">Pilih Semester</option>
                        <?php for ($i=1; $i < 9; $i++){
                          echo "<option value='$i'>$i</option>";
                        } ?>
                    </select>
                    <span class="text-red"><?php echo form_error('semester') ?></span>
                  </div>

                  <div class="form-group">
                    <label>Mulai Periode</label>
                    <input type="date" class="form-control" name="mulai_periode">
                    <span class="text-red"><?php echo form_error('mulai_periode') ?></span>
                  </div>

                  <div class="form-group">
                    <label>Akhir Periode</label>
                    <input type="date" class="form-control" name="akhir_periode">
                    <span class="text-red"><?php echo form_error('akhir_periode') ?></span>
                  </div>

                  <div class="form-group">
                                <label>No. HP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">+62</span>
                                    </div>
                                    <input type="text" name="no_hp" class="form-control" placeholder="No. HP">
                                </div>
                            </div>

                  <div class="form-group">
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat" placeholder="e.g. Condet"></textarea>
                    <span class="text-red"><?php echo form_error('alamat') ?></span>
                  </div>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="card card-outline">
              <div class="card-header bg-primary">
                <h5 class="card-title m-0"><i class="fas fa-camera"></i> Foto Surat Pengantar</h5>
              </div>
              <div class="card-body">
                <img width="100%" id="blah" alt="Foto Surat Pengantar" src="<?= base_url('include/surat_pengantar/box-dot-edited.png') ?>">
                <input class="mt-2" type="file" name="userfile" id="imgInp">
                <span class="text-danger"><?php echo form_error('userfile') ?></span>
              </div>
            </div>
            <div class="alert alert-primary alert-dismissible">
                <h5><i class="fas fa-info-circle"></i> Info!</h5>
                Sebelum mengupload foto surat pengantar, harap untuk diperiksa kembali agar mengurangi kesalahan
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary mb-3">Submit</button>
      </div>
    </div>
  </div>
  </form>
  <!-- /.content-wrapper -->
  <!-- jQuery -->
  <script src="<?= base_url('include/assets/plugins/jquery/jquery.min.js') ?>"></script>
  <script type="text/javascript">
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]); // convert to base64 string
      }
    }

    $("#imgInp").change(function() {
      readURL(this);
    });
  </script>