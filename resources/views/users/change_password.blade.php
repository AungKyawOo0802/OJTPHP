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
        <h2 class="mb-4">Change Password </h2>
        <form action="{{url('/users/password/change')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="old_password">Old Password</label>
                <input type="password" id="old_password" name="old_password" class="form-control" >
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" id="new_password" name="new_password" class="form-control">
            </div>
            <div class="form-group">
                <label for="con_new_password">Confirm New Password</label>
                <input type="password" id="con_new_password" name="con_new_password" class="form-control">
            </div>
            <input type="submit" value="update" class="btn btn-primary">
            <input type="reset" value="Clear" id="clear" class="btn btn-danger">
            
        </form>

    </div>
@endsection
