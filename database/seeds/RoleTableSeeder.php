<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Developer',
        ]);

        Permission::updatePermissions();

        $permissions = Permission::pluck('id','id')->all();

        $role->syncPermissions($permissions);
    }
}
