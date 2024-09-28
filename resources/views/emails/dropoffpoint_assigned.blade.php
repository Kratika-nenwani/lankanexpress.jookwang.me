<!-- resources/views/emails/dropoffpoint_assigned.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Drop-Off Point Assigned</title>
</head>
<body>
    <h2>Hello {{ $info->user->name }},</h2>

    <p>We are pleased to inform you that your drop-off point for the quote <strong>#{{ $info->track_id }}</strong> has been successfully assigned.</p>

    <h3>Drop-Off Point Details:</h3>
    <p><strong>Name:</strong> {{ $info->dop->name }}</p>
    <p><strong>Address:</strong> {{ $info->dop->address }}</p>
    <p><strong>Contact Number:</strong> {{ $info->dop->number }}</p>

    <h3>Assigned Call Agent Details:</h3>
    <p><strong>Name:</strong> {{ $info->ca->name }}</p>
    <p><strong>Email:</strong> {{ $info->ca->email }}</p>
    <p><strong>Phone:</strong> {{ $info->ca->phone }}</p>

    <p>If you have any questions, feel free to reach out to your assigned call agent or contact us directly.</p>

    <p>Thank you for choosing our service!</p>

    <p>Best regards,</p>
    <p>The Team</p>
</body>
</html>
