@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>
                @if($errors->any())
                <div class="alert alert-warning">
                    <ol>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ol>
                </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{url('/users/create/confirm')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="" required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" autocomplete="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm
                                Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirm" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>

                            <div class="col-md-6">
                                <!-- <input id="type" type="type" class="form-control @error('type') is-invalid @enderror" name="type"  required autocomplete="email"> -->

                                <select id="type" name="type" class="form-control">
                                    <option value="0">Admin</option>
                                    <option value="1">User</option>
                                    <option value="2">Visitor</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" autocomplete="phone">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror"
                                    name="dob" autocomplete="dob">

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    autocomplete="address"></textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">Profile</label>

                            <div class="col-md-6">
                                <input id="profile" type="file" class="form-control" name="profile" required
                                    autocomplete="profile">
                                <img id="image" style="width:100px; height:100px;" class="float-right mt-2" />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <button type="reset" class="btn btn-danger">Clear
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("profile").onchange = function() {
        var reader = new FileReader();

        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
</script>
@endsection