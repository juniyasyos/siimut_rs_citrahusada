<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UnitKerja;

class UnitKerjaSeeder extends Seeder
{
    public function run(): void
    {
        $unitKerjaList = [
            ['unit_name' => 'Administrasi', 'description' => 'Unit yang mengelola administrasi rumah sakit.'],
            ['unit_name' => 'Keuangan', 'description' => 'Unit yang menangani keuangan dan anggaran rumah sakit.'],
            ['unit_name' => 'SDM', 'description' => 'Unit yang mengelola sumber daya manusia.'],
            ['unit_name' => 'Farmasi', 'description' => 'Unit yang bertanggung jawab atas obat-obatan dan farmasi.'],
            ['unit_name' => 'Radiologi', 'description' => 'Unit yang menangani layanan radiologi.'],
            ['unit_name' => 'Laboratorium', 'description' => 'Unit yang melakukan tes laboratorium.'],
        ];

        $unitKerjaIds = collect($unitKerjaList)->map(function ($unit) {
            return UnitKerja::firstOrCreate($unit)->id;
        });

        User::inRandomOrder()->take(ceil(User::count() * 0.5))->each(function ($user) use ($unitKerjaIds) {
            $user->unitKerja()->sync([$unitKerjaIds->random()]);
        });
    }
}
