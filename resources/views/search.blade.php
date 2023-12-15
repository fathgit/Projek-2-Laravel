@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item"><a href="/pegawai">Data Pegawai</a></li>
              <li class="breadcrumb-item active">Search</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <body>
    <div class="row">
            @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
</div>
@endif
    <div class="container">
    <!-- <h1 class="text-center">Data Pegawai</h1> -->
    <form action="{{ route('pegawai.search') }}" method="GET">@csrf
                

                <div class="form-inline mb-1">
        <div class="input-group mt-1 mb-1 col-5">
          <input class="form-control" name="search" type="search" placeholder="Cari Berdasarkan Nama dan Alamat..." aria-label="Search">
          <div class="input-group-append">
            <button type="submit" class="btn btn-sidebar btn-dark">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>  



            </form>
    
        <a href="/tambahpegawai" class="btn btn-success mb-2 ml-2">Tambah</a>
        
        <table class="table table-striped border-whites table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Foto</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Alamat</th>
      <th scope="col">No Telepon</th>
      <th scope="col">Di Update</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @foreach ($data as $index => $row)
    <tr>
      <th scope="row">{{ $index + $data->firstItem() }}</th>
      <td>{{ $row->nama }}</td>
      <td>
                          <img src="{{ asset('fotopegawai/'.$row->foto) }}" alt="" style="width: 50px;">
                        </td>
      <td>{{ $row->jeniskelamin }}</td>
      <td>{{ $row->alamat }}</td>
      <td>+62-{{ $row->notelpon }}</td>
      <td>{{ $row->updated_at->format('d/m/y') }}</td>
      <td>

      <a href="/tampilkandata/{{ $row->id }}" class="btn btn-warning">Edit</a>
      @if (Auth::check() && Auth::user()->level == 'admin')
      <a href="/delete/{{ $row->id }}" class="btn btn-danger">Delete</a>
      @endif
    </td>
       

    </tr>
    @endforeach
   

  </tbody>
</table>
        </div>

    </div>


    
    <div>{{$data->links()}}</div>
  </body>

    </div>

@endsection







