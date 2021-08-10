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
                        <li class="breadcrumb-item"><a href="<?= base_url('Admin') ?>">Beranda</a></li>
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
            <div class="row d-flex justify-content-center">
                <div class="col-lg-7">
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
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-12">
                                    <table id="data-users" class="table table-responsive" style="width:100%" cellspacing="2">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Lokasi Antar</th>
                                                <th>Biaya Ekspedisi</th>
                                                <th>Biaya Admin</th>
                                                <th>Tanggal</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($jasa_antar as $jtr) : ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td>
                                                        <?= $jtr['nama']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $jtr['lokasi']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $jtr['biaya']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $jtr['biaya_admin']; ?>
                                                    </td>
                                                    <td>
                                                        <?= date('d M Y', strtotime($jtr['tanggal'])); ?>
                                                    </td>
                                                    <td>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-xxl-6 pr-1">
                                                                <a href="#edit<?= $jtr['id'] ?>" class="badge badge-warning" role="badge" data-id="<?= $jtr['id']; ?>" data-toggle="modal">
                                                                    <i class="fa fa-edit"></i> Edit
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-6 pr-1">
                                                                <a href="#delete<?= $jtr['id'] ?>" class="badge badge-danger" role="badge" data-toggle="modal">
                                                                    <i class="fa fa-trash"></i> Hapus
                                                                </a>
                                                            </div>
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
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn bg-primary" data-toggle="modal" data-target="#tambah">
                                <i class="fa fa-plus-circle"></i> Tambah
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->



            <!-- Modal Tambah -->
            <div class="modal fade" id="tambah">
                <div class=" modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h4 class="modal-title">Tambah <?= $title ?></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('Admin/jasa_antar'); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label for="Lokasi">Lokasi Antar</label>
                                    <input type="text" class="form-control" name="lokasi" id="lokasi" placeholder="Lokasi">
                                </div>
                                <div class="form-group">
                                    <label for="Biaya">Biaya</label>
                                    <input type="number" class="form-control" name="biaya" id="biaya" placeholder="Biaya">
                                </div>
                                <div class="form-group">
                                    <label for="Biaya Admin">Biaya Admin</label>
                                    <input type="number" class="form-control" name="biaya_admin" id="biaya_admin" placeholder="Biaya Admin">
                                </div>
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="submit" class="btn bg-primary btn-outline-light">Simpan</button>
                                <button type="button" class="btn bg-primary btn-outline-light" data-dismiss="modal">Tutup</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->



            <!-- Modal Edit -->
            <?php foreach ($jasa_antar as $jtr) : ?>
                <div class="modal fade" id="edit<?= $jtr['id']; ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title">Edit <?= $title ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('Admin/update_jasa_antar'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Nama">Nama</label>
                                        <input type="hidden" class="form-control" name="id" id="id" value="<?= $jtr['id']; ?>" placeholder="Nama">
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $jtr['nama']; ?>" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="Lokasi">Lokasi</label>
                                        <input type="text" class="form-control" name="lokasi" id="lokasi" value="<?= $jtr['lokasi']; ?>" placeholder="Lokasi">
                                    </div>
                                    <div class="form-group">
                                        <label for="Biaya">Biaya</label>
                                        <input type="number" class="form-control" name="biaya" id="biaya" value="<?= $jtr['biaya']; ?>" placeholder="Biaya">
                                    </div>
                                    <div class="form-group">
                                        <label for="Biaya Admin">Biaya Admin</label>
                                        <input type="number" class="form-control" name="biaya_admin" id="biaya_admin" value="<?= $jtr['biaya_admin']; ?>" placeholder="Biaya Admin">
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn bg-primary btn-outline-light">Update</button>
                                    <button type="button" class="btn bg-primary btn-outline-light" data-dismiss="modal">Tutup</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            <?php endforeach; ?>
            <!-- /.modal -->



            <!-- Modal Delete -->
            <?php foreach ($jasa_antar as $jtr) : ?>
                <div class="modal fade" id="delete<?= $jtr['id']; ?>">
                    <div class=" modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title">Hapus <?= $title ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('Admin/delete_jasa_antar'); ?>" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id" value="<?= $jtr['id']; ?>">
                                    <p class="text-center">Apakah anda yakin data ini dihapus?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn bg-primary btn-outline-light">Ya</button>
                                    <button type="button" class="btn btn-secondary btn-outline-light" data-dismiss="modal">Hapus</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            <?php endforeach; ?>
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