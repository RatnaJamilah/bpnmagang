<nav id="nav" class="navbar navbar-expand-md fixed-top navbar-dark bg-white shadow-sm">
  <div class="container">
    <a href="<?= base_url('home')?>" class="navbar-brand d-flex align-items-center hvr-shrink">
      <img src="<?= base_url('include/assets-fe/assets/img/32.png')?>" class="navbar-brand">
      <span class="text-dark">BPN | Magang</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa fa-reorder text-aqua"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active pl-1 pr-1">
          <a class="nav-link text-dark scroll hvr-shrink" href="#">Home <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item pl-1 pr-1">
          <a class="nav-link text-dark scroll hvr-shrink" href="#tentang">Tentang</a>
        </li>

        <li class="nav-item pl-1 pr-1">
          <a class="nav-link text-dark scroll hvr-shrink" href="#benefit">Benefit</a>
        </li>

        <li class="nav-item pl-1 pr-1">
          <a class="nav-link text-dark scroll hvr-shrink" href="#faq">FAQ</a>
        </li>

        <li class="nav-item pl-1 pr-1">
          <a class="nav-link text-dark scroll hvr-shrink" href="#kontak">Kontak</a>
        </li>

        <a href="<?= base_url('daftar')?>" class="btn btn-outline-info hvr-buzz">Daftar</a>
      </ul>
    </div>
  </div>
</nav>