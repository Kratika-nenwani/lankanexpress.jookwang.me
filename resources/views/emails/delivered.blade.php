<!DOCTYPE html>
<html>
<head>
    <title>Your Quote has been Delivered</title>
</head>
<body>
    <h2>Hello {{ $info->quote->receiver_name }},</h2>

    <p>We are pleased to inform you that your quote with TrackID <strong>{{ $info->quote->track_id }}</strong> has been successfully delivered.</p>

    <h3>Delivery Details:</h3>
    <ul>
        <li><strong>Quote ID:</strong> {{ $info->quote->id }}</li>
        <li><strong>Service Type:</strong> {{ $info->quote->service_type }}</li>
        <li><strong>Delivery Status:</strong> Delivered</li>
        <li><strong>Delivery Address:</strong> 
            {{ $info->quote->receiver_delivery_address }},
            {{ $info->quote->receiver_street_address }},
            {{ $info->quote->receiver_city }},
            {{ $info->quote->receiver_state }},
            {{ $info->quote->receiver_country }}
        </li>
        <li><strong>Parcel Count:</strong> {{ $info->quote->number_of_parcels }}</li>
        <li><strong>Total Weight:</strong> {{ $info->quote->weight }} kg</li>
        <li><strong>Dimensions (L x W x H):</strong> 
            {{ $info->quote->length }} x {{ $info->quote->width }} x {{ $info->quote->height }} cm
        </li>
        <li><strong>Contents:</strong> {{ $info->quote->content }}</li>
        <li><strong>Item Value:</strong> {{ $info->quote->item_value }}</li>
        <li><strong>Insurance Level:</strong> {{ $info->quote->insurance_level }}</li>
        <li><strong>Delivery Date:</strong> {{ Carbon\Carbon::now()->toFormattedDateString() }}</li>
        <li><strong>Delivery Time:</strong> {{ Carbon\Carbon::now()->toTimeString() }}</li>
    </ul>

    <p>If you have any questions or concerns regarding your delivery, please feel free to contact us.</p>

    <p>Thank you,<br>The Delivery Team</p>
</body>
</html>
