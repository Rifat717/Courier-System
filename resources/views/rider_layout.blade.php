<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>Go Delivery</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		{{-- Data Table CDN --}}
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"/>
		<!-- Toastr -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet">
		
		<link rel="stylesheet" href="{{asset ('public/dashboard/assets/css/bootstrap.css') }}">
		<link rel="stylesheet" href="{{asset ('public/dashboard/assets/vendors/iconly/bold.css') }}">
		
		
		
		<style type="text/css">
			.navbar-nav li {
				padding: 0 10px;
			}
			.navbar-nav li a {
				color: #000!important;
			}
			.navbar-nav li a:hover {
				color: #007bff!important ;
			}
			/* #navbarSupportedContent .disabled::after {
				content: '|';
				padding-left: .5em;
				padding-right: .5em;
			} */
			.vl {
			border-left: 1.5px solid orange;
			height: 50px;
			padding: 0 10px;
			padding-right: 30px;
			}
			.bt-clr{
				padding-right: 50px;
				padding-left: 40px;
			}
			.bt-clr #bt{
				background-color: #fd7e14;
			}
			.card-merg{
				margin-top: 20px;
				margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="#">
						<img class="img-fluid w-100" src="{{ ('public/frontend/img/gode-01.png') }}" style="height: 70px; width: 80px;" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="">Dashboard</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="{{ url('riderparcel') }}">Pending Parcel</a>
							</li>
							{{-- <li class="nav-item">
								<a class="nav-link" href="#">Delivered Parcel</a>
							</li> --}}
							
						</ul>
						
						{{-- <div class="bt-clr">
							<button class="btn btn-success" id="bt" type="submit">Create Parcel</button>
						</div> --}}
						<div class="vl">
							
						</div>
						<div class="dropdown text-end">
							<a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
								<img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
							</a>
							<ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
								<li><a class="dropdown-item" href="#">{{ Session::get('user_company_info') }} !</a></li>
								<li><a class="dropdown-item" href="#">Settings</a></li>
								<li><a class="dropdown-item" href="#">Profile</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="{{ url('/rider-logout') }}">Sign out</a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
			@yield('rider_content')
		</div>
		<!-- Optional JavaScript; choose one of the two! -->
		

			<footer class="bg-light text-center text-lg-start" style="margin-top:150px;">
			<!-- Copyright -->
			<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
				© 2022 Copyright:
				<a class="text-dark" href="#">Go Delivery</a>
			</div>
			<!-- Copyright -->
		</footer>
		
		
	</body>
</html>