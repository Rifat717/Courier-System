@extends('dashboard_layout')
@section('admin_content')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Product info</h3>
			</div>
		</div>
	</div>
	<section class="section">
		<div class="card">
			<div class="card-header">
				Simple Datatable
				<a onclick="addForm()" href="#" class="btn btn-info float-end" data-bs-toggle="modal"
					data-bs-target="#inlineForm">
					Add Product info
				</a>
			</div>
			<div class="card-body" style="overflow-x:auto;">
				<table class="table table-striped" id="product-info">
					<thead>
						<tr>
							<th>ID</th>
							<th>Product type</th>
							<th>Product category</th>
							<th>Product name</th>
							<th>Product short desc</th>
							{{-- <th>Product desc</th> --}}
							<th>Status</th>
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
					<h4 class="modal-title" id="myModalLabel33">Product info </h4>
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
                                <option disabled="" selected="">select user</option>
                                @foreach($product_type_id as $product_type)
                                <option value="{{ $product_type->id }}">{{ $product_type->product_type_name }}</option>
                                @endforeach                              
                            </select> 
						</div>

						<div class="col-md-4">
							<?php 
                            $product_cate_id=DB::table('product_categories')->get();
                        	?>
							<label>Product Category: </label>
							<select class="form-select form-select-lg mb-3" name="product_category_id" id="product_category_id">
                                <option disabled="" selected="">select user</option>
                                @foreach($product_cate_id as $product_cate)
                                <option value="{{ $product_cate->id }}">{{ $product_cate->product_category_name }}</option>
                                @endforeach                              
                            </select> 
						</div>


						<div class="col-md-4">
							
							<label>Product Name: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Product Name"
								class="form-control form-control-lg" name="product_name" id="product_name" required>
							</div>
						</div>

					</div>

					<div class="row">
						<div class="col-md-4">
							
							<label>Product short Desc: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter short Desc"
								class="form-control form-control-lg" name="product_short_desc" id="product_short_desc" required>
							</div>
						</div>

						<div class="col-md-4">
							
							<label>Product Desc: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Desc"
								class="form-control form-control-lg" name="product_desc" id="product_desc" required>
							</div>
						</div>
						<div class="col-md-4">
							<label>Status: </label>
							<select class="form-select form-select-lg mb-3" name="status" id="status" required>
								<option disabled="" selected="">select status</option>
								
								<option value="a">Active</option>
								<option value="i">Inctive</option>	
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

	var table1 = $('#product-info').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.ProductInfo') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'product_type_name', name: 'product_type_name'},
            {data: 'product_category_name', name: 'product_category_name'},
            {data: 'product_name', name: 'product_name'},
            {data: 'product_short_desc', name: 'product_short_desc'},
            /*{data: 'product_desc', name: 'product_desc'},*/
            {data: 'status', name: 'status'},
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

    url = "{{ url('productinfo') }}";

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
    function editProductInfoData(id) {
        save_method = "edit";
        $('input[name_method]').val('PATCH');
        $('#modal-form form')[0].reset();

        $.ajax({
            url: "{{ url('productinfo') }}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text(data.product_name + ' ' + 'Edit Information');
                $('#add-post').text("Update Info");
                $('#id').val(data.id);
                $('#product_type_id').val(data.product_type_id);
                $('#product_category_id').val(data.product_category_id);
                $('#product_name').val(data.product_name);
                $('#product_short_desc').val(data.product_short_desc);
                $('#product_desc').val(data.product_desc);
                $('#status').val(data.status);
                
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

   function showProductInfoData(id){

        $.ajax({
            url: "{{ url('productinfo') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text(data.user_type_name + ' ' + 'Edit Information');
                $('#add-post').hide();
                $('#id').val(data.id);
                $('#product_type_id').val(data.product_type_id).prop('readonly', true);
                $('#product_category_id').val(data.product_category_id).prop('readonly', true);
                $('#product_name').val(data.product_name).prop('readonly', true);
                $('#product_short_desc').val(data.product_short_desc).prop('readonly', true);
                $('#product_desc').val(data.product_desc).prop('readonly', true);
                $('#status').val(data.status).prop('readonly', true);
                $('#status').val(data.status).prop('readonly', true);
                
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
    function deleteProductInfoData(id) {
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
                    url: "{{ url('productinfo') }}" + '/' + id,
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