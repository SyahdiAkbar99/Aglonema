<!-- Slide1 -->
<section class="slide1">
    <div class="wrap-slick1">
        <div class="slick1">
            <?php foreach ($data_banner as $dtbnr) : ?>
                <?php $no = 1; ?>
                <div class="item-slick1 item1-slick<?= $no; ?>" style="background-image: url(<?= base_url('assets/admin/img/data/admin/banner/') . $dtbnr['image']; ?>);">
                    <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                        <span class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                            <?= $dtbnr['nama']; ?>
                        </span>

                        <h2 class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                            <?= $dtbnr['deskripsi']; ?>
                        </h2>

                        <div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
                            <!-- Button -->
                            <a href="<?= base_url('#') ?>" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
                                Beli Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                <?php $no++; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Banner -->
<section class="banner bgwhite p-t-40 p-b-40">
    <div class="container">
        <?= $this->session->flashdata('message') ?>
        <!-- Product -->
        <div class="row">
            <?php foreach ($data_produk as $datprk) : ?>
                <?php $no = 1; ?>
                <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-img wrap-pic-w of-hidden pos-relative">
                            <img src="<?= base_url('assets/admin/img/data/seller/tanaman/') . $datprk['image']; ?>" alt="IMG-PRODUCT">

                            <div class="block2-overlay trans-0-4">
                                <?php if ($datprk['jumlah'] > 0) : ?>
                                    <form action="<?= base_url('Buyer/add_cart/' . $datprk['id']); ?>" method="post">

                                        <div class="blockqty-btn-qty w-size1 trans-0-4">
                                            <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" style="display: inline-block;">
                                                <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                            </button>

                                            <input class="size8 m-text18 t-center num-product" type="number" name="jumlah" value="1">

                                            <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" style="display: inline-block;">
                                                <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                            <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="button">
                                                Add to Cart
                                            </button>
                                        </div>
                                    </form>
                                <?php else : ?>
                                    <div class="block2-btn-unavailable w-size1 trans-0-4">
                                        <a href="#" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="button">
                                            Unavailable
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="block2-txt p-t-20">
                            <a href="#" class="block2-name dis-block s-text3 p-b-5">
                                <?= $datprk['nama']; ?>
                            </a>

                            <span class="block2-price m-text6 p-r-5">
                                <?= "Rp " . number_format($datprk['harga'], 2, ',', '.'); ?>
                            </span>
                            <h5 class="block2-price m-text6 p-r-5">
                                <p>Stok : <?= $datprk['jumlah'] ?></p>
                            </h5>
                        </div>
                    </div>
                </div>
                <?php $no++; ?>
            <?php endforeach; ?>
        </div>
        <?= $this->pagination->create_links(); ?>
    </div>
</section>

<!-- New Product -->
<section class="newproduct bgwhite p-t-45 p-b-105">
    <div class="container">
        <div class="sec-title p-b-60">
            <h3 class="m-text5 t-center">
                Produk Lainnya
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                <?php foreach ($data_product as $datprd) : ?>
                    <?php $no = 1; ?>
                    <div class="item-slick2 p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative">
                                <img src="<?= base_url('assets/admin/img/data/seller/tanaman/') . $datprd['image']; ?>" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <?php if ($datprd['jumlah'] > 0) : ?>
                                        <form action="<?= base_url('Buyer/add_cart/' . $datprd['id']); ?>" method="post">

                                            <div class="blockqty-btn-qty w-size1 trans-0-4">
                                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2" style="display: inline-block;">
                                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                                </button>

                                                <input class="size8 m-text18 t-center num-product" type="number" name="jumlah" value="1">

                                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2" style="display: inline-block;">
                                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class="block2-btn-addcart w-size1 trans-0-4">
                                                <button type="submit" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="button">
                                                    Add to Cart
                                                </button>
                                            </div>
                                        </form>
                                    <?php else : ?>
                                        <div class="block2-btn-unavailable w-size1 trans-0-4">
                                            <a href="#" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" role="button">
                                                Unavailable
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="#" class="block2-name dis-block s-text3 p-b-5">
                                    <?= $datprd['nama']; ?>
                                </a>

                                <span class="block2-price m-text6 p-r-5">
                                    <?= "Rp " . number_format($datprd['harga'], 2, ',', '.'); ?>
                                </span>
                                <h5 class="block2-price m-text6 p-r-5">
                                    <p>Stok : <?= $datprd['jumlah'] ?></p>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <?php $no++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>