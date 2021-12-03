<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Staff</a></li>
                        <li class="breadcrumb-item active">Add Book</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="/buku/update" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $book['id'] ?>">
            <input type="hidden" name="coverLama" value="<?= $book['cover'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Book</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                            <?= csrf_field(); ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="judul">Judul Buku</label>
                                    <input type="text" name="judul" id="judul" class="form-control" value="<?= $book['book_title'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Kelas</label>
                                    <select id="inputStatus" class="form-control custom-select" name="kelas">
                                        <option selected disabled>Select one</option>
                                        <option  <?= ($book['for_class'] == 10) ? 'selected' : '' ?>>10</option>
                                        <option <?= ($book['for_class'] == 11) ? 'selected' : '' ?>>11</option>
                                        <option <?= ($book['for_class'] == 12) ? 'selected' : '' ?>>12</option>
                                        <option <?= ($book['for_class'] == 'Umum') ? 'selected' : '' ?>>Umum</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Kategori</label>
                                    <select id="inputStatus" class="form-control custom-select" name="categories">
                                        <option selected disabled>Select one</option>
                                        <option <?= ($book['categories'] == 'Jurusan') ? 'selected' : '' ?>>Jurusan</option>
                                        <option <?= ($book['categories'] == 'Umum') ? 'selected' : '' ?>>Umum</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Jurusan</label>
                                    <select id="inputStatus" class="form-control custom-select" name="jurusan">
                                        <option selected disabled>Select one</option>
                                        <option <?= ($book['jurusan'] == 'TKJ') ? 'selected' : '' ?>>TKJ</option>
                                        <option <?= ($book['jurusan'] == 'BDP') ? 'selected' : '' ?>>BDP</option>
                                        <option <?= ($book['jurusan'] == 'OTKP') ? 'selected' : '' ?>>OTKP</option>
                                        <option <?= ($book['jurusan'] == 'AKL') ? 'selected' : '' ?>>AKL</option>
                                        <option <?= ($book['jurusan'] == 'Umum') ? 'selected' : '' ?>>Umum</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="penulis">Penulis</label>
                                    <input type="text" name="penulis" id="penulis" class="form-control" value="<?= $book['penulis'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" name="penerbit" id="penerbit" class="form-control" value="<?= $book['penerbit'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="thn_terbit">Tahun Terbit</label>
                                    <input type="number" name="thn_terbit" id="thn_terbit" class="form-control" value="<?= $book['tahun_terbit'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="isbn">ISBN</label>
                                    <input type="text" name="isbn" id="isbn" class="form-control" value="<?= $book['isbn'] ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Deskripsi Buku</label>
                                    <textarea id="inputDescription" name="deskripsi" class="form-control" rows="4" required><?= $book['description'] ?></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Cover</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-12">
                                    <img src="/img/buku/<?= $book['cover']?>" alt="" class="img-thumbnail img-preview">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="foto" name="cover" onchange="previewImg()">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <a href="/buku/list" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Save" class="btn btn-success float-right">
                </div>
            </div>
            </form>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>