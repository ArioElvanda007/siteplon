<form action="{{route('rental.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card-content">
      <div class="card-body">
        <div class="row">
            <!-- left column Data -->
            <div class="col-md-6">
                <div class="card-body">
                    <div class="row mb-2">
                        <label for="nama_rental" class="col-sm-2 col-form-label">Nama Rental</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_rental" name="nama_rental" placeholder="Input nama pemilik rental" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                      <label for="nomor_telp" class="col-sm-2 col-form-label">No. Telp</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" placeholder="Input no telp pemilik rental" required>
                      </div>
                    </div>

                    <div class="row mb-2">
                        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col-sm-10">
                            <select name="kota" id="kota" class="form-control" required>
                                <option value="">--Pilih kota--</option>
                                @foreach ($kotas as $data)
                                    <option value="{{$data->kota}}">{{$data->kota}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                          <Textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Input alamat pemilik rental" required></Textarea>
                        </div>
                    </div>

                    <div class="row mb-2">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" placeholder="Input email pemilik rental" required>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <label for="website" class="col-sm-2 col-form-label">Website</label>
                      <div class="col-sm-10">
                          <input type="url" class="form-control" id="website" name="website" placeholder="Input website pemilik rental" required>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <label for="map_lokasi" class="col-sm-2 col-form-label">Map emblem</label>
                      <div class="col-sm-10">
                          <Textarea class="form-control" rows="3" id="map_lokasi" name="map_lokasi" placeholder="Input map lokasi pemilik rental" required></Textarea>

                          <div class="custom-control custom-checkbox mt-3">
                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="best_checkbox" value="1">
                            <label for="customCheckbox1" class="custom-control-label">Best Vendors</label>
                        </div>

                        </div>
                    </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save mr-1"></i>
                      <span>Save</span>
                  </button>
                  <a class="btn btn-danger float-right mr-2" href="{{route('rental.index')}}"><i class="fa fa-times mr-1"></i>Cancel</a>
                </div>
            </div>

            <!-- right column Data -->
            <div class="col-md-4">
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
              </div>
            </div>

          </div>

      </div>
  </div>
</form>
