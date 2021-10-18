{{-- <!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="utf-8" />
  </head>
  <body>
    <h2>Votre lien pour vos prochain examens !</h2>
    <p>{{ $token }}</p>
  </body>
</html> --}}

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/> --}}
</head>

<body>

    <div class="container mt-4">

        <div class="card">
            <div class="card-header">
                <h2>Votre lien pour accéder à la plateforme</h2>
            </div>
            <div class="card-body">
                <a href="{{getenv("APP_FRONT_URL")}}/planning/eleve/{{$token}}" target="_blank">{{getenv("APP_FRONT_URL")}}/planning/eleve/{{$token}}</a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h2>Votre QR CODE</h2>
            </div>
            <div class="card-body">
                {{-- {{dd(base64_encode($qr_code))}} --}}
                {{-- <p>{{$message}}</p> --}}
                {{-- <img src="{!!QrCode::format('png')->generate(getenv("APP_FRONT_URL")}}/planning/eleve/{{$token!!}"> --}}


                <p>{{$qr_code}}</p>
                <p>{{ QrCode::size(100)->generate(getenv("APP_FRONT_URL")."/planning/eleve/".$token) }}</p>

            </div>
        </div>
    </div>
</body>
</html>
