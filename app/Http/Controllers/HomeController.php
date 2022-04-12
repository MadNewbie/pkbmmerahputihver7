<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

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
        $submenus = ['sejarah','visi-misi','legalitas'];
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