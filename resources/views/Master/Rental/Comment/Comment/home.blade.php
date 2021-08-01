<!-- ======= Contact Section ======= -->
{{-- <section id="profile" class="contact"> --}}
    {{-- <div class="container" data-aos="fade-up"> --}}
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Content Header (Page header) -->
                <section class="content-header">

                </section>

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

                                {{-- <div class="rating mb-2">
                                    <input id="input-2" name="rate2" class="rating rating-loading" data-min="0" data-max="5" data-step="0" value={{$data_ratingavgs->rate}} data-size="ls" disabled>
                                </div> --}}

                                <div class="form-group">
                                    <strong><i class="fas fa-phone mr-1"></i> No Telp</strong>
                                    <p class="text-muted">
                                        {{$master_rentals->nomor_telp}}
                                    </p>
                                    <hr>
                                </div>

                                <div class="form-group">
                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                                    <p class="text-muted">{{$master_rentals->alamat}}</p>
                                    <hr>
                                </div>

                                <div class="form-group">
                                    <strong><i class="fas fa-envelope mr-1"></i> Email & Web</strong>
                                    <p class="text-muted">{{$master_rentals->email}}</p>
                                    <p>
                                        <a href="{{$master_rentals->website}}">
                                            {{$master_rentals->website}}
                                        </a>
                                    </p>
                                </div>

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
                                        {{-- <!-- map -->
                                        <div class="post clearfix">
                                            <iframe src=
                                            {{old('map_lokasi', $master_profiles->map_lokasi)}}
                                            frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                                        </div>
                                        <!-- /.map --> --}}

                                        <!-- comment -->
                                        <div class="post">
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                    <h3 class="card-title">Comment</h3>
                                                </div>
                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                <form action="{{route('comment.store')}}" method="POST">
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
                                                        <h3 class="card-title">{{ $datacomment->nama }}</h3>
                                                        @if ($datacomment->status_comment == 1)
                                                            <span class="right badge badge-success ml-2">Admin</span>
                                                        @endif

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
    {{-- </div> --}}
{{-- </section><!-- End Contact Section --> --}}
