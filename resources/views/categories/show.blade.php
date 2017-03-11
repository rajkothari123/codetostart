@extends('layouts.app')

@section('content')


<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>{{$category->name}}</h1>
    </div>

    <div class="col-sm-8 col-sm-offset-1">
        
        @foreach($category->blog as $blog)
        <article>
        <a href="{{  action('BlogController@show',[$blog->slug])  }}" /> {{$blog->title}}</a>
        </article>
        @endforeach


    </div>
    </div>
</main>


<hr>
@endsection