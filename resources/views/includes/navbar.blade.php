<nav class="navbar navbar-expand-md navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : "" }}">Home .</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/toolbox') }}" class="nav-link {{ Request::is('toolbox') ? 'active' : "" }}">♥️ Toolbox .</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/blog') }}" class="nav-link {{ Request::is('blog') ? 'active' : "" }}">Blog .</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/about') }}" class="nav-link {{ Request::is('about') ? 'active' : "" }}">About .</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/blog/search') }}" class="nav-link {{ Request::is('blog/search') ? 'active' : "" }}">
                        <img src="/storage/images/search.png" class="img-fluid" width="15" alt="search" title="Search..." />
                    </a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/dashboard') }}">Posts</a>
                            <a class="dropdown-item" href="{{ url('/dashboard/categories') }}">Categories</a>
                            <a class="dropdown-item" href="{{ url('/dashboard/images') }}">Images</a>
                            @if (Auth::user()->access_level == "SUPERADMIN")
                            <a class="dropdown-item" href="{{ url('/dashboard/users') }}">Users</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('logout') }}" 
                                onclick = "event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                            >
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>