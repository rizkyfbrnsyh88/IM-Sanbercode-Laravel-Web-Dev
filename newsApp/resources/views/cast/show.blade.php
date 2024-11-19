@extends('layouts.master')
@section('judul')
Halaman Tampil Data
@endsection
@section('content')
<h4 class="text-primary">Nama : {{$casts->name}}</h4>
<p>Umur : {{$casts->age}}</p>
<p>Biodata : {{$casts->bio}}</p>

<a href="/cast" class="btn btn-secondary btn-sm">Kembali</a>
@endsection


