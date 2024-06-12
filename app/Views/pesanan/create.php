<?= view('admin/header'); ?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: #7977CA !important;">
                    <h3 class="card-title">Tambah Pesanan</h3>
                </div>
                <form action="<?= base_url('/prosesPesan') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jumlah_pesanan">Jumlah Pesanan</label>
                            <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="number" class="form-control" id="total_harga" name="total_harga" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status" required>
                        </div>
                        <div class="form-group">
                            <label for="id_produk">Nama Produk</label>
                            <select class="form-control" id="id_produk" name="id_produk" required>
                                <?php foreach($produkList as $produk): ?>
                                    <option value="<?= $produk['id_produk'] ?>"><?= $produk['produk'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_pengguna">Nama Pengguna</label>
                            <select class="form-control" id="id_pengguna" name="id_pengguna" required>
                                <?php foreach($penggunaList as $pengguna): ?>
                                    <option value="<?= $pengguna['id_pengguna'] ?>"><?= $pengguna['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="struk">Struk</label>
                            <input type="file" class="form-control" id="struk" name="struk">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= view('admin/footer'); ?>
