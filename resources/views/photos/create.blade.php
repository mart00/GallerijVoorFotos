@extends('layouts.layout')
@section('title','Add Photo to album')
@section('content')
    <h3>Add Photo to album</h3>
    <form action="/photos/store" method="POST" enctype="multipart/form-data">
        @include('photos.form')


        <button type="submit" class="btn btn-primary">Add Photo to album</button>

    </form>
@endsection
