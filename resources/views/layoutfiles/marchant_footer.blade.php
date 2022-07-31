<!-- Option 1: Bootstrap Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
		{{-- jQuery Link --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
		{{-- Data Table --}}
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>

		<script>
            @if (Session::has('message'))
                var type="{{ Session::get('alert-type','info') }}"
                switch(type){
                    case 'info':
                        toastr.info("{{ Session::get('message') }}");
                        break;
                    case 'success':
                        toastr.success("{{ Session::get('message') }}");
                        break;
                    case 'warning':
                        toastr.warning("{{ Session::get('message') }}");
                        break;
                    case 'error':
                        toastr.error("{{ Session::get('message') }}");
                        break;
                }
            @endif
        </script>

         <!-- Sweet Alert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	    <script>
	            $(document).on("click", "#delete", function(e){
	                e.preventDefault();
	                var link = $(this).attr("href");
	                
	                swal({
	                    title: "Are you want to delete...?",
	                    text: "Once delete, It will be Parmanent Delete!",
	                    icon: "warning",
	                    buttons: true,
	                    dangerMode: true,
	                })
	                .then((willDelete)=>{
	                     
	                    if (willDelete) {
	                        
	                        swal("Poof! Your imaginary file has been deleted!", {
	                          icon: "success",
	                          timer: 1000,
	                          buttons: false,
	                        });
	                        window.location.href= link;
	                    } else {
	                        swal("Your data is safe!")
	                    }
	                });
	            });
	    </script>