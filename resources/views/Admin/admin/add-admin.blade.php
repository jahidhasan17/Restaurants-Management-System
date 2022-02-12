@extends('Admin.layout.app')

@section('content')
   <div class="container"> 
      <h1 class="heading_text">Add Admin</h1>
      <br><br>
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-lg-6">

               <form action="{{ url('admin/add-admin') }}" method="POST" class="form-container">
               @method('GET')
               @csrf

               <div class="form-group">
                  <label>Full Name</label>
                  <input type="text" class="form-control" name="full_name" placeholder="Enter Your User Name..">
               </div>

               <br>
               <div class="form-group">
                  <label>Contact Number</label>
                  <input type="tel" class="form-control" name="contact" placeholder="Enter Your Contact Number..">
               </div>

               <br>
               <div class="form-group">
                  <label>Location</label>
                  <input type="text" class="form-control" name="location" placeholder="Enter Your Location..">
               </div>

               <br>
               <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" name="email" placeholder="Enter Your Email..">
               </div>

               <br>
               <div class="form-group">
                  <label>User Name</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter Your User Name..">
               </div>

               <br>
               <div class="form-group">
                  <label >Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Enter Your Password..">
               </div>
               <br>
               <input type="submit" name="submit" value="Add Admin" class="btn-primary btn-lg btn-block" style="width: 100%">

               </form>
            </div>
         </div>
      </div>
   </div>
@endsection