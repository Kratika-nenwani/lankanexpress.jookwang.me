@extends('index_main')
@section('csscontent')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Success Message -->
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Header -->
            <div class="header">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Pretitle -->
                            <h6 class="header-pretitle">
                                Overview
                            </h6>

                            <!-- Title -->
                            <h1 class="header-title">
                                Assign Quotes
                            </h1>

                        </div>
                     
                    </div> <!-- / .row -->
                </div>
            </div>

            <!-- Drop-off Point Assignment -->

        </div>
        <br>
        <br>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Quotes In Transit</h4>
                            <button class="btn btn-success" id="downloadCSV1">Download CSV</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-nowrap card-table yajra_datatable">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Track id</th>
                                        <th>Number of parcels</th>
                                        <th>Assigned</th>
                                        <th>Drop off points</th>
                                        <th>Amount</th>
                                        <th>Shipping Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0"> Assign DropOff Points To Quotes</h4>
                            <button class="btn btn-success" id="downloadCSV2">Download CSV</button>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table table-sm table-nowrap card-table yajra_datatable2">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Track id</th>
                                        <th>Number of parcels</th>
                                        <th>Assigned</th>
                                        <th>Drop off points</th>
                                        <th>Amount</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0">Other Quotes</h4>
                            <button class="btn btn-success" id="downloadCSV3">Download CSV</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-sm table-nowrap card-table yajra_datatable3">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Track id</th>
                                        <th>Number of parcels</th>
                                        <th>Assigned</th>
                                        <th>Drop off points</th>
                                        <th>Shipping Date</th>
                                        <th>Status</th>
                                        <th>Amount</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($quotes as $checkpoints)
    <div style="width:100%;" class="modal fade twm-sign-up" id="editModal{{ $checkpoints->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $checkpoints->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel{{ $checkpoints->id }}">Add Checkpoints</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing blog -->
                    <form id="editForm{{ $checkpoints->id }}" action="{{ route('save-checkpoints', ['quote_id' => $checkpoints->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      

                        <div class="tab-content" id="myTab2Content">
                            <!--Login Candidate Content-->
                            <div class="tab-pane fade show active" id="login-candidate">
                                <div class="row">
                                    
                                     <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                        <label for="dropofpoints_id"><b>Drop off point</b></label>
                                        <select id="quote-select" name="drop_of_points" class="form-select" aria-label="Select Quote">
                                        <option value="">Select Drop Off points</option>
                                        @foreach($data as $item)
                                        <option value="{{ $item->id }}" @if ($checkpoints->drop_of_points==$item->id) selected @endif>{{ $item->id }} - {{ $item->name }}</option>
                                        @endforeach
                                    </select></div></div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="title"><b>Title</b></label>
                                            <input name="title" type="text" id="title" class="form-control" value="{{ $checkpoints->title }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="address"><b>Address</b></label>
                                            <input name="address" type="text" id="address" class="form-control" value="{{ $checkpoints->address }}">
                                        </div>
                                    </div>




                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="date"><b>Date</b></label>
                                            <input name="date" type="date" id="date" class="form-control" value="{{ $checkpoints->date }}">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="time"><b>Time</b></label>
                                            <input name="time" type="text" id="time" class="form-control" value="{{ $checkpoints->time }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="country"><b>Country</b></label>
                                            <input name="country" type="text" id="country" class="form-control" value="{{ $checkpoints->country }}">
                                        </div>
                                    </div>
                                    <!--<div class="col-lg-12">-->
                                    <!--    <div class="form-group mb-3">-->
                                    <!--        <div class="form-check">-->
                                    <!--            <input class="form-check-input" type="checkbox" id="delivered-check" name="status" value="delivered">-->
                                    <!--            <label class="form-check-label" for="delivered-check">-->
                                    <!--                Mark as Delivered-->
                                    <!--            </label>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--</div>-->






                                    <div class="col-md-12" style="text-align: center;">
                                        <button id="submit" type="submit" class="btn btn-outline-dark"><i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Update</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    <!-- Modal -->
    
     @foreach ($quotes2 as $dropofpoints)
    <div style="width:100%;" class="modal fade twm-sign-up" id="editModal2{{$dropofpoints->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2{{ $dropofpoints->id }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2{{ $dropofpoints->id }}">Assign Dropoff Point</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing blog -->
                    <form id="editForm2{{ $dropofpoints->id }}" action="{{ route('save-dropofpoint', ['id' => $dropofpoints->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="tab-content" id="myTab2Content">
                            <!--Login Candidate Content-->
                            <div class="tab-pane fade show active" id="login-candidate">
                                <div class="row">

                                   
                                    <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                        <label for="dropofpoints_id"><b>dropofpoint</b></label>
                                        <select id="quote-select" name="drop_of_points" class="form-select" aria-label="Select Quote">
                                        <option value="">Select Drop Off points</option>
                                        @foreach($data as $item)
                                        <option value="{{ $item->id }}">{{ $item->id }} - {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                          
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12" style="text-align: center;">
                                        <button id="submit" type="submit" class="btn btn-outline-dark"><i class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Save</button>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    

</div>

@endsection
@section('jscontent')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(function() {

        var table = $('.yajra_datatable').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route('assignquotes')}}"
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }
                
                , {
                    data: 'track_id'
                    , name: 'track_id'
                },

                {
                    data: 'number_of_parcels'
                    , name: 'number_of_parcels'
                },

                {
                    data: 'is_assigned'
                    , name: 'is_assigned'
                },

                {
                    data: 'drop_of_points'
                    , name: 'drop_of_points'
                },

                {
                    data: 'total'
                    , name: 'total'
                },
                
                {
                    data: 'shipping_date'
                    , name: 'shipping_date'
                },
                {
                    data: 'status'
                    , name: 'status'
                },

                {
                    data: 'action'
                    , name: 'action'
                    , orderable: false
                    , searchable: false
                }
            , ]
        });
    });

</script>


<script type="text/javascript">
    $(function() {

        var table = $('.yajra_datatable2').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route('assignquotes2')}}"
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }
                
                , {
                    data: 'track_id'
                    , name: 'track_id'
                },

                {
                    data: 'number_of_parcels'
                    , name: 'number_of_parcels'
                },

                {
                    data: 'is_assigned'
                    , name: 'is_assigned'
                },

                {
                    data: 'drop_of_points'
                    , name: 'drop_of_points'
                },

                {
                    data: 'total'
                    , name: 'total'
                },

                {
                    data: 'action'
                    , name: 'action'
                    , orderable: false
                    , searchable: false
                }
            , ]
        });
    });

</script>


<script type="text/javascript">
    $(function() {

        var table = $('.yajra_datatable3').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route('assignquotes3')}}"
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }
                
                , {
                    data: 'track_id'
                    , name: 'track_id'
                },

                {
                    data: 'number_of_parcels'
                    , name: 'number_of_parcels'
                },

                {
                    data: 'is_assigned'
                    , name: 'is_assigned'
                },

                {
                    data: 'drop_of_points'
                    , name: 'drop_of_points'
                },
                {
                    data: 'shipping_date'
                    , name: 'shipping_date'
                },
                {
                    data: 'status'
                    , name: 'status'
                },


                {
                    data: 'total'
                    , name: 'total'
                },

                {
                    data: 'action'
                    , name: 'action'
                    , orderable: false
                    , searchable: false
                }
            , ]
        });
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '.delete', function() {
        var row_id = $(this).attr('id');
        var table_row = $(this).closest('tr');
        var url = "{{ route('delete-quote') }}";
        swal.fire({
            title: "Are you Sure?"
            , text: "You won't be able to revert this!"
            , icon: "warning"
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Yes, Delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get'
                    , url: url.replace(':id', row_id)
                    , data: {
                        _token: '{{ csrf_token() }}'
                        , id: row_id
                    , }
                    , success: function(data) {
                        swal.fire({
                            title: 'Deleted!'
                            , text: 'Your product has been deleted.'
                            , icon: 'success'
                            , confirmButtonText: 'OK'
                        }).then((result) => {
                            table_row.remove();
                        });
                    }
                });
            }
        })
    });

</script>
<script type="text/javascript">
    $(document).on('click', '.assign', function() {
        var row_id = $(this).attr('id');
        var table_row = $(this).closest('tr');
        var url = "{{ route('save-shipping-date') }}";
        
        swal.fire({
            title: "Select Shipping Date",
            html: `<input type="date" id="shipping-date" class="swal2-input" placeholder="Select a date">`,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Save',
            cancelButtonText: 'Close',
            showDenyButton: true,
            denyButtonText: 'Clear Date',
            preConfirm: () => {
                var selectedDate = $('#shipping-date').val();
                if (selectedDate === '' && !swal.getDenyButton().clicked) {
                    Swal.showValidationMessage('You need to select a date or choose to clear the date!');
                }
                return selectedDate;
            }
        }).then((result) => {
            if (result.isConfirmed || result.isDenied) {
                var selectedDate = result.isDenied ? null : result.value;
                
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: row_id,
                        shipping_date: selectedDate
                    },
                    success: function(data) {
                        if (data.success) {
                            swal.fire({
                                title: 'Saved!',
                                text: 'Shipping date has been updated.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                 location.reload();
                            });
                        } else {
                            swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while saving the shipping date.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    });
</script>

<!--<script type="text/javascript">-->
<!--    $(document).on('click', '.modify-status', function() {-->
<!--        var row_id = $(this).attr('id');-->
<!--        var url = "{{ route('modify-status') }}";-->

<!--        swal.fire({-->
<!--            title: "Select Status",-->
<!--            html: `-->
<!--                <select id="status-select" class="swal2-input">-->
<!--                    <option value="" disabled selected>Select a status</option>-->
<!--                    <option value="Pending">Pending</option>-->
<!--                    <option value="Processing">Processing</option>-->
<!--                    <option value="Placed">Placed</option>-->
<!--                    <option value="Transit">Transit</option>-->
<!--                    <option value="Delivered">Delivered</option>-->
<!--                    <option value="Cancelled1">Cancelled1</option>-->
<!--                    <option value="Cancelled2">Cancelled2</option>-->
<!--                </select>`,-->
<!--            showCancelButton: true,-->
<!--            confirmButtonColor: '#3085d6',-->
<!--            cancelButtonColor: '#d33',-->
<!--            confirmButtonText: 'Save',-->
<!--            cancelButtonText: 'Close',-->
<!--            showDenyButton: false,-->
<!--            preConfirm: () => {-->
<!--                var selectedStatus = $('#status-select').val();-->
<!--                if (!selectedStatus) {-->
<!--                    Swal.showValidationMessage('You need to select a status!');-->
<!--                }-->
<!--                return selectedStatus;-->
<!--            }-->
<!--        }).then((result) => {-->
<!--            if (result.isConfirmed) {-->
<!--                var selectedStatus = result.value;-->
                
<!--                $.ajax({-->
<!--                    type: 'POST',-->
<!--                    url: url,-->
<!--                    data: {-->
<!--                        _token: '{{ csrf_token() }}',-->
<!--                        id: row_id,-->
<!--                        status: selectedStatus-->
<!--                    },-->
<!--                    success: function(data) {-->
<!--                        if (data.success) {-->
<!--                            swal.fire({-->
<!--                                title: 'Saved!',-->
<!--                                text: 'Status has been updated.',-->
<!--                                icon: 'success',-->
<!--                                confirmButtonText: 'OK'-->
<!--                            }).then(() => {-->
<!--                                 location.reload();-->
<!--                            });-->
<!--                        } else {-->
<!--                            swal.fire({-->
<!--                                title: 'Error!',-->
<!--                                text: data.message,-->
<!--                                icon: 'error',-->
<!--                                confirmButtonText: 'OK'-->
<!--                            });-->
<!--                        }-->
<!--                    },-->
<!--                    error: function(xhr, status, error) {-->
<!--                        swal.fire({-->
<!--                            title: 'Error!',-->
<!--                            text: 'An error occurred while updating the status.',-->
<!--                            icon: 'error',-->
<!--                            confirmButtonText: 'OK'-->
<!--                        });-->
<!--                    }-->
<!--                });-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->
<script type="text/javascript">
    $(document).on('click', '.modify', function() {
        var row_id = $(this).attr('id');
        var url = "{{ route('modify-status') }}";

        swal.fire({
            title: "Confirm Status Update",
            text: "Are you sure you want to mark this item as Delivered?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, mark as Delivered',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: row_id,
                        status: 'Delivered'
                    },
                    success: function(data) {
                        if (data.success) {
                            swal.fire({
                                title: 'Updated!',
                                text: 'The status has been marked as Delivered.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                 location.reload();
                            });
                        } else {
                            swal.fire({
                                title: 'Error!',
                                text: data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr, status, error) {
                        swal.fire({
                            title: 'Error!',
                            text: 'An error occurred while updating the status.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    });
</script>



<!--    <script type="text/javascript">-->
<!--    function showDropoffPoints(quoteId) {-->
<!--        $.ajax({-->
<!--            url: '/get-dropoff-points/' + quoteId,-->
<!--            type: 'GET',-->
<!--            success: function(data) {-->
<!--                let dropdown = $('#dropoffPointsDropdown');-->
                <!--dropdown.empty(); // Clear any existing options-->

                <!--// Add a default option-->
<!--                dropdown.append('<option value="">Select Dropoff Point</option>');-->

                <!--// Populate the dropdown with new options-->
<!--                $.each(data, function(index, dropoffPoint) {-->
<!--                    dropdown.append('<option value="' + dropoffPoint.id + '">' + dropoffPoint.name + '</option>');-->
<!--                });-->

                <!--// Show the dropdown (or a modal with the dropdown)-->
<!--                $('#dropoffPointsModal').modal('show');-->
<!--            },-->
<!--            error: function(xhr) {-->
<!--                console.error('Failed to fetch drop-off points:', xhr);-->
<!--            }-->
<!--        });-->
<!--    }-->
<!--</script>-->

</script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>


<script>
function downloadTableAsCSV(tableClass, filename) {
    var table = document.querySelector(tableClass);
    var rows = table.querySelectorAll('tr');
    var csv = [];
    
    rows.forEach(row => {
        var cols = row.querySelectorAll('td, th');
        var rowData = [];
        cols.forEach((col, index) => {
            // Exclude last column (Action) by skipping it
            if (index !== cols.length - 1) {
                rowData.push('"' + col.innerText.replace(/"/g, '""') + '"'); // Escape double quotes
            }
        });
        csv.push(rowData.join(','));
    });

    var csvString = csv.join('\n'); // Correct line break
    var blob = new Blob([csvString], { type: 'text/csv;charset=utf-8;' });
    var link = document.createElement('a');
    link.href = URL.createObjectURL(blob);
    link.download = filename + '.csv';
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}

document.getElementById('downloadCSV1').addEventListener('click', function() {
    downloadTableAsCSV('.yajra_datatable', 'QuotesInTransit');
});

document.getElementById('downloadCSV2').addEventListener('click', function() {
    downloadTableAsCSV('.yajra_datatable2', 'AssignDropOffPointsToQuotes');
});

document.getElementById('downloadCSV3').addEventListener('click', function() {
    downloadTableAsCSV('.yajra_datatable3', 'OtherQuotes');
});

</script>




@endsection
