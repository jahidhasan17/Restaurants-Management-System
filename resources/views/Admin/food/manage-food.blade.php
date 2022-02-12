@extends('Admin.layout.app')

@section('content')

   <div class="container" style="width: 90%">

      <h1 class="heading_text">Manage Category</h1>
      <br><br>

      <br>
      <a href="{{ url('admin/add-food') }}" class="btn btn-primary btn-lg">Add Food</a>

      <br><br><br>
      
      <table class="table table-secondary table-striped table-bordered table-hover">
         <thead>
            <tr>
               <th width="10%">#</th>
               <th width="15%">Title</th>
               <th width="10%">Price</th>
               <th width="25%">Image</th>
               <th width="10%">Active</th>
               <th width="30%">Action</th>
            </tr>
         </thead>
         <tbody>

            @foreach ($foodItems as $foodItem)
               <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $foodItem->title }}</td>
                  <td>${{ $foodItem->price }}</td>
                  <td>
                     <img src="{{ asset('images/food/'.$foodItem->image_name) }}" style = "width: 150px">
                  </td>
                  <td>{{ $foodItem->active }}</td>
                  <td>
                     <a href="{{ url('admin/update-food?id='.$foodItem->id) }}" class="btn-primary admin_btn">Update Category</a>
                     <a href="{{ url('admin/delete-food?id='.$foodItem->id) }}" class="btn-danger admin_btn">Delete Category</a>
                  </td>
               </tr>
            @endforeach
         </tbody>
      </table>		
   </div>

@endsection