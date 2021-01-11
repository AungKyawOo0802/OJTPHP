@extends("layouts.app")
@section("content")
<div class="container">
  @if($errors->any())
  <div class="alert alert-warning">
    <ol>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ol>
  </div>
  @endif
  <h2>Create post</h2>
  <form action="{{ url('posts/add/confirm') }}" method="post">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name="title" id="title" placeholder="Enter Title" class="form-control">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea name="description" id="description" placeholder="Enter Description" class="form-control">
            </textarea>
    </div>
    <button class="btn btn-success">Confirm</button>
    <button class="btn btn-danger" type="reset"><i class="fas fa-window-close"></i>Clear</button>
  </form>
</div>
@endsection