<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <table style="width:100%;">
        <tr><td>Bonjour {{$name}},</td></tr>
        <tr><td>Ce mail vous est envoyé depuis la plateforme de gestion des activités de Simplon.</td></tr>
        <tr>
            <td>En cliquant sur ce lien, vous accéderez au contenu de vos activités :</td>
        </tr>
        <tr>            <td><a href="{{getenv("APP_FRONT_URL")}}/planning/eleve/{{$token}}" target="_blank">lien d'accès à la plateforme web</a></td></tr>
        <tr>
            <td>Ou scannez directement ce QRCODE :</td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            {{-- <td><img src="{!!$message->embedData(QrCode::format('png')->generate(getenv("APP_FRONT_URL")."/planning/eleve/".$token), 'QrCode.png', 'image/png')!!}"></td> --}}
        </tr>
    </table>
</body>
</html>
