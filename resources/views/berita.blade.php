<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-Rilis Toba</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('static/images/ikon-toba.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('static') }}/lib/animate/animate.min.css" rel="stylesheet">
    <link href="{{ asset('static') }}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ asset('static') }}/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('static') }}/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('static') }}/css/style.css" rel="stylesheet">
    <style type="text/css">
        .kategori-berita{
            position: absolute;
            top: 15px;
            left: 15px;
            font-size: 15px;
            background: #2124b1;
            padding: 10px 25px;
            border-radius: 20px;
        }
        .isi-berita{
            font-size: 14px;
            overflow: hidden;
            text-align: left;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .judul-berita{
            font-size: 17px;
            overflow: hidden;
            text-align: left;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
    </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">
                        <img src="{{ asset('static/images/ikon-toba.png') }}" alt="Logo">
                        <span class="fs-2">E-Rilis Toba</span></h1>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="{{ url('') }}#home" class="nav-item nav-link active">Home</a>
                        <a href="{{ url('') }}#berita" class="nav-item nav-link">Berita</a>
                        <a href="{{ url('') }}#about" class="nav-item nav-link">About</a>
                        <a href="{{ url('') }}#kontak" class="nav-item nav-link">Kontak</a>
                    </div>
                    <a href="{{ url('register') }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 mx-4 ">Register</a>
                    <a href="{{ route('login') }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 ">Login</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Service Start -->
        <div style="margin-bottom:70px;margin-top: -400px" id="berita">&nbsp;</div>
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-white position-relative d-inline text-primary ps-4">Berita Kami</h6>
                    <h2 class="text-white mt-2">Berita Terbaru</h2>
                </div>
                <div class="row g-4">
                    @foreach($data as $key => $value)
                    @if($value->status == 1)
                        <a target="_blank" href="{{ $value->url_berita }}"class="col-sm-4 wow zoomIn" data-wow-delay="0.1s" style="position: relative;">
                            <div class="service-item d-flex flex-column justify-content-end align-items-start text-white font-weight-bold text-center rounded" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)), url(<?= $value->sampul ?>);background-size: cover;background-repeat: no-repeat;">
                                <small style="font-size:14px" class="text-white ">{{ $value->tanggal_dibuat }}</small>
                                <h5 class="text-white judul-berita">{{ $value->judul }}</h5>
                                <h5 class="text-white kategori-berita">{{ $value->kategori }}</h4>
                                <h5 class="text-white isi-berita">{{ $value->isi }}</h4>
                            </div>
                        </a>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Service End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            © Dinas Komunikasi dan Informatika Kabupaten Toba <?= date("Y") ?> . All rights reserved.
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="#home">Home</a>
                                <a href="#berita">Berita</a>
                                <a href="#about">About</a>
                                <a href="#kontak">Kontak</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('static') }}/lib/wow/wow.min.js"></script>
    <script src="{{ asset('static') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('static') }}/lib/waypoints/waypoints.min.js"></script>
    <script src="{{ asset('static') }}/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="{{ asset('static') }}/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="{{ asset('static') }}/lib/lightbox/js/lightbox.min.js"></script>
    <script src="{{ asset('static') }}/js/main.js"></script>

</body>

</html>