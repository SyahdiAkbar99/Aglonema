<!-- Header -->
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="<?= base_url('Buyer') ?>" class="logo">
                <h4 class="text-center"><span style="color: forestgreen;"><i class="fa fa-leaf fa-flip-horizontal fa-pulse"></i></span> AGLONEMA <span style="color: forestgreen;"><i class="fa fa-leaf fa-pulse"></i></span></h4>
            </a>

            <!-- QUERY MENU -->

            <!-- END QUERY MENU -->

            <!-- Menu -->
            <div class="wrap_menu mx-auto">
                <nav class="menu">
                    <ul class="main_menu" style="margin-top: -1%;">
                        <li>
                            <a href="<?= base_url('Buyer') ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?= base_url('Buyer/penanaman') ?>">Penanaman</a>
                        </li>
                        <li>
                            <a href="<?= base_url('Buyer/perawatan') ?>">Perawatan</a>
                        </li>
                        <li>
                            <a href="<?= base_url('Buyer/checkout') ?>">Checkout</a>
                        </li>
                        <!-- <li>
                            <a href="#contact">Kontak</a>
                        </li> -->
                        <?php if ($user['name'] == NULL) : ?>
                            <li>
                                <a href="<?= base_url('auth') ?>">
                                    <button class="btn btn-secondary">
                                        Login
                                    </button>
                                </a>
                            </li>
                        <?php else : ?>
                            <li>
                                <a href="#exampleModal" data-toggle="modal">
                                    <button class="btn btn-block rounded-circle color-filter8" data-toggle="tooltip" data-placement="right" title="Logout">
                                        <i class="fa fa-sign-out text-danger"></i>
                                    </button>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>


            <!-- Header Icon -->
            <div class="header-icons">
                <a href="<?= base_url('Buyer/my_profile') ?>" class="header-wrapicon1 dis-block">
                    <?php if ($user['name'] == NULL) : ?>
                        <small>Unknown User</small><img src="<?= base_url('assets/user/img/profile/default.png') ?>" class="header-icon1 pl-1" alt="Profile User">
                    <?php else : ?>
                        <?= $user['name']; ?><img src="<?= base_url('assets/user/img/profile/') . $user['image'] ?>" class="header-icon1 pl-1 rounded-circle" alt="Profile User">
                    <?php endif; ?>
                </a>
                <span class="linedivide1"></span>

                <div class="header-wrapicon2">
                    <img src="<?= base_url('assets/user/img/icons/icon-header-02.png') ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">

                    <?php foreach ($this->cart->contents() as $items) : ?>
                        <?php if ($items['buyer_id'] == $this->session->userdata('id')) : ?>
                            <?php
                            $keranjang = $this->cart->total_items();
                            ?>
                            <span class="header-icons-noti">
                                <?= $keranjang; ?>
                            </span>
                        <?php else : ?>
                            <span class="header-icons-noti">
                                0
                            </span>
                        <?php endif; ?>
                    <?php endforeach; ?>


                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <?php if ($this->session->userdata('email')) : ?>
                            <?php if ($this->cart->contents() == TRUE) : ?>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <?php if ($items['buyer_id'] == $this->session->userdata('id')) : ?>
                                        <ul class="header-cart-wrapitem">
                                            <li class="header-cart-item">
                                                <div class="header-cart-item-img">
                                                    <img src="<?= base_url('assets/admin/img/data/seller/tanaman/') . $items['image']; ?>" alt="IMG">
                                                </div>

                                                <div class="header-cart-item-txt">
                                                    <a href="#" class="header-cart-item-name">
                                                        <?= $items['name'] . '' . $items['buyer_id']; ?>
                                                    </a>

                                                    <span class="header-cart-item-info">
                                                        <?= $items['qty'] ?> x Rp. <?= number_format($items['price'], 2, ',', '.'); ?>
                                                    </span>

                                                    <span class="header-cart-item-info">
                                                        <form action="<?= base_url('Buyer/delete_cart'); ?>" method="post" style="display: inline-block;">
                                                            <input type="hidden" name="rowid" value="<?= $items['rowid'] ?>">
                                                            <input type="hidden" name="id" value="<?= $items['id'] ?>">
                                                            <input type="hidden" name="name" value="<?= $items['name'] ?>">
                                                            <input type="hidden" name="qty" value="<?= $items['qty'] ?>">
                                                            <button type="submit" class="badge badge-danger">Hapus</button>
                                                        </form>
                                                    </span>
                                                </div>

                                                <div class="header-cart-item-text">

                                                </div>
                                            </li>
                                        </ul>
                                        <div class="header-cart-total">
                                            Total: Rp. <?php
                                                        $result = $items['qty'] * $items['price'];
                                                        echo number_format($result, 2, ',', '.');
                                                        ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if ($items['buyer_id'] == $this->session->userdata('id')) : ?>
                                    <div class="header-cart-total">
                                        Total Cart: Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?>
                                    </div>
                                <?php else : ?>
                                    Total Cart: Rp. 0
                                <?php endif; ?>

                                <div class="header-cart-buttons">
                                    <div class="header-cart-wrapbtn">
                                        <!-- Button -->
                                        <a href="<?= base_url('Buyer/detail_cart/') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            View Cart
                                        </a>
                                    </div>

                                    <!-- <div class="header-cart-wrapbtn"> -->
                                    <!-- Button -->
                                    <!-- <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            Check Out
                                        </a>
                                    </div> -->
                                </div>
                            <?php else : ?>
                                <ul class="header-cart-wrapitem">
                                    <li class="header-cart-item">
                                        <div class="header-cart-ite-text">
                                            Tidak ada produk
                                        </div>
                                    </li>
                                </ul>

                                <div class="header-cart-total">
                                    Total: Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?>
                                </div>

                                <div class="header-cart-buttons">
                                    <div class="header-cart-wrapbtn">
                                        <!-- Button -->
                                        <a href="<?= base_url('Buyer/detail_cart/') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            View Cart
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="<?= base_url('Buyer') ?>" class="logo-mobile">
            <h5 class="text-center">
                <span style="color: forestgreen;">
                    <i class="fa fa-leaf fa-flip-horizontal fa-pulse"></i>
                </span>
                AGLONEMA
            </h5>
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="<?= base_url('Buyer/my_profile') ?>" class="header-wrapicon1 dis-block">
                    <?php if ($user['name'] == NULL) : ?>
                        <small>Unknown User</small><img src="<?= base_url('assets/user/img/profile/default.png') ?>" class="header-icon1 pl-1" alt="Profile User">
                    <?php else : ?>
                        <?= $user['name']; ?><img src="<?= base_url('assets/user/img/profile/') . $user['image'] ?>" class="header-icon1 pl-1 rounded-circle" alt="Profile User">
                    <?php endif; ?>
                </a>
                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="<?= base_url('assets/user/img/icons/icon-header-02.png') ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <?php foreach ($this->cart->contents() as $items) : ?>
                        <?php if ($items['buyer_id'] == $this->session->userdata('id')) : ?>
                            <?php
                            $keranjang = $this->cart->total_items();
                            ?>
                            <span class="header-icons-noti">
                                <?= $keranjang; ?>
                            </span>
                        <?php else : ?>
                            <span class="header-icons-noti">
                                0
                            </span>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <?php if ($this->session->userdata('email')) : ?>
                            <?php if ($this->cart->contents() == TRUE) : ?>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <?php if ($items['buyer_id'] == $this->session->userdata('id')) : ?>
                                        <ul class="header-cart-wrapitem">
                                            <li class="header-cart-item">
                                                <div class="header-cart-item-img">
                                                    <img src="<?= base_url('assets/admin/img/data/seller/tanaman/') . $items['image']; ?>" alt="IMG">
                                                </div>

                                                <div class="header-cart-item-txt">
                                                    <a href="#" class="header-cart-item-name">
                                                        <?= $items['name'] . '' . $items['buyer_id']; ?>
                                                    </a>

                                                    <span class="header-cart-item-info">
                                                        <?= $items['qty'] ?> x Rp. <?= number_format($items['price'], 2, ',', '.'); ?>
                                                    </span>

                                                    <span class="header-cart-item-info">
                                                        <form action="<?= base_url('Buyer/delete_cart'); ?>" method="post" style="display: inline-block;">
                                                            <input type="hidden" name="rowid" value="<?= $items['rowid'] ?>">
                                                            <input type="hidden" name="id" value="<?= $items['id'] ?>">
                                                            <input type="hidden" name="name" value="<?= $items['name'] ?>">
                                                            <input type="hidden" name="qty" value="<?= $items['qty'] ?>">
                                                            <button type="submit" class="badge badge-danger">Hapus</button>
                                                        </form>
                                                    </span>
                                                </div>

                                                <div class="header-cart-item-text">

                                                </div>
                                            </li>
                                        </ul>
                                        <div class="header-cart-total">
                                            Total: Rp. <?php
                                                        $result = $items['qty'] * $items['price'];
                                                        echo number_format($result, 2, ',', '.');
                                                        ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <?php if ($items['buyer_id'] == $this->session->userdata('id')) : ?>
                                    <div class="header-cart-total">
                                        Total Cart: Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?>
                                    </div>
                                <?php else : ?>
                                    Total Cart: Rp. 0
                                <?php endif; ?>

                                <div class="header-cart-buttons">
                                    <div class="header-cart-wrapbtn">
                                        <!-- Button -->
                                        <a href="<?= base_url('Buyer/detail_cart/') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            View Cart
                                        </a>
                                    </div>

                                    <!-- <div class="header-cart-wrapbtn"> -->
                                    <!-- Button -->
                                    <!-- <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            Check Out
                                        </a>
                                    </div> -->
                                </div>
                            <?php else : ?>
                                <ul class="header-cart-wrapitem">
                                    <li class="header-cart-item">
                                        <div class="header-cart-ite-text">
                                            Tidak ada produk
                                        </div>
                                    </li>
                                </ul>

                                <div class="header-cart-total">
                                    Total: Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?>
                                </div>

                                <div class="header-cart-buttons">
                                    <div class="header-cart-wrapbtn">
                                        <!-- Button -->
                                        <a href="<?= base_url('Buyer/detail_cart/') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            View Cart
                                        </a>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>
    </div>

    <!-- QUERY MENU -->


    <!-- END QUERY MENU -->

    <!-- Menu Mobile -->
    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-menu-mobile">
                    <a href="<?= base_url('Buyer') ?>" class="text-center">Home</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="<?= base_url('Buyer/penanaman') ?>">Penanaman</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="<?= base_url('Buyer/perawatan') ?>">Perawatan</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="<?= base_url('Buyer/checkout') ?>">Checkout</a>
                </li>
                <!-- <li class="item-menu-mobile">
                    <a href="#contact">Kontak</a>
                </li> -->
                <?php if ($user['name'] == NULL) : ?>
                    <li class="item-menu-mobile">
                        <a href="<?= base_url('auth') ?>">
                            Login
                        </a>
                    </li>
                <?php else : ?>
                    <li class="item-menu-mobile" data-toggle="tooltip" data-placement="right" title="Logout">
                        <a href="#exampleModal" data-toggle="modal">
                            <i class="fa fa-sign-out text-danger"></i>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url('auth/logout') ?>" method="post">
                    <div class="modal-header color-filter8">
                        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Yakin logout?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn color-filter8">Yes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>