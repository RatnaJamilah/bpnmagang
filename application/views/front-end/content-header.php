<nav id="nav" class="navbar navbar-expand-md fixed-top navbar-dark bg-white shadow-sm">
  <div class="container">
    <a href="<?= base_url('home')?>" class="navbar-brand d-flex align-items-center hvr-forward">
      <img src="<?= base_url('include/assets-fe/assets/img/32.png')?>" class="navbar-brand">
      <span class="text-dark">BPN | Magang</span>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-reorder text-info"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active mr-3">
          <a class="nav-link text-dark hvr-shrink" href="<?= base_url()?>">Home <span class="sr-only">(current)</span></a>
        </li>

        <a href="<?= base_url('login')?>" class="btn btn-outline-info hvr-buzz">Login</a>
      </ul>
    </div>
  </div>
</nav>
<script src="<?= base_url('include/assets-fe/assets/plugin/jquery/jquery.min.js')?>"></script>
<script src="<?= base_url('include/assets-fe/assets/js/bootstrap.min.js')?>"></script>