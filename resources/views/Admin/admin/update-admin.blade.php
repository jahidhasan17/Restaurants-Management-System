@extends('Admin.layout.app')

@section('content')

   <div class="container">
            
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-lg-6">

               <form action="{{ url('admin/update-admin') }}" method="POST" class="form-container">
                  @method("GET")
                  @csrf
                  
                  <div class="form-group">
                     <label>Full Name</label>
                     <input type="text" class="form-control" name="full_name" value="{{ $adminItem->full_name }}">
                  </div>
                  

                  <br>
                  <div class="form-group">
                     <label>Contact Number</label>
                     <input type="tel" class="form-control" name="contact" value="{{ $adminItem->contact }}">
                  </div>

                  <br>
                  <div class="form-group">
                     <label>Location</label>
                     <input type="text" class="form-control" name="location" value="{{ $adminItem->location }}">
                  </div>

                  <br>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" class="form-control" name="email" value="{{ $adminItem->email }}">
                  </div>

                  <br>
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" class="form-control" name="username" value="{{ $adminItem->username }}">
                  </div>

               <div class="form-group">
                  <label >Current Password</label>
                  <input type="password" class="form-control" name="current_password" value="{{ $adminItem->password }}">
               </div>

               <div class="form-group">
                  <label >New Password</label>
                  <input type="password" class="form-control" name="new_password" placeholder="Enter New Password..">
               </div>

               <div class="form-group">
                  <label >Confirm Password</label>
                  <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password..">
               </div>

               <br>
               <input type="hidden" name="id" value="{{ $adminItem->id }}">
               <input type="submit" name="submit" value="Update" class="btn-primary btn-lg btn-block" style="width: 100%">

               </form>
            </div>
         </div>

   </div>

@endsection