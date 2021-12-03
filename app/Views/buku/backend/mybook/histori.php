<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Flashdata -->
    <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Book Histori</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">My Book</a></li>
                        <li class="breadcrumb-item active">My Book Histori</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">My Book</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Buku</th>
                                        <th>Kelas</th>
                                        <th>Kategori</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Dikembalikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($books as $b) : ?>
                                        <tr>
                                            <td><?= $b->book_title ?></td>
                                            <td><?= $b->for_class ?></td>
                                            <td> <?= $b->categories ?></td>
                                            <td> <?= $b->date_loan ?></td>
                                            <td> <?= $b->date_return ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Buku</th>
                                        <th>Kelas</th>
                                        <th>Kategori</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Dikembalikan</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>