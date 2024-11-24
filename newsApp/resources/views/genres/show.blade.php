@extends('layouts.master')
@section('judul')
Halaman Tampil Data
@endsection
@section('content')
<h1 class="text-primary">{{$genres->name}}</h1>

<h4>List Films</h4>
<div class="row">
    @forelse ($genres->listFilms as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('images/'. $item->poster)}}" class="mx-auto" width="200px" >
            <div class="card-body">
            <h3>{{$item->title}}</h3>
            <p class="card-text">{{Str::limit($item->summary, 100)}}</p>
            <p class="card-text">{{$item->release_year}}</p>
            <a href="{{route('films.show', $item->id)}}" class="btn btn-primary btn-sm btn-block">Read More</a>
            </div>
        </div>
    </div>
    @empty
        <h5 class="mx-auto">Tidak ada film di genre ini</h5>
    @endforelse
</div>


<a href="/genres" class="btn btn-secondary btn-sm">Kembali</a>
@endsection


