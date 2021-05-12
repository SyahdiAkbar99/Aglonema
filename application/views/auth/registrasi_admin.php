<div class="register-box">
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('auth/registration_admin') ?>" class="h1"><b><?= $title; ?></b></a>
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

            <form action="<?= base_url('auth/registration_admin') ?>" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ?>" placeholder="Nama Lengkap">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('name', '<small class="text-danger">', '</small>'); ?>

                <div class="input-group mt-3">
                    <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                <div class="input-group mt-3">
                    <input type="password" class="form-control" name="password1" id="password1" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>

                <div class="input-group mt-3">
                    <input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>

                <div class="input-group mt-3">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="text-dark">+62</span>
                        </div>
                    </div>
                    <input type="tel" class="form-control" name="no_telp" id="no_telp" value="<?= set_value('no_telp') ?>" placeholder="No Telpon">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fa fa-phone"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>

                <div class="row  mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Daftar</button>
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