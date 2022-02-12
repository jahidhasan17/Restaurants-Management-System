@extends('Admin.layout.app')

@section('content')
   <div class="">

      <h1 class="heading_text">Manage Order</h1>
      <br><br>
      
      <table class="table table-secondary table-striped table-bordered table-hover">
      <thead>
         <tr>
            <th width="4%">#</th>
            <th width="8%">Food Details</th>
            <th width="10%">Customer Name</th>
            <th width="10%">Contact</th>
            <th width="15%">Email</th>
            <th width="20%">Address</th>
            <th width="10%">Status</th>
            <th width="20%">Action</th>
         </tr>
      </thead>
      <tbody>

         @foreach ($orderList as $orderItem)
            @foreach ($customerList as $customerItem)
               @if ($orderItem->customer_id === $customerItem->id)
                  <tr>
                     <td>{{ $loop->index + 1 }}</td>
                     <td>
                        <a href="{{ url('admin/food-details?id='.$orderItem->id) }}" class="btn-primary admin_btn">Food Details</a>
                     </td>                     
                     <td>{{ $customerItem->full_name }}</td>
                     <td>{{ $customerItem->contact }}</td>
                     <td>{{ $customerItem->email }}</td>
                     <td>{{ $customerItem->location }}</td>
                     <td>{{ $orderItem->order_status }}</td>
                     <td>
                        <a href="{{ url('admin/update-order?id='.$orderItem->id) }}" class="btn-primary admin_btn">Update Order</a>
                     </td>
                  </tr>
               @endif
            @endforeach
         @endforeach
      </tbody>
      </table>		
   </div>
@endsection