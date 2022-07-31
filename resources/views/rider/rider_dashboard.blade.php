@extends('rider_layout')
@section('rider_content')
<section>
	<div class="row card-merg">
		<div class="">
			<h1>Welcome Rider {{ Session::get('user_name') }}!</h1>
		</div>
	</div>
</section>
<section>
	<div class="row card-merg">
		<div class="col-6 col-lg-4 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon purple">
								<i class="iconly-boldShow"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold">Order Placed</h6>
							<h6 class="font-extrabold mb-0">112.000</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-lg-4 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon blue">
								<i class="iconly-boldProfile"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold">Order Deliverd</h6>
							<h6 class="font-extrabold mb-0">183.000</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-lg-4 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon green">
								<i class="fas fa-truck"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold">Order In Transit</h6>
							<h6 class="font-extrabold mb-0">80.000</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row card-merg">
		<div class="col-6 col-lg-4 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon red">
								<i class="fas fa-undo-alt"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold">Order Returned</h6>
							<h6 class="font-extrabold mb-0">112</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-lg-4 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon red">
								<i class="far fa-thumbs-up"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold">Successful Delivery</h6>
							<h6 class="font-extrabold mb-0">112</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-6 col-lg-4 col-md-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-md-4">
							<div class="stats-icon red">
								<i class="iconly-boldBookmark"></i>
							</div>
						</div>
						<div class="col-md-8">
							<h6 class="text-muted font-semibold">Saved Post</h6>
							<h6 class="font-extrabold mb-0">112</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@include('layoutfiles.marchant_footer')
@endsection