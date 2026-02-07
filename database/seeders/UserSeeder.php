<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'teste',
                'email' => 'teste@.com',
                'nasciment' => '2025-11-14',
                'role' => 'user',
                'password' => '$2a$10$wHbheI2D8VC4Uz.6QGq.XOsyLXobC./cDJv8NR4/dPRFpuHd9PY/m'
            ],
            [
                'name' => 'Lindie',
                'email' => 'lspeers0@typepad.com',
                'nasciment' => '2025-11-14',
                'role' => 'user',
                'password' => '89.71.80.126'
            ],
            [
                'name' => 'Hughie',
                'email' => 'hchater1@yahoo.co.jp',
                'nasciment' => '2025-03-04',
                'role' => 'user',
                'password' => '4.105.109.170'
            ],
            [
                'name' => 'Francisca',
                'email' => 'fkershaw2@jugem.jp',
                'nasciment' => '2025-10-03',
                'role' => 'user',
                'password' => '142.32.48.101'
            ],
            [
                'name' => 'Chaddie',
                'email' => 'cbraisher3@google.fr',
                'nasciment' => '2025-12-28',
                'role' => 'user',
                'password' => '242.112.227.231'
            ],
            [
                'name' => 'Frank',
                'email' => 'fpimlott4@cafepress.com',
                'nasciment' => '2025-12-13',
                'role' => 'user',
                'password' => '143.151.203.183'
            ],
            [
                'name' => 'Crawford',
                'email' => 'cisacke5@purevolume.com',
                'nasciment' => '2026-01-16',
                'role' => 'user',
                'password' => '110.162.230.151'
            ],
            [
                'name' => 'Parnell',
                'email' => 'pdullaghan6@state.gov',
                'nasciment' => '2025-08-24',
                'role' => 'user',
                'password' => '170.253.238.179'
            ],
            [
                'name' => 'Carine',
                'email' => 'ccafferky7@sciencedaily.com',
                'nasciment' => '2025-11-22',
                'role' => 'user',
                'password' => '41.38.47.234'
            ],
            [
                'name' => 'Cairistiona',
                'email' => 'ccutten8@typepad.com',
                'nasciment' => '2025-04-02',
                'role' => 'user',
                'password' => '110.159.39.192'
            ],
            [
                'name' => 'Earvin',
                'email' => 'emoncrieffe9@drupal.org',
                'nasciment' => '2025-09-26',
                'role' => 'user',
                'password' => '122.196.130.6'
            ],
        ];

        foreach ($users as $user){
            User::factory()->create($user);
        }
    }
}
