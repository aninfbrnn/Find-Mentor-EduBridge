<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Bridge</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nav-link.active {
            border-bottom: 2px solid blue;
        }
        .navbar-brand img {
            width: 100px;
            height: auto;
        }
        .navbar-brand {
            font-size: 35px;
            font-weight: bold;
            padding: 10px 20px;
        }
        body {
            background-color: #f4f4f4; /* Mengubah background */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="/images/logo-edubridge.png" alt="Edu Bridge Logo">
            </a>
            <!-- Toggler for mobile view -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('find-mentor') ? 'active' : '' }}" href="{{ route('find-mentor') }}">Find Mentor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('chat') ? 'active' : '' }}" href="{{ route('chat') }}">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('forum') ? 'active' : '' }}" href="{{ route('forum') }}">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('find-friend') ? 'active' : '' }}" href="{{ route('find-friend') }}">Find Friend</a>
                    </li>
                </ul>
                <!-- User Profile Dropdown -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
<!-- Header Section -->
<!-- <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(246, 238, 247);"> 
    <div class="container-fluid"> -->
        <!-- Logo atau teks di kiri -->
        <!-- <a class="navbar-brand text" href="#" style="color:rgb(93, 85, 85);">Find Mentor</a> -->
        
        <!-- Bagian ikon di kanan -->
        <!-- <div class="d-flex align-items-center ms-auto gap-3"> `ms-auto` untuk mendorong elemen ke kanan -->
            <!-- <a href="{{ route('history') }}">
                <img src="/images/document.png" alt="Document" width="35">
            </a>
            <a href="{{ route('cart') }}" class="{{ request()->routeIs('cart') ? 'active-link' : '' }}">
                <img src="/images/shoppingcart.png" alt="Cart" width="50" style="padding-right: 20px;">
            </a>
            <style>
                .active-link img {
                    display: inline-block;
                    border-bottom: 2px solid blue;
                    padding-bottom: 2px;
                    width: 50px;
                }
            </style>

        </div>
    </div>
</nav> -->


    <!-- Main Content -->
    <div class="container">
        @yield('content')
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
