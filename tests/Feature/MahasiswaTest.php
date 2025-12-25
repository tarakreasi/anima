<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\MahasiswaModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_view_mahasiswa_list()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->get(route('mahasiswa.index'));

        $response->assertStatus(200);
        $response->assertViewIs('tampilmahasiswa');
    }

    public function test_user_can_create_mahasiswa()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->post(route('mahasiswa.store'), [
                             'nm_mahasiswa' => 'Test Mahasiswa',
                             'tmp_lahir' => 'Jakarta',
                             'tgl_lahir' => '2000-01-01',
                             'alamat' => 'Jl. Test No. 123',
                             'no_hp' => '081234567890',
                         ]);

        $response->assertRedirect(route('mahasiswa.index'));
        $this->assertDatabaseHas('mahasiswa', [
            'nm_mahasiswa' => 'Test Mahasiswa',
        ]);
    }

    public function test_user_can_update_mahasiswa()
    {
        $user = User::factory()->create();
        $mahasiswa = MahasiswaModel::create([
            'nm_mahasiswa' => 'Original Name',
            'tmp_lahir' => 'Jakarta',
            'tgl_lahir' => '2000-01-01',
            'alamat' => 'Original Address',
            'no_hp' => '081234567890',
        ]);

        $response = $this->actingAs($user)
                         ->post(route('mahasiswa.update'), [
                             'id_mahasiswa' => $mahasiswa->id_mahasiswa,
                             'nm_mahasiswa' => 'Updated Name',
                             'tmp_lahir' => 'Bandung',
                             'tgl_lahir' => '2000-01-01',
                             'alamat' => 'Updated Address',
                             'no_hp' => '081234567890',
                         ]);

        $response->assertRedirect(route('mahasiswa.index'));
        $this->assertDatabaseHas('mahasiswa', [
            'nm_mahasiswa' => 'Updated Name',
            'tmp_lahir' => 'Bandung',
        ]);
    }

    public function test_user_can_delete_mahasiswa()
    {
        $user = User::factory()->create();
        $mahasiswa = MahasiswaModel::create([
            'nm_mahasiswa' => 'To Be Deleted',
            'tmp_lahir' => 'Jakarta',
            'tgl_lahir' => '2000-01-01',
            'alamat' => 'Address',
            'no_hp' => '081234567890',
        ]);

        $response = $this->actingAs($user)
                         ->get(route('mahasiswa.destroy', $mahasiswa->id_mahasiswa));

        $response->assertRedirect(route('mahasiswa.index'));
        $this->assertSoftDeleted('mahasiswa', [
            'id_mahasiswa' => $mahasiswa->id_mahasiswa,
        ]);
    }
}
