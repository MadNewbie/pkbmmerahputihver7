<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function homepage()
    {
        $active = '';
        $submenus = [];
        $data = 'test';
        $options = compact('data','submenus','active');

        return view('forecourt/homepage', $options);
    }

    public function information()
    {
        $active = 'information';
        $submenus = [
            [
                'link'=>'sejarah',
                'title' => __('submenu.information.sejarah'),
            ],[
                'link'=>'visi-misi',
                'title' => __('submenu.information.visi-misi'),
            ],[
                'link'=>'legalitas',
                'title' => __('submenu.information.legalitas'),
            ]
        ];
        $data = 'info';
        $options = compact('data','submenus','active');
        return view('forecourt/information', $options);
    }

    public function program()
    {
        $active = 'program';
        $submenus = [];
        $data = 'info';
        $options = compact('data','submenus','active');
        return view('forecourt/program', $options);
    }

    public function team()
    {
        $active = 'team';
        $submenus = [];
        $data = 'info';
        $options = compact('data','submenus','active');
        return view('forecourt/team', $options);
    }
}