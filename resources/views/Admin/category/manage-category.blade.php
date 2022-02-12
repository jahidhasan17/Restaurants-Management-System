@extends('Admin.layout.app')

@section('content')
   <div class="container" style="width: 90%">

      <h1 class="heading_text">Manage Category</h1>
      <br><br>
      
      <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-lg">Add Category</a>

      <br><br><br>
      
      <table class="table table-secondary table-striped table-bordered table-hover">
         <thead>
            <tr>
               <th width="10%">#</th>
               <th width="15%">Title</th>
               <th width="35%">Image</th>
               <th width="10%">Active</th>
               <th width="30%">Action</th>
            </tr>
         </thead>

         <tbody>

            @foreach ($categoryList as $category)
               <tr>
                  <td>{{ $loop->index + 1 }}</td>
                  <td>{{ $category->title }}</td>
                  <td>
                     <img src="{{ asset('images/category/'.$category->image_name) }}" style = "width: 150px">
                  </td>

                  <td>{{ $category->active }}</td>
                  <td>
                     <a href="{{ url('admin/update-category?id='.$category->id) }}" class="btn-primary admin_btn">Update Category</a>
                     <a href="{{ url('admin/delete-category?id='.$category->id) }}" class="btn-danger admin_btn">Delete Category</a>
                  </td>
               </tr>    
            @endforeach

         </tbody>
      </table>
   </div>
@endsection