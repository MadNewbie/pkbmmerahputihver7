<?php
namespace App\Http\Controllers\Backyard;

use App\Base\BaseController;

class RoleController extends BaseController
{
    protected static $modelName = 'role';

    public function __construct()
    {
        $this->middleware('permission:' . self::getRoutePrefix('index'), ['only' => ['index']]);
    }

    public function index()
    {
        return self::makeView('index');
    }
}