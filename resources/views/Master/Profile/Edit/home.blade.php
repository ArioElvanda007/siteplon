<form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
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
                          <input type="hidden" id="id" name="id" value = "{{old('id', $master_profiles->id)}}">
                          <input type="hidden" id="id_gambar" name="id_gambar" value = "{{old('gambar', $master_profiles->gambar)}}">

                          <div class="form-group">
                              <label for="title">Title</label>
                              <input type="text" class="form-control" id="title" name="title" value = "{{old('title', $master_profiles->title)}}" placeholder="Input title website" required>
                          </div>

                          <div class="form-group">
                              <label for="deskripsi_1">Deskripsi 1</label>
                              <Textarea class="form-control" rows="3" id="deskripsi_1" name="deskripsi_1" placeholder="Input deskripsi title" required>{{old('deskripsi_1', $master_profiles->deskripsi_1)}}</Textarea>
                          </div>

                          <div class="form-group">
                            <label for="deskripsi_2">Deskripsi 2</label>
                            <Textarea class="form-control" rows="3" id="deskripsi_2" name="deskripsi_2" placeholder="Input deskripsi title" required>{{old('deskripsi_2', $master_profiles->deskripsi_2)}}</Textarea>
                            </div>


                          <div class="form-group">
                              <label for="copyright">Copyright</label>
                              <input type="text" class="form-control" id="copyright" name="copyright" value = "{{old('copyright', $master_profiles->copyright)}}" placeholder="Input copyright" required>
                          </div>

                          <div class="form-group">
                            <label for="nomor_telp">Telp</label>
                            <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" value = "{{old('nomor_telp', $master_profiles->nomor_telp)}}" placeholder="Input nomor telp" required>
                        </div>

                          <div class="form-group">
                              <label for="email_company">Email</label>
                              <input type="email" class="form-control" id="email" name="email" value = "{{old('email', $master_profiles->email)}}" placeholder="Input email" required>
                          </div>

                          <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <Textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Input alamat" required>{{old('alamat', $master_profiles->alamat)}}</Textarea>
                        </div>

                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-1"></i>
                          <span>Save Changes</span>
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
                            @if ($master_profiles->gambar == null)
                                <img id="preview_image" src="{{ asset('img/no image.png') }}" alt="preview image">
                            @else
                                <img id="preview_image" src="{{ asset('img/'.$master_profiles->gambar) }}" alt="preview image">
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="map_lokasi">Emblem Map</label>
                            <Textarea class="form-control" rows="3" id="map_lokasi" name="map_lokasi" placeholder="Input url emplem map location" required>{{old('map_lokasi', $master_profiles->map_lokasi)}}</Textarea>
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

