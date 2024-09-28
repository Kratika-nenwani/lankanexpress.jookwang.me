@extends('index_main')  <!-- or your main layout -->

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Quote Details</h2>
    
    <div class="card">
        <div class="card-header bg-danger text-white">
            <h4>Quote ID: {{ $quote->id }}</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?php
                        $user=DB::table('users')->where('id',$quote->user_id)->value('name');
                        $dop=DB::table('drop_of_points')->where('id',$quote->drop_of_points)->value('name');
                    ?>
                    <p><strong>User ID:</strong> {{ $user }}</p>
                    <p><strong>Track ID:</strong> {{ $quote->track_id }}</p>
                    <p><strong>Service Type:</strong> {{ $quote->service_type }}</p>
                    <p><strong>Container Transportation:</strong> {{ $quote->container_transportation }}</p>
                    <p><strong>Parcel Deliveries:</strong> {{ $quote->parcel_deliveries }}</p>
                    <p><strong>Additional Services:</strong> {{ $quote->additional_services }}</p>
                    <p><strong>Status:</strong> <span class="badge badge-info">{{ $quote->status }}</span></p>
                    <p><strong>Is Assigned:</strong> {{ $quote->is_assigned ? 'Yes' : 'No' }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Pickup Date:</strong> {{ $quote->pickup_date }}</p>
                    <p><strong>Total:</strong> ${{ $quote->total }}</p>
                    <p><strong>Paid:</strong> ${{ $quote->paid }}</p>
                    <p><strong>Due:</strong> ${{ $quote->due }}</p>
                    <p><strong>Remark:</strong> {{ $quote->remark }}</p>
                    <p><strong>Loyalty Points:</strong> {{ $quote->loyality_points }}</p>
                    <p><strong>Drop of Point:</strong> {{ $dop }}</p>
                    <p><strong>Payment:</strong> {{ $quote->payment }}</p>
                </div>
            </div>

            <hr>

            <h5 class="mt-4">Sender Information</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Name:</strong> {{ $quote->sender_name }}</p>
                    <p><strong>Phone:</strong> {{ $quote->sender_phone }}</p>
                    <p><strong>Email:</strong> {{ $quote->sender_email }}</p>
                    <p><strong>ID:</strong> {{ $quote->sender_id }}</p>
                    <p><strong>Pickup Address:</strong> {{ $quote->sender_pickup_address }}</p>
                    <p><strong>Street Address:</strong> {{ $quote->sender_street_address }}</p>
                    <p><strong>City:</strong> {{ $quote->sender_city }}</p>
                    <p><strong>State:</strong> {{ $quote->sender_state }}</p>
                    <p><strong>Country:</strong> {{ $quote->sender_country }}</p>
                    <p><strong>Country:</strong> {{ $quote->sender_image }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Sender Image:</strong></p>
                    <img src="{{ asset('QuoteImages/' . $quote->sender_image) }}" alt="Sender Image" class="img-fluid rounded" style="max-width: 100%; height: auto; width: 200px;">
                </div>

            </div>

            <hr>

            <h5 class="mt-4">Receiver Information</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Delivery Address:</strong> {{ $quote->receiver_delivery_address }}</p>
                    <p><strong>Street Address:</strong> {{ $quote->receiver_street_address }}</p>
                    <p><strong>City:</strong> {{ $quote->receiver_city }}</p>
                    <p><strong>State:</strong> {{ $quote->receiver_state }}</p>
                    <p><strong>Country:</strong> {{ $quote->receiver_country }}</p>
                </div>
            </div>

            <hr>

            <h5 class="mt-4">Parcel Information</h5>
            <div class="row">
                <div class="col-md-4">
                    <p><strong>Number of Parcels:</strong> {{ $quote->number_of_parcels }}</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Weight:</strong> {{ $quote->weight }} kg</p>
                    <p><strong>Dimensions:</strong> {{ $quote->length }} x {{ $quote->width }} x {{ $quote->height }} cm</p>
                </div>
                <div class="col-md-4">
                    <p><strong>Content:</strong> {{ $quote->content }}</p>
                    <p><strong>Item Value:</strong> ${{ $quote->item_value }}</p>
                    <p><strong>Insurance Level:</strong> {{ $quote->insurance_level }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
