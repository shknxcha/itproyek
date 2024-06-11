<?= view('admin/header'); ?>
<section class="content">
    <div class="row">
        <div class="card-footer">
            <a href="<?= base_url('tambahPesanan') ?>" class="btn btn-primary">Tambah Pesanan</a>
        </div>
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: #7977CA !important;">
                    <h3 class="card-title">Data Pesanan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jumlah Pesanan</th>
                                <th>Tanggal</th>
                                <th>Total Harga</th>
                                <th>ID Pengguna</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pesanan as $key => $row): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['jumlah_pesanan'] ?></td>
                                <td><?= $row['tanggal'] ?></td>
                                <td><?= $row['total_harga'] ?></td>
                                <td><?= $row['struk'] ?></td>
                                <td><?= $row['status'] ?></td>
                                <td><?= $row['id_pengguna'] ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;"
                                        href="/pesanan/edit/<?= $row['id_pesanan'] ?>"><i class="fas fa-pen"></i></a>
                                    <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;"
                                        href="/pesanan/delete/<?= $row['id_pesanan'] ?>"
                                        onclick="return confirm('Yakin ingin menghapus pesanan ini?')"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?= view('admin/footer'); ?>