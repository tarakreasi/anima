@extends('master')

@section('title', 'Tambah Mahasiswa - ANIMA')

@section('content')
<div style="padding: 2rem 0;">
    <div class="mb-4">
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm" style="background: rgba(255,255,255,0.1);">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="glass" style="max-width: 700px; margin: 0 auto; padding: 3rem;">
        <h2 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 2rem;">
            <i class="fas fa-user-plus"></i> Tambah Mahasiswa Baru
        </h2>

        <form action="{{ route('mahasiswa.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label"><i class="fas fa-user"></i> Nama Lengkap</label>
                <input type="text" name="nm_mahasiswa" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-map-marker-alt"></i> Tempat Lahir</label>
                <input type="text" name="tmp_lahir" class="form-control" placeholder="Contoh: Jakarta" required>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-calendar"></i> Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" required>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-home"></i> Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-phone"></i> No. HP</label>
                <input type="tel" name="no_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
            </div>

            <div class="flex gap-2" style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan Data
                </button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
