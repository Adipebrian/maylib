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
    <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('gagal'); ?>"></div>


    <div class="container container-detail-book d-flex justify-content-center" id="searchBook" style="padding: 50px 0 200px 0;">
      <h1 class="text-white"><?= $book->book_title ?></h1>
    </div>
  </div>
</header>
<!-- END : HEADER -->

<!-- START : LIST BOOK -->
<section class="data-book">
  <div class="container shadow-sm pb-4 p-5 rounded-24" style="background-color: white; margin-top: -100px; margin-bottom: 100px;">
    <div class="row justify-content-around">
      <div class="col-12 col-md-6 d-flex justify-content-center">
        <img src="<?= base_url() ?>/img/buku/<?= $book->cover ?>" class="img-fluid" style="max-width: 360px; max-height: 360px;">
      </div>
      <div class="col-12 col-md-6 mt-5 mt-md-0">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">Judul Buku </th>
              <td>:</td>
              <td><?= $book->book_title ?></td>
            </tr>
            <tr>
              <th scope="row">Kelas </th>
              <td>:</td>
              <td><?= $book->for_class ?></td>
            </tr>
            <tr>
              <th scope="row">Kategori</th>
              <td>:</td>
              <td><?= $book->categories ?></td>
            </tr>
            <tr>
              <th scope="row">Penulis</th>
              <td>:</td>
              <td><?= $book->penulis ?></td>
            </tr>
            <tr>
              <th scope="row">Penerbit</th>
              <td>:</td>
              <td><?= $book->penerbit ?></td>
            </tr>
            <tr>
              <th scope="row">Tahun Terbit</th>
              <td>:</td>
              <td><?= $book->tahun_terbit ?></td>
            </tr>
            <tr>
              <th scope="row">ISBN</th>
              <td>:</td>
              <td><?= $book->isbn ?></td>
            </tr>
          </tbody>
        </table>
        <p class="text-justify caption-text mt-4" style="text-indent: 30px;"><?= $book->description ?></p>
      </div>
      <div class="col-12 d-flex justify-content-center">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-fill text-white px-5 my-5" type="submit" style="width: 50%;" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Borrow
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are you sure to borrow this book?
              </div>
              <form action="/pinjam" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-footer">
                  <input type="hidden" name="id" value="<?= $book->id ?>">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Sure!</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
<?= $this->endSection() ?>