@extends('layouts.master')
@section('judul')
SanberBook
@endsection
@section('content')
<a href="/cast/create" class="btn btn-primary">Tambah</a>
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($casts as $item)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->name}}</td>
                        <td>
                            <form action="/cast/{{$item->id}}" method="POST" onsubmit="return confirm('are you sure delete data?')" >
                                @csrf
                                <a href="/cast/{{$item->id}}" class="btn btn-info">Show</a>
                                <a href="/cast/{{$item->id}}/edit" class="btn btn-primary">Edit</a>
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger my-1" value="Delete">
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th>Data cast masih kosong</th>
                    </tr>  
                @endforelse              
            </tbody>
        </table>
@endsection