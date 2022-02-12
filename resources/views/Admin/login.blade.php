@extends('Admin.layout.app')

@section('content')
   <div class="add-admin-bg1">
      <div class="container">
         <br>
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-lg-6">
                  <form action="{{ url('admin/login') }}" method="POST" class="form-container">
                     @method('GET')
                     @csrf
                     <h3 class="heading_text">Login</h3>
                     <br>

                     <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email..">
                     </div>

                     <br>
                     <div class="form-group">
                        <label >Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Password..">
                     </div>

                     <br>
                     <input type="submit" name="submit" value="Login" class="btn-primary btn-lg btn-block" style="width: 100%">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection