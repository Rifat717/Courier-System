@extends('marchant_layout')
@section('marchant_content')
<section>
<div class="row card-merg">
	<div class="col-6 col-lg-4 col-md-6">
		<h1>All Parcel Info</h1>
	</div>
</div>
</section>
<section class="section">
<div class="card bt-clr">
	<div class="card-header">
		Simple Datatable
		<a onclick="addForm()" href="#" id="bt"  class="btn btn-success float-end" data-bs-toggle="modal"
			data-bs-target="#inlineForm">
			Create Parcel
		</a>
	</div>
	<div class="card-body" style="overflow-x:auto;">
		<table class="table table-striped" id="marchant-parsell">
			<thead>
				<tr>
					<th>ID</th>
					<th>Product Type</th>
					<th>Product cate</th>
					<th>Customer Name</th>
					<th>Customer Phone</th>
					<th>Customer Email</th>
					<th>Customer Address</th>
					<th>Zone</th>
					<th>Area</th>
					<th>Cash amount</th>
					<th>Product Price</th>
					<th>Delivery Type</th>
					<th>Weight</th>
					<th>Action</th>
					
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
</div>
</section>
{{-- =========Modal Form========= --}}
<div class="modal fade text-left" id="modal-form" tabindex="-1"
role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 70%;"
	role="document">
	<div class="modal-content col-md-12">
		<div class="modal-header bg-info">
			<h4 class="modal-title" id="myModalLabel33">Parsell Info </h4>
			<button type="button" class="close" data-bs-dismiss="modal"
			aria-label="Close">
			<i data-feather="x"></i>
			</button>
		</div>
		
		<div class="modal-body">
			<form method="post" enctype="multipart/form-data">
				@csrf {{ method_field('POST') }}
				
				<input type="hidden" name="id" id="id">
				<div class="row">
					<div class="col-md-4">
						
						<label><b>Coustomer Name: </b></label>
						<div class="form-group">
							<input type="text" placeholder="Enter Coustomer Name"
							class="form-control form-control-lg" name="coustomer_name" id="coustomer_name" required>
						</div>
					</div>
					<div class="col-md-4">
						<?php
						$product_type_id=DB::table('product_types')->get();
						?>
						<label><b>Product Type: </b></label>
						<select class="form-select form-select-lg mb-3" name="product_type_id" id="product_type_id">
							<option disabled="" selected="">Select Product Type</option>
							@foreach($product_type_id as $product)
							<option value="{{ $product->product_type_name }}">{{ $product->product_type_name }}</option>
							@endforeach
						</select>
					</div>
					
					<div class="col-md-4">
						<?php
						$area_info_id=DB::table('area_infos')->get();
						?>
						<label><b>Area Name: </b></label>
						<select class="form-select form-select-lg mb-3" name="area_id" id="area_id">
							<option disabled="" selected="">Select Area</option>
							@foreach($area_info_id as $area)
							<option value="{{ $area->area_name }}">{{ $area->area_name }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						
						<label><b>Customer Phone: </b></label>
						<div class="form-group">
							<input type="text" placeholder="Enter Customer Phone"
							class="form-control form-control-lg" name="coustomer_phone" id="coustomer_phone" required>
						</div>
					</div>
					<div class="col-md-4">
						
						<label><b>Product Price: </b></label>
						<div class="form-group">
							<input type="text" placeholder="Enter Product Amount"
							class="form-control form-control-lg" name="product_price" id="product_price" required>
						</div>
					</div>
					<div class="col-md-4">
						
						<label><b>Zone: </b></label>
						<select class="form-select form-select-lg mb-3" name="zone" id="zone">
							<option disabled="" selected="">Select Zone</option>
							<option value="north">Dhaka North</option>
							<option value="south">Dhaka South</option>
							
						</select>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-4">
						
						<label><b>Customer Email: </b></label>
						<div class="form-group">
							<input type="text" placeholder="Enter Customer Email"
							class="form-control form-control-lg" name="coustomer_email" id="coustomer_email" required>
						</div>
					</div>
					<div class="col-md-4">
						<?php
						$product_cate_id=DB::table('product_categories')->get();
						?>
						<label><b>Product Category: </b></label>
						<select class="form-select form-select-lg mb-3" name="product_cate_id" id="product_cate_id">
							<option disabled="" selected="">Select Product Category</option>
							@foreach($product_cate_id as $product_cate)
							<option value="{{ $product_cate->product_category_name }}">{{ $product_cate->product_category_name }}</option>
							@endforeach
						</select>
					</div>
					
					<div class="col-md-4">
						
						<label><b>Cash Collect: </b></label>
						<div class="form-group">
							<input type="text" placeholder="Enter Cash Amount"
							class="form-control form-control-lg" name="cash_amount" id="cash_amount" required>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-4">
						
						<label><b>Customer Address: </b></label>
						<div class="form-group">
							<input type="text" placeholder="Enter Customer Address"
							class="form-control form-control-lg" name="customer_address" id="customer_address" required>
						</div>
					</div>
					
					<div class="col-md-4">
						
						<label><b>Delivery Type: </b></label>
						<select class="form-select form-select-lg mb-3" name="delivery_type" id="delivery_type">
							<option disabled="" selected="">Select Delivery Type</option>
							<option value="cod">COD</option>
							<option value="delivery">Delivery</option>
							
						</select>
					</div>
					<div class="col-md-4">
						
						<label><b>Weight: </b></label>
						<select class="form-select form-select-lg mb-3" name="weight" id="weight">
							<option disabled="" selected="">Select Weight</option>
							<option value="500gm">500gm</option>
							<option value="1kg">1kg</option>
							
						</select>
						
					</div>
				</div>
				
				<div class="row">
					
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="reset" class="btn btn-light-secondary"
				data-bs-dismiss="modal">Close</button>
				<button type="button" onclick="submitData()" class="btn btn-primary ml-1" id="add-post"
				></button>
			</div>
		</form>
		
	</div>
</div>
</div>
@include('layoutfiles.marchant_footer')

<script type="text/javascript">

	var table1 = $('#marchant-parsell').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.MarchantParsell') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'product_type_id', name: 'product_type_id'},
            {data: 'product_cate_id', name: 'product_cate_id'},
            {data: 'coustomer_name', name: 'coustomer_name'},
            {data: 'coustomer_phone', name: 'coustomer_phone'},
            {data: 'coustomer_email', name: 'coustomer_email'},
            {data: 'customer_address', name: 'customer_address'},
            {data: 'zone', name: 'zone'},
            {data: 'area_id', name: 'area_id'},
            {data: 'cash_amount', name: 'cash_amount'},
            {data: 'product_price', name: 'product_price'},
            {data: 'delivery_type', name: 'delivery_type'},
            {data: 'weight', name: 'weight'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
	function addForm(){

    	$('input[name_method]').val('POST');
    	$('#modal-form').modal('show');
    	$('#modal-form form')[0].reset();
    	$('.modal-title').text('Create Parcel')
    	$('#add-post').text('Add Parcel')
    }

    /*========Insert and Update data===========*/
    function submitData() {

    url = "{{ url('marchantparcel') }}";

    $.ajax({
        url: url,
        type: "POST",
        data: new FormData($("#modal-form form")[0]),
        contentType: false,
        processData: false,
        success: function (data) {
    		console.log(data);
            $('#modal-form').modal('hide');
            table1.ajax.reload();
            /*$('#contact-tables').DataTable().ajax.reload();*/
            swal({
                title: "Success",
                text: "Data Inserted Successfully!",
                icon: "success",
                button: "Great"
            });

        }, error: function (data) {
            swal({
                title: "Oops",
                text: data.message,
                icon: "error",
                timer: '1500'
            });
        }
    });
}

</script>

@endsection