<?php
namespace App\Libraries\Mad;

use Route;
use Auth;

class Helper
{
    public static function renderMenus($tmpMenus)
    {
        $menus = $tmpMenus;
        $curRouteName = Route::currentRouteName();
        $activeModel = '';

        ob_start();
        foreach($menus as $menu){
            $menu = (object) $menu; ?>
            <?php if (Auth::user()->can([$menu->route])) :?>
                <li class="nav-item">
                    <a href="<?= route($menu->route) ?>" class="nav-link <?= strcmp($curRouteName, $menu->route) == 0 ? 'active': ''?>">
                      <i class="nav-icon <?= $menu->type_icon ?> fa-<?= $menu->icon ?>"></i>
                      <p>
                        <?= $menu->title ?>
                      </p>
                    </a>
                </li>
            <?php endif; ?>
        <?php };
    }

    public static function fluentMultiSearch($rootQuery, $searchString, $fieldsCommaSeparated)
    {
        $string = explode(' ', str_replace('  ', ' ', $searchString));
        if (is_string($fieldsCommaSeparated)) {
            $fields = explode(',', $fieldsCommaSeparated);
        } else {
            $fields = $fieldsCommaSeparated;
        }
        $rootQuery->where(function() use ($rootQuery, $string, $fields) {
            foreach ($string as $v) {
                $rootQuery->where(function ($andQuery) use ($rootQuery, $fields, $v) {
                    foreach ($fields as $w) {
                        $andQuery->orWhere($w, 'LIKE', "%{$v}%");
                    }
                });
            }
        });
        return $rootQuery;
    }
    
    public static function createSelect($data, $label, $id = 'id')
    {
        $res = array();
        foreach ($data as $v) {
            $tmp = false;
            $tmp = gettype($label) === 'object' && get_class($label) === 'Closure' ? $label($v) : $v->$label;
            $tmpId = gettype($id) === 'object' && get_class($id) === 'Closure' ? $id($v) : $v->$id;
            $res[$tmpId] = $tmp;
        }
        return $res;
    }
}