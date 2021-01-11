@extends("layouts.app")
@section("content")
<div class="container mb-3">
  <h3 class="mb-3">Create Post Confirmation</h3>
  <form action="{{ url('/posts/add/confirm/insert') }}" method="post">
    @csrf
    <div class="form-row  mb-3 mt-5">
      <div class="col-3">
        <label for="title">Title</label>
      </div>
      <div class="col">
        <input type="hidden" name="title" value="{{ $post->title }}" class="form-control" />
        <label for="title">{{ $post->title }}</label>
      </div>
    </div>
    <div class="form-row mb-5">
      <div class="col-3">
        <label for="description">Description</label>
      </div>
      <div class="col">
        <input type="hidden" name="description" value="{{ $post->description }}" class="form-control" />
        <label for="description">{{ $post->description }}</label>
      </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Create">
    <a href="javascript:history.back();" class="btn btn-danger ml-4">Cancel</a>
  </form>
</div>
@endsection