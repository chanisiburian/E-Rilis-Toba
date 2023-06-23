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
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        .judul-berita{
            font-size: 17px;
            overflow: hidden;
            text-align: left;
            display: -webkit-box;
            -webkit-line-clamp: 2;
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
                        <a href="#home" class="nav-item nav-link active">Home</a>
                        <a href="#berita" class="nav-item nav-link">Berita</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="#kontak" class="nav-item nav-link">Kontak</a>
                    </div>
                    <butaton type="button" class="btn text-secondary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                    @if(Auth::user() == null)
                    <a href="{{ url('register') }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 mx-4 ">Register</a>
                    <a href="{{ route('login') }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 ">Login</a>
                    @elseif(Auth::user()->level_id == 1)
                    <a href="{{ route('admin') }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 mx-4">Kelola</a>
                    @elseif(Auth::user()->level_id == 2)
                    <a href="{{ url('user') }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 mx-4">Dashboard</a>
                    @endif
                </div>
            </nav>

                    <!-- Full Screen Search Start -->
                    
                    <div class="modal fade" id="searchModal" tabindex="-1">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                                <div class="modal-header border-0">
                                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex align-items-center justify-content-center">
                                    <form action="/berita">
                                    <div class="input-group" style="max-width: 600px;">
                                        <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword..." name="search" id="search" value="{{ request('search') }}">
                                        <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                    <!-- Full Screen Search End -->

            <div class="container-xxl py-5 bg-primary hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn">E-Rilis Kabupaten Toba. Daftarkan Rilis Berita Media Anda</h1>
                            <p class="text-white pb-3 animated zoomIn">Berita terpercaya, terakurat dan mudah diakses</p>
                            <a href="{{ route('login') }}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Submit berita</a>
                            <a href="#berita" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Lihat Berita</a>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start d-flex justify-content-between">
                            <img class="img-fluid img-thumbnail rounded " src="{{ asset('static/images/bupati.jpg') }}" width="240">
                            <img class="img-fluid img-thumbnail rounded " src="{{ asset('static/images/wakilbupati.jpg') }}" width="240">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Service Start -->
        <div style="margin-bottom:70px;margin-top: -100px" id="berita">&nbsp;</div>
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary ps-4">Berita Kami</h6>
                    <h2 class="mt-2">Berita Terbaru</h2>
                </div>
                <div class="row g-4">
                    @foreach($data as $key => $value)
                    @if($value->status == 1 && $key <= 5)
                        <a target="_blank" href="{{ $value->url_berita }}"class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s" style="position: relative;">
                            <div class="service-item d-flex flex-column justify-content-end align-items-start text-white font-weight-bold text-center rounded" style="background: linear-gradient(to bottom, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.5)), url(<?= $value->sampul ?>);background-size: cover;">
                                <small style="font-size:14px" class="text-white ">{{ $value->tanggal_dibuat }}</small>
                                <h5 class="text-white judul-berita">{{ $value->judul }}</h5>
                                <h5 class="text-white kategori-berita">{{ $value->user->media_digital }}</h4>
                                <h5 class="text-white isi-berita">{{ $value->isi }}</h4>
                            </div>
                        </a>
                    @endif
                    @endforeach
                    <div class="text-center">
                        <a href="{{ url('berita') }}" class="btn btn-primary">Lihat Semua</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->


                <!-- About baru Start -->
        <div id="about"> 
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="position-relative d-inline text-primary ps-4">About</h6>
                <h2 class="mt-2">Tentang E-Rilis</h2>
            </div>
            <div class="container-xxl bg-primary newsletter my-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container px-lg-5">
                    <div class="row align-items-center" style="height: 250px;">
                        <div class="col-12 col-md-6">
                            <h3 class="text-white">Apa itu E-Rilis?</h3>
                            <small class="text-white">E-Rilis adalah Media Elektronik berbasis website yang digunakan oleh Media Mitra Kabupaten Toba sebagai media pencatatan Rilis Berita, untuk mempermudah media mitra maupun wartawan untuk merilis berita secara online.
                                <br> Dengan website ini Media Mitra hanya perlu submit url berita yang sudah dirillis.</small>
                            
                        </div>
                        <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                            <img class="img-fluid mt-5" style="height: 250px;" src="static/images/newsletter.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- About baru End -->

        <!-- Team Start -->
        <div style="margin-bottom:70px" id="kontak">&nbsp;</div>
        <div class="container-xxl mb-5 mt-0">
            <div class="container px-lg-5">
                
                <footer class="footer footer-bg text-center">
                    <div class="container">
                        <div class="row">
                            <!-- Footer Location-->
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <h4 class="text-uppercase mb-4">Location</h4>
                                <p class="lead mb-0">
                                    Jl. Tarutung Km. 2, Hinalang Bagasan, Kec. Balige, Toba, Sumatera Utara 22312
                                    <br>
                                    +6282165278788
                                    <br>
                                    kominfo@tobakab.go.id
                                </p>
                            </div>
                            <!-- Footer Social Icons-->
                            <div class="col-lg-6 mb-5 mb-lg-0">
                                <h4 class="text-uppercase mb-4">Kunjungi Kami</h4>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div><a class="btn btn-outline-light btn-social" target="_blank" href="https://web.facebook.com/PemkabToba/?hc_ref=ART1MqSiQqEJTbHyURaulgXFdkxD0SP42HMcgAHpa3XuYIXX8wPwE_9-tVfPVVIs3D4&fref=nf&__tn__=kC-R&_rdc=1&_rdr"><i class="fab fa-facebook text-primary">&nbsp;&nbsp;&nbsp;Facebook</i></a></div>
                                    </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div><a class="btn btn-outline-light btn-social" target="_blank" href="https://instagram.com/kominfo_toba?igshid=YmMyMTA2M2Y="><i class="fab fa-instagram text-primary">&nbsp;&nbsp;&nbsp;Instagram</i></a></div>
                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div><a class="btn btn-outline-light btn-social" target="_blank" href="https://m.youtube.com/channel/UCedRpcMbE9yv9LNmdY3dhfw"><i class="fab fa-youtube text-primary">&nbsp;&nbsp;&nbsp;Youtube</i></a></div>
                                </div>
                                {{-- <div class="d-flex justify-content-center align-items-center">
                                    <div><a class="btn btn-outline-light btn-social" target="_blank" href="https://m.youtube.com/channel/UCedRpcMbE9yv9LNmdY3dhfw"><i class="fab fa- text-primary">&nbsp;&nbsp;&nbsp;Youtube</i></a></div>
                                </div> --}}
                            </div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Team End -->
  
        

        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
            
            <div class="container px-lg-5">
                <div class="copyright">
                    
                    <div class="row">
                        
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            © Dinas Komunikasi dan Informatika Kabupaten Toba & Kerja Praktek IT Del <?= date("Y") ?>. <br>All rights reserved.
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
        <div>
            <p> E-Rilis Toba</p>
        </div>
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
    
    <!-- Running Text -->
    <div class="runtext">
        <marquee><h4  class="xyz" ><i><b>Tampakna Do Rantosna, Rim Ni Tahi Do Gogona </i></b></h3></marquee>
    </div>
     <!-- Running Text -->
</body>

</html>