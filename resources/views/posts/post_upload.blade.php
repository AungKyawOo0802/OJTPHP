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

  @if(session()->has('failures'))
  <div class="alert alert-warning">
    @foreach(session()->get('failures') as $failure)
    @foreach($failure->errors() as $error)
    <li>{{ $error }}</li>
    @endforeach
    @endforeach
  </div>

  @endif
  <h4 class="mb-4">Upload CSV File</h4>
  <form action="{{url('/posts/upload/excel')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="file">Upload file choose</label>
      <input type="file" id="file" name="file" class="form-control">
    </div>
    <input type="submit" class="btn btn-primary col-lg-2 col-md-6 mr-2 mb-2 mt-2" value="Import File">
  </form>
</div>
@endsection