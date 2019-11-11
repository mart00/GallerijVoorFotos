@extends('layouts.layout')

@section('content')
    <h3>Create Album</h3>
    <form action="/albums/store" method="POST" enctype="multipart/form-data">
        @include('albums.form')

        <button type="submit" class="btn btn-primary">Add Album</button>

    </form>
@endsection
