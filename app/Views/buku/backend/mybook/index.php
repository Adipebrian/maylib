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
                    <h1 class="m-0">My Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Book</a></li>
                        <li class="breadcrumb-item active">My Book</li>
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
                                        <th>Code</th>
                                        <th>Status Peminjaman</th>
                                        <th>Status Pengembalian</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($books as $b) : ?>
                                        <tr>
                                            <td><?= $b->book_title ?></td>
                                            <td><?= $b->code ?></td>
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
                                            <td>
                                                <?php if ($b->qrcode == 1) : ?>
                                                    <a href="#" class="badge badge-success" data-toggle="modal" data-target="#modal-qr<?= $b->loanId ?>"> Show Qrcode <i class="fas fa-eye"></i></a>
                                                <?php else : ?>
                                                    <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modal-default<?= $b->loanId ?>"> Create Qrcode <i class="fas fa-qrcode"></i></a>
                                                <?php endif; ?>
                                                <a href="#" class="badge badge-warning" data-toggle="modal" data-target="#modal-detail<?= $b->loanId ?>"> Show Detail <i class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Buku</th>
                                        <th>Code</th>
                                        <th>Status Peminjaman</th>
                                        <th>Status Pengembalian</th>
                                        <th>Action</th>
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

<?php foreach ($books as $b) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-detail<?= $b->loanId ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <b>Judul</b> = <small><?= $b->book_title ?></small> <br>
                    <b>Kelas</b> = <small><?= $b->for_class ?></small> <br>
                    <b>Kategori</b> = <small><?= $b->categories ?></small> <br>
                    <b>Tanggal Peminjaman</b> = <small><?= $b->loan_date ?></small> <br>
                    <b>Tanggal Pengembalian</b> = <small><?= $b->date_of_return ?></small> <br>
                    <b>Tanggal Dikembalikan</b> = <small><?= $b->tanggal_dikembalikan ?></small> <br>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>
<?php foreach ($books as $b) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-default<?= $b->loanId ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">QrCode</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/qrcode" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <p>Klik Generate untuk membuat Qrcode</p>
                        <input type="hidden" value="<?= $b->code ?>" name="code">
                        <input type="hidden" value="<?= $b->loanId ?>" name="id_loan">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Generate</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>

<?php foreach ($books as $b) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-qr<?= $b->loanId ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">QrCode</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="mx-auto m-5">
                    <?php if ($b->qrcode == 1) : ?>
                        <img src="/img/qrcode/<?= $b->code ?>.png" alt="" width="150px" height="150px" class="img-thumbnail">
                    <?php else : ?>
                        <p>Belum Generate</p>
                    <?php endif; ?>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>
<?= $this->endSection() ?>