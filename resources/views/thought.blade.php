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
                  Manage Thoughts
                </h1>

              </div>
             
            </div> <!-- / .row -->
          

          </div>
        

          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"
                           >
                            <h3>Manage Thought</h3>
                            <a data-bs-toggle="modal" href="#add_event" class="btn btn-dark btn-rounded float-end">Add Thought</a>
                        </div>
    
                        <div class="card-body" >
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
                                        <!--<th>quote</th>-->
                                        <th>thought</th>
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
            <div style="width:100%;" class="modal fade twm-sign-up" id="add_event" aria-hidden="true"
                aria-labelledby="sign_up_popupLabel2" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
    
                        <div class="modal-header">
                            <h2 class="modal-title" id="sign_up_popupLabel2">Add Thought</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="twm-tabs-style-2">
                                <form id="f" action="{{ route('save-thought') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tab-content" id="myTab2Content">
                                        <!--Login Candidate Content-->
                                        <div class="tab-pane fade show active" id="login-candidate">
                                            <div class="row">
    
                                                <!--<div class="col-lg-12">-->
                                                <!--    <div class="form-group mb-3">-->
                                                <!--        <label for="quote"><b>Quote<span class="text-danger">-->
                                                <!--                    *</span></b></label>-->
                                                <!--        <input name="quote" type="text" id="quote" class="form-control"-->
                                                <!--            placeholder="Enter Title" required>-->
                                                <!--    </div>-->
                                                <!--</div>-->

                                                <div class="col-lg-12">
                                                  <div class="form-group mb-3">
                                                      <label for="thought"><b>Thought<span class="text-danger">
                                                                  *</span></b></label>
                                                      <input name="thought" type="text" id="thought" class="form-control"
                                                          placeholder="Enter Title" required>
                                                  </div>
                                              </div>
                                                
    
                                                <div class="col-md-12" style="text-align: center;">
                                                    <button id="submit" type="submit" class="btn btn-outline-dark"><i
                                                            class="fa fa-upload"></i>&nbsp;&nbsp;&nbsp;Save</button>
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
        @foreach ($data as $thoughts)
            <div style="width:100%;" class="modal fade twm-sign-up" id="editModal{{ $thoughts->id }}" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel{{ $thoughts->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{ $thoughts->id }}">Edit city</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for editing blog -->
                            <form id="editForm{{ $thoughts->id }}" action="{{ route('update-thought', ['id' => $thoughts->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content" id="myTab2Content">
                                    <!--Login Candidate Content-->
                                    <div class="tab-pane fade show active" id="login-candidate">
                                        <div class="row">
    
                                            <!--<div class="col-lg-12">-->
                                            <!--    <div class="form-group mb-3">-->
                                            <!--        <label for="quote"><b>Quote<span class="text-danger">-->
                                            <!--                    *</span></b></label>-->
                                            <!--        <input name="quote" type="text" id="quote" class="form-control"-->
                                            <!--            value="{{ $thoughts->quote }}" required>-->
                                            <!--    </div>-->
                                            <!--</div>-->

                                            <div class="col-lg-12">
                                              <div class="form-group mb-3">
                                                  <label for="thought"><b>Thought<span class="text-danger">
                                                              *</span></b></label>
                                                  <input name="thought" type="text" id="thought" class="form-control"
                                                      value="{{ $thoughts->thought }}" required>
                                              </div>
                                          </div>
                                            
                                            <div class="col-md-12" style="text-align: center;">
                                                <button id="submit" type="submit" class="btn btn-outline-dark"><i
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
  </div>
@endsection
@section('jscontent')

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(function() {
      
        var table = $('.yajra_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('thought')}}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
              
                // {
                //     data: 'quote',
                //     name: 'quote'
                // },

                {
                    data: 'thought',
                    name: 'thought'
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
        var url = "{{ route('delete-thought') }}";
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
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>


    
@endsection