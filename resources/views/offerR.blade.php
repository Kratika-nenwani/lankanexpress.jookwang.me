@extends('index_main')  

@section('csscontent')  
@endsection  

@section('content')  
<div class="container-fluid">  
    <div class="row justify-content-center">  
        <div class="col-12">  
            <div class="header">  
                <div class="header-body">  
                    <div class="row align-items-center">  
                        <div class="col">  
                            <h6 class="header-pretitle">Overview</h6>  
                            <h1 class="header-title">Offer Requests</h1>  
                        </div>  
                    </div>  
                </div>  
            </div>  
 
            <div class="container">  
                <div class="row justify-content-center">  
                    <div class="col-md-12">  
                        <div class="card">  
                            <div class="card-body">  
                                @if (session('status'))  
                                    <div class="alert alert-success" role="alert">  
                                        {{ session('status') }}  
                                    </div>  
                                @endif  

                                <div class="table-responsive">  
                                    <table class="table table-sm table-nowrap card-table yajra_datatable">  
                                        <thead>  
                                            <tr>  
                                                <th>Id</th>  
                                                <th>User ID</th>  
                                                <th>Plan</th>  
                                                <th>Buy</th>  
                                                <th>Expiry</th>  
                                                <th>Meal</th>  
                                                <th>Tea</th>  
                                                <th>Package</th>  
                                                <th>Request For</th>  
                                                <th>Status</th>  
                                                <th>Count Offered</th>  
                                                <th>Action</th>  
                                            </tr>  
                                        </thead>  
                                        <tbody>  
                                            <!-- Data will be loaded here via AJAX -->  
                                        </tbody>  
                                    </table>  
                                </div>  
                            </div>  
                        </div>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
@endsection  

@section('jscontent')  
<script src="https://code.jquery.com/jquery-3.7.1.js" crossorigin="anonymous"></script>  
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>  
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">  
   
    
    $(function() {
    var table = $('.yajra_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('offer-requests') }}",
        columns: [
            { data: 'id', name: 'id' },
            { data: 'user_id', name: 'user_id' },
            { data: 'plan', name: 'plan' },
            { data: 'buy', name: 'buy' },
            { data: 'expiry', name: 'expiry' },
            { data: 'meals', name: 'meals' },
            { data: 'tea', name: 'tea' },
            { data: 'package', name: 'package' },
            { data: 'request_for', name: 'request_for' },
            { data: 'status', name: 'status' },
            { data: 'count_offered', name: 'count_offered' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});

$(document).on('click', '.mark-approved', function() {
    var id = $(this).attr('id');
    Swal.fire({
        title: 'Mark as Approved?',
        html: '<input type="text" id="count_offered" class="swal2-input" placeholder="Enter count offered">',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approve it!',
        preConfirm: () => {
            const count_offered = document.getElementById('count_offered').value;
            if (!count_offered) {
                Swal.showValidationMessage('Please enter the count offered');
            }
            return count_offered;
        }
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/approve-offer-request/' + id,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    count_offered: result.value // Get the input value from SweetAlert
                },
                success: function(response) {
                    Swal.fire('Approved!', response.message, 'success');
                    location.reload(); // Reload the page to reflect changes
                },
                error: function(xhr) {
                    Swal.fire('Error!', xhr.responseJSON.message, 'error');
                }
            });
        }
    });
});

$(document).on('click', '.mark-delivered', function() {
    var id = $(this).attr('id');
    Swal.fire({
        title: 'Mark as Delivered?',
        html: '<p>Are you sure you want to mark this offer request as delivered?</p>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, mark as delivered!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/mark-delivered/' + id,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    Swal.fire('Delivered!', response.message, 'success');
                    location.reload(); // Reload the page to reflect changes
                },
                error: function(xhr) {
                    Swal.fire('Error!', xhr.responseJSON.message, 'error');
                }
            });
        }
    });
});
$(document).on('click', '.mark-rejected', function() { 
    var id = $(this).attr('id'); 
    Swal.fire({ 
        title: 'Mark as Rejected?', 
        text: 'Are you sure you want to reject this offer request?', 
        icon: 'warning', 
        showCancelButton: true, 
        confirmButtonColor: '#3085d6', 
        cancelButtonColor: '#d33', 
        confirmButtonText: 'Yes, reject it!' 
    }).then((result) => { 
        if (result.isConfirmed) { 
            $.ajax({ 
                url: '/reject-offer-request/' + id, 
                type: 'POST', 
                data: { 
                    _token: '{{ csrf_token() }}' 
                }, 
                success: function(response) { 
                    Swal.fire('Rejected!', response.message, 'success'); 
                    location.reload(); 
                }, 
                error: function(xhr) { 
                    Swal.fire('Error!', xhr.responseJSON.message, 'error'); 
                } 
            }); 
        } 
    }); 
});

</script> 


@endsection  
