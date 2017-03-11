@extends('layouts.app')

@section('content')


<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>Media</h1>
    </div>

    <div class="col-sm-8 col-sm-offset-1">
<h2>Media</h2>
        @foreach($photos as $photo)        
        
        <li><img src="/images/{{ $photo->photo }}"></li>        

        {!! Form::open(['method'=>'DELETE','action'=>['PhotosController@destroy',$photo->id]]) !!}       

        <div class="form-group">        
        {!! Form::submit("Delete Image",['class'=>'btn btn-danger']) !!}            
        </div>    

        {!! Form::close() !!}     
   
        
        @endforeach


    </div>
    </div>
</main>


<hr>
@endsection