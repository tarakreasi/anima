<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\MahasiswaModel;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'username' => 'admin',
            'email' => 'admin@anima.test',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'verify_key' => '',
            'active' => 1,
        ]);

        // Create regular user
        User::create([
            'username' => 'user',
            'email' => 'user@anima.test',
            'password' => Hash::make('user123'),
            'role' => 'user',
            'verify_key' => '',
            'active' => 1,
        ]);

        // Create sample mahasiswa data
        $mahasiswa = [
            [
                'nm_mahasiswa' => 'Budi Santoso',
                'tmp_lahir' => 'Jakarta',
                'tgl_lahir' => '2001-05-15',
                'alamat' => 'Jl. Sudirman No. 123, Jakarta',
                'no_hp' => '081234567890',
            ],
            [
                'nm_mahasiswa' => 'Siti Nurhaliza',
                'tmp_lahir' => 'Bandung',
                'tgl_lahir' => '2002-08-22',
                'alamat' => 'Jl. Braga No. 45, Bandung',
                'no_hp' => '082345678901',
            ],
            [
                'nm_mahasiswa' => 'Ahmad Hidayat',
                'tmp_lahir' => 'Surabaya',
                'tgl_lahir' => '2001-11-10',
                'alamat' => 'Jl. Tunjungan No. 67, Surabaya',
                'no_hp' => '083456789012',
            ],
            [
                'nm_mahasiswa' => 'Dewi Lestari',
                'tmp_lahir' => 'Yogyakarta',
                'tgl_lahir' => '2002-03-18',
                'alamat' => 'Jl. Malioboro No. 89, Yogyakarta',
                'no_hp' => '084567890123',
            ],
            [
                'nm_mahasiswa' => 'Rizki Pratama',
                'tmp_lahir' => 'Medan',
                'tgl_lahir' => '2001-07-25',
                'alamat' => 'Jl. Gatot Subroto No. 34, Medan',
                'no_hp' => '085678901234',
            ],
        ];

        foreach ($mahasiswa as $data) {
            MahasiswaModel::create($data);
        }
    }
}
