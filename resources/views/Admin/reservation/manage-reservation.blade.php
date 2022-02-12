@extends('Admin.layout.app')

@section('content')
   <div class="container">

      <h1 class="heading_text">Manage Reservation</h1>
      <br><br>
      
      <table class="table table-secondary table-striped table-bordered table-hover">
      <thead>
         <tr>
            <th width="5%">#</th>
            <th width="20%">Email</th>
            <th width="15%">Phone</th>
            <th width="10%">Date</th>
            <th width="10%">Time</th>
            <th width="10%">Guest No</th>
            <th width="20%">Suggesions</th>
            <th width="10">Status</th>
            <th width="10%">Action</th>
         </tr>
      </thead>
      <tbody>

         @foreach ($reservationList as $reservation)
             @foreach ($customerList as $customer)
                 @if ($reservation->customer_id === $customer->id)
                  <tr>
                     <td>{{ $loop->index + 1 }}</td>
                     <td>{{ $customer->email }}</td>
                     <td>{{ $customer->contact }}</td>
                     <td>{{ $reservation->re_date }}</td>
                     <td>{{ $reservation->re_time }}</td>
                     <td>{{ $reservation->guest }}</td>
                     <td>{{ $reservation->suggestions }}</td>
                     <td>{{ $reservation->status }}</td>
                     <td>
                        <a href="{{ url('admin/update-reservation?id='. $reservation->id) }}" class="btn-primary admin_btn">Update</a>
                     </td>
                  </tr> 
                 @endif
             @endforeach
         @endforeach

      </tbody>
      </table>		



   </div>
@endsection