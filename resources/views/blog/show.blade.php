@extends('layouts.app')

@section('content')

  <title>{{ $blog->title}}</title>
    <meta name="description" content="{{ $blog->meta_desc }}">
    <meta name="author" content="Ryan Dhungel">


<main class="container">
    <div class="container-fluid">
    <div class="jumbotron">
        <h1>{{$blog->title}}</h1>
        <p>Total View: {{ $blog->views }}</p> 
        @if(Auth::user() ? Auth::user()->role->id==1 || Auth::user()->id==$blog->user_id : '') 
        <a href="{{ action('BlogController@edit',[$blog->id])  }}">Edit</a>
        @endif
    </div>


    @if($blog->photo)
    <div class="img-responsive">
        <img alt="{{ str_limit($blog->title,50) }}" width="800" height="200" src="/images/{{ $blog->photo ? $blog->photo->photo : '' }}">

    </div>

    @endif
@foreach($blog->category as $category)

<p><a href="{{ route('categories.show',$category->slug) }}" >{{$category->name}}</a></p>

@endforeach
    <div class="col-sm-8 col-sm-offset-1">
        <article>
        {!! $blog->body !!}
        </article>
        
    </div>
    </div>
</main>

<div class="col-sm-8 col-sm-offset-2">
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://commentforcodetostart.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

</div>

<hr>
@endsection