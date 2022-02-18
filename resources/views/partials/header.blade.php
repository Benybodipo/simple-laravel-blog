<header>
    <nav class="navbar  navbar-dark bg-dark navbar-expand-md bg-faded justify-content-center">
        <div class="container">
            <a href="{{route('post.index')}}" class="navbar-brand d-flex w-50 me-auto">Navbar 3</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsingNavbar3">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse w-100" id="collapsingNavbar3">
                <ul class="nav navbar-nav ms-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Right</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Right</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-primary btn-sm text-white" href="{{route('post.create')}}">Create new article</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>