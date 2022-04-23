<?php
namespace App\Base;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    protected static $modelName = '';

    public static function getModelInfo()
    {
        return [
            'modelName' => static::$modelName,
            'getRoutePrefix' => static::getRoutePrefix(),
        ];
    }

    public static function makeView($view, $data = [], $mergeData = [])
    {
        $data += static::getModelInfo();

        $pathView = [];

        $pathView[] = 'backyard';

        $pathView[] = static::$modelName;

        $pathView[] = $view;

        $pathView = implode('.', $pathView);

        return view($pathView, $data, $mergeData);
    }

    public static function getRoutePrefix($route = null)
    {
        $routePrefix = [];

        $routePrefix[] = 'backyard';

        $routePrefix[] = static::$modelName;

        $routePrefix[] = $route;

        return implode(".", $routePrefix);
    }
}