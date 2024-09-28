<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Plan Added</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Your Premium Plan Has Been Added!</h1>

        <p>Dear {{ $plan->user }},</p>

        <p>We are excited to inform you that your premium plan has been successfully added to your account. Here are the details:</p>

        <table style="width: 100%; border-collapse: collapse; margin: 20px 0;">
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Plan Name</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $plan->plan->name }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Price</th>
                <td style="border: 1px solid #ddd; padding: 8px;">${{ $plan->plan->price }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Start Date</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $plan->buy_date }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Expiry Date</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $plan->expiry_date }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Amount Paid</th>
                <td style="border: 1px solid #ddd; padding: 8px;">${{ $plan->amount }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Meals Included</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $plan->meals }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Tea Included</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $plan->tea }}</td>
            </tr>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px;">Package Included</th>
                <td style="border: 1px solid #ddd; padding: 8px;">{{ $plan->package }}</td>
            </tr>
            <tr>
    <th style="border: 1px solid #ddd; padding: 8px;">Benefits</th>
    <td style="border: 1px solid #ddd; padding: 8px;">
        <ul>
            @if(is_array($plan->plan->benefits) && count($plan->plan->benefits) > 0)
                @foreach ($plan->plan->benefits as $benefit)
                    <li>{{ $benefit }}</li>
                @endforeach
            @else
                <li>No benefits available.</li>
            @endif
        </ul>
    </td>
</tr>

        </table>

        <p>Thank you for choosing us. If you have any questions, feel free to reach out to our support team.</p>

        <div class="footer">
            <p>Best regards,<br>The Lanka Express</p>
        </div>
    </div>

</body>
</html>
