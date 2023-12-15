@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Dokumen</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data Dokumen</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <body>
    @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @endif
        <div class="container">
            <!-- <h1 class="text-center">Data Dokumen</h1> -->

            <form action="{{ route('dokumen.search') }}" method="GET">@csrf
                

                <div class="form-inline mb-1">
        <div class="input-group mt-1 mb-1 col-5">
          <input class="form-control" name="search" type="search" placeholder="Cari Berdasarkan Nama File..." aria-label="Search">
          <div class="input-group-append">
            <button type="submit" class="btn btn-sidebar btn-dark">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>  



            </form>


            <a href="{{ route('dokumen.tambahdokumen') }}" class="btn btn-success mb-2 ml-2">Tambah</a>
            <div class="row">
               
                <table class="table table-striped border-whites table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama User</th>
                            <th scope="col">Nama File</th>
                            <th scope="col">Dokumen</th>
                            <th scope="col">Di Buat </th>
                            @if (Auth::check() && Auth::user()->level == 'admin')
                            <th scope="col">Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data_dokumen as $index => $row)
                        <tr>
                            <th scope="row">{{ $index + $data_dokumen->firstItem() }}</th>
                            <td>{{ $row->users->name }}</td>
                            <td>{{ $row->dokumen }}</td>
                            <td>
                                <a href="datadokumen/{{ $row->dokumen }}">
                                <button class="btn btn-info" type="button">Download</button>
                            </a>  
                            </td>
                            <td>{{ $row->created_at->format('d/m/y') }}</td>
                            @if (Auth::check() && Auth::user()->level == 'admin')
                            <td>

                                
                                
                                <form action="{{ route('dokumen.destroy', $row->id ) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger"
                                    onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                            </form>
                               
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div>{{$data_dokumen->links()}}</div>
    </body>
</div>

@endsection
