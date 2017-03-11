@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Users</h2>
  <p>The .table-bordered class adds borders to a table:</p>            
  <table class="table table-bordered">
    <thead>

    
      <tr>
        <th>Profile Pic </th>
        <th>Name</th>
        <th>Email</th>
        <th>Joined</th>
        <th>Current Role</th>
        <th>Change Roles</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
      <tr>
        <td><img width="100" height="100" src="/images/{{ $user->photo ? $user->photo->photo : '' }}" ></td>
        <td><a href="{{ route('users.show',$user->username)  }}"> {{ $user->name }}</a></td>
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

        <td>
          

                  {!! Form::open(['method'=>'DELETE','action'=>['UserController@destroy',$user->id]]) !!}       

        <div class="form-group">        
        {!! Form::submit("Delete User",['class'=>'btn btn-danger']) !!}            
        </div>    

        {!! Form::close() !!}     

        </td>

        </td>
      </tr>   
    @endforeach     
    </tbody>
  </table>
</div>
@endsection
