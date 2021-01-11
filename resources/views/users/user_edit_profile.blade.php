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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-sub-body">
                <div class="text-center">
                        <img class="rounded-circle" src="../images/{{ Auth::user()->profile }}" alt="Card image" style="width:120px; height:120px; margin-top:20px;">
                    </div>
                </div>    
                <div class="card-body">
                    <form method="post" action="{{ url('/users/update/confirm') }}" enctype="multipart/form-data">
                        @csrf
                        <input  type="hidden"  name="id" value={{ Auth::user()->id }}>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value={{ Auth::user()->name }} required autocomplete="name" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Eail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control " name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>

                            <div class="col-md-6">
                                <!-- <input id="type" type="type" class="form-control @error('type') is-invalid @enderror" name="type"  required autocomplete="email"> -->

                                    <select id="type" name="type" class="form-control" value="{{ Auth::user()->type }}">
                                        <option value="0">Admin</option>
                                        <option value="1">User</option>
                                        <option value="2">Visitor</option>
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}"  autocomplete="phone">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control" name="dob" value="{{ Auth::user()->dob }}"  autocomplete="dob">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <textarea id="address" type="text" class="form-control" name="address" value="{{ Auth::user()->address }}"  autocomplete="address">
                                    {{ Auth::user()->address }}
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">{{ __('Profile') }}</label>

                            <div class="col-md-6">
                                <input id="profile" type="file" class="form-control" name="profile" autocomplete="profile">
                                <img id="image" style="width:100px; height:100px;" class="float-right mt-2" />
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-md-4 col-form-label text-md-right">
                                    <a href="{{url('/changePassword')}}">Change Password</a>
                                </div>
                            </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Update">
                                 
                                <button type="reset" class="btn btn-danger">
                                    Clear
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
        document.getElementById("profile").onchange = function () {
        var reader = new FileReader();

        reader.onload = function (e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    };
    </script>
@endsection