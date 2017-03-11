@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Hi {{ Auth::user()->name }}</h2>
  <p>{{ Auth::user()->about }}</p>            


    @if($user=Auth::user())
      @if($user->blog)
        
  <table class="table table-bordered">
    <thead>    
      <tr>
        <th>Total Blogs</th>
        <th>Created</th>        
      </tr>
    </thead>
    @foreach($user->blog as $blog)
    <tbody>
          <tr>
         <td> {{$blog->title}}</td>
         <td> {{$blog->created_at }}</td>
         </tr>
        @endforeach
      @endif
    @endif

    <!--  @foreach($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ date('F d, Y', strtotime($user->created_at)) }}</td>
        <td>{{ $user->role->name }}</td>
        <td>
            {!! Form::model($user,['method'=>'PATCH','action'=>['UserController@update',$user->id],'files'=>'true']) !!}
        <div class="form-group">
             
        {!! Form::select("role_id",['1'=>'Administrator','2'=>'Author','3'=>'Subscriber'],null,['class'=>'form-control']) !!}            
        </div>    



        <div class="form-group">        
        {!! Form::submit("Update Role",['class'=>'btn btn-primary']) !!}            
        </div>    


        {!! Form::close() !!}     


        </td>
      </tr>   
    @endforeach     
     --> </tbody>
  </table>
</div>
@endsection
