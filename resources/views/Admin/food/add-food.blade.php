@extends('Admin.layout.app')


@section('content')
		
   <div class="container">      
      <h1 class="heading_text">Add Food</h1>
      <br><br>
      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-lg-6">

               <form action="{{ url('admin/add-food') }}" method="POST" class="form-container" enctype="multipart/form-data">
                  @method("GET")
                  @csrf

                  <div class="form-group">
                     <label >Title</label>
                     <input type="text" class="form-control" name="title" placeholder="Food Title..">
                  </div>

                  <div class="form-group">
                     <label >Price</label>
                     <input type="number" class="form-control" name="price">
                  </div>

                  <br>
                  <div class="form-group">
                     <label >Select Image</label>
                     <input type="file" class="form-control" name="image_name">
                  </div>

                  <br>
                  <div class="form-group">
                     <label >Category:</label>
                     <select name="category">
                        @foreach ($categoryList as $category)
                           <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                     </select>
                  </div>

                  <div class="form-group">
                     <br>
                     <label >Active </label>
                     <input type="radio" name="active" value="Yes">Yes
                     <input type="radio" name="active" value="No">No
                  </div>

                  <br>
                  <input type="submit" name="submit" value="Add Food" class="btn-primary btn-lg btn-block" style="width: 100%">
               </form>
            </div>
         </div>
      </div>
   </div>

@endsection