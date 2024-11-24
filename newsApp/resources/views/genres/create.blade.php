@extends('layouts.master')
@section('judul')
Halaman Tambah Genre
@endsection
@section('content')
<div>
    <h2>Tambah Data</h2>
        <form action="/genres" method="POST">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @csrf
            <div class="form-group">
                <label for="name">Nama Genre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
</div>
@endsection