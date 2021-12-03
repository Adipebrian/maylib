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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Book</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Buku</th>
                                        <th>Status Peminjaman</th>
                                        <th>Status Pengembalian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($books as $b) : ?>
                                        <tr>
                                            <td><?= $b->book_title ?></td>
                                            <?php if ($b->loan_status == 1) : ?>
                                                <td><button class="badge bg-success">Terpinjam</button></td>
                                            <?php else : ?>
                                                <td><button class="badge bg-warning">Pending</button></td>
                                            <?php endif ?>
                                            <?php if ($b->return_status == 1) : ?>
                                                <td><button class="badge bg-success">Telah Dikembalikan</button></td>
                                            <?php else : ?>
                                                <td><button class="badge bg-warning">Pending</button></td>
                                            <?php endif ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Buku</th>
                                        <th>Status Peminjaman</th>
                                        <th>Status Pengembalian</th>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->endSection() ?>