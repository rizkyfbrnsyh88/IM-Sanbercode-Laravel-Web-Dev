@extends('layouts.master')
@section('judul')
Halaman Update Genre
@endsection
@section('content')
<div>
    <h2>Update Genre</h2>
        <form action="{{route('genres.update', $genres->id)}}" method="POST">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @method('PUT')
        @csrf
            <div class="form-group">
                <label for="name">Nama Genre</label>
                <input type="text" class="form-control" name="name" id="name" value="{{old('name', $genres->name)}}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Edit</button>
        </form>
</div>
@endsection