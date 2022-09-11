<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $min = intval(1);
        $max = intval(3);

        $save= [
            [
                'cod' => (string) Str::uuid(),
                'tenant_id' => null,
                'name' => 'Administrador',
                'login' => Str::slug('Administrador', '_'),
                'email' => 'administrador@email.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin-123'),
                'remember_token' => Str::random(10),
                'tipo' => 'admin',
                'status' => 1,
            ],
            [
                'cod' => (string) Str::uuid(),
                'tenant_id' => null,
                'name' => 'William Camargo',
                'login' => Str::slug('William Camargo', '_'),
                'email' => 'will.from.brasil@gmail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('admin123'),
                'remember_token' => Str::random(10),
                'tipo' => 'admin',
                'status' => 1,
            ],
            [
                'cod' => (string) Str::uuid(),
                'tenant_id' => random_int($min,$max),
                'name' => 'Usuario',
                'login' => Str::slug('Usuario', '_'),
                'email' => 'usuario@teste.com',
                'email_verified_at' => now(),
                'password' => bcrypt('user123'),
                'remember_token' => Str::random(10),
                'tipo' => 'user',
                'status' => 0,
            ],
            [
                'cod' => (string) Str::uuid(),
                'tenant_id' => random_int($min,$max),
                'name' => 'Teste Sistema',
                'login' => Str::slug('Teste Sistema', '_'),
                'email' => 'teste@teste.com',
                'email_verified_at' => now(),
                'password' => bcrypt('teste123'),
                'remember_token' => Str::random(10),
                'tipo' => 'user',
                'status' => 0,
            ],
            [
                'cod' => (string) Str::uuid(),
                'tenant_id' => random_int($min,$max),
                'name' => 'Usuario 01',
                'login' => Str::slug('Usuario 01', '_'),
                'email' => 'usuario01@mail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('user01'),
                'remember_token' => Str::random(10),
                'tipo' => 'user',
                'status' => 1,
            ],
            [
                'cod' => (string) Str::uuid(),
                'tenant_id' => random_int($min,$max),
                'name' => 'Usuario 02',
                'login' => Str::slug('Usuario 02', '_'),
                'email' => 'usuario02@mail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('user02'),
                'remember_token' => Str::random(10),
                'tipo' => 'user',
                'status' => 1,
            ],
            [
                'cod' => (string) Str::uuid(),
                'tenant_id' => random_int($min,$max),
                'name' => 'Usuario 03',
                'login' => Str::slug('Usuario 03', '_'),
                'email' => 'usuario03@mail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('user03'),
                'remember_token' => Str::random(10),
                'tipo' => 'user',
                'status' => 1,
            ],
            [
                'cod' => (string) Str::uuid(),
                'tenant_id' => random_int($min,$max),
                'name' => 'Usuario 04',
                'login' => Str::slug('Usuario 04', '_'),
                'email' => 'usuario04@mail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('user04'),
                'remember_token' => Str::random(10),
                'tipo' => 'user',
                'status' => 0,
            ],
            [
                'cod' => (string) Str::uuid(),
                'tenant_id' => random_int($min,$max),
                'name' => 'Usuario 05',
                'login' => Str::slug('Usuario 05', '_'),
                'email' => 'usuario05@mail.com',
                'email_verified_at' => now(),
                'password' => bcrypt('user05'),
                'remember_token' => Str::random(10),
                'tipo' => 'user',
                'status' => 0,
            ],
        ];

        foreach ($save as $key => $value) {
            User::create($value);
        }
    }
}
