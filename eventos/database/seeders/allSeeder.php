<?php

namespace Database\Seeders;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class allSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant1 = new Tenant();
        $tenant1->name = 'Loja 01';
        $tenant1->save();

        $tenant2 = new Tenant();
        $tenant2->name = 'Loja 02';
        $tenant2->save();

        $user1 = new User();
        $user1->name = 'administrador';
        $user1->email = 'administrador@email.com';
        $user1->email_verified_at = now();
        $user1->password = bcrypt('senha');
        $user1->remember_token = Str::random(10);
        $user1->save();

        $user2 = new User();
        $user2->tenant_id = $tenant1->id;
        $user2->name = 'usuario 01';
        $user2->email = 'usuario01@mail.com';
        $user2->email_verified_at = now();
        $user2->password = bcrypt('senha');
        $user2->remember_token = Str::random(10);
        $user2->save();

        $user3 = new User();
        $user3->tenant_id = $tenant1->id;
        $user3->name = 'usuario 02';
        $user3->email = 'usuario02@mail.com';
        $user3->email_verified_at = now();
        $user3->password = bcrypt('senha');
        $user3->remember_token = Str::random(10);
        $user3->save();

        $user4 = new User();
        $user4->tenant_id = $tenant2->id;
        $user4->name = 'usuario 03';
        $user4->email = 'usuario03@mail.com';
        $user4->email_verified_at = now();
        $user4->password = bcrypt('senha');
        $user4->remember_token = Str::random(10);
        $user4->save();

    }
}
