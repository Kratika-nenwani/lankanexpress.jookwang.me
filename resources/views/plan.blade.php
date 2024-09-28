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
                   Manage Plans
                </h1>

              </div>
             
            </div> <!-- / .row -->
            
          </div>
        </div>

        <!-- Card -->
       

            <!-- Search -->
         

            <!-- Dropdown -->
            

          </div>
          

          <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"
                           >
                            <h3>Manage Plan</h3>
                            <button type="button" id="downloadBtn" class="btn btn-success">
                                <i class="fas fa-file-csv"></i>Download
                                </button>
                            <!--<a data-bs-toggle="modal" href="#add_event" class="btn btn-dark btn-rounded float-end">Add Plans</a>-->
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
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Benefits</th>
                                        <th>Background</th>
                                        <th>Text</th>
                                        <th>Color</th>
                                        <!--<th>Action</th>-->
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
                            <h2 class="modal-title" id="sign_up_popupLabel2">Add Plans</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="twm-tabs-style-2">
                                <form id="f" action="{{ route('save-plan') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tab-content" id="myTab2Content">
                                        <!--Login Candidate Content-->
                                        <div class="tab-pane fade show active" id="login-candidate">
                                            <div class="row">
    
                                                <div class="col-lg-12">
                                                    <div class="form-group mb-3">
                                                        <label for="name"><b>Name<span class="text-danger">
                                                                    *</span></b></label>
                                                        <input name="name" type="text" id="name" class="form-control"
                                                            placeholder="Enter Title" required>
                                                    </div>
                                                </div>

                                                <div class="col-lg-12">
                                                  <div class="form-group mb-3">
                                                      <label for="price"><b>Price<span class="text-danger">
                                                                  *</span></b></label>
                                                      <input name="price" type="text" id="price" class="form-control"
                                                          placeholder="Enter Title" required>
                                                  </div>
                                              </div>
                                              

                                              <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="benefits"><b>Benefits<span class="text-danger">
                                                                *</span></b></label>
                                                    <input name="benefits" type="text" id="benefits" class="form-control"
                                                        placeholder="Enter Title" required>
                                                </div>
                                            </div>
                                            

                                            <div class="col-lg-12">
                                              <div class="form-group mb-3">
                                                  <label for="bg_color"><b>Background<span class="text-danger">
                                                              *</span></b></label>
                                                  <input name="bg_color" type="text" id="bg_color" class="form-control"
                                                      placeholder="Enter Title" required>
                                              </div>
                                          </div>
                                          

                                          <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="text_color"><b>TextColor<span class="text-danger">
                                                            *</span></b></label>
                                                <input name="text_color" type="text" id="text_color" class="form-control"
                                                    placeholder="Enter Title" required>
                                            </div>
                                        </div>
                                        

                                        <div class="col-lg-12">
                                          <div class="form-group mb-3">
                                              <label for="color"><b>Color<span class="text-danger">
                                                          *</span></b></label>
                                              <input name="color" type="text" id="color" class="form-control"
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
        @foreach ($data as $plan)
            <div style="width:100%;" class="modal fade twm-sign-up" id="editModal{{ $plan->id }}" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalLabel{{ $plan->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel{{ $plan->id }}">Edit Plan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Form for editing blog -->
                            <form id="editForm{{ $plan->id }}" action="{{ route('update-plan', ['id' => $plan->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content" id="myTab2Content">
                                    <!--Login Candidate Content-->
                                    <div class="tab-pane fade show active" id="login-candidate">
                                        <div class="row">
    
                                            <div class="col-lg-12">
                                                <div class="form-group mb-3">
                                                    <label for="name"><b>Name<span class="text-danger">
                                                                *</span></b></label>
                                                    <input name="name" type="text" id="name" class="form-control"
                                                        value="{{ $plan->name }}" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                              <div class="form-group mb-3">
                                                  <label for="price"><b>Price<span class="text-danger">
                                                              *</span></b></label>
                                                  <input name="price" type="text" id="price" class="form-control"
                                                      value="{{ $plan->price }}" required>
                                              </div>
                                          </div>

                                          <div class="col-lg-12">
                                            <div class="form-group mb-3">
                                                <label for="benefits"><b>Benefits<span class="text-danger"> *</span></b></label>
                                                <input name="benefits" type="text" id="benefits" class="form-control"
                                                    value="{{ json_encode($plan->benefits) }}" required>
                                            </div>
                                        </div>
        

                                        <div class="col-lg-12">
                                          <div class="form-group mb-3">
                                              <label for="bg_color"><b>Background<span class="text-danger">
                                                          *</span></b></label>
                                              <input name="bg_color" type="text" id="bg_color" class="form-control"
                                                  value="{{ $plan->bg_color }}" required>
                                          </div>
                                      </div>

                                      <div class="col-lg-12">
                                        <div class="form-group mb-3">
                                            <label for="text_color"><b>TextColor<span class="text-danger">
                                                        *</span></b></label>
                                            <input name="text_color" type="text" id="text_color" class="form-control"
                                                value="{{ $plan->text_color }}" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                      <div class="form-group mb-3">
                                          <label for="color"><b>Color<span class="text-danger">
                                                      *</span></b></label>
                                          <input name="color" type="text" id="color" class="form-control"
                                              value="{{ $plan->color }}" required>
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
            ajax: "{{ route('plan')}}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
              
                {
                    data: 'name',
                    name: 'name'
                },

                {
                    data: 'price',
                    name: 'price'
                },

                {
                    data: 'benefits',
                    name: 'benefits'
                },

                {
                    data: 'bg_color',
                    name: 'bg_color'
                },
                {
                    data: 'text_color',
                    name: 'text_color'
                },
                {
                    data: 'color',
                    name: 'color'
                },
                // {
                //     data: 'action',
                //     name: 'action',
                //     orderable: false,
                //     searchable: false
                // },
            ]
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).on('click', '.delete', function() {
        var row_id = $(this).attr('id');
        var table_row = $(this).closest('tr');
        var url = "{{route('delete-plan')}}";
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