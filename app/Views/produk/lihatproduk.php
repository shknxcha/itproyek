<section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class= "card-footer">
            <a href="<?= base_url('/tambahproduk')?>" class="btn btn-primary mb-2">Tambah Produk</a> 
          </div>
       <!-- left column -->
         <div class="col-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Produk</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered" style="width: 100%;">
                  <thead>                  
                  <tr>
                    <th style="width: 8px; text-align: center;">Produk</th>
                    <th style="width: 2px; text-align: center;">warna</th>
                    <th style="width: 5px; text-align: center;">Harga</th>
                    <th style="width: 10px; text-align: center;">Ukuran</th>
                    <th style="width: 50px; text-align: center;">Gambar</th>
                    <th style="width: 5%; text-align: center;">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Bouquet Uang</td>
                      <td>kecil</td>
                      <td>Merah</td>
                      <td>35.000</td>
                      <td></td>
                      <td style="display: flex; flex-direction: row;">
                          <a class="btn btn-primary btn-sm mb-2 mr-2" style="background-color: #FF4F9D !important; margin-right: 10px;" href="/profil/tampilProfil/"><i class="fas fa-eye"></i></a>
                          <button class="btn btn-primary btn-sm mb-2 mr-2 edit-btn" href="<?= base_url('/editproduk')?>" style="background-color: #FF4F9D !important; margin-right: 10px;" data-id=""><i class="fas fa-pen"></i></button>
                          <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;" href="" onclick="return confirm('Yakin ingin menghapus profil ini?')"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Bouquet Cemilan</td>
                      <td>Besar</td>
                      <td>Pink</td>
                      <td>90.000</td>
                      <td></td>
                      <td style="display: flex; flex-direction: row;">
                          <a class="btn btn-primary btn-sm mb-2 mr-2" style="background-color: #FF4F9D !important; margin-right: 10px;" href="/profil/tampilProfil/"><i class="fas fa-eye"></i></a>
                          <button class="btn btn-primary btn-sm mb-2 mr-2 edit-btn" style="background-color: #FF4F9D !important; margin-right: 10px;" data-id=""><i class="fas fa-pen"></i></button>
                          <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;" href="" onclick="return confirm('Yakin ingin menghapus profil ini?')"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Bouquet Bunga</td>
                      <td>Besar</td>
                      <td>Merah</td>
                      <td>80.000</td>
                      <td></td>
                      <td style="display: flex; flex-direction: row;">
                          <a class="btn btn-primary btn-sm mb-2 mr-2" style="background-color: #FF4F9D !important; margin-right: 10px;" href="/profil/tampilProfil/"><i class="fas fa-eye"></i></a>
                          <button class="btn btn-primary btn-sm mb-2 mr-2 edit-btn" style="background-color: #FF4F9D !important; margin-right: 10px;" data-id=""><i class="fas fa-pen"></i></button>
                          <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;" href="" onclick="return confirm('Yakin ingin menghapus profil ini?')"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                    <tr>
                      <td>Bouquet Kain</td>
                      <td>Sedang</td>
                      <td>Biru</td>
                      <td>60.000</td>
                      <td></td>
                      <td style="display: flex; flex-direction: row;">
                          <a class="btn btn-primary btn-sm mb-2 mr-2" style="background-color: #FF4F9D !important; margin-right: 10px;" href="/profil/tampilProfil/"><i class="fas fa-eye"></i></a>
                          <button class="btn btn-primary btn-sm mb-2 mr-2 edit-btn" style="background-color: #FF4F9D !important; margin-right: 10px;" data-id=""><i class="fas fa-pen"></i></button>
                          <a class="btn btn-primary btn-sm mb-2" style="background-color: #FF4F9D !important;" href="" onclick="return confirm('Yakin ingin menghapus profil ini?')"><i class="fas fa-trash-alt"></i></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 justify-content-end">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>