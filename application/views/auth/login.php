<div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="<?= base_url('index2.html') ?>" class="h1"><b><?= $title; ?></b></a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Masuk untuk akses akun kamu <b>!</b></p>

            <form action="<?= base_url('index3.html') ?>" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
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