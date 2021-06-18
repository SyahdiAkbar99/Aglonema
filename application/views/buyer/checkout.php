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
                        <th class="column-1">Kode Transaksi</th>
                        <th class="column-2">Email</th>
                        <th class="column-3">Nama</th>
                        <th class="column-4">Total</th>
                        <th class="column-5">Tanggal</th>
                        <th class="column-6">Bayar</th>
                        <th class="column-7">Batal</th>
                        <th class="column-8">Detail</th>
                    </tr>

                    <?php foreach ($data_checkout as $row) : ?>
                        <tr class="table-row">
                            <td class="column-1">
                                <?= $row['kode']; ?>
                            </td>
                            <td class="column-2"> <?= $row['buyer_email']; ?> </td>
                            <td class="column-3"><?= $row['buyer_name']; ?></td>
                            <td class="column-4">
                                <?= number_format($row['total'], 2, ',', '.'); ?>
                            </td>
                            <td class="column-5">
                                <?= $row['tanggal']; ?>
                            </td>
                            <td class="column-6">

                                <a href="#" class="badge badge-primary m-r-30">
                                    <i class="fa fa-upload"></i> Bayar
                                </a>
                            </td>
                            <td class="column-7">
                                <a href="#" class="badge badge-danger m-r-30">
                                    <i class="fa fa-trash"></i> Batal
                                </a>
                            </td>
                            <td class="column-8">
                                <a href="<?= base_url('Buyer/detail/') . $row['id']; ?>" class="badge badge-success m-r-30">
                                    <i class="fa fa-info-circle"></i> Detail
                                </a>
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
                <a href="<?= base_url('Buyer/check_out') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                    Bayar
                </a>
            </div>
        </div>
    </div>
</section>