<?php
namespace App\Http\Controllers\Forecourt;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function changeLanguage($lang) {
        app()->setLocale($lang);
        session()->put('locale', $lang);

        return redirect()->back();
    }
}