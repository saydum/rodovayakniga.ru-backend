<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
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
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                <li class="nav-item active"><a class="nav-link" href="#">Home</a></li>

                @include('layouts.embed.auth.auth_dropdown')

            </ul>
        </div>
    </div>
</nav>