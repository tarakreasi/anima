@extends('master')

@section('title', 'Dashboard - ANIMA')

@section('content')
<div style="padding: 2rem 0;">
    <!-- Welcome Header -->
    <div class="glass" style="padding: 2rem; margin-bottom: 2rem;">
        <h1 style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem;">
            Selamat Datang, <span style="background: linear-gradient(135deg, #818cf8, #8b5cf6); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">{{ Auth::user()->username }}</span>!
        </h1>
        <p class="text-muted">
            <i class="fas fa-user-tag"></i> Anda login sebagai <strong>{{ Auth::user()->role }}</strong>
        </p>
    </div>

    <!-- Statistics Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <i class="fas fa-users fa-2x" style="color: #818cf8; margin-bottom: 1rem;"></i>
            <div class="stat-value">{{ $totalMahasiswa }}</div>
            <div class="stat-label">Total Mahasiswa</div>
        </div>

        <div class="stat-card">
            <i class="fas fa-user-plus fa-2x" style="color: #8b5cf6; margin-bottom: 1rem;"></i>
            <div class="stat-value">{{ $mahasiswaBulanIni }}</div>
            <div class="stat-label">Mahasiswa Bulan Ini</div>
        </div>

        <div class="stat-card">
            <i class="fas fa-chart-line fa-2x" style="color: #ec4899; margin-bottom: 1rem;"></i>
            <div class="stat-value">{{ $rataRataUmur }}</div>
            <div class="stat-label">Rata-rata Umur</div>
        </div>

        <div class="stat-card">
            <i class="fas fa-graduation-cap fa-2x" style="color: #6366f1; margin-bottom: 1rem;"></i>
            <div class="stat-value">{{ Auth::user()->role === 'admin' ? '100%' : '85%' }}</div>
            <div class="stat-label">Akses Level</div>
        </div>
    </div>

    <!-- Charts Section -->
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-top: 2rem;">
        <div class="glass" style="padding: 2rem;">
            <h3 class="card-header">Mahasiswa per Kota</h3>
            <canvas id="kotaChart" style="max-height: 300px;"></canvas>
        </div>

        <div class="glass" style="padding: 2rem;">
            <h3 class="card-header">Trend Pendaftaran</h3>
            <canvas id="trendChart" style="max-height: 300px;"></canvas>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="glass" style="padding: 2rem; margin-top: 2rem;">
        <h3 class="card-header">Quick Actions</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Mahasiswa
            </a>
            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">
                <i class="fas fa-list"></i> Lihat Semua Data
            </a>
            <a href="{{ route('export.csv') }}" class="btn" style="background: linear-gradient(135deg, #10b981, #059669); color: white;">
                <i class="fas fa-file-csv"></i> Export CSV
            </a>
            <a href="{{ route('export.print') }}" target="_blank" class="btn" style="background: linear-gradient(135deg, #ef4444, #b91c1c); color: white;">
                <i class="fas fa-print"></i> Print Laporan
            </a>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="glass" style="padding: 2rem; margin-top: 2rem;">
        <h3 class="card-header">Aktivitas Terbaru</h3>
        <div style="display: flex; flex-direction: column; gap: 1rem;">
            @foreach($recentMahasiswa as $mhs)
            <div style="padding: 1rem; background: rgba(255, 255, 255, 0.05); border-radius: 8px; border-left: 3px solid #818cf8;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <strong>{{ $mhs->nm_mahasiswa }}</strong>
                        <span class="text-muted"> ditambahkan dari {{ $mhs->tmp_lahir }}</span>
                    </div>
                    <span style="font-size: 0.875rem; color: #64748b;">
                        {{ $mhs->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Pie Chart - Kota
    const kotaCtx = document.getElementById('kotaChart').getContext('2d');
    new Chart(kotaCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($chartKota->pluck('tmp_lahir')) !!},
            datasets: [{
                data: {!! json_encode($chartKota->pluck('total')) !!},
                backgroundColor: [
                    'rgba(99, 102, 241, 0.8)',
                    'rgba(139, 92, 246, 0.8)',
                    'rgba(236, 72, 153, 0.8)',
                    'rgba(34, 197, 94, 0.8)',
                    'rgba(251, 146, 60, 0.8)'
                ],
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    labels: { color: '#cbd5e1' }
                }
            }
        }
    });

    // Line Chart - Trend
    const trendCtx = document.getElementById('trendChart').getContext('2d');
    new Chart(trendCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            datasets: [{
                label: 'Pendaftaran',
                data: [3, 5, 2, 8, 10, {{ $mahasiswaBulanIni }}],
                borderColor: 'rgba(99, 102, 241, 1)',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#cbd5e1' },
                    grid: { color: 'rgba(255, 255, 255, 0.05)' }
                },
                x: {
                    ticks: { color: '#cbd5e1' },
                    grid: { color: 'rgba(255, 255, 255, 0.05)' }
                }
            },
            plugins: {
                legend: {
                    labels: { color: '#cbd5e1' }
                }
            }
        }
    });
</script>
@endpush