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
                  Orders
                </h1>

              </div>
              <div class="col-auto">

                <!-- Button -->
                <a href="#" class="btn btn-primary lift">
                  New order
                </a>

              </div>
            </div> <!-- / .row -->
            <div class="row align-items-center">
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
            </div>
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
          <div class="table-responsive">
           
            <table class="table table-sm table-nowrap card-table yajra_datatable">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Transection </th>
                      <th>Sende name</th>
                      <th>Sender phone</th>
                      <th>Sender email</th>
                      <th>Sender Pickup</th>
                      <th>Sender Street</th>
                      <th>City</th>
                      <th>Action</th>
                  </tr>
              </thead>

              <tbody>
                 
              </tbody>
          </table>

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
      console.log('yes');
        var table = $('.yajra_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('orders')}}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'transaction_id',
                    name: 'transaction_id'
                },
                {
                    data: 'sender_name',
                    name: 'sender_name'
                },

                {
                    data: 'sender_phone',
                    name: 'sender_phone'
                },

                {
                    data: 'sender_email',
                    name: 'sender_email'
                },

                {
                    data: 'sender_pickup_address',
                    name: 'sender_pickup_address'
                },
                {
                    data: 'sender_street_address',
                    name: 'sender_street_address'
                },
                {
                    data: 'sender_city',
                    name: 'sender_city'
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
        var url = "#";
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