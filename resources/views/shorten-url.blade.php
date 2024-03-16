<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
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

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 1em;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 1em;
            font-weight: bold;
        }

        button[type="submit"]:hover {
            background-color: #388e3c;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>URL Shortener</h1>
        <form method="POST" action="{{ route('shorten') }}">
            @csrf
            <label for="url">URL:</label>
            <input type="text" id="url" name="url" required>
            <button type="submit">Shorten URL</button>
        </form>
    </div>
</body>
</html>
