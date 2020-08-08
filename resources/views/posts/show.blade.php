@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-info mb-3">Go Back</a><br>
    <div class="card">
        <div class="card-body">
            <h1>{{$post->title}}</h1>
            <small>Written on {{$post->created_at}}</small>
            <hr>           
            <div class="mt-3">
                <h5 class="card-title">Author : {{$post->user->name}}</h5>
                {{-- {{$post->body}} 
                    if we use ckeditor, it will show the source code
                    use !! to parse HTML (so it will show the text, not the source code)  
                --}}
                {!!$post->body!!}
            </div>
            <hr>
            @if (!Auth::guest() && (Auth::user()->id == $post->user_id))
                
            
            {{-- button to delete the post syntax : --}}
            
            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right' ])!!}
                <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger '])}}
            {!!Form::close()!!}
            @endif
        </div>
    </div>
   
@endsection