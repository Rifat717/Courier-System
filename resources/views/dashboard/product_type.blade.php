@extends('dashboard_layout')
@section('admin_content')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Product Type</h3>
			</div>
		</div>
	</div>
	<section class="section">
		<div class="card">
			<div class="card-header">
				Simple Datatable
				<a onclick="addForm()" href="#" class="btn btn-info float-end" data-bs-toggle="modal"
					data-bs-target="#inlineForm">
					Product Type
				</a>
			</div>
			<div class="card-body">
				<table class="table table-striped" id="product-type">
					<thead>
						<tr>
							<th>ID</th>
							<th>Product Type Name</th>
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
					<h4 class="modal-title" id="myModalLabel33">Product Type </h4>
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
						<div class="col-md-6">
							
							<label>Product Type Name: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Product Type"
								class="form-select form-select-lg mb-3" name="product_type_name" id="product_type_name" required>
							</div>
						</div>
						
					</div>

				</div>
				<div class="modal-footer">
					<button type="reset" class="btn btn-light-secondary"
					data-bs-dismiss="modal">Close</button>
					<button type="button" onclick="submitData()" class="btn btn-primary ml-1" id="add-post"></button>
				</div>

				</form>
				
			</div>
		</div>
	</div>
</form>


@include('layoutfiles.footerfile')

<script type="text/javascript">

	var table1 = $('#product-type').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.ProductType') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'product_type_name', name: 'product_type_name'},
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

    url = "{{ url('producttype') }}";

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
    function editProductTypeData(id) {
        save_method = "edit";
        $('input[name_method]').val('PATCH');
        $('#modal-form form')[0].reset();

        $.ajax({
            url: "{{ url('producttype') }}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text(data.product_type_name + ' ' + 'Edit Information');
                $('#add-post').text("Update Info");
                $('#id').val(data.id);
                $('#product_type_name').val(data.product_type_name);
                
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

   function showProductTypeData(id){

        $.ajax({
            url: "{{ url('producttype') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text(data.product_type_name + ' ' + 'Edit Information');
                $('#add-post').hide();
                $('#id').val(data.id);
                $('#product_type_name').val(data.product_type_name).prop('readonly', true);
                
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
    function deleteProductTypeData(id) {
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
                    url: "{{ url('producttype') }}" + '/' + id,
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