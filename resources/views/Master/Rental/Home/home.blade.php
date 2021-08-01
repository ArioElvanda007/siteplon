<div>
    {{-- <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>Master User</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href='/master/user'>Home</a></li>
                <li class="breadcrumb-item active">Master User</li>
            </ol>
            </div>
        </div>
        </div><!-- /.container-fluid -->
    </section> --}}

    <section class="content">
        {{-- <div class="card"> --}}
            <div class="card-header">
                <a href="{{route('rental.create')}}" class="btn btn-primary">
                    <i class="fa fa-plus-circle mr-1"></i>Add New
                </a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" width=50>No</th>
                        <th scope="col"></th>
                        <th scope="col">Best</th>
                        <th scope="col">Nama Rental</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Email</th>
                        <th scope="col" width=50></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($master_rentals as $data)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>
                          <img id="preview" src="{{ asset('img/'.$data->gambar) }}" alt="preview image" height="50px" width="50px">
                        </td>
                        <td class="text-center"><input type="checkbox" name="best_checkbox[{{ $data->id }}]" disabled
                            @if($data->status_best == '1') checked @endif>
                        </td>
                        <td>{{ $data->nama_rental }}<br/> Telp : <small>{{ $data->nomor_telp }}</small></td>
                        <td><span style="font-weight: bold;">Kota : {{ $data->kota }}</span><br/>{{ $data->alamat }}</td>
                        <td>{{ $data->email }}<br/>Web : {{ $data->website }}</td>
                        <td>
                            {{-- melalui via modal --}}
                            <a href="{{route('rental.edit', $data->id)}}"><i class="fa fa-edit mr-2"></i></a>

                            <a href="#">
                                <i class="fa fa-trash text-danger"
                                 data-toggle="modal" data-target="#delete_data" data-myid="{{$data->id}}"
                                >
                                </i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          {{-- </div> --}}
          <!-- /.card -->

    </section>
</div>

{{-- delete data --}}
<div class="modal fade" id="delete_data">
    <div class="modal-dialog modal-sm">
    <form autocomplete="off" id="validate" action="{{route('rental.delete')}}" method="GET">
        @method('PATCH')
        @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Delete Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="hidden" id="id" name="id" value="">
          <p>Yakin data ingin didelete ?&hellip;</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
            <button type="submit" class="btn btn-danger"><i class="fa fa-trash mr-1"></i>
                <span>Delete</span>
            </button>
        </div>
      </div>
      <!-- /.modal-content -->
    </form>
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
