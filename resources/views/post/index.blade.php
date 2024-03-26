@extends('layout.app')
@section('title', 'Home Page')
@section('heading', 'CRUD LARAVEL WITH IMAGE UPLOAD BY TAUFIKR')
@section('link_text', 'Add New Post')
@section('link', '/post/create')

@section('content')

@if(session('message'))
<div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
  <strong>{{ session('message') }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row g-4 mt-1">
  @forelse($posts as $key => $row)
  <div class="col-lg-4">
      <div class="card shadow bg-warning">
        <a href="post/{{ $row->id }}">
          <img src="{{ asset('storage/images/'.$row->image) }}" class="card-img-top" width="200" height="300">
        </a>
        <div class="card-body bg-dark">
          <p class="btn btn-warning rounded-pill btn-sm">{{ $row->category }}</p>
          <div class="card-title fw-bold text-light h4">{{ $row->title }}</div>
          <p class="text-secondary">{{ Str::limit($row->content, 300) }}</p>
        </div>
      </div>

  </div>
  @empty
    <h2 class="text-center text-secondary p-4">Not Found....</h2>
  @endforelse
  <div class="d-flex justify-content-center my-5">
    {{ $posts->onEachSide(1)->links() }}
  </div>

</div>

@endsection
