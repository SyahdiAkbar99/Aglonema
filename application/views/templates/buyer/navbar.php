<!-- Header -->
<header class="header1">
    <!-- Header desktop -->
    <div class="container-menu-header">
        <div class="topbar">
        </div>

        <div class="wrap_header">
            <!-- Logo -->
            <a href="<?= base_url('buyer') ?>" class="logo">
                <h2 class="text-center"><span style="color: forestgreen;"><i class="fa fa-leaf fa-flip-horizontal fa-pulse"></i></span> AGLONEMA <span style="color: forestgreen;"><i class="fa fa-leaf fa-pulse"></i></span></h2>
            </a>

            <!-- Menu -->
            <div class="wrap_menu mx-auto">
                <nav class="menu">
                    <ul class="main_menu" style="margin-top: -1%;">
                        <li>
                            <a href="<?= base_url('buyer') ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?= base_url('buyer/penanaman') ?>">Penanaman</a>
                        </li>
                        <li class="sale-noti">
                            <a href="<?= base_url('buyer/perawatan') ?>">Perawatan</a>
                        </li>
                        <li>
                            <a href="contact.html">Kontak</a>
                        </li>
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
                                <a href="<?= base_url('auth/logout') ?>">
                                    <button class="btn btn-danger">
                                        Logout
                                    </button>
                                </a>
                            </li>
                        <?php endif ?>
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">
                <a href="#" class="header-wrapicon1 dis-block">
                    <?= $user['name']; ?><img src="<?= base_url('assets/user/img/icons/icon-header-01.png') ?>" class="header-icon1 pl-1" alt="ICON">
                </a>
                <span class="linedivide1"></span>

                <div class="header-wrapicon2">
                    <img src="<?= base_url('assets/user/img/icons/icon-header-02.png') ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?= base_url('assets/user/img/item-cart-01.jpg') ?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        White Shirt With Pleat Detail Back
                                    </a>

                                    <span class="header-cart-item-info">
                                        1 x $19.00
                                    </span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?= base_url('assets/user/img/item-cart-02.jpg') ?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Converse All Star Hi Black Canvas
                                    </a>

                                    <span class="header-cart-item-info">
                                        1 x $39.00
                                    </span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?= base_url('assets/user/img/item-cart-03.jpg') ?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Nixon Porter Leather Watch In Tan
                                    </a>

                                    <span class="header-cart-item-info">
                                        1 x $17.00
                                    </span>
                                </div>
                            </li>
                        </ul>

                        <div class="header-cart-total">
                            Total: $75.00
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="<?= base_url('buyer') ?>" class="logo-mobile">
            <h2 class="text-center">
                <span style="color: forestgreen;">
                    <i class="fa fa-leaf fa-flip-horizontal fa-pulse"></i>
                </span>
                AGLONEMA
            </h2>
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                <a href="#" class="header-wrapicon1 dis-block">
                    <?= $user['name']; ?> <img src="<?= base_url('assets/user/img/icons/icon-header-01.png') ?>" class="header-icon1 pl-1" alt="ICON">
                </a>

                <span class="linedivide2"></span>

                <div class="header-wrapicon2">
                    <img src="<?= base_url('assets/user/img/icons/icon-header-02.png') ?>" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>

                    <!-- Header cart noti -->
                    <div class="header-cart header-dropdown">
                        <ul class="header-cart-wrapitem">
                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?= base_url('assets/user/img/item-cart-01.jpg') ?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        White Shirt With Pleat Detail Back
                                    </a>

                                    <span class="header-cart-item-info">
                                        1 x $19.00
                                    </span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?= base_url('assets/user/img/item-cart-02.jpg') ?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Converse All Star Hi Black Canvas
                                    </a>

                                    <span class="header-cart-item-info">
                                        1 x $39.00
                                    </span>
                                </div>
                            </li>

                            <li class="header-cart-item">
                                <div class="header-cart-item-img">
                                    <img src="<?= base_url('assets/user/img/item-cart-03.jpg') ?>" alt="IMG">
                                </div>

                                <div class="header-cart-item-txt">
                                    <a href="#" class="header-cart-item-name">
                                        Nixon Porter Leather Watch In Tan
                                    </a>

                                    <span class="header-cart-item-info">
                                        1 x $17.00
                                    </span>
                                </div>
                            </li>
                        </ul>

                        <div class="header-cart-total">
                            Total: $75.00
                        </div>

                        <div class="header-cart-buttons">
                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    View Cart
                                </a>
                            </div>

                            <div class="header-cart-wrapbtn">
                                <!-- Button -->
                                <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Check Out
                                </a>
                            </div>
                        </div>
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
                    <a href="<?= base_url('buyer') ?>">Home</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="<?= base_url('buyer/penanaman') ?>">Penanaman</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="<?= base_url('buyer/perawatan') ?>">Perawatan</a>
                </li>
                <li class="item-menu-mobile">
                    <a href="contact.html">Kontak</a>
                </li>
                <?php if ($user['name'] == NULL) : ?>
                    <li class="item-menu-mobile">
                        <a href="<?= base_url('auth') ?>">
                            Login
                        </a>
                    </li>
                <?php else : ?>
                    <li class="item-menu-mobile">
                        <a href="<?= base_url('auth/logout') ?>">
                            Logout
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</header>