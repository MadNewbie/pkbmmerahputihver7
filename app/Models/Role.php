<?php
namespace App\Models;

use Spatie\Permission\Models\Role as BaseRole;

class Role extends BaseRole
{
    protected $guard_name = 'web';

    public static function updateDeveloperRole()
    {
        $permissions = Permission::select(['id'])->get();
        $roleDeveloper = Role::where(['name' => 'Developer'])->first();
        $permissionsIds = [];
        foreach($permissions as $permission){
            $permissionsIds[] = $permission->id;
        }
        if($roleDeveloper){
            $roleDeveloper->syncPermissions($permissionsIds);
        }
    }
}