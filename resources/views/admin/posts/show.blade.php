@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1 class="text-primary">{{$post->title}}</h1>
        <h4><span class="badge badge-primary">{{$post->category->name}}</span></h4>

        <div class="row">
            <div class="col-md-6">{{$post->description}}</div>
            <div class="col-md-6">Image Here....</div>
        </div>


        <div class="buttons mt-5">
            <a href="{{route('admin.posts.index')}}"><button class="btn btn-primary">BACK</button></a>
            <a href="{{route('admin.posts.edit', $post->id)}}"><button class="btn btn-dark">EDIT</button></a>
        </div>

    </section>
@endsection