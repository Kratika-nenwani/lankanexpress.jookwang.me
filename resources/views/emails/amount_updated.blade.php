<!-- resources/views/emails/amount_updated.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Quote Amount Updated</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h2>Hello {{ $quote->user }},</h2>
    
    <p>We would like to inform you that the amount for your quote has been updated. Below are the updated details of your quote:</p>

    <table border="1" cellpadding="10">
        <tr>
            <th>Service Type</th>
            <td>{{ $quote->service_type }}</td>
        </tr>
        <tr>
            <th>Sender Name</th>
            <td>{{ $quote->sender_name }}</td>
        </tr>
        <tr>
            <th>Receiver Address</th>
            <td>{{ $quote->receiver_delivery_address }}, {{ $quote->receiver_city }}, {{ $quote->receiver_state }}, {{ $quote->receiver_country }}</td>
        </tr>
        <tr>
            <th>Number of Parcels</th>
            <td>{{ $quote->number_of_parcels }}</td>
        </tr>
        <tr>
            <th>Total Weight</th>
            <td>{{ $quote->weight }} kg</td>
        </tr>
        <tr>
            <th>Item Value</th>
            <td>{{ $quote->item_value }}</td>
        </tr>
        <tr>
            <th>Updated Amount</th>
            <td>{{ $quote->total }} {{ $quote->currency }}</td>
        </tr>
        <tr>
            <th>Due Amount</th>
            <td>{{ $quote->due }} {{ $quote->currency }}</td>
        </tr>
        <tr>
            <th>Shipping Date</th>
            <td>{{ $quote->shipping_date }}</td>
        </tr>
    </table>

    <p>If you have any questions or need further information, feel free to reach out.</p>
    
    <p>Best regards,<br>
    The Shipping Team</p>
</body>
</html>
