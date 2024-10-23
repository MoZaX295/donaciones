<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background-color: #ffffff;
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
            margin: 20px;
            overflow: hidden;
        }
        .card-header {
            background-color: #e85757;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-body {
            padding: 20px;
        }
        .info-title {
            font-weight: bold;
            color: #580303;
            margin-bottom: 8px;
            font-size: 0.95rem;
        }
        .info-content {
            color: #373030;
            margin-bottom: 20px;
            font-size: 0.90rem;
        }
        .message-box {
            border: 1px solid #9c6363;
            border-radius: 4px;
            background-color: #ffe2e2;
            padding: 15px;
            font-size: 0.90rem;
        }
        .card-footer {
            background-color: #f9f9f9;
            padding: 10px;
            border-top: 2px solid #eee;
            text-align: center;
            color: #666;
            font-size: 0.875rem;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-header">
            Nombre: {{ $first_name }} {{ $last_name }}
        </div>
        <div class="card-body">
            <p class="info-title">Correo:</p>
            <p class="info-content">{{ $email }}</p>

            <p class="info-title">Contraseña:</p>
            <p class="info-content">{{ $password }}</p>
        </div>
    </div>
</body>
</html>
