@extends('Admin.layout.app')

@section('content')
   <div class="container">

      <h1 class="heading_text">Update Order Status</h1>
      <br><br><br>

      <div class="container-fluid">
         <div class="row justify-content-center">
            <div class="col-lg-6">

               <form action="{{ url('admin/update-order') }}" method="POST" class="form-container">
                  @method("GET")
                  @csrf

                  <div class="form-group">
                     <label >Status</label>
                     <select name="status">
                        <option {{ $order->order_status == "Ordered" ? "selected" : "" }} value="Ordered">Ordered</option>
                        <option  {{ $order->order_status == "On Delevery" ? "selected" : "" }} value="On Delevery">On Delevery</option>
                        <option  {{ $order->order_status == "Delivered" ? "selected" : "" }}  value="Delivered">Delivered</option>
                        <option  {{ $order->order_status == "Cancelled" ? "selected" : "" }}  value="Cancelled">Cancelled</option>
                     </select>

                     <br><br>
                     <input type="hidden" name="id" value="{{ $order->id }}">
                     <input type="hidden" name="customer_id" value="{{ $order->customer_id }}">
                     <input type="hidden" name="total_amount" value="{{ $order->total_amount }}">

                     <input type="submit" name="submit" value="Update" class="btn-primary btn-lg btn-block" style="width: 100%">
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection