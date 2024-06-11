<?php echo view('admin/header'); ?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="card-footer">
            <a href="<?= base_url('/tambahProfil') ?>" class="btn btn-primary">Tambah Profil</a>
        </div>
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: #7977CA !important;">
                    <h3 class="card-title">Data Profil</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Ikon Logo</th>
                                <th>Gambar (background)</th>
                                <th>Uraian</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($profil as $key => $row): ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $row['judul'] ?></td>
                                    <td><?= $row['ikon'] ?></td>
                                    <td><?= $row['gambar'] ?></td>
                                    <td><?= $row['uraian'] ?></td>
                                    <td><?= $row['keterangan'] ?></td>
                                    <td>
                                        <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;"
                                            href="/profil/tampilProfil/<?= $row['id_profile'] ?>"><i
                                                class="fas fa-eye"></i></a>
                                        <button class="btn btn-primary btn-sm mb-2 edit-btn"
                                            style="background-color: #FF4F9D !important;"
                                            data-id="<?= $row['id_profile'] ?>"><i class="fas fa-pen"></i></button>
                                        <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;"
                                            href="<?= base_url('/hapusProfil' . $row['id_profile']) ?>"
                                            onclick="return confirm('Yakin ingin menghapus profil ini?')"><i
                                                class="fas fa-trash-alt"></i></a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="editForm" method="post" action="<?= base_url('/profil/updateProfil') ?>"
                enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editId" name="id_profile">
                    <div class="form-group">
                        <label for="editJudul">Judul</label>
                        <input type="text" class="form-control" id="editJudul" name="judul" placeholder="Masukkan judul"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="editKeterangan">Keterangan</label>
                        <input type="text" class="form-control" id="editKeterangan" name="keterangan"
                            placeholder="Keterangan" required>
                    </div>
                    <div class="form-group">
                        <label for="editUraian">Uraian</label>
                        <textarea class="form-control" id="editUraian" name="uraian" placeholder="Place some text here"
                            required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="editIkon">Ikon</label>
                        <input type="file" class="form-control" id="editIkon" name="ikon">
                    </div>
                    <div class="form-group">
                        <label for="editGambar">Gambar</label>
                        <input type="file" class="form-control" id="editGambar" name="gambar">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('.edit-btn').on('click', function () {
            var id_profile = $(this).data('id');
            $.ajax({
                url: '/profil/getProfilData/' + id_profile,
                method: 'GET',
                success: function (response) {
                    $('#editId').val(response.id_profile);
                    $('#editJudul').val(response.judul);
                    $('#editKeterangan').val(response.keterangan);
                    $('#editUraian').val(response.uraian);
                    $('#editModal').modal('show');
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        $('#editForm').on('submit', function (e) {
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url: '/profil/updateProfil',
                method: 'POST',
                data: data,
                success: function (response) {
                    $('#editModal').modal('hide');
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>
<?php echo view('admin/footer'); ?>