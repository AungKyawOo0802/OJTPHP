@extends("layouts.app")
@section("content")
<div class="container">
	<h2 class="mb-4">Update Post </h2>
	<form action="{{url('/posts/update/confirm')}}" method="post">
		@csrf
		<input type="hidden" id="title" class="form-control mt-2" value="{{ $post->id }}" name="id">
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" id="title" class="form-control mt-2" value="{{ $post->title }}" name="title">
		</div>
		<div class="form-group">
			<label for="description"></label>
			<textarea type="text" id="description" class="form-control mt-2" name="description">
                    {{ $post->description }}
      </textarea>
		</div>
		<div class="form-group">
			<div class="custom-control custom-switch">
				@if( $post->status == 1)
				<input type="checkbox" class="custom-control-input mt-2" id="status" name="status"
					value="{{$post->status}}" checked />
				@elseif ($post->status == 0)
				<input type="checkbox" class="custom-control-input mt-2" id="status" name="status"
					value="{{$post->status}}" />
				@endif
				<label class="custom-control-label" for="status">Status </label>
			</div>
		</div>
		<input type="submit" value="update" class="btn btn-primary mt-2 mr-2" id="submit">
		<input type="reset" value="Clear" id="clear" name="status" class="btn btn-danger mt-2">
	</form>

</div>
@endsection