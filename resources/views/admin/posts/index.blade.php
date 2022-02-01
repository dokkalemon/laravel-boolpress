@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-primary">Post Archive</h1>

        @if ($posts->isEmpty())
        <div class="alert alert-danger">Non ci sono Post da visualizzare! <a href="{{route('admin.posts.create')}}"><strong>Creane Uno</strong></a></div>
        @else

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        <a href="{{route('admin.posts.show', $post->slug)}}"><button class="btn btn-primary">SHOW</button></a>
                    </td>
                    <td>
                        <a href="{{route('admin.posts.edit', $post->id)}}"><button class="btn btn-dark">EDIT</button></a>
                    </td>
                    <td>
                        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="submit" class="btn btn-danger" value="DELETE">

                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>


            
        @endif
    </div>
@endsection