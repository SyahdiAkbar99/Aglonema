<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Seller') ?>">Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card-title">
                                        <?= 'Aglonema - ' . $title; ?>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card-title">
                                        <?php if (validation_errors()) : ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= validation_errors(); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?= $this->session->flashdata('message') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="data-tanaman" class="table table-responsive" style="width:100%" cellspacing="2">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Bunga</th>
                                        <th>Pembeli</th>
                                        <th>Jumlah Terjual</th>
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Bukti TF</th>
                                        <th>Tanggal</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($riwayat_penjualan as $rpn) : ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td>
                                                <?= $rpn['name']; ?>
                                            </td>
                                            <td>
                                                <?= $rpn['buyer_name']; ?>
                                            </td>
                                            <td>
                                                <?= $rpn['jumlah']; ?>
                                            </td>
                                            <td>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-9">
                                                        <img src="<?= base_url('assets/admin/img/data/seller/tanaman/') . str_replace(' ', '_', $rpn['name']) . '.jpg'; ?>" class="img-thumbnail" alt="plant-pict">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?= $rpn['harga']; ?>
                                            </td>
                                            <td>
                                                <?= $rpn['total']; ?>
                                            </td>
                                            <td>
                                                <?php if ($rpn['status'] == 1) : ?>
                                                    Produk Dicek
                                                <?php elseif ($rpn['status'] == 2) : ?>
                                                    Produk Disetujui
                                                <?php else : ?>
                                                    Produk Pending
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-9">
                                                        <img src="<?= base_url('assets/admin/img/data/seller/upload_bukti/') . $rpn['image']; ?>" class="img-thumbnail" alt="plant-pict">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?= date('d M Y', strtotime($rpn['tanggal'])); ?>
                                            </td>
                                            <td>
                                                <div class="col-lg-6">
                                                    <?php if ($rpn['status'] == 1) : ?>
                                                        <a href="#konfirm<?= $rpn['id'] ?>" class="badge badge-primary" data-toggle="modal">
                                                            <i class="fa fa-edit"></i>Konfirmasi
                                                        </a>
                                                    <?php elseif ($rpn['status'] == 2) : ?>
                                                        <span class="badge badge-success">Produk Disetujui</span>
                                                    <?php else : ?>
                                                        <span class="badge badge-warning">Produk Pending</span>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $no++;
                                    endforeach; ?>
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                        </div>
                        <div class="card-footer">
                            <!-- <button class="btn bg-pink" data-toggle="modal" data-target="#tambah">
                                <i class="fa fa-plus-circle"></i> Tambah
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Modal Add -->
            <div class="modal fade" id="tambah">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-pink">
                            <h4 class="modal-title">Tambah <?= $title ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('Seller/data_tanaman'); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Kode">Kode</label>
                                    <input type="text" class="form-control" name="kode" id="kode" value="<?= $kode ?>" placeholder="Kode">
                                </div>
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="Gambar">Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Jenis">Jenis</label>
                                    <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis">
                                </div>
                                <div class="form-group">
                                    <label for="Berat">Berat</label>
                                    <input type="number" class="form-control" name="berat" id="berat" placeholder="Berat">
                                </div>
                                <div class="form-group">
                                    <label for="Warna">Warna</label>
                                    <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna">
                                </div>
                                <div class="form-group">
                                    <label for="Jumlah">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="Harga">Harga</label>
                                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn bg-pink btn-outline-light">Simpan</button>
                                <button type="button" class="btn bg-pink btn-outline-light" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->




            <!-- Modal Delete -->
            <?php foreach ($riwayat_penjualan as $rpn) : ?>
                <div class="modal fade" id="konfirm<?= $rpn['id']; ?>">
                    <div class=" modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h4 class="modal-title">Konfirmasi <?= $title ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('Seller/riwayat_penjualan'); ?>" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id" value="<?= $rpn['id']; ?>">
                                    <p class="text-center">Apakah anda yakin mengonfirmasi pesanan ini?</p>
                                </div>
                                <div class="modal-footer justify-content-end">
                                    <button type="submit" class="btn btn-info btn-outline-light">Ya</button>
                                    <button type="button" class="btn btn-danger btn-outline-light" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            <?php endforeach; ?>
            <!-- /.modal -->





            <!-- Modal Edit -->
            <div class="modal fade" id="edit-data-tanaman">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-pink">
                            <h4 class="modal-title">Edit <?= $title ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('Seller/update_data_tanaman'); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Kode">Kode</label>
                                    <input type="hidden" name="id" id="id">
                                    <input type="text" class="form-control" name="kode" id="kode" value="<?= $kode ?>" placeholder="Kode">
                                </div>
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="Gambar">Ganti Gambar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Pilih Gambar</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Jenis">Jenis</label>
                                    <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis">
                                </div>
                                <div class="form-group">
                                    <label for="Berat">Berat</label>
                                    <input type="number" class="form-control" name="berat" id="berat" placeholder="Berat">
                                </div>
                                <div class="form-group">
                                    <label for="Warna">Warna</label>
                                    <input type="text" class="form-control" name="warna" id="warna" placeholder="Warna">
                                </div>
                                <div class="form-group">
                                    <label for="Jumlah">Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah">
                                </div>
                                <div class="form-group">
                                    <label for="Harga">Harga</label>
                                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn bg-pink btn-outline-light">Perbaharui</button>
                                <button type="button" class="btn bg-pink btn-outline-light" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->



            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-7 connectedSortable">

                </section>
                <!-- /.Left col -->

                <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-5 connectedSortable">
                </section>
                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>