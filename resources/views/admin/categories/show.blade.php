@extends('layouts.app')

@section('content')
    <section class="container mt-5">
        <h1>{{$category->name}}</h1>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th colspan="3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->posts as $post)
                    <td>{{$post->id}}</td>                    
                    <td>{{$post->title}}</td>                    
                    <td>{{$post->category->name}}</td>
                    <td>
                        <button class="btn btn-primary">SHOW</button>
                    </td>                
                    <td>
                        <button class="btn btn-secondary">EDIT</button>
                    </td>
                @endforeach
            </tbody>
        </table>
    </section>
@endsection