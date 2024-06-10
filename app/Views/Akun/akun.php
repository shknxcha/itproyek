<?= $this->include('admin/header');?>
<?= $this->include('admin/menu');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Akun</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="col card-header text-right">
            <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tambah_menu">+ Tambah </button>
        </div>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>username</th>
                    <th>Password</th>
                    <th>level </th>
                    <th>aksi </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no=1;
                    foreach ($akun as $key):?>
                  <tr>
                    <td><?php echo $no++;?></td>

                    <td class="table-plus">
                        <div class="name-avatar d-flex align-items-center">
                          <div class="txt">
                            <div class="weight-600"><?php echo $key->username;?></div>
                        </div>
                          </div>
                            </td>

                    <td class="table-plus">
                      <div class="name-avatar d-flex align-items-center">
                         <div class="txt">
                           <div class="weigth-600"><?php echo $key->password;?></div>
                           </div>
                            </div>
                             </td>    

                    <td>
                      <span class="badge badge <?php echo $key->level == 'Admin' ? 'badge badge-primary' : 'badge badge-danger';?>"><?php echo $key->level; ?></span>
                    </td>
                    
                    <td>
                    <div class="table-actions">
      <a href="#" class="btn btn-primary btn-sm mb-2"  style="background-color: #FF4F9D !important;"
        data-color="#265ed7" data-toggle="modal" data-target="#edit_akun<?= $key->id_akun?>" data-menuid="<?= $key->id_akun ?>">
          <i class="fas fa-pen"></i>
          </a>
         <!-- Add confirmation modal trigger button -->
         <a href="#" class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;"
        data-toggle="modal" data-target="#hapus_akun<?= $key->id_akun ?>" data-color="#e95959">
         <i class="fas fa-trash-alt"></i>
        </a>

        
    </div>
    </td>

<!-- Add confirmation modal for each menu item -->
<div class="modal fade" id="hapus_akun<?= $key->id_akun ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus akun ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Batal</button>
                <a href="<?php echo base_url('akun/hapusakun?id=' . $key->id_akun); ?>" class="btn btn-outline-danger">Hapus</a>
            </div>
        </div>
    </div>
</div>
 <!-- Modal View Menu -->
 <div class="modal fade" id="view_menu<?= $key->id_akun ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Display Menu Details -->
                <div class="menu-details">

                <!-- Display other menu details -->
                <p><strong>ID:</strong> <?php echo $key->id_akun; ?></p>
                    <p><strong>Username:</strong> <?php echo $key->username; ?></p>
                    <p><strong>Password:</strong> <?php echo $key->password; ?></p>
                    <p><strong>Level:</strong> <?php echo $key->level;; ?></p>
                    <!-- Add more details as needed -->

                    <!-- You can customize the styling to suit your design -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Menu-->
<div class="modal fade" id="edit_akun<?= $key->id_akun?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('akun/editakun/' . $key->id_akun) ?>" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">ID</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="" name="id" value="<?php echo $key->id_akun ?> "/>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Username </label>
              <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="" name="username"  value="<?php echo $key->username ?>" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" placeholder="" type="text" name="password" value="<?php echo $key->password ?> "/>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Level</label>
            <div class="col-sm-12 col-md-10">
              <select class="form-control" name="level">
                <option value="Tersedia" <?php echo $key->level=='Admin'?'selected':'' ?>>ADMIN</option>
                <option value="Tidak Tersedia" <?php echo $key->level=='Pembeli'?'selected':'' ?>>PEMBELI</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-outline-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
                        </tr>

                  </tr>
                  <?php endforeach;?>
                  </tbody>
                  
                </table>
              </div>
              </div>
              </div>

              <!-- Modal Tambah Menu-->
<div class="modal fade" id="tambah_akun<?= $key->id_akun ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('akun/tambah_akun') ?>" enctype="multipart/form-data">
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">ID</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="" name="id" value="<?php echo isset($data) ? $key->id : ''; ?>"/>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Username</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" type="text" placeholder="" name="username"  />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Password</label>
            <div class="col-sm-12 col-md-10">
              <input class="form-control" placeholder="" type="text" name="password" value="<?php echo isset($data) ? $key->password : ''; ?>"/>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-12 col-md-2 col-form-label">Level</label>
              <div class="col-sm-12 col-md-10">
                <select class="form-control" name="level">
                <option value="Admin" <?php echo isset($data) && $key->level=='Admin' ? 'selected' : '' ?>>ADMIN</option>
                <option value="Pembeli" <?php echo isset($data) && $key->level=='Pembeli' ? 'selected' : '' ?>>PEMBELI</option>
              </select>
            </div>
          </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?= $this->include('admin/footer');?>


</div>
<!-- ./wrapper -->

<?= $this->include('admin/script');?>
</body>
</html>
