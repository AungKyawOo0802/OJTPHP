@extends("layouts.app")
@section("content")
<div class="container">
    @if(session('info'))
    <div class="alert alert-info">
        {{ session('info') }}
    </div>
    @endif
    <h2 class="mb-4">User Lists</h2>
    {{ Form::open(['route' => 'search/user', 'method' => 'GET'])}}
    @csrf
    <div class="form-inline mb-3">
        <input type="text" placeholder="Name" class="form-control mr-2 mb-2 col-lg-2 col-md-5" name="name">
        <input type="email" placeholder="Email" class="form-control mr-2 mb-2 col-lg-2 col-md-5" name="email">
        <input type="date" placeholder="Create From" class="form-control mb-2 mr-2 col-lg-2 col-md-5" name="createFrom">
        <input type="date" placeholder="Create To" class="form-control mr-2 mb-2 col-lg-2 col-md-5" name="createTo">
        <input type="submit" class="btn btn-primary mr-2 mb-2  col-lg-1 col-md-5" value="search">
        @if(Auth::user()->type == 0)
        <a href="/users/create" class="btn btn-primary mr-2 mb-2 col-lg-1 col-md-5">Add</a>
        @endif
    </div>
    {{ Form::close()}}
    <table class="table table-striped">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Created User</th>
            <th>Phone</th>
            <th>Date Of Bith</th>
            <th>Address</th>
            <th>Created Date</th>
            <th>Updated Date</th>
            <th class="float-right">Delete</th>
        </tr>
        @foreach($users as $user)
        @php
        $usertype = $user->type ;
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
        <tr>
            <td><a data-toggle="modal" data-target="#myModal" class="detail" data-id="{{ $user->id }}"
                    data-name="{{ $user->name }}" data-profile="{{ $user->profile }}" data-type="{{ $type }}"
                    data-email="{{ $user->email }}" data-phone="{{ $user->phone }}" data-dob="{{ $user->dob }}"
                    data-address="{{ $user->address }}">{{ $user->name }}</a>
            </td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->dob }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->created_at->format('y-m-d') }}</td>
            <td>{{ $user->updated_at->format('y-m-d') }}</td>
            <td class="float-right">
                <a data-toggle="modal" data-target="#deleteConfirm" class="delete btn btn-danger"
                    data-id="{{ $user->id }}">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
    <!-- User Detail Modal -->
    <div class="modal flade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">User Detail</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <img src="#profile" alt="" id="profile" width="100" height="100" class="mb-2">
                    <h4 class="card-title mb-2" id="name"></h4>
                    <table id="classTable" class="table table-striped">
                        <tr>
                            <td>Email</td>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td id="type"></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td id="phone"></td>
                        </tr>
                        <tr>
                            <td>Date Of Birth</td>
                            <td id="dob"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td id="address"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Confirmation Modal -->
    <div class="modal flade" id="deleteConfirm" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title center">Delete Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body text-center">
                    <form action="{{ url('users/delete')}}" method="post">
                        @csrf
                        <div class="mb-4">
                            <input type="hidden" id="id" name="id" value="">
                            <h5>Are you sure to delete?</h5>
                        </div>
                        <div class="mt-4">
                            <input type="submit" class="btn btn-primary ml-4" value="Yes"></button>
                            <button class="btn btn-danger mr-4" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $(document).on("click", ".detail", function() {
            $image = $(this).data('profile');
            $(".modal-body #userId").text($(this).data('id'));
            $(".modal-body #name").text($(this).data('name'));
            $(".modal-body #email").text($(this).data('email'));
            $(".modal-body #profile").attr("src", `/images/${$image}`);
            $(".modal-body #type").text($(this).data('type'));
            $(".modal-body #phone").text($(this).data('phone'));
            $(".modal-body #address").text($(this).data('address'));
            $(".modal-body #dob").text($(this).data('dob'));
        });
    });

    $(document).ready(function() {
        $(document).on("click", ".delete", function() {
            $(".modal-body #id").val($(this).data('id'));
        });
    });
</script>
@endsection