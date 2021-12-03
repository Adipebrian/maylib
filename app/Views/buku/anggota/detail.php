<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Anggota</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Staff</a></li>
                        <li class="breadcrumb-item active">Anggota</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small Box (Stat card) -->
            <h5 class="mb-2 mt-4">Anggota Perpustakaan Kelas <?= $uri->getSegment(3) ?></h5>
            <?php if($uri->getSegment(3) == 'umum') :?>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner text-center">
                            <p>Umum</p>
                            <h1>Guru</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/guru" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>TKJ 1</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/tkj1" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>TKJ 2</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/tkj2" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>MM 1</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/mm1" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>MM 2</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/mm2" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>AKL 1</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/akl1" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>AKL 2</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/akl2" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>AKL 3</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/akl3" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>AKL 4</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/akl4" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>AKl 5</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/akl5" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-secondary">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>OTKP 1</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/otkp1" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-secondary">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>OTKP 2</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/otkp2" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-secondary">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>OTKP 3</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/otkp3" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-secondary">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>OTKP 4</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/otkp4" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>BDP 1</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/bdp1" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>BDP 2</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/bdp2" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner text-center">
                            <p>Jurusan</p>
                            <h1>BDP 3</h1>
                        </div>
                        <a href="/<?= $uri->getPath() ?>/bdp3" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <?php endif; ?>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>