@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manajemen User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active"><a href="/user">Manajemen User</a></li>
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
    <!-- <h1 class="text-center">Manajemen User</h1> -->
    <div class="container">

    <form action="{{ route('user.search') }}" method="GET">@csrf
                

                <div class="form-inline mb-1">
        <div class="input-group mt-1 mb-1 col-5">
          <input class="form-control" name="search" type="search" placeholder="Cari Berdasarkan Nama User dan Email..." aria-label="Search">
          <div class="input-group-append">
            <button type="submit" class="btn btn-sidebar btn-dark">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>  



            </form>


        <a href="{{ route('user.create') }}" class="btn btn-success mb-2 ml-2">Tambah</a>
       
        
        <table class="table table-striped border-whites table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama User</th>
      <th scope="col">Email</th>
      <th scope="col">Level</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @php
    $no = 1;
    @endphp
    @foreach ($user as $index => $pass)
    <tr>
      <th scope="row">{{ $index + $user->firstItem() }}</th>
      <td>{{ $pass->name }}</td>
      <td>{{ $pass->email }}</td>
      <td>{{ $pass->level }}</td>
      <td>
      <form action="{{ route('user.destroy', $pass->id) }}" method="post">
        @csrf 
        <a href="{{ route('user.edit', $pass->id) }}" class="btn btn-warning">Edit</a>
        <button class="btn btn-danger" onClick="return confirm('Yakin Mau Dihapus?')">Hapus</button>
      </form>
    </td>
       

    </tr>
    @endforeach
   

  </tbody>
</table>
        </div>

    </div>

<div>{{$user->links()}}</div>
    
   
  </body>

    </div>

@endsection







