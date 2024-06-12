<?php echo view('admin/header'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" action="<?= base_url('edit/' . $profile['id_profile']) ?>"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="gambar">Gambar :</label>
                                <input type="file" class="form-control-file" id="gambar" name="gambar">
                                <input type="hidden" name="gambar_lama" value="<?= $value['gambar']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="ikon">Logo :</label>
                                <input type="file" class="form-control-file" id="ikon" name="ikon">
                                <input type="hidden" name="ikon_lama" value="<?= $value['ikon']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="uraian">Uraian :</label>
                                <input type="text" class="form-control" id="uraian" name="uraian"
                                    value="<?= $profile['uraian']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan :</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    value="<?= $profile['keterangan']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul :</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                    value="<?= $profile['judul']; ?>">
                            </div>
                            <input type="hidden" name="id_profile" value="<?= $profile['id_profile']; ?>">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php echo view('admin/footer'); ?>