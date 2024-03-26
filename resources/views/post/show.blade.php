@extends('layout.app')
@section('title', 'Post Details')
@section('heading', 'Post Details')
@section('link_text', 'All Post')
@section('link', '/post')

@section('content')

<div class="row my-4">
  <div class="col-lg-8 mx-auto">
    <div class="card shadow bg-dark">
      <img src="{{ asset('storage/images/'.$post->image) }}" class="img-fluid card-img-top">
      <div class="card-body p-5 bg-dark">
        <div class="d-flex justify-content-between align-items-center">
          <p class="btn btn-warning rounded-pill">{{ $post->category }}</p>
          <p class="lead text-light">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>
        </div>

        <hr>
        <h3 class="fw-bold text-light">{{ $post->title }}</h3>
        <p class="text-light">{{ $post->content }}</p>
      </div>
      <div class="card-footer px-5 py-3 d-flex justify-content-end">
        <a href="/post/{{$post->id}}/edit" class="btn btn-warning rounded-pill me-2">Edit</a>
        <form action="/post/{{$post->id}}" method="POST">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger rounded-pill">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection