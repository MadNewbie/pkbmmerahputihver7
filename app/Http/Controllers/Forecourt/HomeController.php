<?php
namespace App\Http\Controllers\Forecourt;

use App\Models\News;
use App\Models\Event;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function homepage()
    {
        $recentEvents = Event::orderBy('created_at','asc')->limit(3)->get();
        $recentNews = News::orderBy('created_at','asc')->limit(5)->get();

        $options = compact('recentEvents','recentNews');

        return view('forecourt/new/homepage',$options);
    }

    public function homepage2()
    {
        $active = '';
        $submenus = [];
        $data = 'test';

        $recentEvents = Event::orderBy('created_at','asc')->limit(3)->get();
        $recentNews = News::orderBy('created_at','asc')->limit(5)->get();

        $options = compact('data','submenus','active','recentEvents','recentNews');

        return view('forecourt/homepage', $options);
    }

    public function information()
    {
        return view('forecourt/new/information');
    }

    public function program()
    {
        return view('forecourt/new/program');
    }

    public function team()
    {
        return view('forecourt/new/team');
    }
}