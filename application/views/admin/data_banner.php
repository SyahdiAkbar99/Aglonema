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
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Home</a></li>
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
                <div class="col-lg-11">
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
                            <table id="data-users" class="table table-responsive" style="width:100%" cellspacing="2">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Urutan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data_banner as $datbnr) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td>
                                                <?= $datbnr['nama']; ?>
                                            </td>
                                            <td>
                                                <div class="row justify-content-center">
                                                    <div class="col-9">
                                                        <img src="<?= base_url('assets/admin/img/data/admin/banner/') . $datbnr['image']; ?>" class="img-thumbnail img-fluid" alt="banner-pict">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <?= $datbnr['deskripsi']; ?>
                                            </td>
                                            <td>
                                                <?= date('d M Y', strtotime($datbnr['tanggal_post'])); ?>
                                            </td>
                                            <td>
                                                <?= $datbnr['urutan']; ?>
                                            </td>
                                            <td>
                                                <div class="row d-flex justify-content-center">
                                                    <div class="col-xxl-6 pr-1">
                                                        <a href="#edit<?= $datbnr['id'] ?>" class="badge badge-warning" role="badge" data-id="<?= $datbnr['id']; ?>" data-toggle="modal">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-6 pr-1">
                                                        <a href="#delete<?= $datbnr['id'] ?>" class="badge badge-danger" role="badge" data-toggle="modal">
                                                            <i class="fa fa-trash"></i> Delete
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
                        <form action="<?= base_url('admin/data_banner'); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
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
                                    <label for="Deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="Urutan">Urutan</label>
                                    <input type="number" class="form-control" name="urutan" id="urutan" placeholder="Urutan">
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
            <?php foreach ($data_banner as $datbnr) : ?>
                <div class="modal fade" id="edit<?= $datbnr['id']; ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title">Edit <?= $title ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/update_data_banner'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Nama">Nama</label>
                                        <input type="hidden" class="form-control" name="id" id="id" value="<?= $datbnr['id']; ?>" placeholder="Id">
                                        <input type="text" class="form-control" name="nama" id="nama" value="<?= $datbnr['nama']; ?>" placeholder="Nama">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <label for="Gambar">Gambar</label>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="<?= base_url('assets/admin/img/data/admin/banner/') . $datbnr['image']; ?>" class="img-circle elevation-2 img-thumbnail" alt="banner-pict">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="image" name="image">
                                                            <label class="custom-file-label" for="image"><?= $datbnr['image']; ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"><?= $datbnr['deskripsi']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="Urutan">Urutan</label>
                                        <input type="number" class="form-control" name="urutan" id="urutan" value="<?= $datbnr['urutan']; ?>" placeholder="Urutan">
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
            <?php foreach ($data_banner as $datbnr) : ?>
                <div class="modal fade" id="delete<?= $datbnr['id']; ?>">
                    <div class=" modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title">Delete <?= $title ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('admin/delete_data_banner'); ?>" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id" value="<?= $datbnr['id']; ?>">
                                    <p class="text-center">Apakah anda yakin data ini dihapus?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn bg-primary btn-outline-light">Ya</button>
                                    <button type="button" class="btn btn-secondary btn-outline-light" data-dismiss="modal">Cancel</button>
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