@extends('index_main')
@section('csscontent')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
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
                                Manage Drop off points
                            </h1>

                        </div>
                      
                    </div> <!-- / .row -->
                    <!-- Success Message -->
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    <div class="row mt-4">
                        <div class="col-lg-3">
                            <form id="callagent-form" method="POST" action="{{ route('savecallagent') }}">
                                @csrf
                                <div class="form-group">
                                    <select id="quote-select" name="dropofpoints_id" class="form-select" aria-label="Select Quote">
                                        <option value="">Select Drop Off points</option>
                                        @foreach($data as $dropofpoints)
                                        <option value="{{ $dropofpoints->id }}">{{ $dropofpoints->id }} - {{ $dropofpoints->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <select id="callagent-select" name="assigned_callagent" class="form-select" aria-label="Select Call Agent">
                                    <option value="">Select Call Agent</option>
                                    @foreach($callAgents as $callAgent)
                                    <option value="{{ $callAgent->id }}">{{ $callAgent->id }}-{{ $callAgent->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">

                            <button type="submit" class="btn btn-primary">Assign Call Agent</button>
                        </div>
                        <div class="col-lg-3">
                            <button id="download-csv" class="btn btn-success">Download CSV</button>
                        </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                        <h3>Manage Drop off Points</h3>
                        <a data-bs-toggle="modal" href="#add_event" class="btn btn-dark btn-rounded float-end">Add Dropoff Points</a>
                       

                    </div>

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
                                            <th>name</th>
                                            <th>address</th>
                                            <th>number</th>
                                            <th>longitude</th>
                                            <th>latitude</th>
                                            <th>assigned_callagent</th>	
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
            <div style="width:100%;" class="modal fade twm-sign-up" id="add_event" aria-hidden="true" aria-labelledby="sign_up_popupLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h2 class="modal-title" id="sign_up_popupLabel2">Add dropofpoints</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="twm-tabs-style-2">
                                <form id="f" action="{{ route('savepoints') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tab-content" id="myTab2Content">
                                        <!--Login Candidate Content-->
                                        <div class="tab-pane fade show active" id="login-candidate">
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label for="name"><b>Name<span class="text-danger">
                                                                    *</span></b></label>
                                                        <input name="name" type="text" id="name" class="form-control" placeholder="Enter Name" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label for="address"><b>Address<span class="text-danger">
                                                                    *</span></b></label>
                                                        <input name="address" type="text" id="address" class="form-control" placeholder="Enter Address" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label for="number"><b>Number<span class="text-danger">
                                                                    *</span></b></label>
                                                        <input name="number" type="text" id="number" class="form-control" placeholder="Enter Number" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label for="longitude"><b>Longitude<span class="text-danger">
                                                                    *</span></b></label>
                                                        <input name="longitude" type="text" id="longitude" class="form-control" placeholder="Enter Longitude" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label for="latitude"><b>Latitude<span class="text-danger">
                                                                    *</span></b></label>
                                                        <input name="latitude" type="text" id="latitude" class="form-control" placeholder="Enter Name" required>
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
            </div>
        </div>
        @foreach ($data as $dropofpoint)
        <div style="width:100%;" class="modal fade twm-sign-up" id="editModal{{ $dropofpoint->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $dropofpoint->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $dropofpoint->id }}">Edit points</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for editing blog -->
                        <form id="editForm{{ $dropofpoint->id }}" action="{{ route('updatepoints', ['id' => $dropofpoint->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="tab-content" id="myTab2Content">
                                <!--Login Candidate Content-->
                                <div class="tab-pane fade show active" id="login-candidate">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="name"><b>name</b></label>
                                                <input name="name" type="text" id="name" class="form-control" value="{{ $dropofpoint->name }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="address"><b>Address</b></label>
                                                <input name="address" type="text" id="address" class="form-control" value="{{ $dropofpoint->address }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="number"><b>number</b></label>
                                                <input name="number" type="text" id="number" class="form-control" value="{{ $dropofpoint->number }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="longitude"><b>longitude</b></label>
                                                <input name="longitude" type="text" id="logitude" class="form-control" value="{{ $dropofpoint->longitude }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="latitude"><b>latitude</b></label>
                                                <input name="latitude" type="text" id="latitude" class="form-control" value="{{ $dropofpoint->latitude }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="assigned_callagent"><b>Assigned callagent</b></label>
                                                <input name="assigned_callagent" type="text" id="assigned_callagent" class="form-control" value="{{ $dropofpoint->assigned_callagent }}">
                                            </div>
                                        </div>

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
    </div>

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
            , ajax: "{{ route('drop-of-points')}}"
            , columns: [{
                    data: 'id'
                    , name: 'id'
                },

                {
                    data: 'name'
                    , name: 'name'
                },

                {
                    data: 'address'
                    , name: 'address'
                },

                {
                    data: 'number'
                    , name: 'number'
                },

                {
                    data: 'longitude'
                    , name: 'longitude'
                }
                , {
                    data: 'latitude'
                    , name: 'latitude'
                },

                {
                    data: 'assigned_callagent'
                    , name: 'assigned_callagent'
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
        var url = "{{ route('deletepoints') }}";
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

<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
<script type="text/javascript"> 
    $(document).ready(function() { 
        $('#download-csv').on('click', function() { 
            var table = $('.yajra_datatable').DataTable(); 
            
            // Fetch all data across all pages
            var data = table.rows({ search: 'applied' }).data(); // Get all data, including filtered data

            // Prepare CSV content 
            var csvContent = "data:text/csv;charset=utf-8,"; 
 
            // Add header row 
            var headers = ['Id', 'Name', 'Address', 'Number', 'Longitude', 'Latitude', 'Assigned Call Agent']; 
            csvContent += headers.join(",") + "\n"; 
 
            // Add data rows 
            data.each(function(row) { 
                var rowData = [ 
                    row.id, 
                    row.name, 
                    row.address, 
                    row.number, 
                    row.longitude, 
                    row.latitude, 
                    row.assigned_callagent 
                ]; 
                csvContent += rowData.join(",") + "\n"; 
            }); 
 
            // Create a download link and trigger click 
            var encodedUri = encodeURI(csvContent); 
            var link = document.createElement("a"); 
            link.setAttribute("href", encodedUri); 
            link.setAttribute("download", "drop_off_points.csv"); 
            document.body.appendChild(link); 
            link.click(); 
            document.body.removeChild(link); 
        }); 
    }); 
</script> 




@endsection
