<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>Go Delivery</title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	</head>
	<style type="text/css">
	body {
	background: #007bff;
	background: linear-gradient(to right, #0062E6, #33AEFF);
	}
	.btn-login {
	font-size: 0.9rem;
	letter-spacing: 0.05rem;
	padding: 0.75rem 1rem;
	}
	.btn-google {
	color: white !important;
	background-color: #ea4335;
	}
	.btn-facebook {
	color: white !important;
	background-color: #3b5998;
	}
	</style>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
					<div class="card border-0 shadow rounded-3 my-5">
						<div class="card-body p-4 p-sm-5">
							<h5 class="card-title text-center mb-5 fw-light fs-5">Sign In</h5>
							<form method="post" action="{{ url('/user-login') }}">
								@csrf
								<div class="form-floating mb-3">
									<input type="text" class="form-control" name="user_phone" placeholder="Email">
									<label for="floatingInput">Phone Number</label>
								</div>
								<div class="form-floating mb-3">
									<input type="password" class="form-control" name="user_password" placeholder="Password">
									<label for="floatingPassword">Password</label>
								</div>
								<div class="form-check mb-3">
									<input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
									<label class="form-check-label" for="rememberPasswordCheck">
										Remember password
									</label>
								</div>
								<div class="d-grid">
									<button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign in</button>
								</div>
								{{--<hr class="my-4">
								 <div class="d-grid mb-2">
									<button class="btn btn-google btn-login text-uppercase fw-bold" type="">
									<i class="fab fa-google me-2"></i> Sign in with Google
									</button>
								</div>
								<div class="d-grid">
									<button class="btn btn-facebook btn-login text-uppercase fw-bold" type="">
									<i class="fab fa-facebook-f me-2"></i> Sign in with Facebook
									</button>
								</div> --}}
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>