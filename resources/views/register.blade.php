<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - ANIMA</title>
    
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
            max-width: 500px;
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
        
        .form-control-icon input,
        .form-control-icon select {
            padding-left: 3rem;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card glass">
            <div class="login-header">
                <div class="login-title">
                    <i class="fas fa-user-plus"></i> Daftar
                </div>
                <div class="login-subtitle">Buat akun baru di ANIMA</div>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <i class="fas fa-exclamation-circle"></i> Ada kesalahan pada form Anda!
                </div>
            @endif

            <form action="{{ route('actionregister') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <div class="form-control-icon">
                        <i class="fas fa-user form-icon"></i>
                        <input type="text" name="username" class="form-control" placeholder="username" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <div class="form-control-icon">
                        <i class="fas fa-envelope form-icon"></i>
                        <input type="email" name="email" class="form-control" placeholder="email@example.com" required>
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
                    <i class="fas fa-user-plus"></i> Daftar Sekarang
                </button>

                <div class="text-center mt-3">
                    <p class="text-muted">
                        Sudah punya akun? <a href="{{ route('login') }}" style="color: #818cf8;">Login di sini</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
