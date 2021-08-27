<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>Votre lien pour accéder à la plateforme</h2>
            </div>
            <div class="card-body">
                <a href="{{getenv("APP_FRONT_URL")}}" target="_blank">{{getenv("APP_FRONT_URL")}}/planning/jury/{{$token}}</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Votre QR CODE</h2>
            </div>
            <div class="card-body">
                {{$qr_code}}
            </div>
        </div>
    </div>
</body>
</html>
