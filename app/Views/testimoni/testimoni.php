<?php echo view('admin/header');?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card-footer">
                <a href="<?= base_url('/createTestimoni') ?>" class="btn btn-primary mb-2">Tambah Testimoni</a>
            </div>
            <!-- left column -->
            <div class="col-12">
                <!-- general form elements -->
                <!-- notifikasi sukses dan error -->
                <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                </div>
                <?php elseif (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('error'); ?>
                </div>
                <?php endif; ?>
                <div class="card card-primary">
                    <div class="card-header">

                        <h3 class="card-title"><?= $title ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- table untuk menampilkan produk -->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Uraian Testimoni</th>
                                    <th>Gambar</th>
                                    <th>Nama Pengguna</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($testimoni as $value): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $value->uraian; ?></td>
                                    <td><img src="<?= base_url('gambar_testi/' . $value->gambar); ?>" width="100px"></td>
                                    <td><?= $value->nama_pengguna; ?></td>
                                    <td>
                                        <a href="testimoni/edit/<?= $value->id_testimoni; ?>" class="btn btn-primary">Edit</a>
                                        <a href="testimoni/delete/<?= $value->id_testimoni; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
            </div>
        </div>
    </div>
</section>
<?php echo view('admin/footer');?>