@extends('layouts.app')

@section('content')


<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>Categories</h1>
    </div>

    <div class="col-sm-8 col-sm-offset-1">
<h2>Active Categories</h2>
        @foreach($categories as $category)
        @if($category->blog->count()>0)
        <article>
        <h4><a href="{{ route('categories.show',$category->slug) }}" />{{$category->name}} </a></h4> Total Blogs : {{ $category->blog->count()}} <br>
        
        </article>
        @endif
        @endforeach
<h2>All Categories</h2>
        @foreach($categories as $category)

        <article>
        <h4><a href="{{ route('categories.show',$category->slug) }}" />{{$category->name}}</a></h4> <br>
        <a href="{{ action('CategoryController@edit',[$category->id])  }}">Edit</a>
        
        </article>

        @endforeach


    </div>
    </div>
</main>


<hr>
@endsection