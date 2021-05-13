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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
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
                        <div class="card ">
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
                                <h5 class="card-title text-center pb-4">Edit Profile</h5>
                            </div>
                            <div class="card-body">
                                <?= form_open_multipart('seller/edit_profile') ?>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= $user['email']; ?>" readonly>
                                    </div>
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="name">Fullname</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= $user['name']; ?>">
                                        <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12 col-lg-6">
                                        <label for="telp">No Telpon</label>
                                        <input type="tel" class="form-control" name="no_telp" id="no_telp" value="<?= $user['no_telp']; ?>">
                                        <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-2">Picture</div>
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="<?= base_url('assets/admin/img/') . $user['image']; ?>" class="img-circle elevation-2 img-thumbnail" alt="Profile User Image">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="image" name="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-pink ">Simpan</button>
                                <?= form_close(); ?>
                            </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="fa fa-spinner"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End List Data -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Input Data -->