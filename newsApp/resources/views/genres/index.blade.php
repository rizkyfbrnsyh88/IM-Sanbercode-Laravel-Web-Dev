@extends('layouts.master')
@section('judul')
    Halaman Genre
@endsection
@push('style')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.3/datatables.min.css"/>
@endpush

@push('script')
    <script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
    $(function () {
        $("#example1").DataTable();
    });
    </script>
@endpush
@section('content')
<a href="/genres/create" class="btn btn-primary mb-3">Tambah</a>
        <table id="example1" class="table table-bordered table-striped text-center">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($genres as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <form action="{{route('genres.destroy', $item->id)}}" method="POST" onsubmit="return confirm('Kamu yakin ingin menghapus data ini?')" >
                                @csrf
                                <a href="{{route('genres.show', $item->id)}}" class="btn btn-info">Show</a>
                                <a href="{{route('genres.edit', $item->id)}}" class="btn btn-primary">Edit</a>
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger my-1" value="Delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="mx-auto">Data genre masih kosong</th>
                    </tr>  
                @endforelse              
            </tbody>
        </table>
@endsection