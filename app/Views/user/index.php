<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">My Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">User</a></li>
                        <li class="breadcrumb-item active">My Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Flashdata -->
    <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="/img/<?= $user->image ?>" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><?= $user->username ?></h3>
                            <p class="text-muted text-center"><?= $user->name ?></p>
                            <h2 class="text-center">POIN</h2>
                            <span class="btn bg-purple d-block text-center"><?= $poin ?></span>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">


                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" action="/user/update/<?= $user->userid ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?= $user->userid ?>">
                                        <input type="hidden" name="fullname" value="<?= $user->fullname ?>">
                                        <input type="hidden" name="fotoLama" value="<?= $user->image ?>">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Fullname</label>
                                            <div class="col-sm-10">
                                                <input type="input" name="fullname" class="form-control <?= ($validation->hasError('fullname')) ? 'is-invalid' : ''; ?>" id="inputName" placeholder="Username" value="<?= (old('fullname')) ? old('fullname') : $user->username ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('fullname') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                                            <div class="col-sm-10">
                                                <input type="input" class="form-control" value="<?= $user->username ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Kelas</label>
                                            <div class="col-sm-10">
                                                <input type="input" class="form-control" value="<?= $user->kelas ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Jurusan</label>
                                            <div class="col-sm-10">
                                                <input type="input" class="form-control" value="<?= $user->jurusan ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" disabled class="form-control" id="inputEmail" value="<?= $user->email ?>">
                                                <small>Jika ingin edit username,kelas,jurusan,email hubungi admin <a href="<?= base_url() ?>/home/about">click here</a></small>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Qrcode</label>
                                            <div class="col-sm-10">
                                                <?php if ($user->qrcode_status == 1) : ?>
                                                    <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-qr<?= $user->userid ?>"> Show Qrcode <i class="fas fa-eye"></i></a>
                                                <?php else : ?>
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-default<?= $user->userid ?>"> Create Qrcode <i class="fas fa-qrcode"></i></a>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="foto" class="col-sm-2 col-form-label">Image</label>
                                            <div class="col-sm-2">
                                                <img src="/img/<?= $user->image ?>" alt="" class="img-thumbnail img-preview">
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control <?= ($validation->hasError('foto')) ? 'is-invalid' : ''; ?>" id="foto" name="foto" onchange="previewImg()">
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('foto') ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">Edit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
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
<!-- Modal -->
<div class="modal fade" id="modal-default<?= $user->userid ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">QrCode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/qrcode_user" method="POST">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <p>Klik Generate untuk membuat Qrcode</p>
                    <input type="hidden" value="<?= $user->user_code ?>" name="code">
                    <input type="hidden" value="<?= $user->userid ?>" name="id">
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

<!-- Modal -->
<div class="modal fade" id="modal-qr<?= $user->userid ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">QrCode</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="mx-auto m-5">
                <?php if ($user->qrcode_status == 1) : ?>
                    <img src="/img/qrcode_user/<?= $user->user_code ?>.png" alt="" width="150px" height="150px" class="img-thumbnail">
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

<?= $this->endSection() ?>