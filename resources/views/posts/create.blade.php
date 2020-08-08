@extends('layouts.app')

@section('content')
    <h1>CREATE POST</h1><br>
    {{-- using the 'laravelcollective' 
    {!! Form::open(['url' => 'foo/bar']) !!} --}}
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST' ]) !!}
    
    {{-- still using bootstrap -_-" --}}
    <div class="form-group">
        {{-- syntax 
            {{Form::label('<name>', '<Tulisan yg keluar di view browser>')}} 
            {{Form::text('<name>','<value>',[attribute inside array, eg: 'class' => 'form-control', 'placeholder' => 'Title'])}}
            {{Form::submit('<value>', ['class' => 'btn btn-info btn-lg'])}}
        --}}
        {{Form::label('title', 'Title')}} 
        {{Form::text('title','',['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('body', 'Body')}} 
        {{Form::textArea('body','', ['id' => 'texteditor1', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
    </div>

    {{Form::submit('Submit', ['class' => 'btn btn-info btn-lg'])}}

    {!! Form::close() !!} 
    {{-- use !! to parse HTML (so it will show the text, not the source code)  --}}

    
@endsection