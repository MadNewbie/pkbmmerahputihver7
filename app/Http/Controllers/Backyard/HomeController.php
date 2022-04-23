<?php
namespace App\Http\Controllers\Backyard;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('backyard/home');
    }
}