@extends('layouts.app')

@section('content')


<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>Edit Blog</h1>
    </div>

    <div class="col-sm-8 col-sm-offset-1">

        {!! Form::model($blog,['method'=>'PATCH','action'=>['BlogController@update',$blog->id],'files'=>'true']) !!}
        <div class="form-group">
        {!! Form::label("title","Title") !!}            
        {!! Form::text("title",null,['class'=>'form-control']) !!}            
        </div>    


        <div class="form-group">
        {!! Form::label("photo_id","Featured Image") !!}            
        {!! Form::file("photo_id",null,['class'=>'form-control']) !!}            
        </div>    


        <div class="form-group">
        {!! Form::label("category_id","Categories") !!}            
        {!! Form::select("category_id[]",$category,null,['id'=>'tag_list','class'=>'form-control','multiple']) !!}            
        </div>    


        <div class="form-group">
        {!! Form::label("body","Description") !!}            
        {{Form::textarea('body',null,array('class' => 'form-control', 'placeholder'=>'Content', 'id' => 'technig'))}}
        </div>    


        <div class="form-group">        
        {!! Form::submit("Update Blog",['class'=>'btn btn-primary']) !!}            
        </div>    


        {!! Form::close() !!}     

        {!! Form::open(['method'=>'DELETE','action'=>['BlogController@destroy',$blog->id]]) !!}       

        <div class="form-group">        
        {!! Form::submit("Delete Blog",['class'=>'btn btn-danger']) !!}            
        </div>    

        {!! Form::close() !!}     
    </div>
    </div>
</main>


<hr>

<script src="http://code.jquery.com/jquery.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $("#taglist").select2();    
  
</script>
@endsection
