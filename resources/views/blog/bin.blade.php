@extends('layouts.app')

@section('content')


<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>Trashed Blogs</h1>
    </div>

    <div class="col-sm-8 col-sm-offset-1">

        @foreach($deletedBlogs as $blog)
        <article>
        <h1><a href="{{ action('BlogController@show',[$blog->id])  }}" />{{$blog->title}}</a></h1> <br>
        {{$blog->body}}
        {!! Form::open(['method'=>'GET','action'=>['BlogController@restore',$blog->id]]) !!}       

        <div class="form-group">        
        {!! Form::submit("Restore",['class'=>'btn btn-primary']) !!}            
        </div>    

        {!! Form::close() !!}     

        {!! Form::open(['method'=>'DELETE','action'=>['BlogController@destroyBlog',$blog->id]]) !!}       

        <div class="form-group">        
        {!! Form::submit("Remove Completely",['class'=>'btn btn-danger']) !!}            
        </div>    

        {!! Form::close() !!}     
        </article>
        @endforeach


    </div>
    </div>
</main>


<hr>
@endsection