<!-- resources/views/emails/assignment_created.blade.php -->

@component('mail::message')
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .header {
            background-color: #3490dc;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }

        .content {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .button {
            margin-top: 20px;
            text-align: center;
        }
    </style>

    <div class="header">
        <h1>Assignment Created</h1>
    </div>

    <div class="content">
        <p>Hello {{ $user->name }},</p>

        <h4>Your new assignment details:</h4>
        <p><strong>Title:</strong> {{ $task->title }}</p>
        <p><strong>Description:</strong> {!! $task->description !!}</p>
        <p><strong>Start Date:</strong> {{ $task->start_date }}</p>
        <p><strong>End Date:</strong> {{ $task->end_date ?? 'Not specified' }}</p>
    </div>

    <div>
        Sincerely,<br>
        {{ config('app.name') }}
    </div>
@endcomponent
