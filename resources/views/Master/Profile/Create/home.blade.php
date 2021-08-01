<form action="{{route('profile.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

    <div>
        {{-- <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1>Master Jenis</h1>
                </div>
                <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href='/master/company'>Home</a></li>
                    <li class="breadcrumb-item active">Master Company</li>
                </ol>
                </div>
            </div>
            </div><!-- /.container-fluid -->
        </section> --}}

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Input title website" required>
                            </div>

                            <div class="form-group">
                                <label for="deskripsi_1">Deskripsi 1</label>
                                <Textarea class="form-control" rows="3" id="deskripsi_1" name="deskripsi_1" placeholder="Input deskripsi title" required></Textarea>
                            </div>

                            <div class="form-group">
                              <label for="deskripsi_2">Deskripsi 2</label>
                              <Textarea class="form-control" rows="3" id="deskripsi_2" name="deskripsi_2" placeholder="Input deskripsi title" required></Textarea>
                            </div>

                            <div class="form-group">
                                <label for="copyright">Copyright</label>
                                <input type="text" class="form-control" id="copyright" name="copyright" placeholder="Input copyright" required>
                            </div>

                            <div class="form-group">
                                <label for="nomor_telp">Telp</label>
                                <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" placeholder="Input nomor telp" required>
                            </div>

                            <div class="form-group">
                                <label for="email_company">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Input email" required>
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <Textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Input alamat" required></Textarea>
                            </div>

                            <div class="form-group">
                                <label for="map_lokasi">Emblem Map</label>
                                <Textarea class="form-control" rows="3" id="map_lokasi" name="map_lokasi" placeholder="Input url emplem map location" required></Textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                                <span>Save</span>
                            </button>
                        </div>

                    </div>
                    <!--/.col (left) -->

                    <!-- right column Data -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" id="gambar" name="gambar" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="card-img">
                                <img id="preview_image" src="{{ asset('img/no image.png') }}" alt="preview image">
                            </div>

                            <div class="form-group">
                                <label for="map_lokasi">Emblem Map</label>
                                <Textarea class="form-control" rows="3" id="map_lokasi" name="map_lokasi" placeholder="Input url emplem map location" required></Textarea>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
</form>

