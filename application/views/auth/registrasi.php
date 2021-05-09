<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('auth/registration') ?>" class="h1"><b><?= $title; ?></b></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p class="login-box-msg">Belum punya akun <b>?</b> Daftar disini <b>!</b></p>
                </div>
                <div class="col-md-12">
                    <p class="login-box-msg"><?= $this->session->flashdata('message') ?></p>
                </div>
            </div>
            <form action="<?= base_url('auth/registration') ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ?>" placeholder="Nama Lengkap">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('name', '<small class="text-danger pb-3">', '</small>'); ?>

                <div class="input-group mt-2">
                    <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                <div class="input-group mt-2">
                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>

                <div class="input-group mt-2">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>

                <div class="input-group mt-2">
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat') ?>" placeholder="Alamat">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-address-card"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>

                <div class="row mt-3">
                    <div class="col-4">
                        <button type="submit" class="btn btn-success btn-block">Daftar</button>
                    </div>
                    <div class="col-8">
                        <a href="<?= base_url('auth/registration_seller'); ?>" class="btn btn-info btn-block">Daftar sebagai Seller</a>
                    </div>
                </div>
            </form>
            <hr>
            <div class="text-center">
                <a href="<?= base_url('auth') ?>" class="text-center">Aku sudah punya <b>Akun</b></a>
            </div>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->