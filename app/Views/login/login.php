<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LDR BOUQUET | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('adminlte/'); ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-color: #D1C1C1 !important;">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= base_url('adminlte/'); ?>index2.html" ><b>LDR</b> BOUQUET</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silakan Login dengan Akun Anda</p>

      <form action="<?= base_url('/Loginproses') ?>" method="POST" onsubmit="return validateRecaptcha();">
        <?php if (session()->getFlashdata('error')) { ?>
          <div class="alert alert-danger">
            <?php echo session()->getFlashdata('error') ?>
          </div>
        <?php } ?>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="g-recaptcha" data-sitekey="6LdtHDApAAAAAB8rUvf2yVbrkVzY9mPCldsmSZ7H"></div>
        </div>
        <div class="text-center mb-3">
          <button type="submit" class="btn btn-block btn-primary" style="background-color: #7977CA !important;">
            Masuk
          </button>
          <a href="#" class="btn btn-block btn-danger">
            Lupa Password
          </a>
        </div>
      </form>

      <p class="mb-0">
        <a href="<?= base_url('/regist'); ?>" class="text-center">Belum punya akun?</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url('adminlte/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('adminlte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('adminlte/'); ?>dist/js/adminlte.min.js"></script>
<!-- reCAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>
  function validateRecaptcha() {
    var response = grecaptcha.getResponse();
    if (response.length === 0) {
      alert('Mohon centang kotak reCAPTCHA sebelum login.');
      return false;
    } else {
      return true;
    }
  }
</script>
</body>
</html>
