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
                                    Quotes
                                </h1>

                            </div>
                        </div> <!-- / .row -->
                    </div>
                </div>


                <!-- Drop-off Point Assignment -->
                <div class="row mt-4">
                    <div class="col-lg-12">
                        <form id="dropoff-form" method="POST" action="{{ route('assignpoints') }}"
                            class="d-flex align-items-center">
                            @csrf
                            <div class="form-group col-lg-4">
                                <select id="quote-select" name="quote_id" class="form-select" aria-label="Select Quote"
                                    required>
                                    <option value="">Select Track Id</option>
                                    @foreach ($data as $quote)
                                        <option value="{{ $quote->id }}">{{ $quote->id }} - {{ $quote->track_id }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;
                            &nbsp;
                            <div class="form-group col-lg-4">
                                <select id="drop_of_points" name="drop_of_points" class="form-select"
                                    aria-label="Select Drop-off Point" required>
                                    @foreach ($dropofPoints as $dropofPoint)
                                        <option value="{{ $dropofPoint->id }}">{{ $dropofPoint->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Assign Drop-off Point</button>
                                <button type="button" id="downloadBtn" class="btn btn-success">
                                <i class="fas fa-file-csv"></i>Download
                            </button>
                            </div>
                            
                        </form>
                    </div>
                </div>
    


            </div>

            <br>
            <br>


            <!-- Card -->
            <div class="card"
                data-list='{"valueNames": ["orders-order", "orders-product", "orders-date", "orders-total", "orders-status", "orders-method"]}'>

                <div class="table-responsive">

                    <table class="table table-sm table-nowrap card-table yajra_datatable">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                <th>Track id</th>
                                <th>Number of parcels</th>
                                <th>Assigned</th>
                                <th>Drop off points</th>
                                <th>Amount</th>
                                <th>Loyality Points</th>

                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>

                </div>
                @foreach ($data as $quote)
                    <div style="width:100%;" class="modal fade twm-sign-up" id="editModal{{ $quote->id }}" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalLabel{{ $quote->id }}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{ $quote->id }}">Update Quote</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Form for editing quote -->
                                    <form id="editForm{{ $quote->id }}"
                                        action="{{ route('update-quote', ['id' => $quote->id]) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="tab-content" id="myTab2Content">
                                            <div class="tab-pane fade show active" id="login-candidate">
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="user_id"><b>User</b></label>
                                                            <?php
                                                            $name = DB::table('users')
                                                                ->where('id', $quote->user_id)
                                                                ->value('name');
                                                            ?>
                                                            <input type="text" name="user_name" id="user_name"
                                                                class="form-control" value="{{ $name }}" disabled
                                                                required>
                                                            <input type="hidden" name="user_id" id="user_id"
                                                                value="{{ $quote->user_id }}">
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="track_id"><b>Track ID</b></label>
                                                            <input type="text" name="track_id" id="track_id"
                                                                class="form-control" value="{{ $quote->track_id }}"
                                                                disabled required>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="service_type"><b>Service Type</b></label>
                                                            <select name="service_type" class="form-control service_type"
                                                                required" required>
                                                                <option value="AIR FREIGHT"
                                                                    @if ($quote->service_type == 'AIR FREIGHT') selected @endif>AIR
                                                                    FREIGHT</option>
                                                                <option value="SEA FREIGHT"
                                                                    @if ($quote->service_type == 'SEA FREIGHT') selected @endif>SEA
                                                                    FREIGHT</option>
                                                                <option value="ROAD TRANSPORT"
                                                                    @if ($quote->service_type == 'ROAD TRANSPORT') selected @endif>ROAD
                                                                    TRANSPORT</option>
                                                                <option value="3PL SERVICES"
                                                                    @if ($quote->service_type == '3PL SERVICES') selected @endif>3PL
                                                                    SERVICES</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 additional_services_container"
                                                        style="display: none;">
                                                        <div class="form-group mb-3">
                                                            <label for="additional_services"><b>Additional
                                                                    Services</b></label>
                                                            <select name="additional_services"
                                                                class="form-control additional_services" required>
                                                                <option value="UPB OPERATION"
                                                                    @if ($quote->additional_services == 'UPB OPERATION') selected @endif>UPB
                                                                    OPERATION</option>
                                                                <option value="CUSTOM CLEARANCES"
                                                                    @if ($quote->additional_services == 'CUSTOM CLEARANCES') selected @endif>
                                                                    CUSTOM CLEARANCES</option>
                                                                <option value="BONDED TRUCKS"
                                                                    @if ($quote->additional_services == 'BONDED TRUCKS') selected @endif>
                                                                    BONDED TRUCKS</option>
                                                                <option value="INTERNATIONAL WAREHOUSING"
                                                                    @if ($quote->additional_services == 'INTERNATIONAL WAREHOUSING') selected @endif>
                                                                    INTERNATIONAL WAREHOUSING</option>
                                                                <option value="BONDED WAREHOUSING"
                                                                    @if ($quote->additional_services == 'BONDED WAREHOUSING') selected @endif>
                                                                    BONDED WAREHOUSING</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="container_transport"><b>Container Transport
                                                                </b></label>
                                                            <input type="hidden" name="container_transportation"
                                                                value="0">
                                                            <input type="checkbox" name="container_transportation"
                                                                id="container_transport" class="form-check-input"
                                                                value="true"
                                                                {{ $quote->container_transportation == '1' ? 'checked' : '' }}>
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="parcel_deliveries"><b>Parcel Deliveries</b></label>
                                                            <input type="hidden" name="parcel_deliveries"
                                                                value="0">
                                                            <input name="parcel_deliveries" type="checkbox"
                                                                id="parcel_deliveries" class="form-check-input"
                                                                value="{{ $quote->parcel_deliveries == '1' ? 'checked' : '' }}">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="sender_name"><b>Sender Name</b></label>
                                                            <input name="sender_name" type="text" id="sender_name"
                                                                class="form-control" value="{{ $quote->sender_name }}"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="sender_phone"><b>Sender Phone</b></label>
                                                            <input name="sender_phone" type="text" id="sender_phone"
                                                                class="form-control" value="{{ $quote->sender_phone }}"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="sender_email"><b>Sender Email</b></label>
                                                            <input name="sender_email" type="text" id="sender_email"
                                                                class="form-control" value="{{ $quote->sender_email }}"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="sender_id"><b>Sender ID</b></label>
                                                            <input name="sender_id" type="text" id="sender_id"
                                                                class="form-control" value="{{ $quote->sender_id }}"
                                                                required>
                                                        </div>
                                                    </div>

                                                    <!--<div class="col-lg-12">-->
                                                    <!--    <div class="form-group mb-3">-->
                                                    <!--        <label for="sender_image"><b>Sender Image</b></label>-->
                                                    <!--        <input name="sender_image" type="file" id="sender_id" class="form-control">-->
                                                    <!--    </div>-->
                                                    <!--</div>-->

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="sender_pickup_address"><b>Sender Pickup
                                                                    Address</b></label>
                                                            <input name="sender_pickup_address" type="text"
                                                                id="sender_pickup_address" class="form-control"
                                                                value="{{ $quote->sender_pickup_address }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="sender_street_address"><b>Sender Street
                                                                    Address</b></label>
                                                            <input name="sender_street_address" type="text"
                                                                id="sender_street_address" class="form-control"
                                                                value="{{ $quote->sender_street_address }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="sender_city"><b>Sender City</b></label>
                                                            <input name="sender_city" type="text" id="sender_city"
                                                                class="form-control" value="{{ $quote->sender_city }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="sender_state"><b>Sender State</b></label>
                                                            <input name="sender_state" type="text" id="sender_state"
                                                                class="form-control" value="{{ $quote->sender_state }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="sender_country"><b>Sender Country</b></label>
                                                            <input name="sender_country" type="text"
                                                                id="sender_country" class="form-control"
                                                                value="{{ $quote->sender_country }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="receiver_delivery_address"><b>Receiver Delivery
                                                                    Address</b></label>
                                                            <input name="receiver_delivery_address" type="text"
                                                                id="receiver_delivery_address" class="form-control"
                                                                value="{{ $quote->receiver_delivery_address }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="sender_image"><b>Receiver Street
                                                                    Address</b></label>
                                                            <input name="receiver_street_address" type="text"
                                                                id="sender_id" class="form-control"
                                                                value="{{ $quote->receiver_street_address }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="receiver_city"><b>Receiver City</b></label>
                                                            <input name="receiver_city" type="text"
                                                                class="form-control" value="{{ $quote->receiver_city }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="receiver_state"><b>Receiver State</b></label>
                                                            <input name="receiver_state" type="text"
                                                                class="form-control" value="{{ $quote->receiver_state }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="receiver_country"><b>Receiver Country</b></label>
                                                            <input name="receiver_country" type="text"
                                                                class="form-control"
                                                                value="{{ $quote->receiver_country }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="receiver_country"><b>Receiver Country</b></label>
                                                            <input name="receiver_country" type="text"
                                                                class="form-control"
                                                                value="{{ $quote->receiver_country }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="number_of_parcels"><b>Number of Parcels</b></label>
                                                            <input name="number_of_parcels" type="text"
                                                                id="number_of_parcels" class="form-control"
                                                                value="{{ $quote->number_of_parcels }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="weight"><b>Weight (kg)</b></label>
                                                            <input name="weight" type="text" id="weight"
                                                                class="form-control" value="{{ $quote->weight }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="length"><b>Length (cm)</b></label>
                                                            <input name="length" type="text" id="length"
                                                                class="form-control" value="{{ $quote->length }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="height"><b>Height (cm)</b></label>
                                                            <input name="height" type="text" id="height"
                                                                class="form-control" value="{{ $quote->height }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="width"><b>Width (cm)</b></label>
                                                            <input name="width" type="text" id="width"
                                                                class="form-control" value="{{ $quote->width }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="content"><b>Content Description</b></label>
                                                            <input name="content" type="text" id="content"
                                                                class="form-control" value="{{ $quote->content }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="item_value"><b>Item Value (USD)</b></label>
                                                            <input name="item_value" type="text" id="item_value"
                                                                class="form-control" value="{{ $quote->item_value }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="insurance_level"><b>Insurance Level</b></label>
                                                            <select name="insurance_level" id="insurance_level"
                                                                class="form-control" required>
                                                                <option value="Level 1 - LKR 25,000"
                                                                    @if ($quote->insurance_level == 'Level 1 - LKR 25,000') selected @endif>Level
                                                                    1 - LKR 25,000</option>
                                                                <option value="Level 2 - LKR 50,000"
                                                                    @if ($quote->insurance_level == 'Level 2 - LKR 50,000') selected @endif>
                                                                    Level 2 - LKR 50,000</option>
                                                                <option value="Level 3 - LKR 75,000"
                                                                    @if ($quote->insurance_level == 'Level 3 - LKR 75,000') selected @endif>
                                                                    Level 3 - LKR 75,000</option>
                                                                <option value="Level 4 - LKR 100,000"
                                                                    @if ($quote->insurance_level == 'Level 4 - LKR 100,000') selected @endif>
                                                                    Level 4 - LKR 100,000</option>
                                                                <option value="Level 5 - Specific Insurance Cover"
                                                                    @if ($quote->insurance_level == 'Level 5 - Specific Insurance Cover') selected @endif>
                                                                    Level 5 - Specific Insurance Cover</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12 d-none">
                                                        <div class="form-group mb-3">
                                                            <label for="drop_of_points"><b>Drop Off Points</b></label>
                                                            <input name="drop_of_points" type="text"
                                                                id="drop_of_points" class="form-control"
                                                                value="{{ $quote->drop_of_points }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="total"><b>Amount</b></label>
                                                            <input name="total" type="text" id="total"
                                                                class="form-control" value="{{ $quote->total }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <!-- Add more fields as per your requirements -->
                                                    <div class="col-md-12" style="text-align: center;">
                                                        <button id="submit" type="submit"
                                                            class="btn btn-outline-dark"><i
                                                                class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Update</button>
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
    </div> <!-- / .row -->

@endsection
@section('jscontent')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
    <script>
        $(document).ready(function() {
            function toggleAdditionalServices() {
                $('.service_type').each(function() {
                    var $this = $(this);
                    var $container = $this.closest('.col-lg-12').next('.additional_services_container');
                    if ($this.val() === '3PL SERVICES') {
                        $container.show();
                    } else {
                        $container.hide();
                    }
                });
            }

            // Initial state
            toggleAdditionalServices();

            // Change event
            $(document).on('change', '.service_type', function() {
                toggleAdditionalServices();
            });
        });
    </script>




    <script type="text/javascript">
        $(function() {

            var table = $('.yajra_datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('quote') }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    }, {
                        data: 'user_id',
                        name: 'user_id'
                    }, {
                        data: 'track_id',
                        name: 'track_id'
                    },

                    {
                        data: 'number_of_parcels',
                        name: 'number_of_parcels'
                    },

                    {
                        data: 'is_assigned',
                        name: 'is_assigned'
                    },

                    {
                        data: 'drop_of_points',
                        name: 'drop_of_points'
                    },

                    {
                        data: 'total',
                        name: 'total'
                    },
                    {
                        data: 'loyality_points',
                        name: 'loyality_points'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
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
                title: "Are you Sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'get',
                        url: url.replace(':id', row_id),
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: row_id,
                        },
                        success: function(data) {
                            swal.fire({
                                title: 'Deleted!',
                                text: 'Your product has been deleted.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                table_row.remove();
                            });
                        }
                    });
                }
            })
        });
    </script>
    <script>
    document.getElementById('downloadBtn').addEventListener('click', function() {
        var csv = [];
        var rows = document.querySelectorAll('.yajra_datatable tr');

        for (var i = 0; i < rows.length; i++) {
            var row = [];
            var cols = rows[i].querySelectorAll('td, th');

            for (var j = 0; j < cols.length - 1; j++) {  // Exclude the last column
                row.push(cols[j].innerText);
            }

            csv.push(row.join(','));
        }

        var csvFile;
        var downloadLink;

        // Create a CSV file
        csvFile = new Blob([csv.join('\n')], { type: 'text/csv' });

        // Create a link element
        downloadLink = document.createElement('a');

        // Set the file name
        downloadLink.download = 'table_data.csv';

        // Create a link to the file
        downloadLink.href = window.URL.createObjectURL(csvFile);

        // Make the link visible
        downloadLink.style.display = 'none';
        document.body.appendChild(downloadLink);

        // Click the link to trigger the download
        downloadLink.click();
    });
</script>


    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
@endsection
