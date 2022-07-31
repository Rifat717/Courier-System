@extends('dashboard_layout')
@section('admin_content')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Parsell Info</h3>
			</div>
		</div>
	</div>
	<section class="section">
		<div class="card">
			<div class="card-header">
				Simple Datatable
				{{-- <a onclick="addForm()" href="#" class="btn btn-info float-end" data-bs-toggle="modal"
					data-bs-target="#inlineForm">
					Add Parsell Info
				</a> --}}
			</div>
			<div class="card-body" style="overflow-x:auto;">
				<table class="table table-striped" id="parsell-info">
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
							<th>Delivery Status</th> 
							<th>Action</th>

							
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>

	{{-- =========Modal Form========= --}}

	<div class="modal fade text-left" id="modal-form" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" style="max-width: 50%;"
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
							<?php 
                            $product_type_id=DB::table('product_types')->get();
                        	?>
							<label>Product Type: </label>
							<select class="form-select form-select-lg mb-3" name="product_type_id" id="product_type_id">
                                <option disabled="" selected="">select product type</option>
                                @foreach($product_type_id as $product)
                                <option value="{{ $product->product_type_name }}">{{ $product->product_type_name }}</option>
                                @endforeach                              
                            </select> 
						</div>

						<div class="col-md-4">
							<?php 
                            $product_cate_id=DB::table('product_categories')->get();
                        	?>
							<label>Product Category: </label>
							<select class="form-select form-select-lg mb-3" name="product_cate_id" id="product_cate_id">
                                <option disabled="" selected="">select product category</option>
                                @foreach($product_cate_id as $product_cate)
                                <option value="{{ $product_cate->product_category_name }}">{{ $product_cate->product_category_name }}</option>
                                @endforeach                              
                            </select> 
						</div>

						<div class="col-md-4">
							
							<label>Coustomer Name: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Coustomer Name"
								class="form-control form-control-lg" name="coustomer_name" id="coustomer_name" required>
							</div>
						</div>

						
					</div>
						<div class="row">

						<div class="col-md-4">
							
							<label>Customer Phone: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Customer Phone"
								class="form-control form-control-lg" name="coustomer_phone" id="coustomer_phone" required>
							</div>
						</div>

						<div class="col-md-4">
							
							<label>Customer Email </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Customer Email"
								class="form-control form-control-lg" name="coustomer_email" id="coustomer_email" required>
							</div>
						</div>

						<div class="col-md-4">
							
							<label>Customer Address: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Customer Address"
								class="form-control form-control-lg" name="customer_address" id="customer_address" required>
							</div>
						</div>

						</div>

					<div class="row">	

						<div class="col-md-4">
							
							<label>Zone: </label>
							<select class="form-select form-select-lg mb-3" name="zone" id="zone">
                                <option disabled="" selected="">select Zone</option>
                                <option value="north">Dhaka North</option>
                                <option value="south">Dhaka South</option>
                                                              
                            </select>
						</div>

						<div class="col-md-4">
							<?php 
	                            $area_info_id=DB::table('area_infos')->get();
	                        ?>
							<label>Area Name: </label>
							<select class="form-select form-select-lg mb-3" name="area_id" id="area_id">
                                <option disabled="" selected="">select area</option>
                                @foreach($area_info_id as $area)
                                <option value="{{ $area->area_name }}">{{ $area->area_name }}</option>
                                @endforeach                              
                            </select> 
                        </div>

                        <div class="col-md-4">
							
							<label>Cash Amount: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Cash Amount"
								class="form-control form-control-lg" name="cash_amount" id="cash_amount" required>
							</div>
						</div>
						
					</div>

					<div class="row">

						<div class="col-md-4">
							
							<label>Product Price: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Product Amount"
								class="form-control form-control-lg" name="product_price" id="product_price" required>
							</div>
						</div>

						<div class="col-md-4">
							
							<label>Delivery Type: </label>
							<select class="form-select form-select-lg mb-3" name="delivery_type" id="delivery_type">
                                <option disabled="" selected="">select Delivery Type</option>
                                <option value="cod">COD</option>
                                <option value="delivery">Delivery</option>
                                                              
                            </select>
						</div>

						<div class="col-md-4">
							
							<label>Weight: </label>
							<select class="form-select form-select-lg mb-3" name="weight" id="weight">
                                <option disabled="" selected="">select weight</option>
                                <option value="500gm">500gm</option>
                                <option value="1kg">1kg</option>
                                                              
                            </select>
							
						</div>
					</div>
					
					<div class="row">

						<div class="col-md-6">
							
							<label>Delivery Status: </label>
							<select class="form-select form-select-lg mb-3" name="delivery_status" id="delivery_status">
                                <option disabled="" selected="">select status</option>
                                <option value="pending">pending</option>
                                <option value="process on picked">process on picked</option>
                                <option value="picked">picked</option>
                                <option value="delivery on process">delivery on process</option>
                                <option value="delivered">delivered</option>
                                <option value="canceled">canceled</option>
                                                              
                            </select>
							
						</div>

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
{{-- </form> --}}


@include('layoutfiles.footerfile')

<script type="text/javascript">

	

    var table1 = $('#parsell-info').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.ParsellInfo') }}",
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
            {data: 'delivery_status', name: 'delivery_status'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
	
	function addForm(){

    	$('input[name_method]').val('POST');
    	$('#modal-form').modal('show');
    	$('#modal-form form')[0].reset();
    	$('.modal-title').text('Add Post')
    	$('#add-post').text('Add Post')
    }

    /*========Insert and Update data===========*/
    function submitData() {

    url = "{{ url('parsellinfo') }}";

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

//Edit Data Show By Ajax
    function editParsellInfoData(id) {
        save_method = "edit";
        $('input[name_method]').val('PATCH');
        $('#modal-form form')[0].reset();

        $.ajax({
            url: "{{ url('parsellinfo') }}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text(data.coustomer_name + ' ' + 'Edit Information');
                $('#add-post').text("Update Info");
                $('#id').val(data.id);
                $('#product_type_id').val(data.product_type_id);
                $('#product_cate_id').val(data.product_cate_id);
                $('#coustomer_name').val(data.coustomer_name);
                $('#coustomer_phone').val(data.coustomer_phone);
                $('#coustomer_email').val(data.coustomer_email);
                $('#customer_address').val(data.customer_address);
                $('#zone').val(data.zone);
                $('#area_id').val(data.area_id);
                $('#cash_amount').val(data.cash_amount);
                $('#product_price').val(data.product_price);
                $('#delivery_type').val(data.delivery_type);
                $('#weight').val(data.weight);
                $('#delivery_status').val(data.delivery_status);
                
            }, error: function () {
                swal({
                    title: "Oops",
                    text: data.message,
                    icon: "error",
                    timer: '1500'
                });
            }
        }); 
    }

/*=======Show Data By Ajax========*/

   function showParsellInfoData(id){

        $.ajax({
            url: "{{ url('parsellinfo') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text(data.user_type_name + ' ' + 'Edit Information');
                $('#add-post').hide();
                $('#id').val(data.id);
                $('#product_type_id').val(data.product_type_id).prop('readonly', true);
                $('#product_cate_id').val(data.product_cate_id).prop('readonly', true);
                $('#coustomer_name').val(data.coustomer_name).prop('readonly', true);
                $('#coustomer_phone').val(data.coustomer_phone).prop('readonly', true);
                $('#coustomer_email').val(data.coustomer_email).prop('readonly', true);
                $('#customer_address').val(data.customer_address).prop('readonly', true);
                $('#zone').val(data.zone).prop('readonly', true);
                $('#area_id').val(data.area_id).prop('readonly', true);
                $('#cash_amount').val(data.cash_amount).prop('readonly', true);
                $('#product_price').val(data.product_price).prop('readonly', true);
                $('#delivery_type').val(data.delivery_type).prop('readonly', true);
                $('#weight').val(data.weight).prop('readonly', true);
                $('#delivery_status').val(data.delivery_status).prop('readonly', true);
                
            }, error: function () {
                swal({
                    title: "Oops",
                    text: data.message,
                    icon: "error",
                    timer: '1500'
                });
            }
        }); 

   }


   //Dalete Data By Ajax
    function deleteParsellInfoData(id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "{{ url('parsellinfo') }}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {
                    	table1.ajax.reload();
                        /*$('#contact-tables').DataTable().ajax.reload();*/
                        swal({
                            title: "Delete Done",
                            text: "Poof! Your data file has been deleted!",
                            icon: "success",
                            button: "Done"
                        });
                    }, error: function () {
                        swal({
                            title: "Opps...",
                            text: data.message,
                            icon: "error",
                            button: '5000',
                        });
                    }
                });
            } else {
                swal("Your imaginary file is safe!");
            }
        });

    }

</script>

@endsection