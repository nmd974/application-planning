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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ getenv("APP_URL") . '/css/app.css' }}">
    <title>@yield('title')</title>
    <script>
        window.url ="{{ env("APP_URL")  }}";
    </script>
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
                <a role="button" class="btn btn-success me-md-5" href="{{ URL::previous() }}">
                    <i class="fa fa-arrow-left me-md-3" aria-hidden="true"></i>Retour
                </a>

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
<!-- Fonction de recherche -->
<script>
    function searchBar() {
        
        // Déclaration des variables et récupération des balises
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById('searchbar');
        filter = input.value.toUpperCase();
        container = document.getElementById("container");
        tr = container.getElementsByTagName('tr');
        if (tr.length > 0) {
        cells = tr[1].getElementsByTagName('td').length;
        }

        //Si les élements recherchés e sont pas affichés via un tableau
        if (tr.length <= 0) {
            console.log('test');
            let element = document.querySelectorAll(".element");

            for (i = 0; i < element.length; i++) {
                a = element[i].getElementsByTagName("p")[0];
                txtValue = a.textContent || a.innerText;

                if (txtValue.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").indexOf(filter) > -1) {
                    element[i].style.display = "";
                } else {
                    element[i].style.display = "none";
                }
            }
        }
        else if (cells < 3){
            for (i = 0; i < tr.length; i++) {
            a = tr[i].getElementsByTagName("td")[0];
            txtValue = a.textContent || a.innerText;

            if (txtValue.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "").indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
        }
        else{
            for (i = 0; i < tr.length; i++) {
            a = tr[i].getElementsByTagName("td")[0];
            b = tr[i].getElementsByTagName("td")[1];
            c = tr[i].getElementsByTagName("td")[2];
            d = tr[i].getElementsByTagName("td")[3];

            txtValue0 = a.textContent.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || a.innerText.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            txtValue1 = b.textContent.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || b.innerText.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            txtValue2 = c.textContent.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "") || c.innerText.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
            txtValue3 = d.textContent .toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "")|| d.innerText.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");

            if (txtValue0.indexOf(filter) > -1 || txtValue1.indexOf(filter) > -1 || txtValue2.indexOf(filter) > -1 || txtValue3.indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
        }
        }
</script>
</body>

</html>
