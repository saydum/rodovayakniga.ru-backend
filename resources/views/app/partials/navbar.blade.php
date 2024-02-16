<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        @auth()
            <button class="btn btn-outline-success" id="sidebarToggle">
                <i class="bi bi-list"></i>
            </button>
            <button
                class="navbar-toggler btn btn-outline-success"
                type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="bi bi-arrow-bar-down"></i>
            </button>
        @endauth
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                @guest()
                    <li class="nav-item active"><a class="nav-link" href="/">Главная страница</a></li>
                @endguest

                @include('auth.partials.auth_dropdown')

            </ul>
        </div>
    </div>
</nav>
