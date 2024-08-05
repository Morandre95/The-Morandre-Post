<nav class="navbar navbar-expand-lg bg-nav p-0 navbar-light shadow fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('homepage') }}"><img class="logo-navbar me-custom" src="../../images/logo.png"
                alt=""></a>
        <button class="navbar-toggler position-absolute" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="bi bi-list"></span>
        </button>
        <a href="{{ route('homepage') }}"><span class="letter-spacing d-none d-md-block me-custom">THE MORANDRE POST</span></a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                @Auth
                    <div class="dropdown">
                        <button class="btn dropdown-toggle pt-2" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Hi, {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('article.create') }}">{{__('ui.Create Article')}}</a>
                            </li>
                            @if (Auth::user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">{{__('ui.Admin')}}</a></li>
                            @endif
                            @if (Auth::user()->is_revisor)
                                <li><a class="dropdown-item" href="{{ route('revisor.dashboard') }}">{{__('ui.Revisor')}}</a></li>
                            @endif
                            @if (Auth::user()->is_writer)
                                <li><a class="dropdown-item" href="{{ route('writer.dashboard') }}">{{__('ui.Writer')}}</a></li>
                            @endif
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-logout dropdown-item ps-3" type="submit">{{__('ui.Logout')}}</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('article.index') }}">{{__('ui.All Articles')}}</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{__('ui.Register')}}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{__('ui.Login')}}</a>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('careers') }}">{{__('ui.Work whit Us')}}</a>
                </li>
                <div class="d-block d-md-none mt-2">
                    <x-search/>
                </div>
            </ul>
        </div>
        <div>
            <div class="dropdown mx-2">
                <button class="btn dropdown-toggle pt-2" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{__('ui.Languages')}}
            </button>
            <ul class="dropdown-menu">
                <li><x-_locale lang="it"/></li>
                <li><x-_locale lang="fr"/></li>
                <li><x-_locale lang="en"/></li>
            </ul>
            </div>
        </div>
        <div class="d-flex justify-content-center d-none d-md-block">
            <x-search/>
        </div>
    </div>
</nav>
<div class="mb-navbar"></div>
