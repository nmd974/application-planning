<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/c18e5332f2.js"></script>
    <link rel="stylesheet" href="{{ getenv("APP_URL") . '/css/app.css' }}">
    <title>@yield('title')</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
</head>

<body>
    @include('includes.header')
    <div class="container-fluid">
        <div id="starting-page">
            <div class="d-flex align-items-center justify-content-between">
                <div class="title-content d-flex align-items-center">
                    <div class="delimiter-title"></div>
                    <div class="delimiter-title ms-1"></div>
                    <h2 class="ms-4">
                        @yield('title-section')
                    </h2>
                </div>
                @if (Auth::check())
                <a role="button" class="btn btn-success me-md-5" href="{{ URL::previous() }}">
                    <i class="fa fa-arrow-left me-md-3" aria-hidden="true"></i>Retour
                </a>
                @endif
            </div>
            <div class="bloc-content">
                <div class="content-bloc shadow-lg p-md-5 p-1 h-100 d-flex flex-column">
                    <div class="d-flex align-items-center justify-content-between flex-wrap my-5">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script src="{{ getenv("APP_URL") . '/js/share.js' }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>
