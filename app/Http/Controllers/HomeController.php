<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\WorkTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{

  public function lang($lang): RedirectResponse
  {
    session()->put('lang', $lang);

    return redirect()->back();
  }

  public function home(): View
  {

    return view('home');
  }
}
