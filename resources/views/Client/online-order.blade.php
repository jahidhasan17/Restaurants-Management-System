<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>This is my web Site</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

	
	<div>
		
		<header>
			<nav class="navbar navbar-expand-md">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="#">
			    	<img src="images/logo.jpg" class="logo-image">
			    </a>
			    
			    <div class="collapse navbar-collapse" id="navbarNavDropdown">
			      <ul class="navbar-nav m-auto">
			        <li class="nav-item active">
			          <a class="nav-link text-center" href="index.php">Home</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="menu.php">Menu</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="table-reservation.php">Reservation</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="online-order.php">Order Online</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="#">Gallery</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="#">Contact Us</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link text-center" href="#">About Us</a>
			        </li>
			      </ul>
			    </div>
			  </div>
			</nav>
			
		</header>

		<div class="container-product">
         <div class="order-list">
            <div class="product-list">
               <h2>Order Now</h2>
               <div class="food-category">
      
                  @foreach ($categoryList as $category)
                     <div>
                        <h3 style="text-align: left">{{ $category->title }}</h3>
                     </div>
                     <div class="row text-right mb-3">
                        @foreach ($foodList as $food)
                           @if ($category->id === $food->category_id)
                              <div class="col-lg-3">
                                 <form method="POST" action="{{ url('add-cart') }}">
                                    @csrf
                                    <div class="product">
                                       <img src="{{ asset('images/food/'.$food->image_name) }}" style = "width: 100%">
                                       <h4>{{ $food->title }}</h4>
                                       <h4>{{ $food->price }}</h4>
                                       <input type="text" name="qty" class="form-control" value="1">
                                       <input type="hidden" name="id" value="{{ $food->id }}">
                                       <input type="hidden" name="title" value="{{ $food->title }}">
                                       <input type="hidden" name="price" value="{{ $food->price }}">
                                       <input type="submit" name="submit" class="btn btn-success" value="Add to Cart">
                                    </div>
                                 </form>
                              </div>
                           @endif
                        @endforeach
                     </div>
                     <br><br><br>
                  @endforeach
                  <br><br> 
               </div>
            </div>
            <div class="cart-list">
               <h1>Your Cart</h1>
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th width="30%">Product Name</th>
                           <th width="10%">Quantity</th>
                           <th width="13%">Sub Total</th>
                           <th width="17%">Remove Item</th>
                        </tr>
                     </thead>
                     <tbody>
                        @if (session('cartList'))
                           @foreach (session('cartList') as $key => $value)
                              <tr>
                                 <td width="30%">{{ $value["p_title"] }}</td>
                                 <td width="10%">{{ $value["p_qty"] }}</td>
                                 <td width="13%">{{ $value["p_price"] * $value["p_qty"] }}</td>
                                 <td width="17%">
                                    <form action="{{ url('remove-cart') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $value["p_id"] }}" name="id">
                                    <button class="px-4 py-2 text-white bg-red-600">x</button>
                                    </form>
                                 </td>
                              </tr>
                           @endforeach
                           <tr>
                              <td width="40%"></td>
                              <td width="40%">Total</td>
                              <td width="10%">{{ session('total') }}</td>
                           </tr>
                           <tr>
                              <td colspan="4">
                                 <form action="{{ url('place-order') }}" method="POST">
                                    @csrf
                                    <input type="submit" name="submit" class="btn btn-success" style="width: 100%;" value="Place Order">
                                 </form>
                              </td>
                           </tr>
                        @endif
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
	   </div>
	

	<!-- -----------------------------------------------------  -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>