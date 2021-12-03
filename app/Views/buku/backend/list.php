<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Flashdata -->
    <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('gagal'); ?>"></div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">List Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Staff</a></li>
                        <li class="breadcrumb-item active">List Book</li>
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
                            <h3 class="card-title">List Book</h3>
                            <a href="/buku/add" class="d-flex float-md-right btn btn-primary">
                                Create New
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Kelas</th>
                                        <th>Kategori</th>
                                        <th>Jurusan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($books as $b) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $b->book_title ?></td>
                                            <td><?= $b->for_class ?></td>
                                            <td> <?= $b->categories ?></td>
                                            <td> <?= $b->jurusan ?></td>
                                            <td>
                                                <?php if ($b->qr_status == 1) : ?>
                                                    <a href="#" class="badge badge-secondary" data-toggle="modal" data-target="#modal-qr<?= $b->id ?>"><i class="fas fa-eye"></i></a>
                                                <?php else : ?>
                                                    <a href="#" class="badge badge-primary" data-toggle="modal" data-target="#modal-create<?= $b->id ?>"><i class="fas fa-qrcode"></i></a>
                                                <?php endif; ?>
                                                <a href="edit/<?= $b->id ?>" class="badge badge-success"> <i class="far fa-edit"></i></a>
                                                <a href="#" class="badge badge-danger" data-toggle="modal" data-target="#modal-default<?= $b->id ?>"> <i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Kelas</th>
                                        <th>Kategori</th>
                                        <th>Jurusan</th>
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
    <div class="modal fade" id="modal-default<?= $b->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="delete" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" value="<?= $b->id ?>" name="id">
                        <p>Apakah anda yakin ingin menghapus data <b><?= $b->book_title ?></b> ?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>Delete</button>
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
    <div class="modal fade" id="modal-create<?= $b->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">QrCode</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/qrcode_book" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <p>Klik Generate untuk membuat Qrcode</p>
                        <input type="hidden" value="<?= $b->id ?>" name="id">
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
    <div class="modal fade" id="modal-qr<?= $b->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">QrCode</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="mx-auto m-5">
                    <?php if ($b->qr_status == 1) : ?>
                        <img src="/img/buku/qrcode/<?= $b->id ?>.png" alt="" width="150px" height="150px" class="img-thumbnail">
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