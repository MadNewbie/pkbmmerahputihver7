<?php
namespace App\Models;

use Route;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    protected $guard_name = 'web';

    public static function updatePermissions()
    {
        $routes = Route::getRoutes();
        $routeList = [];

        foreach($routes as $value){
            $route = $value->getAction();
            if(isset($route['as']) && preg_match("/backyard/", $route['as'])){
                $routeList[] = $route['as'];
            }
        }

        $ids = [];

        foreach($routeList as $value){
            $permission = BasePermission::where(['name' => $value])->first();
            if ($permission) {
                $ids[] = $permission['id'];
            } else {
                $permission = BasePermission::create(['name' => $value]);
                $ids[] = $permission['id'];
            }
        }

        $permissions = BasePermission::whereNotIn('id',$ids)->get();

        foreach($permissions as $permission){
            $permission->delete();
        }
    }
}