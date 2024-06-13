<?= $this->include('admin/header'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #7977CA !important;">
                        <h3 class="card-title">Data Testimoni</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Uraian</th>
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
                                        <!-- button modal edit -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="testimoni/edit/<?= $value->id_testimoni; ?>">Edit</button>
                                        <!-- button hapus -->
                                        <a href="<?= base_url('testimoni/delete/' . $value->id_testimoni); ?>" class="btn btn-danger">Hapus</a>
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
<?= $this->include('admin/footer'); ?>
</div>
<!-- ./wrapper -->
</body>
</html>
