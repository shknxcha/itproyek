  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url("adminlte")?>index3.html" class="brand-link">
      <img src="<?= base_url("adminlte")?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">LDR Bouquet</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url("adminlte")?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">LAILY</a>
        </div>
      </div>

    
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                Dashboard
              </p>
            </a>
 
          </li>
          <li class="nav-item">
            <a href="<?= base_url('/akun') ?>" class="nav-link">
              <p>
                Data Akun
              </p>
            </a>
          </li>
 
          <li class="nav-item">
            <a href="#" class="nav-link">
             
              <p>
                Data Produk
               
              </p>
            </a>

          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
             
              <p>
                Data Pesanan
               
              </p>
            </a>
  
          </li>
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              
              <p>
                Data Testimoni
               
              </p>
            </a>
  
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">       
              <p>
                Tables
              </p>
            </a>
  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>