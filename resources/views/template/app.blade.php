<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blog</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f8f9fa;
        }

        .pp {
            text-align: center;
            color: #bbfaf1;
            animation: float 3s ease-in-out infinite;
            padding-top: 10px;
            margin-bottom: 0.5rem;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0);
            }
        }

        /* Custom navbar look */
        .navbar-custom {
            background: linear-gradient(180deg, rgba(11, 79, 108, 0.95), rgba(6, 40, 60, 0.95));
            box-shadow: 0 4px 18px rgba(5, 10, 20, 0.15);
            backdrop-filter: blur(6px);
        }

        .navbar-custom .nav-link {
            color: rgba(255, 255, 255, 0.95);
        }

        .navbar-custom .nav-link.active {
            font-weight: 600;
            text-decoration: underline;
        }

        .navbar-custom .btn-outline-primary {
            color: #fff;
            border-color: rgba(255, 255, 255, 0.18);
        }

        .navbar-custom .btn-outline-primary:hover {
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.28);
        }



        .navbar-brand svg {
            display: block;
        }

        .navbar-brand span {
            color: #fff;
        }
    </style>
</head>

<body>
    {{-- <h1>Up and Running with Laravel</h1> --}}

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom mb-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/" aria-label="Laravel Blog">
                <svg width="36" height="36" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" role="img"
                    aria-hidden="true" style="display:block">
                    <circle cx="32" cy="32" r="30" fill="#e3342f" />
                    <text x="32" y="38" text-anchor="middle" font-family="Segoe UI, Roboto, Arial" font-size="20"
                        fill="#fff" font-weight="700">LN</text>
                </svg>
                <span class="d-none d-md-inline ms-2"></span>
            </a>




            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home') || request()->is('/') ? 'active' : '' }}"
                            href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('posts*') ? 'active' : '' }}" href="/posts">Posts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('categories*') ? 'active' : '' }}"
                            href="/categories">Categories</a>
                    </li>
                    <div class="position-absolute start-50 translate-middle-x d-none d-lg-block">
                        <p class="pp mb-0">Up and Running with Laravel</p>
                    </div>
                </ul>

                <div class="d-flex align-items-center">
                    @auth
                        <a class="btn btn-outline-light btn-sm" role="button" href="/logout">Logout</a>
                    @endauth

                    @guest
                        <a class="btn btn-outline-light btn-sm me-2" href="/login">Login</a>
                        <a class="btn btn-outline-light btn-sm" href="/register">Register</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('section1')
    </div>

    <!-- Bootstrap JS bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

</html>
