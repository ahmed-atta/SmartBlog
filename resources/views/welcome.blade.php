@extends('layouts.app')

@section('content')   
       <!-- div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="#">World</a>
          <a class="p-2 text-muted" href="#">U.S.</a>
          <a class="p-2 text-muted" href="#">Technology</a>
          <a class="p-2 text-muted" href="#">Design</a>
          <a class="p-2 text-muted" href="#">Culture</a>
          <a class="p-2 text-muted" href="#">Business</a>
          <a class="p-2 text-muted" href="#">Politics</a>
          <a class="p-2 text-muted" href="#">Opinion</a>
          <a class="p-2 text-muted" href="#">Science</a>
          <a class="p-2 text-muted" href="#">Health</a>
          <a class="p-2 text-muted" href="#">Style</a>
          <a class="p-2 text-muted" href="#">Travel</a>
        </nav>
      </div -->

      <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-10 px-0">
          <h2 class="font-italic">{{ $posts[0]->title }}</h2>
          <p class="lead my-3">
          {!! str_limit(nl2br($posts[0]->content), 200) !!}
          </p>
          <p class="lead mb-0"><a href="{{ url('/posts') }}/{{ $posts[0]->id }}" class="text-white">Continue reading...</a></p>
        </div>
      </div>

    <div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
           Latest Posts
          </h3>

           @foreach ($posts as $post)
          <div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta"><?=date('M d, Y', strtotime($post->created_at)); ?> by 
            <a href="{{url('/')}}/{{$post->user->id}}">{{ $post->user->name }}</a></p>

            <p>{!! str_limit(nl2br($post->content), 200) !!}  </p>
            <a href="{{ url('/posts') }}/{{ $post->id }}"> Read More .... </a>
          </div><!-- /.blog-post -->
           @endforeach
          <nav class="blog-pagination">
            {{$posts->links()}}
          </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          
          <div class="p-3">
            <h4 class="font-italic">Authors ({{count($users)}})</h4>
            <ol class="list-unstyled mb-0">
            @foreach($users as $author)
              <li><a href="{{url('/')}}/{{$author->id}}">{{$author->name}}  ({{$author->posts_count}})</a></li>
            @endforeach
            </ol>
          </div>

          
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->


@endsection
