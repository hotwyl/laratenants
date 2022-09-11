<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TenantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $save = [
            [
                'cod' => (string) Str::uuid(),
                'name' => 'Loja 01',
                'slug' => Str::slug('Loja 01', '_'),
                'status' => 1,
            ],
            [
                'cod' => (string) Str::uuid(),
                'name' => 'Loja 02',
                'slug' => Str::slug('Loja 02', '_'),
                'status' => 1,
            ],
            [
                'cod' => (string) Str::uuid(),
                'name' => 'Loja 03',
                'slug' => Str::slug('Loja 03', '_'),
                'status' => 0,
            ],
        ];

        foreach ($save as $key => $value) {
            Tenant::create($value);
        }

    }
}
