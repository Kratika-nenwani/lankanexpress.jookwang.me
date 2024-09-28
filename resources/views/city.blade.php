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
                  Manage City
                </h1>

              </div>
              <div class="col-auto">

                <!-- Button -->
                <!--<a href="#" class="btn btn-primary lift">-->
                <!--  New order-->
                <!--</a>-->

              </div>
            </div> <!-- / .row -->
            {{-- <div class="row align-items-center">
              <div class="col">

                <!-- Nav -->
                <ul class="nav nav-tabs nav-overflow header-tabs">
                  <li class="nav-item">
                    <a href="#!" class="nav-link active">
                      All <span class="badge rounded-pill text-bg-secondary-subtle">823</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link">
                      Pending <span class="badge rounded-pill text-bg-secondary-subtle">24</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link">
                      Processing <span class="badge rounded-pill text-bg-secondary-subtle">3</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#!" class="nav-link">
                      Refunded <span class="badge rounded-pill text-bg-secondary-subtle">71</span>
                    </a>
                  </li>
                </ul>

              </div>
            </div> --}}
          </div>
        </div>

        <!-- Card -->
        <div class="card" data-list='{"valueNames": ["orders-order", "orders-product", "orders-date", "orders-total", "orders-status", "orders-method"]}'>
          <div class="card-header">

            <!-- Search -->
            <form>
              <div class="input-group input-group-flush input-group-merge input-group-reverse">
                <input class="form-control list-search" type="search" placeholder="Search">
                <span class="input-group-text">
                  <i class="fe fe-search"></i>
                </span>
              </div>
            </form>

            <!-- Dropdown -->
            <div class="dropdown">
              <button class="btn btn-sm btn-white dropdown-toggle" type="button" id="bulkActionDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bulk action
              </button>
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="bulkActionDropdown">
                <a class="dropdown-item" href="#!">Action</a>
                <a class="dropdown-item" href="#!">Another action</a>
                <a class="dropdown-item" href="#!">Something else here</a>
              </div>
            </div>

          </div>
          {{-- <div class="table-responsive">
           
            <table class="table table-sm table-nowrap card-table yajra_datatable">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Country Id</th>
                      <th>name</th>
                      <th>Action</th>
                  </tr>
              </thead>

              <tbody>
                 
              </tbody>
           </table>

          </div> --}}

          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"
                           >
                            <h3>Manage City</h3>
                            <a data-bs-toggle="modal" href="#add_event" class="btn btn-dark btn-rounded float-end">Add City</a>
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
                                        <th>Country Id</th>
                                        <th>name</th>
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
                            <h2 class="modal-title" id="sign_up_popupLabel2">Add Country</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="twm-tabs-style-2">
                                <form id="f" action="{{ route('save-city',['id' => $id ]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" id="cat_id" name="id" value="{{ $id }}">
                                    <div class="tab-content" id="myTab2Content">
                                        <!--Login Candidate Content-->
                                        <div class="tab-pane fade show active" id="login-candidate">
                                            <div class="row">
                                              <input type="hidden" id="cat_id" name="id" value="{{ $id }}">
                                              <div class="col-lg-12">
                                                  <div class="form-group mb-3">
                                                      <label for="country_id"><b>Country</b></label>
                                                      <select class="form-control" name="country_id" id="country_id" >
                                                         <option value="{{ $id }}">{{ $name->name }}</option>
                                                      </select>
                                                  </div>
                                              </div>

    
                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label for="name"><b>Name<span class="text-danger">
                                                                    *</span></b></label>
                                                        <input name="name" type="text" id="name" class="form-control"
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
        @foreach ($data as $city)
            <div style="width:100%;" class="modal fade twm-sign-up" id="editModal{{ $city->id }}" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel{{ $city->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{ $city->id }}">Edit city</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for editing blog -->
                            <form id="editForm{{ $city->id }}" action="{{ route('update-city', ['id' => $city->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content" id="myTab2Content">
                                    <!--Login Candidate Content-->
                                    <div class="tab-pane fade show active" id="login-candidate">
                                        <div class="row">

                                          {{-- <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="country_id"><b>Country</b></label>
                                                <select class="form-control" name="country_id" id="country_id" required>
                                                    @foreach ($cities as $country)
                                                        <option value="{{ $country->id }}">
                                                            {{ $country->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
    
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="name"><b>name<span class="text-danger">
                                                                *</span></b></label>
                                                    <input name="name" type="text" id="name" class="form-control"
                                                        value="{{ $city->name }}" required>
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
      var id = $('#cat_id').val();
        var table = $('.yajra_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('city', ['id' => ':id']) }}".replace(':id', id),
            columns: [{
                    data: 'id',
                    name: 'id'
                },
              
                {
                    data: 'country_id',
                    name: 'country_id'
                },

                {
                    data: 'name',
                    name: 'name'
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
        var url = "{{ route('delete-city') }}";
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