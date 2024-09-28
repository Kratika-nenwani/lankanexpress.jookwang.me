<!DOCTYPE html>
<html>
<head>
    <title>New Drop-off Point Assigned</title>
</head>
<body>
    <h1>Hello {{ $callagent->name }},</h1>
    
    <p>We are pleased to inform you that you have been assigned a new drop-off point. Below are the details:</p>
    
    <table style="border: 1px solid #ddd; padding: 8px; width: 100%;">
        <tr>
            <td><strong>Drop-off Point Name:</strong></td>
            <td>{{ $callagent->name }}</td>
        </tr>
        <tr>
            <td><strong>Drop-off Point Address:</strong></td>
            <td>{{ $callagent->address }}</td>
        </tr>
    </table>
    
    <p>Please make sure to update your records accordingly.</p>

    <p>Thank you,<br>
    The {{ config('app.name') }} Team</p>
</body>
</html>
