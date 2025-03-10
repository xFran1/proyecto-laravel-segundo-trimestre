<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 405 - Método no permitido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8d7da;
            color: #721c24;
            text-align: center;
            padding: 50px;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 50px;
        }
        p {
            font-size: 18px;
        }
        a {
            color: #721c24;
            text-decoration: none;
            border-bottom: 1px solid #721c24;
            padding-bottom: 2px;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h2>El método de la solicitud no está permitido.</h2>
        <a href="{{ url('index') }}">Volver a la página de inicio</a>
    </div>
</body>
</html>
