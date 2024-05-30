<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>LDR BOUQUET - Online Website</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=PT+Serif:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('sparlex/');?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url('sparlex/');?>lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?= base_url('sparlex/');?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('sparlex/');?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url('sparlex/');?>css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar start -->
    <div class="container-fluid sticky-top px-0">
        <div class="container-fluid topbar d-none d-lg-block">
            <div class="container px-0">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="d-flex flex-wrap">
                            <a href="#" class="me-4 text-light"><i
                                    class="fas fa-map-marker-alt text-primary me-2"></i>Find A Location</a>
                            <a href="#" class="me-4 text-light"><i
                                    class="fas fa-phone-alt text-primary me-2"></i>+01234567890</a>
                            <a href="#" class="text-light"><i
                                    class="fas fa-envelope text-primary me-2"></i>Example@gmail.com</a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="d-flex align-items-center justify-content-end">
                            <a href="#" class="me-3 btn-square border rounded-circle nav-fill"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="#" class="btn-square border rounded-circle nav-fill"><i
                                    class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-light">
            <div class="container px-0">
                <nav class="navbar navbar-light navbar-expand-xl">
                    <a href="index.html" class="navbar-brand">
                        <h1 class="text-primary display-4">LDR</h1>
                    </a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-light py-3" id="navbarCollapse">
                        <div class="navbar-nav mx-auto border-top">
                            <a href="<?= base_url('/');?>" class="nav-item nav-link active">Beranda</a>
                            <a href="<?= base_url('/profil');?>" class="nav-item nav-link">Profil</a>
                            <a href="<?= base_url('/galeri');?>" class="nav-item nav-link">Galeri</a>
                            <a href="<?= base_url('/testimoni');?>" class="nav-item nav-link">Testimoni</a>
                            <div class="nav-item dropdown">
                                <a href="<?= base_url('/informasi');?>" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Informasi</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="<?= base_url('/');?>" class="dropdown-item">Bouquet</a>
                                    <a href="<?= base_url('/');?>" class="dropdown-item">Papan Ucapan</a>
                                </div>
                            </div>
                            <a href="contact.html" class="nav-item nav-link">LogIn</a>
                        </div>

                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- Navbar End -->