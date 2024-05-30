<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="card-footer">
            <a href="/profil/tambahProfil">Tambah Profil</a>
        </div>
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header" style="background-color: #7977CA !important;">
                    <h3 class="card-title">Data Profil</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
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
                            <?php foreach ($profile as $key => $row): ?>

                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $row['judul'] ?></td>
                                <td><?= $row['ikon'] ?></td>
                                <td><?= $row['gambar'] ?></td>
                                <td><?= $row['uraian'] ?></td>
                                <td><?= $row['keterangan'] ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;"
                                        href="/profil/tampilProfil/<?= $row['id_profile'] ?>"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;" href="/profil/editProfil/<?= $row['id_profile'] ?>"><i class="fas fa-pen"></i></a>
                                    <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;" href="/profil/hapusProfil/<?= $row['id_profile'] ?>"
                                        onclick="return confirm('Yakin ingin menghapus profil ini?')"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Judul</th>
                                <th>Ikon Logo</th>
                                <th>Gambar (background)</th>
                                <th>Uraian</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->