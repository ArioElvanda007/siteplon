<section class="content">
    <div class="container-fluid">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hallo : <?php echo \Auth::user()->name; ?></h1>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card-body">

                    <!-- sum statistic -->
                    <div class="row">

                        <!-- Comment -->
                        <div class="col-md-3 col-sm-6 col-12">
                            {{-- <a href="#"> --}}
                                <div class="info-box">
                                    <span class="info-box-icon bg-danger"><i class="fas fa-comments"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">New Comments</span>
                                        <span class="info-box-number">{{ number_format($data_statistics->jml_comment, 0) }}</span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            {{-- </a> --}}
                        </div>
                        <!-- /.col -->

                        <!-- Comment -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="far fa-thumbs-up"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Likes</span>
                                    <span class="info-box-number">{{ number_format($data_statistics->jml_like, 0) }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- Rating -->
                        <div class="col-md-3 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning"><i class="far fa-star"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Rate Average</span>
                                    <span class="info-box-number">{{ number_format($data_statistics->jml_rating, 1) }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                    </div>
                    <!-- /.row sum statistic-->

                    <!-- 3 best -->
                    <div id="accordion">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4 class="card-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                        3 Best
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse">
                                <div class="card-body">

                                    <div class="row">

                                        @foreach ($data_bests as $data)
                                            <div class="col-md-4">
                                                <!-- Widget: user widget style 1 -->
                                                <div class="card card-widget widget-user">
                                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                                    <div class="widget-user-header bg-info">
                                                        <h3 class="widget-user-username">{{$data->nama_rental}}</h3>
                                                        <h5 class="widget-user-desc">{{$data->email}}</h5>
                                                    </div>
                                                    <div class="widget-user-image">
                                                        <img class="img-circle elevation-2" src="{{ asset('img/'.$data->gambar) }}" alt="User Avatar">
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="row">
                                                            <div class="col-sm-4 border-right">
                                                                <div class="description-block">
                                                                    <h5 class="description-header">{{ number_format($data->jml_rating, 1) }}</h5>
                                                                    <span class="description-text">Rating</span>
                                                                </div>
                                                                <!-- /.description-block -->
                                                            </div>
                                                            <!-- /.col -->
                                                            <div class="col-sm-4 border-right">
                                                                <div class="description-block">
                                                                    <h5 class="description-header">{{ number_format($data->jml_like, 0) }}</h5>
                                                                    <span class="description-text">Like</span>
                                                                </div>
                                                                <!-- /.description-block -->
                                                            </div>
                                                            <!-- /.col -->
                                                            <div class="col-sm-4">
                                                                <div class="description-block">
                                                                    <h5 class="description-header">{{ number_format($data->jml_comment, 0) }}</h5>
                                                                    <span class="description-text">Comment</span>
                                                                </div>
                                                                <!-- /.description-block -->
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col -->
                                        @endforeach

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.3 best -->

                    <!-- detail statistic -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th scope="col" width=50>No</th>
                                <th scope="col"></th>
                                <th scope="col">Best</th>
                                <th scope="col">Nama Rental</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Email</th>
                                <th scope="col"></th>
                                <th scope="col">Rating</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($master_rentals as $data)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    <a href="{{route('comment.show', $data->id)}}">
                                        <img id="preview" src="{{ asset('img/'.$data->gambar) }}" alt="preview image" height="50px" width="50px">
                                    </a>
                                </td>
                                <td class="text-center"><input type="checkbox" name="best_checkbox[{{ $data->id }}]" disabled
                                    @if($data->status_best == '1') checked @endif>
                                </td>
                                <td>
                                    <a href="{{route('comment.show', $data->id)}}">
                                        {{ $data->nama_rental }}
                                    </a>

                                    <br/> Telp : <small>{{ $data->nomor_telp }}</small></td>
                                <td><span style="font-weight: bold;">Kota : {{ $data->kota }}</span><br/>{{ $data->alamat }}</td>
                                <td>{{ $data->email }}<br/>Web : {{ $data->website }}</td>
                                <td>
                                    <i class="fas fa-comments"></i> : {{number_format($data->jml_comment, 0)}}
                                    @if ($data->status_new != 0)
                                        <a href="{{route('comment.show', $data->id)}}">
                                            <span class="right badge badge-danger ml-2">New</span>
                                        </a>
                                    @endif
                                    <br/>
                                    <i class="far fa-thumbs-up"></i> : {{number_format($data->jml_like, 0)}}
                                </td>
                                <td>
                                    @if (number_format($data->jml_rating, 0) == 1)
                                        <i class="fas fa-star"></i>
                                    @endif

                                    @if (number_format($data->jml_rating, 0) == 2)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    @endif

                                    @if (number_format($data->jml_rating, 0) == 3)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    @endif

                                    @if (number_format($data->jml_rating, 0) == 4)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    @endif

                                   @if (number_format($data->jml_rating, 0) == 5)
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- /.detail statistic -->

                </div>

            </div>
        </section>

    </div><!-- /.container-fluid -->
  </section>
