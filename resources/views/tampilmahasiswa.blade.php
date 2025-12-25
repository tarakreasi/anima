@extends('master')

@section('title', 'Data Mahasiswa - ANIMA')

@section('content')
<div style="padding: 2rem 0;">
    <div class="flex items-center justify-between mb-4">
        <h1 style="font-size: 2rem; font-weight: 700;">
            <i class="fas fa-users"></i> Data Mahasiswa
        </h1>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Mahasiswa
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="glass">
        <!-- Search Box -->
        <div style="padding: 1.5rem; border-bottom: 1px solid rgba(255,255,255,0.1);">
            <div class="form-control-icon" style="max-width: 400px;">
                <i class="fas fa-search form-icon"></i>
                <input type="text" id="searchInput" class="form-control" placeholder="Cari mahasiswa..." style="padding-left: 3rem;">
            </div>
        </div>

        <!-- Table -->
        <div class="table-wrapper">
            <table id="mahasiswaTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mahasiswa as $index => $mhs)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><strong>{{ $mhs->nm_mahasiswa }}</strong></td>
                        <td>{{ $mhs->tmp_lahir }}</td>
                        <td>{{ Carbon\Carbon::parse($mhs->tgl_lahir)->format('d M Y') }}</td>
                        <td>{{ Str::limit($mhs->alamat, 40) }}</td>
                        <td>{{ $mhs->no_hp }}</td>
                        <td style="text-align: center;">
                            <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                <a href="{{ route('mahasiswa.edit', $mhs->id_mahasiswa) }}" class="btn btn-sm" style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white;">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('mahasiswa.destroy', $mhs->id_mahasiswa) }}" 
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Simple search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase();
        const rows = document.querySelectorAll('#mahasiswaTable tbody tr');
        
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
</script>
<style>
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
</style>
@endpush