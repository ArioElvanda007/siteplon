
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

        {{-- lte --}}
        {{-- <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> --}}

        <!-- rating -->
        <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top header-inner-pages">
            <div class="container d-flex align-items-center">

                <h1 class="logo me-auto" style="color:white;">{{$master_profiles->title}}</h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

                <nav id="navbar" class="navbar">
                    <ul>
                    <li><a class="nav-link scrollto active" href="/">Home</a></li>
                    <li><a class="nav-link scrollto" href="/bekasi">Bekasi</a></li>
                    <li><a class="nav-link scrollto" href="/jakarta">Jakarta</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                    {{-- <li><a class="getstarted scrollto" href="#best">Get Started</a></li> --}}
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->

        <main id="main">
            <!-- ======= Contact Section ======= -->
            <section id="profile" class="contact">
                <div class="container" data-aos="fade-up">
                    <!-- Main content -->
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3">

                                    <!-- Profile Image -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                    src="{{ asset('img/'.$master_rentals->gambar) }}"
                                                    alt="User profile picture"
                                                >
                                            </div>
                                            <h3 class="profile-username text-center">{{$master_rentals->nama_rental}}</h3>
                                            <p class="text-muted text-center">Area {{$master_rentals->kota}}</p>

                                            <div class="rating mb-2">
                                                <input id="input-2" name="rate2" class="rating rating-loading" data-min="0" data-max="5" data-step="0" value={{$data_ratingavgs->rate}} data-size="ls" disabled>
                                            </div>

                                            <strong><i class="fas fa-phone mr-1"></i> No Telp</strong>
                                            <p class="text-muted">
                                                {{$master_rentals->nomor_telp}}
                                            </p>
                                            <hr>

                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                            <p class="text-muted">{{$master_rentals->alamat}}</p>
                                            <hr>

                                            <strong><i class="fas fa-envelope mr-1"></i> Email & Web</strong>
                                            <p class="text-muted">{{$master_rentals->email}}</p>
                                            <p>
                                                <a href="{{$master_rentals->website}}">
                                                    {{$master_rentals->website}}
                                                </a>
                                            </p>

                                            @if ($data_ratingusers == null)
                                            <div class="rating">
                                                <form action="{{route('detail.storerating')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" id="id_rental" name="id_rental" value={{$master_rentals->id}}>

                                                    <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="0" value="0" data-size="ls">
                                                    {{-- <input type="hidden" name="id" required="" value="{{ $post->id }}">
                                                    <br/> --}}
                                                    <button type="submit" class="btn btn-success btn-xs">Submit Review</button>
                                                </form>
                                            </div>
                                            @endif

                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->

                                </div>
                                <!-- /.col -->

                                <div class="col-md-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="active tab-pane" id="map_lokasi">
                                                    <!-- map -->
                                                    <div class="post clearfix">
                                                        <iframe src=
                                                        {{old('map_lokasi', $master_profiles->map_lokasi)}}
                                                        frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                                                    </div>
                                                    <!-- /.map -->

                                                    <!-- comment -->
                                                    <div class="post">
                                                        <div class="card card-primary">
                                                            <div class="card-header">
                                                                <h3 class="card-title">Comment</h3>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <!-- form start -->
                                                            <form action="{{route('detail.storecomment')}}" method="POST">
                                                                @csrf
                                                                <input type="hidden" id="id_rental" name="id_rental" value={{$master_rentals->id}}>

                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label for="nama">Name</label>
                                                                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Enter name">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="exampleInputEmail1">Email address</label>
                                                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                                                    </div>
                                                                    <!-- textarea -->
                                                                    <div class="form-group">
                                                                        <label>Comment</label>
                                                                        <textarea class="form-control" rows="3" placeholder="Comment..." name="comment"></textarea>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-body -->
                                                                <div class="card-footer">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.card -->
                                                    </div>
                                                    <!-- /.comment -->

                                                    <!-- list comment -->
                                                    <div class="post clearfix">
                                                        @foreach ($data_comments as $datacomment)
                                                            <div class="card card-default">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">{{ $datacomment->nama }}
                                                                        @if ($datacomment->status_comment == 1)
                                                                            <small class="right badge badge-success ml-2">Admin</small>
                                                                        @endif
                                                                    </h3>

                                                                    <br/>
                                                                    <small>{{ $datacomment->created_at }}</small>

                                                                    <div class="card-tools">
                                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.card-header -->
                                                                <div class="card-body">
                                                                    <p>
                                                                        {{ $datacomment->comment }}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            <!-- /.card -->
                                                        @endforeach
                                                    </div>
                                                    <!-- /.list comment -->
                                                </div>
                                                <!-- /.tab-pane -->

                                                <div class="tab-pane" id="comment">
                                                    <form class="form-horizontal">
                                                        <div class="form-group row">
                                                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control" id="inputName" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="offset-sm-2 col-sm-10">
                                                                <div class="checkbox">
                                                                    <label>
                                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="offset-sm-2 col-sm-10">
                                                                <button type="submit" class="btn btn-danger">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- /.tab-pane -->
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->

                                    </div>
                                    <!-- /.nav-tabs-custom -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- /.content -->
                </div>
            </section><!-- End Contact Section -->

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
                                        {{old('alamat', $master_profiles->email)}}
                                    </p>
                                </div>

                                <div class="phone">
                                    <i class="bi bi-phone"></i>
                                    <h4>Call:</h4>
                                    <p>
                                        {{old('alamat', $master_profiles->nomor_telp)}}
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

        <!-- rating -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

        {{-- <script type="text/javascript">
            $("#input-id").rating();
        </script> --}}

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-61054490e08cf547"></script>

    </body>
</html>
