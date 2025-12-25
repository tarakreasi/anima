<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - ANIMA</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        
        .login-card {
            max-width: 450px;
            width: 100%;
            padding: 3rem;
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 2.5rem;
        }
        
        .login-title {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #818cf8, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 0.5rem;
        }
        
        .login-subtitle {
            color: #cbd5e1;
            font-size: 0.875rem;
        }
        
        .form-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #818cf8;
        }
        
        .form-control-icon {
            position: relative;
        }
        
        .form-control-icon input {
            padding-left: 3rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card glass">
            <div class="login-header">
                <div class="login-title">
                    <i class="fas fa-graduation-cap"></i> ANIMA
                </div>
                <div class="login-subtitle">Aplikasi Nilai Mahasiswa</div>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('actionlogin') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="form-control-icon">
                        <i class="fas fa-envelope form-icon"></i>
                        <input type="email" name="email" class="form-control" placeholder="admin@anima.test" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="form-control-icon">
                        <i class="fas fa-lock form-icon"></i>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-sign-in-alt"></i> Masuk
                </button>

                <div class="text-center mt-3">
                    <p class="text-muted">
                        Belum punya akun? <a href="{{ route('register') }}" style="color: #818cf8;">Daftar sekarang</a>
                    </p>
                </div>
            </form>

            <div class="text-center mt-4" style="padding-top: 1.5rem; border-top: 1px solid rgba(255,255,255,0.1);">
                <p style="font-size: 0.75rem; color: #64748b;">
                    <i class="fas fa-info-circle"></i> Demo: admin@anima.test / admin123
                </p>
            </div>
        </div>
    </div>
</body>
</html>
