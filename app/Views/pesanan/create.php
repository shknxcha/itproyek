<?= view('admin/header'); ?>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: #7977CA !important;">
                    <h3 class="card-title">Tambah Pesanan</h3>
                </div>
                <form action="<?= base_url('/prosesPesanan') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="jumlah_pesanan">Jumlah Pesanan</label>
                            <input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan"
                                placeholder="Masukkan jumlah pesanan" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total Harga</label>
                            <input type="number" class="form-control" id="total_harga" name="total_harga"
                                placeholder="Masukkan total harga" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input type="text" class="form-control" id="status" name="status"
                                placeholder="Berikan status" required>
                        </div>
                        <div class="form-group">
                            <label for="struk">Struk Pembayaran</label>
                            <input type="file" class="form-control-file" id="struk" name="struk">
                        </div>
                        <div class="form-group">
                            <label for="id_pengguna">ID Pengguna</label>
                            <input type="number" class="form-control" id="id_pengguna" name="id_pengguna"
                                placeholder="Masukkan ID pengguna" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= view('admin/footer'); ?>