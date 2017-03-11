@extends('layouts.app')

@section('content')

@include('partials.tiny')




<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>Create Blog</h1>
    </div>

    <div class="col-sm-8 col-sm-offset-1">

        {!! Form::open(['method'=>'POST','action'=>'HomeController@send_email','files'=>'true']) !!}
        @include('partials.error_msg')
        <div class="form-group">
        {!! Form::label("title","Title") !!}            
        {!! Form::text("title",null,['class'=>'form-control']) !!}            
        </div>    



        <div class="form-group">        
        {!! Form::submit("Saved As Draft",['class'=>'btn btn-primary']) !!}            
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






