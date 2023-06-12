@extends('layouts.main')
@section('title','mahasiswa')
@section('content')
<div class="card mt-4">
    <div class="card-header">
        <a href="/mahasiswa/formtambah" class="btn btn-primary" role="button"><i class="bi bi-plus-square-fill"></i> Mahasiswa</a>
        <form action="/mahasiswa/pencarian" method="GET" class="form-inline my-2 my-lg-0 float-right">
            <input name="q"  class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    <div class="card-body">    
            @if (session('flash')) 
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('flash') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif
            @if (session('info')) 
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>{{ session('info') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif
            @if (session('danger')) 
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('danger') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
            @endif
        <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Gender</th>
                <th scope="col">Program Studi</th>
                <th scope="col">Minat</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($mhs as $idx => $data)
                <tr>
                    <th scope="row">{{ $mhs->firstItem() + $idx }}</th>
                    <td> {{ $data->nim }}</td>
                    <td> {{ $data->nama }}</td>
                    <td> {{ $data->gender }}</td>
                    <td> {{ $data->prodi }}</td>
                    <td> {{ $data->minat }}</td>
                    <td>
                        <a href="/mahasiswa/formedit/{{ $data->id }}" class="btn btn-success" role="button"><i class="bi bi-pencil-square"></i></a>
                        <a href="/mahasiswa/delete/{{  $data->id  }}" class="btn btn-danger"><i class="bi bi-x-square"></i></a>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        
          {{ $mhs->count() }}
          {{ $mhs->total() }}
          {{ $mhs->currentPage() }}

          <span class="float-right">{{ $mhs->links() }}</span>
    </div>
</div>

@endsection