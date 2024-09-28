@extends('index_main')
@section('csscontent')
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container-fluid {
            padding: 20px;
        }

        .header {
            padding: 20px 0;
            border-bottom: 2px solid #ddd;
        }

        .header-title {
            font-size: 24px;
            color: #333;
        }

        .transport-option {
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: background 0.3s, box-shadow 0.3s;
        }

        .transport-option:hover {
            background: #f5f5f5;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .transport-option label {
            font-size: 16px;
            font-weight: bold;
            color: #333;
        }

        .next-button {
            background-color: #e74c3c;
            color: white;
            padding: 10px 30px;
            border: none;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .next-button:hover {
            background-color: #c0392b;
        }

        .three-pl-services {
            display: none;
            margin-top: 20px;
        }

        .three-pl-services button {
            margin: 5px;
            padding: 10px 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .three-pl-services button:hover {
            background-color: #f1f1f1;
            border-color: #bbb;
        }

        .three-pl-services button.active {
            background-color: #e0e0e0;
            border-color: #999;
        }

        .form-section {
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .form-section h3 {
            margin-bottom: 15px;
            font-size: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .form-group input, 
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-group input:focus, 
        .form-group select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(38, 143, 255, 0.5);
        }

        .form-group input[type="file"] {
            padding: 0;
        }

        .submit-button {
            background-color: #e74c3c;
            color: white;
            padding: 15px 30px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-button:hover {
            background-color: #c0392b;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-size: 16px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
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
                               Quote Form
                            </h1>

                        </div>
                     
                    </div> <!-- / .row -->
                </div>
            </div>
<div class="container">
    <h3 class="my-4">I want to transport via</h3>
    <form method="POST" action="{{ route('save_quote') }}" enctype="multipart/form-data">
        @csrf

        <!-- Transport options -->
        <div class="transport-option">
            <label for="AIR FREIGHT">AIR FREIGHT</label>
            <input type="radio" name="service_type" id="air-freight" value="AIR FREIGHT">
        </div>

        <div class="transport-option">
            <label for="SEA FREIGHT">SEA FREIGHT</label>
            <input type="radio" name="service_type" id="sea-freight" value="SEA FREIGHT">
        </div>

        <div class="transport-option">
            <label for="ROAD TRANSPORT">ROAD TRANSPORTATION</label>
            <input type="radio" name="service_type" id="road-transport" value="ROAD TRANSPORTATION">
        </div>

        <div class="transport-option">
            <label for="3PL SERVICES">3PL SERVICES</label>
            <input type="radio" name="service_type" id="3PL SERVICES" value="3PL SERVICES">
        </div>

        <!-- 3PL Services Selection (Hidden by Default) -->
        <div class="three-pl-services" id="three-pl-services" style="display: none;">
            <h4>Choose your 3PL Service</h4>
            <button type="button" class="three-pl-option" data-value="UPB OPERATIONS">UPB OPERATIONS</button>
            <button type="button" class="three-pl-option" data-value="CUSTOM CLEARANCE">CUSTOM CLEARANCE</button>
            <button type="button" class="three-pl-option" data-value="BONDED TRUCKS">BONDED TRUCKS</button>
            <button type="button" class="three-pl-option" data-value="BONDED WAREHOUSING">BONDED WAREHOUSING</button>
            <button type="button" class="three-pl-option" data-value="INTERNATIONAL WAREHOUSING">INTERNATIONAL WAREHOUSING</button>
        </div>

        <!-- Hidden input to store selected 3PL Service -->
        <input type="hidden" name="additional_services" id="additional_services">

      



    <h1>Shipping Form</h1>

    <!-- Personal Info Section -->
    <div class="form-section">
        <h3>Personal Info</h3>
        <div class="form-group">
            <label for="full-name">Full Name</label>
            <input type="text" id="full-name" name="sender_name" placeholder="Enter your full name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="sender_email" placeholder="Enter your email" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="sender_phone" placeholder="Enter your phone number" required>
        </div>
        <div class="form-group">
            <label for="passport-id">Passport / ID / Driving Licence</label>
            <input type="text" id="passport-id" name="sender_id" placeholder="Enter your Passport / ID / Driving Licence">
        </div>
        <div class="form-group">
            <label for="upload-document">Upload Document</label>
            <input type="file" name="sender_image" required>
        </div>
    </div>

    <!-- Shipping Information Section -->
    <div class="form-section">
        <h3>Shipping Information</h3>
        <div class="form-group">
            <label for="pickup-address">Pickup Address</label>
            <input type="text" id="pickup-address" name="sender_pickup_address" placeholder="Enter your pickup address" required>
        </div>
        <div class="form-group">
            <label for="street-address">Street Address</label>
            <input type="text" id="street-address" name="sender_street_address" placeholder="Enter your street address" required>
        </div>
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="receiver_city" placeholder="Enter your city" required>
        </div>
        <div class="form-group">
            <label for="state-province">State / Province</label>
            <input type="text" id="state" name="receiver_state" placeholder="Enter your State / Province" required>
        </div>
        <div class="form-group">
            <label for="postal-code">Postal Code</label>
            <input type="text" id="postal-code" name="postal_code" placeholder="Enter your Postal Code / Pin Code" required>
        </div>
        <input type="hidden" id="sender-city" name="sender_city">
        <input type="hidden" id="sender-state" name="sender_state">
        <input type="hidden" id="sender-country" name="sender_country">
        <div class="form-group">
            <label for="country">Country</label>
            <input type="text" id="country" name="receiver_country" placeholder="Enter your country" required>
        </div>
    </div>

    <!-- Sender Parcel Details Section -->
    <div class="form-section">
        <h3>Sender Parcel Details</h3>
        <div class="form-group">
            <label for="number-of-parcels">Number of Parcels</label>
            <input type="number" id="number-of-parcels" name="number_of_parcels" placeholder="Enter Number of Parcels" required>
        </div>
        <div class="form-group">
            <label for="weight">Weight (kg)</label>
            <input type="number" step="any" id="weight" name="weight" placeholder="Kg" required>
        </div>
        <div class="form-group">
            <label for="length">Length (cm)</label>
            <input type="number" step="any" id="length" name="length" placeholder="cm" required>
        </div>
        <div class="form-group">
            <label for="height">Height (cm)</label>
            <input type="number" step="any" id="height" name="height" placeholder="cm" required>
        </div>
        <div class="form-group">
            <label for="width">Width (cm)</label>
            <input type="number" step="any" id="width" name="width" placeholder="cm" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <input type="text" id="content" name="content" placeholder="Enter package contents description" required>
        </div>
        <div class="form-group">
            <label for="item-value">Item Value</label>
            <input type="text" id="item-value" name="item_value" placeholder="Enter value of the item" required>
        </div>
        <div class="form-group">
            <label for="insurance">Insurance</label>
            <select id="insurance" name="insurance_level">
                <!--'Level 1 - LKR 25,000','Level 1 - LKR 25,000','Level 3 - LKR 75,000','Level 4 - LKR 100,000','Level 5 - Specific Insurance Cover'-->
                <option value="">Select Insurance level</option>
                <option value="Level 1 - LKR 25,000">Level 1 - LKR 25,000</option>
                <option value="Level 1 - LKR 25,000">Level 1 - LKR 25,000</option>
                <option value="Level 3 - LKR 75,000">Level 3 - LKR 75,000</option>
                <option value="Level 4 - LKR 100,000">Level 4 - LKR 100,000</option>
                <option value="Level 5 - Specific Insurance Cover">Level 5 - Specific Insurance Cover</option>
            </select>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="form-section">
        <button type="submit" class="submit-button">Submit</button>
    </div>



                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jscontent')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        // Show the 3PL services options when 3PL SERVICES radio button is selected
        $('input[name="service_type"]').on('change', function() {
            if ($(this).val() === '3PL SERVICES') {
                $('#three-pl-services').show();
            } else {
                $('#three-pl-services').hide();
                // Clear the selected 3PL service if 3PL services are not selected
                $('#additional_services').val('');
                $('.three-pl-option').removeClass('active');
            }
        });

        // Allow only a single option to be selected in the 3PL services
        $('.three-pl-option').on('click', function() {
            // Remove 'active' class from all buttons and add it to the clicked one
            $('.three-pl-option').removeClass('active');
            $(this).addClass('active');

            // Update the hidden input with the selected value
            var selectedService = $(this).data('value');
            $('#additional_services').val(selectedService);
        });
    });
</script>
<script>
    // Get references to the receiver and sender fields
    const receiverCity = document.getElementById('city');
    const receiverState = document.getElementById('state'); // Corrected closing quote
    const receiverCountry = document.getElementById('country'); // Fixed reference to country

    const senderCity = document.getElementById('sender-city');
    const senderState = document.getElementById('sender-state');
    const senderCountry = document.getElementById('sender-country');

    // Update sender's fields with receiver's values before form submission
    document.querySelector('form').addEventListener('submit', function(event) {
        senderCity.value = receiverCity.value;
        senderState.value = receiverState.value;
        senderCountry.value = receiverCountry.value; // Updated to use correct country field
    });
</script>


@endsection
