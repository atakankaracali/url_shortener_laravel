<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            max-width: 600px;
            padding: 40px;
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ff6347;
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        p {
            color: #333;
            margin-bottom: 30px;
            font-size: 1.2em;
            line-height: 1.5;
        }

        a {
            display: inline-block;
            padding: 15px 40px;
            background-color: #4caf50;
            color: #fff;
            text-decoration: none;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to URL Shortener</h1>
        <p>This is a simple welcome page for the URL Shortener application.</p>
        <p><a href="{{ route('shorten.form') }}">Go to URL Shortener</a></p>
    </div>
</body>
</html>
