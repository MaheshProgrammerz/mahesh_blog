@extends('master')
@section('title', " | $post->title")

@section('content')
 <div class="row">
     <div class="col-md-8 col-md-offset-2">

      <h1>{{ $post->title}}</h1>
       <p>{{ $post->body }}</p>
       <p>{{ $post->category_id }}</p>
       {{-- {{ dd('testing',$post->category())}} --}}
       <p>{{ $post->category->name }}</p>
     	
     </div>

 </div>
 @endsection