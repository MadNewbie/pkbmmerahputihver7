<?php
namespace App\Http\Controllers\Forecourt;

use App\Models\News;
use App\Models\Event;
use App\Models\Program;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Lookups\Backyard\NewsLookup;
use App\Lookups\Backyard\EventLookup;
use App\Lookups\Backyard\ProgramLookup;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function homepage()
    {
        $recentEvents = Event::orderBy('created_at','asc')
            ->where(['isPublic' => EventLookup::IS_PUBLIC_YES])
            ->limit(3)
            ->get();
        $recentNews = News::orderBy('created_at','asc')
            ->where(['isPublic' => NewsLookup::IS_PUBLIC_YES])
            ->limit(5)
            ->get();
        $randomPrograms = Program::inRandomOrder()
            ->where(['isPublic' => ProgramLookup::IS_PUBLIC_YES])
            ->limit(5)
            ->get();

        foreach ($randomPrograms as $data) {
            $data['description'] = wordwrap(strip_tags(str_replace("</p>"," ",$data['description'])), 150) . "...";
        }

        $options = compact('recentEvents','recentNews','randomPrograms');

        return view('forecourt/new/homepage',$options);
    }

    public function homepage2()
    {
        $active = '';
        $submenus = [];
        $data = 'test';

        $recentEvents = Event::orderBy('created_at','asc')
            ->where(['isPublic' => EventLookup::IS_PUBLIC_YES])
            ->limit(3)
            ->get();
        $recentNews = News::orderBy('created_at','asc')
            ->where(['isPublic' => NewsLookup::IS_PUBLIC_YES])
            ->limit(5)
            ->get();
        $randomPrograms = Program::inRandomOrder()
            ->where(['isPublic' => ProgramLookup::IS_PUBLIC_YES])
            ->limit(5)
            ->get();

        foreach ($randomPrograms as $data) {
            $data['description'] = wordwrap(strip_tags(str_replace("</p>"," ",$data['description'])), 150) . "...";
        }

        $options = compact('data','submenus','active','recentEvents','recentNews','randomPrograms');

        return view('forecourt/homepage', $options);
    }

    public function information()
    {
        return view('forecourt/new/information');
    }

    public function program()
    {
        $programs = Program::orderBy('title', 'ASC')
            ->where(['isPublic' => ProgramLookup::IS_PUBLIC_YES])
            ->get();

        $options = compact('programs');
        return view('forecourt/new/program', $options);
    }

    public function team()
    {
        return view('forecourt/new/team');
    }
}