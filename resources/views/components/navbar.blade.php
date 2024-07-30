
<nav class="navbar  navbar-expand-lg bg-nav p-0 navbar-light shadow fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('homepage')}}"><img class="logo-navbar me-custom" src=".././images/logo.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav mx-auto">
                @Auth
                <div class="dropdown">
                    <button class="btn dropdown-toggle pt-2" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Hi, {{Auth::user()->name}}
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{route('article.create')}}">Create Your Article</a>
                        </li>
                        @if (Auth::user()->is_admin)
                        <li><a class="dropdown-item" href="{{route('admin.dashboard')}}">Admin</a></li>
                      @endif
                      @if (Auth::user()->is_revisor)
                        <li><a class="dropdown-item" href="{{route('revisor.dashboard')}}">Revisor</a></li>
                      @endif
                      @if (Auth::user()->is_writer)
                        <li><a class="dropdown-item" href="{{route('writer.dashboard')}}">Writer</a></li>
                      @endif
                      <li>
                          <form action="{{route('logout')}}" method="POST">
                          @csrf
                          <button class="btn btn-logout dropdown-item ps-3" type="submit">Logout</button>
                          </form>
                      </li>
                    </ul>
                  </div>
            @endauth

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">All Articles</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="{{route('careers')}}">Work whit Us</a>
                </li>
            </ul>
        </div>
            <div class="d-flex justify-content-end">
                <form action="{{route('article.search')}}" method="GET" class="d-flex justify-content-end" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </form>

            </div>

    </div>
</nav>