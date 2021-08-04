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
                <div class="col-lg-10">
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
                                                <th>Judul</th>
                                                <th>Sub Judul</th>
                                                <th>Gambar</th>
                                                <th>Urutan</th>
                                                <th>Tanggal</th>
                                                <th>Deskripsi</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data_perawatan as $dattwr) : ?>
                                                <tr>
                                                    <td><?= $no; ?></td>
                                                    <td>
                                                        <?= $dattwr['judul']; ?>
                                                    </td>
                                                    <td>
                                                        <?= $dattwr['subjudul']; ?>
                                                    </td>
                                                    <td>
                                                        <div class="row justify-content-center">
                                                            <div class="col-">
                                                                <img src="<?= base_url('assets/admin/img/data/admin/perawatan/') . $dattwr['image']; ?>" class="img-thumbnail img-fluid" alt="perawatan-pict">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?= $dattwr['urutan']; ?>
                                                    </td>
                                                    <td>
                                                        <?= date('d M Y', strtotime($dattwr['tanggal_post'])); ?>
                                                    </td>
                                                    <td>
                                                        <?= $dattwr['deskripsi']; ?>
                                                    </td>
                                                    <td>
                                                        <div class="row d-flex justify-content-center">
                                                            <div class="col-xxl-6 pr-1">
                                                                <a href="#edit<?= $dattwr['id'] ?>" class="badge badge-warning" role="badge" data-id="<?= $dattwr['id']; ?>" data-toggle="modal">
                                                                    <i class="fa fa-edit"></i> Edit
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-6 pr-1">
                                                                <a href="#delete<?= $dattwr['id'] ?>" class="badge badge-danger" role="badge" data-toggle="modal">
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
                        <form action="<?= base_url('Admin/data_perawatan'); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Judul">Judul</label>
                                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul">
                                </div>
                                <div class="form-group">
                                    <label for="Subjudul">Sub Judul</label>
                                    <input type="text" class="form-control" name="subjudul" id="subjudul" placeholder="Subjudul">
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
                                    <label for="Urutan">Urutan</label>
                                    <input type="number" class="form-control" name="urutan" id="urutan" placeholder="Urutan">
                                </div>
                                <div class="form-group">
                                    <label for="Deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"></textarea>
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
            <?php foreach ($data_perawatan as $dattwr) : ?>
                <div class="modal fade" id="edit<?= $dattwr['id']; ?>">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title">Edit <?= $title ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('Admin/update_data_perawatan'); ?>" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Judul">judul</label>
                                        <input type="hidden" class="form-control" name="id" id="id" value="<?= $dattwr['id']; ?>" placeholder="Id">
                                        <input type="text" class="form-control" name="judul" id="judul" value="<?= $dattwr['judul']; ?>" placeholder="Judul">
                                    </div>
                                    <div class="form-group">
                                        <label for="Sub Judul">Sub Judul</label>
                                        <input type="text" class="form-control" name="subjudul" id="subjudul" value="<?= $dattwr['subjudul']; ?>" placeholder="Sub Judul">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <label for="Gambar">Gambar</label>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <img src="<?= base_url('assets/admin/img/data/admin/perawatan/') . $dattwr['image']; ?>" class="img-circle elevation-2 img-thumbnail" alt="banner-pict">
                                                    </div>
                                                    <div class="col-md-9">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="image" name="image">
                                                            <label class="custom-file-label" for="image"><?= $dattwr['image']; ?></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="Urutan">Urutan</label>
                                        <input type="number" class="form-control" name="urutan" id="urutan" value="<?= $dattwr['urutan']; ?>" placeholder="Urutan">
                                    </div>
                                    <div class="form-group">
                                        <label for="Deskripsi">Deskripsi</label>
                                        <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="10"><?= $dattwr['deskripsi']; ?></textarea>
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
            <?php foreach ($data_perawatan as $dattwr) : ?>
                <div class="modal fade" id="delete<?= $dattwr['id']; ?>">
                    <div class=" modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <h4 class="modal-title">Hapus <?= $title ?></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?= base_url('Admin/delete_data_perawatan'); ?>" method="post">
                                <div class="modal-body">
                                    <input type="hidden" name="id" id="id" value="<?= $dattwr['id']; ?>">
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