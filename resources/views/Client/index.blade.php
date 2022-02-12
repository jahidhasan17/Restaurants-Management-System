<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Restaurant Management System</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>


<body>
	<div>	
		<header class="header-1">
			<nav class="navbar navbar-expand-md">
			   <div class="container-fluid">
					<a class="navbar-brand" href="#">
						<img src="images/logo.jpg" class="logo-image">
					</a>
			    
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav m-auto">
							<li class="nav-item active">
								<a class="nav-link text-center" href="{{ url('/') }}">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-center" href="#">Menu</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-center" href="#">Reservation</a>
							</li>
							<li class="nav-item">
								<a class="nav-link text-center" href="#">Order Online</a>
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
							@if (!session()->has('current_user'))
								<li class="nav-item">
									<a class="nav-link text-center" href="{{ url('login') }}">Signin</a>
								</li>
							@else
								<li class="nav-item dropdown">
									<div class="nav-link text-center dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										{{ session()->get('current_user') }}
									</div>
									 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
									 </div>
								</li>
							@endif
						</ul>
					</div>
			  	</div>
			</nav> 

			<section id="banner">
				<div class="banner-container d-flex justify-content-center align-items-center">
					<div class="banner-contents text-center">
						<h1>“…the best Bangali food I’ve ever had”</h1>
					</div>
				</div>
			</section>
		</header>

		<main>
			<section class="categories">
				<div class="container">
					<div>
						<h1 class="text-center">Our Menu</h1>
					</div>

					<a href="">
						<div class="box">
							<img src="{{ asset('images/Menu/french-fries.jpg') }}">
							<div class="des">French Fries</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="{{ asset('images/Menu/breakfast.jpg') }}">
							<div class="des">Breakfast</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="{{ asset('images/Menu/burger.jpg') }}">
							<div class="des">Burger</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="{{ asset('images/Menu/pizza-1.jpg') }}">
							<div class="des">Pizza</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="{{ asset('images/Menu/chicken.jpg') }}">
							<div class="des">Chicken</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="{{ asset('images/Menu/jilebi.jpg') }}">
							<div class="des">Jilebi</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="{{ asset('images/Menu/singara.jpg') }}">
							<div class="des">Singara</div>
						</div>
					</a>

					<a href="">
						<div class="box">
							<img src="{{ asset('images/Menu/samosa.jpg') }}">
							<div class="des">Samosa</div>
						</div>
					</a>
					<div class="clearfix"></div>
				</div>
			</section>

			<section class="gallery">
				<div class="container">
					<div>
						<h1 class="text-center">Our Gallery</h1>
					</div>

					<div class="box-3">
						<img src="{{ asset('images/burger.jpg') }}">
					</div>

					<div class="box-3">
						<img src="{{ asset('images/jilebi.jpg') }}">
					</div>

					<div class="box-3">
						<img src="{{ asset('images/pizza-1.jpg') }}">
					</div>

					<div class="box-3">
						<img src="{{ asset('images/samosa.jpg') }}">
					</div>

					<div class="box-3">
						<img src="{{ asset('images/french-fries.jpg') }}">
					</div>

					<div class="box-3">
						<img src="{{ asset('images/chicken.jpg') }}">
					</div>

				</div>
			</section>
			
		</main>

		<footer>
			
		</footer>

	</div>
	

	<!-- -----------------------------------------------------  -->

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>
</html>
