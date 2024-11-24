@extends('layouts.master')
@section('judul')
Halaman Update Film
@endsection
@section('content')
<div>
    <h2>Update Film</h2>
        <form action="{{route('films.update', $films->id)}}" method="POST" enctype="multipart/form-data">
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
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" value="{{old('title', $films->title)}}">
            </div>
            <div class="form-group">
                <label for="bio">Summary</label>
                <textarea class="form-control" name="summary" id="bio" cols="30" rows="10">{{old('summary', $films->summary)}}</textarea>
            </div>
            <div class="form-group">
                <label for="release_year">Release Year</label>
                <input type="text" class="form-control" name="release_year" id="release_year" value="{{old('release_year', $films->release_year)}}">
            </div>
            <div class="form-group">
                <label>Poster</label>
                <input type="file" class="form-control" name="poster">
            </div>
            <div class="form-group">
                <label for="genre_id">Genre</label>
                <select name="genre_id" id="genre_id" class="form-control">
                    <option value="">--Pilih Genre--</option>
                    @forelse ($genres as $item)
                        @if ($item->id === $films->genre_id)
                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                        @else
                            <option value="{{$item->id}}" >{{$item->name}}</option>
                        @endif
                    @empty
                        <option value="">Belum ada Genre</option>
                    @endforelse
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
</div>
@endsection