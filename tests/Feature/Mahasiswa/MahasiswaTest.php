<?php

namespace Tests\Feature\Mahasiswa;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create());
    }

    public function test_can_display_mahasiswa_list()
    {
        Mahasiswa::factory()->count(3)->create();
        $response = $this->get('/mahasiswa/tampil');
        $response->assertStatus(200);
        $response->assertViewHas('mahasiswa');
        $this->assertCount(3, $response->viewData('mahasiswa'));
    }

    public function test_can_show_add_mahasiswa_form()
    {
        $response = $this->get('/mahasiswa/tambah');
        $response->assertStatus(200);
    }

    public function test_can_add_a_mahasiswa()
    {
        $mahasiswaData = [
            'nm_mahasiswa' => 'Test Mahasiswa',
            'tmp_lahir' => 'Test City',
            'tgl_lahir' => '2000-01-01',
            'alamat' => 'Test Address',
            'no_hp' => '1234567890',
        ];

        $response = $this->post('/mahasiswa/simpan', $mahasiswaData);

        $response->assertRedirect('/mahasiswa/tampil');
        $this->assertDatabaseHas('mahasiswas', $mahasiswaData);
    }

    public function test_can_show_edit_mahasiswa_form()
    {
        $mahasiswa = Mahasiswa::factory()->create();
        $response = $this->get('/mahasiswa/ubah/' . $mahasiswa->id_mahasiswa);
        $response->assertStatus(200);
        $response->assertViewHas('mahasiswa');
    }

    public function test_can_update_a_mahasiswa()
    {
        $mahasiswa = Mahasiswa::factory()->create();
        $updatedData = [
            'id_mahasiswa' => $mahasiswa->id_mahasiswa,
            'nm_mahasiswa' => 'Updated Mahasiswa',
            'tmp_lahir' => 'Updated City',
            'tgl_lahir' => '2001-01-01',
            'alamat' => 'Updated Address',
            'no_hp' => '0987654321',
        ];

        $response = $this->post('/mahasiswa/update', $updatedData);

        $response->assertRedirect('/mahasiswa/tampil');
        $this->assertDatabaseHas('mahasiswas', $updatedData);
    }

    public function test_can_delete_a_mahasiswa()
    {
        $mahasiswa = Mahasiswa::factory()->create();
        $response = $this->get('/mahasiswa/hapus/' . $mahasiswa->id_mahasiswa);
        $response->assertRedirect('/mahasiswa/tampil');
        $this->assertDatabaseMissing('mahasiswas', ['id_mahasiswa' => $mahasiswa->id_mahasiswa]);
    }
}
