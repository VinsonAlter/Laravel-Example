<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a class="navbar-brand" href="/">WPU Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                {{-- <a class="nav-link {{($active === 'home') ? 'active' : ''}}" aria-current="page" href="/">Home</a> --}}
                {{-- change to this, no need to pass additional variable active again --}}
                <a class="nav-link {{Request::is('home') ? 'active' : ''}}" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{($active === 'about') ? 'active' : ''}}" href="/about">About</a> --}}
                <a class="nav-link {{Request::is('about') ? 'active' : ''}}" href="/about">About</a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{($active === 'post') ? 'active' : ''}}" href="/post">Blog</a> --}}
                <a class="nav-link {{Request::is('post') ? 'active' : ''}}" href="/post">Blog</a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{($active === 'categories') ? 'active' : ''}}" href="/categories">Categories</a> --}}
                <a class="nav-link {{Request::is('categories') ? 'active' : ''}}" href="/categories">Categories</a>
            </li>
        </ul>
        
        <ul class="navbar-nav ms-auto">
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{auth()->user()->name}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/dashboard"> <i class="bi bi-layout-text-window-reverse"></i> 
                            My Dashboard</a></li>                       
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right">
                                    </i> Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>  
                @else
                <li class="nav-item">
                    {{-- <a href="/login" class="nav-link" {{($active === "login") ? 'active' : ''}}> --}}
                    <a href="/login" class="nav-link" {{Request::is('login') ? 'active' : ''}}>
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                </li>   
            @endauth
        
            
        </ul>
        {{-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
        </div>
    </div>
</nav>