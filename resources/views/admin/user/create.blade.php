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
    @if (count ($errors) > 0)
        <ul class="alert alert-danger">
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
        @endif
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-8">
            <div class="card">
              <div class="card-body">
              <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
  <div class="mb-3 form-grup">
    <label for="exampleInputEmail1" class="form-label">Nama User</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>

<div class="mb-3 form-grup">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>

  <div class="mb-3 form-grup">
    <label for="level" class="form-label">Level</label>

    <select class="form-select" name="level" aria-label="Default select example">
  <option selected>Pilih Level User</option>
  <option value="operator">Operator</option>
  <option value="admin">Admin</option>
</select>
</div>

  <div class="mb-3 mt-3 form-grup">
    <label for="password_conformation">Password Confirmation</label>
    <input type="password" class="form-control" name="password" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  
  <button type="submit" class="btn btn-primary">Tambah</button>
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







