<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-lg">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #7977CA !important;">
                        <h3 class="card-title">Form Tambah Profil</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action="/profil/saveProfil" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    placeholder="Masukkan Judul">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Masukkan keterangan singkat/slogan/pesan sederhana">
                            </div>
                            <!-- Main content -->
                            <section class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card card-outline card-info">
                                            <div class="card-header">
                                                <label for="uraian">Uraian</label>
                                                <!-- tools box -->
                                                <div class="card-tools">
                                                    <button type="button" class="btn btn-tool btn-sm"
                                                        data-card-widget="collapse" data-toggle="tooltip"
                                                        title="Collapse">
                                                        <i class="fas fa-minus"></i></button>
                                                    <button type="button" class="btn btn-tool btn-sm"
                                                        data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                                        <i class="fas fa-times"></i></button>
                                                </div>
                                                <!-- /. tools -->
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body pad">
                                                <div class="mb-3">
                                                    <textarea class="textarea" id="uraian" name="uraian"
                                                        placeholder="Place some text here"
                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required ></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-->
                                </div>
                                <!-- ./row -->
                            </section>
                            <!-- /.content -->
                            <div class="form-group">
                                <label for="exampleInputFile">Ikon Logo</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ikon" name="ikon">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Gambar Background</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="exampleInputFile">Pilih file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="">Upload</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"
                                style="background-color: #7977CA !important;">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>