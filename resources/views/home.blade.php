@extends('layouts.app')

@section('content')

 
<div class="row">
        <div class="col-md-8 blog-main">
          <h3 class="pb-3 mb-4 font-italic border-bottom">
            {{ $user->name }} Posts   
          </h3>

        @foreach($user->posts as $post)
          <div class="blog-post">
            <h2 class="blog-post-title">{{$post->title}}</h2>
            <p class="blog-post-meta"> <?=date('M d, Y', strtotime($post->created_at)); ?> by <a href="#">{{ $user->name }}</a></p>

            <p>{!! str_limit(nl2br($post->content), 200) !!}  </p>
            <a href="{{ url('/posts') }}/{{ $post->id }}"> Read More .... </a>
          </div><!-- /.blog-post -->
        @endforeach
    

          <nav class="blog-pagination">
            <!-- a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#">Newer</a -->
          </nav>

        </div><!-- /.blog-main -->

        <aside class="col-md-4 blog-sidebar">
          <div class="p-3 mb-3 bg-light rounded">
            <h4 class="font-italic">About</h4>
            <p class="mb-0">{{ $user->about }}</p>
          </div>

         
        </aside><!-- /.blog-sidebar -->

      </div><!-- /.row -->

@endsection
