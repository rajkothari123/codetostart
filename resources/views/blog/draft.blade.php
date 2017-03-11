@extends('layouts.app')

@section('content')


<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>Draft Blogs </h1>
    </div>

    <div class="col-sm-8 col-sm-offset-1">

        @foreach($blogs as $blog)
        <article>
        <h1><a href="#" />{{$blog->title}}</a></h1> <br>
        {{$blog->body}}

        {!! Form::model($blog,['method'=>'PATCH','action'=>['BlogController@publish',$blog->id],'files'=>'true']) !!}
        <div class="form-group">        
        {!! Form::submit("Publish",['class'=>'btn btn-primary']) !!}            
        </div>    


        {!! Form::close() !!}     

        </article>

        @endforeach


    </div>
    </div>
</main>


<hr>
@endsection