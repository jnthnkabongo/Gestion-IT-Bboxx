<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'roles_name'=>'DATA_MANAGER',
                'permission_name'=>'DATA_EDIT',
            ],
            [
                'roles_name'=>'EMPLOYE_MANAGER',
                'permission_name'=>'DATA_EDIT',
            ]
            ];
            foreach($data as $item){
                $role = Role::firstOrCreate([
                    'name' => $item['roles_name']
                ]);

                $permission = Permission::firstOrCreate([
                    'name'=>$item['permission_name']
                ]);

                $role->givePermissionTo($permission);
            }
    }
}
