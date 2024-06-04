<?php echo view('admin/header'); ?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #7977CA !important;">
                        <h3 class="card-title">Tambah Profil</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?= base_url('/profil/saveProfil')?>"
                        enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    placeholder="Masukkan judul" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Keterangan" required>
                            </div>
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <textarea class="form-control" id="uraian" name="uraian"
                                    placeholder="Place some text here" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="ikon">Ikon</label>
                                <input type="file" class="form-control" id="ikon" name="ikon">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
                <?php echo view('admin/footer'); ?>