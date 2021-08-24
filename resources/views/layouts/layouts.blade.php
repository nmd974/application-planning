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
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    <title>@yield('title')</title>
</head>

<body>
    @include('includes.header')
    <div class="container-fluid">
        <div id="starting-page">
            <div class="title-content d-flex align-items-center">
                <div class="delimiter-title"></div>
                <div class="delimiter-title ms-1"></div>
                <h2 class="ms-4">@yield('title-section')</h2>
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
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function (){
        $("#sidebar-toggle").click(function (e) {
            $("#wrapper").toggleClass("toggled");
            $("#starting-page").toggleClass("toggled");
            $('#sidebar-toggle').toggleClass('fa-close');
            $('#sidebar-toggle').toggleClass('fa-bars');
        });
        $('html').css('overflow-y', 'scroll');
        $('#loader_wrapper').remove();
    })
    var toast = new bootstrap.Toast(document.getElementById('liveToast'))
    toast.show();
</script>
</body>

</html>
