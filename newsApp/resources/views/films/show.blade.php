@extends('layouts.master')
@section('judul')
Halaman Tampil Data
@endsection
@section('content')
    <img src="{{asset('images/'.$films->poster)}}" width="100%" height="500px" class="mx-auto" alt="">
    <h1 class="text-primary mt-3">{{$films->title}}</h1>
    <h4>{{$films->release_year}}</h4>
    <p class="my-4">{{$films->summary}}</p>
    <hr>
    <h4 class="text-info">List Review</h4>
    @forelse ($films->listReview as $item)
        <div class="card">
            <div class="card-header">
            {{$item->reviewBy->name}}
            <div>
                @for ($i=1;$i<=$item->point;$i++)
                    
                    <i class="fa fa-star"></i>
                    
                @endfor
            </div>
            </div>
            <div class="card-body">
                <p class="card-text">{{$item->content}}</p>
            </div>
        </div>
    @empty
        <h4>Belum ada Review di Film ini</h4>
    @endforelse
    
    <hr>
    <form action="/review/{{$films->id}}" method="POST">
        @csrf
        <div class="form-group">
            <select name="point" class="form-control">
                <option value="">Pilih Rating</option>
                <option value="1">1 - Sangat Buruk</option>
                <option value="2">2 - Buruk</option>
                <option value="3">3 - Cukup </option>
                <option value="4">4 - Baik</option>
                <option value="5">5 - Sangat Baik</option>
            </select>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="content" id="bio" cols="30" rows="10" placeholder="Isi Review">{{old('summary')}}</textarea>
        </div>
        <input type="submit" value="Kirim" class="btn btn-primary btn-block">
    </form>
@endsection


