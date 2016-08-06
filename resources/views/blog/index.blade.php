@extends('master')
    @section('title' ,'|HomePage')
    @section('content')

      <div class="row">
        <div class="col-md-8 col-md-offset-2">
        @foreach($posts as $post)
          <div class="post">
            <h3>{{$post->title}}</h3>
            <h4>Published Date:{{ date('M j, Y', strtotime($post->created_at)) }}</h4>

            <p>{{ substr($post->body, 0 , 100) }} {{ strlen($post->body)>100 ? "......":"" }}</p>
            <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
          </div>

          <hr>
        @endforeach
   </div>
        <div class="row">
           <div class="col-md-12">
            <div class="text-center">
              {{ $posts->links() }}
            </div>
        </div>
      </div>

      @endsection

