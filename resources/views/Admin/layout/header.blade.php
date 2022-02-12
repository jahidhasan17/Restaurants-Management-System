<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>This is my web Site</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<link rel="stylesheet" href="{{ asset('css/adminstyle.css') }}">
</head>
<body>
	<div>
		<header>
			<nav class="navbar navbar-expand-md">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="{{ url('admin') }}">
			    	<img src="{{ asset('images/logo.jpg') }}" class="logo-image">
			    </a>
			    
			    <div class="collapse navbar-collapse" id="navbarNavDropdown">
			      <ul class="navbar-nav m-auto">
						<li class="nav-item active">
							<a class="nav-link text-center" href="{{ url('admin') }}">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-center" href="{{ url('admin/manage-admin') }}">Admin</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-center" href="{{ url('admin/manage-category') }}">Category</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-center" href="{{ url('admin/manage-food') }}">Food</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-center" href="{{ url('admin/manage-order') }}">Order</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-center" href="{{ url('admin/manage-reservation') }}">Reservation</a>
						</li>
                 @if (!session()->has('current_admin_user'))
                     <li class="nav-item">
                        <a class="nav-link text-center" href="{{ url('admin/login') }}">Signin</a>
                     </li>
                  @else
                     <li class="nav-item dropdown">
                        <div class="nav-link text-center dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           {{ session()->get('current_admin_user') }}
                        </div>
                           <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                           <a class="dropdown-item" href="{{ url('admin/logout') }}">Logout</a>
                           </div>
                     </li>
                  @endif
			      </ul>
			    </div>
			  </div>
			</nav>
		</header>