<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>{{$master_profiles->title}}</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('img/'.$master_profiles->gambar) }}" rel="icon">
        <link href="{{ asset('Arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('Arsha/assets/vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('Arsha/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('Arsha/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Arsha/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('Arsha/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('Arsha/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{ asset('Arsha/assets/css/style.css') }}" rel="stylesheet">

        {{-- lte --}}
        <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

        <!-- =======================================================
        * Template Name: Arsha - v4.3.0
        * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top ">
            <div class="container d-flex align-items-center">

                <h1 class="logo me-auto" style="color:white;">{{$master_profiles->title}}</h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav id="navbar" class="navbar">
                    <ul>
                    <li><a class="nav-link scrollto active" href="/">Home</a></li>
                    <li><a class="nav-link scrollto" href="#best">Best</a></li>
                    <li><a class="nav-link scrollto" href="#bekasi">Bekasi</a></li>
                    <li><a class="nav-link scrollto" href="/jakarta">Jakarta</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                        @if (Route::has('login'))
                            @auth
                                <li><a class="nav-link scrollto" href={{ url('/dashboard') }}>Dashboard</a></li>
                            @else
                                <li><a class="nav-link scrollto" href={{ route('login') }}>Login</a></li>
                            @endauth
                        @endif
                    <li><a class="getstarted scrollto" href="#best">Get Started</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        <!-- ======= Hero Section ======= -->
        <section id="hero" class="d-flex align-items-center">

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                        <h1>{{$master_profiles->deskripsi_1}}</h1>
                        <h2>{{$master_profiles->deskripsi_2}}</h2>
                        <div class="d-flex justify-content-center justify-content-lg-start">
                            <a href="#best" class="btn-get-started scrollto">Get Started</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                        <img src="{{ asset('Arsha/assets/img/hero-img.png') }}" class="img-fluid animated" alt="">
                    </div>
                </div>
            </div>

        </section><!-- End Hero -->

        <main id="main">
            <!-- ======= best Section ======= -->
            <section id="best" class="team section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Best</h2>
                    </div>

                    <div class="row">
                        <!-- Main content -->
                        <section class="content">
                            <!-- Default box -->
                            <div class="card card-solid">
                                <div class="card-body pb-0">
                                    <div class="row d-flex align-items-stretch">
                                        @foreach ($master_rentals as $dataitem)
                                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                <div class="card bg-light">
                                                    <div class="card-header text-muted border-bottom-0">
                                                        Area : {{ $dataitem->kota }}
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <h2 class="lead"><b>{{ $dataitem->nama_rental }}</b></h2>
                                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-map-pin"></i></span><a href="{{ $dataitem->map_lokasi }}">{{ $dataitem->alamat }}</a></li>
                                                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-phone"></i></span>{{ $dataitem->nomor_telp }}</li>
                                                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-envelope"></i></span>{{ $dataitem->email }}</li>
                                                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-website"></i></span><a href="{{ $dataitem->website }}">{{ $dataitem->website }}</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-5 text-center">
                                                                <img src="{{ asset('img/'.$dataitem->gambar) }}" alt="" class="img-circle img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="text-right">
                                                            {{-- <a href="#" class="btn btn-sm bg-normal float-left" data-toggle="modal" data-target="#share">
                                                                <i class="fas fa-share mr-1"></i>
                                                            </a> --}}

                                                            <a href="#" class="btn btn-sm bg-normal float-left">
                                                                <i class="fas fa-star mr-1"></i>{{ number_format($dataitem->jml_rating, 1) }}
                                                            </a>

                                                            @if ($dataitem->status_rate == 0)
                                                                <a href={{route('likeBestAll.store_likeBestAll',$dataitem->id)}} class="btn btn-sm bg-yellow">
                                                                    <i class="fas fa-thumbs-up mr-1"></i>{{ $dataitem->jml_like }}
                                                                </a>
                                                            @else
                                                                <button class="btn btn-sm bg-yellow"><i class="fas fa-thumbs-up mr-1"></i>{{ $dataitem->jml_like }}</button>
                                                            @endif

                                                            <a href={{route('detail.show',$dataitem->id)}} class="btn btn-sm bg-success">
                                                                <i class="fas fa-comments mr-1"></i>{{ $dataitem->jml_comment }}
                                                            </a>

                                                            <a href={{route('detail.show',$dataitem->id)}} class="btn btn-sm btn-primary">
                                                                <i class="fas fa-user"></i> View Profile
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.card -->
                </div>
            </section>

            <!-- ======= bekasi Section ======= -->
            <section id="bekasi" class="team section-bg">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Bekasi Area</h2>
                    </div>

                    <div class="row">
                        <!-- Main content -->
                        <section class="content">
                            <!-- Default box -->
                            <div class="card card-solid">
                                <div class="card-body pb-0">
                                    <div class="row d-flex align-items-stretch">
                                        @foreach ($master_rentallists as $dataitem)
                                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                                                <div class="card bg-light">
                                                    <div class="card-header text-muted border-bottom-0">
                                                        Area : {{ $dataitem->kota }}
                                                    </div>
                                                    <div class="card-body pt-0">
                                                        <div class="row">
                                                            <div class="col-7">
                                                                <h2 class="lead"><b>{{ $dataitem->nama_rental }}</b></h2>
                                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-map-pin"></i></span><a href="{{ $dataitem->map_lokasi }}">{{ $dataitem->alamat }}</a></li>
                                                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-phone"></i></span>{{ $dataitem->nomor_telp }}</li>
                                                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-envelope"></i></span>{{ $dataitem->email }}</li>
                                                                    <li class="small"><span class="fa-li"><i class="fas fa-sm fa-website"></i></span><a href="{{ $dataitem->website }}">{{ $dataitem->website }}</a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="col-5 text-center">
                                                                <img src="{{ asset('img/'.$dataitem->gambar) }}" alt="" class="img-circle img-fluid">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="text-right">
                                                            {{-- <a href="#" class="btn btn-sm bg-normal float-left" data-toggle="modal" data-target="#share">
                                                                <i class="fas fa-share mr-1"></i>
                                                            </a> --}}

                                                            <a href="#" class="btn btn-sm bg-normal float-left">
                                                                <i class="fas fa-star mr-1"></i>{{ number_format($dataitem->jml_rating, 1) }}
                                                            </a>

                                                            @if ($dataitem->status_rate == 0)
                                                                <a href={{route('likeBestAll.store_likeBestAll',$dataitem->id)}} class="btn btn-sm bg-yellow">
                                                                    <i class="fas fa-thumbs-up mr-1"></i>{{ $dataitem->jml_like }}
                                                                </a>
                                                            @else
                                                                <button class="btn btn-sm bg-yellow"><i class="fas fa-thumbs-up mr-1"></i>{{ $dataitem->jml_like }}</button>
                                                            @endif

                                                            <a href={{route('detail.show',$dataitem->id)}} class="btn btn-sm bg-success">
                                                                <i class="fas fa-comments mr-1"></i>{{ $dataitem->jml_comment }}
                                                            </a>

                                                            <a href={{route('detail.show',$dataitem->id)}} class="btn btn-sm btn-primary">
                                                                <i class="fas fa-user"></i> View Profile
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </section>
                        <!-- /.content -->
                    </div>
                    <!-- /.card -->
                </div>
            </section>

            <!-- ======= Contact Section ======= -->
            <section id="contact" class="contact">
                <div class="container" data-aos="fade-up">

                    <div class="section-title">
                        <h2>Contact</h2>
                    </div>

                    <div class="row">

                        <div class="col-lg-5 d-flex align-items-stretch">
                            <div class="info">
                                <div class="address">
                                    <i class="bi bi-geo-alt"></i>
                                    <h4>Location:</h4>
                                    <p>
                                    {{old('alamat', $master_profiles->alamat)}}
                                    </p>
                                </div>

                                <div class="email">
                                    <i class="bi bi-envelope"></i>
                                    <h4>Email:</h4>
                                    <p>
                                        {{old('email', $master_profiles->email)}}
                                    </p>
                                </div>

                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p>
                                        {{old('nomor_telp', $master_profiles->nomor_telp)}}
                                    </p>
                                </div>

                            </div>

                        </div>

                        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                            <div class="info">
                                <iframe src=
                                {{old('map_lokasi', $master_profiles->map_lokasi)}}
                                frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                            </div>
                        </div>

                    </div>

                </div>
            </section><!-- End Contact Section -->

        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer">
            <div class="container footer-bottom clearfix">
                <div class="copyright">
                    &copy; Copyright <strong><span>{{$master_profiles->copyright}}</span></strong>. All Rights Reserved
                </div>
            </div>
        </footer><!-- End Footer -->

        <div id="preloader"></div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Create Modal Share-->
        <div class="modal fade" id="share" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <form autocomplete="off" id="validate" action="#" method="POST"><!-- jika showEditModal = true maka edit, jika false maka create -->
                    {{-- {{@csrf_field()}} --}}
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalScrollableTitle">
                                <span>Add New Data</span>
                            </h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
{{-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61054490e08cf547"></script> --}}


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                                <span>Save</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Vendor JS Files -->
        <script src="{{ asset('Arsha/assets/vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('Arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('Arsha/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('Arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('Arsha/assets/vendor/php-email-form/validate.js') }}"></script>
        <script src="{{ asset('Arsha/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('Arsha/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('Arsha/assets/js/main.js') }}"></script>

        {{-- lte --}}
        <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>

        {{-- share --}}
        {{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/share.js') }}"></script> --}}

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61054490e08cf547"></script>

    </body>

</html>
