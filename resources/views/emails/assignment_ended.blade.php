<!DOCTYPE html>
<html>
<head>
    <title>New Assignment Created</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            text-align: center;
        }

        p {
            color: #666666;
            line-height: 1.5;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            max-width: 150px;
        }

        .cta {
            display: block;
            width: 200px;
            margin: 20px auto 0;
            padding: 10px;
            background-color: #4CAF50;
            color: #ffffff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Add your application's logo here -->
        <img src="{{ asset('logo.png') }}" alt="Logo" class="logo">
        <p style="text-align: center;color: rgb(0, 34, 128)">Hello, {{ Str::title($user->name) }}, </p>
        <h3>Your Assignment Has Come To An End!</h3>
        <p>
            Please contact the admin for more information.
        </p>
        <p><q>Note</q> <blockquote>This mail may serve as an update, if you have initially been posted, thank You.</blockquote></p>

        <a href="{{ url('/') }}" class="cta">Login to Dashboard</a>
    </div>
</body>
</html>