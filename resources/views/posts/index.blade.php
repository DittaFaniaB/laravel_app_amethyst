@extends('layouts.app')

@section('content')
    <h1>POSTS</h1><br>

        
    @if (count($posts) > 0)
        @foreach ($posts as $post)
        <ul class="list-group">
            <a href="/posts/{{$post->id}}" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h3 class="mb-0">{{$post->title}}</h3>
                  {{-- <small class="text-muted">3 days ago</small> --}}
                </div>
                {{-- <p class="mb-1">post's short text</p> --}}
                <hr>
                <small class="text-muted">
                    Written on {{$post->created_at}} by {{$post->user->name}}
                </small>
            </a>
        </ul>
        @endforeach
        {{$posts->links()}}
    @else
        <h2>NO POST FOUND</h2>
    @endif
@endsection