<?php

namespace App\Http\Controllers\Dashboard\Home;

use Illuminate\Contracts\View\View;
use App\Http\Controllers\Dashboard\DashboardController;

class HomeController extends DashboardController
{
    /**
     * Show the application dashboard.
     */
    public function index(): View
    {
        return view('dashboard.home.index');
    }
}
