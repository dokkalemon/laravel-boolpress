@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1 class="text-primary">Add a New Post</h1>

        <form action="{{route('admin.posts.store')}}" method="POST" class="mt-3">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-controll d-block w-100 mb-3">
        
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" class="form-controll d-block w-100 mb-3"></textarea>

        <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </section>
@endsection