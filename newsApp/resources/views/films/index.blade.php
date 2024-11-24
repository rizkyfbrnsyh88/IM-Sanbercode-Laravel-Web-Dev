@extends('layouts.master')
@section('judul')
Halaman Films
@endsection
@section('content')
@auth
<a href="/films/create" class="btn btn-primary">Tambah</a>
@endauth
        <div class="row mt-3">
            @forelse ($films as $item)
                <div class="col-4">
                    <div class="card">
                        <img src="{{asset('images/'. $item->poster)}}" class="mx-auto" width="200px" height="300px">
                        <div class="card-body">
                          <h3>{{$item->title}}</h3>
                          <span class="badge badge-success">{{$item->genres->name}}</span>
                          <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
                          <p class="card-text">{{$item->release_year}}</p>
                          <a href="{{route('films.show', $item->id)}}" class="btn btn-primary btn-sm btn-block">Read More</a>
                          @auth
                          <div class="row my-3">
                              <div class="col">
                                    <a href="{{route('films.edit', $item->id)}}" class="btn btn-warning btn-sm btn-block">Edit</a>
                              </div>
                              <div class="col">
                                <form action="{{route('films.destroy', $item->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger btn-sm btn-block">Delete</button>
                                </form>
                          </div>
                          </div>
                          @endauth
                        </div>
                      </div>
                </div>
            @empty
                <h4 class="mx-auto">Data Film Belum Tersedia.</h4>
            @endforelse  
        </div>
@endsection