@extends('dashboard_layout')
@section('admin_content')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>User Info</h3>
			</div>
		</div>
	</div>
	<section class="section">
		<div class="card">
			<div class="card-header">
				Simple Datatable
				<a onclick="addForm()" href="#" class="btn btn-info float-end" data-bs-toggle="modal"
					data-bs-target="#inlineForm">
					Add User Info
				</a>
			</div>
			<div class="card-body" style="overflow-x:auto;">
				<table class="table table-striped" id="user-info">
					<thead>
						<tr>
							<th>ID</th>
							<th>User Type</th>
							<th>User Name</th>
							<th>User Password</th>
							<th>User Full Name</th>
							<th>User Phone</th>
							<th>User Email</th>
							<th>User Area</th>
							<th>User Company Info</th>
							<th>User Company Address</th>
							<th>User Company Phone</th>
							<th>User Company Email</th>
							<th>User Status</th>
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
					<h4 class="modal-title" id="myModalLabel33">User Info </h4>
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
                            $user_type_id=DB::table('user_types')->get();
                        	?>
							<label>User Type: </label>
							<select class="form-select form-select-lg mb-3" name="user_type_id" id="user_type_id">
                                <option disabled="" selected="">select user</option>
                                @foreach($user_type_id as $user_type)
                                <option value="{{ $user_type->id }}">{{ $user_type->user_type_name }}</option>
                                @endforeach                              
                            </select> 
						</div>

						<div class="col-md-4">							
							<label>User Name: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter User Type"
								class="form-control form-control-lg" name="user_name" id="user_name" required>
							</div>
						</div>

						<div class="col-md-4">							
							<label>Password: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Password"
								class="form-control form-control-lg" name="user_password" id="user_password" required>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-4">							
							<label>User Full Name: </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Full Name"
								class="form-control form-control-lg" name="user_full_name" id="user_full_name" required>
							</div>
						</div>

						<div class="col-md-4">							
							<label>User Phone : </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Phone"
								class="form-control form-control-lg" name="user_phone" id="user_phone" required>
							</div>
						</div>

						<div class="col-md-4">							
							<label>User Email : </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Email"
								class="form-control form-control-lg" name="user_email" id="user_email" required>
							</div>
						</div>

					</div>

					<div class="row">

						{{-- <div class="col-md-4">							
							<label>User Addrerss : </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Addrerss"
								class="form-control" name="user_address" id="user_address" required>
							</div>
						</div> --}}

						<div class="col-md-4">
							<?php 
                            $user_address=DB::table('area_infos')->get();
                        	?>
							<label>User Area: </label>
							<select class="form-select form-select-lg mb-3" name="user_address" id="user_address">
                                <option disabled="" selected="">select area</option>
                                @foreach($user_address as $user_area)
                                <option value="{{ $user_area->area_name }}">{{ $user_area->area_name }}</option>
                                @endforeach                              
                            </select> 
						</div>

						<div class="col-md-4">							
							<label>User Company Info : </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Company Info"
								class="form-control form-control-lg" name="user_company_info" id="user_company_info" required>
							</div>
						</div>

						<div class="col-md-4">							
							<label>User Company Address : </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Company Address "
								class="form-control form-control-lg" name="user_company_address" id="user_company_address" required>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-4">							
							<label>User Company Phone : </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Company Phone"
								class="form-control form-control-lg" name="user_company_phone" id="user_company_phone" required>
							</div>
						</div>

						<div class="col-md-4">							
							<label>User Company Email : </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Company Email"
								class="form-control form-control-lg" name="user_company_email" id="user_company_email" required>
							</div>
						</div>

						<div class="col-md-4">							
							<label>NID NO : </label>
							<div class="form-group">
								<input type="text" placeholder="Enter NID NO"
								class="form-control form-control-lg" name="nid_no" id="nid_no" required>
							</div>
						</div>

					</div>

					<div class="row">

						<div class="col-md-8">							
							<label>Trade License : </label>
							<div class="form-group">
								<input type="text" placeholder="Enter Trade License"
								class="form-control form-control-lg" name="trade_license" id="trade_license" required>
							</div>
						</div>

						<div class="col-md-4">
							<label>Status: </label>
							<select class="form-select form-select-lg mb-3" name="user_status" id="user_status" required>
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


@include('layoutfiles.footerfile')

<script type="text/javascript">

	var table1 = $('#user-info').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.UserInfo') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'user_type_name', name: 'user_type_name'},
            {data: 'user_name', name: 'user_name'},
            {data: 'user_password', name: 'user_password'},
            {data: 'user_full_name', name: 'user_full_name'},
            {data: 'user_phone', name: 'user_phone'},
            {data: 'user_email', name: 'user_email'},
            {data: 'user_address', name: 'user_address'},
            {data: 'user_company_info', name: 'user_company_info'},
            {data: 'user_company_address', name: 'user_company_address'},
            {data: 'user_company_phone', name: 'user_company_phone'},
            {data: 'user_company_email', name: 'user_company_email'},
            {data: 'user_status', name: 'user_status'},
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

    url = "{{ url('userinfo') }}";

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
    function editUserInfoData(id) {
        save_method = "edit";
        $('input[name_method]').val('PATCH');
        $('#modal-form form')[0].reset();

        $.ajax({
            url: "{{ url('userinfo') }}" + '/' + id + '/edit',
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text(data.user_name + ' ' + 'Edit Information');
                $('#add-post').text("Update Info");
                $('#id').val(data.id);
                $('#user_type_id').val(data.user_type_id);
                $('#user_name').val(data.user_name);
                $('#user_password').val(data.user_password);
                $('#user_full_name').val(data.user_full_name);
                $('#user_phone').val(data.user_phone);
                $('#user_email').val(data.user_email);
                $('#user_address').val(data.user_address);
                $('#user_company_info').val(data.user_company_info);
                $('#user_company_address').val(data.user_company_address);
                $('#user_company_phone').val(data.user_company_phone);
                $('#user_company_email').val(data.user_company_email);
                $('#nid_no').val(data.nid_no);
                $('#trade_license').val(data.trade_license);
                $('#user_status').val(data.user_status);
                
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

   function showUserInfoData(id){

        $.ajax({
            url: "{{ url('userinfo') }}" + '/' + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#modal-form').modal('show');
                $('.modal-title').text(data.user_type_name + ' ' + 'Edit Information');
                $('#add-post').hide();
                $('#id').val(data.id).prop('readonly', true);
                $('#user_type_id').val(data.user_type_id).prop('readonly', true);
                $('#user_name').val(data.user_name).prop('readonly', true);
                $('#user_password').val(data.user_password).prop('readonly', true);
                $('#user_full_name').val(data.user_full_name).prop('readonly', true);
                $('#user_phone').val(data.user_phone).prop('readonly', true);
                $('#user_email').val(data.user_email).prop('readonly', true);
                $('#user_address').val(data.user_address).prop('readonly', true);
                $('#user_company_info').val(data.user_company_info).prop('readonly', true);
                $('#user_company_address').val(data.user_company_address).prop('readonly', true);
                $('#user_company_phone').val(data.user_company_phone).prop('readonly', true);
                $('#user_company_email').val(data.user_company_email).prop('readonly', true);
                $('#nid_no').val(data.nid_no).prop('readonly', true);
                $('#trade_license').val(data.trade_license).prop('readonly', true);
                $('#user_status').val(data.user_status).prop('readonly', true);
                
                
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
    function deleteUserInfoData(id) {
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
                    url: "{{ url('userinfo') }}" + '/' + id,
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