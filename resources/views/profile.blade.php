@extends('master')

@section('title', 'Profil Saya - ANIMA')

@section('content')
<div style="padding: 2rem 0;">
    <div class="glass" style="max-width: 700px; margin: 0 auto; padding: 3rem;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <div style="width: 100px; height: 100px; background: rgba(129, 140, 248, 0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1rem;">
                <i class="fas fa-user-circle fa-4x" style="color: #818cf8;"></i>
            </div>
            <h2 style="font-size: 1.75rem; font-weight: 700; color: white;">{{ $user->username }}</h2>
            <p class="text-muted">{{ $user->role }}</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label"><i class="fas fa-user"></i> Username</label>
                <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div style="margin: 2rem 0; border-top: 1px solid rgba(255,255,255,0.1);"></div>
            <h3 style="font-size: 1.1rem; font-weight: 600; margin-bottom: 1rem;">Ganti Password</h3>
            <p class="text-muted" style="margin-bottom: 1.5rem; font-size: 0.9rem;">Kosongkan jika tidak ingin mengganti password.</p>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-lock"></i> Password Baru</label>
                <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter">
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-lock"></i> Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password baru">
            </div>

            <div class="flex gap-2" style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
