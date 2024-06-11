<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header" style="background-color: #3498DB !important;">
                            <h3 class="card-title">Tambah Produk</h3>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="<?= base_url('/prosesproduk') ?>"
                                enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="produk">Produk :</label>
                                    <input type="text" class="form-control" id="produk" name="produk">
                                </div>
                                <div class="form-group">
                                    <label for="warna">Warna :</label>
                                    <input type="text" class="form-control" id="warna" name="warna">
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga :</label>
                                    <input type="text" class="form-control" id="harga" name="harga">
                                </div>
                                <div class="form-group">
                                    <label for="ukuran">Ukuran :</label>
                                    <input type="text" class="form-control" id="ukuran" name="ukuran">
                                </div>
                                <div class="form-group">
                                    <label for="stok">Stok :</label>
                                    <input type="number" class="form-control" id="stok" name="stok">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar :</label>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>