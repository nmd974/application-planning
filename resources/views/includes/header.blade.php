<div class="d-flex disabledOverflow" id="wrapper">
    <!--LOADER-->
    <div class="h-100 w-100 bg-light position-absolute d-flex justify-content-center align-items-center" id="loader_wrapper"  style="z-index: 10001">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>
    @include('includes.toast-msg')
    <div class="border-right position-fixed" id="sidebar-wrapper">
        <div class="list-group list-group-flush">
            @if (Auth::check())
                <a href="{{ route("getPromotions", "promoEnCours") }}"
                    class="list-group-item list-group-item-action d-flex align-items-center justify-content-start">
                    <i class="fa fa-graduation-cap me-3" aria-hidden="true"></i>
                    <div>Promotions</div>
                </a>
                <a href="/user/add"
                    class="list-group-item list-group-item-action d-flex align-items-center justify-content-start">
                    <i class="fa fa-users me-3" aria-hidden="true"></i>
                    <div>Utilisateurs</div>
                </a>
                <a href="/role/list"
                    class="list-group-item list-group-item-action d-flex align-items-center justify-content-start">
                    <i class="fa fa-users me-3" aria-hidden="true"></i>
                    <div>Roles</div>
                </a>
            @else
                <a href="/login" class="list-group-item list-group-item-action d-flex align-items-center justify-content-start">
                    <i class="fa fa-sign-in me-3" aria-hidden="true"></i>
                    <div>Se connecter</div>
                </a>
            @endif
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid d-flex justify-content-between">
            <div class="ms-2 d-flex align-items-center">
            <i class="fa fa-close fa-2x fa-action" style="color:white;" aria-hidden="true"
            id="sidebar-toggle"></i>

            </div>
            <a class="navbar-brand ms-2" href="./accueil.php">Planning Simplon</a>
            @if (Auth::check())
                <a href="/logout"><i class="fa fa-power-off fa-2x me-2 fa-action" id="logout" style="color:white;" aria-hidden="true"></i></a>
            @else
                <a href="/login"><i class="fa fa-sign-in fa-2x me-2 fa-action" id="logout" style="color:white;" aria-hidden="true"></i></a>
            @endif

        </div>
        </nav>
    </div>
</div>
