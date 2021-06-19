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
                        <th class="column-1">Product</th>
                        <th class="column-2">Quantity</th>
                        <th class="column-3">Harga</th>
                        <th class="column-4">Aksi</th>
                    </tr>

                    <?php foreach ($data_detail as $row) : ?>
                        <tr class="table-row">
                            <td class="column-1">
                                <?= $row['name']; ?>
                            </td>
                            <td class="column-2"> <?= $row['jumlah']; ?> </td>
                            <td class="column-3"><?= number_format($row['harga'], 2, ',', '.'); ?></td>
                            <td class="column-4">
                                <?php if ($row['status'] == 1 && $row['image'] != NULL) : ?>
                                    <div class="badge badge-primary m-r-30">
                                        <i class="fa fa-circle"></i> Confirmed
                                    </div>
                                <?php else : ?>
                                    <form action="<?= base_url('Buyer/bayar/') ?>" method="post">
                                        <input type="hidden" name="seller_id" id="seller_id" value="<?= $row['seller_id']; ?>">
                                        <input type="hidden" name="id" id="id" value="<?= $row['detail_id']; ?>">
                                        <button type="submit" class="badge badge-primary m-r-30">
                                            <i class="fa fa-upload"></i> Bayar
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
        <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
            <div class="flex-w flex-m w-full-sm">
            </div>

            <div class="size10 trans-0-4 m-t-10 m-b-10">
                <a href="<?= base_url('Buyer/checkout') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    Kembali
                </a>
            </div>
        </div>
    </div>
</section>