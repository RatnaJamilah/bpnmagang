<?php
if ($this->session->flashdata('info')) echo $this->session->flashdata('info');
?>
<link rel="stylesheet" type="text/css" href="<?= base_url('include/assets-fe/assets/thememagang.css')?>">
<main role="main" id="home">
  <section class="jumbotron bg-info text-center" id="home" style="padding-top:12rem; padding-bottom:15rem; height:100%;">
    <div class="container">
      <h1 class="jumbotron-heading text-white">BPN Magang</h1>
      <p class="lead text-white">Belajar bersama kami, kami membuka penerimaan Mahasiswa Magang yang sedang melaksanakan kegiatan Magang atau PKL</p>
      <p>
        <a href="#tentang" id="pelajari" class="btn btn-outline-light my-2 scroll">Pelajari Selengkapnya</a>
      </p>
    </div>
  </section>

  <div class="bg-light" id="tentang" style="padding-top:100px; padding-bottom:100px; height:100%;">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-md-5">
            <img src="<?= base_url('include/assets-fe/assets/img/depan.jpg')?>" class="card-img-top hvr-grow" alt="...">
        </div>
        <div class="col-md-7">
            <div class="card-body">
                <h3>Belajar Bersama Kami</h3>
                <p>BPN adalah Instansi lembaga pemerintah nonkementerian di Indonesia yang mempunyai tugas melaksanakan tugas pemerintahan di bidang Pertanahan sesuai dengan ketentuan peraturan perundang-undangan</p>
                <ul>
                  <li><i class="icofont-check-circled text-success"></i> Ruang kerja yang nyaman</li>
                  <li><i class="icofont-check-circled text-success"></i> Staff pekerja yang ramah</li>
                  <li><i class="icofont-check-circled text-success"></i> Lingkungan kerja yang positif</li>
                </ul>
                <p>
                  Kami menjamin Mahasiswa akan belajar banyak hal tentang perusahaan Instansi ini
                </p>
            </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container slow" id="benefit" style="padding-top:50px;height:100%;">
      <div class="row py-5 no-gutters">
        <div class="col-md-12 text-center">
          <h2 class="text-center">Benefit</h2>
          <!--<span class="text-center d-block m-auto">Fiqs magang memberikan benefit untuk Mahasiswa yang sedang dalam masa Magang / PKL</span>-->
        </div>
      </div>
      <div class="row">
        <!--<div class="col-md-3">
          <div class="card mb-4 box-shadow hvr-float mb-4" style="border-bottom: 5px solid #26c1f6;">
            <div class="card-body text-center">
              <i class="icofont-license icofont-5x text-aqua"></i>
              <h5>Sertifikat</h5>
              <p class="card-text mt-4">Kami memberikan sertifikat untuk mahasiswa yang telah menyelesaikan masa periode magang / PKL.</p>
            </div>
          </div>
        </div>-->
        <div class="col-md-6">
          <div class="card mb-4 box-shadow hvr-float" style="border-bottom: 5px solid #26c1f6;">
            <div class="card-body text-center">
              <i class="icofont-food-basket icofont-5x text-aqua"></i>
              <h5>Meals & Drinks</h5>
              <p class="card-text mt-4">Kami menyediakan minum dan camilan untuk Mahasiswa jika ingin istirahat sejenak.</p>
            </div>
          </div>
        </div>
       <!-- <div class="col-md-3">
          <div class="card mb-4 box-shadow hvr-float" style="border-bottom: 5px solid #26c1f6;">
            <div class="card-body text-center">
              <i class="icofont-laptop-alt icofont-5x text-aqua"></i>
              <h5>Laptop</h5>
              <p class="card-text mt-4">Kami menyediakan laptop khusus untuk Mahasiswa magang / PKL dalam proses belajar.</p>
            </div>
          </div>
        </div>-->
        <div class="col-md-6">
          <div class="card mb-4 box-shadow hvr-float" style="border-bottom: 5px solid #26c1f6;">
            <div class="card-body text-center">
              <i class="icofont-graduate icofont-5x text-aqua"></i>
              <h5>Kerja Kontrak</h5>
              <p class="card-text mt-4">Kami memberikan kontrak kerja jika Mahasiswa tersebut melakukan pekerjaan dengan sangat baik.</p>
            </div>
          </div>
        </div>
      </div>
  </div>

  <div class="container" id="faq" style="padding-top:50px;height:100%;">
      <div class="row py-5 no-gutters">
        <div class="col-md-12 text-center">
          <h2 class="text-center">Frequently Asked Question</h2>
          <!--<span class="text-center d-block m-auto">Berikut adalah pertanyaan paling sering oleh Mahasiswa dalam menggunakan website ini</span>-->
        </div>
      </div>
      <!-- FAQ -->
      <div class="row">
        <div class="col-md-12">
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingOne">
                          <h4 class="panel-title">
                              <a class="first" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                  Bagaimana cara mendaftarnya ?
                                  <span> </span>
                              </a>
                          </h4>
                      </div>
                      <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">
                              <p>Masuk ke halaman daftar kemudian isi pada form registrasi masukan nama lengkap, username dan password.</p>
                          </div>
                      </div>
                  </div>

                  <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingTwo">
                          <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  Bagaimana untuk memulai pengajuan magang atau PKL ?
                                  <span> </span>
                              </a>
                          </h4>
                      </div>
                      <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                              <p>Masuk ke menu Pengajuan Magang di panel Mahasiswa kemudian isi data-data yang tertera beserta foto surat pengantar dari masing-masing kampus.</p>
                          </div>
                      </div>
                  </div>

                  <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingThree">
                          <h4 class="panel-title">
                              <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                  Berapa hari dalam proses verifikasi pengajuan Magang / PKL ?
                                  <span> </span>
                              </a>
                          </h4>
                      </div>
                      <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                              <p>Proses pengajuan akan dilakukan oleh admin paling lambat 3 hari</p>
                          </div>
                      </div>
                  </div>

                  <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingFour">
                          <h4 class="panel-title">
                              <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                  Saya lupa password, bagaimana untuk mengembalikan nya ?
                                  <span> </span>
                              </a>
                          </h4>
                      </div>
                      <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                          <div class="panel-body">
                              <p>Hubungi admin dengan menggunakan widget WhatsApp di bawah</p>
                          </div>
                      </div>
                  </div>

                  <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="headingFive">
                          <h4 class="panel-title">
                              <a class="collapsed last" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseThree">
                                  Bagaimana saya mengetahui, pengajuan bahwa saya diterima atau tidak ?
                                  <span> </span>
                              </a>
                          </h4>
                      </div>
                      <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                          <div class="panel-body">
                              <p>Silahkan login ke halaman Panel Mahasiswa dan lihat status pengajuan, jika anda diterima silahkan datang ke kantor kami.</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>