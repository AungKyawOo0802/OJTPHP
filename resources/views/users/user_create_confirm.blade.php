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
   @extends("layouts.app")
   @section("content")
   <div class="container">
       <div class="row ">
           <div class="col">
               <h3>Create User Confirmation</h3>
           </div>
           <div class="col">
               <img src="/images/{{ $profile}}" alt="profile" style="width:100px; height:100px">
           </div>
       </div>
       <div class="col-6">
           <form action="{{ url('/users/create/confirm/insert') }}" method="post">
               @csrf
               <div class="form-row">
                   <input type="hidden" name="id" value="{{ $user->id }}">
                   <input type="hidden" name="profile" value="{{ $profile }}">
                   <div class="col-3">
                       <label for="name">Name</label>
                       <input type="hidden" name="name" value="{{ $user->name }}">
                   </div>
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label name="name" value="User 1">{{ $user->name }}</label>
                   </div>
               </div>
               <div class="form-row">
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label for="password">Password</label>
                       <input type="hidden" name="password" value="{{ $user->password }}">
                   </div>
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label name="password" value="password" type="password" onfocus="this.type='password'"
                           style="-webkit-text-security: disc;">{{ $user->password }}
                       </label>
                   </div>
               </div>
               <div class="form-row">
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label for="email">Email</label>
                       <input type="hidden" name="email" value="{{ $user->email }}">
                   </div>
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label name="email" value="email">{{ $user->email}}</label>
                   </div>
               </div>
               <div class="form-row">
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label for="type">Type</label>
                       <input type="hidden" name="type" value="{{ $user->type }}">
                   </div>
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label name="type" value="type">{{ $type }}</label>
                   </div>
               </div>
               <div class="form-row">
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label for="name">Phone</label>
                       <input type="hidden" name="phone" value="{{ $user->phone }}">
                   </div>
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label name="phone" value="phone">{{ $user->phone }}</label>
                   </div>
               </div>
               <div class="form-row">
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label for="dob">Date Of Birth</label>
                       <input type="hidden" name="dob" value="{{ $user->dob }}">
                   </div>
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label name="dob" value="dob">{{ $user->dob }}</label>
                   </div>
               </div>
               <div class="form-row">
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label for="address">Address</label>
                       <input type="hidden" name="address" value="{{ $user->address }}">
                   </div>
                   <div class="col-md-6 col-lg-4 col-xl-3">
                       <label name="address" value="address">{{ $user->address }}</label>
                   </div>
               </div>
               <input type="submit" class="btn btn-primary mr-2 mt-4" value="Create">
               <a href="javascript:history.back();" class="btn btn-danger mt-4">Cancel</a>
           </form>
       </div>
   </div>
   @endsection