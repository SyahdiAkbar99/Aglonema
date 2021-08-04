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

        <!-- Total -->
        <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
            <h5 class="m-text20 p-b-15">
                Pembayaran
            </h5>

            <!--  -->
            <div class="flex-w flex-sb-m p-b-12">
                <span class="m-text21 w-size20 w-full-sm">

                </span>
            </div>
            <!--  -->
            <form action="<?= base_url('Buyer/bayar/') ?>" method="post" enctype="multipart/form-data">
                <?php if ($this->session->userdata('email')) : ?>
                    <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
                        <div class="w-size20 w-full-sm">
                            <div class="flex-w flex-sb-m p-t-26 p-b-30">
                                <?php if ($detail) : ?>
                                    <input class="form-control" type="hidden" name="id" id="id" value="<?= $detail['id'] ?>" placeholder="Id">
                                    <input class="form-control" type="hidden" name="detail_id" id="detail_id" value="<?= $detail['detail_id'] ?>" placeholder="Id">
                                    <h6 class="m-text17 p-b-20">
                                        Product
                                    </h6>
                                    <span class="m-text22 w-size20 w-full-sm m-b-30">
                                        <?= $detail['kode'] ?>
                                    </span>
                                    <span class="m-text21 w-size20 w-full-sm m-b-30">
                                        <?= 'Bunga&nbsp;: &nbsp;' . $detail['name'] ?>
                                    </span>
                                    <span class="m-text21 w-size20 w-full-sm m-b-30">
                                        <?= 'Jumlah&nbsp;: &nbsp;' . $detail['jumlah'] ?>
                                    </span>
                                    <span class="m-text21 w-size20 w-full-sm m-b-30">
                                        <h4><?= 'Rp' . number_format($detail['harga'], 2, ',', '.') ?></h4>
                                    </span>
                                    <input class="form-control" type="hidden" name="product_id" id="product_id" value="<?= $detail['product_id'] ?>" placeholder="Id">
                                <?php else : ?>
                                <?php endif; ?>
                            </div>

                            <input class="form-control" type="hidden" name="seller_id" id="seller_id" value="<?= $seller['id'] ?>" placeholder="Id">

                            <div class="size13 bo4 m-b-30">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="seller_name" id="seller_name" value="<?= $seller['name'] ?>" placeholder="Name">
                            </div>
                            <div class="size13 bo4 m-b-30">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="seller_bank" id="seller_bank" value="<?= $seller['nama_bank'] ?>" placeholder="Bank">
                            </div>
                            <div class="size13 bo4 m-b-30">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="seller_rekening" id="seller_rekening" value="<?= $seller['no_rekening'] ?>" placeholder="Rekening">
                            </div>

                            <div class="size13 bo4 m-b-30">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="buyer_name" id="buyer_name" value="<?= $user['name'] ?>" placeholder="Nama">
                                <?= form_error('buyer_name', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="size13 bo4 m-b-30">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="buyer_email" id="buyer_email" value="<?= $user['email'] ?>" placeholder="Email">
                                <?= form_error('buyer_email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="size13 bo4 m-b-30">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="buyer_bank" id="buyer_bank" value="<?= $user['nama_bank'] ?>" placeholder="Bank">
                                <?= form_error('buyer_bank', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="size13 bo4 m-b-30">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="buyer_rekening" id="buyer_rekening" value="<?= $user['no_rekening'] ?>" placeholder="No Briva">
                                <?= form_error('buyer_rekening', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="size13 bo4 m-b-50">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="buyer_telp" id="buyer_telp" value="<?= $user['no_telp'] ?>" placeholder="No Telpon">
                                <?= form_error('buyer_telp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <span class="m-text21 w-size19 w-full-sm">
                                Unggah Bukti:
                            </span>
                            <div class="size13 bo4 m-b-30">
                                <input class="sizefull s-text7 p-l-15 p-r-15" type="file" name="image" id="image">
                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-sb-m p-t-26 p-b-30">
                        <span class="m-text22 w-size19 w-full-sm">
                            Total:
                        </span>

                        <span class="m-text21 w-size20 w-full-sm">
                            <input class="form-control" type="text" name="totals" id="totals" value="Rp. <?php
                                                                                                            $currently = $detail['jumlah'] * $detail['harga'];
                                                                                                            echo number_format($currently, 2, ',', '.');
                                                                                                            ?>">
                        </span>
                    </div>
                <?php endif; ?>

                <div class="size15 trans-0-4">
                    <!-- Button -->
                    <?php if ($this->session->userdata('email')) : ?>
                        <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" role="button">
                            Lanjutkan Ke Pembayaran
                        </button>
                    <?php else : ?>
                        <div class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" role="button">
                            Tidak Ada List
                        </div>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</section>