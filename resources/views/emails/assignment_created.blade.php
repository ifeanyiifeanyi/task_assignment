<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment Created</title>
</head>
<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4;">

<table style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <tr>
        <td style="background-color: #5e2afc; color: #ffffff; padding: 20px; text-align: center;">
            <h1 style="color: #ffffff; text-align: center; margin: 0;">Assignment Created</h1>
        </td>
    </tr>
    <tr>
        <td style="padding: 30px;">
            <p style="margin: 10px;">Hello {{ $user->name }},</p>
            <hr>
            <h4 style="margin: 10px;">Your new assignment details:</h4>
            <p style="margin: 10px;"><strong>Title:</strong> {{ $task->title }}</p>
            <p style="margin: 10px;"><strong>Description:</strong> {!! $task->description !!}</p>
            <p style="margin: 10px;"><strong>Start Date:</strong> {{ $task->start_date->format('F j, Y') }}</p>
            <p style="margin: 10px;"><strong>End Date:</strong> {{ $task->end_date->format('F j, Y') ?? 'Not specified' }}</p>
            <hr>
            <div style="margin: 10px;">
                Sincerely,<br>
                {{ config('app.name') }}
            </div>
        </td>
    </tr>
</table>

</body>
</html>
