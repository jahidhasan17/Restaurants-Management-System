@extends('Admin.layout.app')

@section('content')
<div class="container">

   <h1 class="heading_text">Update Reservation Status</h1>
   <br><br><br>

   <div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-lg-6">

            <form action="{{ url('admin/update-reservation') }}" method="POST" class="form-container">
               @method("GET")
               @csrf
               
               <div class="form-group">
                  <label >Status</label>
                  <select name="status">
                     <option value="Pending">Pending</option>
                     <option value="Accepted">Accepted</option>
                     <option value="Delivered">Delivered</option>
                     <option value="Cancelled">Cancelled</option>
                  </select>

                  <br><br>
                  <input type="hidden" name="id" value="{{ $id }}">
                  <input type="submit" name="submit" value="Update" class="btn-primary btn-lg btn-block" style="width: 100%">
               </div>
            </form>
            
         </div>
      </div>
   </div>
@endsection