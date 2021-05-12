<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('landingpage') ?>" class="brand-link">
        <img src="<?= base_url('assets/admin/img/favicon.png') ?>" alt="Aglonema Logo" class="brand-image img-circle elevation-2">
        <span class="brand-text font-weight-light">Aglonema</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/admin/img/') . $user['image']; ?>" class="img-circle elevation-2" alt="Profile User Image">
            </div>
            <div class="info">
                <span class="d-block text-white"><?= $user['name']; ?></span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- QUERY MENU -->
                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT user_menu.id, user_menu.menu
                                FROM user_menu JOIN user_access_menu
                                ON user_menu.id = user_access_menu.menu_id
                                WHERE user_access_menu.role_id = $role_id
                                ORDER BY user_access_menu.menu_id ASC";
                $menu = $this->db->query($queryMenu)->result_array();
                // echo '<pre>';
                // print_r($menu);
                // echo '</pre>';
                // die;
                ?>

                <!-- LOOPING MENU -->
                <?php foreach ($menu as $m) : ?>
                    <li class="nav-header"><?= $m['menu']; ?></li>

                    <!-- PREPARE SUBMENU SESUAI MENU -->
                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT * FROM user_sub_menu JOIN user_menu
                                        ON user_sub_menu.menu_id = user_menu.id
                                        WHERE user_sub_menu.menu_id = $menuId
                                        AND user_sub_menu.is_active = 1
                                        GROUP BY user_sub_menu.id
                                        ORDER BY user_menu.urutan ASC";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    // echo '<pre>';
                    // print_r($subMenu);
                    // echo '</pre>';
                    // die;
                    ?>

                    <?php foreach ($subMenu as $sm) : ?>
                        <?php if ($title == $sm['title']) : ?>

                            <li class="nav-item menu-open">
                                <a href="<?= base_url($sm['url']) ?>" class="nav-link active">

                                <?php else : ?>
                            <li class="nav-item menu-open">

                                <a href="<?= base_url($sm['url']) ?>" class="nav-link">

                                <?php endif; ?>

                                <i class="<?= $sm['icon']; ?>"></i>

                                <p>
                                    <?= $sm['title']; ?>
                                </p>
                                </a>
                            </li>
                        <?php endforeach; ?>

                    <?php endforeach; ?>

                    <!-- END QUERY MENU -->

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
                <div class="modal-header bg-pink">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin logout?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn bg-pink">Yes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>