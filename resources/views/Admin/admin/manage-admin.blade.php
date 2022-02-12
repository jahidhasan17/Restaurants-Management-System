@extends('Admin.layout.app')

@section('content')

<div class="container" style="width: 90%">

   <h1 class="heading_text">Manage Admin</h1>
   <br><br>

   <a href="{{ url('admin/add-admin') }}" class="btn btn-primary btn-lg">Add Admin</a>

   <br><br><br>
   
   <table class="table table-secondary table-striped table-bordered table-hover">
      <thead>
         <tr>
            <th width="10%">#</th>
            <th width="20%">Full Name</th>
            <th width="20%">User Name</th>
            <th width="50%">Action</th>
         </tr>
      </thead>

     <tbody>
        @foreach ($adminList as $admin)
         <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $admin->full_name }}</td>
            <td>{{ $admin->username }}</td>
            <td>
               <a href="{{ url('admin/update-admin/?id='.$admin->id) }}" class="btn-primary admin_btn">Update Admin</a>
               <a href="{{ url('admin/delete-admin/?id='.$admin->id) }}" class="btn-danger admin_btn">Delete Admin</a>
            </td>
         </tr>
        @endforeach
     </tbody>
   </table>	
</div>
@endsection