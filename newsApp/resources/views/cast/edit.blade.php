@extends('layouts.master')
@section('judul')
Halaman Edit Data
@endsection
@section('content')
<div>
    <h2>Tambah Data</h2>
        <form action="/cast/{{$cast->id}}" method="POST">
            @csrf
            @method('PUT')
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" id="nama" value="{{old('name', $cast->name)}}">
               
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" name="age" id="age"  value="{{old('name', $cast->age)}}">
                
            </div>
            <div class="form-group">
                <label for="bio">Biodata</label>
                <textarea class="form-control" name="bio" id="bio" cols="30" rows="10">{{old('bio', $cast->bio)}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpa Edit</button>
        </form>
</div>
@endsection