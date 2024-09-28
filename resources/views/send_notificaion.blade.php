@extends('index_main') 
 
@section('csscontent') 
    <!-- Add Bootstrap and Select2 CSS --> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> 
    <style> 
        /* General styling for form container */ 
        .form-container { 
            max-width: 700px; 
            margin: 50px auto; 
            padding: 30px; 
            background: linear-gradient(145deg, #fff6f6, #fdfdfd); 
            border-radius: 15px; 
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1); 
        } 
 
        /* Styling for form heading */ 
        .form-heading { 
            text-align: center; 
            font-size: 30px; 
            margin-bottom: 30px; 
            color: #dc3545; /* Use red for heading */ 
            font-weight: bold; 
        } 
 
        /* Customizing input fields */ 
        .form-control { 
            border-radius: 10px; 
            padding: 10px; 
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05); 
            transition: all 0.3s ease; 
            background-color: #fafafa; 
        } 
 
        /* Input fields hover and focus effects */ 
        .form-control:focus { 
            border-color: #dc3545; /* Red border on focus */ 
            box-shadow: 0 0 8px rgba(220, 53, 69, 0.2); /* Red focus shadow */ 
        } 
 
        /* Custom button styling */ 
        .btn-custom { 
            background-color: #dc3545; /* Red button */ 
            color: white; 
            padding: 10px 30px; 
            border-radius: 20px; 
            transition: background-color 0.3s ease; 
        } 
 
        /* Button hover effect */ 
        .btn-custom:hover { 
            background-color: #c82333; /* Darker red on hover */ 
        } 
 
        /* Custom styling for the select2 multi-select field */ 
        .select2-container--default .select2-selection--multiple { 
            border-radius: 10px; 
            border: 1px solid #ced4da; 
            padding: 10px; 
            background-color: #fafafa; 
        } 
 
        /* Customize Select2 selection options */ 
        .select2-container--default .select2-selection--multiple .select2-selection__choice { 
            background-color: #e2e6ea; /* Light grey for selected choices */ 
            color: #333; 
            border: none; 
            border-radius: 20px; 
            padding: 5px 10px; 
        } 
 
        /* Responsive design */ 
        @media (max-width: 768px) { 
            .form-container { 
                padding: 20px; 
            } 
 
            .btn-custom { 
                width: 100%; 
                padding: 15px; 
            } 
        } 
    </style> 
@endsection 
 
@section('content') 
    <div class="form-container"> 
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
 
        <div class="form-heading"> 
            Send Notifications 
        </div> 
 
        <!-- Correct the form action method -->
        <form method="POST" action="{{ route('save-notification') }}"> 
            @csrf 
            <!-- Multi-select field for users with name search functionality --> 
            <div class="mb-4"> 
                <label for="users" class="form-label">Select Users</label> 
                <select class="form-select" id="users" name="users[]" multiple> 
                    @foreach($user as $d) 
                    <?php  
                        $plan=DB::table('plans')->where('id',$d->membership)->value('name'); 
                    ?> 
                        <option value="{{ $d->id }}">{{$d->id}} - {{ $d->name }}  {{ $plan}} </option> 
                    @endforeach 
                </select> 
            </div> 
 
            <!-- Title Field --> 
            <div class="mb-4"> 
                <label for="title" class="form-label">Title</label> 
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required> 
            </div> 
 
            <!-- Address Field --> 
            <div class="mb-4"> 
                <label for="message" class="form-label">Message</label> 
                <input type="text" class="form-control" id="message" name="message" placeholder="Enter message" required> 
            </div> 
 
            <!-- Submit Button --> 
            <div class="text-center"> 
                <button type="submit" class="btn btn-custom">Submit</button> 
            </div> 
        </form> 
    </div> 
@endsection 
 
@section('jscontent') 
    <!-- Include jQuery and Select2 JS --> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> 
 
    <script> 
        $(document).ready(function() { 
            // Initialize Select2 for search and select functionality 
            $('#users').select2({ 
                placeholder: 'Search and select users', 
                allowClear: true 
            }); 
        }); 
    </script> 
@endsection
