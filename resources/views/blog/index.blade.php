@extends('layouts.app')

@section('content')


<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>Latest Blogs : Total {{$blog_count}}</h1>
        <h4>Website Views : {{ $blog_views }}</h4>
    </div>

    <div class="col-sm-8 col-sm-offset-1">

    <div class="search">  
        {!! Form::open(['action' => 'BlogController@index', 'method' => 'GET', 'role' => 'search']) !!}
            <div class="input-group">
                {!! Form::text('term', Request::get('term'), ['class' => 'form-control', 'placeholder' => 'Search Blogs', 'id' => 'term']) !!}
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="">Search</span>
                    </button>
                </span>
            </div>
        {!! Form::close() !!}
        </div>
<!-- 
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
    {{ Session::get('flash_message')}}
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
    @endif -->

    

        @foreach($blogs as $blog)
        <article>
        <h1><a href="{{ action('BlogController@show',[$blog->slug])  }}" />{{$blog->title}}</a></h1> <br>
        {!! str_limit($blog->body,200) !!}<br><hr>

        @if($blog->user)
        <i class="fa fa-btn fa-user"></i> <a href="{{ route('users.show',$blog->user->username)  }}" > {{$blog->user->name }} </a>. <i class="fa fa-btn fa-clock-o"></i> 
        @endif


        Posted on {{ date('F d, Y', strtotime($blog->created_at)) }} i.e {{ $blog->created_at->diffForHumans() }}. <p>Total View: {{ $blog->views }}</p> 


        @if($blog->category)
        <i class="fa fa-btn fa-cubes"></i>  <strong>@foreach($blog->category as $category) <a href="{{ route('categories.show',$category->slug) }}"> {{ $category->name  }}</a>, @endforeach</strong>
        </article>
        @endif


        @endforeach

        {!! $blogs->links() !!}

    </div>
    </div>
</main>


<hr>
@endsection