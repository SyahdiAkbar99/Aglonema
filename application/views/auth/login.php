<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('auth') ?>" class="h1"><b><?= $title; ?></b></a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p class="login-box-msg">Masuk untuk akses akun kamu <b>!</b></p>
                </div>
                <div class="col-md-12">
                    <p class="login-box-msg"><?= $this->session->flashdata('message') ?></p>
                </div>
            </div>
            <form action="<?= base_url('auth') ?>" method="post">
                <div class="input-group">
                    <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                <div class="input-group mt-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                <div class="row mt-3">
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block">Masuk</button>
                    </div>
                </div>
            </form>
            <hr>
            <p class="mb-1 text-center">
                <a href="forgot-password.html">Aku lupa <b>Password</b></a>
            </p>
            <p class="mb-0 text-center">
                <a href="<?= base_url('auth/registration') ?>" class="text-center">Aku ingin <b>Mendaftar</b></a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->