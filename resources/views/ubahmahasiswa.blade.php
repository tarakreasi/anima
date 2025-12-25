@extends('master')

@section('title', 'Edit Mahasiswa - ANIMA')

@section('content')
<div style="padding: 2rem 0;">
    <div class="mb-4">
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-sm" style="background: rgba(255,255,255,0.1);">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="glass" style="max-width: 700px; margin: 0 auto; padding: 3rem;">
        <h2 style="font-size: 1.75rem; font-weight: 700; margin-bottom: 2rem;">
            <i class="fas fa-edit"></i> Edit Data Mahasiswa
        </h2>

        <form action="{{ route('mahasiswa.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id_mahasiswa" value="{{ $mahasiswa->id_mahasiswa }}">

            <div class="form-group">
                <label class="form-label"><i class="fas fa-user"></i> Nama Lengkap</label>
                <input type="text" name="nm_mahasiswa" class="form-control" value="{{ $mahasiswa->nm_mahasiswa }}" required>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-map-marker-alt"></i> Tempat Lahir</label>
                <input type="text" name="tmp_lahir" class="form-control" value="{{ $mahasiswa->tmp_lahir }}" required>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-calendar"></i> Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="{{ $mahasiswa->tgl_lahir }}" required>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-home"></i> Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required>{{ $mahasiswa->alamat }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label"><i class="fas fa-phone"></i> No. HP</label>
                <input type="tel" name="no_hp" class="form-control" value="{{ $mahasiswa->no_hp }}" required>
            </div>

            <div class="flex gap-2" style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Data
                </button>
                <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection