<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin') ?>" class="brand-link">
        <img src="<?= base_url('assets/admin/img/favicon.png') ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-2">
        <span class="brand-text font-weight-light"><?= $title; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/admin/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="Profile User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $user['name']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            <?= $title; ?>
                        </p>
                    </a>
                </li>
                <li class="nav-header">EXAMPLES</li>
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>

                <li class="nav-header">MISCELLANEOUS</li>
                <li class="nav-item">
                    <a href="iframe.html" class="nav-link">
                        <i class="nav-icon fas fa-ellipsis-h"></i>
                        <p>Tabbed IFrame Plugin</p>
                    </a>
                </li>
                <li class="nav-header">MULTI LEVEL EXAMPLE</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-circle nav-icon"></i>
                        <p>Level 1</p>
                    </a>
                </li>
                <li class="nav-header">LABELS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-circle text-info"></i>
                        <p>Informational</p>
                    </a>
                </li>
                <li class="nav-header">Session</li>
                <li class="nav-item">
                    <a href="#exampleModal" class="nav-link" data-toggle="modal">
                        <i class="nav-icon fa fa-sign-out-alt text-info"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?= base_url('auth/logout') ?>" method="post">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin logout?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>