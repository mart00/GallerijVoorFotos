@extends('layouts.layout')

@section('title','Photo Gallery')
@section('content')
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <h3>Albums</h3>
    <div class="row">
        @foreach($albums as $album)
            <div class="card mr-2" style="width: 18rem;">
                <img class="card-img-top" src="/storage/{{ $album->cover_image }}" >
                <div class="card-body">
                    <p class="card-title text-center"><a href="/albums/{{ $album->id }}">{{ $album->description }}</a></p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
