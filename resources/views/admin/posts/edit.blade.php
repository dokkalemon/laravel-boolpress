@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1 class="text-primary">Edit {{$post->title}}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong class="text-danger">There is some error in input</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="text-danger">{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('admin.posts.update', $post->id)}}" method="POST" class="mt-3">
        @csrf
        @method('PATCH')

        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-controll d-block w-100 mb-3" value="{{old('title', $post->title)}}">
        @error('title')
        <div class="div">
            <p class="text-danger">{{$message}}</p>
        </div>
        @enderror
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" class="form-controll d-block w-100 mb-3" >{{old('description', $post->description)}}</textarea>
        @error('description')
        <div class="div">
            <p class="text-danger">{{$message}}</p>
        </div>
        @enderror
        

        <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </section>
@endsection