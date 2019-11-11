@extends('layouts.layout')

@section('title','Edit details for'. $album->name)
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Edit details for {{$album->name}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <form action="/albums/{{$album->id}}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @include('albums.editform')

                <button type="submit" class="btn btn-primary">Save Customer</button>
            </form>
        </div>
    </div>
@endsection
