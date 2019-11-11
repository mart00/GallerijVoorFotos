@extends('layouts.layout')

@section('content')
    <h1>{{ $photo->title }}</h1>
    <a class="btn btn-secondary" href="/albums/{{ $photo->album_id }}">Go Back To Gallery</a>
    <a href="/albums/{{ $photo->album_id }}/edit" class="btn btn-primary">Edit</a>
    <a href="/photos/create/{{$photo->album_id}}" class="btn btn-primary" >Upload Photo to Album</a>
    <hr>
    <div class="row">
        <img src="/{{ $photo->photo }}/"  class="mx-auto">

    </div>
    <div class="row mt-3">
        <form method="POST" action="/photos/{{ $photo->id }}">
            @method('DELETE')
            @csrf
            <input type="submit" class="btn btn-danger" value="Delete Photo">
        </form>
    </div>
@endsection
