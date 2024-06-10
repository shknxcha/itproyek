<?= view('admin/header'); ?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: #7977CA !important;">
                    <h3 class="card-title">Edit Pesanan</h3>
                </div>
                <form action="<?= base_url('/pesanan/update/' . $pesanan['id_pesanan']) ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jumlah_pesanan">Jumlah Pesanan</label>
                            <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan"
                                value="<?= $pesanan['jumlah_pesanan'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                value="<?= $pesanan['tanggal'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="number" class="form-control" id="total_harga" name="total_harga"
                                value="<?= $pesanan['total_harga'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="id_pengguna">ID Pengguna</label>
                            <input type="number" class="form-control" id="id_pengguna" name="id_pengguna"
                                value="<?= $pesanan['id_pengguna'] ?>" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= view('admin/footer'); ?>