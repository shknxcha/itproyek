<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card-footer">
        <a href="<?= base_url('/tambahproduk') ?>" class="btn btn-primary mb-2">Tambah Produk</a>
      </div>
      <!-- left column -->
      <div class="col-12">
        <!-- general form elements -->
        <!-- notifikasi sukses dan error -->
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
          <!-- /.card-header -->
          <div class="card-body">
            <!-- table untuk menampilkan produk -->
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Produk</th>
                  <th>Warna</th>
                  <th>Harga</th>
                  <th>Ukuran</th>
                  <th>Gambar</th>
                  <th>Stok</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; ?>
                <?php foreach ($produk as $key => $value): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['produk']; ?></td>
                    <td><?= $value['warna']; ?></td>
                    <td><?= $value['harga']; ?></td>
                    <td><?= $value['ukuran']; ?></td>
                    <td><img src="<?= base_url('gambar_produk/' . $value['gambar']); ?>" width="100px"></td>
                    <td><?= $value['stok']; ?></td>
                    <td>
                      <!-- button modal edit -->
                      <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#edit<?= $value['id_produk']; ?>">
                        Edit
                      </button>
                      <a href="<?= base_url('hapusproduk/' . $value['id_produk']); ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal Produk -->
<?php foreach ($produk as $key => $value): ?>
  <div class="modal fade" id="edit<?= $value['id_produk']; ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Edit Produk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="<?= base_url('editproduk/' . $value['id_produk']) ?>"
            enctype="multipart/form-data">
            <div class="form-group">
              <label for="produk">Produk :</label>
              <input type="text" class="form-control" id="produk" name="produk" value="<?= $value['produk']; ?>">
            </div>
            <div class="form-group">
              <label for="warna">Warna :</label>
              <input type="text" class="form-control" id="warna" name="warna" value="<?= $value['warna']; ?>">
            </div>
            <div class="form-group">
              <label for="harga">Harga :</label>
              <input type="text" class="form-control" id="harga" name="harga" value="<?= $value['harga']; ?>">
            </div>
            <div class="form-group">
              <label for="ukuran">Ukuran :</label>
              <input type="text" class="form-control" id="ukuran" name="ukuran" value="<?= $value['ukuran']; ?>">
            </div>
            <div class="form-group">
              <label for="stok">Stok :</label>
              <input type="number" class="form-control" id="stok" name="stok" value="<?= $value['stok']; ?>">
            </div>
            <div class="form-group">
              <label for="gambar">Gambar :</label>
              <input type="file" class="form-control-file" id="gambar" name="gambar">
              <input type="hidden" name="gambar_lama" value="<?= $value['gambar']; ?>">
            </div>
            <input type="hidden" name="id_produk" value="<?= $value['id_produk']; ?>">
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
<?php endforeach; ?>