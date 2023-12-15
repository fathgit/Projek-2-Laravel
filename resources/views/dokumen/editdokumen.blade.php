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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <body>
    <h1 class="text-center">Tambah Data Pegawai</h1>
    
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
              <form action="{{ route('dokumen.update', $data_dokumen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama</label>
    <input type="text" name="name_user" class="form-control" value="{{ $data_dokumen->name_user }}" id="exampleInputEmail1" aria-describedby="emailHelp">

    <div class="mb-3 mt-3">
    <label for="exampleInputEmail1" class="form-label">Nama Dokumen</label><br>
      <label for="exampleInputEmail1" class="form-label">{{ $data_dokumen->dokumen }}</label>
    </div>

    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Masukkan Dokumen</label>
      <input type="file" name="dokumen" class="form-control" aria-describedby="emailHelp">
    </div>
  
  <button type="submit" class="btn btn-primary">Update</button>
</form>
              </div>
            </div>
          </div>
        </div>

    </div>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>

    </div>

@endsection







