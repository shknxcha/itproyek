<?php echo view('admin/header'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Ikon</th>
                                    <th>Uraian</th>
                                    <th>Keterangan</th>
                                    <th>Judul</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($profile as $value): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><img src="<?= base_url('gambar_profil/' . $value['gambar']); ?>" width="100px">
                                    </td>
                                    <td><img src="<?= base_url('gambar_profil/' . $value['ikon']); ?>" width="100px">
                                    </td>
                                    <td><?= $value['uraian']; ?></td>
                                    <td><?= $value['keterangan']; ?></td>
                                    <td><?= $value['judul']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit<?= $value['id_profile']; ?>">
                                            Edit
                                        </button>
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

<?php foreach ($profile as $value): ?>
<div class="modal fade" id="edit<?= $value['id_profile']; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Profil</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" method="POST" action="<?= base_url('edit/' . $value['id_profile']) ?>"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="gambar">Gambar :</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                        <input type="hidden" name="gambar_lama" value="<?= $value['gambar']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ikon">Ikon :</label>
                        <input type="file" class="form-control-file" id="ikon" name="ikon">
                        <input type="hidden" name="ikon_lama" value="<?= $value['ikon']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="uraian">Uraian :</label>
                        <input type="text" class="form-control" id="uraian" name="uraian"
                            value="<?= $value['uraian']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan :</label>
                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                            value="<?= $value['keterangan']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="judul">Judul :</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $value['judul']; ?>">
                    </div>
                    <input type="hidden" name="id_profile" value="<?= $value['id_profile']; ?>">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<?php echo view('admin/footer'); ?>