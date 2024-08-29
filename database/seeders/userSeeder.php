<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name'=>'Bob',
                'email'=>'Bob@gmail.com',
                'role'=>'DATA_MANAGER'
            ],
            [
                'name'=>'robert',
                'email'=>'robert@gmail.com',
                'role'=>'EMPLOYE_MANAGER'
            ],
            [
                'name'=>'ibrahim',
                'email'=>'ibrahim@gmail.com',
                'role'=>'EMPLOYE_MANAGER'
            ]
        ];

        foreach ($users as $userData) {
            $user = User::firstOrcreate([
                'name'=>$userData['name'],
                'email'=>$userData['email'],
                'password'=>Hash::make('azerty') //Mot de passe
            ]);

            $role = Role::firstOrcreate([
                'name'=>$userData['role']
            ]);

            $user->assignRole($role);
                }
    }
}
