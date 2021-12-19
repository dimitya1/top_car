<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class AboutUsController extends Controller
{
    public function index(): View
    {
        return view('pages.front.about');
    }
}
