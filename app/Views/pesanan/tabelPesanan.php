<?= view('admin/header'); ?>
<section class="content">
    <div class="row">
        <div class="card-footer">
            <a href="<?= base_url('/tambahPesan') ?>" class="btn btn-primary mb-2">Tambah Pesanan</a>
        </div>
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: #7977CA !important;">
                    <h3 class="card-title">Daftar Pesanan</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Jumlah Pesanan</th>
                                <th>Tanggal</th>
                                <th>Total Harga</th>
                                <th>Struk</th>
                                <th>Status</th>
                                <th>Nama Produk</th>
                                <th>Nama Pengguna</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($pesanan as $item): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $item['jumlah_pesanan'] ?? 'N/A' ?></td>
                                    <td><?= $item['tanggal'] ?? 'N/A' ?></td>
                                    <td><?= $item['total_harga'] ?? 'N/A' ?></td>
                                    <td><img src="<?= base_url('gambar_produk/' . ($item['struk'] ?? 'default.png')) ?>" alt="Struk" width="50"></td>
                                    <td><?= $item['status'] ?? 'N/A' ?></td>
                                    <td><?= $item['nama_produk'] ?? 'N/A' ?></td>
                                    <td><?= $item['nama_pengguna'] ?? 'N/A' ?></td>
                                    <td>
                                        <a href="<?= base_url('pesanan/edit/' . $item['id_pesanan']) ?>" class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('pesanan/delete/' . $item['id_pesanan']) ?>" class="btn btn-danger">Hapus</a>
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
