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
            Add Checkpoints
        </div>

        <form action="{{ route('new-checkpoints') }}" method="POST">
            @csrf
            <!-- Multi-select field for drop-off points with name search functionality -->
            <div class="mb-4">
                <label for="dropoffPoints" class="form-label">Select Quotes</label>
                <select class="form-select" id="dropoffPoints" name="quote[]" multiple>
                    @foreach($dop as $d)
                        <option value="{{ $d->id }}">{{ $d->track_id }} | {{ $d->sender_name }} | {{ $d->service_type }}</option>
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
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter address" required>
            </div>

            <!-- Date Field -->
            <div class="mb-4">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>

            <!-- Time Field -->
            <div class="mb-4">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>

            <!-- Country Field -->
            <div class="mb-4">
                <label for="country" class="form-label">Country</label>
                <input type="text" class="form-control" id="country" name="country" placeholder="Enter country" required>
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
            $('#dropoffPoints').select2({
                placeholder: 'Search and select quotes',
                allowClear: true
            });
        });
    </script>
@endsection
