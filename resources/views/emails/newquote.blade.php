<!DOCTYPE html>  
<html>  
<head>  
    <title>New Quote Arrived</title>  
    <style>  
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        p {
            line-height: 1.6;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        ul li {
            padding: 8px 0;
        }

        ul li strong {
            display: inline-block;
            width: 150px;
            color: #007BFF;
        }

        .section-title {
            font-size: 1.2em;
            margin-top: 20px;
            color: #555;
            text-transform: uppercase;
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
        <h1>New Quote Has Arrived</h1>  
 
        <p>Dear Sir/Mam,</p>  
 
        <p>We are pleased to inform you that a new quote has been added by <strong>{{ $quote->sender_name }}</strong> for service <strong>{{ $quote->service_type }}</strong>.</p>  
 
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
 
        <p>Stay updated with the latest quote information.</p>  
 
        <p class="footer">Best Regards,<br>Your Company Name</p>  
    </div>
</body>  
</html>
<!DOCTYPE html>  
<html>  
<head>  
    <title>New Quote Arrived</title>  
    <style>  
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        p {
            line-height: 1.6;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        ul li {
            padding: 8px 0;
        }

        ul li strong {
            display: inline-block;
            width: 150px;
            color: #007BFF;
        }

        .section-title {
            font-size: 1.2em;
            margin-top: 20px;
            color: #555;
            text-transform: uppercase;
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
        <h1>New Quote Has Arrived</h1>  
 
        <p>Dear Sir/Mam,</p>  
 
        <p>We are pleased to inform you that a new quote has been added by <strong>{{ $quote->sender_name }}</strong> for service <strong>{{ $quote->service_type }}</strong>.</p>  
 
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
 
        <p>Stay updated with the latest quote information.</p>  
 
        <p class="footer">Best Regards,<br>Lanka Express</p>  
    </div>
</body>  
</html>
