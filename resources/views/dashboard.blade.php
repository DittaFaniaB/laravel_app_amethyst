@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        {{-- <div class="text-right">
                            {{ __('You are logged in!') }}
                        <br>
                        </div> --}}
                    <a href="/posts/create" class="btn btn-info">Create Your Post</a>

                    <br><br><br>
                    
                            {{-- ADDING THE POSTS WE'VE MADE --}}
                    @if (count($posts)>0)
                    <h3>Your Blog Posts</h3>
                        <table class="table table-striped">
                            <tr>
                                <th>Table</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td >
                                       
                                    </td>
                                    <td>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'text-right ' ])!!}
                                            <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    @else
                        <h3>You Have No Post</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
