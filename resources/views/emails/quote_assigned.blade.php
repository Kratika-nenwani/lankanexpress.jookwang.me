<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Quote Assigned</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
        }
        .header {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 10px 10px 0 0;
        }
        .details {
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 10px;
        }
        .details h3 {
            margin-top: 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: gray;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>New Quote Assigned to You</h1>
        </div>
        <div class="details">
            <h3>Hello {{ $quote->ca->name }},</h3>
            <p>A new quote has been assigned to you. Please find the details below:</p>
            
            <h4>Quote Details:</h4>
            <p><strong>Quote ID:</strong> {{ $quote->id }}</p>
            <p><strong>Assigned By:</strong> {{ $quote->user->name }}</p>
            <p><strong>Quote Value:</strong> ${{ $quote->value }}</p>
            <p><strong>Quote Description:</strong> {{ $quote->description }}</p>
            
            <h4>Drop-off Point Details:</h4>
            <p><strong>Location:</strong> {{ $quote->dop->location }}</p>
            <p><strong>Address:</strong> {{ $quote->dop->address }}</p>
            <p><strong>City:</strong> {{ $quote->dop->city }}</p>
            <p><strong>State:</strong> {{ $quote->dop->state }}</p>
            <p><strong>Postal Code:</strong> {{ $quote->dop->postal_code }}</p>
            
            <p>Please follow up with the client at your earliest convenience.</p>
        </div>
        <div class="footer">
            <p>If you have any questions, feel free to contact us.</p>
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
