@extends('layouts.layout')

@section('title', 'Details for Album: ' . $album->name)

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-12">
                <h1>Details for Album: </h1>
                <a href="/" class="btn btn-secondary">Go Back</a>
                <a href="/albums/{{ $album->id }}/edit" class="btn btn-primary">Edit</a>
                <a href="/photos/create/{{$album->id}}" class="btn btn-primary" >Upload Photo to Album</a>
                <a href="/photos/{{$album->id}}" class="btn btn-primary" >Show Album Photos</a>
                <form action="/albums/{{ $album->id }}" class="" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger" type="submit">Delete</button>

                </form>

            </div>
            <div class="col-12">
                <p><strong>Name</strong> {{ $album->name }}</p>
                <p><strong>description</strong> {{ $album->description }}</p>
                <p><strong>cover_image</strong> {{ $album->cover_image }}</p>
            </div>
        </div>
    </div>

    @if($album->cover_image)
        <div class="row">
            <div class="col-12">
                <img src="/storage/{{ $album->cover_image }}" alt="" class="img-thumbnail">
            </div>
        </div>
    @endif
@endsection
