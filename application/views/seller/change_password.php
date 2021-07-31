<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Seller') ?>">Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Input Data -->
            <div class="content mt-5">
                <!-- List Data -->
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header d-flex justify-content-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h5 class="text-center">Selamat Datang <?= $user['name']; ?></h5>
                                    </div>
                                    <div class="col-md-12">
                                        <?= $this->session->flashdata('message') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header bg-pink ml-5 mr-5 d-flex justify-content-center">
                                <h5 class="card-title text-center pb-4">Ubah Kata Sandi</h5>
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('Seller/change_password'); ?>" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-lg-12">
                                            <label for="current">Kata Sandi Saat Ini</label>
                                            <input type="password" class="form-control mt-3" name="current_password" id="current_password">
                                            <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="new_password1">Kata Sandi Baru</label>
                                            <input type="password" class="form-control mt-3" name="new_password1" id="new_password1">
                                            <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="new_password2">Ulang Kata Sandi Baru</label>
                                            <input type="password" class="form-control mt-3" name="new_password2" id="new_password2">
                                            <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn bg-pink">Simpan</button>
                                </form>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fa fa-spinner"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End List Data -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Input Data -->