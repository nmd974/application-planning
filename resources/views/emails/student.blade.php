<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <table style="width:100%;text-align:center;">
        <tr>
            <td>Lien :</td>
            <td><a href="{{getenv("APP_FRONT_URL")}}/planning/eleve/{{$token}}" target="_blank">{{getenv("APP_FRONT_URL")}}/planning/eleve/{{$token}}</a></td>
        </tr>
        <tr>
            <td>QR Code :</td>
            <td><img src="{!!$message->embedData(QrCode::format('png')->generate(getenv("APP_FRONT_URL")."/planning/eleve/".$token), 'QrCode.png', 'image/png')!!}"></td>
        </tr>
    </table>
</body>
</html>
