@php
$usertype = Auth::user()->type;
switch($usertype){
case 0:
$type = "Admin";
break;
case 1:
$type = "User";
break;
case 2:
$type = "Visitor";
break;
}
@endphp
@extends("layouts.app")
@section("content")
<div class="contaier">
    @if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <div class="row">
                        <div class="col-md-4">User Profile</div>
                        <div class="col-md-4"><a href="{{url('/users/edit')}}" class="btn btn-primary">Edit</a></div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4 ">
                            <img src="/images/{{Auth::user()->profile}}" alt="profile" width="150px" height="150px"
                                class="rounded-circle">

                        </div>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4 pl-12">Name</div>
                        <div class="col-md-4">{{ Auth::user()->name}}</div>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4">Email</div>
                        <div class="col-md-4">{{ Auth::user()->email}}</div>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4">Type</div>
                        <div class="col-md-4">{{ $type }}</div>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4">Phone</div>
                        <div class="col-md-4">{{ Auth::user()->phone}}</div>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4">Date of Birth</div>
                        <div class="col-md-4">{{ Auth::user()->dob}}</div>
                    </div>
                    <div class="row justify-content-center mb-4">
                        <div class="col-md-4">Address</div>
                        <div class="col-md-4">{{ Auth::user()->address}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection