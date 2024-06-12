<?php echo view('admin/header'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="card-footer">
                <a href="<?= base_url('/akun/register') ?>" class="btn btn-primary mb-2"
                    style="background-color: #884CD2;">Tambah Akun</a>
            </div> -->
            <div class="col-12">
                <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
                <?php endif; ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($akun as $key): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $key->username; ?></td>
                                    <td><?= $key->level; ?></td>
                                    <td>
                                        <a href="<?= base_url('akun/editProfile/' . $key->id_akun); ?>"
                                            class="btn btn-primary" style="background-color: #884CD2;">Edit</a>
                                        <a href="<?= base_url('akun/delete/' . $key->id_akun); ?>"
                                            class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo view('admin/footer'); ?>