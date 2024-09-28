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
                                View Checkpoints
                            </h1>

                        </div>
                        <div class="col-auto">

                        </div>
                    </div> <!-- / .row -->
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
                                            <th>quoteId</th>
                                            <th>title</th>
                                            <th>address</th>
                                            <th>date</th>
                                            <th>time</th>
                                            <th>country</th>
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

        @foreach ($data as $checkpoints)
        <div style="width:100%;" class="modal fade twm-sign-up" id="editModal{{ $checkpoints->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $checkpoints->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel{{ $checkpoints->id }}">Add Checkpoints</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form for editing blog -->
                        <form id="editForm{{ $checkpoints->id }}" action="{{ route('update-checkpoints', ['id' => $checkpoints->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="hidden" name="quote_id" value="{{ $checkpoints->quote_id }}"> --}}
                            <input type="hidden" id="quote_id" name="quote_id" value="{{ $id }}">

                            <div class="tab-content" id="myTab2Content">
                                <!--Login Candidate Content-->
                                <div class="tab-pane fade show active" id="login-candidate">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="title"><b>Title</b></label>
                                                <input name="title" type="text" id="title" class="form-control" value="{{ $checkpoints->title }}" >
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
                                                <input name="date" type="text" id="date" class="form-control" value="{{ $checkpoints->date }}" >
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="time"><b>Time</b></label>
                                                <input name="time" type="text" id="time" class="form-control" value="{{ $checkpoints->time }}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="country"><b>Country</b></label>
                                                <input name="country" type="text" id="country" class="form-control" value="{{ $checkpoints->country }}" >
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="delivered-check" name="status" value="delivered">
                                                    <label class="form-check-label" for="delivered-check">
                                                        Mark as Delivered
                                                    </label>
                                                </div>
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
        var id = $('#quote_id').val();
        var table = $('.yajra_datatable').DataTable({
            processing: true
            , serverSide: true
            , ajax: "{{ route('checkpoints', ['id' => ':id']) }}".replace(':id', id)
            , columns: [{
                    data: 'id'
                    , name: 'id'
                }
                , {
                    data: 'quote_id'
                    , name: 'quote_id'
                },

                {
                    data: 'title'
                    , name: 'title'
                },

                {
                    data: 'address'
                    , name: 'address'
                },

                {
                    data: 'date'
                    , name: 'date'
                },

                {
                    data: 'time'
                    , name: 'time'
                }
                , {
                    data: 'country'
                    , name: 'country'
                }
                , {
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
        var url = "{{ route('delete-checkpoints') }}";
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



@endsection
