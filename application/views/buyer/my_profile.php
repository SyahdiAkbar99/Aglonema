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
        <div class="content mt-5">
            <!-- List Data -->
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="text-center">Selamat Datang <?= $user['name']; ?></h5>
                            <?= $this->session->flashdata('message') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header color-filter8 mt-2 ml-2 mr-2 d-flex justify-content-center">
                            <h5 class="card-title text-center pb-3 pt-4">My Profil</h5>
                        </div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <h5 class="mb-3">Data <?= $user['name']; ?></h5>
                                <div class="col-md-12 d-flex justify-content-center gbr">
                                    <img src="<?= base_url('assets/admin/img/') . $user['image']; ?>" class="img-circle elevation-2 img-thumbnail rounded-circle" alt="Profile User Image">
                                </div>
                            </div>
                            <div class="row text-center mt-4">
                                <div class="col-md-12">
                                    <div class="card-body pt-1 ml-2 mr-2 rounded">
                                        <div class="row justify-content-center">
                                            <div class="col-md-12 col-lg-12 mx-auto lab">
                                                <p class="labelku pb-1 pt-2"><?= $user['name']; ?></p>
                                                <p class="labelku pb-1"><?= $user['email']; ?></p>
                                                <p class="labelku" class="pb-1"><?= $user['no_telp']; ?></p>
                                                <label for="since">Member Since <?= date('d F Y', $user['date_created']); ?></label><br><br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <a href="<?= base_url('buyer/edit_profile') ?>" class="btn btn-warning">
                                    <i class="fa fa-edit"></i> Edit Profile
                                </a>
                                <a href="<?= base_url('buyer/change_password') ?>" class="btn btn-warning">
                                    <i class="fa fa-key"></i> Change Password
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End List Data -->
        </div>
    </div>
</section>