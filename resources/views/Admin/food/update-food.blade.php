@extends('Admin.layout.app')

@section('content')
<div class="container">
			
   <div class="container-fluid">
      <div class="row justify-content-center">
         <div class="col-lg-6">

            <form action="{{ url('admin/update-food') }}" method="POST" class="form-container" enctype="multipart/form-data">
               @method("GET")
               @csrf

               <div class="form-group">
                  <label >Title</label>
                  <input type="text" class="form-control" name="title" value="{{ $foodItem->title }}">
               </div>

               <div class="form-group">
                  <label >Price</label>
                  <input type="number" class="form-control" name="price" value="{{ $foodItem->price }}">
               </div>

               <div class="form-group">
                     <label >Current Image</label>
                     <img src="{{ asset('images/food/'.$foodItem->image_name) }}" style = "width: 150px">
               </div>

               <div class="form-group">
                     <label >New Image</label>
                     <input type="file" class="form-control" name="image_name">
               </div>

               <div  class="form-group">
                  <label >Category</label>
                  <select name="category">
                        @foreach ($categoryList as $category)
                           <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                     </select>
               </div>

               <div class="form-group">
                  <br>
                  <label >Active </label>
                  <input {{ $foodItem->active == "Yes" ? "checked" : "" }} type="radio" name="active" value="Yes">Yes
                  <input {{ $foodItem->active == "No" ? "checked" : "" }} type="radio" name="active" value="No">No
               </div>

               <br>
               <input type="hidden" name="current_image" value="{{ $foodItem->image_name }}">
               <input type="hidden" name="id" value="{{ $foodItem->id }}">
               <input type="submit" name="submit" value="Update" class="btn-primary btn-lg btn-block" style="width: 100%">

            </form>
         </div>
      </div>
</div>
@endsection