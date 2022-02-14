@extends('layouts.app')

@section('content')

    <section class="container mt-5">
        <h1 class="text-primary">Add a New Post</h1>

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

        <form action="{{route('admin.posts.store')}}" method="POST" class="mt-3" enctype="multipart/form-data">
        @csrf

        <label for="title">Title</label>
        <input type="text" name="title" id="title" class="form-controll d-block w-100 mb-3" value="{{old('title')}}">
        @error('title')
        <div class="div">
            <p class="text-danger">{{$message}}</p>
        </div>
        @enderror
        <label for="description">Description</label>
        <textarea type="text" name="description" id="description" class="form-controll d-block w-100 mb-3" >{{old('description')}}</textarea>
        @error('description')
        <div class="div">
            <p class="text-danger">{{$message}}</p>
        </div>
        @enderror

        <label for="category_id">Categories</label>
        <select class="form-control mb-5" name="category_id" id="category_id">
            <option value="">Uncategorized</option>
            @foreach ($categories as $category)
            <option @if ($category->id == old('category_id')) selected @endif    value="{{$category->id}}"> {{$category->name}}</option>
                
            @endforeach
        </select>

        <div class="tags">
            <h5>Tag</h5>
            @foreach ($tags as $tag)
            <span class="mr-3">
            <input name="tags[]" id="{{$tag->id}}" type="checkbox" value="{{$tag->id}}" 
            @if (in_array($tag->id, old('tags', []))) checked @endif>

            <label for="{{$tag->id}}">{{$tag->name}}</label>
             </span>
            @endforeach
            
            
        </div>
        @error('tags')
        <div class="div">
            <p class="text-danger">{{$message}}</p>
        </div>
        @enderror

        @error('category_id')
        <div class="div">
            <p class="text-danger">{{$message}}</p>
        </div>
        @enderror

        <div class="custom-file mb-3 mt-3">
            <input type="file" class="custom-file-input" id="image" name="image">
            <label class="custom-file-label" for="image">Choose file</label>
        </div>
        @error('image')
        <div class="div">
            <p class="text-danger">{{$message}}</p>
        </div>
          @enderror

        <input type="submit" class="btn btn-primary" value="Save">
        </form>
    </section>
@endsection