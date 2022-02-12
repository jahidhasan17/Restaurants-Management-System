@extends('Admin.layout.app')

@section('content')

      <div class="container">
         <h1 class="heading_text">Add Category</h1>
         <br><br>
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-lg-6">

                  <form action="{{ url('admin/add-category') }}" method="POST" class="form-container" enctype="multipart/form-data">
                     @method('GET')
                     @csrf

                     <div class="form-group">
                        <label >Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Category Title..">
                     </div>

                     <div class="form-group">
                        <label >Select Image</label>
                        <input type="file" class="form-control" name="image">
                     </div>

                     <div class="form-group">
                        <br>
                        <label >Active </label>
                        <input type="radio" name="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                     </div>

                     <br>
                     <input type="submit" name="submit" value="Add Category" class="btn-primary btn-lg btn-block" style="width: 100%">
                  </form>
               </div>
            </div>
      </div>
@endsection