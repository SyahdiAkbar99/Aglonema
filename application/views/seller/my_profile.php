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
                        <li class="breadcrumb-item"><a href="<?= base_url('Seller') ?>">Home</a></li>
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
                            <div class="card-header bg-pink ml-5 mr-5 d-flex justify-content-center">
                                <h5 class="card-title text-center pb-4">My Profil</h5>
                            </div>
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <h5>Data <?= $user['name']; ?></h5>
                                    <div class="col-md-12 d-flex justify-content-center gbr">
                                        <img src="<?= base_url('assets/admin/img/profile/seller/') . $user['image']; ?>" class="img-circle elevation-2" alt="Profile User Image">
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
                        </div>
                    </div>
                </div>
                <!-- End List Data -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- Input Data -->