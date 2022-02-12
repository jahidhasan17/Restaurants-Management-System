@extends('Admin.layout.app')

@section('content')

   <div class="container">
            
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-lg-6">

               <form action="{{ url('admin/update-category') }}" method="POST" class="form-container" enctype="multipart/form-data">
                  @method("GET")
                  @csrf
                  
                  <div class="form-group">
                     <label >Title</label>
                     <input type="text" class="form-control" name="title" value="{{ $categoryItem->title }}">
                  </div>

                  <div class="form-group">
                     <label >Current Image</label>
                     <img src="{{ asset('images/category/'.$categoryItem->image_name) }}" style = "width: 150px">
                  </div>

                  <div class="form-group">
                     <label >New Image</label>
                     <input type="file" class="form-control" name="image">
                  </div>

                  <div class="form-group">
                     <br>
                     <label >Active </label>
                     <input {{ $categoryItem->active == "Yes" ? "checked" : "" }} type="radio" name="active" value="Yes">Yes
                     <input {{ $categoryItem->active == "No" ? "checked" : "" }} type="radio" name="active" value="No">No
                  </div>

                  <br>
                  <input type="hidden" name="current_image" value="{{ $categoryItem->image_name }}">
                  <input type="hidden" name="id" value="{{ $categoryItem->id }}">
                  <input type="submit" name="submit" value="Update" class="btn-primary btn-lg btn-block" style="width: 100%">

               </form>
            </div>
         </div>

   </div>

@endsection