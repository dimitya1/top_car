<?php

namespace App\Http\Controllers\Front;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('pages.front.home');
    }
}
