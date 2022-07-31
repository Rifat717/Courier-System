@extends('dashboard_layout')
@section('admin_content')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Assigned Rider</h3>
			</div>
		</div>
	</div>
	<?php 
        $persell_Info=DB::select("SELECT id, CONCAT('Name -',coustomer_name, '- Phone -',coustomer_phone, '- Address -',customer_address,'- Delivery Status -',delivery_status) as Info FROM persell_infos WHERE delivery_status = 'pending';");
        $rider_List=DB::select("SELECT * from user_infos WHERE user_type_id='15' ;");
	?>
	<section class="section">
		<div class="card">
			<div class="card-header">
				Simple Datatable
			
			</div>
			<div class="card-body" id="modal-form">
		<form method="post" enctype="multipart/form-data">
						{{csrf_field()}}
			<div class="row">
				<div class="col-6">
					<select class="form-select form-select-lg mb-3" name="parsell_info_id" aria-label=".form-select-lg example">
						<option selected>Pending Persell Info </option>
						@foreach($persell_Info as $persell_Info)
						<option value="{{$persell_Info->id }}">{{ $persell_Info->Info }}</option>
						@endforeach
					</select>
				</div>

			

				<div class="col-6">
					<select class="form-select form-select-lg mb-3" name="id" aria-label=".form-select-lg example">
						<option selected>Rider List</option>
						@foreach($rider_List as $rider_List)
						<option value="{{ $rider_List->id }}">{{ $rider_List->user_name }}</option>
						@endforeach
						
					</select>
				</div>

				<button type="button" onclick="submitData()" class="btn btn-info mx-auto" style="width: 200px;">Assigned</button>
			</div>
		</form>
	</div>
</div>
		
	</section>
</div>
@include('layoutfiles.footerfile')

<script type="text/javascript">
	/*========Insert and Update data===========*/
    function submitData() {

    url = "{{ url('riderparcel') }}";

    $.ajax({
        url: url,
        type: "POST",
        data: new FormData($("#modal-form form")[0]),
        contentType: false,
        processData: false,
        success: function (data) {
    		console.log(data);
            swal({
                title: "Success",
                text: "Data Inserted Successfully!",
                icon: "success",
                button: "Great"
            });
		window.location.reload();
        }, error: function (data) {
            swal({
                title: "Oops",
                text: "Failed To Assigned",
                icon: "error",
                timer: '1500'
            });
        }
    });
}
</script>
@endsection