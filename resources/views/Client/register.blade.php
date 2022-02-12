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
	<div class="add-admin-bg1">
		<div class="container">
         <div class="container-fluid">
            <div class="row justify-content-center">
               <div class="col-lg-6">
                  <form action="{{ url('register') }}" method="POST" class="form-container">
                     @method('GET')
                     @csrf
                     <h1 class="heading_text">Register</h1>
                     <br>

                     <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Enter Your User Name..">
                     </div>

                     <br>
                     <div class="form-group">
                        <label>Contact Number</label>
                        <input type="tel" class="form-control" name="contact" placeholder="Enter Your Contact Number..">
                     </div>

                     <br>
                     <div class="form-group">
                        <label>Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Enter Your Location..">
                     </div>

                     <br>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Enter Your Email..">
                     </div>

                     <br>
                     <div class="form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" name="username" placeholder="Enter Your User Name..">
                     </div>

                     <br>
                     <div class="form-group">
                        <label >Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Your Password..">
                     </div>
                     <br>
                     <input type="submit" name="submit" value="Login" class="btn-primary btn-lg btn-block" style="width: 100%">
                  </form>
               </div>
            </div>
         </div>
	</div>

		<footer>
		</footer>
	</div>
	
	<!-- -----------------------------------------------------  -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>