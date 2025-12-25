<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ANIMA - Aplikasi Nilai Mahasiswa')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- App CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand">
                <i class="fas fa-graduation-cap"></i> ANIMA
            </a>
            
            <ul class="nav-menu">
                <li><a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="{{ route('mahasiswa.index') }}" class="nav-link"><i class="fas fa-users"></i> Mahasiswa</a></li>
                
                <li class="dropdown">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-circle"></i> {{ Auth::user()->email }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fas fa-id-badge"></i> {{ Auth::user()->role }}</a></li>
                        <li><a href="{{ route('profile.index') }}"><i class="fas fa-user"></i> Profile</a></li>
                        <li style="border-top: 1px solid rgba(255,255,255,0.1); margin-top: 0.5rem; padding-top: 0.5rem;">
                            <a href="{{ route('actionlogout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    @stack('scripts')
</body>
</html>