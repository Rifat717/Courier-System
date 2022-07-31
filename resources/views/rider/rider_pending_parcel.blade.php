@extends('rider_layout')
@section('rider_content')
<section>
<div class="row card-merg">
	<div class="col-6 col-lg-6 col-md-6">
		<h1>All Pending Parcel Info</h1>
	</div>
</div>
</section>
<section class="section">
<div class="card bt-clr">
	<div class="card-header">
		Simple Datatable
		
	</div>
	<div class="card-body" style="overflow-x:auto;">
		<table class="table table-striped" id="pending-parsell">
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
					{{-- <th>Action</th> --}}
					
				</tr>
			</thead>
			<tbody>
				
			</tbody>
		</table>
	</div>
</div>
</section>
@include('layoutfiles.marchant_footer')

<script type="text/javascript">

var table1 = $('#pending-parsell').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('all.RiderPendingParcel') }}",
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
            {data: 'delivery_status', name: 'delivery_status'}/*,
            {data: 'action', name: 'action', orderable: false, searchable: false}*/
        ]
    });

</script>
@endsection