<?= $this->include('admin/header');?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
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
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Gambar</th>
                                        <th>Uraian</th>
                                        <th>aksi </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                    $no=1;
                    foreach ($testimoni as $key):?>
                                    <tr>
                                        <td><?php echo $no++;?></td>
                                        <td><?php echo $key->gambar;?></td>
                                        <td>Win 95+</td>
                                        <td>X</td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>

                            </table>
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