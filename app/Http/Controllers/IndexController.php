<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class IndexController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(): View
  {
    return view('index');
  }

}
