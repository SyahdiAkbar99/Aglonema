<!-- Header -->
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="<?= base_url('landingpage') ?>" class="logo">
                <h4 class="text-center"><span style="color: forestgreen;"><i class="fa fa-leaf fa-flip-horizontal fa-pulse"></i></span> AGLONEMA <span style="color: forestgreen;"><i class="fa fa-leaf fa-pulse"></i></span></h4>
            </a>

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu" style="margin-top: -1%;">
                        <li>
                            <a href="<?= base_url('landingpage') ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?= base_url('landingpage/penanaman') ?>">Penanaman</a>
                        </li>
                        <li>
                            <a href="<?= base_url('landingpage/perawatan') ?>">Perawatan</a>
                        </li>
                        <li>
                            <a href="#contact">Kontak</a>
                        </li>
                        <li>
                            <a href="<?= base_url('auth') ?>">
                                <button class="btn btn-dark">
                                    Login
                                </button>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <a href="<?= base_url('buyer/my_profile') ?>" class="header-wrapicon1 dis-block">
                    <img src="<?= base_url('assets/user/img/icons/icon-header-01.png') ?>" class="header-icon1" alt="ICON">
                </a>

                <span class="linedivide1"></span>

                <div class="header-wrapicon2">
                    <img src="<?= base_url('assets/user/img/icons/icon-header-02.png') ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <?php if ($this->session->userdata('email')) : ?>
                            <?php if ($this->cart->contents() == TRUE) : ?>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <ul class="header-cart-wrapitem">
                                        <li class="header-cart-item">
                                            <div class="header-cart-item-img">
                                                <img src="<?= base_url('assets/admin/img/data/seller/tanaman/') . $items['image']; ?>" alt="IMG">
                                            </div>

                                            <div class="header-cart-item-txt">
                                                <a href="#" class="header-cart-item-name">
                                                    <?= $items['name']; ?>
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
                                <?php endforeach; ?>
                                <div class="header-cart-total">
                                    Total Keranjang: Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?>
                                </div>

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
                        <?php else : ?>
                            <ul class="header-cart-wrapitem">
                                <li class="header-cart-item">
                                    <div class="header-cart-ite-text">
                                        Tidak ada produk
                                    </div>
                                </li>
                            </ul>

                            <div class="header-cart-total">
                                Total: Rp. 0
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="<?= base_url('landingpage') ?>" class="logo-mobile">
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
                <a href="<?= base_url('buyer/my_profile') ?>" class="header-wrapicon1 dis-block">
                    <img src="<?= base_url('assets/user/img/icons/icon-header-01.png') ?>" class="header-icon1" alt="ICON">
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="<?= base_url('assets/user/img/icons/icon-header-02.png') ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <?php if ($this->session->userdata('email')) : ?>
                            <?php if ($this->cart->contents() == TRUE) : ?>
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <ul class="header-cart-wrapitem">
                                        <li class="header-cart-item">
                                            <div class="header-cart-item-img">
                                                <img src="<?= base_url('assets/admin/img/data/seller/tanaman/') . $items['image']; ?>" alt="IMG">
                                            </div>

                                            <div class="header-cart-item-txt">
                                                <a href="#" class="header-cart-item-name">
                                                    <?= $items['name']; ?>
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
                                <?php endforeach; ?>
                                <div class="header-cart-total">
                                    Total Keranjang: Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?>
                                </div>

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

    <!-- Menu Mobile -->
    <div class="wrap-side-menu">
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-menu-mobile">
                    <a href="<?= base_url('landingpage') ?>">Home</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="<?= base_url('landingpage/penanaman') ?>">Penanaman</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="<?= base_url('landingpage/perawatan') ?>">Perawatan</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="#contact">Kontak</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="<?= base_url('auth') ?>">
                        Login
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>