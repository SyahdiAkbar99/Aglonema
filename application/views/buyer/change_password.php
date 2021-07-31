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
                        <div class="card-header color-filter8 ml-5 mr-5">
                            <h5 class="card-title text-center pb-4">Ubah Kata Sandi</h5>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('buyer/change_password'); ?>" method="POST">
                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="current">Kata Sandi Saat Ini</label>
                                        <input type="password" class="form-control s-text7 bg6 w-full p-b-5" name="current_password" id="current_password">
                                        <?= form_error('current_password', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="new_password1">Kata Sandi Baru</label>
                                        <input type="password" class="form-control s-text7 bg6 w-full p-b-5" name="new_password1" id="new_password1">
                                        <?= form_error('new_password1', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="new_password2">Ulang Kata Sandi Baru</label>
                                        <input type="password" class="form-control s-text7 bg6 w-full p-b-5" name="new_password2" id="new_password2">
                                        <?= form_error('new_password2', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn color-filter8">Simpan</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="fa fa-refresh"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End List Data -->
        </div>
    </div>
</section>