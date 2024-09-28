

<!DOCTYPE html>
<html>
<head>
    <title>New Checkpoint Marked for Your Quote</title>
</head>
<body>
    <h2>Hello {{ $checkpoint->user->name }},</h2>

    <p>A new checkpoint has been marked for your quote. Here are the details:</p>

    <h3>Quote Details:</h3>
    <ul>
        <li><strong>Quote ID:</strong> {{ $checkpoint->quote->track_id }}</li>
        <li><strong>Quote Service Type:</strong> {{ $checkpoint->quote->service_type }}</li>
    </ul>

    <h3>Checkpoint Details:</h3>
    <ul>
        <li><strong>Checkpoint Title:</strong> {{ $checkpoint->title }}</li>
        <li><strong>Address:</strong> {{ $checkpoint->address }}</li>
        <li><strong>Date:</strong> {{ $checkpoint->date }}</li>
        <li><strong>Time:</strong> {{ $checkpoint->time }}</li>
        <li><strong>Country:</strong> {{ $checkpoint->country }}</li>
    </ul>

    <p>If you have any questions or need further information, feel free to contact us.</p>

    <p>Thank you,<br>The Team</p>
</body>
</html>
