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
                    <h1 class="m-0">Absensi melalui QRCODE</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Poin</a></li>
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
            <div class="row">
                <div class="col-xs-12 mx-auto text-center">
                    <?php
                    $attributes = array('id' => 'button');
                    echo form_open('absensi', $attributes); ?>
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
                    <button type="submit" class="btn btn-success" id="konfirm" style="display: none;">Konfirm</button>
                </div>
            </div>
        </div>
</div>
</section>
<?= $this->endSection() ?>