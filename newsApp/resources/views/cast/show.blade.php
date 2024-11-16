@extends('layouts.master')
@section('judul')
Halaman Tampil Data
@endsection
@section('content')
<h4 class="text-primary">Nama : {{$cast->name}}</h4>
<p>Umur : {{$cast->age}}</p>
<p>Biodata : {{$cast->bio}}</p>

<a href="/cast" class="btn btn-secondary btn-sm">Kembali</a>
@endsection