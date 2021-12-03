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
                    <h1 class="m-0">Konfirmasi Peminjaman buku melalui QRCODE</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Konfirmasi</a></li>
                        <li class="breadcrumb-item active">QRCODE</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-xs-12 mx-auto">
                    <?php
                    $attributes = array('id' => 'button');
                    echo form_open('konfirmasi/qr_code_confirm', $attributes); ?>
                    <?= csrf_field() ?>
                    <div id="sourceSelectPanel" style="display:none">
                        <label for="sourceSelect">Change video source:</label>
                        <select id="sourceSelect" style="max-width:400px;"></select>
                    </div>
                    <div>
                        <video id="video" width="500" height="400" style="border: 1px solid gray;  margin:auto;"></video>
                    </div>
                    <textarea hidden="" name="result" id="result" readonly></textarea>
                    <a href="#" style="display: none;" data-toggle="modal" data-target="#modal-default" id="modal"></a>
                   
                    <div class="modal fade" id="modal-default">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Lama Peminjaman</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <label for="hari">Lama Peminjaman</label>
                                    <input type="number" class="form-control" id="hari" placeholder="Hari" name="Ddate" required>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Konfirm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div> -->
            <div class="row">
                <div class="col-xs-12 mx-auto text-center">
                    <?php
                    $attributes = array('id' => 'button');
                    echo form_open('konfirmasi/qr_code_confirm', $attributes); ?>
                    <?= csrf_field() ?>
                    <div>
                        <video id="video" width="400" height="300" style="border: 1px solid gray; margin: 20px auto;"></video>
                    </div>
                    <div id="sourceSelectPanel" style="display:none">
                        <label for="sourceSelect">Change video source:</label>
                        <select id="sourceSelect" style="max-width:400px">
                        </select>
                    </div>
                    <div class="col mt-2 mb-4">
                        <a class="btn btn-primary" id="startButton">Start</a>
                        <a class="btn btn-primary" id="resetButton">Reset</a>
                    </div>
                    <textarea hidden="" name="result" id="result" readonly></textarea>
                    <a href="#" style="display: none;" data-toggle="modal" data-target="#modal-default" id="modal"></a>
                </div>
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Lama Peminjaman</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label for="hari">Lama Peminjaman</label>
                                <input type="number" class="form-control" id="hari" placeholder="Hari" name="Ddate" required>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Konfirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
</div>
</section>
<?= $this->endSection() ?>