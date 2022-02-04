@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1 class="text-primary">{{$post->title}}</h1>

        {{-- If categories is null, set Uncategorized --}}
        <h4><span class="badge badge-primary">@if ($post->category) {{$post->category->name}} @else Uncategorized @endif</span></h4>

        <div class="row">
            <div class="col-md-6">{{$post->description}}</div>
            <div class="col-md-6">Image Here....</div>
        </div>

        <div class="tags mt-3">
            <h4>Tag</h4>
            @if (!$post->tags->isEmpty())
                @foreach ($post->tags as $tag)
                <span class="badge badge-secondary">{{$tag->name}}</span>
                @endforeach
            @else
                <span>Non ci sono tag per questo post</span>
            @endif
        </div>

        <div class="buttons mt-5">
            <a href="{{route('admin.posts.index')}}"><button class="btn btn-primary">BACK</button></a>
            <a href="{{route('admin.posts.edit', $post->id)}}"><button class="btn btn-dark">EDIT</button></a>
        </div>


    </section>
@endsection