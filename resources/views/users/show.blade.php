@extends('layouts.app')

@section('content')
<div class="container">
  <img src="/images/{{ $user->photo ? $user->photo->photo : '' }}" class = "img-circle">
  <h2>{{ $user->name}}</h2><b>Username:</b>  {{$user->username}} 
  @if($user->facebook)
  <a href="{{ $user->facebook}}"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
  @endif
  <i class="fa fa-twitter-square" aria-hidden="true"></i> <i class="fa fa-github-square" aria-hidden="true"></i> <i class="fa fa-link" aria-hidden="true"></i>
<br>
  <b>About: </b><span>{{ $user->about }}</span> <br>
<a href="{{ route('users.edit',$user->username)  }}" class="btn btn-primary btn-lg " role="button" aria-disabled="true">Edit Profile</a>



  <table class="table table-bordered">
    <thead>    
      <tr>
        <th>Total Blogs</th>
        <th>Created</th>        
      </tr>
    </thead>
    <tbody>
    @if($user->blog->count()>0)        
      @foreach($user->blog as $blog)
        @if($blog->status==1)
          <tr>
         <td><a href="{{ action('BlogController@show',[$blog->slug])  }}"> {{$blog->title}}</a></td>
         <td> {{$blog->created_at }}</td>
         </tr>
         @else
          <tr>
        <td>No Posts Yet</td>
        <td>Nothing to show </td>
        </tr>
         @endif
      @endforeach
    @else
    <tr>
    <td>No Posts Yet</td>
    <td>Nothing to show </td>
    </tr>
    @endif

     </tbody>
  </table>
</div>
@endsection
