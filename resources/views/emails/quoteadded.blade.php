<!DOCTYPE html>  
<html>  
<head>  
    <title>Quote Added Successfully</title>  
    <style>  
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            background-color: #28a745;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 5px;
            font-size: 1.8em;
        }

        p {
            line-height: 1.6;
            margin: 15px 0;
        }

        ul {
            list-style-type: none;
            padding-left: 0;
        }

        ul li {
            padding: 8px 0;
            font-size: 1.1em;
        }

        ul li strong {
            display: inline-block;
            width: 160px;
            color: #007BFF;
        }

        .section-title {
            font-size: 1.3em;
            margin-top: 25px;
            text-transform: uppercase;
            color: #555;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 5px;
        }

        .footer {
            margin-top: 30px;
            font-size: 0.9em;
            color: #888;
            text-align: center;
        }
    </style>  
</head>  
<body>  
    <div class="container">
        <h1>Your Quote Has Been Added Successfully!</h1>  
 
        <p>Dear <strong>{{ $quote->sender_name }}</strong>,</p>  
 
        <p>We are pleased to inform you that your quote for the service <strong>{{ $quote->service_type }}</strong> has been successfully added to our system.</p>  
 
        <h3 class="section-title">Quote Details:</h3>  
        <ul>  
            <li><strong>Transaction ID:</strong> {{ $quote->track_id }}</li>  
            <li><strong>Number of Parcels:</strong> {{ $quote->number_of_parcels }}</li>  
            <li><strong>Weight:</strong> {{ $quote->weight }} kg</li>  
            <li><strong>Dimensions (LxWxH):</strong> {{ $quote->length }} x {{ $quote->width }} x {{ $quote->height }} cm</li>  
            <li><strong>Content:</strong> {{ $quote->content }}</li>  
            <li><strong>Item Value:</strong> ${{ $quote->item_value }}</li>  
            <li><strong>Insurance Level:</strong> {{ $quote->insurance_level }}</li>  
        </ul> 
 
        <h3 class="section-title">Sender Information:</h3>  
        <ul>  
            <li><strong>Name:</strong> {{ $quote->sender_name }}</li>  
            <li><strong>Email:</strong> {{ $quote->sender_email }}</li>  
            <li><strong>Phone:</strong> {{ $quote->sender_phone }}</li>  
            <li><strong>Pickup Address:</strong> {{ $quote->sender_pickup_address }}, {{ $quote->sender_street_address }}, {{ $quote->sender_city }}, {{ $quote->sender_state }}, {{ $quote->sender_country }}</li>  
        </ul>  
 
        <h3 class="section-title">Receiver Information:</h3>  
        <ul>  
            <li><strong>Delivery Address:</strong> {{ $quote->receiver_delivery_address }}, {{ $quote->receiver_street_address }}, {{ $quote->receiver_city }}, {{ $quote->receiver_state }}, {{ $quote->receiver_country }}</li>  
        </ul>  
 
        <p>Thank you for choosing our service! We will keep you updated with the status of your shipment.</p>  
 
        <p class="footer">Best Regards,<br>The Shipping Team</p>  
    </div>
</body>  
</html>
