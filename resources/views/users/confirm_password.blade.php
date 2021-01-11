@extends("layouts.app")
@section("content")
    <div class="container">
        <h2>Change Password</h2>
        <form action="#" method="post">
            <div class="form-group">
                <label for="old-password">Old Password</label>
                <input type="password" class="form-control" id="old-password">
            </div>
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" class="form-control" id="new-password">
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm-password">
            </div>
            <input type="submit" value="Change" class="btn btn-primary">
            <input type="submit" value="Clear" class="btn btn-danger">
        </form>
    </div>
@endsection