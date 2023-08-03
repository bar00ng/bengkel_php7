<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Flamenggo Garage</title>
        <!-- Custom fonts for this template-->
        <link href="/sb-admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/styles.css" rel="stylesheet" />
        @yield('styles')
        <style>
            /* Custom CSS for setting max height */
            .carousel-inner img {
                max-height: 400px; /* Change this value to set the desired maximum height */
                object-fit: contain; /* This ensures the image retains its aspect ratio */
            }
            .custom-card {
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand d-flex  align-items-center gap-2" href="#!">
                <img src="/img/Brand.jpeg" alt="Logo" width="40" class="d-inline-block rounded-circle">
                    Flamenggo Garage
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('*dashboard*') ? 'active' : '' }}" aria-current="page" href="{{ route('dashboard') }}">Home</a></li>
                        @if (Auth::user())
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('*book*') ? 'active' : '' }}" aria-current="page" href="{{ route('history.book') }}">History</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('*about*') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Jasa</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">Paint/Repaint</a></li>
                                <li><a class="dropdown-item" href="#!">Service</a></li>
                                <li><a class="dropdown-item" href="#!">Tune Up</a></li>
                            </ul>
                        </li>
                    </ul>
                    @if(Auth::user())
                        <a href="{{ route('guest.form.booking') }}" class="btn btn-outline-secondary" role="button">Book Now</a>
                        
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary" role="button">Login</a>
                    @endif
                </div>
            </div>
        </nav>
        
        <div class="mt-5">
            @yield('content')
        </div>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
        @yield('script')
    </body>
</html>
