<?= $this->extend('layout/home') ?>
<?= $this->section('content') ?>

<!-- START : HEADER -->
<header class="h-100 w-100" style="box-sizing: border-box; background-color: #141432">
  <div class="header-4-3 container-xxl mx-auto p-0 position-relative" style="font-family: 'Poppins', sans-serif;">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a href="search-book.html">
        <img style="margin-right:0.75rem" src="<?= base_url() ?>/home/images/MayLib.png" alt="">
      </a>
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#targetModal-item">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="modal-item modal fade" id="targetModal-item" tabindex="-1" role="dialog" aria-labelledby="targetModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content border-0" style="background-color: #141432;">
            <div class="modal-header border-0" style="padding:	2rem; padding-bottom: 0;">
              <a class="modal-title" id="targetModalLabel">
                <img style="margin-top:0.5rem" src="http://api.elements.buildwithangga.com/storage/files/2/assets/Header/Header2/Header-2-3.png" alt="">
              </a>
              <button type="button" class="close btn-close text-white" data-bs-dismiss="modal" aria-label="Close">
              </button>
            </div>
            <div class="modal-body" style="padding:	2rem; padding-top: 0; padding-bottom: 0;">
              <ul class="navbar-nav responsive me-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                  <a class="nav-link" href="/" style="color: #E7E7E8;">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/maylib">Search Book</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/about">About Us</a>
                </li>
              </ul>
            </div>
            <?php if (logged_in()) : ?>
              <div class="modal-footer border-0 gap-3" style="padding:	2rem; padding-top: 0.75rem">
                <a href="/logout" class="btn btn-default btn-no-fill">Logout</a>
                <a href="/user" class="btn btn-fill border-0 text-white">Dashboard</a>
              </div>
            <?php else : ?>
              <div class="modal-footer border-0 gap-3" style="padding:	2rem; padding-top: 0.75rem">
                <a href="/login" class="btn btn-default btn-no-fill">Log In</a>
                <a href="/register" class="btn btn-fill border-0 text-white">Register</a>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="/" style="color: #E7E7E8;">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/maylib">Search Book</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About Us</a>
          </li>
        </ul>
        <?php if (logged_in()) : ?>
          <div class="gap-3">
            <a href="/logout" class="btn btn-default btn-no-fill">Logout</a>
            <a href="/user" class="btn btn-fill text-white border-0">Dashboard</a>
          </div>
        <?php else : ?>
          <div class="gap-3">
            <a href="/login" class="btn btn-default btn-no-fill">Log In</a>
            <a href="/register" class="btn btn-fill text-white border-0">Register</a>
          </div>
        <?php endif; ?>
      </div>
    </nav>
    <div class="container container-detail-book d-flex justify-content-center" id="searchBook">
      <h1 class="text-white"><?= $key ?></h1>
    </div>

    <div class="container-xxl container-search d-flex justify-content-center" id="searchBook">
      <form action="/searchBook" method="post">
        <div class="d-flex input-form justify-content-between">
          <input class="form-control" name="key" type="text" placeholder="Masukan Nama Buku" value="<?= $key ?>" />
          <button type="submit" class="form-control">Cari Buku</button>
        </div>
        <div class="d-block d-md-flex justify-content-between align-items-center mt-4">
          <span class="d-block d-md-inline text-white">Filter : </span>
          <div class="d-flex justify-content-between">
            <input class="d-inline input-field border-0 form-control" name="kategori" list="categories" placeholder="Categories" />
            <datalist id="categories">
              <option value="Jurusan" <?php if ($kategori == 'Jurusan') {
                                        echo 'selected';
                                      } ?>>
              <option value="Umum" <?php if ($kategori == 'Umum') {
                                      echo 'selected';
                                    } ?>>
            </datalist>
            <input class="d-inline input-field border-0 form-control" name="jurusan" list="vocational" placeholder="Vocational" />
            <datalist id="vocational">
              <option value="TKJ" <?php if ($jurusan == 'TKJ') {
                                    echo 'selected';
                                  } ?>>
              <option value="Multimedia" <?php if ($jurusan == 'Multimedia') {
                                            echo 'selected';
                                          } ?>>
              <option value="AKL" <?php if ($jurusan == 'AKL') {
                                    echo 'selected';
                                  } ?>>
              <option value="OTKP" <?php if ($jurusan == 'OTKP') {
                                      echo 'selected';
                                    } ?>>
              <option value="Umum" <?php if ($jurusan == 'Umum') {
                                      echo 'selected';
                                    } ?>>
            </datalist>
            <input class="d-inline input-field border-0 form-control" name="kelas" list="class" placeholder="Class" />
            <datalist id="class">
              <option value="10" <?php if ($kelas == '10') {
                                    echo 'selected';
                                  } ?>>
              <option value="11" <?php if ($kelas == '11') {
                                    echo 'selected';
                                  } ?>>
              <option value="12" <?php if ($kelas == '12') {
                                    echo 'selected';
                                  } ?>>
              <option value="Umum" <?php if ($kelas == 'Umum') {
                                      echo 'selected';
                                    } ?>>
            </datalist>
          </div>
        </div>
      </form>
    </div>
  </div>
</header>
<!-- END : HEADER -->



<!-- START : LIST BOOK -->
<section class="list-book">
  <div class="container pb-4 px-4">
    <?php if ($hasil) : ?>
      <div class="row gap-lg-3 gap-1 justify-content-around">
        <?php foreach ($hasil as $b) : ?>
          <div class="col-6 col-md-3 shadow-sm p-lg-4 p-2" onmouseover="coloringgoals(this)" onmouseout="normalgoals(this)" style="max-width: 250px;">
            <img src="<?= base_url() ?>/img/buku/<?= $b->cover ?>" alt="taxes" class="img-fluid">
            <h6 class="fw-bold mt-4 mb-1 cl-blue">
              <?= $b->book_title ?>
            </h6>
            <p class="card-body p-0">
              Buku <?= $b->categories ?> <?= $b->jurusan ?> Untuk Kelas <?= $b->for_class ?>
            </p>
            <a href="/home/detail/<?= $b->id ?>" class="d-block btn btn-detail text-white mt-4">Detail Book</a>
          </div>
        <?php endforeach; ?>

      </div>
    <?php else : ?>
      <!-- if book is not match -->
      <div class="d-flex container book-not-match align-items-center" style="margin-top: 200px;">
        <div class="row text-center">
          <h2>Oops!!! <br> Buku yang kamu cari tidak ditemukan</h2>
          <p>data yang kamu cari tidak ada, pastikan kata kunci benar atau coba gunakan kata kunci lain</p>
        </div>
      </div>
  </div>
<?php endif; ?>
</section>
<?= $this->endSection() ?>