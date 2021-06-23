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
        <div class="container-table-cart pos-relative">
            <div class="wrap-table-shopping-cart bgwhite">
                <table class="table-shopping-cart">
                    <tr class="table-head">
                        <th class="column-1"></th>
                        <th class="column-2">Product</th>
                        <th class="column-3">Price</th>
                        <th class="column-4 p-l-70">Quantity</th>
                        <th class="column-5">Total</th>
                    </tr>
                    <?php if ($this->cart->contents() == TRUE) : ?>
                        <?php foreach ($this->cart->contents() as $items) : ?>
                            <?php if ($items['buyer_id'] == $this->session->userdata('id')) : ?>
                                <tr class="table-row">
                                    <td class="column-1">
                                        <div class="cart-img-product b-rad-4 o-f-hidden">
                                            <img src="<?= base_url('assets/admin/img/data/seller/tanaman/') . $items['image']; ?>" alt="IMG-PRODUCT">
                                        </div>
                                    </td>
                                    <td class="column-2"> <?= $items['name']; ?> </td>
                                    <td class="column-3">Rp. <?= number_format($items['price'], 2, ',', '.'); ?></td>
                                    <td class="column-4">
                                        <div class="flex-w bo5 of-hidden w-size17">
                                            <button class="flex-c-m size7 bg8">
                                            </button>
                                            <input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="<?= $items['qty'] ?>" disabled>
                                            <button class="flex-c-m size7 bg8">
                                            </button>
                                            <!-- <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                    </button>

                                    <input class="size8 m-text18 t-center num-product" type="number" name="num-product1" value="1">

                                    <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                    </button> -->
                                        </div>
                                    </td>
                                    <td class="column-5">
                                        Rp. <?php
                                            $result = $items['qty'] * $items['price'];
                                            echo number_format($result, 2, ',', '.');
                                            ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        Tidak list pesanan anda
                    <?php endif; ?>
                </table>
            </div>
        </div>

        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-15">
                Data
            </h5>

            <!--  -->
            <div class="flex-w flex-sb-m p-b-12">
                <span class="m-text21 w-size20 w-full-sm">

                </span>
            </div>
            <!--  -->
            <form action="<?= base_url('Buyer/checkout/') ?>" method="post">
                <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                    <div class="w-size20 w-full-sm">


                        <input class="" type="hidden" name="buyer_id" id="buyer_id" value="<?= $user['id']; ?>">

                        <div class="size13 bo4 m-b-30">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="kode" id="kode" value="<?= $kode; ?>">
                            <?= form_error('kode', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="size13 bo4 m-b-30">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="buyer_email" id="email" value="<?= $user['email']; ?>">
                            <?= form_error('buyer_email', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <div class="size13 bo4 m-b-12">
                            <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="buyer_name" id="name" value="<?= $user['name']; ?>">
                            <?= form_error('buyer_name', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <?php if ($this->cart->contents() == TRUE) : ?>
                            <?php foreach ($this->cart->contents() as $items) : ?>
                                <?php if ($items['buyer_id'] == $this->session->userdata('id')) : ?>

                                    <input class="form-control" type="hidden" name="seller_id[]" id="seller_id" value="<?= $items['seller_id']; ?>">

                                    <input class="form-control" type="hidden" name="id[]" id="id" value="<?= $items['id']; ?>">
                                    <input class="form-control" type="hidden" name="name[]" id="name" value="<?= $items['name']; ?>">
                                    <input class="form-control" type="hidden" name="price[]" id="price" value="<?= $items['price']; ?>">
                                    <input class="form-control" type="hidden" name="qty[]" id="qty" value="<?= $items['qty']; ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else : ?>
                            Tidak list pesanan anda
                        <?php endif; ?>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-26 p-b-30">
                    <span class="m-text22 w-size19 w-full-sm">
                        Total:
                    </span>

                    <span class="m-text21 w-size20 w-full-sm">
                        <input class="form-control" type="text" name="total" id="total" value="Rp. <?= number_format($this->cart->total(), 2, ',', '.') ?>" readonly>
                    </span>

                </div>

                <div class="size15 trans-0-4">
                    <!-- Button -->
                    <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" role="button">
                        Proceed to Checkout
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>