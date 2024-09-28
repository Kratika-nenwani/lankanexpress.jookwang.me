@extends('index_main')
@section('csscontent')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            
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
                                Manage Promotions
                            </h1>

                        </div>

                    </div> <!-- / .row -->

                </div>
            </div>


            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>Manage Plan</h3>
                                <a data-bs-toggle="modal" href="#add_event" class="btn btn-dark btn-rounded float-end">Add Plans</a>
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
                                                <th>Type</th>
                                                <th>Caption</th>
                                                <th>Images</th>
                                                <th>Videos</th>
                                                <th>Shorts</th>
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
                                <h2 class="modal-title" id="sign_up_popupLabel2">Add Plans</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="twm-tabs-style-2">
                                    <form id="f" action="{{ route('save-promotion') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="tab-content" id="myTab2Content">
                                            <!--Login Candidate Content-->
                                            <div class="tab-pane fade show active" id="login-candidate">
                                                <div class="row">

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="type"><b>Type<span class="text-danger"> *</span></b></label>
                                                            <select name="type" id="type" class="form-control" required>
                                                                <option value="text">Text</option>
                                                                <option value="image">Image</option>
                                                                <option value="video">Video</option>
                                                                <option value="shorts">Shorts</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="caption"><b>Caption<span class="text-danger">
                                                                        *</span></b></label>
                                                            <input name="caption" type="text" id="caption" class="form-control" placeholder="Enter Title" >
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="images"><b>Images<span class="text-danger" >*</span></b></label>
                                                            <input name="images[]" type="file" class="form-control my-1">
                                                            <input name="images[]" type="file" class="form-control my-1">
                                                            <input name="images[]" type="file" class="form-control my-1">
                                                            <input name="images[]" type="file" class="form-control my-1">
                                                            <input name="images[]" type="file" class="form-control my-1">
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="video_link"><b>videos<span class="text-danger">
                                                                        *</span></b></label>
                                                            <input name="video_link" type="text" id="video_link" class="form-control" placeholder="Enter Title" >
                                                        </div>
                                                    </div>


                                                    <div class="col-lg-12">
                                                        <div class="form-group mb-3">
                                                            <label for="shorts_link"><b>Shorts
                                                                       </b></label>
                                                            <input name="shorts_link" type="text" id="shorts_link" class="form-control" placeholder="Enter Title">
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
            @foreach ($data as $promotion)
            <div style="width:100%;" class="modal fade twm-sign-up" id="editModal{{ $promotion->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel{{ $promotion->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{ $promotion->id }}">Edit city</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for editing blog -->
                            <form id="editForm{{ $promotion->id }}" action="{{ route('update-promotion', ['id' => $promotion->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content" id="myTab2Content">
                                    <!--Login Candidate Content-->
                                    <div class="tab-pane fade show active" id="login-candidate">
                                        <div class="row">

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="type"><b>Type</b></label>
                                                    <input name="type" type="text" id="type" class="form-control" value="{{ $promotion->type }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="caption"><b>Caption</b></label>
                                                    <input name="caption" type="text" id="caption" class="form-control" value="{{ $promotion->caption }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="images"><b>Images</b></label>
                                                    <input name="images[]" type="file" class="form-control my-1" >
                                                    <input name="images[]" type="file" class="form-control my-1">
                                                    <input name="images[]" type="file" class="form-control my-1">
                                                    <input name="images[]" type="file" class="form-control my-1">
                                                    <input name="images[]" type="file" class="form-control my-1">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="video_link"><b>Videos</b></label>
                                                    <input name="video_link" type="text" id="video_link" class="form-control" value="{{ $promotion->video_link }}">
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="short_link"><b>Shorts</b></label>
                                                    <input name="shorts_link" type="text" id="shorts_link" class="form-control" value="{{ $promotion->shorts_link }}">
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
    </div> <!-- / .row -->
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
            , ajax: "{{ route('promotions')}}"
            , columns: [{
                    data: 'id'
                    , name: 'id'
                },

                {
                    data: 'type'
                    , name: 'type'
                },

                {
                    data: 'caption'
                    , name: 'caption'
                },

                {
                    data: 'images'
                    , name: 'images'
                },

                {
                    data: 'video_link'
                    , name: 'video_link'
                }
                , {
                    data: 'shorts_link'
                    , name: 'shorts_link'
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
        var url = "{{ route('delete-promotion') }}";
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
