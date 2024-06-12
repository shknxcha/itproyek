<?php echo view('admin/header'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata('success'); ?>
                </div>
                <?php endif; ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Pengaturan Profil</h3>
                    </div>
                    <form action="<?= base_url('akun/updateProfile'); ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    value="<?= $akun->username; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password (kosongkan jika tidak ingin mengubah)</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?= $pengguna->nama; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="<?= $pengguna->alamat; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="nohp">No HP</label>
                                <input type="text" class="form-control" id="nohp" name="nohp"
                                    value="<?= $pengguna->nohp; ?>" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"
                                style="background-color: #884CD2;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo view('admin/footer'); ?>