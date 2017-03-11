@extends('layouts.app')

@section('content')
<div class="container">
  <h2>{{ $user->name}}</h2>| {{$user->username}}
  <p>Please make to your profile change</p>     


  <div class="col-sm-8 col-sm-offset-1">
  @include('partials.error_msg')

        {!! Form::model($user,['method'=>'PATCH','action'=>['UserController@update',$user->username],'files'=>'true']) !!}
        <div class="form-group">
        {!! Form::label("name","Name") !!}            
        {!! Form::text("name",null,['class'=>'form-control']) !!}            
        </div>    


        <div class="form-group">
        {!! Form::label("about","About Yourself") !!}            
        {!! Form::textarea("about",null,['class'=>'form-control']) !!}            
        </div>    

        <div class="form-group">
        {!! Form::label("website","Website") !!}            
        {!! Form::text("website",null,['class'=>'form-control']) !!}            
        </div>    

        <div class="form-group">
        {!! Form::label("facebook","Facebook") !!}            
        {!! Form::text("facebook",null,['class'=>'form-control']) !!}            
        </div>    

        <div class="form-group">
        {!! Form::label("twitter","Twitter") !!}            
        {!! Form::text("twitter",null,['class'=>'form-control']) !!}            
        </div>    


        <div class="form-group">
        {!! Form::label("github","Github") !!}            
        {!! Form::text("github",null,['class'=>'form-control']) !!}            
        </div>    


        <div class="form-group">
        {!! Form::label("photo_id","Upload Profile Pic") !!}            
        {!! Form::file("photo_id",null,['class'=>'form-control']) !!}            
        </div>    
        <div class="form-group">        
        {!! Form::submit("Update Profile",['class'=>'btn btn-primary']) !!}            
        </div>    


        {!! Form::close() !!}     

    </div>       
  
</div>
@endsection
