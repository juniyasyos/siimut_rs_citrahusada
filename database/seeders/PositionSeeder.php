<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $positions = [
            'Direktur Rumah Sakit',
            'Wakil Direktur',
            'Kepala Departemen',
            'Kepala Unit',
            'Supervisor',
            'Manajer Administrasi',
            'Koordinator',
            'Dokter Senior',
            'Dokter Junior',
            'Perawat Senior',
            'Perawat Junior',
            'Asisten Medis',
            'Teknisi Senior',
            'Teknisi Junior',
            'Staff Administrasi',
            'Resepsionis',
            'Petugas Keamanan',
            'Petugas Kebersihan',
        ];

        foreach ($positions as $position) {
            Position::firstOrCreate([
                'name' => $position,
                'description' => "Posisi dalam struktur organisasi rumah sakit."
            ]);
        }
    }
}
