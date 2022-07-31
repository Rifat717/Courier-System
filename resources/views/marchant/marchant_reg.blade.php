<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Bootstrap CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<title>Go Delivery</title>
	</head>
	
	<style type="text/css">
		.required {
		  color: red;
		}
	</style>
	
	<body>
		<div class="container">
			
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container-fluid">
					<a class="navbar-brand" href="{{ url('/') }}">
						<img class="img-fluid w-100" src="{{ ('public/frontend/img/gode-01.png') }}" style="height: 70px; width: 80px;" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					
				</div>
			</nav>
			<h1 class="text-center">Registration Please</h1>
			<form method="post" action="{{ url('/marchant-registration') }}">
				@csrf
				<div class="row">
					<div class="col-md-5">
						<select class="form-select form-select-lg mb-3" name="user_type_id" readonly>
							<option value="3">Marchant</option>
						</select>	
					</div>
					<div class="col-md-5">
						<label class="form-label"><b>User Name<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter User Name" name="user_name" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<label class="form-label"><b>Password<span class="required">*</span> :</b></label>
						<input type="password" class="form-control form-control-lg" id="email" placeholder="Enter Password" name="user_password" required>
					</div>
					<div class="col-md-5">
						<label class="form-label"><b>User Full Name<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter User Full Name" name="user_full_name" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<label class="form-label"><b>User Phone<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter User Phone" name="user_phone" required>
					</div>
					<div class="col-md-5">
						<label class="form-label"><b>User Email<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter User Email" name="user_email" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<label class="form-label"><b>User Address<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter User Address" name="user_address" required>
					</div>
					<div class="col-md-5">
						<label class="form-label"><b>Company Info<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter Company Name" name="user_company_info" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<label class="form-label"><b>Company Address<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter Company Address" name="user_company_address" required>
					</div>
					<div class="col-md-5">
						<label class="form-label"><b>Company Phone<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter Company Phone" name="user_company_phone" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<label class="form-label"><b>Company Email<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter Company Email" name="user_company_email" required>
					</div>
					<div class="col-md-5">
						<label class="form-label"><b>Nid No<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter Nid No" name="nid_no" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<label class="form-label"><b>Trade License<span class="required">*</span> :</b></label>
						<input type="text" class="form-control form-control-lg" id="email" placeholder="Enter Trade License" name="trade_license" required>
					</div>
					
				</div>
				<div>
					<button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Next</button>
				</div>
			</form>
		</div>
		<footer class="bg-light text-center text-lg-start">
			<!-- Copyright -->
			<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
				© 2022 Copyright:
				<a class="text-dark" href="#">Go Delivery</a>
			</div>
			<!-- Copyright -->
		</footer>
		
		
		<!-- Optional JavaScript; choose one of the two! -->
		<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		<!-- Option 2: Separate Popper and Bootstrap JS -->
		<!--
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
		-->
	</body>
</html>