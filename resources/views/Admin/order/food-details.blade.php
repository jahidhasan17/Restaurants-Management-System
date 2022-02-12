@extends('Admin.layout.app')

@section('content')
   <div class="container">

      <h1 class="heading_text">Order Food Details</h1>
      <br><br>
      
      <table class="table table-secondary table-striped table-bordered table-hover">
      <thead>
         <tr>
            <th width="25%">Food Title</th>
            <th width="20%">Food Price</th>
            <th width="20%">Quantity</th>
            <th width="25%">Subtotal</th>
         </tr>
      </thead>
      <tbody>

         @foreach ($orderDetails as $order)
            @foreach ($foodDetails as $food)
               @if ($order->food_id == $food->id)
                  <tr>
                     <td>{{ $food->title }}</td>
                     <td>{{ $food->price }}</td>
                     <td>{{ $order->qty }}</td>
                     <td>{{ $food->price * $order->qty }}</td>
                  </tr>
               @endif
            @endforeach
         @endforeach

      </tbody>
      </table>
   </div>
@endsection