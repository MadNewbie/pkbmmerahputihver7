<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function changeLanguage($lang) {
        app()->setLocale($lang);
        session()->put('locale', $lang);

        return redirect()->back();
    }
}