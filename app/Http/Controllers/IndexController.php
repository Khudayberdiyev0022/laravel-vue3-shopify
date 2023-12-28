<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IndexController extends Controller
{

//  public function __construct()
//  {
//    $this->middleware('auth');
//  }

  public function __invoke(Language $language): RedirectResponse
  {
    abort_unless($language->active, 404);
    $cookie = cookie()->forever('language', $language->id);

    return back()->withCookie($cookie);
  }

  public function index(): View
  {
    return view('index');
  }

}
