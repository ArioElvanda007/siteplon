<form action="{{route('rental.update')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card-content">
      <div class="card-body">
        <input type="hidden" id="id" name="id" class="form-control" value = "{{old('id', $master_rentals->id)}}">
        <input type="hidden" id="id_gambar" name="id_gambar" value = "{{old('gambar', $master_rentals->gambar)}}">

        <div class="row">
            <!-- left column Data -->
            <div class="col-md-6">
                <div class="card-body">
                    <div class="row mb-2">
                        <label for="nama_rental" class="col-sm-2 col-form-label">Nama Rental</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_rental" name="nama_rental" value = "{{old('nama_rental', $master_rentals->nama_rental)}}" placeholder="Input nama pemilik rental" required>
                        </div>
                    </div>

                    <div class="row mb-2">
                      <label for="nomor_telp" class="col-sm-2 col-form-label">No. Telp</label>
                      <div class="col-sm-10">
                          <input type="text" class="form-control" id="nomor_telp" name="nomor_telp" value = "{{old('nomor_telp', $master_rentals->nomor_telp)}}" placeholder="Input no telp pemilik rental" required>
                      </div>
                    </div>

                    <div class="row mb-2">
                        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col-sm-10">
                            <select name="kota" id="kota" class="form-control" required>
                                <option value="">--Pilih kota--</option>
                                @foreach ($kotas as $data)
                                    <option value="{{$data->kota}}"  {{$master_rentals->kota == $data->kota  ? 'selected' : '' }}>{{$data->kota}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-2">
                      <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                      <div class="col-sm-10">
                          <Textarea class="form-control" rows="3" id="alamat" name="alamat" placeholder="Input alamat pemilik rental" required>{{old('alamat', $master_rentals->alamat)}}</Textarea>
                        </div>
                    </div>

                    <div class="row mb-2">
                      <label for="email" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" value = "{{old('email', $master_rentals->email)}}" placeholder="Input email pemilik rental" required>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <label for="website" class="col-sm-2 col-form-label">Website</label>
                      <div class="col-sm-10">
                          <input type="url" class="form-control" id="website" name="website" value = "{{old('website', $master_rentals->website)}}" placeholder="Input website pemilik rental" required>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <label for="map_lokasi" class="col-sm-2 col-form-label">Map emblem</label>
                      <div class="col-sm-10">
                          <Textarea class="form-control" rows="3" id="map_lokasi" name="map_lokasi" placeholder="Input map lokasi pemilik rental" required>{{old('map_lokasi', $master_rentals->map_lokasi)}}</Textarea>

                          <div class="custom-control custom-checkbox mt-3">
                            <input class="custom-control-input" type="checkbox" id="customCheckbox1" name="best_checkbox" value="1"
                            @if ($master_rentals->status_best == 1)
                                checked
                            @endif
                            >
                            <label for="customCheckbox1" class="custom-control-label">Best Vendors</label>
                        </div>

                        </div>
                    </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary float-right"><i class="fa fa-save mr-1"></i>
                      <span>Save Changes</span>
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
                    <img id="preview_image" src="{{ asset('img/'.$master_rentals->gambar) }}" alt="preview image">
                </div>
              </div>
            </div>

          </div>

      </div>
  </div>
</form>
