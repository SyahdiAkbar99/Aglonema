<!-- Slide1 -->
<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">

        </div>
    </div>
</section>

<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <!-- Input Data -->
        <div class="content mt-5">
            <!-- List Data -->
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h5 class="text-center">Selamat Datang <?= $user['name']; ?></h5>
                            </div>
                            <div class="card-title">
                                <?= $this->session->flashdata('message') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header color-filter8 ml-5 mr-5 d-flex justify-content-center">
                            <h5 class="card-title text-center pb-4">Edit Profil</h5>
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart('buyer/edit_profile') ?>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control s-text7 bg6 w-full p-b-5" name="email" id="email" value="<?= $user['email']; ?>" readonly>
                                </div>
                                <div class="form-group col-md-12 col-lg-6">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control s-text7 bg6 w-full p-b-5" name="name" id="name" value="<?= $user['name']; ?>">
                                    <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12 col-lg-6">
                                    <label for="telp">No Telepon</label>
                                    <input type="tel" class="form-control bg6 w-full p-b-5" name="no_telp" id="no_telp" value="<?= $user['no_telp']; ?>">
                                    <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-2">Gambar</div>
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <img src="<?= base_url('assets/user/img/profile/') . $user['image']; ?>" class="img-circle elevation-2 img-thumbnail rounded-circle" alt="Profile User Image">
                                        </div>
                                        <div class="col-md-9">
                                            <div class="custom-file">
                                                <input type="file" name="image" id="image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn color-filter8">Simpan</button>
                            <?= form_close(); ?>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="fa fa-refresh"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End List Data -->
    </div>
</section>